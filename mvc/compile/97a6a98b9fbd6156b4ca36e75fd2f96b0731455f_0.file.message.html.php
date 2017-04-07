<?php
/* Smarty version 3.1.30, created on 2017-04-04 11:31:58
  from "C:\wamp\www\gongshang\template\admin\message.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58e3680e595389_81476889',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '97a6a98b9fbd6156b4ca36e75fd2f96b0731455f' => 
    array (
      0 => 'C:\\wamp\\www\\gongshang\\template\\admin\\message.html',
      1 => 1491290511,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58e3680e595389_81476889 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>提示信息</title>
		<?php echo '<script'; ?>
 src="<?php echo JS_PATH;?>
/jquery-min.js"><?php echo '</script'; ?>
>
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
			.iconfont{
				font-family:"iconfont" !important;
				font-size:16px;font-style:normal;
				-webkit-font-smoothing: antialiased;
				-webkit-text-stroke-width: 0.2px;
				-moz-osx-font-smoothing: grayscale;
			}
			.box{
				width: 350px;height: 300px;
				position: fixed;
				top: 0;bottom: 0;left: 0;right: 0;
				margin:auto;
				text-align: center;
				background: #fff;
				border-radius:10px;
				overflow: hidden;
				box-shadow:3px 3px 10px rgba(0,0,0,.3);
			}
			.tishi{
				width:100%;
				height: 50px;
				background: #1f7ed0;
			}
			.icon{
				margin-top: 20px;
			}
			.icon>.iconfont{
				font-size: 60px;
				color: #22AE09;
			}
			.chenggong{
				font-size: 22px;
				margin-top: 10px;
			}
			p{
				color: #333;
			}
			span{
				font-size: 22px;
				color: #22AE09;
				padding: 0 5px;
			}
			a{
				padding: 8px 20px;
				text-align: center;
				line-height: 40px;
				background:  #1f7ed0;
				text-decoration: none;
				color: #fff;
				border-radius: 5px;
			}
		</style>
		<?php echo '<script'; ?>
>
            $(function(){
                var num=3;
                $("span").text(num);
                var t=setInterval(function(){
                    num--;
                    $("span").text(num);
                    if(num==0){
                        clearInterval(t);
                        var aa=$("a").attr("href");
                        location.href=aa;
                    }
                },1000)
            })
		<?php echo '</script'; ?>
>
	</head>
	<body>
		<div class="box">
			<div class="tishi"></div>
			<div class="icon"><i class="iconfont">&#xe629;</i></div>
			<div class="chenggong"><?php echo $_smarty_tpl->tpl_vars['message']->value;?>
</div>
			<p><span>5</span>秒后返回！</p>
			<a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
">知道了</a>
		</div>
	</body>
</html>
<?php }
}
