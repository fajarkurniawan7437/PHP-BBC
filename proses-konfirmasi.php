<?php
include ('./koneksi.php');

//edited-2017-07-25 by eep-terbaik.
session_start();
$today = date('Y-m-d');
mysql_query("INSERT INTO trx_konfirmasi SET kode_daftar = '$_POST[kode_daftar]', id_daftar = '$_POST[id_daftar]', tanggal = '$today', biaya = '$_POST[biaya]', no_rek = '$_POST[no_rek]', atas_nama = '$_POST[atas_nama]', status = 'Request', created_by = '$_SESSION[username]'");
$link = "index.php?menu=konfirmasi";
$pesan = $_SESSION['username'].' telah melakukan pembayaran dengan kode daftar '.$_POST['kode_daftar'];
mysql_query("INSERT INTO trx_notifikasi_admin SET pesan='$pesan', link = '$link'");
header("LOCATION:index.php?menu=jadwal&msg=Mohon menunggu 1x24 jam, pembayaran anda sedang kami cek");
