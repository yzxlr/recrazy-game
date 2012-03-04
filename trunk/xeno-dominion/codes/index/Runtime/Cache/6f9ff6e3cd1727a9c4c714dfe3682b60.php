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

<p>
  <?php /* ?>
    <b>Latest Update Gategories</b>
    <a href="">Agriculture</a>
    <a href="">Apparel</a>
    <a href="">Automobiles & Motorcycles</a>
    <a href="">Beauty & Personal Care</a>
    <a href="">Chemicals</a>
    <a href="">Computer Hardware & Software</a>
    <a href="">Construction & Real Estate</a>
    <a href="">Consumer Electronics</a>
    <a href="">Electrical Equipment & Supplies</a>
    <a href="">Energy</a>
    <a href="">Fashion Accessories</a>
    <a href="">Food & Beverage</a>
    <a href="">Furniture</a>
    <a href="">Gifts & Crafts</a>
    <?php //*/ ?>
</p>


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
  <div class="row">
    <div class="signup_sidebar">
      <?php if(!empty($_SESSION['user'])): ?><!--
      		  <p class="s">Not a member yet? <a href="">Join Free</a> </p>
      		-->	 
       <p style="font-weight:bold; color:#069; border-bottom:#ccc dashed 1px;">
          Welcome back, 	<?php echo ($_SESSION['user']['user_name']); ?>
      		</p>
        
        <div class="signin_quicklink">
           <h4>Quick Access</h4>
           <img src="<?php echo ($SITE_URL); ?>/public/jack/forindex/images/icon_p.png" width="16" height="16" /><a href="<?php echo ($SITE_URL); ?>/biz.php?s=Product/index">My Product</a><br />
           <img src="<?php echo ($SITE_URL); ?>/public/jack/forindex/images/icon_p.png" width="16" height="16" /><a href="<?php echo ($SITE_URL); ?>/biz.php?s=Index/accoun">Account Info</a><br />


          
        </div><?php endif; ?>
      <?php if(empty($_SESSION['user'])): ?><p>Already A Member?<br />
        <a href="<?php echo ($SITE_URL); ?>/index.php/Public/login" class="signin_btn">Sign In</a> </p>
          		  <p class="s">Not a member yet? <a href="">Join Free</a> </p>
                <img src="<?php echo ($SITE_URL); ?>/public/jack/forindex/images/login-key.jpg" width="170" /><?php endif; ?>
    
      <!--  
          <img src="images/signup.jpg" width="180" height="210" />
          --> 
    </div>
   
    <link rel="stylesheet" type="text/css" href="<?php echo ($SITE_URL); ?>/public/jack/forindex/css/style2.css" />
<script language="javascript" type="text/javascript" src="<?php echo ($SITE_URL); ?>/public/jack/forindex/js/jquery.easing.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo ($SITE_URL); ?>/public/jack/forindex/js/script.js"></script>
<script type="text/javascript">
 $(document).ready( function(){	
		$('#lofslidecontent45').lofJSidernews( {interval:4000,
											   direction:'opacity',
											   duration:1000,
											   easing:'easeInOutSine'} );						
	});


</script>
<div class="slideshow">  

<div id="lofslidecontent45" class="lof-slidecontent">
<div class="preload"><div></div></div>
 <!-- MAIN CONTENT --> 
  <div class="lof-main-outer">
  	<ul class="lof-main-wapper">
  		<li> 
    			<img src="<?php echo ($SITE_URL); ?>/public/jack/forindex/images/credit.png" title="Newsflash 2" height="210" width="574"> 
    		<!--  
        		<img src="<?php echo ($SITE_URL); ?>/public/jack/forindex/images2/sample1.jpg" title="Newsflash 2" height="210" width="390"> 
             
             <div class="lof-main-item-desc">
                <h3><a target="_parent" title="Newsflash 2" href="#">Newsflash 2</a></h3>

                <p>The one thing about a Web site, it always changes! Joomla! makes it easy to add Articles, content,...</p>
             </div>
             -->
        </li> 
        <li>
        	<img src="<?php echo ($SITE_URL); ?>/public/jack/forindex/images/service2.png" title="Newsflash 1" height="210" width="574">            
        </li> 
       <li>
        	<img src="<?php echo ($SITE_URL); ?>/public/jack/forindex/images/solutions2.png" title="Newsflash 3" height="210" width="574">            
        
        </li> 
       
        <!--
       <li>
        	<img src="<?php echo ($SITE_URL); ?>/public/jack/forindex/images2/sample2.jpg" title="Newsflash 1" height="210" width="390">            
         	
        </li> 
       <li>
        	<img src="<?php echo ($SITE_URL); ?>/public/jack/forindex/images2/sample3.jpg" title="Newsflash 3" height="210" width="390">            
        
        </li> 
        <li>

        	<img src="<?php echo ($SITE_URL); ?>/public/jack/forindex/images2/sample4.jpg" title="Newsflash 5" height="210" width="390">            
        
        </li> 
        
        <li>

        	<img src="<?php echo ($SITE_URL); ?>/public/jack/forindex/images2/sample5.jpg" title="Newsflash 5" height="210" width="390">            
        
        </li> 
      		-->
      </ul>  	
  </div>
  <!-- END MAIN CONTENT --> 
    <!-- NAVIGATOR -->
    
    
