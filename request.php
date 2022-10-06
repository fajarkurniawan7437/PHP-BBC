<?php
include ('./koneksi.php');

$msg = "gagal";
$id = $_GET['id'];
if($_GET['aksi'] == "cancel"){
	
	mysql_query("update  trx_jadwal set status='Request Cancel' where id=".$id);
$msg = "sukses";

}else{
	mysql_query("update  trx_jadwal set status='Ready' where id=".$id);
}

?>


<script>
window.location = 'index.php?menu=jadwal&msg=<?php echo $msg;?>';
</script>
