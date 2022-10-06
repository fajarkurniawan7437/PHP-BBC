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

				<li class="active">Data Pendaftaran</li>
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
								Tabel Pendaftaran
							</div>
							<!-- div.table-responsive -->
							<!-- div.dataTables_borderWrap -->

							<div clas>
								<table id="dynamic-table" class="table table-striped table-bordered table-hover">
									<thead>
										<tr>
											<th>No</th>
											<th>Nama Siswa</th>
											<th>Paket</th>
											<th>Tanggal</th>
											<th>Biaya</th>
											<th>Pembayaran</th>
											<th>Sisa</th>
											<th>Status</th>
											<th class="hidden-480">Aksi</th>
										</tr>
										<tr>
											<th colspan="9">
												<form class="form-inline" action="proses-laporan-daftar.php" method="post"> 
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

										if(isset($_SESSION['tgl1'])){
											$tgl1 = $_SESSION['tgl1'];
											$tgl2 = $_SESSION['tgl2'];

											$sql = "select mst_siswa.*, mst_paket.nama as nama_paket, trx_daftar.* from trx_daftar 
											inner join mst_siswa on mst_siswa.id_siswa=trx_daftar.id_siswa 
											inner join mst_paket on trx_daftar.id_paket=mst_paket.id_paket 
											where trx_daftar.tanggal between '$tgl1' and '$tgl2'";

										}else{
											$sql = "select mst_siswa.*, mst_paket.nama as nama_paket, trx_daftar.* from trx_daftar inner join mst_siswa on mst_siswa.id_siswa=trx_daftar.id_siswa inner join mst_paket on trx_daftar.id_paket=mst_paket.id_paket";

										}
										$query = mysql_query($sql);
										while ($result = mysql_fetch_array($query)) {
											$biaya = $result['biaya_kursus'] + $result['biaya_daftar'];
											$id_daftar = $result['id_daftar'];

											$sql = "select sum(jumlah_bayar) as total from trx_pembayaran where id_daftar='$id_daftar' AND status='Sudah Konfirmasi'";
											$qry_bayar = mysql_query($sql);
											$result_bayar = mysql_fetch_array($qry_bayar);
											$total_bayar  = $result_bayar['total'];
											$sisa = $biaya - $total_bayar;
										?>
											<tr>
												<td><?php echo $result['id_daftar']; ?></td>
												<td><?php echo $result['nama']; ?></td>
												<td><?php echo $result['id_paket'] . "-" . $result['nama_paket']; ?></td>
												<td><?php echo $result['tanggal']; ?></td>
												<td align='right'><?php echo number_format($biaya); ?></td>
												<td align='right'><?php echo number_format($total_bayar); ?></td>
												<td align='right'><?php echo number_format($sisa); ?></td>
												<?php if ($result['status'] == 'Batal') : ?>
													<td><label class="badge badge-danger">Dibatalkan</label></td>
													<td></td>
												<?php else : ?>
													<?php if ($sisa > 0) : ?>
														<td><label class="badge badge-danger">Belum Lunas</label></td>
														<td>
															<a href="proses-daftar.php?aksi=batal&id=<?= $result['id_daftar'] ?>" class="btn btn-sm btn-warning">Batalkan</a>
														</td>
													<?php else : ?>
														<td><label class="badge badge-info">Sudah Lunas</label></td>
														<td></td>
													<?php endif; ?>
												<?php endif; ?>

											</tr>
										<?php
										}
										?>
                                        <tfoot>
                                            <tr>
                                                <td colspan="9">
                                                    <a href="cetak-laporan-daftar.php" target="_blank" class="btn btn-primary">Cetak</a>

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