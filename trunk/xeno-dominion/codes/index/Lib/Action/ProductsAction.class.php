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
		
		//10
		/////var_dump("dfassafdsa");
		/////var_dump($data);
		$this->assign("msg",$msg);
		$this->assign("data",$data);
        $this->display();
    }
	
	public function lists()
    {
		$msg = array("title"=>"Product List");
		$tb_products = M("products");
		
		$condition =array();
		$flag = trim($_GET["flag"]);
		$cat_id = $_GET["cat_id"];
		
		/////var_dump($flag); var_dump($cat_id);exit;
		//tables
		if(!empty($flag)&&isset($cat_id)){
			
			if($flag=="supply")$flag=1;
			else if($flag=="demand")$flag=2;
			else $flag= 0;
			$condition = array("cat_id"=>$cat_id, 
							   "type"=>$flag);
			
			import("ORG.Util.Page");
			$count = $tb_products->where($condition)->count();
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
			$data["tb_products"] = $tb_products -> where($condition) ->limit($Page->firstRow.','.$Page->listRows) -> select();
		}else{
			$this->error("Error!");
		}
		
		$msg["page"]=$show;
		//10
		/////var_dump("dfassafdsa");
		/////var_dump($data);
		$this->assign("msg",$msg);
		$this->assign("data",$data);
        $this->display();
    }

}
?>