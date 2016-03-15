<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-01-07 18:18:57
         compiled from "/www/web/ten/public_html/views/activity/zhongjingHK/share/index.html" */ ?>
<?php /*%%SmartyHeaderCode:796270127568e220a2d7a87-50257996%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '16f1c166146c0383f9eb7d99e4601d6cb373e11e' => 
    array (
      0 => '/www/web/ten/public_html/views/activity/zhongjingHK/share/index.html',
      1 => 1452161876,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '796270127568e220a2d7a87-50257996',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_568e220a3cb9f1_67018612',
  'variables' => 
  array (
    'tmp_dir' => 0,
    'index_dir' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_568e220a3cb9f1_67018612')) {function content_568e220a3cb9f1_67018612($_smarty_tpl) {?><!DOCTYPE html>
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
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['tmp_dir']->value;?>
/css/swiper.min.css">
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['tmp_dir']->value;?>
/js/jquery-1.11.0.js" ><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['tmp_dir']->value;?>
/js/awardRotate.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['tmp_dir']->value;?>
/js/swiper.animate.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['tmp_dir']->value;?>
/js/swiper.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript">
$(function (){
	var rotateTimeOut = function (){
		$('#rotate').rotate({
			angle:0,
			animateTo:2160,
			duration:8000,
			callback:function (){
				alert('网络超时，请检查您的网络设置！');
			}
		});
	};
	var bRotate = false;
	var rotateFn = function (awards, angles, txt){
		bRotate = !bRotate;
		$('#rotate').stopRotate();
		$('#rotate').rotate({
			angle:0,
			animateTo:angles+18000,
			duration:60000,
			callback:function (){
				//alert(txt);//这里弹出显示几等奖
				//bRotate = !bRotate;
			}
		})
		setTimeout("$('.share').show()",2000);
	};

	$('.pointer').click(function (){

		if(bRotate)return;
		var item = '';
		$.ajax({
			type:"POST",
			url: "<?php echo site_url(((string)$_smarty_tpl->tpl_vars['index_dir']->value)."/ajax_prize");?>
",
			dataType:"json",
			success: function(data){
				if(data.status=='y'){
					var item = Number(data.info);
					switch (item) {
						case 1:
							//var angle = [26, 88, 137, 185, 235, 287, 337];
							rotateFn(0, -30, '一等奖');
							break;
						case 1000:
							//var angle = [88, 137, 185, 235, 287];
							rotateFn(1, 35, '很遗憾未中奖2');
							break;
						case 999:
							//var angle = [137, 185, 235, 287];
							rotateFn(2, 152, '很遗憾未中奖5');
							break;
						case 3:
							//var angle = [137, 185, 235, 287];
							rotateFn(3, 95, '三等奖');
							break;
						case 998:
							//var angle = [185, 235, 287];
							rotateFn(4, 155, '很遗憾未中奖3');
							break;
						case 2:
							//var angle = [235, 287];
							rotateFn(5, 210, '二等奖');
							break;
					}
				}else{
					alert(data.info);
				}
			}
		});
	});
});
<?php echo '</script'; ?>
>
<style>
	html,body{
		height:100%;
	}
	.swiper-container {
	  /*  width: 320px;
		height: 480px;*/
		width: 100%;
		height: 100%;
		background:#fff;
	}
	.swiper-pagination-bullet {
	width: 6px;
	height: 6px;
	background: #fff;
	opacity: .4;
	}
	.swiper-pagination-bullet-active {opacity: 1;}
	@-webkit-keyframes tipmove{0%{bottom:10px;opacity:0}50%{bottom:15px;opacity:1}100%{bottom:20px;opacity:0}}
	#array{
		position:absolute;z-index:999;-webkit-animation: tipmove 1.5s infinite ease-in-out;
	}
</style>
</head>
<body>
<div class="swiper-container">
    <div class="swiper-wrapper">
    	<!-------------slide1----------------->
        <section class="swiper-slide swiper-slide1">
			<div class="page1 bounce">
				
			</div>
        </section>
        <!-------------slide2----------------->
        <section class="swiper-slide swiper-slide2">
			
        </section>
        <!----------------slide3-------------->
        <section class="swiper-slide swiper-slide3">
	      	<div class="choujiang">
				<div class="turntable-bg">
			        <!--<div class="mask"><img src="images/award_01.png"/></div>-->
			        <div class="pointer"><img src="<?php echo $_smarty_tpl->tpl_vars['tmp_dir']->value;?>
/images/zl.png" alt="pointer" width="90%"/></div>
			        <div class="rotate" ><img id="rotate" src="<?php echo $_smarty_tpl->tpl_vars['tmp_dir']->value;?>
/images/zp.png" alt="turntable" width="100%"/></div>
			    </div>
			</div>
			<div class="ren">
				<img src="<?php echo $_smarty_tpl->tpl_vars['tmp_dir']->value;?>
/images/t02.png" width="35%">
			</div>
        </section>
    </div>
    <div class="share" style="display: none;">
    	<img src="<?php echo $_smarty_tpl->tpl_vars['tmp_dir']->value;?>
/images/share.png" width="70%">
    </div>
    <img src="<?php echo $_smarty_tpl->tpl_vars['tmp_dir']->value;?>
/images/web-swipe-tip.png" style="width:20px;height:15px; bottom:5%; left:150px;" id="array" class="resize">
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
<?php echo '<script'; ?>
>
	scaleW=window.innerWidth/320;
	scaleH=window.innerHeight/480;
	var resizes = document.querySelectorAll('.resize');
	for (var j=0; j<resizes.length; j++) {
		resizes[j].style.width=parseInt(resizes[j].style.width)*scaleW+'px';
		resizes[j].style.height=parseInt(resizes[j].style.height)*scaleH+'px';
		resizes[j].style.top=parseInt(resizes[j].style.top)*scaleH+'px';
		resizes[j].style.left=parseInt(resizes[j].style.left)*scaleW+'px';
	}
   var mySwiper = new Swiper ('.swiper-container', {
	   direction : 'vertical',
	   mousewheelControl : true,
	   onInit: function(swiper){
		   swiperAnimateCache(swiper);
		   swiperAnimate(swiper);
	   },
	   onSlideChangeEnd: function(swiper){
			swiperAnimate(swiper);
			if(mySwiper.isEnd){
				$("#array").hide();
			}
		}
   })
<?php echo '</script'; ?>
>
</body>
</html>
 


<?php }} ?>
