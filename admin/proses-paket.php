<?php
include ('./koneksi.php');

if($_GET['aksi'] == "tambah"){

	$sql = "select max(id_paket) as id_paket from mst_paket limit 1";
	$qry_user = mysql_query($sql);
	$result = mysql_fetch_array($qry_user);
	if (!$result) {
		$id_paket = 'PKT001';
	} else {
		$id_paket = $result['id_paket'];
		$id_paket = substr($id_paket, 4, 6);
		$id_paket = (int) $id_paket + 1;
		$id_paket = 'PKT'.sprintf('%03d', $id_paket);
	}
	
	$nama = $_POST['nama'];
	$deskripsi = $_POST['deskripsi'];
	$biaya = $_POST['biaya'];
	$pertemuan = $_POST['pertemuan'];
	$query = mysql_query("INSERT INTO mst_paket VALUES ('$id_paket','$nama','$deskripsi','$biaya','$pertemuan')");

}else if($_GET['aksi'] == "ubah"){
	$id = $_POST['id'];
	$nama = $_POST['nama'];
	$deskripsi = $_POST['deskripsi'];
	$biaya = $_POST['biaya'];
	$pertemuan = $_POST['pertemuan'];

	mysql_query("UPDATE mst_paket SET pertemuan = '$pertemuan', nama='$nama', deskripsi= '$deskripsi', biaya='$biaya' where id_paket='$id'");

}else if($_GET['aksi'] == "hapus"){
	$id = $_GET['id'];
	mysql_query("DELETE FROM mst_paket WHERE id_paket='$id'");

}

header("location:index.php?menu=paket");
