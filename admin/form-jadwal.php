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
                            <form class="form-horizontal" role="form" action="proses-jadwal.php" method="post">
                                <input type="hidden" id="form-field-1" placeholder="id" class="col-xs-10 col-sm-5" name="aksi" value="tambah" />
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Kelas </label>
                                    <div class="col-sm-9">
                                        <select name="kelas" class="form-control">
                                            <?php
                                            $sql = "select * from mst_kelas where kode_kelas not in (select kode_kelas from trx_jadwal)";
                                            $qry = mysql_query($sql);
                                            while ($res_kelas = mysql_fetch_array($qry)) :
                                            ?>
                                                <option value="<?= $res_kelas['kode_kelas'] ?>"><?= $res_kelas['nama_kelas'] ?></option>
                                            <?php
                                            endwhile;
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div>
                                    <div>
                                        <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Hari</th>
                                                    <th>Jam Masuk</th>
                                                    <th>Jam keluar</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php
                                                for ($i = 0; $i < 7; $i++) :
                                                ?>
                                                    <tr>
                                                        <td>
                                                            <select name="hari[]" class="form-control">
                                                                <option value="Senin">Senin</option>
                                                                <option value="Selasa">Selasa</option>
                                                                <option value="Rabu">Rabu</option>
                                                                <option value="Kamis">Kamis</option>
                                                                <option value="Jumat">Jumat</option>
                                                                <option value="Sabtu">Sabtu</option>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <input type="text" name="jam_masuk[]" class="form-control">
                                                        </td>
                                                        <td>
                                                            <input type="text" name="jam_keluar[]" class="form-control">
                                                        </td>
                                                    </tr>
                                                <?php endfor; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="clearfix form-actions">
                                    <div class="col-md-offset-3 col-md-9">
                                        <input type="submit" value="Submit" class="btn btn-info" name="btn_simpan">
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