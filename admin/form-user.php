<?php

include('./koneksi.php');
if (isset($_GET['id'])) {
	$data = mysql_query("select * from mst_user where id_usr='" . $_GET['id'] . "'") or die(mysql_error());
	$row = mysql_fetch_array($data);

	$id_usr = $row['id_usr'];
	$username = $row['username'];
	$password  = $row['password'];
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
				<li class="active">Data User</li>
			</ul><!-- /.breadcrumb -->
		</div>
		<div class="page-content">
			<div class="row">
				<div class="col-xs-12">
					<div class="row">
						<div class="col-xs-12">
							<!-- PAGE CONTENT BEGINS -->
							<h3>Form Data User</h3><br>
							<?php $action = "tambah";
							if (isset($_GET['aksi'])) {
								$action = $_GET['aksi'];
							}
							?>
							<form class="form-horizontal" role="form" action="proses-user.php?aksi=<?php echo $action ?>" method="post">
								<input type="hidden" placeholder="id" class="col-xs-10 col-sm-5" name="id" value="<?php echo $id_usr ?>" />
								<?php
								if (isset($_GET['aksi'])) :
									if ($_GET['aksi'] == 'ubah') :

								?>
										<div class="form-group">
											<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> ID User </label>
											<div class="col-sm-9">
												<input type="text" readonly placeholder="Id User" class="col-xs-10 col-sm-5" name="id_usr" value="<?php echo $id_usr; ?>" />
											</div>
										</div>
								<?php
									endif;
								endif;
								?>
								<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Username </label>
									<div class="col-sm-9">
										<input type="text" placeholder="Username" class="col-xs-10 col-sm-5" name="username" value="<?php echo $username; ?>" />
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Password</label>
									<div class="col-sm-9">
										<input type="text" placeholder="Password" class="col-xs-10 col-sm-5" name="password" value="<?php echo $password; ?>" />
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