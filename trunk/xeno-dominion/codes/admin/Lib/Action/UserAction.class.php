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
		//0.3 Page
		import("ORG.Util.Page");
		//0.4 conditon
		$condition = array();
		//0.8 Error: error pool
		$error_pool = array();
		//0.9 massenger
		$msg = array("title"=>"List Users"); 
		
		//1. Table Users 
		//1.1 Add User
		//1.4 Select User
		//1.4.1 Post
		//1.4.2 Pagging 
		$count = $tb_users->where($condition)->count();
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
		$msg["page"]=$show;
		//1.4.3 
		$msg["tb_users"] = $tb_users -> where($condition) ->limit($Page->firstRow.','.$Page->listRows) -> select();
		foreach($msg["tb_users"] as $key => $value){
			$msg["tb_users"][$key]["role_text"] = $this->getUserRole($msg["tb_users"][$key]["role"]);
		}
		
		
		//9. RBAC
		$msg["user_roles"] = $this->getUserRoles();
		
		//10. Display
		$this->assign("error_pool",$error_pool);
		$this->assign("msg",$msg);
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
		//1.1 Add User
		if(!empty($_POST["user_name"])){
			$data1["role"] = trim($_POST["user_role"]);
			$data1["user_regtime"] = DATETIME_NOW;
			$data1["user_name"] = trim($_POST["user_name"]);
			$data1["user_nickname"] = trim($_POST["user_nickname"]);
			$data1["user_email"] = trim($_POST["user_email"]);
			$data1["user_password"] = md5(trim($_POST["user_password"]));
			if($tb_users->add($data1)){
				$this->assign("jumpUrl",SITE_URL."/admin.php?s=User/index");
				$this->Success('New user added');
			}else{
				$this->assign("jumpUrl",SITE_URL."/admin.php?s=User/add");
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
	
	
	public function edit(){
		//0. Initialization
		//0.1 Global variables
		//0.2 Define Tables
		$tb_users = M("users");
		//0.8 Error: error pool
		$error_pool = array();
		//0.9 massenger
		$msg = array("title"=>"Edit User"); 
		
		//1. Table Users
		//1.1 Add User
		//1.2 Del User
		//1.3 Edit User
		if(isset($_GET["id"])){
			if($_POST){
				$data1["uid"] = trim($_GET["id"]);
				$data1["role"] = $_POST["user_role"];
				$data1["user_updatetime"] = DATETIME_NOW;
				$data1["user_status"] = $_POST["user_status"];
				$data1["user_name"] = trim($_POST["user_name"]);
				$data1["user_nickname"] = trim($_POST["user_nickname"]);
				$data1["user_email"] = trim($_POST["user_email"]);
				$user_password = trim($_POST["user_password"]);
				if(!empty($user_password)){
					$data1["user_password"] = md5($user_password);
				}
				if($tb_users->save($data1)){
					$this->success("User data Updated!");
				}else{
					$this->error("failed to update user!");
				}
			}
		}else{
			$this->assign("jumpUrl",SITE_URL."/admin.php?s=User/index");
			$this->error('User does not exist Failed');
		}
		
		
		//1.4 Select user
		if(isset($_GET["id"])){
			$user_id = trim($_GET["id"]);
			$user_count = $tb_users -> where(array("uid"=>$user_id)) -> count();
			if($user_count){
				$msg["tb_users"] = $tb_users -> where(array("uid"=>$user_id)) -> find();
			}else{
				$this->assign("jumpUrl",SITE_URL."/admin.php?s=User/index");
				$this->error('User does not exist Failed');
			}
		}else{
			$this->assign("jumpUrl",SITE_URL."/admin.php?s=User/index");
			$this->error('User does not exist Failed');
		}
		
		
		//9. RBAC
		$msg["user_roles"] = $this->getUserRoles();
		
		//10. Display
		$this->assign("error_pool",$error_pool);
		$this->assign("msg",$msg);
		$this->display();
	}
	
	public function del(){
		$tb_users = M("users");
		if(!empty($_GET['uid'])){
			if($_GET['uid']!=1){
				if($tb_users->where(array("uid"=>$_GET['uid']))->delete()){
					$this->success("The user successfully deleted!");
				}else{
					$this->error("Error when delete User!");
				}
			}else{
				$this->error("You can not delete super admin!");
			}
		}
	}
	
}
?>