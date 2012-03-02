<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- start: include -->
		<!-- start: include jquery & jquery ui -->
		<link type="text/css" href="<?php echo ($SITE_URL); ?>/public/jquery-ui-1.8.16/css/ui-lightness/jquery-ui-1.8.16.custom.css" rel="stylesheet" />	
		<script type="text/javascript" src="<?php echo ($SITE_URL); ?>/public/jquery-ui-1.8.16/js/jquery-1.6.2.min.js"></script>
		<script type="text/javascript" src="<?php echo ($SITE_URL); ?>/public/jquery-ui-1.8.16/js/jquery-ui-1.8.16.custom.min.js"></script>
        <script type="text/javascript" src="<?php echo ($SITE_URL); ?>/public/jquery-ui-1.8.16/js/jquery-ui-timepicker-addon.js"></script>
        <!-- end:   include jquery & jquery ui -->
        <!-- start: include super-fish menu jquery plugin -->
        <link type="text/css" href="<?php echo ($SITE_URL); ?>/public/superfish-1.4.8/css/superfish.css" rel="stylesheet" />	
		<script type="text/javascript" src="<?php echo ($SITE_URL); ?>/public/superfish-1.4.8/js/superfish.js"></script>
        <!-- end: include super-fish menu jquery plugin -->
        
        
        <!-- start: include jack's css & js -->
        
        <link type="text/css" href="<?php echo ($SITE_URL); ?>/public/jack/foradmin/css/common.css" rel="stylesheet" />
        
        
        <!-- end:   include jack's css & js -->
<!-- end: include -->

        
<title><?php echo ($msg["title"]); ?></title>
</head>
<body>

<div id="header">

<div id="header_left"><img src="<?php echo ($SITE_URL); ?>/public/jack/foradmin/images/logo.jpg" /></div>

 <div id="header_right">
        <div id="header_right_control">Welcome back, <?php echo ($user["user_name"]); ?> / <a href="<?php echo ($SITE_URL); ?>/admin.php?s=Public/logout">Logout</a> 
        </div>
        <div id="header_right_menu">
            <ul class="sf-menu">
            				<li>
                  <a href="<?php echo ($SITE_URL); ?>/biz.php">My world</a>
                 </li>
                 <li> 
                     <a href="#">Messenge &amp; Condition</a>
                  </li>
                  <li>   
                     <a href="<?php echo ($SITE_URL); ?>/biz.php?s=Product/index">My Products</a>
                   </li>
                   <?php /* ?>
                   <li> 
                     <a href="<?php echo ($SITE_URL); ?>/biz.php?s=Index/company">Company</a>
                   </li> 
                   <?php //*/ ?>
                   <li>
                     <a href="<?php echo ($SITE_URL); ?>/biz.php?s=Index/account">Account</a>
                   </li>
                   <!--
                   <li>
                     <a href="#">Service Package</a>
                   </li>
                   -->
                   <li> 
                     <a href="<?php echo ($SITE_URL); ?>/biz.php?s=Index/fraud">Fraud Report</a>
                	 </li>
                  <li>
                			<a href="<?php echo ($SITE_URL); ?>/admin.php">Go To admin account(for test only)</a>
                </li>
            </ul>
          </div>           
    </div>
    
</div>

<div id="wrapper">

<script>
function del(id){
	if(id)
	{
	  if(confirm("Delete?")){ 
	    location="__URL__/delete/pid/"+id;
      }
	}
}
</script>

     <div id="content_left">
    		<div class="out_box">
         <h3>Quick Access</h3>
         
         <ul class="quick_links">
         
        
         
            <li><a href="">Check  Messages</a></li>
            <li><a href="<?php echo ($SITE_URL); ?>/biz.php?s=Product/index">Display New Products</a></li>
       
   
            <li><a href="<?php echo ($SITE_URL); ?>/biz.php?s=Index/account">My Account</a></li>
          
           
         		<li><a href=" <?php echo ($SITE_URL); ?>">Go to Index</a></li>
         
         </ul>
     </div>     
         
       <div class="out_box">
              
             <h5 class="schedule">Schedule       		  <a class="btn_s fr"  href="<?php echo ($SITE_URL); ?>/biz.php?s=Schedule/task_add"><span>Add ++</span></a></h5>
       
             
                   
                      <table class="schedule_table">
                       <thead>
                           <tr>
                               <th colspan="2" style="text-align:left; ">Today</th>
                              </tr>
                          </thead>
                       <tbody>
                          <?php if(is_array($data["tb_task_today"])): foreach($data["tb_task_today"] as $key=>$vo): ?><tr>
                                  <td><?php echo ($vo["time"]); ?></td>
                                  <td><a href="<?php echo ($SITE_URL); ?>/biz.php?s=Schedule/task_update/task_id/<?php echo ($vo["task_id"]); ?>"><?php echo ($vo["title"]); ?></a></td>
                              </tr><?php endforeach; endif; ?>
                   
                           <tr>
                               <th colspan="2"  style="text-align:left;" >Tomorrow</th>
                              </tr>
                     
                          <?php if(is_array($data["tb_task_tomorrow"])): foreach($data["tb_task_tomorrow"] as $key=>$vo): ?><tr>
                                  <td><?php echo ($vo["time"]); ?></td>
                                  <td><a href="<?php echo ($SITE_URL); ?>/biz.php?s=Schedule/task_update/task_id/<?php echo ($vo["task_id"]); ?>"><?php echo ($vo["title"]); ?></a></td>
                              </tr><?php endforeach; endif; ?>
                    
                           <tr>
                               <th colspan="2"  style="text-align:left; ">Next Week</th>
                              </tr>
                      
                          <?php if(is_array($data["tb_task_nextweek"])): foreach($data["tb_task_nextweek"] as $key=>$vo): ?><tr>
                                  <td><?php echo ($vo["time"]); ?></td>
                                  <td><a href="<?php echo ($SITE_URL); ?>/biz.php?s=Schedule/task_update/task_id/<?php echo ($vo["task_id"]); ?>"><?php echo ($vo["title"]); ?></a></td>
                              </tr><?php endforeach; endif; ?>
                          </tbody>
                      </table>
                      
                           
                      
               
               </div>   
         
         
      <div class="out_box">   
      			<img src="<?php echo ($SITE_URL); ?>/public/jack/foradmin/images/professional2.jpg"  width="180" />
      <!--
      			<img src="<?php echo ($SITE_URL); ?>/public/jack/foradmin/images/star.png"  />
         -->
         <p style="color:#069; font-weight:bold; ">Different serice package will heko you get best benefit in the shortest time and lowest cost.</p>
         
         <a href="" style="cursor:default;" class="btn1 r3"><span class="r3">Coming Soon</span></a><br />
								<!--
         <a href=""><strong>Learn More >></strong></a>        
         -->
       </div>
       
    </div>  
 
