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

*/ ?>

<link href="<?php echo ($SITE_URL); ?>/public/jack/forindex/css/style.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript" src="<?php echo ($SITE_URL); ?>/public/jack/forindex/js/jquery.js"></script>
   
        
<title><?php echo ($msg["zh-cn"]["title"]); ?></title>
</head>
<body>


<div id="header">
		<div class="w960">
    <div class="login_info">
    			 <img src="<?php echo ($SITE_URL); ?>/public/jack/forindex/images/icon_p.png" width="16" height="16" /> Welcome maggie, <a href="">Sign out</a> | <a href="">Go to admin area</a> | <a href="contact.php">Contact Us</a>
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


<p>  <b>Latest Update Gategories</b>
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
</p>

<!--
<p>箱包 、配件 手提包 手拿包 皮夹 明星 镜框 皮带 墨镜 Casio 围巾 旅行箱 珠宝 、饰品 美钻 项链 戒指 胸针 日韩发饰 假发 专柜swarovski 耳环 开运 食品 、百货 茶叶 零食 家纺 收纳 成人用品 数码 、3C配件 国货精品 平板电脑 Apple配件 小家电 保健按摩 电玩配件 母婴用品 智能玩具 童装 孕妇装 亲子装 爬爬服 宝宝纪念品 手工DIY 其它 运动 户外用品 汽车用品 文具 书籍 音像 个性定制 收藏品 </p>
-->

<div id="page_left">
  <div class="left_bar">
   <div class="box">
   	<h4>Categories</h4>
<script>
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
</script>   
      <ul class="category" >
      <li><a href="product_list.php">Agriculture</a>
      <!-- 2级菜单 -->
      			<ul class="sub_category">
       			  <li class="first"><a href="">Construction &amp; Real Estate</a></li>
              <li><a href="">Consumer Electronics</a></li>
              <li><a href="">Electrical Equipment &amp; Supplies</a></li>
              <li><a href="">Energy</a></li>
              <li><a href="">Fashion Accessories</a></li>
      							  <li><a href="">Apparel</a></li>
              <li><a href="">Automobiles &amp; Motorcycles</a></li>
              <li><a href="">Beauty &amp; Personal Care</a></li>
              <li><a href="">Chemicals</a></li>
              <li><a href="">Computer Hardware &amp; Software</a></li>
      				</ul>
         <!-- end of 2级菜单 -->
      </li>
      <li><a href="product_list.php">Apparel</a></li>
      <li><a href="product_list.php">Automobiles &amp; Motorcycles</a></li>
      <li><a href="">Beauty &amp; Personal Care</a>
      <!-- 2级菜单 -->
      			 <ul class="sub_category">
       			  	<li class="first"><a href="">Construction &amp; Real Estate</a></li>
              <li><a href="">Consumer Electronics</a></li>
              <li><a href="">Electrical Equipment &amp; Supplies</a></li>
              <li><a href="">Energy</a></li>
              <li><a href="">Fashion Accessories</a></li>
      							  <li><a href="">Apparel</a></li>
              <li><a href="">Automobiles &amp; Motorcycles</a></li>
              <li><a href="">Beauty &amp; Personal Care</a></li>
              <li><a href="">Chemicals</a></li>
              <li><a href="">Computer Hardware &amp; Software</a></li>
      				</ul>
        <!-- end of 2级菜单 -->  
      </li>    
      <li><a href="product_list.php">Chemicals</a></li>
      <li><a href="product_list.php">Computer Hardware &amp; Software</a></li>
      <li><a href="product_list.php">Construction &amp; Real Estate</a></li>
      <li><a href="product_list.php">Consumer Electronics</a></li>
      <li><a href="product_list.php">Electrical Equipment &amp; Supplies</a></li>
      <li><a href="product_list.php">Energy</a></li>
      <li><a href="product_list.php">Fashion Accessories</a></li>
      <li><a href="product_list.php">Food &amp; Beverage</a></li>
      <li><a href="product_list.php">Furniture</a></li>
      <li><a href="product_list.php">Gifts &amp; Crafts</a> </li>
      <li><a href="product_list.php">Health &amp; Medical</a></li>
      <li><a href="product_list.php">Home Appliances</a></li>
      <li><a href="product_list.php">Home &amp; Garden</a></li>
      <!--
      <li><a href="">Lights &amp; Lighting</a></li>
      <li><a href="">Machinery</a></li>
      <li><a href="">Mechanical Parts &amp; Fabrication Services</a></li>
      <li><a href="">Minerals &amp; Metallurgy</a></li>
      <li><a href="">Office &amp; School Supplies</a></li>
      <li><a href="">Packaging &amp; Printing</a></li>
      <li><a href="">Shoes &amp; Accessories</a></li>     
      <li><a href="">Sports &amp; Entertainment&nbsp;&nbsp;</a></li>
      <li><a href="">Textiles &amp; Leather Products</a></li>
      <li><a href="">Toys &amp; Hobbies</a></li>
      <li><a href="">Transportation</a></li>
      <li><a href="">Business Services</a></li>
      <li><a href="">Electronic Components &amp; Supplies</a></li>
      <li><a href="">Environment</a></li>
      <li><a href="">Excess Inventory</a></li>
      -->
      <li class="showmore"><a href="javascript:;" class="showmore_btn">More Categories</a>
      <!--
      <ul id="hidden-cate" class="">
      <li><a href="">Hardware</a></li>
      <li><a href="">Luggage, Bags &amp; Cases</a></li>
      <li><a href="">Measurement &amp; Analysis Instruments</a></li>
      <li><a href="">Rubber &amp; Plastics</a></li>
      <li><a href="">Security &amp; Protection</a></li>
      <li><a href="">Service Equipment</a></li>
      <li><a href="">Telecommunications</a></li>
      <li><a href="">Timepieces, Jewelry &amp; Eyewear</a></li>
      <li><a href="">Tools</a></li>
      </ul>
      </li>
      -->
      </ul>
      <ul class="category hide" >
          <li><a href="product_list.php">Hardware</a></li>
          <li><a href="product_list.php">Luggage, Bags &amp; Cases</a></li>
          <li><a href="product_list.php">Measurement &amp; Analysis Instruments</a></li>
          <li><a href="product_list.php">Rubber &amp; Plastics</a></li>
          <li><a href="product_list.php">Security &amp; Protection</a></li>
          <li><a href="product_list.php">Service Equipment</a></li>
          <li><a href="product_list.php">Telecommunications</a></li>
          <li><a href="product_list.php">Timepieces, Jewelry &amp; Eyewear</a></li>
          <li><a href="product_list.php">Tools</a></li>
      </ul>
   
      
      
  
  </div>
  </div>
