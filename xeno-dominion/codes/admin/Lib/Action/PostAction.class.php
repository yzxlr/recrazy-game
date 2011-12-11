<?php
// 本文档自动生成，仅供测试运行
class PostAction extends CommonAction
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
		$tb_page = M("post");
		//0.3 Page
		import("ORG.Util.Page");
		//0.4 conditon
		$condition = array();
		//0.9 massenger
		$msg = array("title"=>"List Posts"); 
		
		//1. Table page
		//1.4.2 Pagging 
		$count = $tb_page->where($condition)->count();
		$Page = new Page($count,25);
		$show = $Page->show();
		$msg["page"]=$show;
		
		$data["tb_post"] = $tb_page ->where($condition) ->limit($Page->firstRow.','.$Page->listRows) -> select();
		
		//10. Display
		/////var_dump($data["tb_post"]);
		$this->assign("data",$data);
		$this->assign("msg",$msg);
        $this->display();
    }

	public function add()
    {
		//1 Get category data
		require(CMS_PATH."/admin/Common/class.php");
		
		$Tree = new Tree('Root Category');
		
		$category = M('postCat');
		$condition['is_show'] = '1';
		// 把查询条件传入查询方法
		$cat_value = $category->where($condition)->order('parent_id asc')->select();
		foreach ($cat_value AS $id => $row)
		{
			$Tree->setNode($row['cat_id'], $row['parent_id'], $row['cat_name']);
		}
		$category = $Tree->getChilds();

		//遍历输出
		$new_cat = array();
		foreach ($category as $key=>$id)
		{
			$new_cat[$id] = $Tree->getLayer($id, '--').$Tree->getValue($id);
		}

		$this->assign("categoty",$new_cat); 
		
		//1 Table 
		$tb_page = M("post");
		if($_POST){
			$_POST["post_create"]=DATETIME_NOW;
			if($tb_page->add($_POST)){
				$this->assign("jumpUrl",SITE_URL."/admin.php?s=/Post/index");
				$this->success("New page added!");
			}else{
				$this->error("Error when try to add!");
			}
		}
		/////var_dump($new_cat);
		$this->display();
	}
	
	public function update()
    {
		 //0. Initialization
		//0.1 Global variables
		$user = $_SESSION["user"];
		//0.2 Define Tables
		$tb_post = M("post");
		//0.3 Page
		import("ORG.Util.Page");
		//0.4 conditon
		$condition = array();
		//0.9 massenger
		$msg = array("title"=>"Update Pages"); 
		$data = array();
		
		//1 Get category data
		require(CMS_PATH."/admin/Common/class.php");
		
		$Tree = new Tree('Root Category');
		
		$category = M('postCat');
		$condition['is_show'] = '1';
		// 把查询条件传入查询方法
		$cat_value = $category->where($condition)->order('parent_id asc')->select();
		foreach ($cat_value AS $id => $row)
		{
			$Tree->setNode($row['cat_id'], $row['parent_id'], $row['cat_name']);
		}
		$category = $Tree->getChilds();

		//遍历输出
		$new_cat = array();
		foreach ($category as $key=>$id)
		{
			$new_cat[$id] = $Tree->getLayer($id, '--').$Tree->getValue($id);
		}

		$this->assign("categoty",$new_cat); 
		/////var_dump($new_cat);
		
		//2 Table page
		//2.1 add
		if($_POST){
			$_POST["post_modify"]=DATETIME_NOW;
			if($tb_post->save($_POST)){
				$this->assign("jumpUrl",SITE_URL."/admin.php?s=/Post/index");
				$this->success("Page updated!");
			}else{
				$this->error("Error when try to update!");
			}
		}
		//2.4 select
		$data["tb_post"]=$tb_post->where(array("post_id"=>$_GET["post_id"]))->find();
		
		//10. Display
		/////var_dump($data);
		$this->assign("data",$data);
		$this->assign("msg",$msg);
		$this->display();
	}
	
	public function del()
    {
		$tb_post = M("post");
		if(!empty($_GET["post_id"])){
			if($tb_post->where(array("post_id"=>$_GET["post_id"]))->delete()){
				$this->assign("jumpUrl",SITE_URL."/admin.php?s=/Post/index");
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
		$tb_post_lang = M("postLang");
		//0.3 Page
		import("ORG.Util.Page");
		//0.4 conditon
		$condition = array();
		//0.9 massenger
		$msg = array("title"=>"Post Language List"); 
		
		//1 Table langs
		//1.4 select
		$data["tb_langs"]=$tb_langs->where("lang_status <> 0")->select();
		
		//2 Table page_lang
		//2.4
		$condition=array("post_id"=>$_GET["post_id"]);
		$data["tb_post_lang"]=$tb_post_lang->where($condition)->select();
		
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
		$tb_post_lang = M("postLang");
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
			if($tb_post_lang->add($_POST)){
				$this->assign("jumpUrl", SITE_URL."/admin.php?s=/Post/lang_index/post_id/".$_POST["post_id"]);
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
		$tb_post_lang = M("postLang");
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
			if($tb_post_lang->save($_POST)){
				$this->assign("jumpUrl", SITE_URL."/admin.php?s=/Post/lang_index/post_id/".$_POST["post_id"]);
				$this->success("Updated!");
			}else{
				$this->error("Error when Update!");
			}
		}
		//2.4 select
		$data["tb_post_lang"]=$tb_post_lang->where(array("post_lang_id"=>$_GET["post_lang_id"]))->find();
		//10. Display
		$this->assign("data",$data);
		$this->assign("msg",$msg);
        $this->display();
	}
	
	public function lang_del(){
		$tb_post_lang = M("postLang");
		if(!empty($_GET["post_lang_id"])){
			if($tb_post_lang->where(array("post_lang_id"=>$_GET["post_lang_id"]))->delete()){
				$this->assign("jumpUrl", SITE_URL."/admin.php?s=/Post/lang_index/post_id/".$_POST["post_id"]);
				$this->success("Page Language deleted!");
			}else{
				$this->error("Error when try to Delete!");
			}
		}
	}

}
?>