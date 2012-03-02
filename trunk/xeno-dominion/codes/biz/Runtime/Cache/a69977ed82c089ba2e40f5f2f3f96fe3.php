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
				

  <div id="content_right">
  				<!--
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
          
          
           <h5 class="website">Website Status</h5>
            <a class="btn_s"  href="<?php echo ($SITE_URL); ?>/biz.php?s=Schedule/task_add"><span>View My Website</span></a>
            <p style="margin-bottom:0; "> If you don't have a website, we can help ...</p>
            
            <img src="<?php echo ($SITE_URL); ?>/public/jack/foradmin/images/webdesign.png"  width="180" />
           <p><a href=""><strong>Learn more >></strong></a></p>
           
          
          </div>
          -->
    </div>  
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
			





    
       <h2>Product Status</h2>
    
    <p><img src="<?php echo ($SITE_URL); ?>/public/jack/foradmin/images/product24.png"  style=" float:left; margin-right:2px;""/><strong>1</strong> products (<strong>1/50</strong>, 0 Editiong required)</p>
    <p><img src="<?php echo ($SITE_URL); ?>/public/jack/foradmin/images/product24.png"  style=" float:left; margin-right:2px;""/><strong>1</strong> product(s) width improvement suggesrions.</p>
    <p> As of 09:14:13 Oct. 2011</p>
    
    <a href="<?php echo ($SITE_URL); ?>/biz.php?s=Product/index" class="btn1 r3"><span class="r3">Display more product now!</span></a>
    
   <div class="hr"></div>
    
    <h2>Message Status</h2>
    <img src="<?php echo ($SITE_URL); ?>/public/jack/foradmin/images/email_icon.png"  style="float:left; margin-right:10px; " />
    
    <p><img src="<?php echo ($SITE_URL); ?>/public/jack/foradmin/images/msg24.png"  style=" float:left; margin-right:2px;""/><strong>0</strong> unread messages in inbox</p>
    
    
  <div class="hr"></div>
    
    <h2>Member Status</h2>
        <img src="<?php echo ($SITE_URL); ?>/public/jack/foradmin/images/premium_p.png"  style=" float:left; margin-right:2px;"/>
    <p>You are a Free Member Now.</p>

    <p>Gold supplier and get<strong> 22x more</strong> inquiries!</p>
    
    <a href="<?php echo ($SITE_URL); ?>/biz.php?s=Index/account" class="btn1 r3"><span class="r3">Update My Account Info</span></a><br />
    <!--
     <p>What's new ? <a href=""><strong>Learn More >></strong></a></p>
    -->
 
    
    
    
    
    
    
    
    
    
    
    
    
    

    
    
 
   
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