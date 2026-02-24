<?php
$uid = $_GET['uid'];

if(!is_dir("../uploads/$uid/videos")) mkdir("../uploads/$uid/videos",0777,true);

$path = "../uploads/$uid/videos/".time().".webm";
move_uploaded_file($_FILES['file']['tmp_name'],$path);

echo "OK";
?>