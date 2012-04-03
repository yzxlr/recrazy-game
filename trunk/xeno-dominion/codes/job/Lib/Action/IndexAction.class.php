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
                $data["tb_jobs"] = $tb_jobs -> table("ry_jobs")-> join( "ry_users_company ON ry_jobs.employer_id=ry_users_company.userId")
                                    -> field("ry_jobs.*, ry_users_company.*") ->order('ry_jobs.time_add desc')->limit(10)->select();
                $this->assign("msg",$msg);
		$this->assign("data",$data);
                $this->display();
    }
    public function lists()
    {
		$msg = array("title"=>array("en-us" => "List Jobs","zh-cn" => "工作职位列表")
				);
                	
		$tb_jobs = M("jobs");
		$tb_jobs_cat = M("jobsCat");
		
		$condition =array();
                
                $location = "all";
                if(isset($_GET["location"])){
                    $location = trim($_GET["location"]);
                }                
                $cat_id = 0;
                $data['cat_name'] = "";
		if(isset($_GET["cat_id"])){
                    $cat_id = $_GET["cat_id"];
                    $data['cat_name'] = getCategoryNameById($cat_id);
                }
                
		//1 Table .get all subcategories
                $job_cats = $tb_jobs_cat ->table('ry_jobs_cat') -> where(array("ry_jobs_cat.parent_id"=>$cat_id, "ry_jobs_cat.is_show"=>1)) -> select();
		$data["tb_jobs_cat"] = $job_cats;
                /*
                foreach($job_cats as $key => $value){
			$cat_id .= ",". $value["cat_id"];
		}
		*/
		/////var_dump($location); var_dump($cat_id);exit;
		//tables
		if(!empty($location)&&isset($cat_id)){
			/*
			if($location=="all")$location=1;
			else if($location=="demand")$location=2;
			else $location= 0;
			*/
			//echo $location;exit;
			if($location=="all")
				$condition = array("ry_jobs.cat_id"=>array("IN",$cat_id));
			else
				$condition = array("ry_jobs.cat_id"=>array("IN",$cat_id), 
							       "ry_jobs.job_location"=>$location);
			
			import("ORG.Util.Page");
			$count = $tb_jobs -> table("ry_jobs")-> where($condition)->count();
                       
			$Page = new Page($count,12);
			//>>>> page English support start
			if($count>1)
				$Page->setConfig('header','Records'); 
			else
				$Page->setConfig('header','Record'); 
			$Page->setConfig('prev',"Prev");
			$Page->setConfig('next','Next');
			$Page->setConfig('first','|<');
			$Page->setConfig('last','>|');
			//<<<< page English support ends
			$show = $Page->show();
			$data["tb_jobs"] = $tb_jobs -> table("ry_jobs")
												-> join(
														array( "ry_employers ON ry_jobs.employer_id=ry_employers.employer_id"
															)
														)
												-> field("
														ry_jobs.*, ry_employers.*
														")
												-> where($condition) ->limit($Page->firstRow.','.$Page->listRows) -> select();
		}else{
			$this->error("Error!");
		}
		
		$msg["page"]=$show;
		//10
		/////var_dump("dfassafdsa");
		/////var_dump($data["tb_jobs"]);
		$this->assign("msg",$msg);
		$this->assign("data",$data);
                $this->display();
		//http://xeno.recrazy.net/index.php?s=Jobs/lists/location/supply/cat_id/0?l=en-us
		//http://xeno.recrazy.net/index.php?s=Jobs/lists/location/all/cat_id/0?l=en-us
    }

	public function job()
    {
		$msg = array("title"=>array("en-us" => "Job",
									"zh-cn" => "产品")
					);
		
		// 1 Table jobs
		$tb_jobs = M("jobs");
		
		$condition = array("ry_jobs.job_id"=>$_GET["id"]);
		
		$data["tb_jobs"] = $tb_jobs -> table("ry_jobs")
												-> join(
														array(
																"ry_employers ON ry_jobs.employer_id=ry_employers.employer_id"
															)
														)
												-> field("
														ry_jobs.*, ry_employers.*
														")
												//*/
												-> where($condition) -> find();
		
		
		/////var_dump($data);
		$this->assign("msg",$msg);
		$this->assign("data",$data);
        $this->display();
	}
}
?>