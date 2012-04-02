<?php
// 本文档自动生成，仅供测试运行
class PublicAction extends Action
{
    /**
    +----------------------------------------------------------
    * 默认操作
    +----------------------------------------------------------
    */
	
	public function _initialize(){
		//0. Initialization
		//0.1 Global variables
		$http = (isset($_SERVER['HTTPS'])&&$_SERVER['HTTPS']!='off')?'https://':'http://';  
		$port = $_SERVER["SERVER_PORT"]==80?'':':'.$_SERVER["SERVER_PORT"];  
		$url = $http.$_SERVER['SERVER_NAME'].$port;//.$_SERVER["REQUEST_URI"];
		$this->assign("SITE_URL",$url);
		//define("SITE_URL",$url);
	}
	
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
                $msg = array("title"=>array("en-us" => "Login",
									"zh-cn" => "登录")
					);
		//1. Table users
		//1.1 Update
		//1.2 Select
		if(!empty($_POST["user_name"])){
			$condition_check["user_name"] = $_POST["user_name"];
			$condition_check["user_password"] = md5($_POST["user_password"]);
			$user_count = $tb_users -> where($condition_check) -> count();
			if($user_count>0){
				$user = $tb_users -> where($condition_check) -> find();
				if($user["role"]>=0){
					$_SESSION["user"] = $user;
					$this->assign("jumpUrl","/index.php/Index/index");
					$this->redirect("Index/index");
					//$this->success('You login successfully!');
					//$this->redirect('Index/index', array(), 3, 'You login successfully!');
				}else{
					$this->error("You are not an user!");
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
	
	public function register(){
		$site_domain = $_SERVER['SERVER_NAME'];
		
		$msg = array("title"=>"Register"); 
		
                $msg = array("title"=>array("en-us" => "Register",
									"zh-cn" => "注册")
					);
		$tb_users = M("users");
		$tb_users_company = M("usersCompany");
		$tb_users_profile = M("usersProfile");
		$user_email = $_POST['user_email'];
		$user_name = $_POST['user_name'];
		$activate_link = "http://".$site_domain."/index.php/Public/register_activate/code/";
		
		if($_POST){
			//var_dump($_POST);
			if($tb_users->create()){
				$tb_users->user_password = md5($_POST["user_password"]);
				$tb_users->user_regtime = date("Y-m-d H:i:s",time());
				$tb_users->user_updatetime = date("Y-m-d H:i:s",time());
				$activate_code = md5(rand());
				$activate_link .= $activate_code;
				$tb_users->user_activate_code = $activate_code;
				if($lastInsId = $tb_users->add()){
					//$redirect_url = $SITE_URL."/index.php/Public/register_done";
					$this->register_mail($user_name, $user_email, $activate_link);
					//$this->assign("jumpUrl",$redirect_url);
					$this->success("User added");
				} else {
					$this->error("User Registration Failed.");
				}
			}else{
				exit($tb_users->getError().' [ <a href="javascript:history.back()">Return</a> ]');
			}
		}
		
		$this->display();
	}
	
	public function register_mail($user_name, $user_email, $activate_link){
		header('Content-type:text/html;charset=utf-8');
     	vendor("PHPMailer.class#phpmailer"); //从PHPMailer目录导入class.phpmailer.php类文件
     	$mail = new PHPMailer(true); // the true param means it will throw exceptions on errors, which we need to catch
 		
		$mail->IsSMTP(); // telling the class to use SMTP
		$site_domain = $_SERVER['SERVER_NAME'];
		$fileToRead = "http://".$site_domain."/public/email/activate.html";
		
		try {
  			$mail->CharSet = "UTF-8";            // 这里指定字符集！解决中文乱码问题
  			$mail->Encoding = "base64";
  			$mail->AddAddress($user_email, '');
  			$mail->SetFrom('jason@pxcomputing.com', 'Come To World Global Trade Center');     //发送者邮箱
  			$mail->AddReplyTo('jason@pxcomputing.com', 'Come To World Global Trade Center'); //回复到这个邮箱
  			$mail->Subject = 'Come To World - User Account Activation';
			$body = file_get_contents($fileToRead);
			$body = str_replace("[user_name]", $user_name, $body);
			$body = str_replace("[activate_link]", $activate_link, $body);
 			$mail->MsgHTML($body);
  			$mail->Send();
  		echo "Message Sent OK</p>\n";
		} catch (phpmailerException $e) {
  		echo $e->errorMessage(); //Pretty error messages from PHPMailer
		} catch (Exception $e) {
  		echo $e->getMessage(); //Boring error messages from anything else!
		}
	}
	
	public function register_done(){
		$this->display();
	}
	
	public function register_activate(){
		$condition['user_activate_code'] = $_REQUEST['code'];
		$users = M("Users");
		$data['user_status'] = 1;
		$result = $users->where($condition)->save($data);
		$email_fetch = $users->field(array('user_email'))->where($condition)->find();
		$user_email = $email_fetch['user_email'];
		$activate_msg = "";
		if($result){
			$activate_msg = "Account under <b><font color='#990033'>".$user_email."</font></b> is successfully activated.";
		}else{
			$activate_msg = "Account under <b><font color='#990033'>".$user_email."</font></b> is not activated. Please contact our support department.";
		}
		$this->assign("activate_msg", $activate_msg);
		$this->display();	
	}
	
	public function register_check_user_name(){
		$condition['user_name'] = $_POST['user_name'];
		$users = M("Users");
		$uid_fetch = $users->where($condition)->find();
		if(isset($uid_fetch)){
			echo "1";
		}else{
			echo "0";
		}
	}
	
	public function register_check_user_email(){
		$user_email = $_POST['user_email'];
		
		if(preg_match("/\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/", $user_email)){
			$condition['user_email'] = $user_email;
			$users = M("Users");
			$uid_fetch = $users->where($condition)->find();
			if(isset($uid_fetch)){
				echo "1";	
			}else{
				echo "0";
			}
		}else{
			echo "2";
		}
		
	}
	
	public function login_check_user_name(){
		$condition['user_name'] = $_POST['user_name'];
		$users = M("Users");
		$user_status_fetch = $users->field(array('user_status'))->where($condition)->find();
		$user_status = $user_status_fetch['user_status'];
		if($user_status == "0"){
			echo "0";
		}else if($user_status == "1"){
			echo "1";	
		}
	}
	
	public function logout(){
		$_SESSION["user"]=null;
		$this->assign("jumpUrl",$SITE_URL);
		$this->redirect("Index/index");
		//$this->success('You logout successfully!');
		//$this->redirect('Public/login', array(), 3, 'You logout successfully!');
	}
	

}
?>