<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><{config_item('manager_title')}></title>
    <{load_css('admin')}>
    <{load_css('validform')}>
    <{load_js('jquery')}>
    <{load_js('global')}>
    <{load_js('validform')}>
    <{load_js('layer/layer')}>
</head>
<body>
<div class="content_title">菜单管理 <input onclick="window.location.href='<{site_url('manager/admin_menu/add')}>'" type="button" class="button" value="添加"/></div>
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
    <{function name=menu level=0}>
        <{foreach $data as $key}>
            <tr id="tr_<{$key.id}>"><input type="hidden" name="id[<{$key.id}>]" id="id[<{$key.id}>]" value="<{$key.id}>" />
                <td>
                    <{section name=loop loop=$level}>|--<{/section}><input type="text" class="input150" name="title[<{$key.id}>]" id="title[<{$key.id}>]" value="<{$key.title}>"/>
                </td>
                <td>
                    <input type="text" class="input150" name="model[<{$key.id}>]" id="model[<{$key.id}>]" value="<{$key.model}>"/>
                </td>
                <td>
                    <input type="text" class="input150" name="action[<{$key.id}>]" id="action[<{$key.id}>]" value="<{$key.action}>"/>
                </td>
                <td>
                    <input type="text" class="input150" name="string[<{$key.id}>]" id="string[<{$key.id}>]" value="<{$key.string}>"/>
                </td>
                <td align="center">
                    <input type="checkbox" name="show[<{$key.id}>]" id="show[<{$key.id}>]" <{if $key.show==1}>checked="checked"<{/if}> value="1"/>
                </td>
                <td align="center">
                    <input type="text" class="input30" name="sortnum[<{$key.id}>]" id="sortnum[<{$key.id}>]" value="<{$key.sortnum}>"/>
                </td>
                <td>
                    &nbsp;<a href="<{site_url("manager/admin_menu/edit/<{$key.id}>")}>?redirect_url=<{get_now_url()}>">编辑</a>
                    <a href="javascript:get_delete('<{$key.id}>')">删除</a>
                    <{if $level=='0'}>
                    <a href="<{site_url("manager/admin_menu/add/<{$key.id}>")}>">添加子菜单</a>
                    <{/if}>
                </td>
            </tr>
            <{call name=menu data=$key.down level=$level+1}>
        <{/foreach}>
    <{/function}>
    <{call name=menu data=$list}>
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
<script language="javascript">
    //根据ID删除
    function get_delete(id){
        if(confirm('您确定要删除所选内容吗?\n\n注意：删除后不可恢复\！')){
            $.ajax({
                type:"GET",
                url: "<{site_url("manager/admin_menu/delete/")}>",
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
</script>
</body>
</html>
