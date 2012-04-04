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
		//var_dump($_SESSION['ref']);
		//get domain
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
			if($tb_users->create()){
				//initialize parent id
				$parent_id = "";
				
				if(isset($_SESSION['ref'])){
					// --- get parent uid from sales table --- updated by Jason
					$sales_referral_code = $_SESSION['ref'];
					import("ORG.Model.Sales");
					$SalesClass = new Sales("");//construct Sales class with empty uid
					$parent_id = $SalesClass->fetchSalesByRefCode($sales_referral_code);
					$tb_users->user_parent_id = $parent_id;
					// --- updated by Jason ---//
				}
				
				$tb_users->user_password = md5($_POST["user_password"]);
				$tb_users->user_regtime = date("Y-m-d H:i:s",time());
				$tb_users->user_updatetime = date("Y-m-d H:i:s",time());
				$activate_code = md5(rand());
				$activate_link .= $activate_code;
				$tb_users->user_activate_code = $activate_code;
				if($lastInsId = $tb_users->add()){
					//insert ry_sales --- updated by Jason
					if(isset($_SESSION['ref'])){
						$SalesClass = new Sales("");
						$SalesClass->insertNewSalesRecord($lastInsId, $parent_id);
					}
					// --- updated by Jason ---//
					
					$redirect_url = $SITE_URL."/index.php/Public/register_done";
					$this->register_mail($user_name, $user_email, $activate_link);
					$this->assign("jumpUrl",$redirect_url);
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
	
	//a page to activate user with specified activation code.
	public function register_activate(){
		$condition['user_activate_code'] = $_REQUEST['code'];
		$users = M("Users");
		$data['user_status'] = 1;
		$data['user_activate_code'] = ""; //once the user is activated, then get rid of the activation code
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
	
	//ajax call to check if user name exists or not during registration
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
	
	//ajax call to check if user email is in valid format and if it exists or not during registration
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
	
	//ajax call to check if the user is activated or not during logging in.
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
	
	public function register_biz(){
		$user = $_SESSION["user"];
		$uid = $user["uid"];
		$this->assign("uid", $uid);
		$tb_user_company = M("usersCompany");
		if($_POST){
			//var_dump($_POST["companyBuy"]);
			//echo json_encode($_POST["companyBuy"]);
			$data = array();
			if($tb_user_company->create()){
				//$_POST["userId"] = $uid;
				$data["userId"] = $_POST["userId"];
				$data["companyLegalOwner"] = $_POST["companyLegalOwner"];
				$data["companyName"] = $_POST["companyName"];
				$data["companyAddress"] = $_POST["companyAddress"];
				$data["companyCity"] = $_POST["companyCity"];
				$data["companyProvince"] = $_POST["companyProvince"];
				$data["companyCountry"] = $_POST["companyCountry"];
				$data["companyZip"] = $_POST["companyZip"];
				$data["companyYear"] = $_POST["companyYear"];
				$data["companyEmployee"] = $_POST["companyEmployee"];
				$data["companyPhone"] = $_POST["companyPhone"];
				$data["companyFax"] = $_POST["companyFax"];
				$data["companyEmail"] = $_POST["companyEmail"];
				$data["added"] = date("Y-m-d H:i:s");
				$data["companyPackage"] = $_POST["companyPackage"];

				if(!empty($_POST["cType"])){
					$_POST["companyType"] = json_encode($_POST["cType"]);
					//$_POST["companyType"] = implode("@",$_POST["cType"]);
					$data["companyType"] = $_POST["companyType"];
				}
				if(!empty($_POST["companySell"])){
					$_POST["companySell"] = json_encode($_POST["companySell"]);
					//echo $_POST["companySell"];
					$data["companySell"] = $_POST["companySell"];
				}
				if(!empty($_POST["companyBuy"])){
					$_POST["companyBuy"] = json_encode($_POST["companyBuy"]);
					//echo $_POST["companyBuy"];
					$data["companyBuy"] = $_POST["companyBuy"];
				}
				
				if($tb_user_company->add($data)){
					$redirect_url = $SITE_URL."/index.php/Public/register_company_done";
					$this->assign("jumpUrl",$redirect_url);
					$this->success("Success: created new profile");
				}
				else{
					$this->error("Error");
				}
			}else{
				$this->error("Error on create!");
			}
		}
		//1.4
		//$data["tb_user_company"] = $tb_user_company -> where(array("userId"=>$this->user["uid"])) -> find();
		
		//var_dump($data);
		//$this->assign("data",$data);
		$this->display();
	}
	
	public function register_company_done(){
		$this->display();
	}
	
	/** a hidden restricted page to activate company (to be updated by https with online payment)
	  * This action activate company user and update sales record table if applicable
	  */
	public function register_company_activate(){
		//for testing purpose, get uid, companyPackage and parent_id from url
		$uid = $_REQUEST['uid'];echo $uid;
		$companyPackage = $_REQUEST['p'];
		$parent_id = $_REQUEST['parent_id'];
		//the above fields will be controlled by session and clean up the session once finished.
		
		//activate user company by updating the status
		$db_users = M("users");
		$users_condition['userId'] = $uid;
		$users_data['companyStatus'] = 1;
		$db_users->where($users_condition)->save($users_data);
		
		//hardcode package payment here (to be implemented with db value in near future)
		$package_payment_array = array(50, 100, 150);
		if(isset($parent_id) && !empty($parent_id)){
			//get Sales Class
			import("ORG.Model.Sales");
			$SalesClass = new Sales($uid);//construct Sales class with empty uid
			//update sales_record
			$sales_condition['uid'] = $uid;
			$sales_condition['parent_id'] = $parent_id;echo "parent id: ".$parent_id."<br />";
			$paid = intval($package_payment_array[intval($companyPackage)]);echo "paid: ".$paid."<br />";
			$sales_data['paid'] = $paid;
			$now_date = date("Y-m-d");
			$sales_data['paid_date'] = $now_date;
			$SalesClass->updateSalesRecord($sales_condition, $sales_data);
			//update sales_total_earning
			//get sales_earning_rate and referral_earning_rate
			$sales_rate_array = array('sales_earning_rate', 'referral_earning_rate');
			$sales_rate_condition['uid'] = $parent_id;
			$sales_rate_fetch = $SalesClass->fetchSales($sales_rate_array, $sales_rate_condition);var_dump($sales_rate_fetch);
			$sales_earning_rate = intval($sales_rate_fetch['sales_earning_rate']);echo "sales_earning_rate: $sales_earning_rate<br />";
			$referral_earning_rate = intval($sales_rate_fetch['referral_earning_rate']);
			//var_dump($SalesClass->getSalesEarningRate($parent_id));
			//update sales_earning amount
			$sales_earning_amount = round(($sales_earning_rate / 100) * $paid, 2); echo "sales_earning_amount: ".$sales_earning_amount."<br />";
			$SalesClass->updateSalesEarning($parent_id, $sales_earning_amount, $now_date);
		}
	}
	
	//a page to activate sales registration
	public function register_sales_activate(){
		$condition['sales_activate_code'] = $_REQUEST['code'];
		$sales = M("Sales");
		$users = M("Users");
		$data['sales_status'] = 1;
		$data['sales_activate_code'] = ""; //once the user is activated, then get rid of the activation code
		//fetch email and uid
		$user_fetch = $sales->field(array('uid', 'sales_email'))->where($condition)->find();
		$sales_email = $user_fetch['sales_email'];
		$uid = $user_fetch['uid'];
		//update sales status and clear uid
		$result = $sales->where($condition)->save($data);
		//update is_sales
		$users_data['user_is_sales'] = 2;
		$users_condition['uid'] = $uid;
		$users->where($users_condition)->save($users_data);
		//update session if logged in
		$user = $_SESSION["user"];
		
		if(!empty($user)){
			$_SESSION["user"]["user_is_sales"] = 2;
		}
		//var_dump($user);
		
		//write message
		$activate_msg = "";
		if($result){
			$activate_msg = "Sales Member Account under <b><font color='#990033'>".$sales_email."</font></b> is successfully activated. <br /><br />Please log in again to use Sales Member Account.";
		}else{
			$activate_msg = "Sales Member Account under <b><font color='#990033'>".$sales_email."</font></b> is not activated. Please contact our support department.";
		}
		$this->assign("activate_msg", $activate_msg);
		$this->display();
	}
}
?>