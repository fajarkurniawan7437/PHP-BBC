<?php
error_reporting(E_ALL && ~E_NOTICE);
require 'mysql5.php';
$user = "root";
$password = "";
$database = "kursus";
$host = "127.0.0.1:3307";

mysql_connect($host, $user, $password);
mysql_select_db($database);
?>
