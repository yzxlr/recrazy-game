<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>文档管理</title>
<link rel="stylesheet" type="text/css" href="__PUBLIC__/admin/css/base.css">
<script type="text/javascript" src="__PUBLIC__/js/prototype.js"></script>
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
</head>
<body leftmargin="8" topmargin="8" background='__PUBLIC__/admin/images/allbg.gif'>
<!--  内容列表   -->
<form name="form2" style="margin-bottom:0px;">
<table width="98%" border="0" cellpadding="2" cellspacing="1" bgcolor="#D1DDAA" align="center" style="margin-top:8px; margin-bottom:0px;">
<tr bgcolor="#E7E7E7">
	<td height="30" colspan="10" background="__PUBLIC__/admin/images/tbg.gif"><span style="float:left; padding-top:3px; padding-left:5px;">新闻分类列表</span><span style="float:right;"><input type='button' class="coolbg np" onClick="location='__APP__/category/add';" value='添加分类' /></span></td>
</tr>
<tr align="center" bgcolor="#FAFAF1" height="22">
	<th width="8%">ID</th>
	<th width="5%">选择</th>
	<th width="42%">分类名</th>
	<th width="14%">父类ID</th>
	<th width="13%">排序</th>
	<th width="8%">显示</th>
	<th width="10%">操作</th>
</tr>

<?php if(is_array($categoty)): foreach($categoty as $key=>$data): ?><?php if($data["cat_id"] != '' ): ?><tr align='center' bgcolor="#FFFFFF" onMouseMove="javascript:this.bgColor='#FCFDEE';" onMouseOut="javascript:this.bgColor='#FFFFFF';" height="22" >
	<td><?php echo ($data["cat_id"]); ?></td>
	<td><input name="id" type="checkbox" id="id" value="<?php echo ($data["cat_id"]); ?>" class="np"></td>
	<td align="left"><a href='__URL__/edit/cat_id/<?php echo ($data["cat_id"]); ?>'><u><?php echo ($data["cat_name"]); ?></u></a></td>
	<td><?php echo ($data["parent_id"]); ?></td>
	<td><span id="sort_<?php echo ($data["cat_id"]); ?>"><a href="javascript:;" onClick="change_sort('<?php echo ($data["cat_id"]); ?>','<?php echo ($data["sort_order"]); ?>')"><?php echo ($data["sort_order"]); ?></a></span></td>
	<td id="is_show_<?php echo ($data["cat_id"]); ?>"><?php if($data["is_show"] == 1): ?><a href="javascript:;" onClick="change_status('<?php echo ($data["cat_id"]); ?>','<?php echo ($data["is_show"]); ?>')">是</a><?php else: ?> <a href="javascript:;" onClick="change_status('<?php echo ($data["cat_id"]); ?>','<?php echo ($data["is_show"]); ?>')">否</a><?php endif; ?></td>
	<td><a href="__URL__/edit/cat_id/<?php echo ($data["cat_id"]); ?>">编辑</a> | <a href="__URL__/act_add/act/del_category/id/<?php echo ($data["cat_id"]); ?>">删除</a></td>
</tr><?php endif; ?><?php endforeach; endif; ?>
<tr bgcolor="#FAFAF1">
<td height="28" colspan="10">
	&nbsp;
	<a href="javascript:selAll()" class="coolbg">全选</a>
	<a href="javascript:noSelAll()" class="coolbg">取消</a>
	<a href="javascript:delArc(0)" class="coolbg">&nbsp;删除&nbsp;</a>
</td>
</tr>
</table>
</form>
</body>
</html>