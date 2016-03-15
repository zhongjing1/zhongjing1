<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-12-24 12:04:24
         compiled from "/Users/Guest/web/yii/views/activity/share.tpl" */ ?>
<?php /*%%SmartyHeaderCode:489421370567b65907a0739-49158520%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ea7e2b5a63a379bfafdbffe41bf09549b8c2432d' => 
    array (
      0 => '/Users/Guest/web/yii/views/activity/share.tpl',
      1 => 1450929842,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '489421370567b65907a0739-49158520',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_567b65907cae77_30124477',
  'variables' => 
  array (
    'js_sdk' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_567b65907cae77_30124477')) {function content_567b65907cae77_30124477($_smarty_tpl) {?><?php echo '<script'; ?>
 language="JavaScript" src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 language="JavaScript">
	wx.config({
		debug: false, // 开启调试模式
		appId: '<?php echo $_smarty_tpl->tpl_vars['js_sdk']->value['appid'];?>
', // 必填，公众号的唯一标识
		timestamp: <?php echo $_smarty_tpl->tpl_vars['js_sdk']->value['timestamp'];?>
, // 必填，生成签名的时间戳
		nonceStr: '<?php echo $_smarty_tpl->tpl_vars['js_sdk']->value['noncestr'];?>
', // 必填，生成签名的随机串
		signature: '<?php echo $_smarty_tpl->tpl_vars['js_sdk']->value['signature'];?>
',// 必填，签名，见附录1
		jsApiList: [
            'onMenuShareTimeline',
            'onMenuShareAppMessage',
            'onMenuShareQQ',
            'onMenuShareWeibo',
            'startRecord',
            'stopRecord',
            'onVoiceRecordEnd',
            'playVoice',
            'pauseVoice',
            'stopVoice',
            'onVoicePlayEnd',
            'uploadVoice',
            'downloadVoice',
            'chooseImage',
            'previewImage',
            'uploadImage',
            'downloadImage',
            'translateVoice',
            'getNetworkType',
            'openLocation',
            'getLocation',
            'hideOptionMenu',
            'showOptionMenu',
            'hideMenuItems',
            'showMenuItems',
            'hideAllNonBaseMenuItem',
            'showAllNonBaseMenuItem',
            'closeWindow',
            'scanQRCode',
            'chooseWXPay',
            'openProductSpecificView',
            'addCard',
            'chooseCard',
            'openCard'
        ] // 必填，需要使用的JS接口列表，所有JS接口列表见附录2
	});
<?php echo '</script'; ?>
><?php }} ?>
