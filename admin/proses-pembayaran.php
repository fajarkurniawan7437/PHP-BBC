<?php
include ('./koneksi.php');

if(isset($_SESSION['login_id_admin'])){
	header("location:login.php");
	exit;
}

if($_GET['aksi'] == "batal"){
	$no = $_GET['no'];	
	mysql_query("update trx_pembayaran set status='Batal' where no_pembayaran='$no'");

	$sql = "select * from trx_pembayaran where no_pembayaran='$no'";
	$query = mysql_query($sql);
	$result= mysql_fetch_array($query);

	$id_daftar = $result['id_daftar'];

	mysql_query("update trx_daftar set status='Daftar' where id_daftar='$id_daftar'");
}

if($_GET['aksi'] == "konfirmasi"){
	$no = $_GET['no'];	
	mysql_query("update trx_pembayaran set status='Sudah Konfirmasi' where no_pembayaran='$no'");

	$sql = "select * from trx_pembayaran where no_pembayaran='$no'";
	$query = mysql_query($sql);
	$result= mysql_fetch_array($query);

	$id_daftar = $result['id_daftar'];

	mysql_query("update trx_daftar set status='Sudah Bayar' where id_daftar='$id_daftar'");


}
header('location:index.php?menu=pembayaran');
