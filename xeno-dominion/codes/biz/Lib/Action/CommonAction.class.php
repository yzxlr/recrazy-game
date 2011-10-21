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
		$http = (isset($_SERVER['HTTPS'])&&$_SERVER['HTTPS']!='off')?'https://':'http://';  
		$port = $_SERVER["SERVER_PORT"]==80?'':':'.$_SERVER["SERVER_PORT"];  
		$url = $http.$_SERVER['SERVER_NAME'].$port;//.$_SERVER["REQUEST_URI"];
		$this->assign("SITE_URL",$url);
		//define("SITE_URL",$url);
		
		//1 Validate User (only admin can login at here
		if(!empty($_SESSION["user"])){
			$this->user = $_SESSION["user"];
			if($this->user["role"]==10){
				$this->assign("user",$this->user);
			}else{
				$this->assign("jumpUrl","/biz.php?s=Public/login");
				$this->error('You are not biz user!');
			}
		}else{
			$this->assign("jumpUrl","/biz.php?s=Public/login");
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

}
?>