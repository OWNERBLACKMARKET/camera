<?php
$uid = $_GET['uid'];
$data = file_get_contents("php://input");

if(!is_dir("../uploads/$uid/images")) mkdir("../uploads/$uid/images",0777,true);

$img = base64_decode(str_replace("data:image/jpeg;base64,","",$data));

$file = "../uploads/$uid/images/".time().".jpg";
file_put_contents($file,$img);

echo "OK";
?>