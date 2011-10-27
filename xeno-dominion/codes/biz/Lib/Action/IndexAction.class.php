<?php
// 本文档自动生成，仅供测试运行
class IndexAction extends CommonAction
{
    /**
    +----------------------------------------------------------
    * 默认操作
    +----------------------------------------------------------
    */
    public function index()
    {
        $this->display();
    }
	
	
	
	Public function fraud(){
		if($_POST){
			if($_SESSION['verify'] != md5($_POST['verify'])) {   
				$this->error('Varification code error');   
			} else{
				$to = "luolisave@gmail.com";
				$name=$_POST["name"];
				$email_from = $_POST["email"];
				$title = $_POST["title"];
				$content=$_POST["content"];
				if(sendEmail($email_from, $to, $title, $content)){
					$this->success("Fraud Report sented");
				}else{
					$this->error("Failed to send Fraud report! Please try again latter.");
				}
				
			}
		}
		$this->display();
	}
	
	Public function sendEmail($from, $to, $subject, $message) {
		if ($from == '')
            $from = 'no-reply@gmail.com';

        $headers = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text; charset=UTF-8' . "\r\n";
        $headers .= 'To: ' . $to . "\r\n";
        $headers .= 'From: ' . $from . "\r\n";

        $subject = trim($subject);
        $message = trim($message);

        $send = mail($to, $subject, $message, $headers);

        if (!$send)
            return false;

        return true;
	}

}
?>