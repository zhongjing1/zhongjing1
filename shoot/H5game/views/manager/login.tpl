<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><{config_item('manager_title')}></title>
    <{load_css('admin')}>
    <{load_js('jquery')}>
    <{load_js('validform')}>
    <{load_js('layer/layer')}>
    <style type="text/css">
        *{
            padding:0px;
            margin:0px;
        }
        body{
            font-family:Arial, Helvetica, sans-serif;
            background:url(<{base_url()}>/public/images/grass.jpg);
            font-size:13px;
        }
        img{
            border:0;
        }
        .lg{width:468px; height:468px; margin:100px auto; background:url(<{base_url()}>/public/images/login_bg.png) no-repeat;}
        .lg_top{ height:200px; width:468px;}
        .lg_main{width:400px; height:180px; margin:0 25px;}
        .lg_m_1{
            width:290px;
            height:100px;
            padding:60px 55px 20px 55px;
        }
        .ur{
            height:37px;
            border:0;
            color:#666;
            width:236px;
            margin:4px 28px;
            background:url(<{base_url()}>/public/images/user.png) no-repeat;
            padding-left:10px;
            font-size:16pt;
            font-family:Arial, Helvetica, sans-serif;
        }
        .pw{
            height:37px;
            border:0;
            color:#666;
            width:236px;
            margin:4px 28px;
            background:url(<{base_url()}>/public/images/password.png) no-repeat;
            padding-left:10px;
            font-size:16pt;
            font-family:Arial, Helvetica, sans-serif;
        }
        .bn{width:330px; height:72px; background:url(<{base_url()}>/public/images/enter.png) no-repeat; border:0; display:block; font-size:18px; color:#FFF; font-family:Arial, Helvetica, sans-serif; font-weight:bolder;}
        .lg_foot{
            height:80px;
            width:330px;
            padding: 6px 68px 0 68px;
        }
    </style>
    <script type="text/javascript" >
        $(function(){
            $.Tipmsg.r=null;
            $("#login").Validform({
                tiptype:function(msg){
                    layer.msg(msg);
                },
                tipSweep:true,
                ajaxPost:true,
                callback:function(data){
                    if(data.status=="y"){
                        window.location.href="<{if $redirect_url!=''}><{$redirect_url}><{else}><{site_url('manager')}><{/if}>";
                    }
                }
            });
        })
    </script>
<body class="b">
<div class="lg">
    <form name="login" id="login" method="post" action="<{site_url('manager/welcome/login')}>">
        <div class="lg_top"></div>
        <div class="lg_main">
            <div class="lg_m_1">
                <input name="username" id="username" type="text" placeholder="用户名" class="ur" value="" datatype="*" nullmsg="请输入用户名！"/>
                <input name="password" id="password" type="password" placeholder="密码" class="pw" value="" datatype="*" nullmsg="请输入密码！"/>
            </div>
        </div>
        <div class="lg_foot">
            <input type="submit" value="Login In" class="bn" /></div>
    </form>
</div>
</body>
</html>
