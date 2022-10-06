<?php
include ('./koneksi.php');

if(isset($_SESSION['login_id_admin'])){
	header("location:login.php");
	exit;
}

$path = "upload/";
if($_GET['aksi'] == "ubah"){
	$nama = $_POST['nama'];
	$alamat = $_POST['alamat'];
	$no_telp = $_POST['no_telp'];
	$no_ktp = $_POST['no_ktp'];
	
	$namafile = $_FILES['file']['name'];
	$tmpname = $_FILES['file']['tmp_name'];
	
	if($tmpname != ""){
			move_uploaded_file($tmpname, $path.$namafile);
			mysql_query("update mst_siswa set nama='$nama', alamat='$alamat', no_telp='$no_telp',no_ktp='$no_ktp', foto='$namafile' where id=".$_POST['id']);
		}else{
			mysql_query("update mst_siswa set nama='$nama', alamat='$alamat', no_telp='$no_telp',no_ktp='$no_ktp' where id=".$_POST['id']);
		}
	
}else if($_GET['aksi'] == "hapus"){
	$id = $_GET['id'];
	mysql_query("delete from mst_siswa where id='$id'");

}


?>

<script>
window.location = 'index.php?menu=siswa';
</script>
