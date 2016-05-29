<?php
/**
 * Created by PhpStorm.
 * User: a282993047
 * Date: 2016/5/22
 * Time: 20:40
 */
session_start();
session_destroy();
echo "<script>";
echo "location.href='./'";
echo "</script>";