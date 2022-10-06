<?php
session_start();
include('./koneksi.php');

$email = $_POST['email'];
$password = $_POST['password'];

$bulan = date('m');
$tahun = date('y');
$bulan_tahun = $bulan . $tahun;

$sql = "select id_siswa from mst_siswa where substr(id_siswa,4,7)='$bulan_tahun' order by id_siswa desc limit 1";

$qry_siswa = mysql_query($sql);
$result = mysql_fetch_array($qry_siswa);
if (!$result) {
	$id_siswa = '001' . $bulan_tahun;
} else {
	$id_siswa = $result['id_siswa'];
	$id_siswa = substr($id_siswa,0,3);
	$id_siswa = (int) $id_siswa+1;
	$id_siswa = sprintf('%03d', $id_siswa ).$bulan_tahun;
	
}

$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$no_telp = $_POST['no_telp'];
$no_ktp = $_POST['no_ktp'];

$namafile = $id_siswa.".jpg";
$tmpname = $_FILES['file']['tmp_name'];
$path = "admin/upload/";

$sql = "insert into mst_siswa values ('$id_siswa','$nama','$email',md5('$password'),'$alamat','$no_telp','$no_ktp','$namafile')";

$result = mysql_query($sql);
move_uploaded_file($tmpname, $path.$namafile);

header("location: login.php");
