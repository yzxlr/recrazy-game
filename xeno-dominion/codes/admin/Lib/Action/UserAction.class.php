<?php
// 本文档自动生成，仅供测试运行
class UserAction extends CommonAction
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
		$tb_users = M("users");
		//0.8 Error: error pool
		$error_pool = array();
		//0.9 massenger
		$msg = array(); 
		//1. Table users
		
		
		//10. Display
        $this->display();
    }

	public function add(){
		//0. Initialization
		//0.1 Global variables
		//0.2 Define Tables
		$tb_users = M("users");
		//0.8 Error: error pool
		$error_pool = array();
		//0.9 massenger
		$msg = array("title"=>"Add New User"); 
		
		//1. Table Users
		//1.1 
		//1.2 Add User
		if(isset($_POST["user_name"])){
			$data1["role"] = trim($_POST["user_role"]);
			$data1["user_name"] = trim($_POST["user_name"]);
			$data1["user_email"] = trim($_POST["user_email"]);
			$data1["user_password"] = md5(trim($_POST["user_password"]));
			if($tb_users->add($data1)){
				$this->assign("jumpUrl","/admin.php?s=User/index");
				$this->Success('Add New User Failed');
			}else{
				$this->assign("jumpUrl","/admin.php?s=User/add");
				$this->error('Add New User Failed');
			}
		}
		
		
		//9. RBAC
		$msg["user_roles"] = $this->getUserRoles();
		
		//10. Display
		$this->assign("error_pool",$error_pool);
		$this->assign("msg",$msg);
		$this->display();
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}
?>