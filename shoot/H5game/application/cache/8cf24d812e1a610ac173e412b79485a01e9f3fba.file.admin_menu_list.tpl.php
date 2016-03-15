<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-12-23 19:38:51
         compiled from "/Users/Guest/web/yii/views/manager/admin_menu/admin_menu_list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:345569692567a87cb17bc57-40828256%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8cf24d812e1a610ac173e412b79485a01e9f3fba' => 
    array (
      0 => '/Users/Guest/web/yii/views/manager/admin_menu/admin_menu_list.tpl',
      1 => 1449724485,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '345569692567a87cb17bc57-40828256',
  'function' => 
  array (
    'menu' => 
    array (
      'parameter' => 
      array (
        'level' => 0,
      ),
      'compiled' => '',
    ),
  ),
  'variables' => 
  array (
    'data' => 0,
    'key' => 0,
    'level' => 0,
    'list' => 0,
  ),
  'has_nocache_code' => 0,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_567a87cb382f73_00469038',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_567a87cb382f73_00469038')) {function content_567a87cb382f73_00469038($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
<div class="content_title">菜单管理 <input onclick="window.location.href='<?php echo site_url('manager/admin_menu/add');?>
'" type="button" class="button" value="添加"/></div>
<form action="" method="post" enctype="multipart/form-data" name="search_text" id="search_text">
<table class="tablebg">
    <tr class="table_title">
        <td width="250" align="left">菜单名称</td>
        <td>模型名称</td>
        <td>控制器名称</td>
        <td>自定义参数</td>
        <td width="80">显示</td>
        <td width="80">排序</td>
        <td width="180">操作</td>
    </tr>
    <?php if (!function_exists('smarty_template_function_menu')) {
    function smarty_template_function_menu($_smarty_tpl,$params) {
    $saved_tpl_vars = $_smarty_tpl->tpl_vars;
    foreach ($_smarty_tpl->smarty->template_functions['menu']['parameter'] as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);};
    foreach ($params as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);}?>
        <?php  $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['key']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['key']->key => $_smarty_tpl->tpl_vars['key']->value) {
$_smarty_tpl->tpl_vars['key']->_loop = true;
?>
            <tr id="tr_<?php echo $_smarty_tpl->tpl_vars['key']->value['id'];?>
"><input type="hidden" name="id[<?php echo $_smarty_tpl->tpl_vars['key']->value['id'];?>
]" id="id[<?php echo $_smarty_tpl->tpl_vars['key']->value['id'];?>
]" value="<?php echo $_smarty_tpl->tpl_vars['key']->value['id'];?>
" />
                <td>
                    <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['loop'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['loop']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['name'] = 'loop';
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['level']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['total']);
?>|--<?php endfor; endif; ?><input type="text" class="input150" name="title[<?php echo $_smarty_tpl->tpl_vars['key']->value['id'];?>
]" id="title[<?php echo $_smarty_tpl->tpl_vars['key']->value['id'];?>
]" value="<?php echo $_smarty_tpl->tpl_vars['key']->value['title'];?>
"/>
                </td>
                <td>
                    <input type="text" class="input150" name="model[<?php echo $_smarty_tpl->tpl_vars['key']->value['id'];?>
]" id="model[<?php echo $_smarty_tpl->tpl_vars['key']->value['id'];?>
]" value="<?php echo $_smarty_tpl->tpl_vars['key']->value['model'];?>
"/>
                </td>
                <td>
                    <input type="text" class="input150" name="action[<?php echo $_smarty_tpl->tpl_vars['key']->value['id'];?>
]" id="action[<?php echo $_smarty_tpl->tpl_vars['key']->value['id'];?>
]" value="<?php echo $_smarty_tpl->tpl_vars['key']->value['action'];?>
"/>
                </td>
                <td>
                    <input type="text" class="input150" name="string[<?php echo $_smarty_tpl->tpl_vars['key']->value['id'];?>
]" id="string[<?php echo $_smarty_tpl->tpl_vars['key']->value['id'];?>
]" value="<?php echo $_smarty_tpl->tpl_vars['key']->value['string'];?>
"/>
                </td>
                <td align="center">
                    <input type="checkbox" name="show[<?php echo $_smarty_tpl->tpl_vars['key']->value['id'];?>
]" id="show[<?php echo $_smarty_tpl->tpl_vars['key']->value['id'];?>
]" <?php if ($_smarty_tpl->tpl_vars['key']->value['show']==1) {?>checked="checked"<?php }?> value="1"/>
                </td>
                <td align="center">
                    <input type="text" class="input30" name="sortnum[<?php echo $_smarty_tpl->tpl_vars['key']->value['id'];?>
]" id="sortnum[<?php echo $_smarty_tpl->tpl_vars['key']->value['id'];?>
]" value="<?php echo $_smarty_tpl->tpl_vars['key']->value['sortnum'];?>
"/>
                </td>
                <td>
                    &nbsp;<a href="<?php echo site_url("manager/admin_menu/edit/".((string)$_smarty_tpl->tpl_vars['key']->value['id']));?>
?redirect_url=<?php echo get_now_url();?>
">编辑</a>
                    <a href="javascript:get_delete('<?php echo $_smarty_tpl->tpl_vars['key']->value['id'];?>
')">删除</a>
                    <?php if ($_smarty_tpl->tpl_vars['level']->value=='0') {?>
                    <a href="<?php echo site_url("manager/admin_menu/add/".((string)$_smarty_tpl->tpl_vars['key']->value['id']));?>
">添加子菜单</a>
                    <?php }?>
                </td>
            </tr>
            <?php smarty_template_function_menu($_smarty_tpl,array('data'=>$_smarty_tpl->tpl_vars['key']->value['down'],'level'=>$_smarty_tpl->tpl_vars['level']->value+1));?>

        <?php } ?>
    <?php $_smarty_tpl->tpl_vars = $saved_tpl_vars;
foreach (Smarty::$global_tpl_vars as $key => $value) if(!isset($_smarty_tpl->tpl_vars[$key])) $_smarty_tpl->tpl_vars[$key] = $value;}}?>

    <?php smarty_template_function_menu($_smarty_tpl,array('data'=>$_smarty_tpl->tpl_vars['list']->value));?>

</table>
<table class="table_search">
    <tr>
    	<td>
            <input name="dopost" type="hidden" id="dopost" value="save"/>
            <input name="attribute_type" type="submit" class="button" value="保存"/>
        </td>
    </tr>
</table>
</form>
<?php echo '<script'; ?>
 language="javascript">
    //根据ID删除
    function get_delete(id){
        if(confirm('您确定要删除所选内容吗?\n\n注意：删除后不可恢复\！')){
            $.ajax({
                type:"GET",
                url: "<?php echo site_url("manager/admin_menu/delete/");?>
",
                data:"id="+id,
                dataType:"json",
                success: function(data){
                    if(data.status=='y'){
                        $("#tr_"+id).hide();
                    }else{
                        layer.msg('删除失败');
                    }
                }
            });
        }else{
            return false;
        }
    }
<?php echo '</script'; ?>
>
</body>
</html>
<?php }} ?>
