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
      <li><a href="">Suppliers </a></li>
      <li><a href="">Buyers</a></li>
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
    
    <div id="product_box">
    	<h3>
        	<?php if(!empty($data["tb_products"]["lang_name"])): ?><?php echo ($data["tb_products"]["lang_name"]); ?><?php endif; ?>
            <?php if(empty($data["tb_products"]["lang_name"])): ?><?php echo ($data["tb_products"]["name"]); ?><?php endif; ?>
        </h3>
        
        <div class="image_div">
        	<?php 
                $images = explode(",",$data["tb_products"]["image"]);
            ?>
            <div class="title_image"><img src="<?php echo ($SITE_URL); ?>/public/uploads/images/<?php echo ($images["0"]); ?>" /></div>
            <ul class="image_showcase">
                <?php if(is_array($images)): foreach($images as $key=>$image): ?><li>
                    	<a href="#">
                        	<img src="<?php echo ($SITE_URL); ?>/public/uploads/images/<?php echo ($image); ?>" />
                        </a>
                    </li><?php endforeach; endif; ?>
            </ul>
        </div>
        
        <div class="basic_information">
        	<table>
            	<tbody>
                	<tr>
                    	<td><?php echo (L("product_name")); ?>:</td>
                        <td>
                        	<?php if(!empty($data["tb_products"]["lang_name"])): ?><?php echo ($data["tb_products"]["lang_name"]); ?><?php endif; ?>
          					<?php if(empty($data["tb_products"]["lang_name"])): ?><?php echo ($data["tb_products"]["name"]); ?><?php endif; ?>
                        </td>
                    </tr>
                	<tr>
                    	<td><?php echo (L("product_price")); ?>:</td>
                        <td>$<?php echo ($data["tb_products"]["price"]); ?></td>
                    </tr>
                    <tr>
                    	<td><?php echo (L("product_quantity")); ?></td>
                        <td><?php echo ($data["tb_products"]["quantity"]); ?></td>
                    </tr>
                    <tr>
                    	<td><?php echo (L("product_location")); ?></td>
                        <td>
                        	<span><?php echo ($data["tb_products"]["region_country"]); ?></span>
            				<span><?php echo ($data["tb_products"]["region_province"]); ?></span>
                        </td>
                    </tr>
                    <tr>
                    	<td><?php echo (L("product_type")); ?></td>
                        <td>
                
                        	<?php if($data["tb_products"]["type"]==1){ ?>
                            	<?php echo (L("product_supply")); ?>
                            <?php }else if($data["tb_products"]["type"]==2){ ?>
                            	<?php echo (L("product_demand")); ?>
                            <?php } ?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        <div class="description_div">
        	<?php if(!empty($data["tb_products"]["lang_description"])): ?><?php echo ($data["tb_products"]["lang_description"]); ?><?php endif; ?>
            <?php if(empty($data["tb_products"]["lang_description"])): ?><?php echo ($data["tb_products"]["description"]); ?><?php endif; ?>
        </div>
        
    </div>

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