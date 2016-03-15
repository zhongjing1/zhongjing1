<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
  		<meta charset="utf-8">
  		<meta http-equiv="X-UA-Compatible" content="IE=edge">
  		<meta name="viewport" content="width=device-width, initial-scale=1">
 		 <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
 		 <title>中精香港</title>
 		 <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico" />
		  <!-- Bootstrap -->
 		 <link href="http://cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
 		 <link href="indexStyle.css" rel="stylesheet">
 		 <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
 		 <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		  <!--[if lt IE 9]>
			<script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="http://cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="http://cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<script src="feScript.js"></script>
 		 <![endif]-->
	</head>
	<body>
		<div class="top">
			<div class="inner container">
				<div class="logo pull-left"></div>
				<div class="contact hidden-xs pull-right">
					<div class="title">預約熱線：</div>
					<div class="address">+852 5386-3302</div>
				</div>
				<div class="contact hidden-xs pull-right">
					<div class="title">微信服務號：</div>
					<div class="address">zhongjingHK</div>
				</div>
			</div>
		</div>
		<div class="title">
			<h1>精选香港最優質的<br class="visible-xs">保險產品</h1>
			<h2>國際知名保險公司擔保</h2>
		</div>
		<div class="page page1">
			<div class="inner container">
				<h3><span class="ico"></span>大優勢齐聚香港保险</h3>
				<div class="row">
					<div class="box1 col-md-4 col-xs-6">
						<div class="ico"></div>
						<div class="title">费率更低</div>
						<div class="des">同類型的保險，香港具有更低的費率</div>
					</div>
					<div class="box2 col-md-4 col-xs-6">
						<div class="ico"></div>
						<div class="title">保障更全</div>
						<div class="des">香港保險的種類、範圍、週期都更多</div>
					</div>
					<div class="box3 col-md-4 col-xs-6">
						<div class="ico"></div>
						<div class="title">保额更高</div>
						<div class="des">香港保險的保額可以從5萬美金到 3500萬美金</div>
					</div>
					<div class="box4 col-md-4 col-xs-6">
						<div class="ico"></div>
						<div class="title">投資回報高</div>
						<div class="des">香港保險的投資專案都為全球性的運營,可以分散風險，為客戶獲取最大回報</div>
					</div>
					<div class="box5 col-md-4 col-xs-6">
						<div class="ico"></div>
						<div class="title">離岸資產保護</div>
						<div class="des">香港保險專案均為離岸資產，並且有高度的資產保密</div>
					</div>
					<div class="box6 col-md-4 col-xs-6">
						<div class="ico"></div>
						<div class="title">監管更完善</div>
						<div class="des">香港保險經營的歷史超過了100年，已經有非常完善嚴謹的市場監管規範</div>
					</div>
				</div>
			</div>
		</div>
		<div class="page page2">
			<div class="container">
				<h3 class="input ">為您估算保障計劃/需求</h3>
				<h3 class="compute ">计算结果</h3>
				<form class="input pc">
					我是一位<input type="tel" class="age" onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')">歲的
					<div class="select select-sex">
						<div class="select-inner"></div>
						<span class="line"></span>
						<span class="ico"></span>
						<ul>
							<li>男士</li>
							<li>女士</li>
						</ul>
					</div>
					<div class="select select-marital">
						<div class="select-inner"></div>
						<span class="line"></span>
						<span class="ico"></span>
						<ul>
							<li>未婚</li>
							<li>已婚</li>
						</ul>
					</div>
					我的家庭年收入大約是HK$<input type="tel" onkeyup="if(isNaN(value))execCommand('undo')" onafterpaste="if(isNaN(value))execCommand('undo')">
					<br>
					我的流動資產大約HK$<input type="tel" onkeyup="if(isNaN(value))execCommand('undo')" onafterpaste="if(isNaN(value))execCommand('undo')"> 我有<input type="tel" onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')">個孩子

					<div class="button">創建我的保障配置計劃</div>
				</form>

				<div class="compute pc">
					<dl class="left">
						<dt class="title">您大概需要</dt>
						<dd>HK$<span class="num">999</span>人壽/儲蓄保障；</dd>
						<dd>HK$<span class="num">999</span>重疾保障；</dd>
						<dd>HK$<span class="num">999</span>醫療保障。</dd>
					</dl>
					<dl class="right">
						<dt class="title">配置比例</dt>
						<dd><span class="ico ico1"></span><span class="num">99%</span>人壽/儲蓄保障；</dd>
						<dd><span class="ico ico2"></span><span class="num">99%</span>重疾保障；</dd>
						<dd><span class="ico ico3"></span><span class="num">99%</span>醫療保障。</dd>
						<canvas id="computeChart" width="140px" height="140px"></canvas>
					</dl>
					<div class="clearfix"></div>
					<div class="button">
						重新計算
					</div>
				</div>

				<form class="input mobile">
					<div>
						我的年齡<br>
						<input type="tel" onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')">
					</div>

					<div class="select-sex clearfix">
						我是位<br>
						<div class="box male check">
							<div class="ico"></div>
							先生
						</div>
						<div class="box female">
							<div class="ico"></div>
							女士
						</div>
					</div>

					<div class="select-marital clearfix">
						婚姻狀況<br>
						<div class="box married check">已婚</div>
						<div class="box unmarried">未婚</div>
					</div>

					<div>
						我的家庭年收入大約是<br>
						<div class="input-box clearfix"><span class="text">HK$</span><input type="tel" onkeyup="if(isNaN(value))execCommand('undo')" onafterpaste="if(isNaN(value))execCommand('undo')"></div>
					</div>
					<div>
						我的流動資產大約<br>
						<div class="input-box clearfix"><span class="text">HK$</span><input type="tel" onkeyup="if(isNaN(value))execCommand('undo')" onafterpaste="if(isNaN(value))execCommand('undo')"></div>
					</div>
					<div class="last">
						有幾個孩子<br>
						<input type="tel" onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')">
					</div>
					<div class="button">創建我的保障配置計劃</div>
				</form>

				<div class="compute mobile">
					<dl class="compute-top">
						<dt class="title">您大概需要</dt>
						<dd>HK$<span class="num">999</span>人壽/儲蓄保障；</dd>
						<dd>HK$<span class="num">999</span>重疾保障；</dd>
						<dd>HK$<span class="num">999</span>醫療保障。</dd>
					</dl>
					<dl class="compute-bottom">
						<div><canvas id="computeChartMobile" width="176px" height="176px"></canvas></div>
						<dd><span class="ico ico1"></span><span class="num">99%</span>人壽/儲蓄保障；</dd>
						<dd><span class="ico ico2"></span><span class="num">99%</span>重疾保障；</dd>
						<dd><span class="ico ico3"></span><span class="num">99%</span>醫療保障。</dd>
					</dl>
					<div class="button">
						重新計算
					</div>
				</div>


			</div>
		</div>
		<div class="page page3">
			<div class="container">
				<h3>首席保險經紀人推荐产品</h3>
				<div class="box box1" onclick='window.open("http://jiajiabaoxian.com/piao/index.php/Home/Index/child.html")'>
					<div class="title">No.1  保誠雋升儲蓄保險</div>
					<div class="inner">
						<div class="text">
							<div class="inner-title">資產傳承的最優選擇</div>
							<ul>
								<li><span class="ico"></span>雙重潛在紅利，長期持有回報高</li>
								<li><span class="ico"></span>可靈活領取資金，變現快</li>
								<li><span class="ico"></span>無遺產稅</li>
								<li><span class="ico"></span>司法豁免</li>
							</ul>
						</div>
						<div class="logo"></div>
						<div class="img"></div>
						<div class="clearfix"></div>
					</div>
					<div class="inner-bottom"></div>
				</div>
				<div class="box box2">
					<div class="title">No.2 Bupa環球精英醫療保險</div>
					<div class="inner">
						<div class="text">
							<div class="inner-title">醫療保險的最優選擇</div>
							<ul>
								<li><span class="ico"></span>雙重潛在紅利，長期持有回報高</li>
								<li><span class="ico"></span>可靈活領取資金，變現快</li>
								<li><span class="ico"></span>無遺產稅</li>
								<li><span class="ico"></span>司法豁免</li>
							</ul>
						</div>
						<div class="logo"></div>
						<div class="img"></div>
						<div class="clearfix"></div>
					</div>
					<div class="inner-bottom"></div>
				</div>
				<div class="box box3">
					<div class="title">No.3  保誠危急终身保險</div>
					<div class="inner">
						<div class="text">
							<div class="inner-title">高性價比重大疾病保險</div>
							<ul>
								<li><span class="ico"></span>雙重潛在紅利，長期持有回報高</li>
								<li><span class="ico"></span>可靈活領取資金，變現快</li>
								<li><span class="ico"></span>無遺產稅</li>
								<li><span class="ico"></span>司法豁免</li>
							</ul>
						</div>
						<div class="logo"></div>
						<div class="img"></div>
						<div class="clearfix"></div>
					</div>
					<div class="inner-bottom"></div>
				</div>
				<div class="box box4" onclick='window.open("http://jiajiabaoxian.com/piao/index.php/Home/Index")'>
					<div class="title">No.4 港漂險</div>
					<div class="inner">
						<div class="text">
							<div class="inner-title">資產傳承的最優選擇</div>
							<ul>
								<li><span class="ico"></span>雙重潛在紅利，長期持有回報高</li>
								<li><span class="ico"></span>可靈活領取資金，變現快</li>
								<li><span class="ico"></span>無遺產稅</li>
								<li><span class="ico"></span>司法豁免</li>
							</ul>
						</div>
						<div class="logo"></div>
						<div class="img"></div>
						<div class="clearfix"></div>
					</div>
					<div class="inner-bottom"></div>
				</div>
			</div>
		</div>
		<div class="page page4">
			<div class="container">
				<h3>投保流程與使用者評價</h3>
				<div class="inner row">
					<div class="col-md-2 col-sm-2 col-md-offset-1 col-sm-offset-1">
						<div class="title">電話／線上預約</div>
						<div class="des">通過熱線電話或微信服務號進行預約</div>
					</div>
					<div class="col-md-1 col-sm-1">
						<div class="inner-ico"></div>
					</div>
					<div class="col-md-2 col-sm-2">
						<div class="title">經紀人回訪</div>
						<div class="des">一對一貼心服務</div>
					</div>
					<div class="col-md-1 col-sm-1">
						<div class="inner-ico"></div>
					</div>
					<div class="col-md-2 col-sm-2">
						<div class="title">在港簽約</div>
						<div class="des">通過熱線電話或微信服務號進行預約</div>
					</div>
					<div class="col-md-1 col-sm-1">
						<div class="inner-ico"></div>
					</div>
					<div class="col-md-2 col-sm-2">
						<div class="title">獲取保單</div>
						<div class="des">快遞寄送回家</div>
					</div>
				</div>
				<div class="text">
					<div class="box1">
						<div class="comment">“One to One 的專員服務真的非常方便，去香港簽單還可以順便旅遊一下。”</div>
						<div class="author"><span>From</span>王女士<br class="visible-xs">   Bupa環球精英醫療保險受益者</div>
					</div>
					<div class="ico"></div>
					<div class="box2">
						<div class="comment">“中精理財的經紀人非常專業，為我和家人制定了很全面的保險投資計畫，值得推薦！”</div>
						<div class="author"><span>From</span>周先生<br class="visible-xs">   Bupa環球精英醫療保險受益者</div>
					</div>
				</div>
				<div class="call row">
					<div class="phone col-md-6 col-sm-6">
						<div class="title">
							<span class="ico"></span>电话預約
						</div>
						<div class="num">+852 5386-3302</div>
					</div>
					<div class="wechat col-md-6 col-sm-6">
						<div class="title">
							<span class="ico"></span><span class="hidden-xs">掃碼使用</span>微信預約
						</div>
						<div class="num visible-xs">ZhongjingHK</div>
						<div class="img"></div>
					</div>
				</div>
			</div>
		</div>
		<div class="page page5">
			<div class="container">
				<div class="row">
					<div class="col-md-3">
						<div class="logo"></div>
					</div>
					<div class="right col-md-8 pull-right">
						<div class="text">我们将竭诚为您提供最优的保险投资服务。</div>
						<div class="message">@2015 copyright reserved<br class="visible-xs"> by<span class="bot-name">中精香港</span></div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>