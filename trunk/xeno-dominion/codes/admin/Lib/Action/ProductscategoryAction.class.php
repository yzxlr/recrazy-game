<?php
//网站分类管理
class ProductscategoryAction extends CommonAction{
	public function index()
	{
		require(CMS_PATH."/admin/Common/class.php");
		
		$Tree = new Tree('');
		
		$category = M('productsCat');
		// 把查询条件传入查询方法
		$cat_value = $category->order('parent_id asc')->select();

		foreach ($cat_value AS $id => $row)
		{
			$Tree->setNode($row['cat_id'], $row['parent_id'], $row['cat_name']);
		}
		$_cat = $Tree->getChilds();

		foreach ($_cat as $key=>$id)
		{
			$cat_value[$key]['cat_id'] = $id;
			$c_data = $category->where('cat_id='.$id)->find();
			$cat_value[$key]['cat_name'] = $Tree->getLayer($id, '|-').$Tree->getValue($id);
			$cat_value[$key]['parent_id'] = $c_data['parent_id'];
			$cat_value[$key]['sort_order'] = $c_data['sort_order'];
			$cat_value[$key]['is_show'] = $c_data['is_show'];
		}
		
		$this->assign("categoty",$cat_value);
		$this->display();
	}
	public function add()
	{
		require(CMS_PATH."/admin/Common/class.php");
		
		$Tree = new Tree('顶级分类');
		
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
			$new_cat[$id] = $Tree->getLayer($id, '|-').$Tree->getValue($id);
		}

