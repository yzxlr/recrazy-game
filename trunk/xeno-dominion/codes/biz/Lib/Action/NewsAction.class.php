<?php
// 本文档自动生成，仅供测试运行
class NewsAction extends CommonAction
{
	public function _initialize()
	{
		$user = $_SESSION["user"];
		//load all news including industrial and company
		$this->assign('cid', $user["uid"]);
	}
	
	
	public function industrial(){
		$user = $_SESSION["user"];
		//show industrial news
		$users_company_news = M("users_company_news");
		$condition['uid'] = $user["uid"];//echo $user["uid"];
		$condition['n_type'] = "1";
		
		$news_count = $users_company_news->where($condition)->count();
		$this->assign("news_count", $news_count);
		
		import("ORG.Util.Page");
		$Page = new Page($news_count,10);
		//>>>> page English support start
		if($news_count>1)
			$Page->setConfig('header','Records'); 
		else
			$Page->setConfig('header','Record'); 
		$Page->setConfig('prev',"Prev");
		$Page->setConfig('next','Next');
		$Page->setConfig('first','|<');
		$Page->setConfig('last','>|');
		//<<<< page English support ends
		$show = $Page->show();
		$industrial_news = $users_company_news->field(array('nid', 'n_title', 'added', 'updated'))->where($condition)->order('added DESC')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign("industrial_news", $industrial_news);
		$this->assign("show",$show);
		//var_dump($company_news);
		$this->display();
	}
	
	public function company(){
		$user = $_SESSION["user"];
		//show company news
		$users_company_news = M("users_company_news");
		$condition['uid'] = $user["uid"];//echo $user["uid"];
		$condition['n_type'] = "2";
		
		$news_count = $users_company_news->where($condition)->count();
		$this->assign("news_count", $news_count);
		
		import("ORG.Util.Page");
		$Page = new Page($news_count,10);
		//>>>> page English support start
		if($news_count>1)
			$Page->setConfig('header','Records'); 
		else
			$Page->setConfig('header','Record'); 
		$Page->setConfig('prev',"Prev");
		$Page->setConfig('next','Next');
		$Page->setConfig('first','|<');
		$Page->setConfig('last','>|');
		//<<<< page English support ends
		$show = $Page->show();
		$company_news = $users_company_news->field(array('nid', 'n_title', 'added', 'updated'))->where($condition)->order('added DESC')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign("company_news", $company_news);
		$this->assign("show",$show);
		//var_dump($company_news);
		$this->display();
	}
	
	public function add(){
		$users_company_news = M("users_company_news");
		if($_POST){ 
			//get now time and insert to database
			if($users_company_news->create()){
				//$_POST['added'] = date("Y-m-d H:i:s");	
				$users_company_news->added = date("Y-m-d H:i:s");
				if($users_company_news->add()){
					$this->success("Insert Successfully!");
					//$this->redirect('index');
				}else{
					$this->error("Error on insert!".$users_company_news->getError());
				}
			}else{
				$this->error("Error on create!".$users_company_news->getError());
			}
		}
		$this->display();
	}
	
	public function edit(){
		$nid = $_REQUEST["nid"];
		$read_condition['nid'] = $nid;
		$users_company_news = M("users_company_news");
		$read_news = $users_company_news->where($read_condition)->find();
		$this->assign("read_news", $read_news);
		
		if($_POST){ 
			//get now time and insert to database
			if($users_company_news->create()){
				$users_company_news->nid = $nid;
				if($users_company_news->save()){
					$this->success("Update Successfully!");
				}else{
					$this->error("Error on update!".$users_company_news->getError());
				}
			}else{
				$this->error("Error on update!".$users_company_news->getError());
			}
		}
		
		$this->display();
	}
	
	public function delete(){
		
	}
}

?>