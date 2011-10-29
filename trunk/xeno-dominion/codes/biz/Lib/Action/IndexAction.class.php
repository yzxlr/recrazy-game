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
	
	
	
	public function fraud(){
		if($_POST){
			if($_SESSION['verify'] != md5($_POST['verify'])) {   
				$this->error('Varification code error');   
			} else{
				$to = "luolisave@gmail.com";
				$name=$_POST["name"];
				$email_from = $_POST["email"];
				$title = $_POST["title"];
				$content=$_POST["content"];
				if($this->sendEmail($email_from, $to, $title, $content)){
					$this->success("Fraud Report sented");
				}else{
					$this->error("Failed to send Fraud report! Please try again latter.");
				}
				
			}
		}
		$this->display();
	}
	
	

}
?>