<div id="content">
<h2>My Product List</h2>

	<!--  内容列表   -->
        <form name="form2" style="margin-bottom:0px;">
        
        
        
        
        <table class="list_table" width="98%" border="0" cellpadding="2" cellspacing="1"  align="left" >
           
            <tr align="center"  height="28">
                <th width="8%">ID</th>
                <th width="5%">User ID</th>
                <th width="13%">Product Name</th>
                <th width="13%">Price</th>
                <th width="13%">Quantity</th>
                <th width="14%">Type</th>
                <th width="10%">Option</th>
                <th width="10%">Language List</th>
            </tr>
            
            <?php if(is_array($data["tb_products"])): foreach($data["tb_products"] as $key=>$vo): ?><tr align='center' bgcolor="#FFFFFF" onMouseMove="javascript:this.bgColor='#FCFDEE';" onMouseOut="javascript:this.bgColor='#FFFFFF';" height="22" >
                <td><?php echo ($vo["pid"]); ?></td>
                <td><?php echo ($vo["user_id"]); ?></td>
                <td><?php echo ($vo["name"]); ?></td>
                <td><?php echo ($vo["price"]); ?></td>
                <td><?php echo ($vo["quantity"]); ?></td>
                <td><?php if($vo["type"] == 1): ?>Supply<?php endif; ?><?php if($vo["type"] == 2): ?>Demand<?php endif; ?></td>
                <td>
                    <a href="__URL__/edit/pid/<?php echo ($vo["pid"]); ?>">Update</a> | 
                    <a href="javascript:del(<?php echo ($vo["pid"]); ?>)">Delete</a>
                </td>
                <td>
                	<a href="__URL__/lang_index/product_id/<?php echo ($vo["pid"]); ?>">List</a>
                </td>
            </tr><?php endforeach; endif; ?>
            <tr>
            <td height="28" colspan="10">
                <?php echo ($msg["page"]); ?>
            </td>
            </tr>
        </table>
    </form>
    
    <a href="__URL__/add" class="btn1 r3"><span class="r3">Add Product</span></a>
    
</div>
</div> <!-- wrapper -->

<div id="footer"> 
						<div class="w960">
  
   <div style="overflow:hidden;  ">
     <ul class="ul5">
     	<h5>About Comtoworld.com</h5>
     		<li><a href="">Company Information</a></li>
     		<li><a href="">Partner with Us</a></li>
     		<li><a href="">Site Map</a></li>
     		<li><a href="">User Guide</a></li>
       </ul>
       
       
       <ul class="ul5">
									<h5>Buying on Comtoworld.com</h5>
         <li><a href="">Post Buying Requests</a></li>
         <li><a href="">Browse Categories</a></li>
         <li><a href="">Browse by Country</a></li>
         <li><a href="">Buy on AliExpress</a></li>
         <li><a href="">How to Buy</a></li>
       </ul>
       
       <ul class="ul5">
       		<h5>Selling on Comtoworld.com</h5>
        <li><a href="">Premium Membership</a></li>
        <li><a href="">Display Products</a></li>
        <li><a href="">My Alibaba</a></li>
        <li><a href="">How to Sell</a></li>
       </ul> 


								<ul class="ul5">
        		<h5>Other Services & Tools</h5>
         <li><a href="">TradeManager</a></li>
         <li><a href="">Ask It!</a></li>
         <li><a href="">Price Watch</a></li>
         <li><a href="">Trade Alert</a></li>
       </ul>

							<ul class="ul5">
										<h5>Safety & Support</h5>	
         <li><a href="">Submit a Complaint</a></li>
         <li><a href="">Help Center</a></li>
         <li><a href="">Contact us</a></li>
         <li><a href="">Safety & Security Center</a></li>
        </ul>
	</div>
  
      <p style="color:#999; font-size:11px;  ">Copyright &copy; 2011 Comtoworld.com  Limited and licensors. All rights reserved. </p>
  

  </div><!-- EO w960 -->
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
</div>
</body>
</html>