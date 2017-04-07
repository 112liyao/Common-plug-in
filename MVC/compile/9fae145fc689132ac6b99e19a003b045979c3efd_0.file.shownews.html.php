<?php
/* Smarty version 3.1.30, created on 2017-04-05 18:20:18
  from "C:\wamp\www\gongshang\template\admin\shownews.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58e51942bb4b99_72003157',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9fae145fc689132ac6b99e19a003b045979c3efd' => 
    array (
      0 => 'C:\\wamp\\www\\gongshang\\template\\admin\\shownews.html',
      1 => 1491409209,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58e51942bb4b99_72003157 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>新闻管理</title>
</head>
<link rel="stylesheet" href="<?php echo CSS_PATH;?>
/bootstrap.min.css" />
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
    .btns{
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
    .pagesbox{
        height: 40px;
        line-height:40px;
        margin-top:20px;
        text-align:center;
        border-top:1px solid #3e95e9;
    }
    .pagesbox a{
        color:#333;
        text-decoration: none;
        padding:4px 10px;
        border-radius:3px;
        margin:0 2px;
    }
    .pagesbox a:hover,.pagesbox a.nowPage{
        background:#3e95e9;
        color:#fff;
    }
    .pagesbox a.startPage,.pagesbox a.endPage{
        border:1px solid transparent;
    }
    .pagesbox a.startPage:hover,.pagesbox a.endPage:hover{
        text-decoration: none;
        background:#fff;
        color:#3e95e9;
        border:1px solid #3e95e9;
    }
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
<form action="index.php?m=admin&f=art&a=searchnews" method="post">
    <div class="sousuo">
        <input type="text" name="search" id="search">
        <button id="sousuo" type="submit">搜索</button>
    </div>
    <!--指定日期搜索（日期格式：xxxx-xx-xx 或者 xxxx/xx/xx）<br/>-->
    <!--指定起始日期：<input type="text" name="startdate"><br/>-->
    <!--指定结束日期：<input type="text" name="enddate"><br/>-->
</form>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>内容标题</th>
                <th>分类</th>
                <th>摘要</th>
                <th>发布时间</th>
                <th>发布人</th>
                <th>点击量</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['news']->value, 'v');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
?>
        <tr>
            <td><?php echo $_smarty_tpl->tpl_vars['v']->value["title"];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['v']->value["cname"];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['v']->value["summary"];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['v']->value["ntime"];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['v']->value["name"];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['v']->value["hits"];?>
</td>
            <td>
                <a class="btns" href="index.php?m=admin&f=art&a=editnews&nid=<?php echo $_smarty_tpl->tpl_vars['v']->value['nid'];?>
">修改</a>
                <a class="btns" href="index.php?m=admin&f=art&a=delnews&nid=<?php echo $_smarty_tpl->tpl_vars['v']->value['nid'];?>
">删除</a>
            </td>
        </tr>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

        </tbody>
    </table>
<div class="pagesbox">
    <?php echo $_smarty_tpl->tpl_vars['pages']->value;?>

</div>
</body>
</html><?php }
}
