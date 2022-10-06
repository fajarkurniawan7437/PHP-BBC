<?php
error_reporting(E_ALL && ~E_NOTICE);
require 'mysql5.php';
$user = "root";
$password = "";
$database = "kursus";
$host = "localhost";

mysql_connect($host, $user, $password);
mysql_select_db($database);
?>
