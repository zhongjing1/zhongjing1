<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>评论管理</title>
    <{load_css('admin')}>
    <{load_css('validform')}>
    <{load_js('jquery')}>
    <{load_js('global')}>
    <{load_js('validform')}>
    <{load_js('layer/layer')}>
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
            <li><a href="<{site_url("<{$index_dir}>/admin")}>" >公司报名</a></li>
            <li><a href="<{site_url("<{$index_dir}>/admin_student")}>" >个人/团队报名</a></li>
            <li><a href="<{site_url("<{$index_dir}>/admin_involved")}>" >参与公司</a></li>
            <li class="cur"><a href="<{site_url("<{$index_dir}>/admin_comment")}>" >评论列表</a></li>
        </ul>
    </div>
    <!--预约用户查询-->
    <div>
        <form action="<{site_url("<{$index_dir}>/admin_comment")}>" method="post" enctype="multipart/form-data" name="search_text" style="float: left;">
            <table class="table_search">
                <tr>
                    <td>
                        <input type="text" class="input100" name="nickname" placeholder="昵称" value="<{$nickname}>"/>
                        <select name="status">
                            <option value="">是否审核</option>
                            <option value="1" <{if $status==1}>selected<{/if}>>审核</option>
                            <option value="2" <{if $status==2}>selected<{/if}>>锁定</option>
                        </select>
                        <input name="Submit" type="submit" class="button" value="搜索"/>
                    </td>
                </tr>
            </table>
        </form>
    </div>
    <form action="<{site_url("<{$index_dir}>/admin_comment_batch")}>" method="post" enctype="multipart/form-data" name="search_text" id="search_text">
        <table class="tablebg">
            <tr class="table_title">
            <td width="40" align="center">选择</td>
                <td width="200">昵称</td>
                <td>评论内容</td>
                <td width="50">状态</td>
                <td width="100">时间</td>
                <td width="130">操作</td>
            </tr>
            <{foreach $list as $key}>
            <tr id="tr_<{$key.id}>">
            	<td align="center"><input type="checkbox" name="id[]" value="<{$key.id}>" /></td>
                <td>
                    <{$key.nickname}>
                    <img src="<{$key.headimgurl}>" class="open_litpic" id="pic_<{$key.id}>">
                    <img src="<{$key.headimgurl}>" class="open_bigpic" id="big_pic_<{$key.id}>"/>
                </td>
                <td><{$key.comment}></td>
                <td align="center"><{if $key.status==1}>审核<{else}><span class="hong">锁定</span><{/if}></td>
                <td align="center"><{date("Y-m-d",$key.addtime)}></td>
                <td align="center">
                    <a href="javascript:get_delete(<{$key.id}>);">删除</a>
            	</td>
            </tr>
            <{/foreach}>
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
            <td><{$pagecount}></td>
        </tr>
    </table>
<script language="javascript">
    //根据ID删除
    function get_delete(id){
        if(confirm('您确定要删除所选内容吗?\n\n注意：删除后不可恢复\！')){
            $.ajax({
                type:"POST",
                url: "<{site_url("<{$index_dir}>/admin_comment_delete")}>",
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
</script>
</body>
</html>

</body>
</html>