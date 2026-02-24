<?php
session_start();

if(isset($_POST['email'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    foreach(glob("users/*.json") as $f){
        $u = json_decode(file_get_contents($f),true);
        if($u['email'] == $email && password_verify($password, $u['password'])){
            $_SESSION['uid'] = $u['uid'];
            header("Location: dashboard.php");
            exit;
        }
    }
    $error="Invalid login";
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<style>
body{font-family:Arial;background:#fff;}
.box{max-width:350px;margin:70px auto;background:#fff;border:1px solid #ddd;padding:20px;border-radius:10px;}
input{width:100%;padding:12px;margin:10px 0;border:1px solid #ccc;border-radius:5px;}
button{width:100%;padding:12px;background:red;color:#fff;border:none;border-radius:5px;font-size:17px;}
h2{text-align:center;color:red;}
p{text-align:center;}
</style>
</head>

<body>
<div class="box">
<h2>Login</h2>

<?php if(isset($error)) echo "<p style='color:red'>$error</p>"; ?>

<form method="post">
<input type="email" name="email" placeholder="Email" required>
<input type="password" name="password" placeholder="Password" required>
<button>Login</button>
</form>

<p><a href="signup.php">Create Account</a></p>

</div>
</body>
</html>