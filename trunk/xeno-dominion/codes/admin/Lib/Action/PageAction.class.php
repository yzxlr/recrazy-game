<?php
// 本文档自动生成，仅供测试运行
class PageAction extends CommonAction
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
		$tb_page = M("page");
		//0.3 Page
		import("ORG.Util.Page");
		//0.4 conditon
		$condition = array();
		//0.9 massenger
		$msg = array("title"=>"List Pages"); 
		
		//1. Table page
		//1.4.2 Pagging 
		$count = $tb_page->where($condition)->count();
		$Page = new Page($count,25);
		$show = $Page->show();
		$msg["page"]=$show;
		
		$data["tb_page"] = $tb_page ->where($condition) ->limit($Page->firstRow.','.$Page->listRows) -> select();
		
		//10. Display
		$this->assign("data",$data);
		$this->assign("msg",$msg);
        $this->display();
    }


}
?>