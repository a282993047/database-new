<?php
/**
 * Created by PhpStorm.
 * User: a282993047
 * Date: 2016/5/28
 * Time: 17:23
*/
session_start();
include'db.php';
$id = $_POST['id'];
$name = $_POST['name'];
$dept = $_POST['dept'];
$xibie = $_POST['xibie'];
$ttitle = $_POST['ttitle'];
$phone = $_POST['phone'];
$addr = $_POST['addr'];
$email = $_POST['email'];
$result1 = mysql_query("SELECT Deptid FROM Dept WHERE DeptName='$xibie'");
$row1 = mysql_fetch_array($result1);
$result = mysql_query("UPDATE Teachers LEFT JOIN Dept ON Teachers.TDeptid = Dept.Deptid SET TName = '$name',TTitle = '$ttitle',
          TPhone='$phone',TAddress='$addr',TEmail='$email',TDeptid='$row1[Deptid]' WHERE Teacherid =
          '$id'");
header("Location:./lookup.php");


