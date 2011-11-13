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
        
        <link type="text/css" href="<?php echo ($SITE_URL); ?>/public/jack/forbiz/css/common.css" rel="stylesheet" />
        
        
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
                  <a href="#">My world</a>
                 </li>
                 <li> 
                     <a href="#">Messenge &amp; Condition</a>
                  </li>
                  <li>   
                     <a href="#">Buying</a>
                   </li>
                   <li>  
                     <a href="#">Selling</a>
                   </li>
                   <li> 
                     <a href="#">Company</a>
                   </li> 
                   <li>
                     <a href="#">Account</a>
                   </li>
                   <li>
                     <a href="#">Service Package</a>
                   </li>
                   <li> 
                     <a href="<?php echo ($SITE_URL); ?>/biz.php?s=Index/fraud">Fraud Report</a>
                	 </li>
            </ul>
          </div>           
    </div>
    
</div>

<div id="wrapper">

<div id="content">
	<div id="content_left">aa</div>
    <div id="content_right">
    	<div><span>Schedule</span><a style="float:right;" href="<?php echo ($SITE_URL); ?>/biz.php?s=Schedule/task_add">Add</a></div>
        <div>
            <table>
            	<thead>
                	<tr>
                    	<th colspan="2">Today</th>
                    </tr>
                </thead>
            	<tbody>
                <?php if(is_array($data["tb_task_today"])): foreach($data["tb_task_today"] as $key=>$vo): ?><tr>
                        <td><?php echo ($vo["time"]); ?></td>
                        <td><a href="<?php echo ($SITE_URL); ?>/biz.php?s=Schedule/task_update/task_id/<?php echo ($vo["task_id"]); ?>"><?php echo ($vo["title"]); ?></a></td>
                    </tr><?php endforeach; endif; ?>
                </tbody>
            </table>
            <table>
            	<thead>
                	<tr>
                    	<th colspan="2">Tomorrow</th>
                    </tr>
                </thead>
            	<tbody>
                <?php if(is_array($data["tb_task_tomorrow"])): foreach($data["tb_task_tomorrow"] as $key=>$vo): ?><tr>
                        <td><?php echo ($vo["time"]); ?></td>
                        <td><a href="<?php echo ($SITE_URL); ?>/biz.php?s=Schedule/task_update/task_id/<?php echo ($vo["task_id"]); ?>"><?php echo ($vo["title"]); ?></a></td>
                    </tr><?php endforeach; endif; ?>
                </tbody>
            </table>
            <table>
            	<thead>
                	<tr>
                    	<th colspan="2">Next Week</th>
                    </tr>
                </thead>
            	<tbody>
                <?php if(is_array($data["tb_task_nextweek"])): foreach($data["tb_task_nextweek"] as $key=>$vo): ?><tr>
                        <td><?php echo ($vo["time"]); ?></td>
                        <td><a href="<?php echo ($SITE_URL); ?>/biz.php?s=Schedule/task_update/task_id/<?php echo ($vo["task_id"]); ?>"><?php echo ($vo["title"]); ?></a></td>
                    </tr><?php endforeach; endif; ?>
                </tbody>
            </table>
        </div>
    </div>
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