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

				<li class="active">Data Pembayaran</li>
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
								Tabel Daftar Pembayaran
							</div>
							<!-- div.table-responsive -->
							<!-- div.dataTables_borderWrap -->
							<div>
								<table id="dynamic-table" class="table table-striped table-bordered table-hover">
									<thead>
										<tr>
											<th>No Pembayaran</th>
											<th>Id Pendaftaran</th>
											<th>Tanggal</th>
											<th>Nama Siswa</th>
											<th>Paket</th>
											<th>Biaya</th>
											<th>Jumlah Bayar</th>
											<th>Bukti</th>
											<th>Status</th>
											<th class="hidden-480">Aksi</th>
										</tr>
										<tr>
											<th colspan="10">
												<form class="form-inline" action="proses-laporan-pembayaran.php" method="post">
													<input type="date" name="tgl1" class="input-medium" placeholder="Dari" />
													<input type="date" name="tgl2" class="input-medium" placeholder="Sampai" />
													<input type="hidden" name="action" value="Filter">
													<button type="submit" class="btn btn-info btn-sm">
														<i class="ace-icon fa fa-search bigger-110"></i>Cari
													</button>
												</form>
											</th>
										</tr>
									</thead>

									<tbody>
										<?php
										if (isset($_SESSION['tgl1'])) {
											$tgl1 = $_SESSION['tgl1'];
											$tgl2 = $_SESSION['tgl2'];


											$sql = "select mst_siswa.*, mst_paket.nama as nama_paket, trx_daftar.id_paket, trx_daftar.biaya_kursus, trx_daftar.biaya_daftar, trx_pembayaran.* 
										from trx_daftar 
										inner join mst_siswa on mst_siswa.id_siswa=trx_daftar.id_siswa 
										inner join mst_paket on trx_daftar.id_paket=mst_paket.id_paket
										inner join trx_pembayaran on trx_daftar.id_daftar=trx_pembayaran.id_daftar 
										where trx_pembayaran.tanggal between '$tgl1' and '$tgl2'";
										} else {
											$sql = "select mst_siswa.*, mst_paket.nama as nama_paket, trx_daftar.id_paket, trx_daftar.biaya_kursus, trx_daftar.biaya_daftar, trx_pembayaran.* 
										from trx_daftar 
										inner join mst_siswa on mst_siswa.id_siswa=trx_daftar.id_siswa 
										inner join mst_paket on trx_daftar.id_paket=mst_paket.id_paket
										inner join trx_pembayaran on trx_daftar.id_daftar=trx_pembayaran.id_daftar";
										}

										$query = mysql_query($sql);

										while ($result = mysql_fetch_array($query)) {
											$biaya = $result['biaya_kursus'] + $result['biaya_daftar'];
											$id_daftar = $_result['id_daftar'];

										?>
											<tr>
												<td><?= $result['no_pembayaran']; ?></td>
												<td><?= $result['id_daftar']; ?></td>
												<td><?= $result['tanggal']; ?></td>
												<td><?= $result['nama']; ?></td>
												<td><?= $result['id_paket'] . "-" . $result['nama_paket']; ?></td>
												<td align='right'><?= number_format($biaya); ?></td>
												<td align='right'><?= number_format($result['jumlah_bayar']); ?></td>
												<td align='right'>
													<a href="bukti-pembayaran/<?= $result['bukti_pembayaran']; ?>" target="_blank">Klik Disini</a>
												</td>
												<?php if ($result['status'] == 'Batal') : ?>
													<td><label class="badge badge-danger">Dibatalkan</label></td>
													<td></td>
												<?php else : ?>
													<?php if ($result['status'] == 'Belum Konfirmasi') : ?>
														<td><label class="badge badge-danger">Belum Konfirmasi</label></td>
													<?php else : ?>
														<td><label class="badge badge-info">Sudah Konfirmasi</label></td>
													<?php endif; ?>
													<td>
														<div class="btn-group">
															<button data-toggle="dropdown" class="btn btn-primary btn-sm dropdown-toggle">
																Pilih
																<i class="ace-icon fa fa-angle-down icon-on-right"></i>
															</button>

															<ul class="dropdown-menu">
																<li>
																	<a href="proses-pembayaran.php?aksi=konfirmasi&no=<?= $result['no_pembayaran'] ?>">Konfirmasi</a>
																</li>

																<li>
																	<a href="proses-pembayaran.php?aksi=batal&no=<?= $result['no_pembayaran'] ?>">Batalkan</a>
																</li>

															</ul>
														</div><!-- /.btn-group -->
													</td>
												<?php endif; ?>

											</tr>
										<?php
										}
										?>
									<tfoot>
										<tr>
											<td colspan="10">
												<a href="cetak-laporan-pembayaran.php" target="_blank" class="btn btn-primary">Cetak</a>

											</td>
										</tr>
									</tfoot>
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