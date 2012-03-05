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
<?php
$the_uri = $_SERVER['REQUEST_URI'];
$the_uri = str_replace("?l=zh-cn", "", $the_uri);
$the_uri = str_replace("?l=en-us", "", $the_uri);
$the_uri = str_replace("/l/zh-cn", "", $the_uri);
$the_uri = str_replace("/l/en-us", "", $the_uri);
?>
<a href="<?php echo $SITE_URL.$the_uri; if(empty($the_uri)||$the_uri=='/') echo '?l=zh-cn'; else echo '/l/zh-cn'; ?>">中文</a>
<a href="<?php echo $SITE_URL.$the_uri; if(empty($the_uri)||$the_uri=='/') echo '?l=en-us'; else echo '/l/en-us'; ?>">English</a>
<div id="header">
  <div class="w960">
    <div class="login_info">
      <?php if(!empty($_SESSION['user'])): ?><img src="<?php echo ($SITE_URL); ?>/public/jack/forindex/images/icon_p.png" width="16" height="16" /> Welcome <?php echo ($_SESSION['user']['user_name']); ?>, <a href="<?php echo ($SITE_URL); ?>/index.php?s=Public/logout">Sign out</a><?php endif; ?>
      <?php if(empty($_SESSION['user'])): ?><a href="<?php echo ($SITE_URL); ?>/index.php/Public/login">Sign In</a><?php endif; ?>
      | <a href="<?php echo ($SITE_URL); ?>/admin.php">Go to admin area</a> | <a href="<?php echo ($SITE_URL); ?>/index.php/Page/index/id/15">Contact Us</a> </div>
    <a href="<?php echo ($SITE_URL); ?>"> <img src="<?php echo ($SITE_URL); ?>/public/jack/forindex/images/logo.png"  height="54" alt="Come To Word" /></a>
    <div class="menu">
      <?php /////var_dump(MODULE_NAME); var_dump(ACTION_NAME); ?>
      <ul>
        <li <?php if(MODULE_NAME=="Index"&& ACTION_NAME=="index"){ echo 'class="selected"'; } ?> ><a href="<?php echo ($SITE_URL); ?>">Home</a></li>
        <li <?php if(MODULE_NAME=="Products"&& ACTION_NAME=="lists"){ if(!empty($_GET["flag"])){ if($_GET["flag"]=="all")echo 'class="selected"'; }} ?>><a href="<?php echo ($SITE_URL); ?>/index.php?s=Products/lists/flag/all/cat_id/0">Products</a></li>
        <li <?php if(MODULE_NAME=="Products"&& ACTION_NAME=="lists"){ if(!empty($_GET["flag"])){ if($_GET["flag"]=="supply")echo 'class="selected"'; }} ?>><a href="<?php echo ($SITE_URL); ?>/index.php?s=Products/lists/flag/supply/cat_id/0">Suppliers </a></li>
        <li <?php if(MODULE_NAME=="Products"&& ACTION_NAME=="lists"){ if(!empty($_GET["flag"])){ if($_GET["flag"]=="demand")echo 'class="selected"'; }} ?>> <a href="<?php echo ($SITE_URL); ?>/index.php?s=Products/lists/flag/demand/cat_id/0?l=en-us">Buyers</a> </li>
        <li <?php if(MODULE_NAME=="Page"&& ACTION_NAME=="index"){ if(!empty($_GET["id"])){ if($_GET["id"]=="14")echo 'class="selected"'; }} ?>><a href="<?php echo ($SITE_URL); ?>/index.php/Page/index/id/14">Business Service</a></li>
        <!--
        <li><a href="<?php echo ($SITE_URL); ?>/index.php/Page/index/id/12">Business cooperation</a></li>
        <li><a href="<?php echo ($SITE_URL); ?>/index.php/Page/index/id/13">Exhibition</a></li>
      
        <li><a href="">Forums</a></li>
       
        <li><a href="<?php echo ($SITE_URL); ?>/index.php/Products/product/id/6?l=zh-cn">ProductPage(test)</a></li>
         -->
        <li><a href="<?php echo ($SITE_URL); ?>/admin.php">Admin Area(test)</a></li>
        <li><a href="<?php echo ($SITE_URL); ?>/biz.php">Biz Area(test)</a></li>
      </ul>
    </div>
    <div class="search_bar">
      <form action="<?php echo ($SITE_URL); ?>/index.php/index.php/Search/index">
        <input type="hidden" name="type" value="1" />
        <input type="text" name="keywords" value="<?php echo ($_GET['keywords']); ?>" />
        <select name="region">
          <option value="">Select Country/Region</option>
          <?php if(is_array($all_regions)): foreach($all_regions as $key=>$vo): ?><option value="<?php echo ($vo["region_code"]); ?>"  
            
            <?php if(($_GET['region'])  ==  $vo["region_code"]): ?>selected="selected"<?php endif; ?>
            ><?php echo ($vo["region_country"]); ?>/<?php echo ($vo["region_province"]); ?>
            
            </option><?php endforeach; endif; ?>
        </select>
        <?php //*/ ?>
        <input type="submit" value="Submit" />
      </form>
      <?php /* ?>
       <a href="" class="search_btn">Search Now</a>
       
       <a href="" class="search_btn2">Advance Search >></a>
       <?php //*/ ?>
    </div>
  </div>
  <!-- EO w960 --> 
