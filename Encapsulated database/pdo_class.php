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
class pdo_class{
	public $pdo_localhost;
	public $pdo_user;
	public $pdo_pwd;
	public $pdo_tab;
	public $conn;
	public $order;
	public $limit;
		
	public function pdo_set($pdo_localhost,$pdo_user,$pdo_pwd){
		$this->pdo_localhost=$pdo_localhost;
		$this->pdo_user=$pdo_user;
		$this->pdo_pwd=$pdo_pwd;
		$this->order = "";
		$this->limit = "";
	}
	public function table($pdo_tab){
		$this->pdo_tab=$pdo_tab;
	}
	public function order($order){

			$this->order="order by $order";

		}
	public function limit($start,$num){

			$this->limit="limit $start,$num";
			
		}
	public function conn(){
	$this->conn=new PDO($this->pdo_localhost,$this->pdo_user,$this->pdo_pwd)or die("失败");
	}
	
	public function pdo_selest($field="",$where=""){
		$arry=array();
		if(empty($field)){
			$field="*";
		}else{
			$field=implode(",",$field);
		}
		if(!empty($where)){
			
			$where="where $where";
		}
		
		$sql="select $field from $this->pdo_tab $where $this->order $this->limit";
		
		$rel=$this->conn->query($sql);
		while($row=$rel->fetch()){
			$arry[]=$row;	
		}
		return $arry;
	}
	public function pdo_insert($ty,$vl){
		$a=(implode(',',$vl));
		$b=implode(',',$ty);
		$sql="insert into $this->pdo_tab($a) values($b)";
		$rel=$this->conn->query($sql);
		if($rel){
			header("location:pdo_call.php");
		}else{
			echo "修改失败";
		}
	}
	public function pdo_delete($id){
		
		$sql="DELETE FROM $this->pdo_tab where aid='$id' ";
		$rel=$this->conn->query($sql);
		if($rel){
			header("location:pdo_call.php");
		}
	}
	public function pdo_update($up,$data,$where=""){
		if(!empty($where)){
			
			$where=" where $where";
		}
		$sql="update $this->pdo_tab set ";
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
			header("location:pdo_call.php");
		}else{
			echo "修改失败";
		}
	}
}


?>
