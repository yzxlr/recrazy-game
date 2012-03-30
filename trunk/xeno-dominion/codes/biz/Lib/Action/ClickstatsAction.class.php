<?php
// click stats action
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
	
	//function to load year_company_click information by ajax call
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
	
	//function to load year_product_click information by ajax call
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
				$returndata .= "<tr><td width='60px'>".$pid."</td><td width='150px'>".$each_select['a_unik_click']."</td><td width='110px'>".$each_select['u_unik_click']."</td><td width='110px'>".$each_select['click_unik_counter']."</td><td width='130px'>".$each_select['a_click']."</td><td width='90px'>".$each_select['u_click']."</td><td width='90px'>".$each_select['click_counter']."</td><td width='130px'>".$each_select['added']."&nbsp;&nbsp;&nbsp;<a href='{$SITE_URL}/biz.php/Clickstats/pdetail/pid/".$pid."/d1/$d1/d2/$d2/d/".$each_select['added']."'>&raquo;&nbsp;detail</a></td></tr></tr>";
			}
			$returndata .= "</table></td>";
		}
		echo $returndata;
	}
	
	//action to show company click detail by each day
	public function cdetail(){
		//login user company id 
		$user = $_SESSION["user"];
		$cid = $user["uid"];//echo $uid;
		
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
		
		$d = $_REQUEST['d']; //selected date
		$this->assign("d", $d);
		
		$ry_month_click = M("monthClick");
		
		$condition['cid'] = $cid;
		$condition['p_type'] = 1;
		$condition['added'] = $d;
		$count_month_click_select = $ry_month_click->where($condition)->count(); //echo $count;
		
		import("ORG.Util.Page");
		$Page = new Page($count_month_click_select,10);
		//>>>> page English support start
		if($count_month_click_select>1)
			$Page->setConfig('header','Records'); 
		else
			$Page->setConfig('header','Record'); 
		$Page->setConfig('prev',"Prev");
		$Page->setConfig('next','Next');
		$Page->setConfig('first','|<');
		$Page->setConfig('last','>|');
		//<<<< page English support ends
		$show = $Page->show();
		
		$month_click_select = $ry_month_click->where($condition)->select();//var_dump($month_click_select);
		
		//var_dump($total_kw_select);
		$this->assign("count_month_click_select", $count_month_click_select);
		$this->assign("month_click_select", $month_click_select);
		$this->assign("show",$show);
		
		$this->display();
	}
	
	//function to load customer information
	public function checkuser(){
		$uid = $_REQUEST['uid'];
		
		$users = M("Users");
		$condition['uid'] = $uid;
		
		$users_select = $users->where($condition)->find();
		$returndata = "<h3>User Information</h3><table class='statstable'>
						<tr><th>ID</th><th>Name</th><th>Nickname</th><th>E-Mail</th><th>Role</th></tr>
						<tr><td>".$users_select['uid']."</td><td>".$users_select['user_name']."</td><td>".$users_select['user_nickname']."</td><td>".$users_select['user_email']."</td><td>";
		if($users_select['role'] == "10"){
			$returndata .= "Company User";
		}else{
			$returndata .= "Regular User";	
		}
		$returndata .= "</td></tr></tr>
						</table>";
		echo $returndata;
	}
	
	//action to show product click detail by each day
	public function pdetail(){
		//login user company id 
		$user = $_SESSION["user"];
		$cid = $user["uid"];//echo $uid;
		
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
		
		$d = $_REQUEST['d']; //selected date
		$this->assign("d", $d);
		$pid = $_REQUEST['pid'];
		$this->assign("pid", $pid);
		
		$ry_month_click = M("monthClick");
		
		$condition['cid'] = $cid;
		$condition['pid'] = $pid;
		$condition['p_type'] = 2;
		$condition['added'] = $d;
		$count_month_click_select = $ry_month_click->where($condition)->count(); //echo $count;
		
		import("ORG.Util.Page");
		$Page = new Page($count_month_click_select,10);
		//>>>> page English support start
		if($count_month_click_select>1)
			$Page->setConfig('header','Records'); 
		else
			$Page->setConfig('header','Record'); 
		$Page->setConfig('prev',"Prev");
		$Page->setConfig('next','Next');
		$Page->setConfig('first','|<');
		$Page->setConfig('last','>|');
		//<<<< page English support ends
		$show = $Page->show();
		
		$month_click_select = $ry_month_click->where($condition)->select();//var_dump($month_click_select);
		
		//var_dump($total_kw_select);
		$this->assign("count_month_click_select", $count_month_click_select);
		$this->assign("month_click_select", $month_click_select);
		$this->assign("show",$show);
		
		$this->display();
	}
	
	//function to load customer information
	public function checkproduct(){
		$pid = $_REQUEST['pid'];
		
		$products = M("Products");
		$condition['pid'] = $pid;
		
		$products_select = $products->where($condition)->find();
		$returndata = "<h3>Product Information</h3><table class='statstable'>
						<tr><th>ID</th><th>Product Name</th><th>Image</th><th>Price</th><th>Quantity</th><th>Time Added</th><th>Time Modified</th></tr>
						<tr><td>".$products_select['pid']."</td><td>".$products_select['user_name']."</td><td>".$users_select['user_nickname']."</td><td>".$users_select['user_email']."</td><td>";
		if($users_select['role'] == "10"){
			$returndata .= "Company User";
		}else{
			$returndata .= "Regular User";	
		}
		$returndata .= "</td></tr></tr>
						</table>";
		echo $returndata;
	}
}