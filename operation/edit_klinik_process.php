<?php
include '../connection/connection.php';
$id_klinik = $_POST['id_klinik'];
$nama_klinik = $_POST['nama_klinik'];
$alamat_klinik = $_POST['alamat_klinik'];
$deskripsi = $_POST['deskripsi'];

$sql = "UPDATE klinik SET nama_klinik = '$nama_klinik', alamat_klinik = '$alamat_klinik', deskripsi_klinik = '$deskripsi' WHERE id_klinik = '$id_klinik'";
$query = mysqli_query($connect, $sql) or die(mysqli_error($connect));
if ($query) {
    header("location:../admin/data_klinik.php");
} else {
    echo "Update data gagal, silahkan mencoba kembali dan terus mencoba";
}
