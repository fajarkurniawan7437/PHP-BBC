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
										</tr>
									</thead>

									<tbody>
										<?php
										$sql = "select mst_siswa.*, mst_paket.nama as nama_paket, trx_daftar.id_paket, trx_daftar.biaya_kursus, trx_daftar.biaya_daftar, trx_pembayaran.* 
										from trx_daftar 
										inner join mst_siswa on mst_siswa.id_siswa=trx_daftar.id_siswa 
										inner join mst_paket on trx_daftar.id_paket=mst_paket.id_paket
										inner join trx_pembayaran on trx_daftar.id_daftar=trx_pembayaran.id_daftar where trx_pembayaran.status='Sudah Konfirmasi'";

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