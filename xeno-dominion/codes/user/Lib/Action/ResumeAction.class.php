<?php
// 本文档自动生成，仅供测试运行
class ResumeAction extends CommonAction
{
    /**
    +----------------------------------------------------------
    * 默认操作
    +----------------------------------------------------------
    */
    
	
	public function index(){
		//var_dump($this->user["uid"]);
		$tb_resumes = M("Resumes");
                $this->user = $_SESSION["user"];
		if($_POST){
                    
			if($tb_resumes->create()){
				
                                $tb_products->uid = $this->user["uid"];
				//$_POST["profile_lang"] = "en-us";
                                $resume_lang = "en-us";
				if($tb_resumes->where(array("uid"=>$this->user["uid"], "resume_lang"=>$resume_lang))->save()){
					$this->success("Update successfully!");
				}
				else if($tb_resumes->add()){
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
		$data["tb_resumes"] = $tb_resumes -> where(array("uid"=>$this->user["uid"], "resume_lang"=>"en-us")) -> find();
		
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