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

<div id="content">
	<div id="content_left">aa</div>
    <div id="content_right">
    	<div><span>Schedule</span><a style="float:right;" href="<?php echo ($SITE_URL); ?>/biz.php?s=Schedule/task_add">Add</a></div>
        <div>
            <table>
            	<thead>
                	<tr>
                    	<th colspan="2">Today</th>
                    </tr>
                </thead>
            	<tbody>
                <?php if(is_array($data["tb_task_today"])): foreach($data["tb_task_today"] as $key=>$vo): ?><tr>
                        <td><?php echo ($vo["time"]); ?></td>
                        <td><a href="<?php echo ($SITE_URL); ?>/biz.php?s=Schedule/task_update/task_id/<?php echo ($vo["task_id"]); ?>"><?php echo ($vo["title"]); ?></a></td>
                    </tr><?php endforeach; endif; ?>
                </tbody>
            </table>
            <table>
            	<thead>
                	<tr>
                    	<th colspan="2">Tomorrow</th>
                    </tr>
                </thead>
            	<tbody>
                <?php if(is_array($data["tb_task_tomorrow"])): foreach($data["tb_task_tomorrow"] as $key=>$vo): ?><tr>
                        <td><?php echo ($vo["time"]); ?></td>
                        <td><a href="<?php echo ($SITE_URL); ?>/biz.php?s=Schedule/task_update/task_id/<?php echo ($vo["task_id"]); ?>"><?php echo ($vo["title"]); ?></a></td>
                    </tr><?php endforeach; endif; ?>
                </tbody>
            </table>
            <table>
            	<thead>
                	<tr>
                    	<th colspan="2">Next Week</th>
                    </tr>
                </thead>
            	<tbody>
                <?php if(is_array($data["tb_task_nextweek"])): foreach($data["tb_task_nextweek"] as $key=>$vo): ?><tr>
                        <td><?php echo ($vo["time"]); ?></td>
                        <td><a href="<?php echo ($SITE_URL); ?>/biz.php?s=Schedule/task_update/task_id/<?php echo ($vo["task_id"]); ?>"><?php echo ($vo["title"]); ?></a></td>
                    </tr><?php endforeach; endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>



</div> <!-- wrapper -->

<div id="footer"> 
	Here is footer div.
</div>
</body>
</html>