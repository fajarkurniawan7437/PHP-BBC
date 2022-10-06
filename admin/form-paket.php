<?php include('./koneksi.php');

$id = "";
$nama = "";
$deskripsi = "";
$biaya = "";
$pertemuan = "";


if (isset($_GET['id'])) {
	$data = mysql_query("select * from mst_paket where id_paket='" . $_GET['id'] . "'") or die(mysql_error());
	while ($row = mysql_fetch_array($data)) {
		$id = $row['id_paket'];
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
				<li class="active">Data paket</li>
			</ul><!-- /.breadcrumb -->
		</div>

		<div class="page-content">
			<div class="row">
				<div class="col-xs-12">
					<div class="row">
						<div class="col-xs-12">
							<!-- PAGE CONTENT BEGINS -->
							<h3>Form Data Paket</h3><br>
							<?php $action = "tambah";
							if (isset($_GET['aksi'])) {
								$action = $_GET['aksi'];
							}
							?>
							<form class="form-horizontal" role="form" action="proses-paket.php?aksi=<?php echo $action ?>" method="post">
								<input type="hidden" id="form-field-1" placeholder="id" class="col-xs-10 col-sm-5" name="id" value="<?php echo $id ?>" />
								<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nama Paket </label>
									<div class="col-sm-9">
										<input type="text" id="form-field-1" placeholder="Nama Paket" class="col-xs-10 col-sm-5" name="nama" value="<?php echo $nama; ?>" required />
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Deskripsi Paket </label>
									<div class="col-sm-9">
										<input type="text" id="form-field-1" placeholder="Deskripsi paket" class="col-xs-10 col-sm-5" name="deskripsi" value="<?php echo $deskripsi; ?>" required />
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Biaya Paket</label>
									<div class="col-sm-9">
										<input type="text" id="form-field-1" placeholder="Nominal biaya" class="col-xs-10 col-sm-5" name="biaya" value="<?php echo $biaya; ?>" required />
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Jumlah Pertemuan</label>

									<div class="col-sm-9">
										<input type="text" id="form-field-1" placeholder="Pertemuan" class="col-xs-10 col-sm-5" name="pertemuan" value="<?php echo $pertemuan; ?>" required />
									</div>
								</div>

								<div class="clearfix form-actions">
									<div class="col-md-offset-3 col-md-9">

										<input type="submit" value="Submit" class="btn btn-info">

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