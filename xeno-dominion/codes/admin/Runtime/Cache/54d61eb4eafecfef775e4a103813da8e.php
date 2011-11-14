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
<script>
function del(id){
	if(id)
	{
	  if(confirm("Delete?")){ 
	    location="__URL__/act_add/act/del_category/id/"+id;
      }
	}
}
</script>
<script language="javascript">

function delArc(aid){
	var id=getCheckboxItem();
	if(id)
	{
	  if(confirm("是否将分类删除?")){ 
	    location="__URL__/act_add/act/del_category/id/"+id;
      }
	}else{
	    alert('请选择删除的分类');
	}
}

//获得选中文件的文件名
function getCheckboxItem()
{
	var allSel="";
	if(document.form2.id.value) return document.form2.id.value;
	for(i=0;i<document.form2.id.length;i++)
	{
		if(document.form2.id[i].checked)
		{
			if(allSel=="")
				allSel=document.form2.id[i].value;
			else
				allSel=allSel+","+document.form2.id[i].value;
		}
	}
	return allSel;
}

function selAll()
{
	for(i=0;i<document.form2.id.length;i++)
	{
		if(!document.form2.id[i].checked)
		{
			document.form2.id[i].checked=true;
		}
	}
}
function noSelAll()
{
	for(i=0;i<document.form2.id.length;i++)
	{
		if(document.form2.id[i].checked)
		{
			document.form2.id[i].checked=false;
		}
	}
}

function change_status(cat_id,is_show)
{
  var show_id = 'is_show_' + cat_id;
  var opt = {
    method: 'get',
    onSuccess: function(t) {
                $(show_id).innerHTML=t.responseText
    },
    on404: function(t) {
                $(show_id).innerHTML='错误：找不到提交页!';
    },
    onFailure: function(t) {
                $(show_id).innerHTML='错误：' + t.status + ' -- ' + t.statusText;
    },
        asynchronous:true        
   }

   var ajax=new Ajax.Request('__URL__/act_add/act/update_category_ajax/is_ajax/1/cat_id/'+cat_id+'/is_show/'+is_show, opt);
}
function change_sort(cat_id, value)
{
   var sort_id = 'sort_' + cat_id;
   $(sort_id).innerHTML = "<input type=\"text\" name=\"sort_"+cat_id+"\" id=\"sort_"+cat_id+"\" value='"+value+"' onBlur=\"do_change_sort('"+cat_id+"')\">";
}	
function do_change_sort(cat_id)
{
   var sort_id = 'sort_' + cat_id;
   var data = document.forms['form2'].elements[sort_id].value;
   var opt = {
    method: 'get',
    onSuccess: function(t) {
                $(sort_id).innerHTML=t.responseText
    },
    on404: function(t) {
                $(sort_id).innerHTML='错误：找不到提交页!';
    },
    onFailure: function(t) {
                $(sort_id).innerHTML='错误：' + t.status + ' -- ' + t.statusText;
    },
        asynchronous:true        
   }

   var ajax=new Ajax.Request('__URL__/act_add/act/update_category_ajax/is_ajax/2/cat_id/'+cat_id+'/sort/'+encodeURIComponent(data), opt);
}	
</script>
<div id="content">
<!--  内容列表   -->
<form name="form2" style="margin-bottom:0px;">
<table width="98%" border="0" cellpadding="2" cellspacing="1" bgcolor="#D1DDAA" align="center" style="margin-top:8px; margin-bottom:0px;">
<tr bgcolor="#E7E7E7">
	<td height="30" colspan="10"><span style="float:left; padding-top:3px; padding-left:5px;">产品分类列表</span><span style="float:right;"><input type='button' class="coolbg np" onClick="location='__APP__/Productscategory/add';" value='添加分类' /></span></td>
</tr>
<tr align="center" bgcolor="#FAFAF1" height="22">
	<th width="8%">ID</th>
    <!--
	<th width="5%">选择</th>
    -->
	<th width="32%">分类名</th>
	<th width="14%">父类ID</th>
	<th width="10%">排序</th>
	<th width="6%">显示</th>
	<th width="7%">操作</th>
    <th width="">语言</th>
</tr>

<?php if(is_array($categoty)): foreach($categoty as $key=>$data): ?><?php if($data["cat_id"] != '' ): ?><tr align='center' bgcolor="#FFFFFF" onMouseMove="javascript:this.bgColor='#FCFDEE';" onMouseOut="javascript:this.bgColor='#FFFFFF';" height="22" >
	<td><?php echo ($data["cat_id"]); ?></td>
    <!--
	<td><input name="id" type="checkbox" id="id" value="<?php echo ($data["cat_id"]); ?>" class="np"></td>
    -->
	<td align="left"><a href='__URL__/edit/cat_id/<?php echo ($data["cat_id"]); ?>'><u><?php echo ($data["cat_name"]); ?></u></a></td>
	<td><?php echo ($data["parent_id"]); ?></td>
	<td><span id="sort_<?php echo ($data["cat_id"]); ?>"><a><?php echo ($data["sort_order"]); ?></a></span></td>
	<td id="is_show_<?php echo ($data["cat_id"]); ?>"><?php if($data["is_show"] == 1): ?><a>是</a><?php else: ?> <a>否</a><?php endif; ?></td>
	<td><a href="__URL__/edit/cat_id/<?php echo ($data["cat_id"]); ?>">编辑</a> | <a href="javascript:del(<?php echo ($data["cat_id"]); ?>)">删除</a></td>
    <td><a href="__URL__/lang_index/cat_id/<?php echo ($data["cat_id"]); ?>">列表</a></td>
</tr><?php endif; ?><?php endforeach; endif; ?>
<tr bgcolor="#FAFAF1">
<td height="28" colspan="10">
	&nbsp;
    <!--
	<a href="javascript:selAll()" class="coolbg">全选</a>
	<a href="javascript:noSelAll()" class="coolbg">取消</a>
	<a href="javascript:delArc(0)" class="coolbg">&nbsp;删除&nbsp;</a>
    -->
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