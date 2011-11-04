<?php
// 本文档自动生成，仅供测试运行
class CommonAction extends Action
{
	/**
	*  所有的公用的东西都可以放在这里。
	*   $this->assign('var',$value);都可以用。下面的方法都会调用这个initialize里面的内  容
	*/
	
	protected $user = array(); 
    public function _initialize(){
		//0. Initialization
		//0.1 Global variables
		//0.1.1 SITE_URL
		$http = (isset($_SERVER['HTTPS'])&&$_SERVER['HTTPS']!='off')?'https://':'http://';  
		$port = $_SERVER["SERVER_PORT"]==80?'':':'.$_SERVER["SERVER_PORT"];  
		$url = $http.$_SERVER['SERVER_NAME'].$port;//.$_SERVER["REQUEST_URI"];
		$this->assign("SITE_URL",$url);
		define("SITE_URL",$url);
		//0.1.2 DATETIME

		$now = date("Y-m-d H:i:s");
		$this->assign("DATETIME_NOW", $now);
		define("DATETIME_NOW", $now);
		
		
		//1 Validate User (only admin can login at here
		if(!empty($_SESSION["user"])){
			$this->user = $_SESSION["user"];
			if($this->user["role"]==0){
				$this->assign("user",$this->user);
			}else{
				$this->assign("jumpUrl",SITE_URL."/admin.php?s=Public/login");
				$this->error('You are not administration user!');
			}
		}else{
			$this->assign("jumpUrl",SITE_URL."/admin.php?s=Public/login");
			$this->error('Please login first!');
			//$this->redirect('Public/login', array(), 3, 'Please login first!');
		}
		
		
	}
	
	
	/*
	 *  这里暂时hardcode
	**/
	public function rbac($user_id, $user_action){
		return true;
	}
	
	/*
	 *  这里暂时hardcode
	**/
	public function getUserRoles(){
		$user_role = array();
		$user_role[2] = array("id"=>100,"name"=>"user");
		$user_role[1] = array("id"=>10,"name"=>"master");
		$user_role[0] = array("id"=>0,"name"=>"admin");
		
		return $user_role;
	}
	
	public function getUserRole($role_num){
		$user_role = array();
		$user_role[100] = "User";
		$user_role[10] = "Master";
		$user_role[0] = "Administrator";
		
		return $user_role[$role_num];
	}

}
?>