</div>
<!-- EO Header -->

<div id="content">
<div class="w960">



<?php // var_dump($data["tb_page"]); ?>
    <?php if(!empty($data["tb_page"]["tj_id"])): ?><h3><?php echo ($data["tb_page"]["page_title"]); ?></h3>
        <div id="page_content"><?php echo ($data["tb_page"]["page_content"]); ?></div><?php endif; ?>
    
    <?php if(empty($data["tb_page"]["tj_id"])): ?><h3><?php echo ($data["tb_page"]["page_title"]); ?></h3>
     <!--
        <div id="page_summary"><?php echo ($data["tb_page"]["page_summary"]); ?></div>
        -->
        <div id="page_content"><?php echo ($data["tb_page"]["page_content"]); ?></div><?php endif; ?>

  </div><!-- EO w960 -->
</div> <!-- EO Content -->


<div id="footer">
		<div class="w960">
  
  <div class="foot_bar">
  					<a href="<?php echo ($SITE_URL); ?>/index.php/Page/index/id/12">About Us</a> | 
       <a href="<?php echo ($SITE_URL); ?>/index.php/Page/index/id/13">Contact us</a> | 
       <a href="<?php echo ($SITE_URL); ?>/index.php/Page/index/id/14">Frequently asked questions</a> | 
       <a href="<?php echo ($SITE_URL); ?>/index.php/Page/index/id/15">Terms & Conditions</a> | 
       <a href="<?php echo ($SITE_URL); ?>/index.php/Page/index/id/16">Privacy Policy</a> 
  
  </div>
  
  
  		<b>Product Categories:</b>
  
      <?php //var_dump($categories); ?>
      <?php $i = 0; ?>
      
          <?php if(is_array($categories)): foreach($categories as $key=>$vo1): ?><?php 		$i = $i + 1 ;  ?>
        
              
              	<a href="http://xeno.recrazy.net/index.php?s=Products/lists/flag/all/cat_id/<?php echo ($vo1["cat_id"]); ?>">
                	<?php if(empty($vo1["cat_name_with_lang"])): ?><?php echo ($vo1["cat_name"]); ?><?php endif; ?>
                    <?php if(!empty($vo1["cat_name_with_lang"])): ?><?php echo ($vo1["cat_name_with_lang"]); ?><?php endif; ?>
                </a>
                
              <!-- 2级菜单 -->
                    <?php if(!empty($vo1["child_cats"])): ?><ul class="sub_category">
                        	<?php if(is_array($vo1["child_cats"])): foreach($vo1["child_cats"] as $key=>$vo2): ?><li class="first">
                                	<a href="http://xeno.recrazy.net/index.php?s=Products/lists/flag/all/cat_id/<?php echo ($vo2["cat_id"]); ?>">
                                        <?php if(empty($vo2["cat_name_with_lang"])): ?><?php echo ($vo2["cat_name"]); ?><?php endif; ?>
                                        <?php if(!empty($vo2["cat_name_with_lang"])): ?><?php echo ($vo2["cat_name_with_lang"]); ?><?php endif; ?>
                                    </a>
                                </li><?php endforeach; endif; ?>
                       </ul><?php endif; ?>
                 <!-- end of 2级菜单 --><?php endforeach; endif; ?>
      
  
  
  <!--
   <div style="overflow:hidden; background:#f5f5f5; border:#eee solid 1px; padding:10px; ">
     <ul class="ul5">
     	<h5>Company Information</h5>
     		<li><a href="<?php echo ($SITE_URL); ?>/index.php/Page/index/id/1">Company Information</a></li>
     		<li><a href="<?php echo ($SITE_URL); ?>/index.php/Page/index/id/2">Partner with Us</a></li>
     		<li><a href="<?php echo ($SITE_URL); ?>/index.php/Page/index/id/3">Site Map</a></li>
   
      </ul>
       
       
       <ul class="ul5">
									<h5>Customer Service</h5>
         <li><a href="<?php echo ($SITE_URL); ?>/index.php/Page/index/id/8">Post Buying Requests</a></li>
         <li><a href="<?php echo ($SITE_URL); ?>/index.php/Page/index/id/9">Browse Categories</a></li>
         <li><a href="<?php echo ($SITE_URL); ?>/index.php/Page/index/id/11">How to Buy</a></li>
       </ul>
       
       <ul class="ul5">
       		<h5>Selling on Comtoworld.com</h5>
        <li><a href="">Premium Membership</a></li>
        <li><a href="">Display Products</a></li>
        <li><a href="">How to Sell</a></li>
       </ul> 


								<ul class="ul5">
        		<h5>Other Services & Tools</h5>
         <li><a href="">TradeManager</a></li>
         <li><a href="">Price Watch</a></li>
         <li><a href="">Trade Alert</a></li>
       </ul>

							<ul class="ul5">
										<h5>Safety & Support</h5>	
         <li><a href="">Submit a Complaint</a></li>
         <li><a href="">Help Center</a></li>
         <li><a href="">Contact us</a></li>
        </ul>
	</div>
  -->
  
      <p style="color:#999; font-size:11px; text-align:center; ">Copyright &copy; 2011 Comtoworld.com  Limited and licensors. All rights reserved. </p>
  

  </div><!-- EO w960 -->
</div><!-- EO footer -->

</body>
</html>