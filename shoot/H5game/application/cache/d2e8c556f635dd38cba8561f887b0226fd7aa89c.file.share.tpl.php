<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-01-05 19:30:11
         compiled from "/www/web/ten/public_html/views/activity/share.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1211667811567b8a6b68d2b2-98064844%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd2e8c556f635dd38cba8561f887b0226fd7aa89c' => 
    array (
      0 => '/www/web/ten/public_html/views/activity/share.tpl',
      1 => 1451993363,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1211667811567b8a6b68d2b2-98064844',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_567b8a6b6a5a34_44868661',
  'variables' => 
  array (
    'js_sdk' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_567b8a6b6a5a34_44868661')) {function content_567b8a6b6a5a34_44868661($_smarty_tpl) {?><?php echo '<script'; ?>
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
