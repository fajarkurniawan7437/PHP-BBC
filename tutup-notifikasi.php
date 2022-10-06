<?php
include ('./koneksi.php');
mysql_query("DELETE FROM trx_notifikasi WHERE id ='$_GET[id]'");
header("LOCATION:index.php?menu=jadwal");
?>
