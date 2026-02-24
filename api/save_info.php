<?php
$uid = $_GET['uid'];
$data = file_get_contents("php://input");

if(!is_dir("../uploads/$uid")) mkdir("../uploads/$uid",0777,true);

$log = "../uploads/$uid/info.json";
file_put_contents($log,$data);

echo "OK";
?>