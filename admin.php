<?php
session_start();

$adminPass = "faheemadmin";

if(isset($_POST['pass'])){
    if($_POST['pass']==$adminPass){
        $_SESSION['admin']=1;
    }
}

if(!isset($_SESSION['admin'])){
?>
<form method="post">
<input type="password" name="pass" placeholder="Admin Password">
<button>Login</button>
</form>
<?php
exit;
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Admin</title>
<style>
body{font-family:Arial;padding:20px;}
.box{padding:10px;border:1px solid #ddd;margin:10px;border-radius:8px;}
a{color:red;}
</style>
</head>
<body>

<h2>Admin Panel</h2>

<?php
foreach(glob("users/*.json") as $f){
    $u = json_decode(file_get_contents($f),true);
    echo "<div class='box'>";
    echo "<strong>".$u['email']."</strong><br>";
    echo "UID: ".$u['uid']."<br>";
    echo "<a href='dashboard.php?uid=".$u['uid']."'>View User</a>";
    echo "</div>";
}
?>

</body>
</html>