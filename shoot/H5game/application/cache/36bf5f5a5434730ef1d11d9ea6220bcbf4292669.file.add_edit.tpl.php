<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-12-23 19:39:23
         compiled from "/Users/Guest/web/yii/views/manager/mp/add_edit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:114840323567a87eb118e74-51709565%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '36bf5f5a5434730ef1d11d9ea6220bcbf4292669' => 
    array (
      0 => '/Users/Guest/web/yii/views/manager/mp/add_edit.tpl',
      1 => 1449724485,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '114840323567a87eb118e74-51709565',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'item' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_567a87eb2be9b9_31897106',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_567a87eb2be9b9_31897106')) {function content_567a87eb2be9b9_31897106($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?php echo config_item('admin_title');?>
</title>
    <?php echo load_css('admin');?>

    <?php echo load_css('validform');?>

    <?php echo load_js('jquery');?>

    <?php echo load_js('global');?>

    <?php echo load_js('validform');?>

    <?php echo load_js('layer/layer');?>

</head>
<body>
<div class="content_title"><?php if (get_segment(3)=='add') {?>添加<?php } else { ?>修改<?php }?>公众号<span><input onclick="history.back(-1);" type="button" class="button" value="返回"/></span></div>
<form action="" method="post" enctype="multipart/form-data" name="add" id="add">
<table class="table_add">
    <tr>
        <td width="150" align="right"><span class="hong">*</span>名称：</td>
        <td>
            <input name="title" type="text" class="input300" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
" datatype="*"/><span class="Validform_checktip"></span>
        </td>
    </tr>
    <tr>
        <td width="150" align="right"><span class="hong">*</span>微信号：</td>
        <td>
            <input name="wechat_num" type="text" class="input300" <?php if (get_segment(3)=='add') {?>ajaxurl="<?php echo site_url('manager/mp/get_wechat_num');?>
"<?php }?> <?php if (get_segment(3)=='edit') {?>readonly="readonly"<?php }?> value="<?php echo $_smarty_tpl->tpl_vars['item']->value['wechat_num'];?>
" datatype="*"/><span class="Validform_checktip"></span>
        </td>
    </tr>
    <tr>
        <td width="150" align="right"><span class="hong">*</span>原始ID：</td>
        <td>
            <input name="original_id" type="text" class="input300" <?php if (get_segment(3)=='add') {?>ajaxurl="<?php echo site_url('manager/mp/get_original_id');?>
"<?php }?> <?php if (get_segment(3)=='edit') {?>readonly="readonly"<?php }?> value="<?php echo $_smarty_tpl->tpl_vars['item']->value['original_id'];?>
" datatype="*"/><span class="Validform_checktip"></span>
        </td>
    </tr>
    <tr>
        <td align="right"><span class="hong">*</span>appid：</td>
        <td>
            <input name="appid" class="input300" type="text" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['appid'];?>
" datatype="*"/><span class="Validform_checktip"></span>
        </td>
    </tr>
    <tr>
        <td align="right"><span class="hong">*</span>appsecret：</td>
        <td>
            <input name="appsecret" class="input300" type="text" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['appsecret'];?>
" datatype="*"/><span class="Validform_checktip"></span>
        </td>
    </tr>
    <tr>
        <td align="right"><span class="hong">*</span>是否加密：</td>
        <td>
            <input type="radio" name="aestype" value="1" <?php if ($_smarty_tpl->tpl_vars['item']->value['aestype']==1||$_smarty_tpl->tpl_vars['item']->value['aestype']=='') {?>checked<?php }?>/>明文模式
            <input type="radio" name="aestype" value="2" <?php if ($_smarty_tpl->tpl_vars['item']->value['aestype']==2) {?>checked<?php }?>/>兼容模式
            <input type="radio" name="aestype" value="3" <?php if ($_smarty_tpl->tpl_vars['item']->value['aestype']==3) {?>checked<?php }?>/>加密模式
        </td>
    </tr>
    <tr>
        <td align="right"><span class="hong">*</span>公众号类型：</td>
        <td>
            <input type="radio" name="mp_type" value="1" <?php if ($_smarty_tpl->tpl_vars['item']->value['mp_type']==1||$_smarty_tpl->tpl_vars['item']->value['aestype']=='') {?>checked<?php }?>/>服务号
            <input type="radio" name="mp_type" value="2" <?php if ($_smarty_tpl->tpl_vars['item']->value['mp_type']==2) {?>checked<?php }?>/>订阅号
        </td>
    </tr>
    <tr>
        <td align="right">微信支付商户ID：</td>
        <td>
            <input name="pay_id" class="input300" type="text" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['pay_id'];?>
" datatype="empty|*"/><span class="Validform_checktip"></span>
        </td>
    </tr>
    <tr>
        <td align="right">微信支付密匙：</td>
        <td>
            <input name="pay_key" class="input300" type="text" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['pay_key'];?>
" datatype="empty|*"/><span class="Validform_checktip"></span>
        </td>
    </tr>
    <tr>
        <td width="150" align="right"><span class="hong">*</span>用户名：</td>
        <td>
            <input name="username" type="text" class="input300" <?php if (get_segment(3)=='add') {?>ajaxurl="<?php echo site_url('manager/mp/get_username');?>
"<?php }?> <?php if (get_segment(3)=='edit') {?>readonly="readonly"<?php }?> value="<?php echo $_smarty_tpl->tpl_vars['item']->value['username'];?>
" datatype="*"/><span class="Validform_checktip"></span>
        </td>
    </tr>
    <tr>
        <td align="right"><?php if (get_segment(3)=='add') {?><span class="hong">*</span><?php }?>密码：</td>
        <td>
            <input name="password" type="password" class="input300" value="" datatype="<?php if (get_segment(3)=='edit') {?>empty|<?php }?>*"/><span class="Validform_checktip"></span>
        </td>
    </tr>
    <tr>
        <td align="right"><?php if (get_segment(3)=='add') {?><span class="hong">*</span><?php }?>重复密码：</td>
        <td>
            <input name="passwords" type="password" class="input300" value="" recheck="password" datatype="<?php if (get_segment(3)=='edit') {?>empty|<?php }?>*"/><span class="Validform_checktip"></span>
        </td>
    </tr>
    <tr>
        <td align="right">&nbsp;</td>
        <td>
            <input name="Submit" type="submit" class="button" value="保存"/>
            &nbsp;&nbsp;&nbsp;&nbsp;
            <input name="Submit2" type="reset" class="button" value="重置" />
            <input name="dopost" type="hidden" id="dopost" value="save" />
        </td>
    </tr>
</table>
</form>
<?php echo '<script'; ?>
 type="text/javascript">
    $(function(){
        $("#add").Validform({
            tiptype:function(msg,o,cssctl){
                if(!o.obj.is("form")){
                    var objtip=o.obj.siblings(".Validform_checktip");
                    cssctl(objtip,o.type);
                    objtip.text(msg);
                }
            },
            datatype: {
                "empty": /^\s*$/
            }
        });
    })
<?php echo '</script'; ?>
>
</body>
</html>
<?php }} ?>
