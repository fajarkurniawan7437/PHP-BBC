<?php
include('./koneksi.php');
session_start();

if (!isset($_SESSION['login_id'])) :
    header("location:index.php");
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
                    <li class="active">Riwayat Pembayaran</li>
                </ul><!-- /.breadcrumb -->
            </div>
            <div class="page-content">
                <div class="row">
                    <div class="col-xs-12">
                        <?php if (isset($_SESSION['message'])) : ?>
                            <div class="alert alert-block alert-success">
                                <strong class="green">
                                    <?php
                                     echo($_SESSION['message']);
                                     unset($_SESSION['message']);
                                      ?>
                                </strong>,
                            </div>

                        <?php endif; ?>
                    </div>
                </div>
                <div class="row">
                    <di class="col-xs-12">
                        <table class="table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Id Pendaftaran</th>
                                    <th>Tanggal </th>
                                    <th>Paket Kursus</th>
                                    <th>Jumlah Pembayaran</th>
                                    <th>No Rekening</th>
                                    <th>Atas Nama</th>
                                    <th>Status</th>
                                    <th>Bukti</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $login_id = $_SESSION['login_id'];
                                $sql = "select mst_siswa.*, mst_paket.nama as nama_paket, trx_daftar.id_daftar,trx_daftar.id_paket, 
                                trx_pembayaran.* from trx_daftar inner join mst_siswa on mst_siswa.id_siswa=trx_daftar.id_siswa 
                                inner join mst_paket on trx_daftar.id_paket=mst_paket.id_paket 
                                inner join trx_pembayaran on trx_pembayaran.id_daftar=trx_daftar.id_daftar
                                where mst_siswa.id_siswa='$login_id'";


                                $query = mysql_query($sql);
                                while ($result = mysql_fetch_array($query)) :
                                    $id_daftar = $_result['id_daftar'];

                                ?>
                                    <tr>
                                        <td><?= $result['no_pembayaran'] ?></td>
                                        <td><?= $result['id_daftar'] ?></td>
                                        <td><?= $result['tanggal'] ?></td>
                                        <td><?= $result['id_paket'] . "-" . $result['nama_paket'] ?></td>
                                        <td><?= $result['jumlah_bayar'] ?></td>
                                        <td><?= $result['no_rek'] ?></td>
                                        <td><?= $result['atas_nama'] ?></td>
                                        <td><label class="badge badge-info"><?= $result['status'] ?></label></td>
                                        <td><a href="admin/bukti-pembayaran/<?=$result['bukti_pembayaran'] ?>" target="_blank">Klik Disini</a></td>
                                        <?php if ($result['status'] == 'Belum Konfirmasi') : ?>
                                            <td><a onclick="return confirm('Anda yakin ingin membatalkan pembayaran ini?')"  href="proses-batal-bayar.php?no=<?= $result['no_pembayaran'] ?>" class="btn btn-sm btn-danger">Batalkan <i class="fa fa-close"></i></a></td>
                                        <?php else : ?>
                                            <td></td>
                                        <?php endif; ?>
                                    </tr>
                                <?php
                                endwhile;
                                ?>
                            </tbody>
                        </table>
                    </di>
                </div>

            </div>
        </div>
    </div>

<?php
endif;
?>