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
                  <a href="<?php echo ($SITE_URL); ?>/biz.php">My world</a>
                 </li>
                 <li> 
                     <a href="#">Messenge &amp; Condition</a>
                  </li>
                  <li>   
                     <a href="<?php echo ($SITE_URL); ?>/biz.php?s=Index/buying">Buying</a>
                   </li>
                   <li>  
                     <a href="<?php echo ($SITE_URL); ?>/biz.php?s=Index/selling">Selling</a>
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
                  <li>
                			<a href="<?php echo ($SITE_URL); ?>/admin.php">Go To admin account(for test only)</a>
                </li>
            </ul>
          </div>           
    </div>
    
</div>

<div id="wrapper">

<div id="content">
<!--
	<div id="content_left"></div>
    -->

<script charset="utf-8" src="/editor/kindeditor.js"></script>
<script charset="utf-8" src="/editor/lang/zh_CN.js"></script>
<script>
	var editor;
	KindEditor.ready(function(K) {
			editor = K.create('#description',{
					langType : 'en'
				});
	});
		
	function form_check(){
		if($("#product_name_id").val()==""){
			alert("Title can not empty!");
			return false;
		}
		return true;
	}
	
	$(document).ready(function(){
		$(function() {
			$( "#time_expire" ).datepicker({ dateFormat: 'yy-mm-dd' });
		});
	});
	//time_expire
</script>
<div id="content">
<table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td>
      <div style='float:right;padding-right:8px;'>
        <!--  //保留接口  -->
      </div></td>
  </tr>
  <tr>
    <td height="1" style='padding:0px'></td>
  </tr>
</table>
<form id="add_cat" name="add_cat" method="post" action="http://xeno.recrazy.net/admin.php?s=Product/add" enctype="multipart/form-data"  onsubmit="return form_check();" >
<table width="98%" align="center" border="0" cellpadding="3" cellspacing="1" bgcolor="#CBD8AC" style="margin-bottom:8px;margin-top:8px;">
  <tr>
    <td colspan="2" bgcolor="#EEF4EA" class='title'><span>Add New Product</span></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td width="18%"><div align="right">Product Name&nbsp; </div></td>
    <td width="82%"><input name="name" id="product_name_id" type="text" size="30"/>&nbsp; <font color="#FF0000">*</font></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td width="18%"><div align="right">User ID&nbsp; </div></td>
    <td width="82%">
		<input name="user_id" value="" /> Auto fill the current user id if leave empty
    </td>
  </tr>
  <tr bgcolor="#FFFFFF" style="display:none; ">
    <td width="18%"><div align="right">Type&nbsp; </div></td>
    <td width="82%">
	<select name="type" id="type">
 <!--
	   <option value="1">Supply</option>
   -->
       <option value="2">Demand</option>
      
	</select>	</td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td width="18%"><div align="right">Category&nbsp; </div></td>
    <td width="82%">
	<select name="cat_id" id="cat_id">
	  <?php if(is_array($categoty)): $i = 0; $__LIST__ = $categoty;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): ++$i;$mod = ($i % 2 )?><option value="<?php echo ($key); ?>"><?php echo ($data); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
	</select>	</td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td width="18%"><div align="right">Image&nbsp; </div></td>
    <td width="82%">
    	<input name="image[]" type="file" size="30"/>&nbsp;
    	<label>Max Width:</label><input type="text" name="thumbMaxWidth" id="thumbMaxWidth" size="10" value="" />&nbsp;
        <label>Max Height:</label><input type="text" name="thumbMaxHeight" id="thumbMaxHeight" size="10" value="" /><br />
        <input name="image[]" type="file" size="30"/><br />
        <input name="image[]" type="file" size="30"/><br />
        <input name="image[]" type="file" size="30"/><br />
        <input name="image[]" type="file" size="30"/><br />
        <input name="image[]" type="file" size="30"/><br />
    </td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td width="18%"><div align="right">Price&nbsp; </div></td>
    <td width="82%"><input name="price" type="text" size="15"/>&nbsp;</td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td width="18%"><div align="right">Quantity&nbsp; </div></td>
    <td width="82%"><input name="quantity" type="text" size="15"/>&nbsp;</td>
  </tr>
  <tr bgcolor="#FFFFFF">
        <td width="18%"><div align="right">Description &nbsp; </div></td>
        <td width="82%"><textarea name="description" id="description" style="width:700px;height:200px;visibility:hidden;"></textarea></td>
    </tr>
    <tr bgcolor="#FFFFFF">
        <td width="18%"><div align="right">Expire at: &nbsp; </div></td>
        <td width="82%"><input name="time_expire" id="time_expire" type="text" size="15" value="<?php echo ($DATE_NOW); ?>"/></td>
    </tr>
   
  <tr bgcolor="#FFFFFF">
    <td colspan="2">
	<div align="center">
    		<input type="submit" name="Submit" value="Add"> 
			<input type="reset" name="chongzhi" value="Reset">
	</div>
	</td>
  </tr>
</table>
</form>
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