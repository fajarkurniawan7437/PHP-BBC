<?php
include ('./koneksi.php');

if(isset($_SESSION['login_id_admin'])){
	header("location:login.php");
	exit;
}

if($_GET['aksi'] == "batal"){
	$id = $_GET['id'];	
	mysql_query("update trx_daftar set status='Batal' where id_daftar='$id'");
}
header('location:index.php?menu=pendaftaran');
