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
		
		//1
		//1.4 
		$data["tb_page"] = $tb_page -> where(array("page_id"=>$_GET["id"])) ->find();
		
		var_dump($data);
		$this->assign("data",$data);
		$this->assign("msg",$msg);
        $this->display();
    }

}
?>