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
	<a href="#">My world</a>
    <a href="#">Messenge &amp; Condition</a>
    <a href="#">Buying</a>
    <a href="#">Selling</a>
    <a href="#">Company</a>
    <a href="#">Account</a>
    <a href="#">Service Package</a>
    <a href="<?php echo ($SITE_URL); ?>/biz.php?s=Index/fraud">Fraud Report</a>
    
</div>

<div id="wrapper">
<script>
	$(document).ready(function(){
		$('#task_time').datetimepicker({
			showSecond: true, //显示秒
			dateFormat: "yy-mm-dd",
			timeFormat: 'hh:mm:ss',//格式化时间
			stepHour: 2,//设置步长
			stepMinute: 10,
			stepSecond: 10
		});
	});
</script>
<div id="content">
	<form name="task" method="post" action="#">
    <table>
    	<thead>
    	</thead>
    	<tbody>
        <tr>
        	<td></td>
    		<td><input type="hidden" name="user_id" value="<?php echo ($user["uid"]); ?>" /></td>
        </tr>
        <tr>
        	<td>Time</td>
        	<td><input id="task_time" type="text" name="time" value="" /></td>
        <tr>
        <tr>
       		<td>Title</td>
        	<td><input type="text" name="title" value="" /></td>
        </tr>
        <tr>
        	<td>Content</td>
        	<td><textarea name="content"></textarea></td>
        </tr>
        <tr>
        	<td></td>
        	<td><input type="submit" value="Add Task" /></td>
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