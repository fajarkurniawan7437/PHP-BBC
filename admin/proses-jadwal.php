<?php
include('./koneksi.php');

if (isset($_SESSION['login_id_admin'])) {
    header("location:login.php");
    exit;
}

if ($_GET['aksi'] == 'hapus') {
    $kode = $_GET['kode'];

    mysql_query("delete from trx_jadwal where kode_kelas='$kode'");
}

if (isset($_POST['btn_simpan'])) {
    $kode_kelas = $_POST['kelas'];
    $arr_hari  = $_POST['hari'];
    $arr_jam_masuk  = $_POST['jam_masuk'];
    $arr_jam_keluar  = $_POST['jam_keluar'];

    for ($i = 0; $i < count($arr_hari); $i++) {
        $hari = $arr_hari[$i];
        $jam_masuk = $arr_jam_masuk[$i];
        $jam_keluar = $arr_jam_keluar[$i];

        if ($jam_masuk != '' and $jam_keluar != '') {
            $sql = "insert into trx_jadwal values (0,'$kode_kelas','$hari','$jam_masuk','$jam_keluar')";
            mysql_query($sql);
        }
    }
}

header("location:index.php?menu=jadwal");
