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

                <li class="active">Data Kelas</li>
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
                                Tabel Daftar Kelas
                            </div>
                            <!-- div.table-responsive -->
                            <!-- div.dataTables_borderWrap -->
                            <div>
                                <div>
                                    <br>
                                    <a href="index.php?menu=form-kelas" class="btn btn-primary">Tambah</a>
                                    <br>
                                    <br>
                                </div>
                                <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Kelas</th>
                                            <th class="hidden-480">Aksi</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        $sql = "select * from mst_kelas";
                                        $query = mysql_query($sql);
                                        $no = 1;

                                        while ($result = mysql_fetch_array($query)) {
                                        ?>
                                            <tr>
                                                <td><?= $no ?></td>
                                                <td><?= $result['nama_kelas']; ?></td>
                                                <td>
                                                    <div class="btn-group">
                                                        <button data-toggle="dropdown" class="btn btn-primary btn-sm dropdown-toggle">
                                                            Pilih
                                                            <i class="ace-icon fa fa-angle-down icon-on-right"></i>
                                                        </button>

                                                        <ul class="dropdown-menu">
                                                            <li>
                                                                <a href="index.php?menu=kelas-detail&kode=<?= $result['kode_kelas'] ?>">Detail</a>
                                                            </li>

                                                            <li>
                                                                <a onclick="return confirm('Anda ingin menghapus kelas ini?')" href="proses-kelas.php?aksi=hapus&kode=<?= $result['kode_kelas'] ?>">Hapus</a>
                                                            </li>

                                                        </ul>
                                                    </div><!-- /.btn-group -->
                                                </td>
                                            </tr>
                                        <?php
											$no++;
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