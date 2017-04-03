<?php
/* Smarty version 3.1.30, created on 2017-04-02 19:48:20
  from "C:\wamp\www\gongshang\template\admin\index.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58e13964d71565_08567322',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '47ce97a207bd5cf5864ba0c21749d4267b7bf3db' => 
    array (
      0 => 'C:\\wamp\\www\\gongshang\\template\\admin\\index.html',
      1 => 1491155299,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58e13964d71565_08567322 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>计算机信息工程学院后台</title>
</head>
<style>
    @font-face {
        font-family: 'iconfont';
        src: url('<?php echo ADMIN_PATH;?>
/font/iconfont.eot');
        src: url('<?php echo ADMIN_PATH;?>
/font/iconfont.eot?#iefix') format('embedded-opentype'),
        url('<?php echo ADMIN_PATH;?>
/font/iconfont.woff') format('woff'),
        url('<?php echo ADMIN_PATH;?>
/font/iconfont.ttf') format('truetype'),
        url('<?php echo ADMIN_PATH;?>
/font/iconfont.svg#iconfont') format('svg');
    }
</style>
<link rel="stylesheet" href="<?php echo ADMIN_PATH;?>
/css/default.css">
<link rel="stylesheet" href="<?php echo ADMIN_PATH;?>
/css/index.css">
<?php echo '<script'; ?>
 src="<?php echo JS_PATH;?>
/jquery-min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo ADMIN_PATH;?>
/js/index.js"><?php echo '</script'; ?>
>
<body>
    <!--top-->
    <div class="topbox">
        <div class="top">
            <div class="topleft">
                <img src="<?php echo ADMIN_PATH;?>
/images/logo.png" alt="">
                <b>计算机信息工程学院管理系统</b>
            </div>
            <div class="topright">
                <span><i class="iconfont">&#xe6c5;</i>您好！admin,欢迎您登陆</span>
                <a href=""><i class="iconfont">&#xe63b;</i></a>
            </div>
        </div>
    </div>
    <!--top end-->
    <!--main-->
    <div class="mainbox">
        <div class="main">
            <div class="center">
                <ul class="fu">
                    <li>
                        <i class="iconfont">&#xe729;</i>
                        <a href="javascript:;"><i class="iconfont">&#xe62d;</i>admin</a>
                        <ul class="son">
                            <li><a href="" target="right"><i class="iconfont">&#xe724;</i>修改密码</a></li>
                            <li><a href="" target="right"><i class="iconfont">&#xe724;</i>所有管理员</a></li>
                        </ul>
                    </li>
                    <li>
                        <i class="iconfont">&#xe729;</i>
                        <a href="javascript:;"><i class="iconfont">&#xe69b;</i>用户管理</a>
                        <ul class="son">
                            <li><a href="" target="right"><i class="iconfont">&#xe724;</i>用户添加</a></li>
                            <li><a href="" target="right"><i class="iconfont">&#xe724;</i>用户删除</a></li>
                        </ul>
                    </li>
                    <li>
                        <i class="iconfont">&#xe729;</i>
                        <a href="javascript:;"><i class="iconfont">&#xe661;</i>分类管理</a>
                        <ul class="son">
                            <li><a href="" target="right"><i class="iconfont">&#xe724;</i>添加分类</a></li>
                            <li><a href="" target="right"><i class="iconfont">&#xe724;</i>管理分类</a></li>
                        </ul>
                    </li>
                    <li></li>
                    <li></li>
                </ul>
            </div>
        </div>
        <div class="show">
            <iframe src="" frameborder="0" name="right"></iframe>
        </div>
    </div>
    <!--main end-->
</body>
</html><?php }
}
