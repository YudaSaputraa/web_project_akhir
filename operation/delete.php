
<?php
if (isset($_GET['nip_dokter'])) {
    include '../connection/connection.php';
    $nip_dokter = $_GET['nip_dokter'];

    $sql = mysqli_query($connect, "DELETE FROM dokter WHERE nip_dokter = $nip_dokter");
    if ($sql) {
        header("location:../admin/data_dokter.php");
        die();
    } else {
        header("location:../pages/input_lab.php?message=hapus_gagal");
    }
} else if (isset($_GET['id_klinik'])) {
    include '../connection/connection.php';
    $id_klinik = $_GET['id_klinik'];

    $sql = mysqli_query($connect, "DELETE FROM klinik WHERE id_klinik = $id_klinik");
    if ($sql) {
        header("location:../admin/data_klinik.php");
        die();
    } else {
        header("location:../pages/input_lab.php?message=hapus_gagal");
    }
}
