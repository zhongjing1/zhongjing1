<?php
$f=fopen("data.txt","a");
for($i=1;$i<25;$i++){
	$x="q".$i;
	if($i=="20"){
		fwrite($f,$_GET[$x."_1"].",~");
		fwrite($f,$_GET[$x."_2"].",~");
	}
	// echo $_GET[$x]."<br>";
	fwrite($f,$_GET[$x].",~");
}
fwrite($f,"\n");
header("Location: http://".$_SERVER['SERVER_NAME']."/query2/wel.html");
exit();
?>