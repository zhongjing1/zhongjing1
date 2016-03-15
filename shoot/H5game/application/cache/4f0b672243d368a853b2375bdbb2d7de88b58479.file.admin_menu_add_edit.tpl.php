<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-12-23 19:39:00
         compiled from "/Users/Guest/web/yii/views/manager/admin_menu/admin_menu_add_edit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1457455672567a87d47367f5-36151958%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4f0b672243d368a853b2375bdbb2d7de88b58479' => 
    array (
      0 => '/Users/Guest/web/yii/views/manager/admin_menu/admin_menu_add_edit.tpl',
      1 => 1449724485,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1457455672567a87d47367f5-36151958',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'item' => 0,
    'reid' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_567a87d4834275_54256788',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_567a87d4834275_54256788')) {function content_567a87d4834275_54256788($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?php echo config_item('manager_title');?>
</title>
    <?php echo load_css('admin');?>

    <?php echo load_css('validform');?>

    <?php echo load_js('jquery');?>

    <?php echo load_js('validform');?>

    <?php echo load_js('layer/layer');?>

</head>
<body>
<div class="content_title"><?php if (get_segment(3)=='add') {?>添加<?php } else { ?>修改<?php }?>菜单<span><input onclick="history.back(-1);" type="button" class="button" value="返回"/></span></div>
<form action="" method="post" enctype="multipart/form-data" name="add" id="add">
    <table class="table_add">
        <tr>
            <td width="150" align="right"><span class="hong">*</span>栏目名称：</td>
            <td>
                <input name="title" type="text" class="input200" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
" datatype="*"/><span class="Validform_checktip"></span>
            </td>
        </tr>
        <tr>
            <td align="right"><span class="hong">*</span>模型：</td>
            <td>
                <input name="model" type="text" class="input200" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['model'];?>
" datatype="*"/><span class="Validform_checktip"></span>
            </td>
        </tr>
        <tr>
            <td align="right"><span class="hong">*</span>控制器：</td>
            <td>
                <input name="action" type="text" class="input200" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['action'];?>
" datatype="*"/><span class="Validform_checktip"></span>
            </td>
        </tr>
        <tr>
            <td align="right">自定义参数：</td>
            <td>
                <input name="string" type="text" class="input200" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['string'];?>
"/>
            </td>
        </tr>
        <tr>
            <td align="right"><span class="hong">*</span>排序：</td>
            <td>
                <input name="sortnum" type="text" class="input50" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['item']->value['sortnum'])===null||$tmp==='' ? 0 : $tmp);?>
" datatype="*"/><span class="Validform_checktip"></span>
            </td>
        </tr>
        <tr>
            <td align="right">&nbsp;</td>
            <td>
                <input name="Submit" type="submit" class="button" value="保存"/>
                &nbsp;&nbsp;&nbsp;&nbsp;
                <input name="Submit2" type="reset" class="button" value="重置" />
                <input name="dopost" type="hidden" id="dopost" value="save" />
                <input type="hidden" name="reid" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['reid']->value)===null||$tmp==='' ? 0 : $tmp);?>
">
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
