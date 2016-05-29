<?php
/**
 * Created by PhpStorm.
 * User: a282993047
 * Date: 2016/5/28
 * Time: 11:35
 */
session_start();
include 'db.php';
$password = $_POST['password'];
$name = $_SESSION['login_name'];
$result = mysql_query("UPDATE loginuser SET Password = '$password' WHERE Username = '$name' ");
$num = mysql_affected_rows();
if($num == 0){
    echo "ÐÞ¸ÄÊ§°Ü";
}else {
   echo '<script> alert("success");window.location.href="./index.php" </script>';


}