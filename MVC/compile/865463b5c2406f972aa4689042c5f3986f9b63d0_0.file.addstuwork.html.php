<?php
/* Smarty version 3.1.30, created on 2017-04-04 09:10:48
  from "C:\wamp\www\gongshang\template\admin\addstuwork.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58e346f8ea15c2_38949564',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '865463b5c2406f972aa4689042c5f3986f9b63d0' => 
    array (
      0 => 'C:\\wamp\\www\\gongshang\\template\\admin\\addstuwork.html',
      1 => 1491211137,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58e346f8ea15c2_38949564 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>

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
<form action="index.php?m=admin&f=art&a=addstuworkInfo" method="post" id="form" >

    <div class="form-group">
        <label for="title">标题：</label>
        <input type="text" name="title" id="title" autocomplete="off">
    </div>
    <div class="form-group">
        <label for="etitle">英文标题：</label>
        <input type="text" name="etitle" id="etitle" autocomplete="off">
    </div>
    <div class="form-group">
        <label for="name">发布人（如果内容为空，默认为“山西工商学院”）：</label>
        <input type="text" name="name" id="name" autocomplete="off">
    </div>
    <div class="form-group">
        <label for="cid">分类：</label>
        <select name="cid" id="cid">
            <option value="0" selected>一级分类</option>
            <?php echo $_smarty_tpl->tpl_vars['tree']->value;?>

        </select>
    </div>
    <div class="form-group">
        <label for="summary">摘要(如果内容为空，默认为标题)：</label>
        <textarea name="summary" id="summary" cols="30" rows="10"></textarea>
    </div>
    <div class="form-group">
        <label for="editor_id">内容：</label>
        <br/>
        <textarea id="editor_id" name="editor_id" style="width:700px;height:300px;">
        </textarea>
    </div>
    <input type="submit" value="提交">
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
