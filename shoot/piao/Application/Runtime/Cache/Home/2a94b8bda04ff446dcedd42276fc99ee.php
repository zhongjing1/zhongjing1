<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html><html><head>    <meta charset="utf-8">    <title>港漂保险</title>
    <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico" />    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0" />    <link rel="stylesheet" href="/piao/Public/css/style-mobile-index.css" media="only screen and (max-width:1920px)">    <script src="http://libs.baidu.com/jquery/1.9.0/jquery.js"></script></head><body><header><h1>香港第一家专为港漂人群服务的<br>专业保险经纪公司</h1></header><div class="content">    <div class="btn"><h2 class="btntxt"><a href="<?php echo U('Index/gpmm');?>">港漂妈妈保险</a></h2><h2 class="btntxt"><a href="<?php echo U('Index/hk_student');?>">港漂学生保险</a></h2></div>    <div class="text"><img src="/piao/Public/images/ad-text.png" width="467" height="197"></div>    <div class="footer">中精咨询</div></div><div class="footcontent"></div><div class="footerbg" style="z-index: -2">　</div><div class="footer" style="z-index: 2">中精咨询</div><style type='text/css'>
    #poptip { position: fixed; top:40%;left:50%;width:160px;margin-left:-80px;background:#000; opacity: 0.7;filter:alpha(opacity=0.7); color:#fff;z-index: 999;  border-radius:5px;-webkit-border-radius:5px;-moz-border-radius:5px; min-height: 30px; padding:15px; text-align: center; color:#fff;font-size:14px;line-height: 30px;}
</style>
<script language='javascript'>
    function tip(msg,autoClose){
        var div = $("#poptip");
      //  var content =$("#poptip_content");
        if(div.length<=0){
            div = $("<div id='poptip'>" + msg + "</div>").appendTo(document.body);
         //   content =$("<div id='poptip_content'>" + msg + "</div>").appendTo(document.body);
        }else{
           // content.html(msg);
           // content.show();
            div.html(msg);
            div.show();
        }
        console.log(autoClose);
        if(typeof(autoClose) == 'undefined') {
            setTimeout(function(){
              //  content.fadeOut(500);
                div.fadeOut(500);
            },1000);
        }
    }
    function tip_close(){
        $("#poptip").fadeOut(500);
       // $("#poptip_content").fadeOut(500);
    }
</script><script language="JavaScript">    function loading(){        tip("敬请期待！！！");    }</script></body></html>