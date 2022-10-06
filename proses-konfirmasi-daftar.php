<?php
include('./koneksi.php');
session_start();
$msg = "gagal";
if (isset($_POST['btn_konfirmasi'])) {
	$bulan = date('m');
	$tahun = date('Y');
	$bulan_tahun = $bulan . $tahun;

	$prefix = "BBC" . $bulan_tahun;


	$sql = "select id_daftar from trx_daftar where substr(id_daftar,1,9)='$prefix' order by id_daftar desc limit 1";

	$qry_daftar = mysql_query($sql);
	$result = mysql_fetch_array($qry_daftar);
	if (!$result) {
		$id_daftar = 'BBC' . $bulan_tahun . '001';
	} else {
		$id_daftar = $result['id_daftar'];
		$id_daftar = substr($id_daftar, 10, 12);
		$id_daftar = (int) $id_daftar + 1;
		$id_daftar = 'BBC' . $bulan_tahun . sprintf('%03d', $id_daftar);
	}

	$id_siswa = $_POST['id_siswa'];
	$tanggal = date("Y-m-d");
	$status = "Daftar";
	$id_paket = $_POST['id_paket'];
	$jenis_pembayaran = $_POST['jenis_pembayaran'];
	$biaya_kursus = $_POST['biaya_kursus'];
	$biaya_daftar = 100000;

	$sql = "insert into trx_daftar values ('$id_daftar','$id_siswa','$tanggal','$status','$id_paket','$jenis_pembayaran','$biaya_kursus','$biaya_daftar')";
	$query = mysql_query($sql);
	if ($query) {
		$msg = "Berhasil melakukan pendaftaran";
		$link = "index.php?menu=form-daftar&id=$id_daftar&aksi=ubah";
		$pesan = $_SESSION['login_user'] . ' telah melakukan pembokingan';
		mysql_query("INSERT INTO trx_notifikasi_admin SET pesan='$pesan', link = '$link'");

		header("location:index.php?menu=riwayat-daftar&message=Pendaftaran berhasil dengan ID: $id_daftar");
	} else {
?>
		<div class="row">
			<div class="col-xs-12">
				<!-- PAGE CONTENT BEGINS -->
				<div class="alert alert-block alert-error">
					<strong class="red">
						Pendaftaran gagal... <a href="index.php">Kembali</a>
					</strong>,
				</div>
			</div>
		</div>
<?php

	}




	/*
*/
}
?>