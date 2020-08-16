<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "simAsus";
//$koneksi = mysqli_connect("localhost","root","","simAsus");
$koneksi = mysqli_connect($host,$user,$password,$database);
// Check connection
if (mysqli_connect_errno()){
    echo "Koneksi database gagal : " . mysqli_connect_error();
}

?>