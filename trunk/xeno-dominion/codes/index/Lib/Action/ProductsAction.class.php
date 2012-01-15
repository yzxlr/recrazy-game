<?php
// 本文档自动生成，仅供测试运行
class ProductsAction extends CommonAction
{
    /**
    +----------------------------------------------------------
    * 默认操作
    +----------------------------------------------------------
    */
    public function index()
    {
		$msg = array("title"=>array("en-us" => "Product Home",
									"zh-cn" => "产品首页")
					);
		
		$this->assign("msg",$msg);
		$this->assign("data",$data);
        $this->display();
    }
	
	public function lists()
    {
		$msg = array("title"=>array("en-us" => "List Products",
									"zh-cn" => "产品列表")
					);
		$tb_products = M("products");
		$tb_products_cat = M("productsCat");
		
		$condition =array();
		$flag = trim($_GET["flag"]);
		$cat_id = $_GET["cat_id"];
		
		//1 Table .get all subcategories
		$data["tb_products_cat"] = $tb_products_cat 
												->table('ry_products_cat') 
												/*
												-> join('ry_products_cat_lang on ry_products_cat.cat_id = ry_products_cat_lang.cat_id')
												-> field('ry_products_cat.* , 
															ry_products_cat_lang.catlang_id AS tj_cat_id,
															ry_products_cat_lang.cat_id AS tjfk_cat_id')
												//*/
												-> where(array("ry_products_cat.parent_id"=>$cat_id, "ry_products_cat.is_show"=>1)) -> select();
		foreach($data["tb_products_cat"] as $key => $value){
			$cat_id .= ",". $value["cat_id"];
		}
		
		/////var_dump($flag); var_dump($cat_id);exit;
		//tables
		if(!empty($flag)&&isset($cat_id)){
			
			if($flag=="supply")$flag=1;
			else if($flag=="demand")$flag=2;
			else $flag= 0;
			
			
			if($flag=="all")
				$condition = array("ry_products.cat_id"=>array("IN",$cat_id));
			else
				$condition = array("ry_products.cat_id"=>array("IN",$cat_id), 
							       "ry_products.type"=>$flag);
			
			import("ORG.Util.Page");
			$count = $tb_products -> table("ry_products")
									-> join("ry_products_lang ON ry_products.pid = ry_products_lang.pid AND ry_products_lang.lang_code='".LANG_SET."'")
									-> field("ry_products.*, ry_products_lang.plid, ry_products_lang.lang_code, ry_products_lang.name AS lang_name, ry_products_lang.description AS lang_description")
									-> where($condition)->count();
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
			$data["tb_products"] = $tb_products -> table("ry_products")
												-> join(
														array(
																"ry_products_lang ON ry_products.pid = ry_products_lang.pid AND ry_products_lang.lang_code='".LANG_SET."'" ,
																"ry_region ON ry_products.location_code = ry_region.region_code AND ry_region.region_lang_code='".LANG_SET."'"
															)
														)
												-> field("
														ry_products.*, 
														ry_products_lang.plid, ry_products_lang.lang_code, ry_products_lang.name AS lang_name, ry_products_lang.description AS lang_description, 
														ry_region.*
														")
												-> where($condition) ->limit($Page->firstRow.','.$Page->listRows) -> select();
		}else{
			$this->error("Error!");
		}
		
		$msg["page"]=$show;
		//10
		/////var_dump("dfassafdsa");
		/////var_dump($data["tb_products"]);
		$this->assign("msg",$msg);
		$this->assign("data",$data);
        $this->display();
		//http://xeno.recrazy.net/index.php?s=Products/lists/flag/supply/cat_id/0?l=en-us
		//http://xeno.recrazy.net/index.php?s=Products/lists/flag/all/cat_id/0?l=en-us
    }

	public function product()
    {
		$msg = array("title"=>array("en-us" => "Product",
									"zh-cn" => "产品")
					);
		
		// 1 Table products
		$tb_products = M("products");
		
		$condition = array("ry_products.pid"=>$_GET["id"]);
		
		$data["tb_products"] = $tb_products -> table("ry_products")
												-> join(
														array(
																"ry_products_lang ON ry_products.pid = ry_products_lang.pid AND ry_products_lang.lang_code='".LANG_SET."'" ,
																"ry_region ON ry_products.location_code = ry_region.region_code AND ry_region.region_lang_code='".LANG_SET."'"
															)
														)
												-> field("
														ry_products.*, 
														ry_products_lang.plid, ry_products_lang.lang_code, ry_products_lang.name AS lang_name, ry_products_lang.description AS lang_description, 
														ry_region.*
														")
												//*/
												-> where($condition) -> find();
		
		
		/////var_dump($data);
		$this->assign("msg",$msg);
		$this->assign("data",$data);
        $this->display();
	}

}
?>