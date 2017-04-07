<?php
/* Smarty version 3.1.30, created on 2017-04-05 17:02:47
  from "C:\wamp\www\gongshang\template\admin\pinglunguanli.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58e5071731c650_50754530',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '920b783d865be29526b7dac4e83df56f315ec578' => 
    array (
      0 => 'C:\\wamp\\www\\gongshang\\template\\admin\\pinglunguanli.html',
      1 => 1491404526,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58e5071731c650_50754530 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>Document</title>
	<link rel="stylesheet" href="<?php echo CSS_PATH;?>
/bootstrap.min.css" />
	<link rel="stylesheet" href="<?php echo CSS_PATH;?>
/../admin/css/addcategory.css" />
	<?php echo '<script'; ?>
 src="<?php echo JS_PATH;?>
/jquery-min.js"><?php echo '</script'; ?>
>
</head>
<style>
	.sousuo{
		height: 40px;
		width: 380px;
		border:2px solid #3e95e9;
		overflow: hidden;
		border-radius: 20px;
		margin-bottom: 20px;
		position: relative;
	}
	#search{
		border: 0;width: 300px;
		height: 40px;
		box-sizing: border-box;
		padding: 0 20px;
		position: absolute;
		top:-2px;
		left: -2px;
	}
	#sousuo{
		background: #3e95e9;
		width: 80px;
		height: 40px;
		border: 0;
		position: absolute;
		right: 0;
		color: #fff;
		font-size: 16px;
		top: -2px;
		margin: 0;
	}
</style>
<body>
	<div class="zmr_box">
		<form action="index.php?m=admin&&a=pinglunsousuo" method="post">
			<div class="sousuo">
				<input type="text" name="search" id="search">
				<button id="sousuo" type="submit">搜索</button>
			</div>
		</form>
		<table class="table table-striped">
			<thead>
				<th>留言内容</th>
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
var all1=<?php echo $_smarty_tpl->tpl_vars['result1']->value;?>
;
var all2=<?php echo $_smarty_tpl->tpl_vars['result2']->value;?>
;
var str="";
for(var i=0;i<all1.length;i++){
	str+="<tr>";
		str+="<td>"+all1[i]["mcon"]+"</td>";		
		str+="<td><a href='index.php?m=admin&&a=delpinglun&&biao=1&&mid="+all1[i]["mid"]+"' class='del'>删除评论</a></td>";	
	str+="</tr>";
}
for(var i=0;i<all2.length;i++){
	str+="<tr>";
		str+="<td>"+all2[i]["mcon"]+"</td>";		
		str+="<td><a href='index.php?m=admin&&a=delpinglun&&biao=2&&mid="+all2[i]["mid"]+"' class='del'>删除评论</a></td>";	
	str+="</tr>";
}
$("tbody").append(str);
<?php echo '</script'; ?>
><?php }
}
