<?php
// 本文档自动生成，仅供测试运行
class PageAction extends Action
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
	}
	
    public function index()
    {
		$data = array();
		$msg = array("title"=>"Page");
		$tb_page = M("page");
		
		$data["tb_page"] = $tb_page  ->table('ry_page')-> join("ry_page_lang on ry_page.page_id = ry_page_lang.page_id ")
									 -> field("ry_page.*, 
									 			ry_page_lang.page_lang_id AS tj_id, 
												ry_page_lang.page_id AS tjfk_page_id, 
												ry_page_lang.lang_code AS tj_lang_name, 
												ry_page_lang.lang_name AS tj_title,
												ry_page_lang.page_title AS tj_summary,
												ry_page_lang.page_summary AS tj_summary,
												ry_page_lang.page_content AS tj_content
											") 
									 -> where(array("ry_page.page_id"=>$_GET["id"], "lang_code"=>LANG_SET)) ->find();
		
		if(empty($data["tb_page"])){
			$data["tb_page"] = $tb_page -> where(array("page_id"=>$_GET["id"])) ->find();
		}
		
		/////var_dump($data);
		$this->assign("data",$data);
		$this->assign("msg",$msg);
        $this->display();
    }

}
?>