/*
	广告JS
	Cole modify:04/21/09
*/

var timespan = navigator.userAgent.indexOf("Firefox") > 0 ? 15 : 10;
var AdConfig = false;
var n		 = 0;
var h		 = 0;
var sh		 = 0;
var st		 = 0;
	
function addEvent(obj, eventType, func)
{
	if (obj.addEventListener)
	{
		obj.addEventListener(eventType, func, false);
	}
	else if (obj.attachEvent)
	{
		obj.attachEvent("on" + eventType, func);
	}
}


function AdConfigInit()
{
	AdConfig = new Object();
	AdConfig.Left = 0;
	AdConfig.Top = 0;
	AdConfig.Width = 0;
	AdConfig.Height = 0;
	AdConfig.Scroll = function()
	{
		if (document.documentElement && document.documentElement.scrollLeft)
		{
		   AdConfig.Left = document.documentElement.scrollLeft;
		}
		else if (document.body)
		{
		   AdConfig.Left = document.body.scrollLeft;
		}

		if (document.documentElement && document.documentElement.scrollTop)
		{
		   AdConfig.Top = document.documentElement.scrollTop;
		}
		else if (document.body)
		{
		   AdConfig.Top = document.body.scrollTop;
		}
	}
	AdConfig.Resize = function()
	{
		if (document.documentElement && document.documentElement.clientHeight && document.body && document.body.clientHeight)
		{
			AdConfig.Width = (document.documentElement.clientWidth > document.body.clientWidth) ? document.documentElement.clientWidth : document.body.clientWidth;
			AdConfig.Height = (document.documentElement.clientHeight > document.body.clientHeight) ? document.documentElement.clientHeight : document.body.clientHeight;
		}
		else if (document.documentElement && document.documentElement.clientHeight)
		{
			AdConfig.Width = document.documentElement.clientWidth;
			AdConfig.Height = document.documentElement.clientHeight;
		}
		else if (document.body)
		{
			AdConfig.Width = document.body.clientWidth;
			AdConfig.Height = document.body.clientHeight;
		}
	}

	AdConfig.Scroll();
	AdConfig.Resize();
	addEvent(window, "scroll", AdConfig.Scroll);
	addEvent(window, "resize", AdConfig.Resize);
}

/*弹出窗口*/
function AdPopup(id, title, content, width, height, autoClosed)
{
	if (!AdConfig)
		AdConfigInit();

	var popup = window.open("about:blank", "", "width=" + width + ", height=" + height);
	popup.document.write("<html><head><title></title><body style='margin:0;'></body></html>");
	popup.document.title = title;
	popup.document.body.innerHTML = content;
	popup.document.body.style.cursor = "pointer";
	popup.document.body.style.overflow = "hidden";

	if (autoClosed)
	{
		popup.document.body.onclick = function()
		{
			popup.window.close();
		}
	}
}

/*浮动广告*/
function AdFly(id, title, content, left, top, width, height, autoClosed)
{
	if (!AdConfig)
		AdConfigInit();

	id = "adver_" + id;
	document.writeln("<span id='" + id + "'>" + content + "</span>");

	var obj = document.getElementById(id);
	obj.style.cursor = "pointer";
	obj.style.position = "absolute";
	obj.style.overflow = "hidden";
	obj.style.left = left + "px";
	obj.style.top = top + "px";
	obj.style.width = width + "px";
	obj.style.height = height + "px";

	var directX = 1;
	var directY = 1;

	obj.Move = function()
	{
		if (left + width >= AdConfig.Left + AdConfig.Width)
		{
			left = AdConfig.Left + AdConfig.Width - width;
			directX = -1;
		}
		else if (left <= AdConfig.Left)
		{
			left = AdConfig.Left;
			directX = 1;
		}

		if (top + height >= AdConfig.Top + AdConfig.Height)
		{
			top = AdConfig.Top + AdConfig.Height - height;
			directY = -1;
		}
		else if (top <= AdConfig.Top)
		{
			top = AdConfig.Top;
			directY = 1;
		}

		left += directX;
		top += directY;
		obj.style.left = left + "px";
		obj.style.top = top + "px";
	}

	var interval = window.setInterval(obj.Move, timespan);
	obj.onmouseover = function()
	{
		window.clearInterval(interval);
	}
	obj.onmouseout = function()
	{
		interval = window.setInterval(obj.Move, timespan);
	}
	if (autoClosed)
	{
		obj.onclick = function()
		{
			window.clearInterval(interval);
			obj.style.display = "none";
		}
	}
}

