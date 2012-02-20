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
		$tb_products = M("products");
		//0.3 Page
		import("ORG.Util.Page");
		//0.4 conditon
		$condition = array();
		//0.9 massenger
		$msg = array("title"=>"List Products"); 
		
		//1. Table product
		$count = $tb_products ->where($condition) ->count();
		$Page = new Page($count,25);
		$show = $Page->show();
		$msg["page"]=$show;
		$data["tb_products"] = $tb_products ->where($condition) ->limit($Page->firstRow.','.$Page->listRows) -> select();
		
		//10. Display
		/////var_dump($data);
		$this->assign("data",$data);
		$this->assign("msg",$msg);
        $this->display();
    }
	
	public function delete(){
		$user = $_SESSION["user"];
		$tb_products = M("products");
		if($tb_products->where(array("pid"=>$_GET["pid"]))->delete()){
			$this->assign("waitSecond", "0"); 
			$this->assign("jumpUrl", SITE_URL."/admin.php?s=Product/index"); 
			$this->success("Deleted!");
		}else{
			$this->assign("waitSecond", "0"); 
			$this->assign("jumpUrl", SITE_URL."/admin.php?s=Product/index"); 
			$this->error("Error on deleting");
		}
	}
	
	public function add(){
		//1 display Category
		require(CMS_PATH."/admin/Common/class.php");
		
		$Tree = new Tree('Root Category');
		
		$category = M('productsCat');
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
		
		// Upload image
		if($_POST){
			import("ORG.Net.UploadFile");
			$upload = new UploadFile(); // 实例化上传类
			$upload->maxSize  = 2088576 ; // 设置附件上传大小/ 2 MB
			$upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg'); // 设置附件上传类型
			$upload->savePath =  CMS_PATH.'/public/uploads/images/'; // 设置附件上传目录
			$upload->saveRule = 'uniqid';
			// thumb => 
			if(!empty($_POST["thumbMaxWidth"])||!empty($_POST["thumbMaxHeight"])){
				$upload->thumb = true;
				if(trim($_POST["thumbMaxWidth"])!="")$upload->thumbMaxWidth = $_POST["thumbMaxWidth"]; else $upload->thumbMaxWidth = 4096;
				if(trim($_POST["thumbMaxHeight"])!="")$upload->thumbMaxHeight = $_POST["thumbMaxHeight"]; else $upload->thumbMaxHeight = 4096;
			}
			unset($_POST["thumbMaxWidth"]);
			unset($_POST["thumbMaxHeight"]);
			// <= thumb
			if(!$upload->upload()) { // 上传错误 提示错误信息
				//$this->error($upload->getErrorMsg());
			}else{ // 上传成功 获取上传文件信息
				$info =  $upload->getUploadFileInfo();
			}
		}
		
		//Table products
		//3 table products
		$tb_products = M("products");
		if($_POST){ 
		/////var_dump($_POST); /////var_dump($tb_products);
			if($tb_products->create()){
				if(!empty($info[0]["savename"])){
					/////var_dump($info);
					$tb_products->image = "";
					foreach($info as $key => $value){
						$tb_products->image .= /*$info[0]["savepath"].*/$info[$key]["savename"].",";
					}
					$tb_products->image = rtrim($tb_products->image,",");
					
				}else{
					$tb_products->image = "";
				}
				$tb_products->time_add = time();
				if(trim($_POST["time_expire"])!="")$_POST["time_expire"]=strtotime($_POST["time_expire"]);
				$tb_products->time_expire = $_POST["time_expire"];
				if(empty($_POST["user_id"])) $tb_products->user_id = $this->user["uid"];
				if($tb_products->add()){
					$this->success("Insert Successfully!");
				}else{
					$this->error("Error on insert!".$tb_products->getError());
				}
			}else{
				$this->error("Error on create!".$tb_products->getError());
			}
		}
		$this->display();
	}
	
	
	
	public function edit(){
		//1 display Category
		require(CMS_PATH."/admin/Common/class.php");
		
		$Tree = new Tree('Root Category');
		
		$category = M('productsCat');
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
		
		// Upload image
		if($_POST){
			import("ORG.Net.UploadFile");
			$upload = new UploadFile(); // 实例化上传类
			$upload->maxSize  = 2088576 ; // 设置附件上传大小/ 2 MB
			$upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg'); // 设置附件上传类型
			$upload->savePath =  CMS_PATH.'/public/uploads/images/'; // 设置附件上传目录
			$upload->saveRule = 'uniqid';
			// thumb => 
			if(!empty($_POST["thumbMaxWidth"])||!empty($_POST["thumbMaxHeight"])){
				$upload->thumb = true;
				if(trim($_POST["thumbMaxWidth"])!="")$upload->thumbMaxWidth = $_POST["thumbMaxWidth"]; else $upload->thumbMaxWidth = 4096;
				if(trim($_POST["thumbMaxHeight"])!="")$upload->thumbMaxHeight = $_POST["thumbMaxHeight"]; else $upload->thumbMaxHeight = 4096;
			}
			unset($_POST["thumbMaxWidth"]);
			unset($_POST["thumbMaxHeight"]);
			// <= thumb
			if(!$upload->upload()) { // 上传错误 提示错误信息
				//$this->error($upload->getErrorMsg());
			}else{ // 上传成功 获取上传文件信息
				$info =  $upload->getUploadFileInfo();
			}
		}
		
		//Table products
		//3 table products
		$tb_products = M("products");
		
		//debug start here
		$current_product = $tb_products->where(array("pid"=>$_GET["pid"]))->find(); 
		$data["images"] = explode(",",$current_product["image"]); 
		//var_dump($data["images"]);
		//exit;
		if($_POST){ 
		/////var_dump($_POST); /////var_dump($tb_products);
			if($tb_products->create()){
				if(!empty($info[0]["savename"])){
					if(empty($current_product["image"]))
						$tb_products->image = "";
					else 
						$tb_products->image = $current_product["image"].",";
					foreach($info as $key => $value){
						$tb_products->image .= /*$info[0]["savepath"].*/$info[$key]["savename"].",";
					}
					$tb_products->image = rtrim($tb_products->image,",");
				}else{
					$tb_products->image = "";
				}
				$tb_products->pid = $_GET["pid"];
				$tb_products->time_modify = time();
				if(trim($_POST["time_expire"])!="")$_POST["time_expire"]=strtotime($_POST["time_expire"]);
				$tb_products->time_expire = $_POST["time_expire"];
				if(empty($_POST["user_id"])) unset($tb_products->user_id);
				if($tb_products->save()){
					$this->success("Insert Successfully!");
				}else{
					$this->error("Error on insert!".$tb_products->getError());
				}
			}else{
				$this->error("Error on create!".$tb_products->getError());
			}
		}
		
		$data["tb_products"] = $tb_products->where(array("pid"=>$_GET["pid"]))->find();
		/////var_dump($new_cat);
		$this->assign("data",$data);
		$this->display();
	}
	
	public function del_img(){
		$tb_products = M("products");
		$image_path = CMS_PATH.'/public/uploads/images/';

		 
		$rv = array();
		if(!empty($_GET["pid"])){
			$_GET["img_name"] = trim(urldecode($_GET["img_name"]));
			$current_product = $tb_products->where(array("pid"=>$_GET["pid"]))->find();
			$images = explode(",",$current_product["image"]);
			foreach($images as $key => $value){
				if($value == $_GET["img_name"]){
					//delete file on file system
					$image_path = $image_path.$_GET["img_name"];
					if(file_exists($image_path)){
						
						if (@unlink($image_path) === true) {
							unset($images[$key]);
						} else {
							
						}
					}else{
						unset($images[$key]);
					}
					//delete in db
					
				}
			}
			//save new file data back to db
			$data1["pid"] = $_GET["pid"];
			$data1["image"] = implode($images,",");
			if($tb_products->save($data1)){
				$rv["status"] = 1;
			}else{
				$rv["status"] = 0;
			}
		}
		$this->ajaxReturn($rv);
	}
	
	
	public function lang_index(){
		 //0. Initialization
		//0.1 Global variables
		$user = $_SESSION["user"];
		//0.2 Define Tables
		$tb_products_lang = M("productsLang");
		//0.3 Page
		import("ORG.Util.Page");
		//0.4 conditon
		$condition = array();
		//0.9 massenger
		$msg = array("title"=>"List Products Lanugage"); 
		
		//1 Table products_lang
		$condition = array("pid"=>$_GET["product_id"]);
		$count = $tb_products_lang ->where($condition) ->count();
		$Page = new Page($count,25);
		$show = $Page->show();
		$msg["page"]=$show;
		$data["tb_products_lang"] = $tb_products_lang -> where($condition) ->select();
		
		/////var_dump($data);
		$this->assign("data",$data);
		$this->display();
	}
	
	public function lang_del(){
		$tb_products_lang = M("productsLang");
		
		//1 Table products_lang
		if($tb_products_lang ->where(array("plid"=>$_GET["plid"]))-> delete()){
			$this->success("Deleted.");
		}else{
			$this->error("Error!");
		}
		
	}
	
	public function lang_add(){
		//0. Initialization
		//0.1 Global variables
		$user = $_SESSION["user"];
		//0.2 Define Tables
		$tb_langs = M("langs");
		$tb_products_lang = M("productsLang");
		//0.9 massenger
		$msg = array("title"=>"Add New Products Lanugage"); 
		
		//1 Table langs
		//1.4 select
		$data["tb_langs"]=$tb_langs->where("lang_status <> 0")->select();
		
		//2 Table products_lang
		//2.1
		if($_POST){
			if($tb_products_lang->create()){
				if($tb_products_lang->add()){
					$this->success("New record added!");
				}else{
					$this->error("Error on add new record!");
				}
			}else{
				$this->error("Error on create!");
			}
		}
		
		//10. Display
		/////var_dump($data);
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
		$tb_products_lang = M("productsLang");
		//0.9 massenger
		$msg = array("title"=>"Update Products Lanugage"); 
		
		//1 Table langs
		//1.4 select
		$data["tb_langs"]=$tb_langs->where("lang_status <> 0")->select();
		
		//2 Table products_lang
		//2.1
		if($_POST){
			if($tb_products_lang->create()){
				if($tb_products_lang->save()){
					$this->success("Record updated!");
				}else{
					$this->error("Error on update record!");
				}
			}else{
				$this->error("Error on create!");
			}
		}
		//2.4 
		$data["tb_products_lang"] = $tb_products_lang ->where(array("plid"=>$_GET["plid"])) -> find(); 
		
		
		/////var_dump($data);
		$this->assign("data",$data);
		$this->display();
	}
}
?>