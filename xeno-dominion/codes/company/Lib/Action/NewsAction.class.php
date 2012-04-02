<?php
// 本文档自动生成，仅供测试运行
class NewsAction extends Action
{
    /**
    +----------------------------------------------------------
    * 默认操作
    +----------------------------------------------------------
    */
	
	public function _initialize(){
		//0. Initialization
		//0.1 Global variables
		$http = (isset($_SERVER['HTTPS'])&&$_SERVER['HTTPS']!='off')?'https://':'http://';  
		$port = $_SERVER["SERVER_PORT"]==80?'':':'.$_SERVER["SERVER_PORT"];  
		$url = $http.$_SERVER['SERVER_NAME'].$port;//.$_SERVER["REQUEST_URI"];
		$this->assign("SITE_URL",$url);
		//define("SITE_URL",$url);
		
		
		//2 load location
		$tb_region = M("region");
		$regions = $tb_region -> where(array("region_lang_code"=>"en-us")) -> select();
		$this->assign("all_regions",$regions);
		
		//3  Assign Category
		$cid = $_REQUEST["id"];
		$temp_cat = $this->GetCategoriesL2($cid);
		$this->assign("categories",$temp_cat);
		
		//count click for company page
		//get user information
		$user = $_SESSION["user"];
		$uid = $user["uid"];//echo $uid;
		
		if(isset($cid)){
			import("ORG.Net.Click");
			$pid = NULL;
			$Click = new Click($cid, $pid, $uid, "1");
			$ip = $Click->getIP();//echo $ip;
		}
	}
	
	//show category for each company... only category containing product can be shown below...
	public function GetCategoriesL2($cid){  //get 2 levels of category (root and one sub level category
		$tb_product_cat = M("productsCat");
		
		$cats = $tb_product_cat
				->table("ry_products_cat")
				->join("ry_products_cat_lang on ry_products_cat_lang.cat_id = ry_products_cat.cat_id AND ry_products_cat_lang.lang_code ='".LANG_SET."'")
				->field("ry_products_cat.*, ry_products_cat_lang.catlang_id, ry_products_cat_lang.lang_code AS cat_lang_code, 
							ry_products_cat_lang.lang_name AS cat_lang_name, ry_products_cat_lang.cat_name AS cat_name_with_lang")
				->select();
		
		$products = M("Products");
		
		foreach($cats as $key => $cat){
			//echo $key." ";
			if($cat["parent_id"]==0){
				foreach($cats as $key_child => $cat_child){
					if($cat_child["parent_id"]==$cat["cat_id"]){

						//$cat_child['sub_product_count'] = 0;
						$cats[$key]["child_cats"][] = $cat_child;
						unset($cats[$key_child]);
					}
				}
			}
		}
		
		$new_cats = $cats;
		
		//in this foreach loop, update $new_cats array to only get category with product number > 0
		foreach($new_cats as $key => $cat){
			if(isset($new_cats[$key]["child_cats"])){
				$cat_sub_total = 0;
				foreach($new_cats[$key]["child_cats"] as $key_child => $cat_child){
					$pscondition['user_id'] = $cid;
					$pscondition['cat_id'] = $cat_child["cat_id"];
					$cat_sub_product_count = $products->where($pscondition)->count();
					if($cat_sub_product_count > 0){
						$cat_sub_total += $cat_sub_product_count;
						$cat_child['sub_product_count'] += intval($cat_sub_product_count);
						$new_cats[$key]["child_cats"][$key_child]['sub_product_count'] +=intval($cat_sub_product_count);
					}else{
						unset($new_cats[$key]['child_cats'][$key_child]);
					}
				}
				if($cat_sub_total == 0){
					unset($new_cats[$key]);
				}else{
					$new_cats[$key]['product_count'] += $cat_sub_total;	
				}
			}else{
				$pcondition['user_id'] = $cid;
				$pcondition['cat_id'] = $cat['cat_id'];
				$cat_product_count = $products->where($pcondition)->count();
				$new_cats[$key]['product_count'] += $cat_product_count;
				if($new_cats[$key]['product_count'] > 0){
					// do nothing
				}else{
					//unset parent category
					unset($new_cats[$key]);
				}
			}
		}
		
		return $new_cats;
	}
	
	public function company()
	{
		$cid = $_REQUEST["id"];
		//if(!isset($cid)){ $cid = "test"; }
		if(isset($cid)){
			$this->assign('cid',$cid);
			
			$users_company = new Model('usersCompany'); // 实例化模型类
			$condition['userId'] = $cid;
			$user_company_info = $users_company->where($condition)->find(); // 查诟数据
			//var_dump($user_company_info);
			$this->assign('user_company_info', $user_company_info);
			
			//show company news
			$users_company_news = M("users_company_news");
			//$users_company_news = new Model("usersCompanyNews");
			$cn_condition['uid'] = $cid;//echo $cid;
			$cn_condition['n_type'] = "2";
		
			$news_count = $users_company_news->where($cn_condition)->count();
			$this->assign("news_count", $news_count);
			
			import("ORG.Util.Page");
			$Page = new Page($news_count,10);
			//>>>> page English support start
			if($$news_count>1)
				$Page->setConfig('header','Records'); 
			else
				$Page->setConfig('header','Record'); 
			$Page->setConfig('prev',"Prev");
			$Page->setConfig('next','Next');
			$Page->setConfig('first','|<');
			$Page->setConfig('last','>|');
			//<<<< page English support ends
			$show = $Page->show();
			$company_news = $users_company_news->field(array('nid', 'n_title'))->where($cn_condition)->order('added DESC')->limit($Page->firstRow.','.$Page->listRows)->select();
			$this->assign("company_news", $company_news);
			$this->assign("show",$show);
			//var_dump($company_news);
		}
		
		$nid = $_REQUEST["nid"];//echo $nid;
		if(isset($nid)){
			$this->assign('nid',$nid);
			$users_company_news = M("users_company_news");
			$read_condition['nid'] = $nid;
			$read_company_news = $users_company_news->where($read_condition)->select();
			//var_dump($read_company_news);
			$this->assign("read_company_news", $read_company_news);
		}else{
			//load the latest
			$read_condition['uid'] = $cid;
			$read_condition['n_type'] = "2";
			$read_news = $users_company_news->where($read_condition)->order('added DESC')->find();
			if(isset($read_news)){
				//do nothing
			}else{
				$read_news['n_title'] = "There is no Company News available.";
				$read_news['n_content'] = "Please come back and check later.";
			}
			$read_company_news[0] = $read_news;
			$this->assign("read_company_news", $read_company_news);
		}

		$this->display();
	}
	
	public function loadcn(){
		$uid = $_POST['uid'];
		$nid = $_POST['nid'];
		
		$users_company_news = M("users_company_news");
		$condition['nid'] = $nid;//echo $user["uid"];
		$read_news = $users_company_news->where($condition)->select();
		//echo $read_news[0]['n_title'];
		$jsonObject = '{
"title":"'.$read_news[0]['n_title'].'",
"content":"'.htmlentities(addslashes($read_news[0]['n_content'])).'", 
"added":"'.$read_news[0]['added'].'"}';
		echo $jsonObject;
		//echo $nid;
	}
	
