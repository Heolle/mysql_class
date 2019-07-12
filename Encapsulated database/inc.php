<?php
include 'data_class.php';
$obj=new data_class("admin", "127.0.0.1", "root","");
$obj->conn();
$obj->table("admin_info");
$obj->order("aid DESC");
$obj->limit(0,5);
$data=$obj->data_selest("");

?>