</div>







<div id="main_content">
		
       <div class="row">
       
          <div class="signup_sidebar">
          <p>Already A Member?<br />
          <a href="" class="signin_btn">Sign In</a>
          </p>
       
          <p class="s">Not a member yet? <a href="">Join Free</a> </p>
          
          <img src="<?php echo ($SITE_URL); ?>/public/jack/forindex/images/login-key.jpg" width="170" />
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
        		<img src="<?php echo ($SITE_URL); ?>/public/jack/forindex/images2/sample1.jpg" title="Newsflash 2" height="210" width="390"> 
            <!--    
             <div class="lof-main-item-desc">
                <h3><a target="_parent" title="Newsflash 2" href="#">Newsflash 2</a></h3>

                <p>The one thing about a Web site, it always changes! Joomla! makes it easy to add Articles, content,...</p>
             </div>
             -->
        </li> 
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
      
      </ul>  	
  </div>
  <!-- END MAIN CONTENT --> 
    <!-- NAVIGATOR -->

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
  </div>
 </div> 
 </div> 
    




          
        
       </div>
  
  
  <div class="row">
  			
       <div  class="ads_3">
          <ul>
               <li id="ad_1">  
                  <h3>Customized Marketing Service</h3>
                 	<span></span>
               </li>
               <li id="ad_2">  
                  <h3>Companies Online Credit Checking </h3>
                  <span></span>
                 
               </li>
               <li id="ad_3">  
                  <h3>Online Solutions</h3>	
                  <span></span>
                  
               </li>
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
  <p><img src="<?php echo ($SITE_URL); ?>/public/jack/forindex/images/girl.jpg"  />
  
  We start out with an h2 tag with a link as the "trigger" for our effect. Below our h2, we will have our container where we hold the content.</p>
  
  <p><span>Nov 12, 2011 - Peter White</span></p>
    
</div>



</div>


<div class="ads">
<img src="<?php echo ($SITE_URL); ?>/public/jack/forindex/images/sample250a.jpg" width="250" style="margin-right:5px;" />

<img src="<?php echo ($SITE_URL); ?>/public/jack/forindex/images/sample250b.jpg" width="250" style="margin-right:5px;"  />

<img src="<?php echo ($SITE_URL); ?>/public/jack/forindex/images/sample250c.jpg" width="250" />
</div>

</div>
<!--
<img src="images/index_sample.jpg"  />
-->




  </div><!-- EO w960 -->
</div> <!-- EO Content -->


<div id="footer">
		<div class="w960">
  
   <div style="overflow:hidden; background:#f5f5f5; border:#eee solid 1px; padding:10px; ">
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
  
      <p style="color:#999; font-size:11px; text-align:center; ">Copyright &copy; 2011 Comtoworld.com  Limited and licensors. All rights reserved. </p>
  

  </div><!-- EO w960 -->
</div><!-- EO footer -->

</body>
</html>