<?php
$f=fopen("data.txt","a");
for($i=1;$i<25;$i++){
	$x="q".$i;
	fwrite($f,$_GET[$x].",~");
}
fwrite($f,"\n");
header("Location: http://".$_SERVER['SERVER_NAME']."/query/wel.html");
exit();
?>