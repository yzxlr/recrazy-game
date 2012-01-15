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
	
	public function test(){
		$tb_product_cat = M("productsCat");
		
		$cats = $tb_product_cat
								->table("ry_products_cat")
								->join("ry_products_cat_lang on ry_products_cat_lang.cat_id = ry_products_cat.cat_id")
								->field("ry_products_cat.*, ry_products_cat_lang.lang_code AS cat_lang_code")
								//->where(array("ry_products_cat_lang.lang_code"=>LANG_SET))
								->select();
		var_dump($cats);
		$this->display();
	}

}
?>