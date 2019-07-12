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
class data_class{
	public $data_name;
	public $date_localhost;
	public $data_user;
	public $data_pwd;
	public $data_tab;
	public $conn;
	public $order;
	public $limit;
		
	public function data_class($data_name,$date_localhost,$data_user,$data_pwd){
		$this->date_name=$data_name;
		$this->date_localhost=$date_localhost;
		$this->data_user=$data_user;
		$this->data_pwd=$data_pwd;
		$this->order = "";
		$this->limit = "";
	}
	public function table($data_tab){
		$this->data_tab=$data_tab;
	}
	public function order($order){

			$this->order="order by $order";

		}
	public function limit($start,$num){

			$this->limit="limit $start,$num";
			
		}
	public function conn(){
	$this->conn=mysql_connect($this->date_localhost,$this->data_user,$this->data_pwd)or die("失败");
	 mysql_select_db($this->date_name)or die("选取失败");
	}
	
	public function data_selest($field="",$where=""){
		$arry=array();
		if(empty($field)){
			$field="*";
		}else{
			$field=implode(",",$field);
		}
		if(!empty($where)){
			
			$where="where $where";
		}
		
		$sql="select $field from $this->data_tab $where $this->order $this->limit";
		
		$rel=mysql_query($sql);
		while($row=mysql_fetch_array($rel)){
			$arry[]=$row;	
		}
		return $arry;
	}
	public function data_insert($ty,$vl){
		$a=(implode(',',$vl));
		$b=implode(',',$ty);
		$sql="insert into $this->data_tab($a) values($b)";
		$rel=mysql_query($sql);
		if($rel){
			header("location:mysqli_call.php");
		}else{
			echo "修改失败";
		}
	}
	public function data_delete($id){
		
		$sql="DELETE FROM $this->data_tab where aid='$id' ";
		$rel=mysql_query($sql);
		if($rel){
			header("location:call.php");
		}
	}
	public function data_update($up,$data,$where=""){
		if(!empty($where)){
			
			$where=" where $where";
		}
		$sql="update $this->data_tab set ";
		foreach ($up as $key => $value) {
			if($key==count($up)-1){
			$sql.= $up[$key]."=".$data[$key];
			}else{
			$sql.= $up[$key]."=".$data[$key].",";	
			}
		}
		
		$sql.=$where;
		echo $sql;
		$rel=mysql_query($sql);
		if($rel){
			header("location:call.php");
		}else{
			echo "修改失败";
		}
	}
}


?>
