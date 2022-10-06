<?php include('./koneksi.php');

$id = "";
$nama_siswa = "";
$nama_paket = "";

$jenis_mobil = "";
$tanggal = "";
$status = "";



if (isset($_GET['kode'])) {
	$data = mysql_query("select d.id_daftar, a.nama as nama_siswa, b.nama as nama_paket, d.tanggal, d.status
														  from trx_daftar d
														  left join mst_siswa a on a.id = d.id_siswa
														  left join mst_paket b on b.id_paket = d.id_paket
														  where  d.id_daftar=" . $_GET['kode'] . "
														  order by d.tanggal desc") or die(mysql_error());

	while ($row = mysql_fetch_array($data)) {
		$id = $row['id_daftar'];
		$nama_siswa = $row['nama_siswa'];
		$nama_paket = $row['nama_paket'];

		$tanggal = $row['tanggal'];
		$status  = $row['status'];
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

				<li class="active">Data Pendfataran</li>
			</ul><!-- /.breadcrumb -->


		</div>

		<div class="page-content">

			<div class="row">
				<div class="col-xs-12">
					<div class="row">
						<div class="col-xs-12">
							<!-- PAGE CONTENT BEGINS -->
							<h3>Form Data Pendfataran</h3><br>
							<?php $action = "tambah";
							if (isset($_GET['aksi'])) {
								$action = $_GET['aksi'];
							}
							?>
							<div class="row">
								<div class="col-md-5">
									<form class="form-horizontal" role="form" action="proses-daftar.php?aksi=<?php echo $action ?>" method="post">

										<input type="hidden" id="form-field-1" placeholder="id" class="form-control" name="id" value="<?php echo $id ?>" />


										<div class="form-group">
											<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nama Siswa </label>

											<div class="col-sm-9">
												<select id="form-field-1" class="form-control" name="nama_siswa">
													<option>Nama Siswa</option>
													<?php $query = mysql_query("select * from mst_siswa");
													while ($row = mysql_fetch_array($query)) {
													?>
														<option value="<?php echo $row['id'] ?>" <?php if ($nama_siswa == $row['nama']) {
																									echo "selected";
																								} ?>><?php echo $row['nama']; ?></option>
													<?php } ?>

												</select>

											</div>
										</div>

										<div class="form-group">
											<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Jenis Paket </label>

											<div class="col-sm-9">
												<select id="form-field-1" class="form-control" name="nama_paket">
													<option>Jenis Paket</option>
													<?php $query = mysql_query("select * from mst_paket");
													while ($row = mysql_fetch_array($query)) {
													?>
														<option value="<?php echo $row['id'] ?>" <?php if ($nama_paket == $row['nama']) {
																									echo "selected";
																								} ?>><?php echo $row['nama']; ?></option>
													<?php } ?>

												</select>

											</div>
										</div>


										<div class="form-group">
											<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Status </label>

											<div class="col-sm-9">
												<select id="form-field-1" class="form-control" placeholder="Status Daftar" name="status">
													<option>Status Pendaftaran</option>
													<option value="Daftar" <?php if ($status == "Daftar") {
																				echo "selected";
																			} ?>>Daftar</option>
													<option value="Sudah Bayar" <?php if ($status == "Sudah Bayar") {
																					echo "selected";
																				} ?>>Sudah Bayar</option>
													<option value="Cancel" <?php if ($status == "Cancel") {
																				echo "selected";
																			} ?>>Cancel</option>
												</select>

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
								</div>
								<div class="col-md-7">
									<div class="table-header">
										Tabel Pertemuan
									</div>
									<table id="dynamic-table" class="table table-striped table-bordered table-hover">
										<thead>
											<tr>
												<th>Tanggal</th>
												<th>Jam</th>
												<th>Keterangan</th>
												<th>Status</th>
											</tr>
										</thead>

										<tbody>
											<?php
											$sql = mysql_query("SELECT *, trx_pertemuan.tanggal AS tanggal_pertemuan, trx_pertemuan.status AS status_pertemuan FROM trx_pertemuan LEFT JOIN trx_daftar ON trx_daftar.id_daftar = trx_pertemuan.id_daftar WHERE trx_pertemuan.id_daftar = '$_GET[kode]'");
											$no = 0;
											while ($row = mysql_fetch_array($sql)) {
												$mobil = mysql_fetch_array(mysql_query("SELECT * FROM mst_mobil WHERE kode_mobil = '$row[kode_mobil]'"));
												$no++;
											?>
												<tr>
													<td><?= $row['tanggal_pertemuan']; ?></td>
													<td><?= $row['jam']; ?>.00</td>
													<td>
														<p><?= $mobil['nama_mobil']; ?> <?= $mobil['jenis_mobil']; ?></p>
														<p class="small">Pertemuan ke <?= $no; ?></p>
													</td>
													<td>
														<?php
														if ($row['status_pertemuan'] == 'batal') {
															echo "<a href='izin-ubah.php?id=$row[id_pertemuan]&created_by=$row[created_by]&kode=$_GET[kode]'>Ijinkan Ubah</a>";
														} else {
															echo $row['status'];
														}
														?>
													</td>
												</tr>
											<?php
											}
											?>
										</tbody>
									</table>
								</div>
							</div>

							<!-- PAGE CONTENT ENDS -->
						</div><!-- /.col -->
					</div><!-- /.row -->
				</div><!-- /.page-content -->
			</div>
		</div><!-- /.main-content -->