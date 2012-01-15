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
    			 <img src="<?php echo ($SITE_URL); ?>/public/jack/forindex/images/icon_p.png" width="16" height="16" /> Welcome <?php echo ($_SESSION['user']['user_name']); ?>, <a href="<?php echo ($SITE_URL); ?>/index.php?s=Public/logout">Sign out</a> | <a href="<?php echo ($SITE_URL); ?>/admin.php">Go to admin area</a> | <a href="contact.php">Contact Us</a>
  		</div>
  <a href="index.php">  <img src="<?php echo ($SITE_URL); ?>/public/jack/forindex/images/logo.png"  height="54" alt="Come To Word" /></a>
  
<div class="menu">
    <ul>
      <li class="selected"><a href="">Products</a></li>
      <li><a href="<?php echo ($SITE_URL); ?>/index.php?s=Products/lists/flag/supply/cat_id/0">Suppliers </a></li>
      <li><a href="<?php echo ($SITE_URL); ?>/index.php?s=Products/lists/flag/demand/cat_id/0?l=en-us">Buyers</a></li>
      <li><a href="<?php echo ($SITE_URL); ?>/index.php/Products/product/id/6?l=zh-cn">Business cooperation</a></li>
      <li><a href="<?php echo ($SITE_URL); ?>/admin.php">Exhibition</a></li>
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
      
          <div class="signup_sidebar" style="height:110px;">
               <p>Member: Maggie <a href="">Log Out</a> <br />
               Join Premium Account?<a href="" class="signin_btn">Upgrade Now</a>
               </p>
            
          <p class="s"> <a href="">Learn more ..</a> </p>
          <!--
          <p>      
          <img src="images/diamond_member_trans.gif" width="110" height="80" />
          </p>
          -->
       
          </div>
        
      
           <div class="banner570">
           
          
           
           <img src="<?php echo ($SITE_URL); ?>/public/jack/forindex/images/128801480001111112140006.gif" />
           
           
           </div>
     </div>
  


	<div class="row">

<!--
    <h3>List</h3>
		-->
				

    					<ul class="product_list">	
              <?php if(is_array($data["tb_products"])): foreach($data["tb_products"] as $key=>$vo): ?><li>   
                            		
                  					<input type="checkbox" />
                     
                       <div class="thumnbnail_img">
                       			 
                       	    <a href="<?php echo ($SITE_URL); ?>/index.php/Products/product/id/<?php echo ($vo["pid"]); ?>">
                              <?php 
                                  $title_image = explode(",",$vo["image"]);
                                     $vo["image"] = $title_image[0];
                                 ?>
                                 
                            <?php if(!empty($vo["image"])): ?><img src="<?php echo ($SITE_URL); ?>/public/uploads/images/<?php echo ($vo["image"]); ?>" /><?php endif; ?>
                           
                             <?php if(empty($vo["image"])): ?><img src="<?php echo ($SITE_URL); ?>/public/uploads/images/no-image.jpg" /><?php endif; ?>
                
                        	 </a>
                       </div>
                       
                       <div class="desc">
                       					  <h2>
                               <a href="<?php echo ($SITE_URL); ?>/index.php/Products/product/id/<?php echo ($vo["pid"]); ?>">
                              <?php if(!empty($vo["lang_name"])): ?><?php echo ($vo["lang_name"]); ?><?php endif; ?>
                                 <?php if(empty($vo["lang_name"])): ?><?php echo ($vo["name"]); ?><?php endif; ?>
                                 </a>
                       		  		</h2>
                       						
                       				<p class="summary">
                       				  <?php if(!empty($vo["lang_description"])): ?><?php echo ($vo["lang_description"]); ?><?php endif; ?>
                             <?php if(empty($vo["lang_description"])): ?><?php echo ($vo["description"]); ?><?php endif; ?>
                             </p>
                             
                             <p class="min_order">
                             				Min. Order: 10 Pieces <span class="price"><b>Price: </b> US 16/ each</span>
                              </p>   
                       </div>
                       
                       <div class="company_info">
                       				<p><b>Supplier:</b> Company Name</p>
                           <p>
                       			     <span><?php echo ($vo["region_country"]); ?></span>
                             <span><?php echo ($vo["region_province"]); ?></span>
                       				</p>
                           <p>
                           	<img width="16" height="16" src="<?php echo ($SITE_URL); ?>/public/jack/forindex/images/icon_p.png"  />
                           		<a href="">Online Support</a>
                           </p>
                           <p>
                           	 <a class="contact_btn" href="">Contact Supplier</a>
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
                 
   
    
    <div><?php echo ($msg["page"]); ?></div>
    	
		</div> <!-- EO row -->
</div> <!-- EO main_content -->


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
         <li><a href="<?php echo ($SITE_URL); ?>/index.php/Page/index/id/8">Post Buying Requests</a></li>
         <li><a href="<?php echo ($SITE_URL); ?>/index.php/Page/index/id/9">Browse Categories</a></li>
         <li><a href="<?php echo ($SITE_URL); ?>/index.php/Page/index/id/10">Browse by Country</a></li>
         <li><a href="<?php echo ($SITE_URL); ?>/index.php/Page/index/id/11">How to Buy</a></li>
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