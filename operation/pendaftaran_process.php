<?php
include '../connection/connection.php';
$nama = $_POST['nama'];
$nohp = $_POST['noHp'];
$alamat = $_POST['alamat'];
$klinik = $_POST['dropdown_klinik'];
$dokter = $_POST['dropdown_dokter'];

$mysql = "INSERT INTO pasien VALUES (id_pasien, '$nama', '$nohp', '$alamat', '$klinik', '$dokter')";
$query = mysqli_query($connect, $mysql) or die(mysqli_error($connect));

if ($query) {
    header("location:../user/pendaftaran.php");
} else {
    echo "Input Eror";
}
