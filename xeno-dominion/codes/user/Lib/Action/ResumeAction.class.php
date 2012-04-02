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
            
                
                require(CMS_PATH."/user/Common/class.php");
		
		$Tree = new Tree('Root Category');
		
		$category = M('jobsCat');
		$condition['is_show'] = '1';
		      // 把查询条件传入查询方法
		$cat_value = $category->where($condition)->order('parent_id asc')->select();
		foreach ($cat_value AS $id => $row)
		{
			$Tree->setNode($row['cat_id'], $row['parent_id'], $row['cat_name']);
		}
		$category = $Tree->getChilds();

		      //遍历输出
		$new_cat = array();
		foreach ($category as $key=>$id)
		{
			$new_cat[$id] = $Tree->getLayer($id, '--').$Tree->getValue($id);
		}

		$this->assign("categoty",$new_cat);
            
                
            
            
            
		$tb_resumes = M("Resumes");
                $user = $_SESSION["user"];
                
                
                
		if($_POST){
                    
			if($tb_resumes->create()){
				$tb_resumes->uid = $user["uid"];                                
                                
                                $tb_resumes->time_modify = date('Y-m-d H:i:s');
				//$_POST["profile_lang"] = "en-us";
                                $resume_lang = "en-us";
				if($tb_resumes->where(array("uid"=>$user["uid"], "resume_lang"=>$resume_lang))->save()){
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
	
}
?>