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

<!--
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>

		<script src="<?php echo ($SITE_URL); ?>/public/jack/forindex/js/jquery.colorbox.js"></script>
 <link href="<?php echo ($SITE_URL); ?>/public/jack/forindex/js/colorbox.css" rel="stylesheet" type="text/css" /> 
  <script>
			$(document).ready(function(){
				//Examples of how to assign the ColorBox event to elements
				$(".group1").colorbox({rel:'group1'});
				$(".group2").colorbox({rel:'group2', transition:"fade"});
				$(".group3").colorbox({rel:'group3', transition:"none", width:"75%", height:"75%"});
				$(".group4").colorbox({rel:'group4', slideshow:true});
				$(".ajax").colorbox();
				$(".youtube").colorbox({iframe:true, innerWidth:425, innerHeight:344});
				$(".iframe").colorbox({iframe:true, width:"80%", height:"80%"});
				$(".inline").colorbox({inline:true, width:"50%"});
				$(".callbacks").colorbox({
					onOpen:function(){ alert('onOpen: colorbox is about to open'); },
					onLoad:function(){ alert('onLoad: colorbox has started to load the targeted content'); },
					onComplete:function(){ alert('onComplete: colorbox has displayed the loaded content'); },
					onCleanup:function(){ alert('onCleanup: colorbox has begun the close process'); },
					onClosed:function(){ alert('onClosed: colorbox has completely closed'); }
				});
				
				//Example of preserving a JavaScript event for inline calls.
				$("#click").click(function(){ 
					$('#click').css({"background-color":"#f00", "color":"#fff", "cursor":"inherit"}).text("Open this window again and this message will still be here.");
					return false;
				});
			});
		</script>
-->  



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

<div id="header">
  <div class="w960">
  
  
  		<div class="language">
     <strong>Lanuage - </strong>
    			   <a href="<?php echo $SITE_URL.$the_uri; if(empty($the_uri)||$the_uri=='/') echo '?l=zh-cn'; else echo '/l/zh-cn'; ?>">中文</a>
<a href="<?php echo $SITE_URL.$the_uri; if(empty($the_uri)||$the_uri=='/') echo '?l=en-us'; else echo '/l/en-us'; ?>">English</a>
  
  		</div>

 

  
    <div class="login_info">
      <?php if(!empty($_SESSION['user'])): ?><img src="<?php echo ($SITE_URL); ?>/public/jack/forindex/images/icon_p.png" width="16" height="16" /> Welcome <?php echo ($_SESSION['user']['user_name']); ?>, <a href="<?php echo ($SITE_URL); ?>/index.php?s=Public/logout">Sign out</a>
      															 <span style="color:#999;">|</span> <a href="<?php echo ($SITE_URL); ?>/admin.php">Go to admin area</a><?php endif; ?>
      <?php if(empty($_SESSION['user'])): ?><a href="<?php echo ($SITE_URL); ?>/index.php/Public/login">LogIn</a>   <span style="color:#999;">|</span>  
                <a href="<?php echo ($SITE_URL); ?>/index.php/Public/register">Sign Up</a> 
      <!-- | <a class="iframe" href="<?php echo ($SITE_URL); ?>/index.php/Public/login">test</a> --><?php endif; ?>
      <span style="color:#999;">|</span> <a href="<?php echo ($SITE_URL); ?>/index.php/Page/index/id/15">Contact Us</a> </div>
    <a href="<?php echo ($SITE_URL); ?>" class="logo"> <img src="<?php echo ($SITE_URL); ?>/public/jack/forindex/images/logo.png"  height="54" alt="Come To Word" /></a>
    <div class="menu">
      <?php /////var_dump(MODULE_NAME); var_dump(ACTION_NAME); ?>
      <ul>
        <li <?php if(MODULE_NAME=="Index"&& ACTION_NAME=="index"){ echo 'class="selected"'; } ?> ><a href="<?php echo ($SITE_URL); ?>">Home</a></li>
      
        <li <?php if(MODULE_NAME=="Products"&& ACTION_NAME=="lists"){ if(!empty($_GET["flag"])){ if($_GET["flag"]=="supply")echo 'class="selected"'; }} ?>><a href="<?php echo ($SITE_URL); ?>/index.php?s=Products/lists/flag/supply/cat_id/0">Suppliers </a></li>
        <li <?php if(MODULE_NAME=="Products"&& ACTION_NAME=="lists"){ if(!empty($_GET["flag"])){ if($_GET["flag"]=="demand")echo 'class="selected"'; }} ?>> <a href="<?php echo ($SITE_URL); ?>/index.php?s=Products/lists/flag/demand/cat_id/0">Buyers</a> </li>
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


