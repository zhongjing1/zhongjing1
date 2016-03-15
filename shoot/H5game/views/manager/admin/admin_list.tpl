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
<div class="content_title">用户管理 <input onclick="window.location.href='<{site_url('manager/admin/add')}>'" type="button" class="button" value="新增用户"/></div>
<form action="<{site_url('manager/admin')}>" method="post" enctype="multipart/form-data" name="search_text">
    <table class="table_search">
        <tr>
            <td>
                <input type="text" class="input100" name="username" placeholder="用户名" value="<{$username}>"/>
                <input type="text" class="input100" name="tel" placeholder="电话" value="<{$tel}>"/>
                <input type="text" class="input100" name="email" placeholder="邮箱" value="<{$email}>"/>
                <input name="Submit" type="submit" class="button" value="搜索"/>
            </td>
        </tr>
    </table>
</form>
<form action="<{site_url('manager/admin/batch')}>?redirect_url=<{get_now_url()}>" method="post" enctype="multipart/form-data" name="search_text" id="search_text">
    <table class="tablebg">
        <tr class="table_title">
            <td width="40" align="center">选择</td>
            <td>用户名</td>
            <td width="170">用户组</td>
            <td width="170">电话</td>
            <td width="170">邮箱</td>
            <td width="70">状态</td>
            <td width="100">时间</td>
            <td width="130">操作</td>
        </tr>
        <{foreach $list as $key}>
        <tr id="tr_<{$key.uid}>">
            <td><input type="checkbox" name="id[]" value="<{$key.uid}>" /></td>
            <td><{$key.username}></td>
            <td><{$key.group_name}></td>
            <td><{$key.tel}></td>
            <td><{$key.email}></td>
            <td align="center"><{if $key.status==1}>正常<{else}>冻结<{/if}></td>
            <td align="center"><{date("Y-m-d",$key.addtime)}></td>
            <td align="center">
                <a href="<{site_url("manager/admin/edit/<{$key.uid}>")}>?redirect_url=<{get_now_url()}>">编辑</a>
                <a href="javascript:get_delete(<{$key.uid}>);">删除</a>
            </td>
        </tr>
        <{/foreach}>
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
    	<td><{$pagecount}></td>
    </tr>
</table>
<script language="javascript">
    //根据ID删除
    function get_delete(id){
        if(confirm('您确定要删除所选内容吗?\n\n注意：删除后不可恢复\！')){
            $.ajax({
                type:"GET",
                url: "<{site_url("manager/admin/delete/")}>",
                data:"uid="+id,
                dataType:"json",
                success: function(data){
                    if(data.status=='y'){
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
</script>
</body>
</html>
