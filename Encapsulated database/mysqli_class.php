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
class mysqli_class{
	public $mysqli_name;
	public $mysqli_localhost;
	public $mysqli_user;
	public $mysqli_pwd;
	public $mysqli_tab;
	public $conn;
	public $order;
	public $limit;
		
	public function mysqli_set($mysqli_name,$mysqli_localhost,$mysqli_user,$mysqli_pwd){
		$this->mysqli_name=$mysqli_name;
		$this->mysqli_localhost=$mysqli_localhost;
		$this->mysqli_user=$mysqli_user;
		$this->mysqli_pwd=$mysqli_pwd;
		$this->order = "";
		$this->limit = "";
	}
	public function table($mysqli_tab){
		$this->mysqli_tab=$mysqli_tab;
	}
	public function order($order){

			$this->order="order by $order";

		}
	public function limit($start,$num){

			$this->limit="limit $start,$num";
			
		}
	public function conn(){
	$this->conn=new mysqli($this->mysqli_localhost,$this->mysqli_user,$this->mysqli_pwd,$this->mysqli_name)or die("失败");
	}
	
	public function mysqli_selest($field="",$where=""){
		$arry=array();
		if(empty($field)){
			$field="*";
		}else{
			$field=implode(",",$field);
		}
		if(!empty($where)){
			
			$where="where $where";
		}
		
		$sql="select $field from $this->mysqli_tab $where $this->order $this->limit";
		
		$rel=$this->conn->query($sql);
		while($row=$rel->fetch_array()){
			$arry[]=$row;	
		}
		return $arry;
	}
	public function mysqli_insert($ty,$vl){
		$a=(implode(',',$vl));
		$b=implode(',',$ty);
		$sql="insert into $this->mysqli_tab($a) values($b)";
		$rel=$this->conn->query($sql);
		if($rel){
			header("location:mysqli_call.php");
		}else{
			echo "修改失败";
		}
	}
	public function mysqli_delete($id){
		
		$sql="DELETE FROM $this->mysqli_tab where aid='$id' ";
		$rel=$this->conn->query($sql);
		if($rel){
			header("location:mysqli_call.php");
		}
	}
	public function mysqli_update($up,$data,$where=""){
		if(!empty($where)){
			
			$where=" where $where";
		}
		$sql="update $this->mysqli_tab set ";
		foreach ($up as $key => $value) {
			if($key==count($up)-1){
			$sql.= $up[$key]."=".$data[$key];
			}else{
			$sql.= $up[$key]."=".$data[$key].",";	
			}
		}
		
		$sql.=$where;
		$rel=$this->conn->query($sql);
		if($rel){
			header("location:mysqli_call.php");
		}else{
			echo "修改失败";
		}
	}
}


?>
