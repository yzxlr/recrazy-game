<?php
// 本文档自动生成，仅供测试运行
class AdsAction extends CommonAction
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
		//0.2 Define Tables
		$tb_ads = M("ads");
		//0.3 Page
		import("ORG.Util.Page");
		//0.4 conditon
		$condition = array();
		//0.8 Error: error pool
		$error_pool = array();
		//0.9 massenger
		$msg = array("title"=>"List Ads"); 
		
		//1. Table Users 
		//1.1 Add User
		//1.4 Select User
		//1.4.1 Post
		//1.4.2 Pagging 
		$count = $tb_ads->where($condition)->count();
		$Page = new Page($count,25);
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
		$this->assign("page",$show);
		//1.4.3 
		$data["tb_ads"] = $tb_ads -> where($condition) ->limit($Page->firstRow.','.$Page->listRows) -> select();
		
		
		
		//10. Display
		$this->assign("data",$data);
		$this->display();
    }

	public function add(){
		$tb_ads = M("ads");
		
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
		
		//2 
		if($_POST){ 
			if($tb_ads->create()){
				//if(!empty($_GET["id"])){
					//$tb_ads->adsId = $_GET["id"];
					$tb_ads->create_date = date("Y-m-d");
					if($tb_ads->add()){
						$this->success("New ads added!");
					}else{
						$this->error("Error when add!");
					}
				//}else{
				//	$this->error("Error: empty adsId!");
				//}
			}else{
				$this->error("Error on create!");
			}
		}
		
		$this->display();
	}
	
	public function edit(){
		$tb_ads = M("ads");
		
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
		
		//2 
		if($_POST){ 
			if($tb_ads->create()){
				if(!empty($_GET["id"])){
					$tb_ads->adsId = $_GET["id"];
					$tb_ads->create_date = date("Y-m-d");
					if($tb_ads->save()){
						$this->success("New ads added!");
					}else{
						$this->error("Error when add!");
					}
				}else{
					$this->error("Error: empty adsId!");
				}
			}else{
				$this->error("Error on create!");
			}
		}
		$data["tb_ads"] = $tb_ads->where(array("adsId"=>$_GET["id"]))->find();
		/////var_dump($data);
		
		$this->assign("data",$data);
		$this->display();
	}
	
	
	public function del(){
		$tb_ads = M("ads");
		if(!empty($_GET['id'])){
			if($tb_ads->where(array("adsId"=>$_GET['id']))->delete()){
				$this->success("The ads successfully deleted!");
			}else{
				$this->error("Error when delete ads!");
			}
		}
	}
	
}
?>