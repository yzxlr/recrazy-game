<?php
// 本文档自动生成，仅供测试运行
class IndexAction extends Action
{
    /**
    +----------------------------------------------------------
    * 默认操作
    +----------------------------------------------------------
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
		
		
		//2 load location
		$tb_region = M("region");
		$regions = $tb_region -> where(array("region_lang_code"=>"en-us")) -> select();
		$this->assign("all_regions",$regions);
		
		//3  Assign Category
		$temp_cat = $this->GetCategoriesL2();
		$this->assign("categories",$temp_cat);
		
		
	}
	public function GetCategoriesL2(){  //get 2 levels of category (root and one sub level category
		$tb_job_cat = M("jobsCat");
		
		$cats = $tb_job_cat
				->table("ry_jobs_cat")
				->join("ry_jobs_cat_lang on ry_jobs_cat_lang.cat_id = ry_jobs_cat.cat_id AND ry_jobs_cat_lang.lang_code ='".LANG_SET."'")
				->field("ry_jobs_cat.*, ry_jobs_cat_lang.catlang_id, ry_jobs_cat_lang.lang_code AS cat_lang_code, 
							ry_jobs_cat_lang.lang_name AS cat_lang_name, ry_jobs_cat_lang.cat_name AS cat_name_with_lang")
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
	
    public function index()
    {
        //0. Initialization
		//0.1 Global variables
		$user = $_SESSION["user"];
		
		//0.9 massenger
		
                $msg = array("title"=>array("en-us" => "Jobs",
                                            "zh-cn" => "工作首页")
                                            );
		//1. Table users
		
		/////var_dump($user);
		//10. Display
                $tb_jobs = M("jobs");
                $data["tb_jobs"] = $tb_jobs->order('time_add desc')->limit(10)->select();
                $this->assign("msg",$msg);
		$this->assign("data",$data);
                $this->display();
    }
}
?>