<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- start: include -->
		<!-- start: include jquery & jquery ui -->
		<link type="text/css" href="<?php echo ($SITE_URL); ?>/public/jquery-ui-1.8.16/css/ui-lightness/jquery-ui-1.8.16.custom.css" rel="stylesheet" />	
		<script type="text/javascript" src="<?php echo ($SITE_URL); ?>/public/jquery-ui-1.8.16/js/jquery-1.6.2.min.js"></script>
		<script type="text/javascript" src="<?php echo ($SITE_URL); ?>/public/jquery-ui-1.8.16/js/jquery-ui-1.8.16.custom.min.js"></script>
        <script type="text/javascript" src="<?php echo ($SITE_URL); ?>/public/jquery-ui-1.8.16/jquery-ui-timepicker-addon.js"></script>
        <style>
        	/* css for timepicker http://trentrichardson.com/examples/timepicker/ */
			.ui-timepicker-div .ui-widget-header { margin-bottom: 8px; }
			.ui-timepicker-div dl { text-align: left; }
			.ui-timepicker-div dl dt { height: 25px; margin-bottom: -25px; }
			.ui-timepicker-div dl dd { margin: 0 10px 10px 65px; }
			.ui-timepicker-div td { font-size: 90%; }
			.ui-tpicker-grid-label { background: none; border: none; margin: 0; padding: 0; }
        </style>
        <!-- end:   include jquery & jquery ui -->
        <!-- start: include super-fish menu jquery plugin -->
        <link type="text/css" href="<?php echo ($SITE_URL); ?>/public/superfish-1.4.8/css/superfish.css" rel="stylesheet" />	
		<script type="text/javascript" src="<?php echo ($SITE_URL); ?>/public/superfish-1.4.8/js/superfish.js"></script>
        <!-- end: include super-fish menu jquery plugin -->
        
        
        <!-- start: include jack's css & js -->
        <link type="text/css" href="<?php echo ($SITE_URL); ?>/public/jack/foradmin/css/common.css" rel="stylesheet" />
        <!-- end:   include jack's css & js -->
<!-- end: include -->

<!-- start: inline -->
<script>
$(document).ready(function(){
        <!-- start: include jack's inline css & js -->
		//http://www.chhua.com/web-note980
        $("ul.sf-menu").superfish({
		   hoverClass:    'sfHover',  //当鼠标掠过时的class
		   pathClass:     'overideThisToUse', // 激活的菜单项的class
		   pathLevels:    1,       // 菜单级数
		   delay:         300,       // 下拉菜单在鼠标离开时自动隐藏时间。默认是800毫秒
		   animation:     {opacity:'show'},  // 动画效果，参考Jquery的动画jQuery's .animate()
		   speed:         'normal',    // 动画速度， 参考Jquery的动画jQuery's .animate()
		   dropShadows:   true,     // 阴影效果，关闭用'false'
		   onInit:        function(){},   // 初始化的回调函数
		   onBeforeShow:  function(){}, // 子菜单显示前回调函数
		   onShow:        function(){},  // 子菜单显示时回调函数
		   onHide:        function(){}   // 子菜单隐藏时回调函数
		});
        <!-- end: include jack's inline css & js -->
});
</script>
<!-- end: inline -->
        
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
            	<li><a href="<?php echo ($SITE_URL); ?>/admin.php">Dashboard</a></li>
                <li class="current">
                    <a href="<?php echo ($SITE_URL); ?>/admin.php?s=Product/index">Product</a>
                    <ul>
                    	<li class="current"><a href="<?php echo ($SITE_URL); ?>/admin.php?s=Productscategory/index">List Category</a></li>
                        <li><a href="<?php echo ($SITE_URL); ?>/admin.php?s=Productscategory/add">Add Category</a></li>
                        <li class="current"><a href="<?php echo ($SITE_URL); ?>/admin.php?s=Product/index">List Product</a></li>
                        <li><a href="<?php echo ($SITE_URL); ?>/admin.php?s=Product/add">Add New Product</a></li>
                    </ul>
                </li>
                <li class="current">
                    <a href="<?php echo ($SITE_URL); ?>/admin.php?s=Page/index">Page</a>
                    <ul>
                        <li class="current"><a href="<?php echo ($SITE_URL); ?>/admin.php?s=Page/index">List Pages</a></li>
                        <li><a href="<?php echo ($SITE_URL); ?>/admin.php?s=Page/add">Add New Page</a></li>
                    </ul>
                </li>
                <li class="current">
                    <a href="<?php echo ($SITE_URL); ?>/admin.php?s=Post/index">Post</a>
                    <ul>
                    	<li class="current"><a href="<?php echo ($SITE_URL); ?>/admin.php?s=Postcategory/index">List Category</a></li>
                        <li><a href="<?php echo ($SITE_URL); ?>/admin.php?s=Postcategory/add">Add Category</a></li>
                        <li class="current"><a href="<?php echo ($SITE_URL); ?>/admin.php?s=Post/index">List Post</a></li>
                        <li><a href="<?php echo ($SITE_URL); ?>/admin.php?s=Post/add">Add New Post</a></li>
                    </ul>
                </li>
                <li class="current">
                    <a href="#">System</a>
                    <ul>
                        <li class="current">
                        	<a href="<?php echo ($SITE_URL); ?>/admin.php?s=User/index">User<span class="menu_arrow_right"></span></a>
                        	<ul>
                            	<li><a href="<?php echo ($SITE_URL); ?>/admin.php?s=User/index">List Users</a></li>
                                <li><a href="<?php echo ($SITE_URL); ?>/admin.php?s=User/add">Add New User</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    