/*左侧门帘*/
function AdLeftHang(id, title, content, left, top, width, height, autoClosed)
{
	if (!AdConfig)
		AdConfigInit();

	id = "adver_" + id;
	document.writeln("<span id='" + id + "'>" + content + "</span>");

	var obj = document.getElementById(id);
	obj.style.cursor = "pointer";
	obj.style.position = "absolute";
	obj.style.overflow = "hidden";
	obj.style.left = left + "px";
	obj.style.top = top + "px";
	obj.style.width = width + "px";
	obj.style.height = height + "px";

	obj.Move = function()
	{
		var t = parseInt(obj.style.top, 10);
		if (t + 5 < AdConfig.Top + top)
		{
			obj.style.top = (t + 5) + "px";
		}
		else if (t - 5 > AdConfig.Top + top)
		{
			obj.style.top = (t - 5) + "px";
		}
	}

	var interval = window.setInterval(obj.Move, timespan);
	if (autoClosed)
	{
		obj.onclick = function()
		{
			window.clearInterval(interval);
			obj.style.display = "none";
		}
	}
}

/*右侧门帘*/
function AdRightHang(id, title, content, left, top, width, height, autoClosed)
{
	if (!AdConfig)
		AdConfigInit();

	id = "adver_" + id;
	document.writeln("<span id='" + id + "'>" + content + "</span>");

	var obj = document.getElementById(id);
	obj.style.cursor = "pointer";
	obj.style.position = "absolute";
	obj.style.overflow = "hidden";
	obj.style.right = left + "px";
	obj.style.top = top + "px";
	obj.style.width = width + "px";
	obj.style.height = height + "px";

	obj.Move = function()
	{
		var t = parseInt(obj.style.top, 10);
		if (t + 5 < AdConfig.Top + top)
		{
			obj.style.top = (t + 5) + "px";
		}
		else if (t - 5 > AdConfig.Top + top)
		{
			obj.style.top = (t - 5) + "px";
		}
	}

	var interval = window.setInterval(obj.Move, timespan);
	if (autoClosed)
	{
		obj.onclick = function()
		{
			window.clearInterval(interval);
			obj.style.display = "none";
		}
	}
}

/*左右门帘*/
function AdHang(id, title, content, left, right, top, width, height, autoClosed)
{
	if (!AdConfig)
		AdConfigInit();

	lid = "adver_l_" + id;
	rid = "adver_r_" + id;
	document.writeln("<span id='" + lid + "'>" + content + "</span>");
	document.writeln("<span id='" + rid + "'>" + content + "</span>");

	var obj = document.getElementById(lid);
	obj.style.cursor = "pointer";
	obj.style.position = "absolute";
	obj.style.overflow = "hidden";
	obj.style.left = left + "px";
	obj.style.top = top + "px";
	obj.style.width = width + "px";
	obj.style.height = height + "px";

	var obj2 = document.getElementById(rid);
	obj2.style.cursor = "pointer";
	obj2.style.position = "absolute";
	obj2.style.overflow = "hidden";
	obj2.style.right = left + "px";
	obj2.style.top = top + "px";
	obj2.style.width = width + "px";
	obj2.style.height = height + "px";

	obj.Move = function()
	{
		var t = parseInt(obj.style.top, 10);
		if (t + 5 < AdConfig.Top + top)
		{
			obj.style.top = (t + 5) + "px";
			obj2.style.top = (t + 5) + "px";
		}
		else if (t - 5 > AdConfig.Top + top)
		{
			obj.style.top = (t - 5) + "px";
			obj2.style.top = (t - 5) + "px";
		}
	}

	var interval = window.setInterval(obj.Move, timespan);
	if (autoClosed)
	{
		obj.onclick = function()
		{
			window.clearInterval(interval);
			obj.style.display = "none";
			obj2.style.display = "none";
		}
		obj2.onclick = function()
		{
			window.clearInterval(interval);
			obj.style.display = "none";
			obj2.style.display = "none";
		}
	}
}

/*拉屏广告*/
function bigScreen(id, title, content, time, height, autoClosed)
{
	if (!AdConfig)
		AdConfigInit();
		
	var screenObj = document.getElementById("bigScreen");
	if (!screenObj) return;
	screenObj.style.display = "none";
	screenObj.innerHTML = content;

	if (autoClosed)
	{
		screenObj.onclick = function()
		{
			screenObj.style.display = "none";
		}
	}

	sh = height;
	if (time > 0) st = time;
	else st = 3;

	//事件侦听
	if(window.attachEvent)
	{
		window.attachEvent("onload", addheight);
	}
	
	if(window.addEventListener)
	{
		window.addEventListener("load", addheight, false);
	}
}

function backheight()
{
	document.getElementById("bigScreen").style.height = h + "px";
	h -= 5;
	stopback = setTimeout("backheight()", 40)
	if(h < 0)
	{
		clearTimeout(stopback);
		h = 0;
		document.getElementById("bigScreen").style.display = "none";
	}
}

function delaytime()
{
	n++;
	stopdelay = setTimeout("delaytime()", 1000);
	if(n == st)
	{
		clearTimeout(stopdelay);
		backheight();
	}
}

function addheight()
{
	document.getElementById("bigScreen").style.display	= "block";
	document.getElementById("bigScreen").style.height	= h + "px";
	h += 5;
	stopadd = setTimeout("addheight()", 40);
	if(h > sh)
	{
		h = sh;
		clearTimeout(stopadd);
		delaytime();
	}
}