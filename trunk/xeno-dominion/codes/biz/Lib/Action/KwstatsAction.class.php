<?php
//keyword stats action
class KwstatsAction extends CommonAction
{
	public function index()
    {
		$yesterday_date = date("Y-m-d", mktime(0, 0, 0, date("m"),date("d")-1,date("Y")));//default date to be yesterday
		//get date information
		$d1 = $_REQUEST['d1'];
		$d2 = $_REQUEST['d2'];
		if(!isset($d1) && !isset($d2)){
			$d1 = $yesterday_date;
			$d2 = $yesterday_date;
		}else if(isset($d1) && !isset($d2)){
			$d2 = $d1;	
		}else if(!isset($d1) && isset($d2)){
			$d1 = $d2;
		}
		$this->assign("d1", $d1);
		$this->assign("d2", $d2);
		
		//load the month_kw and total_kw tables
		$ry_month_kw = M("ryMonthKw");
		$ry_total_kw = M("ryTotalKw");
		
		$count_month_kw_select = $ry_month_kw->execute("SELECT kw FROM ry_month_kw WHERE added >= '$d1' AND added <= '$d2';");
		
		import("ORG.Util.Page");
		$Page = new Page($count_month_kw_select,10);
		//>>>> page English support start
		if($count_month_kw_select>1)
			$Page->setConfig('header','Records'); 
		else
			$Page->setConfig('header','Record'); 
		$Page->setConfig('prev',"Prev");
		$Page->setConfig('next','Next');
		$Page->setConfig('first','|<');
		$Page->setConfig('last','>|');
		//<<<< page English support ends
		$show = $Page->show();
		
		$month_kw_select = $ry_month_kw->query("SELECT kw, counter, added FROM ry_month_kw WHERE added >= '$d1' AND added <= '$d2' LIMIT $Page->firstRow, $Page->listRows;");
		
		//var_dump($month_kw_select);
		$this->assign("count_month_kw_select", $count_month_kw_select);
		$this->assign("month_kw_select", $month_kw_select);
		$this->assign("show",$show);
		
		//show top three keywords
		//find top 3 counter
		$top_10_counter = $ry_total_kw->query("SELECT DISTINCT counter FROM ry_total_kw ORDER BY counter DESC LIMIT 0, 10");
		
		$top_10_counter_array = array();
		foreach($top_10_counter as $each_counter){
			//echo $each_counter['counter'];
			$each_counter = $each_counter['counter'];
			//$each_counter_kw = $ry_total_kw->where($condition)->select();
			$each_counter_kw = $ry_total_kw->query("SELECT kw FROM ry_total_kw WHERE counter = '$each_counter';");
			//var_dump($each_counter_kw);
			//$each_counter['counter'];
			$top_10_counter_array[$each_counter] = array();
			foreach($each_counter_kw as $each_kw){
				array_push($top_10_counter_array[$each_counter], $each_kw['kw']);
			}
			
		}
		
		$this->assign("top_10_counter", $top_10_counter);
		$this->assign("top_10_counter_array", $top_10_counter_array);
		//var_dump($top_10_counter_array);
		
		$this->display();
	}
	
	public function totallist(){
		$ry_total_kw = M("ryTotalKw");
		
		$count_total_kw_select = $ry_total_kw->execute("SELECT * FROM ry_total_kw;");
		
		import("ORG.Util.Page");
		$Page = new Page($count_total_kw_select,10);
		//>>>> page English support start
		if($count_total_kw_select>1)
			$Page->setConfig('header','Records'); 
		else
			$Page->setConfig('header','Record'); 
		$Page->setConfig('prev',"Prev");
		$Page->setConfig('next','Next');
		$Page->setConfig('first','|<');
		$Page->setConfig('last','>|');
		//<<<< page English support ends
		$show = $Page->show();
		
		$total_kw_select = $ry_total_kw->query("SELECT kw, counter FROM ry_total_kw ORDER BY counter DESC LIMIT $Page->firstRow, $Page->listRows;");
		
		//var_dump($total_kw_select);
		$this->assign("count_total_kw_select", $count_total_kw_select);
		$this->assign("total_kw_select", $total_kw_select);
		$this->assign("show",$show);
		
		$this->display();
	}
}

?>