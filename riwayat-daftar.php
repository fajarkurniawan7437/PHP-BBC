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
                    <li class="active">Riwayat Pendaftaran</li>
                </ul><!-- /.breadcrumb -->
            </div>
            <div class="page-content">
                <div class="row">
                    <div class="col-xs-12">
                        <?php if (isset($_GET['message'])) : ?>
                            <div class="alert alert-block alert-success">
                                <strong class="green">
                                    <?= $_GET['message'] ?>
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
                                    <th>Id</th>
                                    <th>Tanggal </th>
                                    <th>Paket Kursus</th>
                                    <th>Biaya (Biaya Kursus + Pendaftaran)</th>
                                    <th>Jenis Pembayaran</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $login_id = $_SESSION['login_id'];

                                $sql = "select mst_siswa.*, mst_paket.nama as nama_paket, trx_daftar.* 
                                from trx_daftar inner join mst_siswa on mst_siswa.id_siswa=trx_daftar.id_siswa 
                                inner join mst_paket on trx_daftar.id_paket=mst_paket.id_paket 
                                where mst_siswa.id_siswa='$login_id' and not status='Batal'";

                                $query = mysql_query($sql);
                                while ($result = mysql_fetch_array($query)) :
									$sisa=0;
									$total=0;
                                    $biaya = $result['biaya_kursus'] + $result['biaya_daftar'];
                                    $id_daftar = $result['id_daftar'] ;
									
                                    $sql = "select sum(jumlah_bayar) as total from trx_pembayaran where id_daftar='$id_daftar' and status='Sudah Konfirmasi'";
									


                                    $qry_bayar = mysql_query($sql);
                                    $result_bayar = mysql_fetch_array($qry_bayar);
                                    $total  = $result_bayar['total']==null? 0: $result_bayar['total'];
                                    $sisa = $biaya - $total;
									
                                ?>
                                    <tr>
                                        <td><?= $result['id_daftar'] ?></td>
                                        <td><?= $result['tanggal'] ?></td>
                                        <td><?= $result['id_paket'] . "-" . $result['nama_paket'] ?></td>
                                        <td><?= $biaya ?></td>
                                        <td><?= $result['jenis_pembayaran'] ?></td>
                                        <td>
										    <?php if ($sisa >0) { ?>
												<label class="badge badge-danger">Belum Dibayar/ Masih Ada Tunggakan</label>
											<?php }else{ ?>
												<label class="badge badge-info">Lunas</label>
											<?php } ?>												
										</td>
                                        <td>
										    <?php if ($sisa >0) { ?>
												<a href="index.php?menu=pembayaran&id=<?= $result['id_daftar'] ?>" class="btn btn-warning">Bayar Sekarang</a>
											<?php } ?>
										</td>
												
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