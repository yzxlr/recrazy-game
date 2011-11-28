<?php
// 本文档自动生成，仅供测试运行
class ProductAction extends CommonAction
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
		//0.2 Define Tables
		$tb_product = M("product");
		//0.9 massenger
		$msg = array("title"=>"List Products"); 
		
		//1. Table product
		$data["tb_product"] = $tb_product -> select();
		
		//10. Display
		$this->assign("data",$data);
		$this->assign("msg",$msg);
        $this->display();
    }
	
	
}
?>