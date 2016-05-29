<?php
session_start();
include 'db.php';

$name = $_POST["user_name"];
$pswd = $_POST["user_pswd"];

//$role = $_GET["role"];
header("content-type:text/html;charset=utf-8");
$result = mysql_query("select * from loginuser WHERE Username = '$name' AND Password = '$pswd'");

$num = mysql_num_rows($result);
$row = mysql_fetch_array($result);
if($num == 0){
    echo 'Login failed!';
    header("Refresh:2;url=./login.html");
}
else{

        $_SESSION['login_name'] = $row['Username'];

//        $_SESSION['login_role'] = $row['role'];
    echo "<script>";
    echo "location.href='./index.php'";
    echo "</script>";
}
mysql_close($conn);
?>