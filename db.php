<?php
/**
 * Created by PhpStorm.
 * User: a282993047
 * Date: 2016/5/28
 * Time: 9:15
 */
$conn = mysql_connect("localhost","root","");
if (!$conn){
    die('Could not connect: ' . mysql_error());
}
mysql_query("SET NAMES 'utf8'",$conn);
mysql_select_db("school", $conn);
?>