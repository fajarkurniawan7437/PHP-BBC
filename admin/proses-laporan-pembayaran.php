<?php
session_start();
include('./koneksi.php');

if (isset($_POST['action'])) {
    $action = $_POST['action'];
    if ($action == 'Filter') {
        $tgl1 = $_POST['tgl1'];
        $tgl2 = $_POST['tgl2'];
        if ($tgl1 != '' and $tgl2 != '') {
            $_SESSION['tgl1'] = $tgl1;
            $_SESSION['tgl2'] = $tgl2;
        } else {
            unset($_SESSION['tgl1']);
            unset($_SESSION['tgl2']);
        }
    }
}

header("location:index.php?menu=pembayaran");
