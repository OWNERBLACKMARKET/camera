<?php
$uid = $_GET['uid'];

if(!is_dir("../uploads/$uid/audio")) mkdir("../uploads/$uid/audio",0777,true);

$path = "../uploads/$uid/audio/".time().".mp3";
move_uploaded_file($_FILES['audio']['tmp_name'],$path);

echo "OK";
?>