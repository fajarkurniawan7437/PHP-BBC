<?php
include ('./koneksi.php');

if(isset($_SESSION['login_id_admin'])){
	header("location:login.php");
	exit;
}

if($_POST['aksi'] == "tambah"){
	$nama_kelas = $_POST['nama_kelas'];
    $id_siswa= $_POST['id_siswa'];
    $arr_daftar= $_POST['id_daftar'];

	mysql_query("insert into mst_kelas values (0,'$nama_kelas')");

    $sql = "select max(kode_kelas) as kode_kelas from mst_kelas limit 1";
	$query = mysql_query($sql);
	$result= mysql_fetch_array($query);

	$kode = (int) $result['kode_kelas'];

    for($i=0;$i< count($id_siswa); $i++){
        $id = $id_siswa[$i];
        $id_daftar = $arr_daftar[$i];
		
		//echo $id;

        mysql_query("insert into mst_kelas_detail values ($kode,'$id')");
        mysql_query("update trx_daftar set status='Dapat Kelas' where id_daftar='$id_daftar'");
    }

}

if($_GET['aksi']=='hapus'){
    $kode = $_GET['kode'];
    mysql_query("delete from mst_kelas where kode_kelas='$kode'");

}
header('location:index.php?menu=kelas');
