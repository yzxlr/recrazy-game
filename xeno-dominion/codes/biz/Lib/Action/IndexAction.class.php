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
        //0. Initialization
		//0.1 Global variables
		//0.2 Define Tables
		$tb_task = M("task");
		//0.4 Condition
		$condition = array();
		//0.9 massenger
		$msg = array("title"=>"Biz Index"); 
		//1. Table task
		//1.1 add
		//1.4 Select
		date_default_timezone_set("America/Toronto");
		$today = date("Y-m-d");
		$today .= " 00:00:00";
		$tomorrow = date("Y-m-d",strtotime("+1 day"));
		$tomorrow .= " 00:00:00";
		$tomorrow_one = date("Y-m-d",strtotime("+2 day"));
		$tomorrow_one .= " 00:00:00";
		$nextweek = date("Y-m-d",strtotime("+8 day"));
		$nextweek .= " 00:00:00";
		//$nextweek .= " 00:00:00";
		$condition = array("user_id"=>$this->user["uid"], "status"=>1, "time"=>array(array("elt",$nextweek),array("egt",$today)));
		$data["tb_task"] = $tb_task -> where($condition) ->order("time ASC") -> select();
		
		//today
		$condition = array("user_id"=>$this->user["uid"], "status"=>1, "time"=>array(array("lt",$tomorrow),array("egt",$today)));
		$data["tb_task_today"] = $tb_task -> where($condition) ->order("time ASC") -> select();
		//tomorrow
		$condition = array("user_id"=>$this->user["uid"], "status"=>1, "time"=>array(array("lt",$tomorrow_one),array("egt",$tomorrow)));
		$data["tb_task_tomorrow"] = $tb_task -> where($condition) ->order("time ASC") -> select();
		//nextweek
		$condition = array("user_id"=>$this->user["uid"], "status"=>1, "time"=>array(array("elt",$nextweek),array("egt",$tomorrow_one)));
		$data["tb_task_nextweek"] = $tb_task -> where($condition) ->order("time ASC") -> select();
		
		//10. Display
		$this->assign("data",$data);
		$this->assign("msg",$msg);
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
	
	public function account(){
		//var_dump($this->user["uid"]);
		$tb_user_profile = M("usersProfile");
		if($_POST){
			if($tb_user_profile->create()){
				$_POST["user_id"] = $this->user["uid"];
				$_POST["profile_lang"] = "en-us";
				if($tb_user_profile->where(array("user_id"=>$this->user["uid"], "profile_lang"=>"en-us"))->save()){
					$this->success("Update successfully!");
				}
				else if($tb_user_profile->add()){
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
		$data["tb_user_profile"] = $tb_user_profile -> where(array("user_id"=>$this->user["uid"], "profile_lang"=>"en-us")) -> find();
		
		/////var_dump($data);
		$this->assign("data",$data);
		$this->display();
	}
	
	public function company(){
		//var_dump($this->user["uid"]);
		$tb_user_company = M("usersCompany");
		if($_POST){
			if($tb_user_company->create()){
				$_POST["userId"] = $this->user["uid"];
				/////var_dump($_POST["companySell"]);
				//if(!empty($_POST["companyType"]))$_POST["companyType"] = json_encode($_POST["companyType"]);
				if(!empty($_POST["companySell"]))$_POST["companySell"] = json_encode($_POST["companySell"]);
				if(!empty($_POST["companyBuy"]))$_POST["companyBuy"] = json_encode($_POST["companyBuy"]);
				/////var_dump($_POST["companySell"]);exit;
				//companySell
				if($tb_user_company->where(array("userId"=>$this->user["uid"]))->save()){
					$this->success("Update successfully!");
				}
				else if($tb_user_company->add()){
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
		$data["tb_user_company"] = $tb_user_company -> where(array("userId"=>$this->user["uid"])) -> find();
		
		var_dump($data);
		$this->assign("data",$data);
		$this->display();
	}
	
	

}
?>