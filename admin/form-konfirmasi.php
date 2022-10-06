<?php include('./koneksi.php');

$id = "";
$id_daftar ="";
$tanggal = "";
$biaya = "";
$no_rek = "";
$atas_nama = "";
$status = "";
$id_user = "";



if(isset($_GET['kode'])){
	$data = mysql_query("select a.*, b.* from trx_konfirmasi a, mst_siswa b where a.id_user=b.id and a.id=".$_GET['kode']."") or die(mysql_error());
	while($row = mysql_fetch_array($data)){
		$id = $row['id'];
		$id_daftar = $row['id_daftar'];
		$tanggal = $row['tanggal'];
		$biaya  = $row['biaya'];
		$no_rek  = $row['no_rek'];
		$atas_nama  = $row['atas_nama'];
		$status  = $row['status'];
		$id_user  = $row['nama'];
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

							<li class="active">Data Konfirmasi Pembayaran</li>
						</ul><!-- /.breadcrumb -->

						
					</div>

					<div class="page-content">
						
						<div class="row">
							<div class="col-xs-12">
					<div class="row">
        <div class="col-xs-12">
            <!-- PAGE CONTENT BEGINS -->
           <h3>Form Data Konfirmasi Pembayaran</h3><br>
           <?php $action = "tambah";
		   	if(isset($_GET['aksi']))
			{
				$action = $_GET['aksi'];
				}
		   ?>
            <form class="form-horizontal" role="form" action="proses-konfirmasi.php?aksi=<?php echo $action ?>" method="post">
             
                        <input type="hidden" id="form-field-1" placeholder="id" class="col-xs-10 col-sm-5" name="id" value = "<?php echo $id?>"/>
                
				<div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Kode Pendaftaran </label>

                    <div class="col-sm-9">
                        <input type="text" id="form-field-1" placeholder="Kode Daftar" class="col-xs-10 col-sm-5" name="id_daftar" value="<?php echo $id_daftar;?>" />
                        
                    </div>
                </div>
				 
				<div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nama Siswa </label>

                    <div class="col-sm-9">
                    	<select id="form-field-1" class="col-xs-10 col-sm-5" name="id_user" >
                        	<option>Nama Siswa</option>
                            <?php $query = mysql_query("select * from mst_siswa");
								while($row = mysql_fetch_array($query)){
							?>
                            <option value="<?php echo $row['id']?>" <?php if($id_user==$row['nama']){ echo "selected";}?>><?php echo $row['nama'];?></option>
                            <?php } ?>

                        </select>
                        
                    </div>
                </div>
                
                 
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tanggal </label>

                    <div class="col-sm-9">
                        <input type="text" id="form-field-1" placeholder="Format YYYY-mm-dd" class="col-xs-10 col-sm-5" name="tanggal" value="<?php echo $tanggal;?>" />
                        
                    </div>
                </div>

				<div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Jumlah Transfer</label>

                    <div class="col-sm-9">
                        <input type="text" id="form-field-1" placeholder="Jumlah Transfer" class="col-xs-10 col-sm-5" name="biaya" value="<?php echo $biaya;?>" />
                    </div>
                </div>
				
				<div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nomor Rekening</label>

                    <div class="col-sm-9">
                        <input type="text" id="form-field-1" placeholder="Nomor Rekening" class="col-xs-10 col-sm-5" name="no_rek" value="<?php echo $no_rek;?>" />
                    </div>
                </div>
				
				<div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Nama Rekening</label>

                    <div class="col-sm-9">
                        <input type="text" id="form-field-1" placeholder="Nama Rekening" class="col-xs-10 col-sm-5" name="atas_nama" value="<?php echo $atas_nama;?>" />
                    </div>
                </div>
				
				<div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Status </label>

                    <div class="col-sm-9">
                    	<select id="form-field-1" class="col-xs-10 col-sm-5" placeholder="Status Daftar" name="status" >
                        	<option>Status Pendaftaran</option>
                            <option value="Request" <?php if($status=="Request"){ echo "selected";}?>>Request</option>
                            <option value="Confirm" <?php if($status=="Confirm"){ echo "selected";}?>>Confirm</option>
							<option value="Reject" <?php if($status=="Reject"){ echo "selected";}?>>Reject</option>
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

    
							
								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->
