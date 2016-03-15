<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-12-23 19:39:23
         compiled from "/Users/Guest/web/yii/views/manager/mp/list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:251309487567a87eba9b7f5-25525659%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6c0cf4e54b6e0f75462b88a3057d2ea775f8c4c0' => 
    array (
      0 => '/Users/Guest/web/yii/views/manager/mp/list.tpl',
      1 => 1449724485,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '251309487567a87eba9b7f5-25525659',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'username' => 0,
    'title' => 0,
    'status' => 0,
    'list' => 0,
    'key' => 0,
    'pagecount' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_567a87ebc28034_66902374',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_567a87ebc28034_66902374')) {function content_567a87ebc28034_66902374($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
<div class="content_title">公众号管理 <input onclick="window.location.href='<?php echo site_url('manager/mp/add');?>
'" type="button" class="button" value="新增公众号"/></div>
<form action="<?php echo site_url('manager/mp');?>
" method="post" enctype="multipart/form-data" name="search_text">
    <table class="table_search">
        <tr>
            <td>
                <input type="text" class="input100" name="username" placeholder="用户名" value="<?php echo $_smarty_tpl->tpl_vars['username']->value;?>
"/>
                <input type="text" class="input100" name="title" placeholder="公众号名称" value="<?php echo $_smarty_tpl->tpl_vars['title']->value;?>
"/>
                <select name="status">
                    <option value="0">是否审核</option>
                    <option value="1" <?php if ($_smarty_tpl->tpl_vars['status']->value==1) {?>selected<?php }?>>审核</option>
                    <option value="2" <?php if ($_smarty_tpl->tpl_vars['status']->value==2) {?>selected<?php }?>>冻结</option>
                </select>
                <input name="Submit" type="submit" class="button" value="搜索"/>
            </td>
        </tr>
    </table>
</form>
<form action="<?php echo site_url('manager/mp/batch');?>
?redirect_url=<?php echo get_now_url();?>
" method="post" enctype="multipart/form-data" name="search_text" id="search_text">
    <table class="tablebg">
        <tr class="table_title">
            <td width="40" align="center">选择</td>
            <td>公众号名称</td>
            <td width="170">原始ID</td>
            <td width="130">用户名</td>
            <td width="70">状态</td>
            <td width="100">添加时间</td>
            <td width="250">操作</td>
        </tr>
        <?php  $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['key']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['key']->key => $_smarty_tpl->tpl_vars['key']->value) {
$_smarty_tpl->tpl_vars['key']->_loop = true;
?>
        <tr id="tr_<?php echo $_smarty_tpl->tpl_vars['key']->value['id'];?>
">
            <td><input type="checkbox" name="id[]" value="<?php echo $_smarty_tpl->tpl_vars['key']->value['id'];?>
" /></td>
            <td>
                <img src="http://open.weixin.qq.com/qr/code/?username=<?php echo $_smarty_tpl->tpl_vars['key']->value['original_id'];?>
" class="open_litpic" id="pic_<?php echo $_smarty_tpl->tpl_vars['key']->value['id'];?>
"/>
                <img src="http://open.weixin.qq.com/qr/code/?username=<?php echo $_smarty_tpl->tpl_vars['key']->value['original_id'];?>
" class="open_bigpic" id="big_pic_<?php echo $_smarty_tpl->tpl_vars['key']->value['id'];?>
"/>
                <?php echo $_smarty_tpl->tpl_vars['key']->value['title'];?>

            </td>
            <td><?php echo $_smarty_tpl->tpl_vars['key']->value['original_id'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['key']->value['username'];?>
</td>
            <td align="center"><?php if ($_smarty_tpl->tpl_vars['key']->value['status']==1) {?>正常<?php } else { ?><span class="hong">冻结</span><?php }?></td>
            <td align="center"><?php echo date("Y-m-d",$_smarty_tpl->tpl_vars['key']->value['addtime']);?>
</td>
            <td align="center">
                <a href="<?php echo site_url("manager/welcome/mp/".((string)$_smarty_tpl->tpl_vars['key']->value['id']));?>
" target="_blank">进入公众号</a>
                &nbsp<a href="javascript:mp_api(<?php echo $_smarty_tpl->tpl_vars['key']->value['id'];?>
);">API</a>
                &nbsp<a href="<?php echo site_url("manager/mp/group/".((string)$_smarty_tpl->tpl_vars['key']->value['id']));?>
?redirect_url=<?php echo get_now_url();?>
">功能管理</a>
                &nbsp<a href="<?php echo site_url("manager/mp/edit/".((string)$_smarty_tpl->tpl_vars['key']->value['id']));?>
?redirect_url=<?php echo get_now_url();?>
">编辑</a>
                &nbsp<a href="javascript:get_delete(<?php echo $_smarty_tpl->tpl_vars['key']->value['id'];?>
);">删除</a>
            </td>
        </tr>
        <?php } ?>
    </table>
    <table class="table_search">
        <tr>
            <td>
                <input type="checkbox" name="select_all" id="select_all" value="" onclick="selectAll(this);"/>
                <input name="submit_name" type="submit" class="button" value="审核"/>
                <input name="submit_name" type="submit" class="button" value="冻结"/>
                <input name="submit_name" type="submit" class="button" value="删除" onclick="if(confirm('您确定要删除所选内容吗?\n\n注意：删除后不可恢复\！')){return true;}else{return false;}"/>
            </td>
        </tr>
    </table>
</form>
<table class="table_page">
    <tr>
    	<td><?php echo $_smarty_tpl->tpl_vars['pagecount']->value;?>
</td>
    </tr>
</table>
<?php echo '<script'; ?>
 language="javascript">
    //根据ID删除
    function get_delete(id){
        if(confirm('您确定要删除所选内容吗?\n\n注意：删除后不可恢复\！')){
            $.ajax({
                type:"GET",
                url: "<?php echo site_url("manager/mp/delete/");?>
",
                data:"id="+id,
                dataType:"json",
                success: function(data){
                    if(data.status=='y'){
                        $("#tr_"+id).hide();
                    }else{
                        layer.msg("操作失败。");
                    }
                }
            });
        }else{
            return false;
        }
    }
    //公众号API显示
    function mp_api(id) {
        layer.open({
            type: 2,
            title:'API',
            area: ['600px', '200px'],
            fix: false, //不固定
            maxmin: true,
            content: '<?php echo site_url("admin/mp/api");?>
?id='+id
        });
    }
<?php echo '</script'; ?>
>
</body>
</html>
<?php }} ?>
