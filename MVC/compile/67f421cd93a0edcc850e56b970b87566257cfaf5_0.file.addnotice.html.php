<?php
/* Smarty version 3.1.30, created on 2017-04-05 04:55:54
  from "C:\wamp\www\gongshang\template\admin\addnotice.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58e45cba1ace78_08190686',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '67f421cd93a0edcc850e56b970b87566257cfaf5' => 
    array (
      0 => 'C:\\wamp\\www\\gongshang\\template\\admin\\addnotice.html',
      1 => 1491360953,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58e45cba1ace78_08190686 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>添加公告</title>
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
<form action="index.php?m=admin&f=art&a=addnoticeInfo" method="post" id="form" >
    <div class="form-group">
        <label for="ntitle">公告名称：</label>
        <input type="text" name="ntitle" class="form-control" id="ntitle" autocomplete="off">
    </div>
    <div class="form-group">
        <label for="nname">发布人：</label>
        <input type="text" name="nname" id="nname" class="form-control" autocomplete="off">
    </div>
    <div class="form-group">
        <label for="nsummary">摘要：</label>
        <textarea name="nsummary" class="form-control" id="nsummary" cols="30" rows="4"></textarea>
    </div>
    <div class="form-group">
        <label for="editor_id">内容：</label>
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
    $("#form").validate({
        rules:{
            ntitle:{
                required:true
            },
            nsummary:{
                maxlength:255
            },
            nname:{
                maxlength:50
            }
        },
        messages:{
            ntitle:{
                required:"请输入标题"
            },
            nsummary:{
                maxlength:"最多输入255个字"
            },
            nname:{
                maxlength:"最多输入50个字"
            }
        }
    })
<?php echo '</script'; ?>
>
</html><?php }
}
