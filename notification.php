<?php include('./koneksi.php');
  session_start();
  if(empty($_SESSION['username'])){ }else{
  $sql_notifikasi = mysql_query("SELECT * FROM trx_notifikasi WHERE username = '$_SESSION[username]' AND status = '1'");
  $num_notifikasi = mysql_num_rows($sql_notifikasi);
  if($num_notifikasi > 0){
    while ($row = mysql_fetch_array($sql_notifikasi)) {

?>
  <div class="alert alert-info" style="position: fixed;
    z-index: 9999; right:0; bottom: 10px;">
    <strong>Notifikasi!</strong> <?= $row['pesan']?> pada <?= $row['created_at'] ?>, <a href="tutup-notifikasi.php?id=<?= $row['id']; ?>"><b>Lihat jadwal anda..</b></a>.
  </div>
<?php     # code...
  }
}else{ } } ?>
