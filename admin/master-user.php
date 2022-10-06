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

				<li class="active">Data User</li>
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
								Tabel Daftar User
							</div>

							<!-- div.table-responsive -->

							<!-- div.dataTables_borderWrap -->
							<div>
								<table id="dynamic-table" class="table table-striped table-bordered table-hover">
									<thead>
										<tr>
											<th>No</th>
											<th>Id User</th>
											<th>Username</th>
											<th>Password</th>
											<th class="hidden-480">Aksi</th>
										</tr>
										<tr>
											<th colspan="5">
												<a href="index.php?menu=form-user">Tambah Baru</a>
											</th>
										</tr>
									</thead>

									<tbody>
										<?php
										$query = "select * from mst_user";
										$data = mysql_query($query) or die(mysql_error());
										$no = 0;
										while ($row = mysql_fetch_array($data)) {
											$no++;
										?>
											<tr>
												<td><?php echo $no; ?></td>
												<td><?php echo $row['id_usr']; ?></td>
												<td><?php echo $row['username']; ?></td>
												<td><?php echo $row['password']; ?></td>
												<td>
													<div class="hidden-sm hidden-xs action-buttons">
														<a class="green" href="?menu=form-user&id=<?php echo $row['id_usr']; ?>&aksi=ubah">
															<i class="ace-icon fa fa-pencil bigger-130"></i>
														</a>
														<a class="red" href="proses-user.php?aksi=hapus&id=<?php echo $row['id_usr']; ?>">
															<i class="ace-icon fa fa-trash-o bigger-130"></i>
														</a>
													</div>

													<div class="hidden-md hidden-lg">
														<div class="inline pos-rel">
															<button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
																<i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
															</button>
															<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
																<li>
																	<a href="#" class="tooltip-info" data-rel="tooltip" title="View">
																		<span class="blue">
																			<i class="ace-icon fa fa-search-plus bigger-120"></i>
																		</span>
																	</a>
																</li>
																<li>
																	<a href="#" class="tooltip-success" data-rel="tooltip" title="Edit">
																		<span class="green">
																			<i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
																		</span>
																	</a>
																</li>

																<li>
																	<a href="#" class="tooltip-error" data-rel="tooltip" title="Delete">
																		<span class="red">
																			<i class="ace-icon fa fa-trash-o bigger-120"></i>
																		</span>
																	</a>
																</li>
															</ul>
														</div>
													</div>
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