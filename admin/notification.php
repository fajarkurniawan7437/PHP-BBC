<?php include('./koneksi.php');
  session_start();
  $sql_notifikasi = mysql_query("SELECT * FROM trx_notifikasi_admin WHERE status = '1'");
    while ($row = mysql_fetch_array($sql_notifikasi)) {
?>
  <div class="alert alert-info" style="position: fixed;
    z-index: 9999; right:0; bottom: 10px;">
    Notifikasi! <?= $row['pesan']?>. <strong><a href='tutup-notifikasi.php?id=<?= $row['id']; ?>'>Lihat..</a></strong>
  </div>
<?php     # code...
  }
?>
