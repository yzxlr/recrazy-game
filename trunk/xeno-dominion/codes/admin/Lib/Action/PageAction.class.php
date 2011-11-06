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

	public function add()
    {
		$tb_page = M("page");
		if($_POST){
			$_POST["page_create"]=DATETIME_NOW;
			if($tb_page->add($_POST)){
				$this->assign("jumpUrl",SITE_URL."/admin.php?s=/Page/index");
				$this->success("New page added!");
			}else{
				$this->error("Error when try to add!");
			}
		}
		$this->display();
	}
	
	public function update()
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
		$msg = array("title"=>"Update Pages"); 
		$data = array();
		
		//1 Table page
		//1.1 add
		if($_POST){
			$_POST["page_modify"]=DATETIME_NOW;
			if($tb_page->save($_POST)){
				$this->assign("jumpUrl",SITE_URL."/admin.php?s=/Page/index");
				$this->success("Page updated!");
			}else{
				$this->error("Error when try to update!");
			}
		}
		//1.4 select
		$data["tb_page"]=$tb_page->where(array("page_id"=>$_GET["page_id"]))->find();
		
		//10. Display
		$this->assign("data",$data);
		$this->assign("msg",$msg);
		$this->display();
	}
	
	public function del()
    {
		$tb_page = M("page");
		if(!empty($_GET["page_id"])){
			if($tb_page->where(array("page_id"=>$_GET["page_id"]))->delete()){
				$this->assign("jumpUrl",SITE_URL."/admin.php?s=/Page/index");
				$this->success("page deleted!");
			}else{
				$this->error("Error when try to Delete!");
			}
		}
	}
	
	public function lang_index(){
		//0. Initialization
		//0.1 Global variables
		$user = $_SESSION["user"];
		//0.2 Define Tables
		$tb_langs = M("langs");
		$tb_page_lang = M("pageLang");
		//0.3 Page
		import("ORG.Util.Page");
		//0.4 conditon
		$condition = array();
		//0.9 massenger
		$msg = array("title"=>"Page Language List"); 
		
		//1 Table langs
		//1.4 select
		$data["tb_langs"]=$tb_langs->where("lang_status <> 0")->select();
		
		//2 Table page_lang
		//2.4
		$condition=array("page_id"=>$_GET["page_id"]);
		$data["tb_page_lang"]=$tb_page_lang->where($condition)->select();
		
		//10. Display
		//var_dump($data);
		$this->assign("data",$data);
		$this->assign("msg",$msg);
        $this->display();
	}
	
	public function lang_add(){
		//0. Initialization
		//0.1 Global variables
		$user = $_SESSION["user"];
		//0.2 Define Tables
		$tb_langs = M("langs");
		$tb_page_lang = M("pageLang");
		//0.3 Page
		import("ORG.Util.Page");
		//0.4 conditon
		$condition = array();
		//0.9 massenger
		$msg = array("title"=>"Page Language Add"); 
		
		//1 Table langs
		//1.4 select
		$data["tb_langs"]=$tb_langs->where("lang_status <> 0")->select();
		
		//2 Table lang
		//2.1
		if($_POST){
			$lang = $tb_langs->where(array("lang_code"=>$_POST["lang_code"]))->find();
			$_POST["lang_name"] = $lang["language"];
			if($tb_page_lang->add($_POST)){
				$this->assign("jumpUrl", SITE_URL."/admin.php?s=/Page/lang_index/page_id/".$_POST["page_id"]);
				$this->success("New page language added!");
			}else{
				$this->error("Error when try to add!");
			}
		}
		
		//10. Display
		$this->assign("data",$data);
		$this->assign("msg",$msg);
        $this->display();
	}
	
	public function lang_update(){
		//0. Initialization
		//0.1 Global variables
		$user = $_SESSION["user"];
		//0.2 Define Tables
		$tb_langs = M("langs");
		$tb_page_lang = M("pageLang");
		//0.3 Page
		import("ORG.Util.Page");
		//0.4 conditon
		$condition = array();
		//0.9 massenger
		$msg = array("title"=>"Page Language Add"); 
		
		//1 Table langs
		//1.4 select
		//$data["tb_langs"]=$tb_langs->where("lang_status <> 0")->select();
		
		//2 Table page_lang
		//2.3 update
		if($_POST){
			if($tb_page_lang->save($_POST)){
				$this->assign("jumpUrl", SITE_URL."/admin.php?s=/Page/lang_index/page_id/".$_POST["page_id"]);
				$this->success("Updated!");
			}else{
				$this->error("Error when Update!");
			}
		}
		//2.4 select
		$data["tb_page_lang"]=$tb_page_lang->where(array("page_lang_id"=>$_GET["page_lang_id"]))->find();
		
		//10. Display
		$this->assign("data",$data);
		$this->assign("msg",$msg);
        $this->display();
	}
	
	public function lang_del(){
		$tb_page_lang = M("pageLang");
		if(!empty($_GET["page_lang_id"])){
			if($tb_page_lang->where(array("page_lang_id"=>$_GET["page_lang_id"]))->delete()){
				$this->assign("jumpUrl", SITE_URL."/admin.php?s=/Page/lang_index/page_id/".$_POST["page_id"]);
				$this->success("Page Language deleted!");
			}else{
				$this->error("Error when try to Delete!");
			}
		}
	}

}
?>