
<?php
if (isset($_GET['nip_dokter'])) {
    include '../connection/connection.php';
    $nip_dokter = $_GET['nip_dokter'];

    $sql = mysqli_query($connect, "DELETE FROM dokter WHERE nip_dokter = $nip_dokter");
    if ($sql) {
        header("location:../admin/data_dokter.php");
        die();
    } else {
        header("location:../admin/data_dokter.php?message=hapus_gagal");
    }
} else if (isset($_GET['id_klinik'])) {
    include '../connection/connection.php';
    $id_klinik = $_GET['id_klinik'];

    $sql = mysqli_query($connect, "DELETE FROM klinik WHERE id_klinik = $id_klinik");
    if ($sql) {
        header("location:../admin/data_klinik.php");
        die();
    } else {
        header("location:../admin/data_klinik.php?message=hapus_gagal");
    }
} else if (isset($_GET['id_pasien'])) {
    include '../connection/connection.php';
    $id_pasien = $_GET['id_pasien'];

    $sql = mysqli_query($connect, "DELETE FROM pasien WHERE id_pasien = $id_pasien");
    if ($sql) {
        header("location:../admin/data_pasien.php");
        die();
    } else {
        header("location:../admin/data_pasien?message=hapus_gagal");
    }
}
