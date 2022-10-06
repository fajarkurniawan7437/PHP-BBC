<?php
include('./koneksi.php');
?>
<div class="main-content">
    <div class="main-content-inner">
        <div class="breadcrumbs ace-save-state" id="breadcrumbs">
            <ul class="breadcrumb">
                <li>
                    <i class="ace-icon fa fa-home home-icon"></i>
                    <a href="#">Home</a>
                </li>
                <li class="active">Konfirmasi Pendaftaran</li>
            </ul><!-- /.breadcrumb -->
        </div>
        <div class="page-content">
            <?php if (!isset($_SESSION['login_id'])) : ?>
                <div class="alert alert-block alert-warning">
                    <button type="button" class="close" data-dismiss="alert">
                        <i class="ace-icon fa fa-times"></i>
                    </button>
                    <p>
                        <strong>Mohon maaf!!</strong>
                        Silahkan login terlebih dahulu
                    </p>
                </div>
            <?php elseif (!isset($_POST['btn_daftar'])) : ?>
            <?php else : ?>
                <?php
                if (isset($_POST['btn_daftar'])) :
                    $id_siswa = $_SESSION['login_id'];

                    $sql = "SELECT * FROM  mst_siswa WHERE id_siswa='$id_siswa'";
                    $query = mysql_query($sql);
                    $result = mysql_fetch_array($query);

                    $id_paket = $_POST['id_paket'];
                    $jenis_pembayaran = $_POST['jenis_pembayaran'];

                    $sql = "select * from mst_paket where id_paket='$id_paket'";
                    $query_paket = mysql_query($sql);
                    $result_paket = mysql_fetch_array($query_paket);
                endif;
                ?>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="alert alert-info">
                            <h4>Note: Untuk Pembayaran silakan lakukan transfer pembayaran ke rekening BCA dengan No: 3690080141 atas nama Aan Hasani</h4>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12">
                        <form action="proses-konfirmasi-daftar.php" method="post">
                            <input type="hidden" name="id_siswa" value="<?= $id_siswa ?>">
                            <input type="hidden" name="id_paket" value="<?= $id_paket ?>">
                            <input type="hidden" name="biaya_kursus" value="<?= $result_paket['biaya'] ?>">
                            <input type="hidden" name="jenis_pembayaran" n value="<?= $jenis_pembayaran ?>">
                            <table class="table table-striped">
                                <tr>
                                    <td colspan="2">
                                        <h3>Konfirmasi Pendaftaran Anda</h3> <br>
                                        <small>Silahkan periksa terlebih dahulu data di bawah ini untuk memastikan data telah benar</small>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:15%">Nama</td>
                                    <td><?= $result['nama'] ?></td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td><?= $result['alamat'] ?></td>
                                </tr>
                                <tr>
                                    <td>Paket</td>
                                    <td><?= $result_paket['id_paket'] . "-" . $result_paket['nama'] ?></td>
                                </tr>
                                <tr>
                                    <td>Biaya Kursus</td>
                                    <td>
                                        <h4>Rp. <?= number_format($result_paket['biaya'], 2, ",", ".") ?></h4>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Biaya Penndaftaran</td>
                                    <td>
                                        <h4>Rp. <?= number_format(100000, 2, ",", ".") ?></h4>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Jenis Pembayaran</td>
                                    <td><?= $jenis_pembayaran ?></td>
                                </tr>
                                <tr>
                                    <td>
                                        <h4>Total</h4>
                                    </td>
                                    <td>
                                        <h4>Rp. <?= number_format($result_paket['biaya'] + 100000, 2, ",", ".") ?></h4>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <button type="submit" name="btn_konfirmasi" class="btn btn-primary">Konfirmasi</button>
                                        <a href="index.php" class="btn btn-error">Batal</a>
                                    </td>
                                </tr>

                            </table>
                        </form>
                    </div>
                </div>
            <?php endif; ?>
        </div><!-- /.row -->
    </div>
</div><!-- /.main-content -->