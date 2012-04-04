<?php
// Sales class

class SalesAction extends Action
{
	
	public function _initialize(){
		
	}
	
	public function index(){
		//$db_name = DB_NAME;print $db_name;
		$user = $_SESSION['user'];
		$user_is_sales = $user['user_is_sales']; //echo $user_is_sales;
		$this->assign("user_is_sales", $user_is_sales);
		//var_dump($user);
		
		$this->display();
	}
	
	//a page to enter sales member registration
	public function register_sales(){
		$user = $_SESSION["user"];
		$uid = $user["uid"];
		$this->assign("uid", $uid);
		$db_sales = M("Sales");
		$db_users = M("Users");
		$site_domain = $_SERVER['SERVER_NAME'];
		$activate_link = "http://".$site_domain."/index.php/Public/register_sales_activate/code/";
		if($_POST){
			//var_dump($_POST["sales_industry"]);
			$data = array();
			if($db_sales->create()){
				$data['uid'] = $_POST['uid'];
				$data['sales_fn'] = $_POST['sales_fn'];
				$data['sales_ln'] = $_POST['sales_ln'];
				$data['sales_email'] = $_POST['sales_email'];
				$data['sales_street'] = $_POST['sales_street'];
				$data['sales_city'] = $_POST['sales_city'];
				$data['sales_province'] = $_POST['sales_province'];
				$data['sales_country'] = $_POST['sales_country'];
				$data['sales_postcode'] = $_POST['sales_postcode'];
				$data['sales_phone'] = $_POST['sales_phone'];
				$data['sales_other_phone'] = $_POST['sales_other_phone'];
				$data['sales_fax'] = $_POST['sales_fax'];
				$data['sales_id_type'] = $_POST['sales_id_type'];
				$data['sales_id_value'] = $_POST['sales_id_value'];
				if(!empty($_POST["sales_industry"])){
					$sales_industry = implode("@",$_POST["sales_industry"]);
					$data["sales_industry"] = $sales_industry;
				}
				//generate activation code
				$data['sales_activate_code'] = md5($uid);
				$activate_link .= $activate_code;
				//generate referal code
				$data['sales_referral_code'] = md5($uid."sales");
				
				if($db_sales->add($data)){
					//update is_sales in users table
					$users_condition['uid'] = $_POST['uid'];
					$users_data['user_is_sales'] = 1;
					$_SESSION["user"]["user_is_sales"] = 1;
					$db_users->where($users_condition)->save($users_data);
					
					$redirect_url = $SITE_URL."/user.php/Sales/register_sales_done";
					$this->register_sales_mail($data['sales_fn']." ".$data['sales_ln'], $data['sales_email'], $activate_link);
					$this->assign("jumpUrl",$redirect_url);
					$this->success("Success: created new sales profile");
				}
				else{
					$this->error("Error");
				}
			}else{
				$this->error("Error on create sales member!");
			}
		}
		
		$this->display();
	}
	
	public function register_sales_mail($sales_name, $sales_email, $activate_link){
		header('Content-type:text/html;charset=utf-8');
     	vendor("PHPMailer.class#phpmailer"); //从PHPMailer目录导入class.phpmailer.php类文件
     	$mail = new PHPMailer(true); // the true param means it will throw exceptions on errors, which we need to catch
 		
		//$mail->IsSMTP(); // telling the class to use SMTP
		$site_domain = $_SERVER['SERVER_NAME'];
		$fileToRead = "http://".$site_domain."/public/email/sales_activate.html";
		
		try {
  			$mail->CharSet = "UTF-8";            // 这里指定字符集！解决中文乱码问题
  			$mail->Encoding = "base64";
  			$mail->AddAddress($sales_email, '');
  			$mail->SetFrom('jason@pxcomputing.com', 'Come To World Global Trade Center');     //发送者邮箱
  			$mail->AddReplyTo('jason@pxcomputing.com', 'Come To World Global Trade Center'); //回复到这个邮箱
  			$mail->Subject = 'Come To World - Sales Member Account Activation';
			$body = file_get_contents($fileToRead);
			$body = str_replace("[user_name]", $sales_name, $body);
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
	
	//a page to display sales registration page
	public function register_sales_done(){
		$this->display();
	}
	
	
}

?>