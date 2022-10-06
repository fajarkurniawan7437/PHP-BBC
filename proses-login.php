<?php
session_start();
include('./koneksi.php');

$email = $_POST['email'];
$password = $_POST['password'];

$query = mysql_query("SELECT * FROM  mst_siswa WHERE email = '$email' AND password = md5('$password')");

$result = mysql_fetch_array($query);
if (!$result) {
	header("location: login.php?msg=Periksa Kembali Username/Password Anda.");
} else {
	$_SESSION['email'] = $_POST['email'];
	$_SESSION['login_user'] = $result['nama'];
	$_SESSION['login_id'] = $result['id_siswa'];
	header("location: index.php");
}

if (isset($_GET['logout'])) {
	session_destroy();
}
