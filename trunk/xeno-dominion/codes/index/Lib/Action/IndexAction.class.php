<?php
// 本文档自动生成，仅供测试运行
class IndexAction extends CommonAction
{
    /**
    +----------------------------------------------------------
    * 默认操作
    +----------------------------------------------------------
    */
    public function index()
    {
        //0. Initialization
		//0.1 Global variables
		$user = $_SESSION["user"];
		
		//0.9 massenger
		$msg = array("title"=>"xxxx"); 
		//1. Table users
		
		/////var_dump($user);
		//10. Display
        $this->display();
    }

}
?>