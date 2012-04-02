<?php
// 本文档自动生成，仅供测试运行
class IndexAction extends Action
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
	
	public function index()
	{
		//show all the companies
		$buser = new Model('users');
		$condition['role'] = "10";
		$user_company = $buser->join("ry_users_company ON ry_users.uid = ry_users_company.userId")
								->field("ry_users.*, ry_users_company.*")
								->where($condition)->select();
		//var_dump($user_company);
		$bcount = count($user_company);
		$this->assign("bcount", $bcount);
		
		//get category number
		foreach($user_company as $key => $companyinfo){
			$cat_count = $this->getCatNum($companyinfo['uid']);
			$user_company[$key]['cat_count'] = $cat_count;
			$prod_count = $this->getProdNum($companyinfo['uid']);
			$user_company[$key]['prod_count'] = $prod_count;
		}
		
		//$cat_count = $this->getCatNum($cid);
		
		$this->assign("user_company", $user_company);
		$this->display();
		
		
	}
	
    public function info()
    {
		$user = $_SESSION["user"];
		
		$cid = $_REQUEST["id"];
		//if(!isset($cid)){ $cid = "test"; }
		if(isset($cid)){
			$this->assign('cid',$cid);
        	
			$users_company = new Model('usersCompany'); // 实例化模型类
			$condition['userId'] = $cid;
			$user_company_info = $users_company->where($condition)->find(); // 查诟数据
			$this->assign('user_company_info', $user_company_info);
			//var_dump($user_company_info);
			
			//get latest industrial news
			$users_company_news = new Model('usersCompanyNews');
			$incondition['uid'] = $cid;
			$incondition['n_type'] = "1";
			$latest_industiral_news = $users_company_news->where($incondition)->order('added DESC')->find();
			$this->assign('latest_industiral_news', $latest_industiral_news);
			//var_dump($latest_industiral_news);
			
			$cncondition['uid'] = $cid;
			$cncondition['n_type'] = "2";
			$latest_company_news = $users_company_news->where($cncondition)->order('added DESC')->find();
			$this->assign('latest_company_news', $latest_company_news);
			//var_dump($latest_company_news);
			
			//get all product information and use paginator
			$products = new Model('Products');
			$pcondition['user_id'] = $cid;
			
			//show company product
			$pcount = $products->join("ry_products_lang ON ry_products.pid = ry_products_lang.pid AND ry_products_lang.lang_code='".LANG_SET."'")
									-> field("ry_products.*, ry_products_lang.plid, ry_products_lang.lang_code, ry_products_lang.name AS lang_name, ry_products_lang.description AS lang_description")
									-> where($pcondition)->count();
			import("ORG.Util.Page");
			$Page = new Page($pcount,12);
			//>>>> page English support start
			if($pcount>1)
				$Page->setConfig('header','Records'); 
			else
				$Page->setConfig('header','Record'); 
			$Page->setConfig('prev',"Prev");
			$Page->setConfig('next','Next');
			$Page->setConfig('first','|<');
			$Page->setConfig('last','>|');
			//<<<< page English support ends
			$show = $Page->show();
			
			$user_company_products = $products->join(array("ry_products_lang ON ry_products.pid = ry_products_lang.pid AND ry_products_lang.lang_code='".LANG_SET."'" ,
						"ry_region ON ry_products.location_code = ry_region.region_code AND ry_region.region_lang_code='".LANG_SET."'",
						"ry_users ON ry_products.user_id = ry_users.uid"))
			->field("ry_products.*, 
					ry_products_lang.plid, ry_products_lang.lang_code, ry_products_lang.name AS lang_name, ry_products_lang.description AS lang_description, 
					ry_region.*,
					ry_users.user_email")
			->where($pcondition) ->limit($Page->firstRow.','.$Page->listRows)->select();
			
			$this->assign("show",$show);
			$this->assign("user_company_products",$user_company_products);
		}else{
			//load error message
		}
		$this->display();
    }
	
	public function about()
	{
		$cid = $_REQUEST["id"];
		
		if(isset($cid)){
			$this->assign('cid',$cid);
			//load selected company about information
			$users_company = new Model('usersCompany'); // 实例化模型类
			$condition['userId'] = $cid;
			$user_company_info = $users_company->where($condition)->find(); // 查诟数据
			$this->assign('user_company_info', $user_company_info);
		}else{
			//load error message
		}
		$this->display();
	}
	
	

    /**
    +----------------------------------------------------------
    * 探针模式
    +----------------------------------------------------------
    */
    public function checkEnv()
    {
        load('pointer',THINK_PATH.'/Tpl/Autoindex');//载入探针函数
        $env_table = check_env();//根据当前函数获取当前环境
        echo $env_table;
    }

	//get category number by user_company_id
	public function getCatNum($cid){
		$products = M("Products");
		$condition['user_id'] = $cid;
		$cat_count = $products->distinct('cat_id')->field('cat_id')->where($condition)->select();
		$cat_count = count($cat_count);
		return $cat_count;
	}
	
	//get product number by user_company_id
	public function getProdNum($cid){
		$products = M("Products");
		$condition['user_id'] = $cid;
		$prod_count = $products->where($condition)->count();
		return $prod_count;
	}
}
?>