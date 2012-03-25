<?php
// 本文档自动生成，仅供测试运行
class JobsAction extends CommonAction
{
    /**
    +----------------------------------------------------------
    * 默认操作
    +----------------------------------------------------------
    */
    public function index()
    {
		$msg = array("title"=>array("en-us" => "Job Home","zh-cn" => "HR 首页")
					);
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
                
		$location = trim($_GET["location"]);
                $cat_id = 0;
		if(isset($_GET["cat_id"])){$cat_id = $_GET["cat_id"];}
                
		//echo getCategoryNameById($cat_id);exit;
		//1 Table .get all subcategories
		$data["tb_jobs_cat"] = $tb_jobs_cat ->table('ry_jobs_cat') -> where(array("ry_jobs_cat.parent_id"=>$cat_id, "ry_jobs_cat.is_show"=>1)) -> select();
		foreach($data["tb_jobs_cat"] as $key => $value){
			$cat_id .= ",". $value["cat_id"];
		}
		
		/////var_dump($location); var_dump($cat_id);exit;
		//tables
		if(!empty($location)&&isset($cat_id)){
			
			if($location=="supply")$location=1;
			else if($location=="demand")$location=2;
			else $location= 0;
			
			
			if($location=="all")
				$condition = array("ry_jobs.cat_id"=>array("IN",$cat_id));
			else
				$condition = array("ry_jobs.cat_id"=>array("IN",$cat_id), 
							       "ry_jobs.type"=>$location);
			
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
														array(
																"ry_jobs_lang ON ry_jobs.pid = ry_jobs_lang.pid AND ry_jobs_lang.lang_code='".LANG_SET."'" ,
																"ry_region ON ry_jobs.location_code = ry_region.region_code AND ry_region.region_lang_code='".LANG_SET."'",
																"ry_users ON ry_jobs.user_id = ry_users.uid"
															)
														)
												-> field("
														ry_jobs.*, 
														ry_jobs_lang.plid, ry_jobs_lang.lang_code, ry_jobs_lang.name AS lang_name, ry_jobs_lang.description AS lang_description, 
														ry_region.*,
														ry_users.user_email
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
		
		$condition = array("ry_jobs.pid"=>$_GET["id"]);
		
		$data["tb_jobs"] = $tb_jobs -> table("ry_jobs")
												-> join(
														array(
																"ry_jobs_lang ON ry_jobs.pid = ry_jobs_lang.pid AND ry_jobs_lang.lang_code='".LANG_SET."'" ,
																"ry_region ON ry_jobs.location_code = ry_region.region_code AND ry_region.region_lang_code='".LANG_SET."'"
															)
														)
												-> field("
														ry_jobs.*, 
														ry_jobs_lang.plid, ry_jobs_lang.lang_code, ry_jobs_lang.name AS lang_name, ry_jobs_lang.description AS lang_description, 
														ry_region.*
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