<?php
/* Smarty version 3.1.30, created on 2017-04-04 04:03:33
  from "C:\wamp\www\gongshang\template\admin\deluser.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58e2fef5e521e6_84937376',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7ee6d2eb0ba9e87a4abc0297ec2ce4cd1383391e' => 
    array (
      0 => 'C:\\wamp\\www\\gongshang\\template\\admin\\deluser.html',
      1 => 1491271405,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58e2fef5e521e6_84937376 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>Document</title>
	<link rel="stylesheet" href="<?php echo CSS_PATH;?>
/bootstrap.min.css" />
	<link rel="stylesheet" href="<?php echo ADMIN_PATH;?>
/css/deluser.css" />
	<?php echo '<script'; ?>
 src="<?php echo JS_PATH;?>
/jquery-min.js"><?php echo '</script'; ?>
>
	<style>
		table{
			width: 800px;
			margin: 0 auto;
			border-radius: 10px;
			overflow: hidden;
		}
		th{
			background: #3E95E8;
			height: 50px;
			font-size: 16px;
			color: #fff;
		}
		th,td{
			text-align: center;
		}
		.del{
			padding: 5px 10px;
			border-radius: 5px;
			background: #3E95E8;
			color: #fff;
		}
		td a:hover{
			text-decoration: none;
			color: #fff;
			box-shadow: 0 0 5px rgba(0,0,0,.5);
		}
	</style>
</head>
<body>
	<div class="zmr_box">
		<table class="table table-hover">
			<thead>
				<th>用户名</th>
				<th>昵称</th>
				<th>密码</th>
				<th>注册时间</th>
				<th>操作</th>
			</thead>
			<tbody>
			</tbody>
		</table>
	</div>
</body>
</html>
<?php echo '<script'; ?>
>
	
var all=<?php echo $_smarty_tpl->tpl_vars['result']->value;?>
;
var str="";
for(var i=0;i<all.length;i++){
	str+="<tr>";
		str+="<td>"+all[i]["uname"]+"</td>";
		str+="<td>"+all[i]["unickname"]+"</td>";
		str+="<td>"+all[i]["upass"]+"</td>";	
		str+="<td>"+all[i]["udate"]+"</td>";		
		str+="<td><a href='index.php?m=admin&&a=shanchuuser&&id="+all[i]["uid"]+"' class='del'>删除用户</a></td>";	
	str+="</tr>";
}
$("tbody").append(str);



<?php echo '</script'; ?>
><?php }
}
