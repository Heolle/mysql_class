<?php
include 'mysqli_class.php';
$obj=new mysqli_class();
$obj->mysqli_set("admin", "127.0.0.1", "root","");
$obj->conn();
$obj->table("admin_info");
$obj->order("aid DESC");
$obj->limit(0,5);
$data=$obj->mysqli_selest("");

?>