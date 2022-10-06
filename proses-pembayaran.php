<?php
include('./koneksi.php');
session_start();

if (isset($_POST['btn_bayar'])) {
    $bulan = date('m');
    $tahun = date('y');
    $bulan_tahun = $bulan . $tahun;


    $sql = "select no_pembayaran from trx_pembayaran where substr(no_pembayaran,1,4)='$bulan_tahun' order by no_pembayaran desc limit 1";

    $qry_daftar = mysql_query($sql);
    $result = mysql_fetch_array($qry_daftar);
    if (!$result) {
        $no_pembayaran = $bulan_tahun . '001';
    } else {
        $no_pembayaran = $result['no_pembayaran'];
        $no_pembayaran = substr($no_pembayaran, 5, 7);
        $no_pembayaran = (int) $no_pembayaran + 1;
        $no_pembayaran = $bulan_tahun . sprintf('%03d', $no_pembayaran);
    }

    $id_daftar = $_POST['id_pendaftaran'];
    $tanggal = date("Y-m-d");
    $jumlah_pembayaran = $_POST['jumlah_pembayaran'];
    $no_rek = $_POST['no_rekening'];
    $atas_nama = $_POST['atas_nama'];
    $status = "Belum Konfirmasi";
    $bukti_pembayaran = $no_pembayaran . ".jpg";

    $tmp_file = $_FILES['bukti_pembayaran']['tmp_name'];
    $dest = 'admin/bukti-pembayaran/' . $bukti_pembayaran;

    if (!file_exists('./admin/bukti-pembayaran')) {
        if (!mkdir('./admin/bukti-pembayaran')) {
            echo "Gagal :(";
            exit;
        }
    }
    if (move_uploaded_file($tmp_file, $dest)) :
        $sql = "insert into trx_pembayaran values ('$no_pembayaran','$id_daftar','$tanggal','$jumlah_pembayaran','$no_rek','$atas_nama','$status','$bukti_pembayaran')";
        $query = mysql_query($sql);
        if ($query) :
            $msg = "Berhasil melakukan pembayaran untuk ID Pendaftaran: " . $id_daftar;
            $link = "index.php?menu=pembayaran&aksi=detail&id=$no_pembayaran&aksi=ubah";
            $pesan = $_SESSION['login_user'] . ' telah melakukan pembayaran';
            mysql_query("INSERT INTO trx_notifikasi_admin SET pesan='$pesan', link = '$link'");

            header("location:index.php?menu=riwayat-pembayaran&message=Pembayaran berhasil dengan ID: $no_pembayaran");
        else :
?>
            <div class="main-content">
                <div class="main-content-inner">
                    <div class="breadcrumbs ace-save-state" id="breadcrumbs">
                        <ul class="breadcrumb">
                            <li>
                                <i class="ace-icon fa fa-home home-icon"></i>
                                <a href="#">Home</a>
                            </li>
                            <li class="active">Pembayaran</li>
                        </ul><!-- /.breadcrumb -->
                    </div>
                    <div class="page-content">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <!-- PAGE CONTENT BEGINS -->
                                        <div class="alert alert-block alert-error">
                                            <strong class="red">
                                                Pendaftaran gagal... <a href="index.php">Kembali</a>
                                            </strong>,
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
        <?php

        endif;
    endif;
}
        ?>