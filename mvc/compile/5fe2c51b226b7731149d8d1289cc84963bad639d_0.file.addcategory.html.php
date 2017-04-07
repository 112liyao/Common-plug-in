<?php
/* Smarty version 3.1.30, created on 2017-04-04 09:26:37
  from "C:\wamp\www\gongshang\template\admin\addcategory.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58e34aad8938f9_51643210',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5fe2c51b226b7731149d8d1289cc84963bad639d' => 
    array (
      0 => 'C:\\wamp\\www\\gongshang\\template\\admin\\addcategory.html',
      1 => 1491290512,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58e34aad8938f9_51643210 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>添加分类</title>
	<link rel="stylesheet" href="<?php echo CSS_PATH;?>
/bootstrap.min.css" />
	<link rel="stylesheet" href="<?php echo ADMIN_PATH;?>
/css/addcategory.css" />
	<?php echo '<script'; ?>
 src="<?php echo JS_PATH;?>
/jquery-min.js"><?php echo '</script'; ?>
>
</head>
<body>
	<div class="zmr_box">
		<table class="table table-hover">
			<thead>
				<th>栏目</th>
				<th>分类</th>
				<th>操作</th>
			</thead>
			<tbody>
				<tr>
					<td>请添加一级标题</td>
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
var str="";
for(var i=0;i<all.length;i++){
	str+="<tr>";
		str+="<td>一级栏目</td>";	
		str+="<td>"+all[i]["cname"]+"</td>";	
		str+="<td value='"+all[i]["cid"]+"'><a href='index.php?m=admin&&a=delcategory&&cid="+all[i]["cid"]+"' class='del'>删除</a><a class='editcategory'>修改</a><a class='add'>添加</a></td>";
	str+="</tr>";
	for(var j=0;j<all.length;j++){
		if(all[i]["cid"]==all[j]["pid"]){
			str+="<tr>";
				str+="<td>二级栏目</td>";
				str+="<td>"+all[j]["cname"]+"</td>";
				str+="<td value='"+all[j]["cid"]+"'><a href='index.php?m=admin&&a=delcategory&&cid="+all[j]["cid"]+"' class='del'>删除</a><a class='editcategory'>修改</a><a class='add'>添加</a></td>";
			str+="</tr>";
			for(var z=0;z<all.length;z++){
				if(all[j]["cid"]==all[z]["pid"]){
					str+="<tr>";
						str+="<td>三级栏目</td>";
						str+="<td>"+all[z]["cname"]+"</td>";
						str+="<td value='"+all[z]["cid"]+"'><a href='index.php?m=admin&&a=delcategory&&cid="+all[z]["cid"]+"' class='del'>删除</a><a class='editcategory'>修改</a></td>";
					str+="</tr>";
					all.splice(z,1);
				}
			}
			all.splice(j,1);			
		}
	}
}
$("tbody").append(str);
	
//点击 添加 事件
var flag=1;
$("table").on("click",".add",function(){
	var pid=$(this).parent().attr("value");
	if(flag==1){
		flag=0;
		$("<tr><td colspan='3' class='adddiv'><input placeholder='请输入栏目名称' class='neirong' type='text' /><a class='tijiao'>提交</a><a class='quxiao'>取消</a></td></tr>").insertAfter($(this).parent().parent());
	}
	//提交
	$(".neirong").focus(function () {
		$(this).attr("placeholder","");
    })
	$("table").on("click",".tijiao",function(){
		var val=$(this).parent().find(".neirong").val();
		location.href="index.php?m=admin&&a=addcategoryinfo&&pid="+pid+"&&cname="+val+"";
	})
})
//点击 修改 事件
var flag=1;
$("table").on("click",".editcategory",function(){
    var cid=$(this).parent().attr("value");
    var cname=$(this).parent().prev().text();
	if(flag==1){
		flag=0;
		$("<tr><td colspan='3' class='adddiv'><input class='neirong' value='"+cname+"' type='text' /><a class='tijiao'>提交</a><a class='quxiao'>取消</a></td></tr>").insertAfter($(this).parent().parent());
	}
	//提交
	$("table").on("click",".tijiao",function(){
		var val=$(this).parent().find(".neirong").val();
		location.href="index.php?m=admin&&a=deitcategoryinfo&&cid="+cid+"&&cname="+val+"";
	})
})
//点击取消事件
$("table").on("click",".quxiao",function(){
	flag=1;
	$(this).parent().remove();
})
<?php echo '</script'; ?>
><?php }
}
