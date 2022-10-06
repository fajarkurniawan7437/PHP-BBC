<?php include('./koneksi.php'); ?>
<div class="main-content">
	<div class="main-content-inner">
		<div class="breadcrumbs ace-save-state" id="breadcrumbs">
			<ul class="breadcrumb">
				<li>
					<i class="ace-icon fa fa-home home-icon"></i>
					<a href="#">Home</a>
				</li>

				<li class="active">Paket Kursus</li>
			</ul><!-- /.breadcrumb -->


		</div>

		<div class="page-content">

			<div class="row">
				<div class="col-xs-12">
					<!-- PAGE CONTENT BEGINS -->
					<div class="hr hr-18 dotted hr-double"></div>
					<?php
					$query = "select * from mst_paket ";
					$data = mysql_query($query) or die(mysql_error());
					$no = 0;
					while ($row = mysql_fetch_array($data)) {
						$no++;
					?>
						<div class="col-xs-12 col-sm-4 widget-container-col" id="widget-container-col-3">
							<div class="widget-box" id="widget-box-4">
								<div class="widget-header widget-header-large">
									<h5 class="widget-title"><?php echo $row['nama']; ?> Rp. <?php echo number_format($row['biaya']); ?></h5>

									<div class="widget-toolbar">
										<a href="index.php?menu=daftar&id_paket=<?php echo $row['id_paket']; ?> ">Pilih paket</a>
									</div>
								</div>

								<div class="widget-body">
									<div class="widget-main">

										<table id="dynamic-table" class="table table-bordered table-hover">
											<tr>
												<td align="center">Deskripsi Paket</td>
											</tr>
											<tr>
												<td><?php echo $row['deskripsi']; ?></td>
											</tr>
											<tr>
												<td align="center">Biaya</td>
											</tr>
											<tr>
												<td>Rp. <?php echo number_format($row['biaya']); ?></td>
											</tr>
										</table>

									</div>
								</div>
							</div>
						</div>
					<?php } ?>




					<!-- PAGE CONTENT ENDS -->
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.page-content -->
	</div>
</div><!-- /.main-content -->