<!--
  <div class="lof-navigator-outer">
  		<ul class="lof-navigator">
            <li>
            	<div>
                	<h3> NewsFlash 1 </h3>
                 <p>
                  	<span>20.01.2010</span> - In id, mauris viverra asperiores, bibendum in id. Eu molestie. Ac sit eu...
                	</p>
               </div>    
            </li>
             <li>
             	<div>
            
                 	<h3> NewsFlash 2 </h3>
                  	<p><span>20.01.2010</span> -In id, mauris viverra asperiores, bibendum in id. Eu molestie. Ac sit eu. ..</p>
                </div>    
            </li>

            <li>
            	<div>
                    
                    <h3> NewsFlash 3 </h3>
                	<p><span>20.01.2010</span> - In id, mauris viverra asperiores, bibendum in id. Eu molestie. Ac sit eu. ..</p>
                </div>     
            </li>
            
           <li>
           		<div>
                   
                    <h3> NewsFlash 4</h3>
                    <p><span>20.01.2010</span> - In id, mauris viverra asperiores, bibendum in id. Eu molestie. Ac sit eu. ..</p>
                </div>
            </li>    
            <li>
           		 <div>
               
                 	<h3> NewsFlash 5</h3>
                 	<p><span>20.01.2010</span> -In id, mauris viverra asperiores, bibendum in id. Eu molestie. Ac sit eu. ..</p>
                 </div>   
            </li>
           <li>
           		<div>
               
                    <h3> NewsFlash 6</h3>
               		<p><span>20.01.2010</span> - In id, mauris viverra asperiores, bibendum in id. Eu molestie. Ac sit eu. ..</p>
                </div>
            </li>     		
        </ul>
       --> 
  </div>
 </div> 
 </div> 
    



 </div>
  <div class="row">
    <div  class="ads_3">
      <ul>
        <li id="ad_1">
          <h3>Customized Marketing Service</h3>
          <span></span> </li>
        <li id="ad_2">
          <h3>Companies Online Credit Checking </h3>
          <span></span> </li>
        <li id="ad_3">
          <h3>Online Solutions</h3>
          <span></span> </li>
      </ul>
      <div class="ad3_full">
        <div  class="ads_content ad_1">
          <h1> Ads Content </h1>
          <p>ASdsadsadsad asdas dsa dsad a ASdsadsadsad asdas dsa dsad a ASdsadsadsad asdas dsa dsad a</p>
        </div>
        <div class="ads_content ad_2">
          <h2> adsadsad asdas dsa dsad a ASdsadsadsad asdas dsa dsad a ASdsadsadsad asdas dsa dsad </h2>
          <p>ASdsadsadsad asdas dsa dsad a ASdsadsadsad asdas dsa dsad a ASdsadsadsad asdas dsa dsad a</p>
        </div>
        <div  class="ads_content ad_3">
          <h3>ASdsadsadsad asdas dsa dsad a ASdsadsadsad asdas dsa dsad a ASdsadsadsad asdas dsa dsad a</h3>
          <h1> Ads Content </h1>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript">
$(function(){
	$(".ads_3 ul li").click(
				function(){
										$('.ad3_full').slideToggle("fast");
										$(".ads_3 ul li").toggleClass("active");
										$("."+$(this).attr('id')).slideDown();
										
										$(function(){						
													$(".ads_3 ul li.active").hover(
															function(){
											//		alert($(this).attr('id'));
																			 	$(".ads_content").hide();
																				$("."+$(this).attr('id')).show();
																				$('.ads_3 ul li').removeClass("select");
																				$(this).addClass("select");
																}
												)

										
									}	)
	

	

		});
	

});

</script>
  <div class="row">
    <div class="commercial_news" style="margin-right:5px;">
      <h5>Commercial News</h5>
      <p>I know there are a lot of toggle tutorials out there already, but when I was learning the basics of jQuery and the toggle effect, I had a hard time finding resources on how to switch the "open" and "close" graphic state.</p>
    </div>
    <div class="commercial_news">
      <h5>Commercial News 2</h5>
      <p><img src="<?php echo ($SITE_URL); ?>/public/jack/forindex/images/girl.jpg"  /> We start out with an h2 tag with a link as the "trigger" for our effect. Below our h2, we will have our container where we hold the content.</p>
      <p><span>Nov 12, 2011 - Peter White</span></p>
    </div>
  </div>
  
  <div class="ads"> <img src="<?php echo ($SITE_URL); ?>/public/jack/forindex/images/sample250a.jpg" width="250" style="margin-right:5px;" /> <img src="<?php echo ($SITE_URL); ?>/public/jack/forindex/images/sample250b.jpg" width="250" style="margin-right:5px;"  /> <img src="<?php echo ($SITE_URL); ?>/public/jack/forindex/images/sample250c.jpg" width="250" /> </div>
</div>
<!--
<img src="images/index_sample.jpg"  />
--> 

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