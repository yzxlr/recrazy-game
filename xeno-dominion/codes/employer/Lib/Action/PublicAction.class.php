<?php
// 本文档自动生成，仅供测试运行
class PublicAction extends Action
{
    /**
    +----------------------------------------------------------
    * 默认操作
    +----------------------------------------------------------
    */
    public function index()
    {
		/*
        //0. Initialization
		//0.1 Global variables
		$user = array();
		//0.2 Define Tables
		$tb_users = M("users");
		//0.4 Condition
		$condition = array();
		//0.8 Error: error pool
		$error_pool = array();
		//0.9 massenger
		$msg = array("title"=>"Login"); 
		//1. Table users
		//1.1 Update
		//1.2 Select
		$user = $tb_users -> where() -> select();
		
		//10. Display
		$this->assign("error_pool",$error_pool);
		$this->assign("msg",$msg);
        $this->display();
		
		//*/
    }

    public function login()
    {
		//0. Initialization
		//0.1 Global variables
		$user = array();
		//0.2 Define Tables
		$tb_users = M("users");
		//0.4 Condition
		$condition = array();
		//0.8 Error: error pool
		$error_pool = array();
		//0.9 massenger
		$msg = array("title"=>"Login"); 
		//1. Table users
		//1.1 Update
		//1.2 Select
		if(!empty($_POST["user_name"])){
			$condition_check["user_name"] = $_POST["user_name"];
			$condition_check["user_password"] = md5($_POST["user_password"]);
			$user_count = $tb_users -> where($condition_check) -> count();
			if($user_count>0){
				$user = $tb_users -> where($condition_check) -> find();
				if($user["role"]<=10){
					$_SESSION["user"] = $user;
					$this->assign("jumpUrl","/employer.php?s=Index/index");
					$this->success('You login successfully!');
					//$this->redirect('Index/index', array(), 3, 'You login successfully!');
				}else{
					$this->error("You are not a biz user!");
				}
			}else{
				$this->error("User name or password incorrect!");
			}
			
		}
		
		
		//10. Display
		$this->assign("error_pool",$error_pool);
		$this->assign("msg",$msg);
        $this->display();
    }
	
	public function logout(){
		$_SESSION["user"]=null;
		$this->assign("jumpUrl","/biz.php?s=Public/login");
		$this->success('You logout successfully!');
		//$this->redirect('Public/login', array(), 3, 'You logout successfully!');
	}
	
	Public function verify(){
		import("ORG.Util.Image");
		Image::buildImageVerify();
	}
}
?>