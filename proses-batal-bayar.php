<?php
session_start();
include('./koneksi.php');

if(isset($_GET['no'])){
    $no = $_GET['no'];
    $sql = "update trx_pembayaran set status='Batal' where no_pembayaran='$no'";
    $query = mysql_query($sql);
    $_SESSION['message'] = "Pembayaran dengan No: $no telah dibatalkan";
    header("location: index.php?menu=riwayat-pembayaran");
}else{
    header("location:index.php");
}