		$this->assign("categoty",$new_cat);
		$this->display();
	}
	public function edit()
	{
		require(CMS_PATH."/admin/Common/class.php");
		
		$cat_id = trim($_REQUEST['cat_id']);
		$Tree = new Tree('顶级分类');
		
		$category = M('productsCat');
		$condition['is_show'] = '1';
		// 把查询条件传入查询方法
		$cat_value = $category->where($condition)->order('parent_id asc')->select();
		$conditions['cat_id'] = $cat_id;
		$cat_data = $category->where($conditions)->find();

		foreach ($cat_value AS $id => $row)
		{
			$Tree->setNode($row['cat_id'], $row['parent_id'], $row['cat_name']);
		}

		$categorys = $Tree->getChilds();

		//遍历输出
		$new_cat = array();
		foreach ($categorys as $key=>$id)
		{
			$new_cat[$id] = $Tree->getLayer($id, '|-').$Tree->getValue($id);
		}
		
        $this->assign("cat_data", $cat_data);
		$this->assign("categoty",$new_cat);
		$this->display();
	}
	public function act_add()
	{
		require(CMS_PATH.'/public/language/admin/common.php');
		$act_array = array('add_category', 'update_category', 'del_category', 'update_category_ajax');
		$category = M('productsCat');
		$get_act = trim($_REQUEST['act']);
		if(in_array($get_act,$act_array))
		{
			if($get_act == 'add_category')
			{
				$data['cat_name'] = trim($_POST['category_name']);
				$data['parent_id'] = $_POST['parent_category'];
				$data['sort_order'] = intval(trim($_POST['category_sort']));
				$data['is_show'] = intval(trim($_POST['is_show']));

				if($category->add($data))
				{
					$this->success($_LANG['result']['add_success']);
				}else{
					$this->error($_LANG['result']['add_fail']);
				}
			}elseif($get_act == 'del_category')
			{
				$cat_id = trim($_REQUEST['id']);
				$condition['cat_id']  = array('in',$cat_id);

				if($category->where($condition)->delete())
				{
					$this->success($_LANG['result']['del_success']);
				}else{
					$this->error($_LANG['result']['add_fail']);
				}
			}elseif($get_act == 'update_category')
			{
				$cat_id = trim($_REQUEST['cat_id']);
				
				$data['cat_name'] = trim($_REQUEST['category_name']);
				$data['parent_id'] = $_REQUEST['parent_category'];
				$data['sort_order'] = intval(trim($_REQUEST['category_sort']));
				$data['is_show'] = intval(trim($_REQUEST['is_show']));
				
				if($category->where('cat_id='.$cat_id)->save($data))
				{
					$this->success($_LANG['result']['edit_success']);
				}else{
					$this->error($_LANG['result']['add_fail']);
				}
			}elseif($get_act == 'update_category_ajax')
			{
				$cat_id = trim($_REQUEST['cat_id']);
				
				$is_ajax = $_REQUEST['is_ajax'];
				$is_show = intval(trim($_REQUEST['is_show'])) == '1' ? 0 : 1;
				
                if($is_ajax == '1')
                {
                	$data['is_show'] = $is_show;
                	if($category->where('cat_id='.$cat_id)->save($data))
                	{
                		if($is_show == '1')
                		{
                			echo "<a href=\"javascript:;\" onClick=\"change_status('".$cat_id."','".$is_show."')\">是</a>";
                		}else{
                			echo "<a href=\"javascript:;\" onClick=\"change_status('".$cat_id."','".$is_show."')\">否</a>";
                		}
                	}else{
                		echo $_LANG['result']['add_fail'];
                	}
                }elseif($is_ajax == '2')
                {
                	$data['sort_order'] = intval(trim($_REQUEST['sort']));
                	
                	if($category->where('cat_id='.$cat_id)->save($data) != false || $category->where('cat_id='.$cat_id)->save($data) == 0)
                	{
                		echo "<a href=\"javascript:;\" onClick=\"change_sort('".$cat_id."','".$data['sort_order']."')\">".$data['sort_order']."</a>";
                	}else{
                		echo $_LANG['result']['add_fail'];
                	}
                }
			}
		}else{
			$this->error($_LANG['error']['fail_control']);
		}
	}
	
	public function lang_index(){
		//0. Initialization
		$tb_productsCat = M("productsCat");
		$tb_productsCatLang = M("productsCatLang");
		import("ORG.Util.Page");
		$condition = array();
		$msg = array("title"=>"List Language"); 
		$data = array();
		
		//1 Table products_cat
		if(!empty($_GET['cat_id'])){
			$data["tb_productsCat"]=$tb_productsCat -> where(array("cat_id"=>$_GET["cat_id"])) -> find();
		}
		
		//2. Table products_cat_lang
		if(!empty($_GET['cat_id'])){
			$condition = array("cat_id"=>$_GET['cat_id']);
			$data["productsCatLang"]=$tb_productsCatLang->where($condition)->select();
		}
		
		//10. Display
		$this->assign("msg",$msg);
		$this->assign("data",$data);
		$this->display();
	}
	
	public function lang_add(){
		//0. Initialization
		$tb_productsCat = M("productsCat");
		$tb_productsCatLang = M("productsCatLang");
		$tb_langs = M("langs");
		$condition = array();
		$msg = array("title"=>"List Language"); 
		$data = array();
		
		//1 Table products_cat
		if(!empty($_GET['cat_id'])){
			$data["tb_productsCat"]=$tb_productsCat -> where(array("cat_id"=>$_GET["cat_id"])) -> find();
		}
		
		//2 Table langs
		$data["tb_langs"]= $tb_langs -> select();
		
		//3 Table products_cat_lang
		if(!empty($_POST['cat_id'])){
			$data3["cat_id"] = $_POST["cat_id"];
			$data3["lang_code"] = $_POST["lang_code"];
			$data3["cat_name"]= $_POST["cat_name"];
			$the_lang = $tb_langs->where(array("lang_code"=>$data3["lang_code"]))->find();
			$data3["lang_name"]= $the_lang["language"];
			if($tb_productsCatLang->add($data3)){
				$msg["info"]=array("class"=>"success","text"=>"New language added.");
			}else{
				$msg["info"]=array("class"=>"error","text"=>"Add language failed. The desire category is already exist.");
			}
		}
		
		//10. Display
		$this->assign("msg",$msg);
		$this->assign("data",$data);
		$this->display();
	}
	
	public function lang_edit(){
		//0. Initialization
		$tb_productsCat = M("productsCat");
		$tb_productsCatLang = M("productsCatLang");
		$tb_langs = M("langs");
		$condition = array();
		$msg = array("title"=>"List Language"); 
		$data = array();
		
		//1 Table products_cat
		if(!empty($_GET['cat_id'])){
			$data["tb_productsCat"]=$tb_productsCat -> where(array("cat_id"=>$_GET["cat_id"])) -> find();
		}
		
		//2 Table langs
		$data["tb_langs"]= $tb_langs -> select();
		
		//3 Table products_cat
		//3.3 update
		if(!empty($_POST['cat_id'])){
			//$data3["cat_id"] = $_POST["cat_id"];
			$data3["lang_code"] = $_POST["lang_code"];
			$data3["cat_name"]= $_POST["cat_name"];
			$the_lang = $tb_langs->where(array("lang_code"=>$data3["lang_code"]))->find();
			$data3["lang_name"]= $the_lang["language"];
			var_dump($data3);
			if($tb_productsCatLang->where(array("catlang_id"=>$_GET["catlang_id"]))->save($data3)){
				$msg["info"]=array("class"=>"success","text"=>"Category language updated.");
			}else{
				$msg["info"]=array("class"=>"error","text"=>"Category language update failed.");
			}
		}
		//3.4 select
		if(!empty($_GET['catlang_id'])){
			$data["tb_productsCatLang"]=$tb_productsCatLang -> where(array("catlang_id"=>$_GET["catlang_id"])) -> find();
		}
		
		//10. Display
		$this->assign("msg",$msg);
		$this->assign("data",$data);
		$this->display();
	}
}
?>