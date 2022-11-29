<?php
include '../connection/connection.php';
$nama = $_POST['nama_dokter'];
$nohp = $_POST['nohp_dokter'];
$nip_dokter = $_POST['nip_dokter'];
$jam_mulai = $_POST['jam_mulai'];
$jam_selesai = $_POST['jam_selesai'];
$alamat = $_POST['alamat_dokter'];
$klinik = $_POST ['dropdown_klinik'];

$mysql = "INSERT INTO dokter VALUES ('$nip_dokter','$nama', '$alamat', '$jam_mulai', '$jam_selesai', '$klinik', '$nohp')";
$query = mysqli_query($connect, $mysql) or die (mysqli_error($connect));

if($query){
    header("location:../admin/input_dokter.php");
}else{
    echo "Input Eror";
}


?>