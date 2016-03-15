<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><{config_item('admin_title')}></title>
    <{load_css('admin')}>
    <{load_css('validform')}>
    <{load_js('jquery')}>
    <{load_js('global')}>
    <{load_js('validform')}>
    <{load_js('layer/layer')}>
</head>
<body>
<div class="content_title">公众号管理 <input onclick="window.location.href='<{site_url('manager/mp/add')}>'" type="button" class="button" value="新增公众号"/></div>
<form action="<{site_url('manager/mp')}>" method="post" enctype="multipart/form-data" name="search_text">
    <table class="table_search">
        <tr>
            <td>
                <input type="text" class="input100" name="username" placeholder="用户名" value="<{$username}>"/>
                <input type="text" class="input100" name="title" placeholder="公众号名称" value="<{$title}>"/>
                <select name="status">
                    <option value="0">是否审核</option>
                    <option value="1" <{if $status==1}>selected<{/if}>>审核</option>
                    <option value="2" <{if $status==2}>selected<{/if}>>冻结</option>
                </select>
                <input name="Submit" type="submit" class="button" value="搜索"/>
            </td>
        </tr>
    </table>
</form>
<form action="<{site_url('manager/mp/batch')}>?redirect_url=<{get_now_url()}>" method="post" enctype="multipart/form-data" name="search_text" id="search_text">
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
        <{foreach $list as $key}>
        <tr id="tr_<{$key.id}>">
            <td><input type="checkbox" name="id[]" value="<{$key.id}>" /></td>
            <td>
                <img src="http://open.weixin.qq.com/qr/code/?username=<{$key.original_id}>" class="open_litpic" id="pic_<{$key.id}>"/>
                <img src="http://open.weixin.qq.com/qr/code/?username=<{$key.original_id}>" class="open_bigpic" id="big_pic_<{$key.id}>"/>
                <{$key.title}>
            </td>
            <td><{$key.original_id}></td>
            <td><{$key.username}></td>
            <td align="center"><{if $key.status==1}>正常<{else}><span class="hong">冻结</span><{/if}></td>
            <td align="center"><{date("Y-m-d",$key.addtime)}></td>
            <td align="center">
                <a href="<{site_url("manager/welcome/mp/<{$key.id}>")}>" target="_blank">进入公众号</a>
                &nbsp<a href="javascript:mp_api(<{$key.id}>);">API</a>
                &nbsp<a href="<{site_url("manager/mp/group/<{$key.id}>")}>?redirect_url=<{get_now_url()}>">功能管理</a>
                &nbsp<a href="<{site_url("manager/mp/edit/<{$key.id}>")}>?redirect_url=<{get_now_url()}>">编辑</a>
                &nbsp<a href="javascript:get_delete(<{$key.id}>);">删除</a>
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
                url: "<{site_url("manager/mp/delete/")}>",
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
            content: '<{site_url("admin/mp/api")}>?id='+id
        });
    }
</script>
</body>
</html>
