<script language="JavaScript" src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script language="JavaScript">
	wx.config({
		debug: false, // 开启调试模式
		appId: '<{$js_sdk.appid}>', // 必填，公众号的唯一标识
		timestamp: <{$js_sdk.timestamp}>, // 必填，生成签名的时间戳
		nonceStr: '<{$js_sdk.noncestr}>', // 必填，生成签名的随机串
		signature: '<{$js_sdk.signature}>',// 必填，签名，见附录1
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
</script>