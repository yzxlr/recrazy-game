<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
                    <a href="#">System</a>
                    <ul>
                        <li class="current">
                        	<a href="<?php echo ($SITE_URL); ?>/admin.php?s=User/index">User</a>
                        	<ul>
                            	<li><a href="<?php echo ($SITE_URL); ?>/admin.php?s=User/index">List Users</a></li>
                                <li><a href="<?php echo ($SITE_URL); ?>/admin.php?s=User/add">Add New User</a></li>
                            </ul>
                        </li>
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
                    <a href="<?php echo ($SITE_URL); ?>/admin.php?s=Product/index">Product</a>
                    <ul>
                    	<li class="current"><a href="<?php echo ($SITE_URL); ?>/admin.php?s=Productscategory/index">List Category</a></li>
                        <li><a href="<?php echo ($SITE_URL); ?>/admin.php?s=Productscategory/add">Add Category</a></li>
                        <li class="current"><a href="<?php echo ($SITE_URL); ?>/admin.php?s=Product/index">List Product</a></li>
                        <li><a href="<?php echo ($SITE_URL); ?>/admin.php?s=Product/add">Add New Product</a></li>
                    </ul>
                </li>
                <li class="current">
                    <a href="#ab">sample menu item →</a>
                    <ul>
                        <li class="current"><a href="#">menu item</a></li>
                        <li><a href="#aba">eee</a></li>
                        <li><a href="#abb">ddd</a></li>
                        <li><a href="#abb">ccc</a></li>
                        <li><a href="#abb">bbb</a></li>
                        <li><a href="#abb">aaa</a></li>
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
			editor = K.create('#page_content',{
					langType : 'en'
				});
	});
		
	function form_check(){
		if($("#page_title").val()==""){
			alert("Title can not empty!");
			return false;
		}
		return true;
	}
</script>
<div id="content">
	<form action="#" method="post" onsubmit="return form_check();">
    	<table width="98%" align="center" border="0" cellpadding="3" cellspacing="1" bgcolor="#CBD8AC" style="margin-bottom:8px;margin-top:8px;">
			<tr>
				<td colspan="2" background="__PUBLIC__/admin/images/frame/wbg.gif" bgcolor="#EEF4EA" class='title'><span>Add New Page</span></td>
			</tr>
            <tr bgcolor="#FFFFFF">
                <td width="18%"><div align="right">Title &nbsp; </div></td>
                <td width="82%"><input type="text" name="page_title" id="page_title" size="113" /> &nbsp; <font color="#FF0000">*</font></td>
            </tr>
            <tr bgcolor="#FFFFFF">
                <td width="18%"><div align="right">Summary &nbsp; </div></td>
                <td width="82%"><textarea name="page_summary" id="page_summary" style="width:695px;height:100px;"></textarea></td>
            </tr>
            <tr bgcolor="#FFFFFF">
                <td width="18%"><div align="right">Content &nbsp; </div></td>
                <td width="82%"><textarea name="page_content" id="page_content" style="width:700px;height:200px;visibility:hidden;"></textarea></td>
            </tr>
            <tr bgcolor="#FFFFFF">
                <td width="18%"><div align="right">Content &nbsp; </div></td>
                <td width="82%">
                	<select id="page_status" name="page_status">
                    	<option value="publish">Publish</option>
                        <option value="draft">Draft</option>
                    </select>
                </td>
            </tr>
            <tr bgcolor="#FFFFFF">
            	<td colspan="2">
                    <div align="center"><input type="submit" name="Submit" value="Add Page"> 
                        <input type="reset" name="reset" value="Reset">
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