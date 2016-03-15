<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-01-05 19:31:09
         compiled from "/www/web/ten/public_html/views/activity/aoziweituan/chicheng/details.html" */ ?>
<?php /*%%SmartyHeaderCode:1348937225568b9806e3ae64-50633022%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '38a662a3bbf5892eaea264dfb665ce4c3382a6e9' => 
    array (
      0 => '/www/web/ten/public_html/views/activity/aoziweituan/chicheng/details.html',
      1 => 1451993364,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1348937225568b9806e3ae64-50633022',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_568b9806ea4497_56871083',
  'variables' => 
  array (
    'tmp_dir' => 0,
    'details_data' => 0,
    'index_dir' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_568b9806ea4497_56871083')) {function content_568b9806ea4497_56871083($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>炽橙</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=no" > 
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['tmp_dir']->value;?>
/js/jquery-2.1.1.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['tmp_dir']->value;?>
/js/iscroll.js"><?php echo '</script'; ?>
>
<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['tmp_dir']->value;?>
/css/public.css" />
</head>
<?php echo '<script'; ?>
>
	$(function(){
		var doc_H=window.innerHeight;	
			$('.wrap').height(doc_H);	
	});

	var myScroll;
    function loaded() {
        myScroll = new IScroll('.wrap',{click: true });
    }
<?php echo '</script'; ?>
>
<body onload="loaded()">
<div class="wrap" style="background:#bdbdbd;padding-bottom:30px;">
	<div id="scroller">
		<img src="<?php echo $_smarty_tpl->tpl_vars['tmp_dir']->value;?>
/images/logo.jpg" class="logo">
		<img src="<?php echo $_smarty_tpl->tpl_vars['tmp_dir']->value;?>
/images/detailbanner.png" class="bannerbox">
		<div class="detailwrap">
			<div class="detailscon">
				<img src="<?php echo $_smarty_tpl->tpl_vars['tmp_dir']->value;?>
/images/label.png" class="label">
				<?php echo $_smarty_tpl->tpl_vars['details_data']->value['desc'];?>

				
			</div>
			<a href="<?php echo site_url(((string)$_smarty_tpl->tpl_vars['index_dir']->value)."/student");?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['tmp_dir']->value;?>
/images/detailnext.png" class="nextbtn" width="240" height="120"></a>
		</div>
	</div>
</div>
</body>
</html><?php }} ?>
