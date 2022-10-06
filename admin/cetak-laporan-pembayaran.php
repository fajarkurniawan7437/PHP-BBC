<?php
session_start();
// Do Something
if (empty($_SESSION['login_id_admin'])) {
    header("location: login.php");
} ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <title>BBC-English Training Specialist Online</title>

    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

    <!-- bootstrap & fontawesome -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/font-awesome/4.5.0/css/font-awesome.min.css" />

    <!-- page specific plugin styles -->

    <!-- text fonts -->
    <link rel="stylesheet" href="assets/css/fonts.googleapis.com.css" />

    <!-- ace styles -->
    <link rel="stylesheet" href="assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

    <!--[if lte IE 9]>
			<link rel="stylesheet" href="assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->
    <link rel="stylesheet" href="assets/css/ace-skins.min.css" />
    <link rel="stylesheet" href="assets/css/ace-rtl.min.css" />

    <!--[if lte IE 9]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->

    <!-- inline styles related to this page -->

    <!-- ace settings handler -->
    <script src="assets/js/ace-extra.min.js"></script>

    <!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

    <!--[if lte IE 8]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
		<![endif]-->
</head>

<body>
    <?php include('./koneksi.php'); ?>
    <div class="main-content">
        <div class="main-content-inner">
            <div class="page-content">
                <div class="row">
                    <div class="col-xs-12">
                        <!-- PAGE CONTENT BEGINS -->
                        <div class="hr hr-18 dotted hr-double"></div>
                        <div class="row">
                            <div class="col-xs-12">
                                <div>
                                    <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>No Pembayaran</th>
                                                <th>Id Pendaftaran</th>
                                                <th>Tanggal</th>
                                                <th>Nama Siswa</th>
                                                <th>Paket</th>
                                                <th>Biaya</th>
                                                <th>Jumlah Bayar</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            if (isset($_SESSION['tgl1'])) {
                                                $tgl1 = $_SESSION['tgl1'];
                                                $tgl2 = $_SESSION['tgl2'];


                                                $sql = "select mst_siswa.*, mst_paket.nama as nama_paket, trx_daftar.id_paket, trx_daftar.biaya_kursus, trx_daftar.biaya_daftar, trx_pembayaran.* 
										from trx_daftar 
										inner join mst_siswa on mst_siswa.id_siswa=trx_daftar.id_siswa 
										inner join mst_paket on trx_daftar.id_paket=mst_paket.id_paket
										inner join trx_pembayaran on trx_daftar.id_daftar=trx_pembayaran.id_daftar 
										where trx_pembayaran.tanggal between '$tgl1' and '$tgl2'";
                                            } else {
                                                $sql = "select mst_siswa.*, mst_paket.nama as nama_paket, trx_daftar.id_paket, trx_daftar.biaya_kursus, trx_daftar.biaya_daftar, trx_pembayaran.* 
										from trx_daftar 
										inner join mst_siswa on mst_siswa.id_siswa=trx_daftar.id_siswa 
										inner join mst_paket on trx_daftar.id_paket=mst_paket.id_paket
										inner join trx_pembayaran on trx_daftar.id_daftar=trx_pembayaran.id_daftar";
                                            }

                                            $query = mysql_query($sql);

                                            while ($result = mysql_fetch_array($query)) {
                                                $biaya = $result['biaya_kursus'] + $result['biaya_daftar'];
                                                $id_daftar = $_result['id_daftar'];

                                            ?>
                                                <tr>
                                                    <td><?= $result['no_pembayaran']; ?></td>
                                                    <td><?= $result['id_daftar']; ?></td>
                                                    <td><?= $result['tanggal']; ?></td>
                                                    <td><?= $result['nama']; ?></td>
                                                    <td><?= $result['id_paket'] . "-" . $result['nama_paket']; ?></td>
                                                    <td align='right'><?= number_format($biaya); ?></td>
                                                    <td align='right'><?= number_format($result['jumlah_bayar']); ?></td>
                                                    <?php if ($result['status'] == 'Batal') : ?>
                                                        <td><label class="badge badge-danger">Dibatalkan</label></td>
                                                    <?php else : ?>
                                                        <?php if ($result['status'] == 'Belum Konfirmasi') : ?>
                                                            <td><label class="badge badge-danger">Belum Konfirmasi</label></td>
                                                        <?php else : ?>
                                                            <td><label class="badge badge-info">Sudah Konfirmasi</label></td>
                                                        <?php endif; ?>
                                                    <?php endif; ?>

                                                </tr>
                                            <?php
                                            }
                                            ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- PAGE CONTENT ENDS -->
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.page-content -->
        </div>
    </div><!-- /.main-content -->
</body>
<script>
    window.print();
</script>

</html>