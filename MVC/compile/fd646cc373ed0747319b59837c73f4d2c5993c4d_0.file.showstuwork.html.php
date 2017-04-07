<?php
/* Smarty version 3.1.30, created on 2017-04-04 09:10:38
  from "C:\wamp\www\gongshang\template\admin\showstuwork.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58e346ee30b778_28167980',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fd646cc373ed0747319b59837c73f4d2c5993c4d' => 
    array (
      0 => 'C:\\wamp\\www\\gongshang\\template\\admin\\showstuwork.html',
      1 => 1491225078,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58e346ee30b778_28167980 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
    <table>
        <tr>
            <th>新闻标题</th>
            <th>英文标题</th>
            <th>分类</th>
            <th>摘要</th>
            <th>发布时间</th>
            <th>发布人</th>
            <th>点击量</th>
            <th>操作</th>
        </tr>

        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['nocat_stuwork']->value, 'v');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
?>
        <tr>
            <td><?php echo $_smarty_tpl->tpl_vars['v']->value["title"];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['v']->value["etitle"];?>
</td>
            <td>无分类</td>
            <td><?php echo $_smarty_tpl->tpl_vars['v']->value["summary"];?>
</td>

            <td><?php echo $_smarty_tpl->tpl_vars['v']->value["time"];?>
</td>

            <td><?php echo $_smarty_tpl->tpl_vars['v']->value["name"];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['v']->value["hits"];?>
</td>

            <td><a href="index.php?m=admin&f=art&a=delstuwork&stid=<?php echo $_smarty_tpl->tpl_vars['v']->value['stid'];?>
">删除</a></td>
        </tr>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>


        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['stuwork']->value, 'v');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
?>
        <tr>
            <td><?php echo $_smarty_tpl->tpl_vars['v']->value["title"];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['v']->value["etitle"];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['v']->value["cname"];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['v']->value["summary"];?>
</td>

            <td><?php echo $_smarty_tpl->tpl_vars['v']->value["time"];?>
</td>

            <td><?php echo $_smarty_tpl->tpl_vars['v']->value["name"];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['v']->value["hits"];?>
</td>

            <td><a href="index.php?m=admin&f=art&a=delstuwork&stid=<?php echo $_smarty_tpl->tpl_vars['v']->value['stid'];?>
">删除</a></td>
        </tr>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>


        
    </table>
</body>
</html><?php }
}