</div>
<div id="info" class="<?php echo ($msg["info"]["class"]); ?>"><?php echo ($msg["info"]["text"]); ?></div>
<div id="wrapper">
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
<form id="add_cat" name="add_cat" method="post" action="#" enctype="multipart/form-data"  onsubmit="return form_check();" >
<table width="98%" align="center" border="0" cellpadding="3" cellspacing="1" bgcolor="#CBD8AC" style="margin-bottom:8px;margin-top:8px;">
  <tr>
    <td colspan="2" bgcolor="#EEF4EA" class='title'><span>Edit Product</span></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td width="18%"><div align="right">Product Name&nbsp; </div></td>
    <td width="82%"><input name="name" id="product_name_id" type="text" size="30" value="<?php echo ($data["tb_products"]["name"]); ?>" />&nbsp; <font color="#FF0000">*</font></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td width="18%"><div align="right">Type&nbsp; </div></td>
    <td width="82%">
	<select name="type" id="type">
	   <option value="1" <?php if(($data["tb_products"]["type"])  ==  "1"): ?>selected="selected"<?php endif; ?> >Supply</option>
       <option value="2" <?php if(($data["tb_products"]["type"])  ==  "2"): ?>selected="selected"<?php endif; ?> >Demand</option>
	</select>	</td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td width="18%"><div align="right">Category&nbsp; </div></td>
    <td width="82%">
     <?php
      //var_dump($data["tb_products"]["cat_id"]);
     ?>
     <select name="cat_id" id="cat_id">
     <?php
      foreach($categoty as $key => $value){
     ?>
     	<option value="<?php echo $key; ?>" <?php if($key == $data["tb_products"]["cat_id"]){ ?>selected="selected" <?php } ?> > <?php echo $value; ?></option>
     <?php
     	//var_dump($data["tb_products"]["cat_id"]);
        //var_dump($key); exit;
       }
      ?>
      </select>
    
    </td>
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
    <td width="82%"><input name="price" type="text" size="15" value="<?php echo ($data["tb_products"]["price"]); ?>" />&nbsp;</td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td width="18%"><div align="right">Quantity&nbsp; </div></td>
    <td width="82%"><input name="quantity" type="text" size="15" value="<?php echo ($data["tb_products"]["quantity"]); ?>" />&nbsp;</td>
  </tr>
  <tr bgcolor="#FFFFFF">
        <td width="18%"><div align="right">Description &nbsp; </div></td>
        <td width="82%"><textarea name="description" id="description" style="width:700px;height:200px;visibility:hidden;"><?php echo ($data["tb_products"]["description"]); ?></textarea></td>
    </tr>
    <tr bgcolor="#FFFFFF">
        <td width="18%"><div align="right">Expire at: &nbsp; </div></td>
        <td width="82%"><input name="time_expire" id="time_expire" type="text" size="15" value="<?php echo date('Y-m-d', $data['tb_products']['time_expire'] ); ?>" /></td>
    </tr>
   
  <tr bgcolor="#FFFFFF">
    <td colspan="2">
	<div align="center">
    		<input type="submit" name="Submit" value="Edit"> 
			<input type="reset" name="chongzhi" value="Reset">
	</div>
	</td>
  </tr>
</table>
</form>
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