<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-01-07 18:19:21
         compiled from "/www/web/ten/public_html/views/activity/zhongjingHK/share/no_prize.html" */ ?>
<?php /*%%SmartyHeaderCode:1397631891568e240c554298-51862482%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ef3a1040413de20395a7c8d204ad94527c2b3eeb' => 
    array (
      0 => '/www/web/ten/public_html/views/activity/zhongjingHK/share/no_prize.html',
      1 => 1452161888,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1397631891568e240c554298-51862482',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_568e240c5b5015_01572331',
  'variables' => 
  array (
    'tmp_dir' => 0,
    'index_dir' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_568e240c5b5015_01572331')) {function content_568e240c5b5015_01572331($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=no" name="viewport">
<meta content="yes" name="apple-mobile-web-app-capable">
<meta content="black" name="apple-mobile-web-app-status-bar-style">
<meta content="telephone=no" name="format-detection">
<meta content="email=no" name="format-detection">
<title>中精新年抽奖活动</title>
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['tmp_dir']->value;?>
/css/style.css" type="text/css">
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['tmp_dir']->value;?>
/js/jquery-1.11.0.js" ><?php echo '</script'; ?>
>
</head>
<body class="bgimg">
	<div class="no_prize">
		<img src="<?php echo $_smarty_tpl->tpl_vars['tmp_dir']->value;?>
/images/no_p.png" width="70%">
	</div>
	<div class="g_sc">
		<a href="http://www.chinaelite.hk/piao/">
			<img src="<?php echo $_smarty_tpl->tpl_vars['tmp_dir']->value;?>
/images/btn2.png" width="40%">
		</a>
	</div>
	<div class="img01">
		<img src="<?php echo $_smarty_tpl->tpl_vars['tmp_dir']->value;?>
/images/t03.png" width="65%">
	</div>
	<?php echo $_smarty_tpl->getSubTemplate ("activity/share.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo '<script'; ?>
 language="JavaScript">
	wx.ready(function(){
		//wx.hideOptionMenu();
		wx.hideMenuItems({
			menuList: ['menuItem:exposeArticle','menuItem:setFont','menuItem:dayMode','menuItem:nightMode','menuItem:share:appMessage','menuItem:share:timeline','menuItem:share:qq','menuItem:share:weiboApp','menuItem:share:facebook','menuItem:share:QZone','menuItem:editTag','menuItem:delete','menuItem:copyUrl','menuItem:originPage','menuItem:readMode','menuItem:openWithQQBrowser','menuItem:openWithSafari','menuItem:share:email','menuItem:share:brand'] //要隐藏的菜单项，所有menu项见附录3//刷新开启menuItem:refresh//查看公众号开启menuItem:profile//收藏开启menuItem:favorite
		});
		//wx.showOptionMenu();
		wx.showMenuItems({
			menuList: ['menuItem:share:timeline','menuItem:share:appMessage'] // 要显示的菜单项，所有menu项见附录3
		});
		var share_title = '港漂福利来啦！准备装奖品';
		var share_desc = '港漂险照顾方方面面，还有更多优惠哦';

		//分享给朋友
		wx.onMenuShareAppMessage({
			title: share_title,
			desc: share_desc,
			link: '<?php echo site_url(((string)$_smarty_tpl->tpl_vars['index_dir']->value));?>
',
			imgUrl: '<?php echo $_smarty_tpl->tpl_vars['tmp_dir']->value;?>
/images/share.jpg',
			success: function (res) {
				window.location.href='<?php echo site_url(((string)$_smarty_tpl->tpl_vars['index_dir']->value)."/prize");?>
';
			},
			cancel: function (res) {
				alert('已取消');
			}
		});
		//分享到朋友圈
		wx.onMenuShareTimeline({
			title: share_title,
			desc: share_desc,
			link: '<?php echo site_url(((string)$_smarty_tpl->tpl_vars['index_dir']->value));?>
',
			imgUrl: '<?php echo $_smarty_tpl->tpl_vars['tmp_dir']->value;?>
/images/share.jpg',
			success: function (res) {
				window.location.href='<?php echo site_url(((string)$_smarty_tpl->tpl_vars['index_dir']->value)."/prize");?>
';
			},
			cancel: function (res) {
				alert('已取消');
			}
		});
	});
<?php echo '</script'; ?>
>
</body>
</html>
 


<?php }} ?>
