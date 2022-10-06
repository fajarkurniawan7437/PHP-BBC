<?php include('./koneksi.php');
?>
<div class="main-content">
    <div class="main-content-inner">
        <div class="breadcrumbs ace-save-state" id="breadcrumbs">
            <ul class="breadcrumb">
                <li>
                    <i class="ace-icon fa fa-home home-icon"></i>
                    <a href="#">Home</a>
                </li>

                <li class="active">Jadwal</li>
            </ul><!-- /.breadcrumb -->
        </div>
        <div class="page-content">
            <div class="row">
                <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->
                    <div class="hr hr-18 dotted hr-double"></div>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="clearfix">
                                <div class="pull-right tableTools-container"></div>
                            </div>
                            <div class="table-header">
                                Tabel Jadwal
                            </div>

                            <!-- div.table-responsive -->

                            <!-- div.dataTables_borderWrap -->
                            <div>
                                <div>
                                    <br>
                                    <a href="index.php?menu=form-jadwal" class="btn btn-primary">Tambah</a>
                                    <br>
                                    <br>
                                </div>
                                <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Hari</th>
                                            <th>Jam Masuk</th>
                                            <th>Jam Keluar</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        $sql = "select * from mst_kelas where kode_kelas in (select kode_kelas from trx_jadwal)";
                                        $query = mysql_query($sql);
                                        while ($result = mysql_fetch_array($query)) :
                                            $kode_kelas = $result['kode_kelas'];
                                        ?>
                                            <tr>
                                                <td colspan="3">
                                                    <h3><?= $result['nama_kelas'] ?></h3>
                                                    <a onclick="return confirm('Hapus jadwal untuk kelas ini?')" href="proses-jadwal.php?aksi=hapus&kode=<?=$kode_kelas ?>">Hapus</a>
                                                </td>
                                            </tr>
                                            <?php
                                            $query = "select * from trx_jadwal where kode_kelas='$kode_kelas' ";
                                            $data = mysql_query($query) or die(mysql_error());
                                            while ($row = mysql_fetch_array($data)) :
                                            ?>
                                                <tr>
                                                    <td><?php echo $row['hari']; ?></td>
                                                    <td><?php echo $row['jam_masuk']; ?></td>
                                                    <td><?php echo $row['jam_keluar']; ?></td>
                                                </tr>
                                            <?php endwhile; ?>
                                        <?php endwhile; ?>
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