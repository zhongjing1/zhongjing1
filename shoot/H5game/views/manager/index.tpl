<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><{config_item('manager_title')}></title>
</head>
<frameset rows="40,*" frameborder="no" border="0" framespacing="0">
  <frame src="<{site_url("manager/welcome/header")}>" name="topFrame" scrolling="No" noresize="noresize" id="topFrame" title="topFrame" />
  <frameset rows="*,30" cols="*" frameborder="no" border="0" framespacing="0">
		<frameset cols="230,*" frameborder="no" border="0" framespacing="0">
			<frame src="<{site_url("manager/welcome/menu")}>" name="leftFrame" scrolling="yes" id="leftFrame" title="leftFrame"/>
			<frame src="<{site_url("manager/welcome/main")}>" name="main" id="main" title="main" scrolling="yes"/>
		</frameset>
		<frame src="<{site_url("manager/welcome/footer")}>" name="bottomFrame" scrolling="No" noresize="noresize" id="bottomFrame" title="bottomFrame" />
  </frameset>
</frameset>
<noframes><body>
</body>
</noframes>
</html>
