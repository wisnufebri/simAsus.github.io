<?php
include('/opt/lampp/htdocs/simAsus/config.php');

$rma = $_POST['rma'];
$posisi_rak  = $_POST['posisi_rak'];
$memo  = $_POST['memo'];

$id = $_POST['id'];

$sql = "UPDATE customer SET rma='$rma', posisi_rak = '$posisi_rak', memo ='$memo' WHERE id= '$id'";

if (mysqli_query($mysqli, $sql)) {
    header("location: halaman-teknisi.php?page=posts");
} else {
    echo "Gagal Update Data $sql. " . mysqli_error($mysqli);
}
mysqli_close($link);