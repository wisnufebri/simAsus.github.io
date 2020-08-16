<?php
include('/opt/lampp/htdocs/simAsus/config.php');
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$pekerjaan = $_POST['pekerjaan'];

mysql_query("INSERT INTO karyawan VALUES('','$nama','$alamat','$pekerjaan')");

header("location:karyawan.php?pesan=input");
?>