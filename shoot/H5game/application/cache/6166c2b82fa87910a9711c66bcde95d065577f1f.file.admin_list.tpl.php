<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-01-06 13:16:02
         compiled from "/www/web/ten/public_html/views/activity/aoziweituan/share/admin_list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1965119563567b943864a8a4-12953027%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6166c2b82fa87910a9711c66bcde95d065577f1f' => 
    array (
      0 => '/www/web/ten/public_html/views/activity/aoziweituan/share/admin_list.tpl',
      1 => 1451993364,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1965119563567b943864a8a4-12953027',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_567b94387061d0_78096670',
  'variables' => 
  array (
    'username' => 0,
    'tel' => 0,
    'list' => 0,
    'key' => 0,
    'pagecount' => 0,
    'index_dir' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_567b94387061d0_78096670')) {function content_567b94387061d0_78096670($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?php echo config_item('manager_title');?>
</title>
    <?php echo load_css('admin');?>

    <?php echo load_css('validform');?>

    <?php echo load_js('jquery');?>

    <?php echo load_js('global');?>

    <?php echo load_js('validform');?>

    <?php echo load_js('layer/layer');?>

</head>
<body>
<div class="content_title">用户管理</div>
<form action="" method="post" enctype="multipart/form-data" name="search_text">
    <table class="table_search">
        <tr>
            <td>
                <input type="text" class="input100" name="username" placeholder="用户名" value="<?php echo $_smarty_tpl->tpl_vars['username']->value;?>
"/>
                <input type="text" class="input100" name="tel" placeholder="电话" value="<?php echo $_smarty_tpl->tpl_vars['tel']->value;?>
"/>
                <input name="Submit" type="submit" class="button" value="搜索"/>
            </td>
        </tr>
    </table>
</form>
    <table class="tablebg">
        <tr class="table_title">
            <td width="100">姓名</td>
            <td width="170">电话</td>
            <td width="200">地址</td>
            <td width="170">奖品等级</td>
            <td width="170">奖品状态</td>
            <td width="100">时间</td>
            <td>&nbsp;</td>
        </tr>
        <?php  $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['key']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['key']->key => $_smarty_tpl->tpl_vars['key']->value) {
$_smarty_tpl->tpl_vars['key']->_loop = true;
?>
        <tr id="tr_<?php echo $_smarty_tpl->tpl_vars['key']->value['id'];?>
">
            <td><?php echo $_smarty_tpl->tpl_vars['key']->value['username'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['key']->value['tel'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['key']->value['address'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['key']->value['prize'];?>
</td>
            <td align="center" id="prize_ok_<?php echo $_smarty_tpl->tpl_vars['key']->value['id'];?>
"><?php if ($_smarty_tpl->tpl_vars['key']->value['prize_ok']==1) {?>已经兑换<?php } else { ?><span onclick="up_prize_ok(<?php echo $_smarty_tpl->tpl_vars['key']->value['id'];?>
);"><span class="hong">等待兑换</span></span><?php }?></td>
            <td align="center"><?php echo date("Y-m-d H:i:s",$_smarty_tpl->tpl_vars['key']->value['addtime']);?>
</td>
            <td>&nbsp;</td>
        </tr>
        <?php } ?>
    </table>
<table class="table_page">
    <tr>
    	<td><?php echo $_smarty_tpl->tpl_vars['pagecount']->value;?>
</td>
    </tr>
</table>
<?php echo '<script'; ?>
 language="javascript">
    //根据ID删除
    function up_prize_ok(id){
        $.ajax({
            type:"POST",
            url: "<?php echo site_url(((string)$_smarty_tpl->tpl_vars['index_dir']->value)."/admin_prize_ok");?>
",
            data:"id="+id,
            dataType:"json",
            success: function(data){
                if(data.status=='y'){
                    $("#prize_ok_"+id).text('已经兑换');
                }else{
                    layer.msg("操作失败。");
                }
            }
        });
    }
<?php echo '</script'; ?>
>
</body>
</html>
<?php }} ?>
