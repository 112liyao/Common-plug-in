<?php
/* Smarty version 3.1.30, created on 2017-04-05 13:58:18
  from "C:\wamp\www\gongshang\template\admin\addnews.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58e4dbda177422_27720965',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a0bba4677c653447d47ff11ecdbdef6bb73e8160' => 
    array (
      0 => 'C:\\wamp\\www\\gongshang\\template\\admin\\addnews.html',
      1 => 1491360953,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58e4dbda177422_27720965 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>添加内容</title>
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
<form action="index.php?m=admin&f=art&a=addnewsInfo" method="post" id="form" >
    <div class="form-group">
        <label for="title">内容标题：</label>
        <input type="text" name="title" class="form-control" id="title" autocomplete="off">
    </div>
    <div class="form-group">
        <label for="etitle">内容英文标题：</label>
        <input type="text" name="etitle" class="form-control" id="etitle" autocomplete="off">
    </div>
    <div class="form-group">
        <label for="cid">内容分类：</label>
        <select class="form-control" name="cid">
            <option value="0">请选择</option>
            <?php echo $_smarty_tpl->tpl_vars['tree']->value;?>

        </select>
    </div>
    <div class="form-group">
        <label for="name">发布人：</label>
        <input type="text" name="name" class="form-control" id="name" autocomplete="off">
    </div>
    <div class="form-group">
        <label for="summary">摘要：</label>
        <textarea name="summary" class="form-control" id="summary" cols="30" rows="4"></textarea>
    </div>
    <div class="form-group">
        <label for="editor_id">内容：</label>
        <br/>
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
