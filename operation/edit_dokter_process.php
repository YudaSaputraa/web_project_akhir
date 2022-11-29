<?php
include '../connection/connection.php';
$nip_dokter = $_POST['nip_dokter'];
$nama = $_POST['nama_dokter'];
$alamat = $_POST['alamat_dokter'];
$jam_mulai = $_POST['jam_mulai'];
$jam_selesai = $_POST['jam_selesai'];
$no_hp = $_POST['nohp_dokter'];
$klinik = $_POST['dropdown_klinik'];

$sql = "UPDATE dokter SET nama = '$nama', alamat = '$alamat', jam_mulai = '$jam_mulai', jam_selesai = '$jam_selesai', id_klinik = '$klinik', no_hp = '$no_hp' WHERE nip_dokter = '$nip_dokter'";
$query = mysqli_query($connect, $sql) or die(mysqli_error($connect));
if ($query) {
    header("location:../admin/data_dokter.php");
} else {
    echo "Update data gagal, silahkan mencoba kembali dan terus mencoba";
}
