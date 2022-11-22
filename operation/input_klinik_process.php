<?php
include '../connection/connection.php';
$nama = $_POST['nama_klinik'];
$alamat = $_POST['alamat_klinik'];
$deskripsi = $_POST['deskripsi'];

$mysql = "INSERT INTO klinik VALUES (id_klinik,'$nama', '$alamat', '$deskripsi')";
$query = mysqli_query($connect, $mysql) or die(mysqli_error($connect));

if ($query) {
    header("location:../admin/input_klinik.php");
} else {
    echo "Input Eror";
}
