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

				<li class="active">Pendfataran Online</li>
			</ul><!-- /.breadcrumb -->
		</div>
		<div class="page-content">
			<div class="row">
				<div class="col-xs-12">
					<!-- PAGE CONTENT BEGINS -->
					<?php
					if (isset($_SESSION['login_id'])) :

						$login_id = $_SESSION['login_id'];

						$sql = "select sum(biaya_kursus+biaya_daftar) as total_biaya from trx_daftar where id_siswa='$login_id' and not status='Batal'";
						$query = mysql_query($sql);
						$result = mysql_fetch_array($query);

						$total_biaya = $result['total_biaya'];

						$sql = "select sum(jumlah_bayar) as total 
						from trx_pembayaran inner join trx_daftar 
						on trx_pembayaran.id_daftar=trx_daftar.id_daftar 
						where trx_daftar.id_siswa='$login_id' and trx_pembayaran.status='Sudah Konfirmasi'";

						$qry_bayar = mysql_query($sql);
						$result_bayar = mysql_fetch_array($qry_bayar);
						$total_pembayaran  = $result_bayar['total'];

						$sisa = $total_biaya - $total_pembayaran;

						if ($sisa == 0) :
							$sql = "SELECT * FROM  mst_siswa WHERE id_siswa='" . $_SESSION['login_id'] . "'";
							$query = mysql_query($sql);
							$result = mysql_fetch_array($query);

					?>
							<center>
								<h3>Formulir Pendfataran</h3><br>
							</center>
							<form class="form-horizontal" role="form" action="index.php?menu=konfirmasi-daftar" method="post">
								<input type="hidden" id="form-field-1" placeholder="id" class="col-xs-10 col-sm-5" name="id_siswa" value="<?php echo $_SESSION['login_id'] ?>" />
								<div class="form-group">
									<label class="col-sm-3 control-label no-padding-left">Nama Siswa</label>
									<div class="col-sm-9">
										<label class="control-label"><?= $result['nama'] ?></label>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label no-padding-left">Alamat</label>
									<div class="col-sm-9">
										<label class="control-label"><?= $result['alamat'] ?></label>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label no-padding-left">No Telp</label>
									<div class="col-sm-9">
										<label class="control-label"><?= $result['no_telp'] ?></label>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-3 control-label no-padding-left" for="form-field-1"> Jenis Paket </label>
									<div class="col-sm-9">
										<select id="form-field-1" class="col-xs-10 col-sm-5" name="id_paket" required>
											<option value="">Silahkan pilih Jenis Paket</option>
											<?php $query = mysql_query("select * from mst_paket");
											while ($row = mysql_fetch_array($query)) {
												if ($row['id_paket'] == $_GET['id_paket']) {
													$checked = 'selected';
												} else {
													$checked = '';
												}
											?>
												<option value="<?php echo $row['id_paket'] ?>" <?php echo $checked; ?>><?php echo $row['nama']; ?> - Pertemuan <?php echo $row['pertemuan']; ?>x [<?php echo "Rp. " . number_format($row['biaya'], 2); ?>]</option>
											<?php } ?>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label no-padding-left" for="form-field-1"> Jenis Pembayaran </label>
									<div class="col-sm-9">
										<select id="form-field-1" class="col-xs-10 col-sm-5" name="jenis_pembayaran" required>
											<option value="">Silahkan pilih Jenis Pembayaran</option>
											<option value="Cash">Cash</option>
											<option value="Cicil">Cicil 2x</option>
										</select>
									</div>
								</div>
								<div class="clearfix form-actions">
									<div class="col-md-offset-3 col-md-9">
										<input type="submit" value="Submit" name="btn_daftar" class="btn btn-info">
										&nbsp; &nbsp; &nbsp;
										<button class="btn" type="reset">
											<i class="ace-icon fa fa-undo bigger-110"></i>
											Reset
										</button>
									</div>
								</div>
							</form>
						<?php else : ?>
							<div class="alert alert-block alert-danger">
								<p>
									<strong>
										<i class="ace-icon fa fa-close"></i>
										Maaf!!
									</strong>
									Anda masih memiliki tunggakan pembayaran kursus sebelumnya
								</p>
							</div>
						<?php endif; ?>
					<?php else : ?>
						<div class="alert alert-block alert-info">
							<button type="button" class="close" data-dismiss="alert">
								<i class="ace-icon fa fa-times"></i>
							</button>
							<p>
								<strong>
									<i class="ace-icon fa fa-check"></i>
									Request Login!
								</strong>
								Mohon login terlebih dahulu untuk melakukan pendaftaran.
							</p>
						</div>
					<?php endif; ?>
					<!-- PAGE CONTENT ENDS -->
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.page-content -->
	</div>
</div><!-- /.main-content -->