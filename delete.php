<?php
/**
 * Created by PhpStorm.
 * User: a282993047
 * Date: 2016/5/28
 * Time: 15:08
 */
include 'db.php';
$teacherid = $_POST['Teacherid'];
$result = mysql_query("DELETE FROM teachers WHERE Teacherid = '$teacherid'");
$row = mysql_affected_rows();
header("Location:./lookup.php");