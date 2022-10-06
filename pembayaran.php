<?php
include('./koneksi.php');
session_start();

if (!isset($_SESSION['login_id'])) :
    header("location:index.php");
else :
    if (!isset($_GET['id'])) :
        header("location:index.php");
    endif;

    $id_daftar = $_GET['id'];

    $sql = "select mst_siswa.*, mst_paket.nama as nama_paket, trx_daftar.* from trx_daftar inner join mst_siswa on mst_siswa.id_siswa=trx_daftar.id_siswa inner join mst_paket on trx_daftar.id_paket=mst_paket.id_paket where trx_daftar.id_daftar='$id_daftar'";
    $query = mysql_query($sql);
    $result = mysql_fetch_array($query);
    $biaya = $result['biaya_kursus'] + $result['biaya_daftar'];

    $jenis_pembayaran = $result['jenis_pembayaran'];

    $sql = "select sum(jumlah_bayar) as total from trx_pembayaran where id_daftar='$id_daftar'";
    $qry_bayar = mysql_query($sql);
    $result_bayar = mysql_fetch_array($qry_bayar);
    $total  = $result_bayar['total'];
    $sisa = $biaya - $total;


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
                <?php if ($sisa == 0) : ?>
                    <div class="row">
                        <div class="col-xs-12">
                            <?php if (isset($_GET['message'])) : ?>
                                <div class="alert alert-block alert-error">
                                    <strong class="red">
                                        Pendaftaran dengan ID <?= $id_daftar ?> sudah dibayar dengan lunas
                                    </strong>,
                                </div>

                            <?php endif; ?>
                        </div>
                    </div>
                <?php else : ?>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="widget-box">
                                <div class="widget-header">
                                    <h4 class="widget-title">Pembayaran Kursus</h4>
                                </div>
                                <div class="widget-body">
                                    <div class="widget-main">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <div class="alert alert-info">
                                                    <h5>Note: Untuk Pembayaran silakan lakukan transfer pembayaran ke rekening BCA dengan No: 3690080141 atas nama Aan Hasani</h5>
                                                </div>
                                            </div>
                                        </div>
                                        <form action="proses-pembayaran.php" method="post" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label>Id Pendaftaran</label>
                                                <input type="text" class="form-control" placeholder="Id Pendaftaran" value="<?= $id_daftar ?>" readonly name="id_pendaftaran" />
                                            </div>
                                            <div class="form-group">
                                                <label>Paket</label>
                                                <input type="text" readonly="readonly" class="form-control" placeholder="Paket" value="<?= $result['id_paket'] . "-" . $result['nama_paket'] ?>" />
                                            </div>
                                            <div class="form-group">
                                                <label>Jenis Pembayaran</label>
                                                <input type="text" readonly="readonly" class="form-control" placeholder="Jenis Pembayaran" value="<?= $result['jenis_pembayaran'] ?>" />
                                            </div>
                                            <div class="form-group">
                                                <label>Jumlah Pembayaran</label>
                                                <input type="text" class="form-control" placeholder="Jumlah Pembayaran" name="jumlah_pembayaran" required value="<?= ($jenis_pembayaran == 'Cash' ? $biaya : $sisa) ?>" <?= ($jenis_pembayaran == 'Cash' ? 'readonly' : '') ?> />
                                            </div>
                                            <div class="form-group">
                                                <label>No Rekening</label>
                                                <input type="text" class="form-control" placeholder="No Rekening" name="no_rekening" required />
                                            </div>
                                            <div class="form-group">
                                                <label>Atas Nama</label>
                                                <input type="text" class="form-control" placeholder="Atas Nama" name="atas_nama" required />
                                            </div>
                                            <div class="form-group">
                                                <label>Bukti Pembayaran (Scan)</label>
                                                <input type="file" name="bukti_pembayaran" required />
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" name="btn_bayar" class="btn btn-primary">Konfirmasi</button>
                                                <a href="index.php?menu=riwayat-daftar" class="btn btn-error"> Batal</a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </div>

<?php
endif;
?>