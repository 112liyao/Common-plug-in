<?php
/* Smarty version 3.1.30, created on 2017-04-05 04:39:30
  from "C:\wamp\www\gongshang\template\admin\addcourse.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58e458e271b5f0_38986955',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '00bfc0ead96773041cee50a911359b396e57fcc4' => 
    array (
      0 => 'C:\\wamp\\www\\gongshang\\template\\admin\\addcourse.html',
      1 => 1491359968,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58e458e271b5f0_38986955 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>添加课程</title>
</head>
<link rel="stylesheet" href="<?php echo CSS_PATH;?>
/bootstrap.min.css">
<?php echo '<script'; ?>
 charset="utf-8" src="<?php echo JS_PATH;?>
/kindeditor-4.1.7/kindeditor.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 charset="utf-8" src="<?php echo JS_PATH;?>
/kindeditor-4.1.7/lang/zh_CN.js"> <?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo JS_PATH;?>
/jquery-min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo JS_PATH;?>
/jquery.validate.js"><?php echo '</script'; ?>
>
<body>
<form action="index.php?m=admin&f=art&a=addcourseInfo" method="post" id="form" >
    <div class="form-group">
        <label for="title">课程名称：</label>
        <input type="text" name="title" class="form-control" id="title" autocomplete="off">
    </div>
    <div class="form-group">
        <label for="etitle">课程英文名称：</label>
        <input type="text" name="etitle" class="form-control" id="etitle" autocomplete="off">
    </div>
    <div class="form-group">
        <label for="name">发布人：</label>
        <input type="text" name="name" class="form-control" value="计算机信息工程学院" id="name" autocomplete="off">
    </div>
    <div class="form-group">
        <label for="label">课程分类（标签）：</label>
        <input type="text" name="label" class="form-control" id="label" autocomplete="off">
    </div>
    <div class="form-group">
        <label for="summary">课程摘要：</label>
        <textarea class="form-control" rows="4" name="summary" id="summary"></textarea>
    </div>
    <div class="form-group">
        <label for="editor_id">视频和内容：</label>
        <textarea id="editor_id" name="editor_id" style="width:100%;height:300px;">
        </textarea>
    </div>
    <button id="fat-btn" class="btn btn-primary" data-loading-text="Loading..."
            type="submit"> 提交
    </button>
</form>
</body>
<?php echo '<script'; ?>
>
    KindEditor.ready(function(K) {
        window.editor = K.create('#editor_id');
    });
    $.validator.addMethod("etitle",function(value,element,params){
        var etitle = /^[0-9a-zA-Z\s]*$/;
        return this.optional(element)||(etitle.test(value));
    },"请输入纯英文");
    $("#form").validate({
        rules:{
            title:{
                required:true
            },
            etitle:{
                etitle:true,
                maxlength:255
            },
            summary:{
                maxlength:255
            },
            name:{
                maxlength:50
            }
        },
        messages:{
            title:{
                required:"请输入标题"
            },
            etitle:{
                maxlength:"最多输入255个字符"
            },
            summary:{
                maxlength:"最多输入255个字"
            },
            name:{
                maxlength:"最多输入50个字"
            }
        }
    })
<?php echo '</script'; ?>
>
</html><?php }
}
