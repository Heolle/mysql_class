<?php
include 'pdo_class.php';
$snd='mysql:host=127.0.0.1;dbname=admin;';
$names='root';
$pwd='';
$obj=new pdo_class();
$obj->pdo_set($snd,$names,$pwd);
$obj->conn();
$obj->table("admin_info");
$obj->order("aid DESC");
$obj->limit(0,5);
$data=$obj->pdo_selest("");

?>