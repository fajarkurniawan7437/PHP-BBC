<?php
session_start();
include('./koneksi.php');

$id_user = $_POST['id_user'];
$password = $_POST['password'];

$data = mysql_query("select * from mst_user where id_usr='$id_user' and password='$password'");
$row = mysql_fetch_array($data);

$_SESSION['login_id_admin'] = $row['id_usr'];
$_SESSION['login_user_admin'] = $row['username'];

if (isset($_GET['logout'])) {
	session_destroy();
}
header("location: index.php");