<div id="page_left">
  <div class="left_bar">
   <div class="box">
   	<h4>Categories</h4>
<script>
/*
$(function(){
		$(".category>li").hover(
			function (){
				$(".category li").removeClass("hover");
				$(this).addClass("hover");
			}
		);
			$("#page_left").mouseleave(
					function (){
						$(".category li").removeClass("hover");
					}
			)
});

$(document).ready( function(){	
		$('.showmore_btn').click(
							function(){
								 $('.category').removeClass('hide');
								$('.showmore').hide();													
							}
			)
	});
	*/
$(document).ready( function(){	
		$('.showmore a').click(
							function(){
							//	 $('.category').removeClass('hide');
								$('li.hide').removeClass('hide');								
								$('.showmore').parent().hide();
							}
			)
	});
</script>   




      <ul class="category" ><?php //var_dump($categories); ?>
      <?php $i = 0; ?>
      
          <?php if(is_array($categories)): foreach($categories as $key=>$vo1): ?><?php 		$i = $i + 1 ;  ?>
        
              <li class='<?php if($i > 18) echo "hide"; ?>'>
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
                 <!-- end of 2级菜单 -->
              </li><?php endforeach; endif; ?>
      </ul>
      <ul class="category_show" >
          <li class="showmore"><a href="javascript:;">Show More ..</a></li>
      
      </ul>
   
      
      
  
  </div>
  </div>
