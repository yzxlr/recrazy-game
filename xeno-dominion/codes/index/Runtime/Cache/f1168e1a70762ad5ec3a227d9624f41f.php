<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php /* 
<!-- start: include -->
		<!-- start: include jquery & jquery ui -->
		<link type="text/css" href="<?php echo ($SITE_URL); ?>/public/jquery-ui-1.8.16/css/ui-lightness/jquery-ui-1.8.16.custom.css" rel="stylesheet" />	
		<script type="text/javascript" src="<?php echo ($SITE_URL); ?>/public/jquery-ui-1.8.16/js/jquery-1.6.2.min.js"></script>
		<script type="text/javascript" src="<?php echo ($SITE_URL); ?>/public/jquery-ui-1.8.16/js/jquery-ui-1.8.16.custom.min.js"></script>
        <!-- end:   include jquery & jquery ui -->
        <!-- start: include super-fish menu jquery plugin -->
        <link type="text/css" href="<?php echo ($SITE_URL); ?>/public/superfish-1.4.8/css/superfish.css" rel="stylesheet" />	
		<script type="text/javascript" src="<?php echo ($SITE_URL); ?>/public/superfish-1.4.8/js/superfish.js"></script>
        <!-- end: include super-fish menu jquery plugin -->
        
        
        <!-- start: include jack's css & js -->
        <link type="text/css" href="<?php echo ($SITE_URL); ?>/public/jack/forindex/css/common.css" rel="stylesheet" />
        <!-- end:   include jack's css & js -->
        
<!-- end: include -->

//*/ ?>

<link href="<?php echo ($SITE_URL); ?>/public/jack/forindex/css/style.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript" src="<?php echo ($SITE_URL); ?>/public/jack/forindex/js/jquery.js"></script>
   
        
<title><?php echo $msg["title"][LANG_SET]; ?></title>
</head>
<body>


<div id="header">
		<div class="w960">
    <div class="login_info">
    			 <img src="<?php echo ($SITE_URL); ?>/public/jack/forindex/images/icon_p.png" width="16" height="16" /> Welcome <?php echo ($_SESSION['user']['user_name']); ?>, <a href="<?php echo ($SITE_URL); ?>/index.php?s=Public/logout">Sign out</a> | <a href="">Go to admin area</a> | <a href="contact.php">Contact Us</a>
  		</div>
  <a href="index.php">  <img src="<?php echo ($SITE_URL); ?>/public/jack/forindex/images/logo.png"  height="54" alt="Come To Word" /></a>
  
<div class="menu">
    <ul>
      <li class="selected"><a href="">Products</a></li>
      <li><a href="http://xeno.recrazy.net/index.php?s=Products/lists/flag/supply/cat_id/0">Suppliers </a></li>
      <li><a href="http://xeno.recrazy.net/index.php/Products/product/id/6?l=zh-cn">Buyers</a></li>
      <li><a href="">Business cooperation</a></li>
      <li><a href="">Exhibition</a></li>
      <li><a href="">Business Service</a></li>
      <li><a href="">Forums</a></li>
   </ul>
  </div>
  
<div class="search_bar">
    	
    			<input type="text" value="Enter Keyword to Search" />
       <select>
       		<option>Select Country/Region</option>
       
       
       </select>
       
       
       <a href="" class="search_btn">Search Now</a>
       <a href="" class="search_btn2">Advance Search >></a>
    
    </div>
  
  
  </div><!-- EO w960 -->
</div> <!-- EO Header -->


<div id="content">
<div class="w960">

    <?php if(empty($data["tb_page"]["tj_id"])): ?><h3><?php echo ($data["tb_page"]["page_title"]); ?></h3>
        <div id="page_content"><?php echo ($data["tb_page"]["page_content"]); ?></div><?php endif; ?>
    
    <notempty name="data.tb_page.tj_id">
    	<h3><?php echo ($data["tb_page"]["tj_title"]); ?></h3>
        <div id="page_summary"><?php echo ($data["tb_page"]["tj_summary"]); ?></div>
        <div id="page_content"><?php echo ($data["tb_page"]["tj_content"]); ?></div>
    </empty>

  </div><!-- EO w960 -->
</div> <!-- EO Content -->


<div id="footer">
		<div class="w960">
  
   <div style="overflow:hidden; background:#f5f5f5; border:#eee solid 1px; padding:10px; ">
     <ul class="ul5">
     	<h5>About Comtoworld.com</h5>
     		<li><a href="<?php echo ($SITE_URL); ?>/index.php/Page/index/id/1">Company Information</a></li>
     		<li><a href="<?php echo ($SITE_URL); ?>/index.php/Page/index/id/2">Partner with Us</a></li>
     		<li><a href="<?php echo ($SITE_URL); ?>/index.php/Page/index/id/3">Site Map</a></li>
     		<li><a href="<?php echo ($SITE_URL); ?>/index.php/Page/index/id/4">User Guide</a></li>
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
  
      <p style="color:#999; font-size:11px; text-align:center; ">Copyright &copy; 2011 Comtoworld.com  Limited and licensors. All rights reserved. </p>
  

  </div><!-- EO w960 -->
</div><!-- EO footer -->

</body>
</html>