<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        
<title><?php echo ($msg["title"]); ?></title>
</head>
<body>

<div id="wrapper">

<form action="#" method="post">
<table>
	<thead>
    	<tr>
        	<td colspan="2"><h3>Login Page</h3></td>
        </tr>
    </thead>
    <tbody>
    	<tr>
        	<td colspan="2"></td>
      	</tr>
        <tr>
        	<td>User name:</td>
            <td><input type="text" name="user_name" value="" /> </td>
        </tr>
        <tr>
        	<td>Password : </td>
            <td><input type="password" name="user_password" value="" /></td>
        </tr>
         <tr>
        	<td></td>
            <td><input type="submit" value="login" /></td>
        </tr>
    </tbody>
</table>
</form>


</div> <!-- wrapper -->
</body>
</html>