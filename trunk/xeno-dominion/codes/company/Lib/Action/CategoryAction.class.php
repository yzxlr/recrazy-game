<?php
// 本文档自动生成，仅供测试运行
class CategoryAction extends Action
{
	public function _initialize(){
		//0. Initialization
		//0.1 Global variables
		$http = (isset($_SERVER['HTTPS'])&&$_SERVER['HTTPS']!='off')?'https://':'http://';  
		$port = $_SERVER["SERVER_PORT"]==80?'':':'.$_SERVER["SERVER_PORT"];  
		$url = $http.$_SERVER['SERVER_NAME'].$port;//.$_SERVER["REQUEST_URI"];
		$this->assign("SITE_URL",$url);
		
		//2 load location
		$tb_region = M("region");
		$regions = $tb_region -> where(array("region_lang_code"=>"en-us")) -> select();
		$this->assign("all_regions",$regions);
		
		$tb_product_cat = M("productsCat");
		//3  Assign Category
		$cid = $_REQUEST["id"];
		if(isset($cid)){
			//load category information
			$temp_cat = $this->GetCategoriesL2($tb_product_cat, $cid);
			$this->assign("categories",$temp_cat);
        	//load company informaiton
			$users_company = new Model('usersCompany'); // 实例化模型类
			$condition['userId'] = $cid;
			$user_company_info = $users_company->where($condition)->find(); // 查诟数据
			$this->assign('user_company_info', $user_company_info);	
		}
		
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
	public function GetCategoriesL2($tb_product_cat, $cid){  //get 2 levels of category (root and one sub level category
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
	
	public function index(){
		$user = $_SESSION["user"];

		$cid = $_REQUEST["id"];
		$this->assign('cid', $cid);
		$cat_id = $_REQUEST["cat_id"];
		$this->assign('cat_id', $cat_id);
		
		//check cat_id is parent id or child id
		//if cat_id is parent id, then load child cat_id
		//if cat_id is not parent id, then load products under this cat_id
		$tb_product_cat = M("productsCat");
		$products = M("Products");
		$read_child_cat_id = $this->checkParentID($tb_product_cat, $products, $cat_id, $cid);
		
		$cat_name = $this->readCategoryName($tb_product_cat, $cat_id);
		$this->assign('cat_name', $cat_name);
		//var_dump($read_child_cat_id);
		
		$pcondition['user_id'] = $cid;
		if($read_child_cat_id == false){
			$this->assign("cat_show", "1");
			$pcondition['cat_id'] = $cat_id;
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
			$this->assign("cat_show", "2");
			//$this->assign("read_child_cat_id", $read_child_cat_id);
			$read_child_cat_name = array();
			foreach( $read_child_cat_id as $each_cat_id){
				$each_cat_name = $this->readCategoryName($tb_product_cat, $each_cat_id);
				array_push($read_child_cat_name, array('cat_id' => $each_cat_id, 'cat_name' => $each_cat_name));
			}
			$this->assign("read_child_cat_name", $read_child_cat_name);
			//var_dump($read_child_cat_name);
		}
		
		$this->display();
	}
	
	//check if given cat_id is parent id
	//return false if cat_id is not parent id
	//return array of child ids from cat_id
	public function checkParentID($tb_product_cat, $products, $cat_id, $cid){
		//$product_cat = M("productsCat");
		$cat_condition['parent_id'] = $cat_id;
		$child_id = $tb_product_cat->field('cat_id')->where($cat_condition)->select();
		if(isset($child_id)){
			$child_id_array = array();
			foreach($child_id as $each_child){
				$pscondition['user_id'] = $cid;
				$pscondition['cat_id'] = $each_child["cat_id"];
				$cat_sub_product_count = $products->where($pscondition)->count();
				if($cat_sub_product_count > 0){
					array_push($child_id_array, $each_child["cat_id"]);
				}
			}
			return $child_id_array;
		}else{
			return false;	
		}
	}
	
	//read category name
	public function readCategoryName($tb_product_cat, $cat_id){
		$cat_condition['cat_id'] = $cat_id;
		$cat_name = $tb_product_cat->field('cat_name')->where($cat_condition)->find();
		return $cat_name['cat_name'];
	}
}