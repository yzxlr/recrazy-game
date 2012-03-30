<?php
// 本文档自动生成，仅供测试运行
class ClickstatsAction extends CommonAction
{
    public function index()
    {
		//login user company id 
		$user = $_SESSION["user"];
		$cid = $user["uid"];//echo $uid;
		$this->assign("cid", $cid);
		
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
		
		//load the year_comany_click and year_product_click tables
		$ry_year_company_click = M("ryYearCompanyClick");
		$ry_year_product_click = M("ryYearProductClick");
		
		$count_year_company_click_select = $ry_year_company_click->execute("select * from ry_year_company_click where added >= '$d1' AND added <= '$d2' AND cid = '$cid';");
		
		$year_company_click_sum = $ry_year_company_click->query("select SUM(a_unik_click) AS a_unik_click_sum, SUM(u_unik_click) AS u_unik_click_sum, SUM(click_unik_counter) AS click_unik_counter_sum, SUM(a_click) AS a_click_sum, SUM(u_click) AS u_click_sum, SUM(click_counter) AS click_counter_sum from ry_year_company_click where added >= '$d1' AND added <= '$d2' AND cid = '$cid' GROUP BY cid;");
		
		$this->assign("year_company_click_sum", $year_company_click_sum);
		$this->assign("count_year_company_click_select", $count_year_company_click_select);
		
		$count_year_product_click_select = $ry_year_product_click->execute("select distinct pid from ry_year_product_click where added >= '$d1' AND added <= '$d2' AND cid = '$cid';");
		$year_product_click_sum = $ry_year_product_click->query("select pid, SUM(a_unik_click) AS a_unik_click_sum, SUM(u_unik_click) AS u_unik_click_sum, SUM(click_unik_counter) AS click_unik_counter_sum, SUM(a_click) AS a_click_sum, SUM(u_click) AS u_click_sum, SUM(click_counter) AS click_counter_sum from ry_year_product_click where added >= '$d1' AND added <= '$d2' AND cid = '$cid' GROUP BY cid, pid;");
		$this->assign("year_product_click_sum", $year_product_click_sum);
		$this->assign("count_year_product_click_select", $count_year_product_click_select);
		
		$this->display();
	}
	
	public function loadYearCompanyClick(){
		$d1 = $_REQUEST['d1'];
		$d2 = $_REQUEST['d2'];
		$cid = $_REQUEST['cid'];
		$ry_year_company_click = M("ryYearCompanyClick");
		$year_company_click_select = $ry_year_company_click->query("select * from ry_year_company_click where added >= '$d1' AND added <= '$d2' AND cid = '$cid' ORDER BY added DESC;");
		$count_year_company_click_select = count($year_company_click_select);
		
		$returndata = "";
		if($count_year_company_click_select > 0){
			$returndata .= "<table class='statstable' cellspacing='1'>";
			foreach($year_company_click_select as $each_select){
				$returndata .= "<tr><td width='150px'>".$each_select['a_unik_click']."</td><td width='110px'>".$each_select['u_unik_click']."</td><td width='110px'>".$each_select['click_unik_counter']."</td><td width='130px'>".$each_select['a_click']."</td><td width='90px'>".$each_select['u_click']."</td><td width='90px'>".$each_select['click_counter']."</td><td width='130px'>".$each_select['added']."&nbsp;&nbsp;&nbsp;<a href='{$SITE_URL}/biz.php/Clickstats/cdetail/d1/$d1/d2/$d2/d/".$each_select['added']."'>&raquo;&nbsp;detail</a></td></tr>";
			}
			$returndata .= "</table>";
		}
		echo $returndata;
		//echo $count_year_company_click_select;
	}
	
	public function loadYearProductClick(){
		$d1 = $_REQUEST['d1'];
		$d2 = $_REQUEST['d2'];
		$cid = $_REQUEST['cid'];
		$pid = $_REQUEST['pid'];
		$ry_year_product_click = M("ryYearProductClick");
		$year_product_click_select = $ry_year_product_click->query("select * from ry_year_product_click where added >= '$d1' AND added <= '$d2' AND cid = '$cid' AND pid = '$pid' ORDER BY added DESC;");
		$count_year_product_click_select = count($year_product_click_select);
		
		$returndata = "";
		if($count_year_product_click_select > 0){
			$returndata .= "<td colspan='8' style='margin:0px;padding:0px;border-bottom:none;'><table class='statstable' cellspacing='1'>";
			foreach($year_product_click_select as $each_select){
				$returndata .= "<tr><td width='60px'>".$pid."</td><td width='150px'>".$each_select['a_unik_click']."</td><td width='110px'>".$each_select['u_unik_click']."</td><td width='110px'>".$each_select['click_unik_counter']."</td><td width='130px'>".$each_select['a_click']."</td><td width='90px'>".$each_select['u_click']."</td><td width='90px'>".$each_select['click_counter']."</td><td width='130px'>".$each_select['added']."&nbsp;&nbsp;&nbsp;<a href='{$SITE_URL}/biz.php/Clickstats/pdetail/d1/$d1/d2/$d2/d/".$each_select['added']."'>&raquo;&nbsp;detail</a></td></tr></tr>";
			}
			$returndata .= "</table></td>";
		}
		echo $returndata;
	}
}