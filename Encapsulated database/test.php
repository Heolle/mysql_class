<!DOCTYPE html>
<html lang="zh">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />
	<title>Document</title>
</head>
<body>
	
</body>
</html>
<?php
mysql_connect("localhost","root","")or die("ljsb");
mysql_select_db("admin");
$sql=mysql_query("insert into admin_info values('','xssa','sxs')");
if($sql){
	header("location:call.php");
}else{
	echo "cw";
}
?>