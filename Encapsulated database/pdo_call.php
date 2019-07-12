<?php
include'pdo_inc.php';
//删
if(isset($_GET['id'])){
	$id=$_GET['id'];
	$obj->pdo_delete($id);
}
//增
if(isset($_POST['username'])){
	$username=$_POST['username'];
	$userpwd=$_POST['userpwd'];
	$ty=array("'$username'","'$userpwd'");
	$vl=array("aname","apwd");
	$obj->pdo_insert($ty,$vl);
}
//改
	if(isset($_GET['sd'])){
		$sd=$_GET['sd'];
	$up=array("aname","apwd");
	$data=array("'编辑成功了'","'牛逼'");
	$obj->pdo_update($up,$data,"aid=$sd");
	}
	
?>
<!DOCTYPE html>
<html lang="zh">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />
	<title>Document</title>
</head>
<body>
	<table border="1" cellpadding="10" cellspacing="0" align="center">
		<tr>
			<th>序号</th>
			<th>用户名</th>
			<th>密码</th>
			<th>操作一</th>
			<th>操作二</th>
		</tr>
		<?php
			foreach ($data as  $value) {
				echo "<tr><td>$value[0]</td>";
				echo "<td>$value[1]</td>";
				echo "<td>$value[2]</td>";
				echo "<td ><a href='?id=".$value[0]."'>删除</a></td>";
				echo "<td><a href='?sd=".$value[0]."'>编辑</a></td></tr>";
			}
			?>
			<tr>
				<td colspan="5" align="center">
					<a href="pdo_insert.php">添加</a>
					</td>
			</tr>
	</table>	
</body>
</html>