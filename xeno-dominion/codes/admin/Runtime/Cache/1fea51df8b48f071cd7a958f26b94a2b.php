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
                    <a href="<?php echo ($SITE_URL); ?>/admin.php?s=Page/index">System</a>
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
                    	<li class="current"><a href="<?php echo ($SITE_URL); ?>/admin.php?s=Productcategory/index">List Category</a></li>
                        <li><a href="<?php echo ($SITE_URL); ?>/admin.php?s=Productcategory/add">Add Category</a></li>
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

<div id="wrapper">

<div id="content">
	<form action="#" method="post">
    <table>
        <thead>
            <tr>
                <td colspan="2"><h3>Add New User</h3></td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td colspan="2"></td>
            </tr>
            <tr>
                <td>Role:</td>
                <td>
                	<select value="user_role">
                    	<?php if(is_array($msg["user_roles"])): foreach($msg["user_roles"] as $key=>$vo): ?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["name"]); ?></option><?php endforeach; endif; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>User Name:</td>
                <td><input type="text" name="user_name" value="" /></td>
            </tr>
            <tr>
                <td>User Email:</td>
                <td><input type="text" name="user_email" value="" /></td>
            </tr>
            <tr>
                <td>Password : </td>
                <td><input type="text" name="user_password" value="" /></td>
            </tr>
             <tr>
                <td></td>
                <td><input type="submit" value="Add" /></td>
            </tr>
        </tbody>
    </table>
    </form>
</div>

</div> <!-- wrapper -->

<div id="footer"> 
	Here is footer div.
</div>
</body>
</html>