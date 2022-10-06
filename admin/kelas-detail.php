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

                <li class="active">Detail Kelas</li>
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
                                Tabel Daftar Siswa Per Kelas
                            </div>

                            <!-- div.table-responsive -->

                            <!-- div.dataTables_borderWrap -->
                            <div>
                                <?php
                                $kode = $_GET['kode'];
                                $sql = "select * from mst_kelas where kode_kelas='$kode'";
                                $query = mysql_query($sql);
                                $result = mysql_fetch_array($query);
                                ?>
                                <h2><?=$result['nama_kelas'] ?></h2>

                            </div>
                            <div>
                                <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Lengkap</th>
                                            <th>Alamat</th>
                                            <th>No Telpon</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        $query = "select * from mst_siswa 
                                        inner join mst_kelas_detail on mst_siswa.id_siswa = mst_kelas_detail.id_siswa 
                                        inner join mst_kelas on mst_kelas.kode_kelas=mst_kelas_detail.kode_kelas 
										WHERE mst_kelas.kode_kelas='$kode'";
										
                                        $data = mysql_query($query) or die(mysql_error());
                                        $no = 0;
                                        while ($row = mysql_fetch_array($data)) {
                                            $no++;
                                        ?>
                                            <tr>
                                                <td><?php echo $no; ?></td>
                                                <td><?php echo $row['nama']; ?></td>
                                                <td><?php echo $row['alamat']; ?></td>
                                                <td><?php echo $row['no_telp']; ?></td>
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