<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><{config_item('manager_title')}></title>
    <{load_css('admin')}>
    <{load_js('jquery')}>
    <script type="application/javascript">
        $(function() {
            //左侧菜单收缩展开
            $(".left_menu_parent").click(
                function () {
                    $(this).parent().find('.left_menu_down').toggle();
                }
            );
            //左侧菜单全部收缩展开
            $("#all").click(
                function () {
                    $('.left_menu_down').toggle();
                }
            );
        });
    </script>
    <style type="text/css">
        #add{ margin-left: 0px;}
    </style>
</head>
<body>
    <div class="left_menu">
        <div class="left_menu_parent" id="all"><a>展开/收缩全部</a></div>
    </div>
    <!--后台添加菜单-->
    <{foreach $menu_list as $key}>
    <div class="left_menu">
        <div class="left_menu_parent"><a><{$key.title}></a></div>
        <div class="left_menu_down">
            <{foreach $key.down as $val=>$keys}>
                <li class="<{if $val == 0}> no_border_top<{/if}>">
                <a target="main" href="<{site_url("manager/<{$keys.model}>/<{$keys.action}>")}><{if $keys.string != ''}>?<{$keys.string}><{/if}>">-<{$keys.title}></a>
                </li>
            <{/foreach}>
        </div>
    </div>
    <{/foreach}>
</body>
</html>