	public function industrial()
	{
		$cid = $_REQUEST["id"];
		
		$users_company_news = M("users_company_news");
		
		if(isset($cid)){
			$this->assign('cid',$cid);
			
			$users_company = new Model('usersCompany'); // 实例化模型类
			$condition['userId'] = $cid;
			$user_company_info = $users_company->where($condition)->find(); // 查诟数据
			$this->assign('user_company_info', $user_company_info);
			
			//show industrial news
			$in_condition['uid'] = $cid;//echo $user["uid"];
			$in_condition['n_type'] = "1";
		
			$news_count = $users_company_news->where($in_condition)->count();
			$this->assign("news_count", $news_count);
		
			import("ORG.Util.Page");
			$Page = new Page($news_count,10);
			//>>>> page English support start
			if($$news_count>1)
				$Page->setConfig('header','Records'); 
			else
				$Page->setConfig('header','Record'); 
			$Page->setConfig('prev',"Prev");
			$Page->setConfig('next','Next');
			$Page->setConfig('first','|<');
			$Page->setConfig('last','>|');
			//<<<< page English support ends
			$show = $Page->show();
			$industrial_news = $users_company_news->field(array('nid', 'n_title', 'added', 'updated'))->where($in_condition)->order('added DESC')->limit($Page->firstRow.','.$Page->listRows)->select();
			$this->assign("industrial_news", $industrial_news);
			$this->assign("show",$show);
		}
		$nid = $_REQUEST["nid"];//echo $nid;
		if(isset($nid)){
			$this->assign('nid',$nid);
			$read_condition['nid'] = $nid;
			$read_industrial_news = $users_company_news->where($read_condition)->select();
			//var_dump($read_company_news);
			$this->assign("read_industrial_news", $read_industrial_news);
		}else{
			//load the latest
			$read_condition['uid'] = $cid;
			$read_condition['n_type'] = "1";
			$read_news = $users_company_news->where($read_condition)->order('added DESC')->find();
			if(isset($read_news)){
				//do nothing
			}else{
				$read_news['n_title'] = "There is no Industrial News available.";
				$read_news['n_content'] = "Please come back and check later.";
			}
			$read_industrial_news[0] = $read_news;
			$this->assign("read_industrial_news", $read_industrial_news);
		}

		$this->display();
	}
}
?>