</div>
<div id="main_content">
 
 <!--
  <div class="row">
    <div class="signup_sidebar" style="height:110px;">
      <p>Member: <?php echo ($user["name"]); ?> <a href="">Log Out</a> <br />
        Join Premium Account?<a href="" class="signin_btn">Upgrade Now</a> </p>
      <p class="s"> <a href="">Learn more ..</a> </p>
     
      
    </div>
    <div class="banner570"> <img src="<?php echo ($SITE_URL); ?>/public/jack/forindex/images/128801480001111112140006.gif" /> </div>
  </div>
  -->
  <p>Products > Agriculture > Fruit > Fresh Fruit > Fresh Apples:</p>
  
  <div class="page_navi">
  <?php echo ($msg["page"]); ?> 
     Page  1 /22    <div style="float:right;"> << 1 2 3 4 5 6 7 8 9 10 >> </div>
  </div>
  
  <div class="row"> 
    
    <!--
    <h3>List</h3>
		-->
    
    <ul class="product_list">
      <?php if(is_array($data["tb_products"])): foreach($data["tb_products"] as $key=>$vo): ?><li>
          
          <div class="thumnbnail_img"> <a href="<?php echo ($SITE_URL); ?>/index.php/Products/product/id/<?php echo ($vo["pid"]); ?>">
            <?php 
                                  $title_image = explode(",",$vo["image"]);
                                     $vo["image"] = $title_image[0];
                                 ?>
            <?php if(!empty($vo["image"])): ?><img src="<?php echo ($SITE_URL); ?>/public/uploads/images/<?php echo ($vo["image"]); ?>" /><?php endif; ?>
            <?php if(empty($vo["image"])): ?><img src="<?php echo ($SITE_URL); ?>/public/uploads/images/no-image.jpg" /><?php endif; ?>
            </a> </div>
          <div class="desc">
            <h2> <a href="<?php echo ($SITE_URL); ?>/index.php/Products/product/id/<?php echo ($vo["pid"]); ?>">
              <?php if(!empty($vo["lang_name"])): ?><?php echo ($vo["lang_name"]); ?><?php endif; ?>
              <?php if(empty($vo["lang_name"])): ?><?php echo ($vo["name"]); ?><?php endif; ?>
              </a> </h2>
            <p class="summary">
              <?php if(!empty($vo["lang_description"])): ?><?php echo ($vo["lang_description"]); ?><?php endif; ?>
              <?php if(empty($vo["lang_description"])): ?><?php echo ($vo["description"]); ?><?php endif; ?>
            </p>
            <p class="min_order">
              <?php /* ?>Min. Order: 10 Pieces<?php //*/ ?>
              <span class="price"><b>Price: </b> US $<?php echo ($vo["price"]); ?>/ each</span> </p>
          </div>
          <div class="company_info">
            <p>
              <?php /* ?>
                       				<b>Supplier:</b> Company Name
                                    <?php //*/ ?>
            </p>
            <p> <span><?php echo ($vo["region_country"]); ?></span> <span><?php echo ($vo["region_province"]); ?></span> </p>
            <p> <img width="16" height="16" src="<?php echo ($SITE_URL); ?>/public/jack/forindex/images/icon_p.png"  /> <a href="">Online Support</a> </p>
            <p> 
            	<?php if(($vo["type"])  ==  "1"): ?><a class="contact_btn" href="to:<?php echo ($vo["user_email"]); ?>">Contact Supplier</a><?php endif; ?>
                <?php if(($vo["type"])  ==  "2"): ?><a class="contact_btn" href="to:<?php echo ($vo["user_email"]); ?>">Contact Buyer</a><?php endif; ?>
            </p>
          </div>
          
          <!--
                         <h4>
                          <a href="<?php echo ($SITE_URL); ?>/index.php/Products/product/id/<?php echo ($vo["pid"]); ?>">
                                 <?php if(!empty($vo["lang_name"])): ?><?php echo ($vo["lang_name"]); ?><?php endif; ?>
                                 <?php if(empty($vo["lang_name"])): ?><?php echo ($vo["name"]); ?><?php endif; ?>
                             </a>
                         </h4>
                       
                         <div class="region_div">
                          <span><?php echo ($vo["region_country"]); ?></span>
                             <span><?php echo ($vo["region_province"]); ?></span>
                         </div>
                     --> 
          
        </li><?php endforeach; endif; ?>
    </ul>
     <div class="page_navi">
     <?php echo ($msg["page"]); ?> 
     Page  1 /22    <div style="float:right;"> << 1 2 3 4 5 6 7 8 9 10 >> </div>
  </div>
    

  </div>
  <!-- EO row --> 
</div>
<!-- EO main_content --> 

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
  
  <!--
  		<b>Product Categories:</b>
  
      <?php //var_dump($categories); ?>
      <?php $i = 0; ?>
      
          <?php if(is_array($categories)): foreach($categories as $key=>$vo1): ?><?php 		$i = $i + 1 ;  ?>
        
              
              	<a href="http://xeno.recrazy.net/index.php?s=Products/lists/flag/all/cat_id/<?php echo ($vo1["cat_id"]); ?>">
                	<?php if(empty($vo1["cat_name_with_lang"])): ?><?php echo ($vo1["cat_name"]); ?><?php endif; ?>
                    <?php if(!empty($vo1["cat_name_with_lang"])): ?><?php echo ($vo1["cat_name_with_lang"]); ?><?php endif; ?>
                </a><?php endforeach; endif; ?>
      -->
  
  
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