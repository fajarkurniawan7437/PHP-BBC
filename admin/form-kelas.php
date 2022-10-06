<?php include('./koneksi.php');

$id = "";
$nama = "";
$deskripsi = "";
$biaya = "";
$pertemuan = "";


if (isset($_GET['id'])) {
    $data = mysql_query("select * from mst_kelas where id_kelas='" . $_GET['id'] . "'") or die(mysql_error());
    while ($row = mysql_fetch_array($data)) {
        $id = $row['id_kelas'];
        $nama = $row['nama'];
        $deskripsi = $row['deskripsi'];
        $biaya  = $row['biaya'];
        $pertemuan  = $row['pertemuan'];
    }
}

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
                    <div class="row">
                        <div class="col-xs-12">
                            <!-- PAGE CONTENT BEGINS -->
                            <h3>Form Data Kelas</h3><br>
                            <form class="form-horizontal" role="form" action="proses-kelas.php" method="post">
                                <input type="hidden" id="form-field-1" placeholder="id" class="col-xs-10 col-sm-5" name="aksi" value="tambah" />
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nama Kelas </label>
                                    <div class="col-sm-9">
                                        <input type="text" id="form-field-1" placeholder="Nama Kelas" class="col-xs-10 col-sm-5" name="nama_kelas" value="<?= $nama; ?>" required />
                                    </div>
                                </div>
                                <div>
                                    <div>
                                        <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>No</th>
                                                    <th>Nama Siswa</th>
                                                    <th>Paket</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php
                                                $sql = "select mst_siswa.*, mst_paket.nama as nama_paket, trx_daftar.* 
                                                from trx_daftar inner join mst_siswa on mst_siswa.id_siswa=trx_daftar.id_siswa 
                                                inner join mst_paket on trx_daftar.id_paket=mst_paket.id_paket WHERE trx_daftar.status='Sudah Bayar' or trx_daftar.status='Lunas' or trx_daftar.status='Sudah Lunas'";
                                                $query = mysql_query($sql);
                                                while ($result = mysql_fetch_array($query)) {
                                                ?>
                                                    <tr>
                                                        <td>
                                                            <input type="hidden" name="id_daftar[]" value="<?=$result['id_daftar'] ?>">
                                                            <input type="checkbox" name="id_siswa[]" value="<?= $result['id_siswa']; ?>">
                                                        </td>
                                                        <td><?= $result['id_daftar']; ?></td>
                                                        <td><?= $result['nama']; ?></td>
                                                        <td><?= $result['nama_paket']; ?></td>
                                                    </tr>
                                                <?php
                                                }
                                                ?>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="clearfix form-actions">
                                    <div class="col-md-offset-3 col-md-9">

                                        <input type="submit" onclick="return check()" value="Submit" class="btn btn-info" name="btn_simpan">

                                        &nbsp; &nbsp; &nbsp;
                                        <button class="btn" type="reset">
                                            <i class="ace-icon fa fa-undo bigger-110"></i>
                                            Reset
                                        </button>
                                    </div>
                                </div>
                            </form>
                            <!-- PAGE CONTENT ENDS -->
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.page-content -->
            </div>
        </div><!-- /.main-content -->
        <script>
            function check() {
                count = 0;
                chkbox = document.getElementsByName('id_siswa[]');
                for (i = 0; i < chkbox.length; i++) {
                    if (chkbox[i].checked) {
                        count++;
                    }
                }
                if (count == 0) {
                    alert('Belum ada siswa yang dipilih!');
                    return false;
                } else {
                    return true;
                }
            }
        </script>