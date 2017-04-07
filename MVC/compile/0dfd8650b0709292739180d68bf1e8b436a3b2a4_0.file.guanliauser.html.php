<?php
/* Smarty version 3.1.30, created on 2017-04-05 17:04:42
  from "C:\wamp\www\gongshang\template\admin\guanliauser.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58e5078a94a704_54850506',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0dfd8650b0709292739180d68bf1e8b436a3b2a4' => 
    array (
      0 => 'C:\\wamp\\www\\gongshang\\template\\admin\\guanliauser.html',
      1 => 1491404681,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58e5078a94a704_54850506 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>所有管理员</title>
	<link rel="stylesheet" href="<?php echo CSS_PATH;?>
/bootstrap.min.css" />
	<link rel="stylesheet" href="<?php echo CSS_PATH;?>
/../admin/css/addcategory.css" />
	<?php echo '<script'; ?>
 src="<?php echo JS_PATH;?>
/jquery-min.js"><?php echo '</script'; ?>
>
</head>
<body>
	<div class="zmr_box">
		<table class="table table-striped">
			<thead>
				<th>管理员账号</th>
				<th>管理员密码</th>
				<th>操作</th>
			</thead>
			<tbody>
			<tr>
				<td>添加新的管理员</td>
				<td></td>
				<td value="0"><a class='add'>添加</a></td>
			</tr>
			</tbody>
		</table>
	</div>	
</body>
</html>
<?php echo '<script'; ?>
>
//读取数据，放入页面
var all=<?php echo $_smarty_tpl->tpl_vars['result']->value;?>
;
var jiance=<?php echo $_smarty_tpl->tpl_vars['jiance']->value;?>
;
var str="";
all.shift();
for(var i=0;i<all.length;i++){
	str+="<tr>";
		str+="<td>"+all[i]["aname"]+"</td>";	
		str+="<td>"+all[i]["apass"]+"</td>";	
		str+="<td value='"+all[i]["aid"]+"'><a href='index.php?m=admin&&a=delauser&&aid="+all[i]["aid"]+"' class='del delauser'>删除(不可恢复)</a></td>";	
	str+="</tr>";
}
$("tbody").append(str);
	
//点击 添加 事件
var flag=1;
$("table").on("click",".add",function(){
	if(flag==1){
		flag=0;
		$("<tr><td class='neirong01'>账号：<input type='text' id='aname' /></td><td class='neirong01'>密码：<input type='password' id='apass' /></td><td><a class='tijiao'>提交</a><a class='quxiao'>取消</a></td></tr>").insertAfter($(this).parent().parent())
	}
	//提交
	$("table").on("click",".tijiao",function(){
		var val1=$("#aname").val();
		var val2=$("#apass").val();
		if(jiance.test(val1)&&jiance.test(val2)){
			location.href="index.php?m=admin&&a=addauser&&aname="+val1+"&&apass="+val2;			
		}else{
			alert("请输入以字母开头6到10位账号/密码")
		}
	})
})


//点击取消事件
$("table").on("click",".quxiao",function(){
	flag=1
	$(this).parent().remove()
})

	
	
<?php echo '</script'; ?>
><?php }
}
