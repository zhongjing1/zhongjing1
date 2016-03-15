//获取浏览器页面可见高度和宽度
var PageHeight = document.documentElement.clientHeight,
    PageWidth = document.documentElement.clientWidth;
//计算loading框距离顶部和左部的距离（loading框的宽度为215px，高度为61px）
var LoadingTop = PageHeight > 102 ? (PageHeight - 102) / 2 : 0,
    LoadingLeft = PageWidth > 102 ? (PageWidth - 102) / 2 : 0;
//在页面未加载完毕之前显示的loading Html自定义内容
var LoadingHtml = '<div id="loadingDiv" style="position:absolute;left:0;width:100%;height:' 
					+ PageHeight 
					+ 'px;top:0;background:#000;opacity:1;filter:alpha(opacity=80);z-index:10000;">'
						+'<div style="position:absolute; cursor1:wait; left: ' 
						+ LoadingLeft + 'px; top:' + LoadingTop + 'px; width: auto;">'
						+'<img src="../images/loading.gif"></div>'
					+'</div>';
//呈现loading效果
document.write(LoadingHtml);

//监听加载状态改变
document.onreadystatechange = completeLoading;

//加载状态为complete时移除loading效果
function completeLoading() {
    if (document.readyState == "complete") {
        var loadingMask = document.getElementById('loadingDiv');
        loadingMask.parentNode.removeChild(loadingMask);
    }
}
