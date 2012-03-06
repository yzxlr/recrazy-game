<?php
// 本文档自动生成，仅供测试运行
class CommonAction extends Action
{
	/**
	*  所有的公用的东西都可以放在这里。
	*   $this->assign('var',$value);都可以用。下面的方法都会调用这个initialize里面的内  容
	*/
	
	protected $user = array(); 
    public function _initialize(){
		//0. Initialization
		//0.1 Global variables
		$http = (isset($_SERVER['HTTPS'])&&$_SERVER['HTTPS']!='off')?'https://':'http://';  
		$port = $_SERVER["SERVER_PORT"]==80?'':':'.$_SERVER["SERVER_PORT"];  
		$url = $http.$_SERVER['SERVER_NAME'].$port;//.$_SERVER["REQUEST_URI"];
		$this->assign("SITE_URL",$url);
		//define("SITE_URL",$url);
		
		//1 Validate User (only admin can login at here
		/*
		if(!empty($_SESSION["user"])){
			$this->user = $_SESSION["user"];
			if($this->user["role"]>=0){
				$this->assign("user",$this->user);
			}else{
				$this->assign("jumpUrl","/index.php?s=Public/login");
				$this->error('You are not user!');
			}
		}else{
			$this->assign("jumpUrl","/index.php?s=Public/login");
			$this->error('Please login first!');
			//$this->redirect('Public/login', array(), 3, 'Please login first!');
		}
		//*/
		
		//2 load location
		$tb_region = M("region");
		$regions = $tb_region -> where(array("region_lang_code"=>"en-us")) -> select();
		$this->assign("all_regions",$regions);
		
		//3  Assign Category
		$temp_cat = $this->GetCategoriesL2();
		$this->assign("categories",$temp_cat);
		
		
	}
	
	public function GetCategoriesL2(){  //get 2 levels of category (root and one sub level category
		$tb_product_cat = M("productsCat");
		
		$cats = $tb_product_cat
				->table("ry_products_cat")
				->join("ry_products_cat_lang on ry_products_cat_lang.cat_id = ry_products_cat.cat_id AND ry_products_cat_lang.lang_code ='".LANG_SET."'")
				->field("ry_products_cat.*, ry_products_cat_lang.catlang_id, ry_products_cat_lang.lang_code AS cat_lang_code, 
							ry_products_cat_lang.lang_name AS cat_lang_name, ry_products_cat_lang.cat_name AS cat_name_with_lang")
				->select();
		
		foreach($cats as $key => $cat){
			if($cat["parent_id"]==0){
				foreach($cats as $key_child => $cat_child){
					if($cat_child["parent_id"]==$cat["cat_id"]){
						$cats[$key]["child_cats"][] = $cat_child;
						unset($cats[$key_child]);
					}
				}
			}
			/////var_dump($cat);
		}
		/////var_dump($cats);
		return $cats;
	}
	
	
	/*
	 *  这里暂时hardcode
	**/
	public function rbac($user_id, $user_action){
		return true;
	}
	
	/*
	 *  这里暂时hardcode
	**/
	public function getUserRoles(){
		$user_role = array();
		$user_role[2] = array("id"=>100,"name"=>"user");
		$user_role[1] = array("id"=>10,"name"=>"master");
		$user_role[0] = array("id"=>0,"name"=>"admin");
		
		return $user_role;
	}

}
?>