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
		
		//1 
		if(!empty($_SESSION["user"])){
			$this->user = $_SESSION["user"];
			$this->assign("user",$this->user);
		}else{
			$this -> redirect("Public/login", "Manage");
		}
		
	}
	
	public function rbac($user_id, $user_action){
		return true;
	}

}
?>