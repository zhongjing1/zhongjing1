<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-01-06 10:37:13
         compiled from "/www/web/ten/public_html/views/activity/aoziweituan/chicheng/comment_list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1605435899568c7dd9c80807-36650131%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0e063e82d7b23d0f05033d0789634d38736f53af' => 
    array (
      0 => '/www/web/ten/public_html/views/activity/aoziweituan/chicheng/comment_list.tpl',
      1 => 1452047677,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1605435899568c7dd9c80807-36650131',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'index_dir' => 0,
    'nickname' => 0,
    'status' => 0,
    'list' => 0,
    'key' => 0,
    'pagecount' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_568c7dd9d907a6_39163132',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_568c7dd9d907a6_39163132')) {function content_568c7dd9d907a6_39163132($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>评论管理</title>
    <?php echo load_css('admin');?>

    <?php echo load_css('validform');?>

    <?php echo load_js('jquery');?>

    <?php echo load_js('global');?>

    <?php echo load_js('validform');?>

    <?php echo load_js('layer/layer');?>

</head>
<style>
#menu #nav {display:block;width:100%;padding:0;margin:0;list-style:none;}
#menu #nav li {float:left;width:120px;}
#menu #nav li.cur{border-bottom: 2px solid #000;  height: 35px;}
#menu #nav li a {display:block;line-height:27px;text-decoration:none;padding:10px 0 0 5px; text-align:center; color:#333;}
#menu #nav li a:hover{border-bottom: 2px solid #000;display: block; height: 25px;}
</style>
<body>
<div id="menu">
    <div class="content_title">
        <ul id="nav">
            <li><a href="<?php echo site_url(((string)$_smarty_tpl->tpl_vars['index_dir']->value)."/admin");?>
" >公司报名</a></li>
            <li><a href="<?php echo site_url(((string)$_smarty_tpl->tpl_vars['index_dir']->value)."/admin_student");?>
" >个人/团队报名</a></li>
            <li><a href="<?php echo site_url(((string)$_smarty_tpl->tpl_vars['index_dir']->value)."/admin_involved");?>
" >参与公司</a></li>
            <li class="cur"><a href="<?php echo site_url(((string)$_smarty_tpl->tpl_vars['index_dir']->value)."/admin_comment");?>
" >评论列表</a></li>
        </ul>
    </div>
    <!--预约用户查询-->
    <div>
        <form action="<?php echo site_url(((string)$_smarty_tpl->tpl_vars['index_dir']->value)."/admin_comment");?>
" method="post" enctype="multipart/form-data" name="search_text" style="float: left;">
            <table class="table_search">
                <tr>
                    <td>
                        <input type="text" class="input100" name="nickname" placeholder="昵称" value="<?php echo $_smarty_tpl->tpl_vars['nickname']->value;?>
"/>
                        <select name="status">
                            <option value="">是否审核</option>
                            <option value="1" <?php if ($_smarty_tpl->tpl_vars['status']->value==1) {?>selected<?php }?>>审核</option>
                            <option value="2" <?php if ($_smarty_tpl->tpl_vars['status']->value==2) {?>selected<?php }?>>锁定</option>
                        </select>
                        <input name="Submit" type="submit" class="button" value="搜索"/>
                    </td>
                </tr>
            </table>
        </form>
    </div>
    <form action="<?php echo site_url(((string)$_smarty_tpl->tpl_vars['index_dir']->value)."/admin_comment_batch");?>
" method="post" enctype="multipart/form-data" name="search_text" id="search_text">
        <table class="tablebg">
            <tr class="table_title">
            <td width="40" align="center">选择</td>
                <td width="200">昵称</td>
                <td>评论内容</td>
                <td width="50">状态</td>
                <td width="100">时间</td>
                <td width="130">操作</td>
            </tr>
            <?php  $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['key']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['key']->key => $_smarty_tpl->tpl_vars['key']->value) {
$_smarty_tpl->tpl_vars['key']->_loop = true;
?>
            <tr id="tr_<?php echo $_smarty_tpl->tpl_vars['key']->value['id'];?>
">
            	<td align="center"><input type="checkbox" name="id[]" value="<?php echo $_smarty_tpl->tpl_vars['key']->value['id'];?>
" /></td>
                <td>
                    <?php echo $_smarty_tpl->tpl_vars['key']->value['nickname'];?>

                    <img src="<?php echo $_smarty_tpl->tpl_vars['key']->value['headimgurl'];?>
" class="open_litpic" id="pic_<?php echo $_smarty_tpl->tpl_vars['key']->value['id'];?>
">
                    <img src="<?php echo $_smarty_tpl->tpl_vars['key']->value['headimgurl'];?>
" class="open_bigpic" id="big_pic_<?php echo $_smarty_tpl->tpl_vars['key']->value['id'];?>
"/>
                </td>
                <td><?php echo $_smarty_tpl->tpl_vars['key']->value['comment'];?>
</td>
                <td align="center"><?php if ($_smarty_tpl->tpl_vars['key']->value['status']==1) {?>审核<?php } else { ?><span class="hong">锁定</span><?php }?></td>
                <td align="center"><?php echo date("Y-m-d",$_smarty_tpl->tpl_vars['key']->value['addtime']);?>
</td>
                <td align="center">
                    <a href="javascript:get_delete(<?php echo $_smarty_tpl->tpl_vars['key']->value['id'];?>
);">删除</a>
            	</td>
            </tr>
            <?php } ?>
        </table>
        </div>
        <table class="table_search">
        <tr>
            <td>
                <input type="checkbox" name="select_all" id="select_all" value="" onclick="selectAll(this);"/>
                <input name="submit_name" type="submit" class="button" value="审核"/>
                <input name="submit_name" type="submit" class="button" value="锁定"/>
                <input name="submit_name" type="submit" class="button" value="删除" onclick="if(confirm('您确定要删除所选内容吗?\n\n注意：删除后不可恢复\！')){return true;}else{return false;}"/>
            </td>
        </tr>
    </table>
    </form>
</div>
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
                type:"POST",
                url: "<?php echo site_url(((string)$_smarty_tpl->tpl_vars['index_dir']->value)."/admin_comment_delete");?>
",
                data:"id="+id,
                dataType:"json",
                success: function(data){
                    if(data.status=='y'){
						alert("删除成功！");
                        $("#tr_"+id).hide();
                    }else{
                        alert("操作失败。");
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

</body>
</html><?php }} ?>
