<?php
// 本文档自动生成，仅供测试运行
class IndexAction extends Action
{
    /**
    +----------------------------------------------------------
    * 默认操作
    +----------------------------------------------------------
    */
	protected $user = array(); 
    public function _initialize(){
		//0. Initialization
		//0.1 Global variables
		$http = (isset($_SERVER['HTTPS'])&&$_SERVER['HTTPS']!='off')?'https://':'http://';  
		$port = $_SERVER["SERVER_PORT"]==80?'':':'.$_SERVER["SERVER_PORT"];  
		$url = $http.$_SERVER['SERVER_NAME'].$port;//.$_SERVER["REQUEST_URI"];
		$this->assign("SITE_URL",$url);
		//define("SITE_URL",$url);
		
		
		//2 load location
		$tb_region = M("region");
		$regions = $tb_region -> where(array("region_lang_code"=>"en-us")) -> select();
		$this->assign("all_regions",$regions);
		
		//3  Assign Category
		$temp_cat = $this->GetCategoriesL2();
		$this->assign("categories",$temp_cat);
		
		
	}
	public function GetCategoriesL2(){  //get 2 levels of category (root and one sub level category
		$tb_product_cat = M("productsCat");
		
		$cats = $tb_product_cat
				->table("ry_products_cat")
				->join("ry_products_cat_lang on ry_products_cat_lang.cat_id = ry_products_cat.cat_id AND ry_products_cat_lang.lang_code ='".LANG_SET."'")
				->field("ry_products_cat.*, ry_products_cat_lang.catlang_id, ry_products_cat_lang.lang_code AS cat_lang_code, 
							ry_products_cat_lang.lang_name AS cat_lang_name, ry_products_cat_lang.cat_name AS cat_name_with_lang")
				->select();
		
		foreach($cats as $key => $cat){
			if($cat["parent_id"]==0){
				foreach($cats as $key_child => $cat_child){
					if($cat_child["parent_id"]==$cat["cat_id"]){
						$cats[$key]["child_cats"][] = $cat_child;
						unset($cats[$key_child]);
					}
				}
			}
			/////var_dump($cat);
		}
		/////var_dump($cats);
		return $cats;
	}
	
    public function index()
    {
		if(isset($_REQUEST['ref'])){
			$_SESSION["ref"] = $_REQUEST['ref'];
			//var_dump($_SESSION["ref"]);
		}
		
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
        
        /*
        public function mkdir(){
            $today = '2012-01-01'; //date('Y-m-d');
            echo $today."<br/>";
            
            $ten_days_later=date('Y-m-d',  strtotime("$today + 1 day"));
            echo $ten_days_later;
            //create 1 year folders
            $base_dir = $_SERVER['DOCUMENT_ROOT'].'/public/uploads/user';
            echo $base_dir;
            
            
            for($i=1;$i<=730;$i++){
                $new_time = strtotime("$today + $i day");
                $new_year = date('Y',$new_time);
                $new_month = date('m',$new_time);
                $new_day = date('d',$new_time);
                if(!is_dir($base_dir."/".$new_year)) 
                {
                    mkdir($base_dir."/".$new_year);
                }
                
                if(!file_exists($base_dir."/".$new_year."/index.html")) 
                {
                    fopen($base_dir."/".$new_year."/index.html","w");
                }
                    
                if(!is_dir($base_dir."/".$new_year."/".$new_month)) 
                {
                    mkdir($base_dir."/".$new_year."/".$new_month);
                }
                
                if(!file_exists($base_dir."/".$new_year."/".$new_month."/index.html")) 
                {
                    fopen($base_dir."/".$new_year."/".$new_month."/index.html","w");
                }
                    
                if(!is_dir($base_dir."/".$new_year."/".$new_month."/".$new_day)) 
                {
                    mkdir($base_dir."/".$new_year."/".$new_month."/".$new_day);
                }
                
                if(!file_exists($base_dir."/".$new_year."/".$new_month."/".$new_day."/index.html")) 
                {
                    fopen($base_dir."/".$new_year."/".$new_month."/".$new_day."/index.html","w");
                }
            }
        }*/

}
?>