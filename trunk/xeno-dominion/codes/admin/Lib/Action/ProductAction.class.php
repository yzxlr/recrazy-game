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
		//0.9 massenger
		$msg = array("title"=>"List Products"); 
		
		//1. Table product
		$data["tb_products"] = $tb_products -> select();
		
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
					$tb_products->image = /*$info[0]["savepath"].*/$info[0]["savename"];
				}else{
					$tb_products->image = "";
				}
				$tb_products->time_add = time();
				if(trim($_POST["time_expire"])!="")$_POST["time_expire"]=strtotime($_POST["time_expire"]);
				$tb_products->time_expire = $_POST["time_expire"];
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
		if($_POST){ 
		/////var_dump($_POST); /////var_dump($tb_products);
			if($tb_products->create()){
				if(!empty($info[0]["savename"])){
					$tb_products->image = /*$info[0]["savepath"].*/$info[0]["savename"];
				}else{
					$tb_products->image = "";
				}
				$tb_products->pid = $_GET["pid"];
				$tb_products->time_modify = time();
				if(trim($_POST["time_expire"])!="")$_POST["time_expire"]=strtotime($_POST["time_expire"]);
				$tb_products->time_expire = $_POST["time_expire"];
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
	
}
?>