<?php
session_start();

if(isset($_POST['email'])){
    $email = $_POST['email'];
    $pass = password_hash($_POST['password'], PASSWORD_BCRYPT);

    if(!is_dir("users")) mkdir("users");

    $uid = substr(md5(time().rand()),0,10);

    $user = [
        "email"=>$email,
        "password"=>$pass,
        "uid"=>$uid
    ];

    file_put_contents("users/$uid.json", json_encode($user));

    header("Location: index.php?ok=1");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Signup</title>
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<style>
body{font-family:Arial;background:#fff;margin:0;padding:0;}
.box{max-width:350px;margin:70px auto;background:#fff;border:1px solid #ddd;padding:20px;border-radius:10px;}
input{width:100%;padding:12px;margin:10px 0;border:1px solid #ccc;border-radius:5px;}
button{width:100%;padding:12px;background:red;color:#fff;border:none;border-radius:5px;font-size:17px;}
h2{text-align:center;color:red;}
</style>
</head>
<body>

<div class="box">
<h2>Create Account</h2>

<form method="post">
<input type="email" name="email" placeholder="Email" required>
<input type="password" name="password" placeholder="Password" required>
<button>Signup</button>
</form>

</div>

</body>
</html>