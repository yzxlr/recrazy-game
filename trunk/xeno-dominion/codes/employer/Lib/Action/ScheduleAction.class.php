<?php
// 本文档自动生成，仅供测试运行
class ScheduleAction extends CommonAction
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
	

	public function task_add(){
		//0. Initialization
		//0.1 Global variables
		//0.2 Define Tables
		$tb_task = M("task");
		//0.4 Condition
		$condition = array();
		//0.9 massenger
		$msg = array("title"=>"Login"); 
		//1. Table task
		//1.1 add
		if($_POST){
			if($tb_task->create()){
				if($lastInsId = $tb_task->add()){
					$this->success("New task added!");
					//echo "插入数据 id 为：$lastInsId";
				}else{
					$this->error("error occured when add new task!");
					//echo "数据写入错误！";
				}
			}else{
				exit($tb_task->getError().' [ <a href="javascript:history.back()">返 回</a> ]');
			}
		}
		//1.2 Select
		//$user = $tb_users -> where() -> select();
		
		//10. Display
		$this->assign("data",$data);
		$this->assign("msg",$msg);
        $this->display();
	}
	
	public function task_update(){
		//0. Initialization
		//0.1 Global variables
		//0.2 Define Tables
		$tb_task = M("task");
		//0.4 Condition
		$condition = array();
		//0.9 massenger
		$msg = array("title"=>"Login"); 
		//1. Table task
		//1.1 add
		if($_POST){
			if($tb_task->create()){
				if($tb_task->save()){
					$this->success("Task updated");
				}else{
					$this->error("Error. Nothing changed!");
				}
			}else{
				exit($tb_task->getError().' [ <a href="javascript:history.back()">返 回</a> ]');
			}
		}
		//1.4 Select
		$data["tb_task"] = $tb_task -> where(array("task_id"=>$_GET["task_id"])) -> find();
		
		//10. Display
		$this->assign("data",$data);
		$this->assign("msg",$msg);
        $this->display();
	}
	
	

}
?>