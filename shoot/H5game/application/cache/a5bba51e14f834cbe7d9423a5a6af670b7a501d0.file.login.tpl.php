<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-01-07 15:15:15
         compiled from "/www/web/ten/public_html/views/manager/login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:159243127567b8a7d7882f5-94386931%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a5bba51e14f834cbe7d9423a5a6af670b7a501d0' => 
    array (
      0 => '/www/web/ten/public_html/views/manager/login.tpl',
      1 => 1451993363,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '159243127567b8a7d7882f5-94386931',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_567b8a7d801cd6_32013575',
  'variables' => 
  array (
    'redirect_url' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_567b8a7d801cd6_32013575')) {function content_567b8a7d801cd6_32013575($_smarty_tpl) {?><html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?php echo config_item('manager_title');?>
</title>
    <?php echo load_css('admin');?>

    <?php echo load_js('jquery');?>

    <?php echo load_js('validform');?>

    <?php echo load_js('layer/layer');?>

    <style type="text/css">
        *{
            padding:0px;
            margin:0px;
        }
        body{
            font-family:Arial, Helvetica, sans-serif;
            background:url(<?php echo base_url();?>
/public/images/grass.jpg);
            font-size:13px;
        }
        img{
            border:0;
        }
        .lg{width:468px; height:468px; margin:100px auto; background:url(<?php echo base_url();?>
/public/images/login_bg.png) no-repeat;}
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
            background:url(<?php echo base_url();?>
/public/images/user.png) no-repeat;
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
            background:url(<?php echo base_url();?>
/public/images/password.png) no-repeat;
            padding-left:10px;
            font-size:16pt;
            font-family:Arial, Helvetica, sans-serif;
        }
        .bn{width:330px; height:72px; background:url(<?php echo base_url();?>
/public/images/enter.png) no-repeat; border:0; display:block; font-size:18px; color:#FFF; font-family:Arial, Helvetica, sans-serif; font-weight:bolder;}
        .lg_foot{
            height:80px;
            width:330px;
            padding: 6px 68px 0 68px;
        }
    </style>
    <?php echo '<script'; ?>
 type="text/javascript" >
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
                        window.location.href="<?php if ($_smarty_tpl->tpl_vars['redirect_url']->value!='') {
echo $_smarty_tpl->tpl_vars['redirect_url']->value;
} else {
echo site_url('manager');
}?>";
                    }
                }
            });
        })
    <?php echo '</script'; ?>
>
<body class="b">
<div class="lg">
    <form name="login" id="login" method="post" action="<?php echo site_url('manager/welcome/login');?>
">
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
<?php }} ?>
