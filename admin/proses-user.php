<?php
include('./koneksi.php');

if(isset($_SESSION['login_id_admin'])){
	header("location:login.php");
	exit;
}

if ($_GET['aksi'] == "tambah") {
	$sql = "select max(id_usr) as id_usr from mst_user limit 1";
	$qry_user = mysql_query($sql);
	$result = mysql_fetch_array($qry_user);
	if (!$result) {
		$id_usr = 'ADMBBC01';
	} else {
		$id_usr = $result['id_usr'];
		$id_usr = substr($id_usr, 7, 8);
		$id_usr = (int) $id_usr + 1;
		$id_usr = 'ADMBBC'.sprintf('%02d', $id_usr);
	}
	$username = $_POST['username'];
	$password = $_POST['password'];

	mysql_query("insert into mst_user value('$id_usr','$username', '$password')");
} else if ($_GET['aksi'] == "ubah") {
	$id_usr = $_POST['id_usr'];
	$nama = $_POST['nama'];
	$username = $_POST['username'];
	$password = $_POST['password'];


	mysql_query("update mst_user set username= '$username', password='$password' where id=$id_usr");
} else if ($_GET['aksi'] == "hapus") {
	$id = $_GET['id'];
	mysql_query("delete from mst_user where id_usr='$id'");

}


?>

<script>
	window.location = 'index.php?menu=user';
</script>