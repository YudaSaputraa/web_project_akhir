<?php
session_start();
if (empty($_SESSION['username'])) {
    header("location:index.php?message=belum_login");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Edit Dokter</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</head>
<style>
    #tableklinik {

        border: 1px solid black;
        border-collapse: collapse;

    }

    .form-input {
        background-color: #0E5E6F;
        border-radius: 20px;
    }

    .main-right {
        background-color: #3A8891;
        border-radius: 20px;
        height: 400px;
    }

    ::placeholder {

        color: white !important;
        opacity: 1;

    }

    .dropdown-input {
        background-color: #3A8891;
    }
</style>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <img src="../assets/icon.png" width="35px" class="icon d-inline-block align-center ms-2 me-2" alt="">
        <a class="navbar-brand ps-1" href="dashboard.php">Admin Puskesmas</a>
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">

        </form>
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

                    <li><a class="dropdown-item" href="../operation/logout.php">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="admin-user row">
                    <center>
                        <img src="../assets/profile.png" width="100px" alt="">
                        <h6>Admin</h6>
                    </center>
                </div>
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Main Menu</div>
                        <a class="nav-link" href="dashboard.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <div class="sb-sidenav-menu-heading">Data</div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Input Data
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="input_dokter.php">Dokter</a>
                                <a class="nav-link" href="input_klinik.php">Klinik</a>
                            </nav>
                        </div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#viewData" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                            View Data
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="viewData" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="data_dokter.php">Data Dokter</a>
                                <a class="nav-link" href="data_klinik.php">Data Klinik</a>
                                <a class="nav-link" href="data_pasien.php">Data Pasien</a>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    Admin Puskesmas
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="main">
                    <div class="mt-3 w-100 container">
                        <h1 class="mt-4">Edit Data</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Edit_Dokter</li>
                            <hr size="2px" width="100%" color="black" />
                        </ol>

                        <div class="row container-fluid px4">
                            <div class="col-5">
                                <img src="../assets/dokter.png" height="400px" alt="dokter image">
                                <div class="warning text-center" style="font-size: 15px;">
                                </div>
                            </div>
                            <div class=" form-input col-7">
                                <form method="POST" action="../operation/edit_dokter_process.php">
                                    <center class="mt-4">
                                        <img src="../assets/checklist.png" width="50px" alt="">
                                        <a style="font-family: 'Poppins'; font-size:35px; color:white; font-weight:500;">Data Dokter
                                            <hr size="2px" width="100%" color="white" />
                                        </a>
                                        <?php
                                        include '../connection/connection.php';
                                        $nip_dokter = $_GET['nip_dokter'];
                                        $sql = "SELECT * FROM dokter WHERE nip_dokter = '$nip_dokter'";
                                        $query = mysqli_query($connect, $sql);
                                        $data_dokter = mysqli_fetch_array($query);
                                        ?>
                                        <h5 class="mb-3" style="color: white; font-family: 'Poppins'; ">Edit Biodata Dokter</h5>
                                        <input type="hidden" name="nip_dokter" value="<?= $data_dokter['nip_dokter'] ?>">
                                        <div class="main-right row p-4">
                                            <br>
                                            <div class="col">
                                                <input type="text" class="form-control bg-transparent text-white font-weight-normal" value="<?= $data_dokter['nama'] ?>" placeholder="Nama Dokter" name="nama_dokter">
                                            </div>
                                            <div class="col">
                                                <input type="text" class="form-control bg-transparent  text-white font-weight-normal" value="<?= $data_dokter['nip_dokter'] ?>" placeholder="NIP Dokter" name="nip_dokter" disabled>
                                            </div>
                                            <div class="col mb-3">
                                                <input type="text" class="form-control bg-transparent text-white font-weight-normal" placeholder="No.Hp Dokter" value=" <?= $data_dokter['no_hp'] ?>" name="nohp_dokter">
                                            </div>
                                            <br>
                                            <div class="mb-3">
                                                <input type="text" class="form-control bg-transparent text-white font-weight-normal" placeholder="Alamat Dokter" value=" <?= $data_dokter['alamat'] ?>" name="alamat_dokter">

                                            </div>
                                            <p class="text-white" style="font-size : 20px; margin-bottom: -5px;">Jam Kerja</p>
                                            <div class=" col">
                                                <p class="text-white" style="font-size : 15px; margin-bottom: -13px;">Jam Mulai</p>
                                                <input type="time" class="form-control bg-transparent text-white font-weight-normal mt-3 mb-3" name="jam_mulai" value="<?= $data_dokter['jam_mulai'] ?>" required="">

                                            </div>
                                            <div class=" col">
                                                <p class="text-white" style="font-size : 15px; margin-bottom: -13px;">Jam Selesai</p>
                                                <input type="time" class="form-control bg-transparent text-white font-weight-normal mt-3 mb-3" name="jam_selesai" value="<?= $data_dokter['jam_selesai'] ?>" required="">

                                            </div>
                                            <div class="mb-3">
                                                <select class="dropdown-input form-select text-white font-weight-normal " name="dropdown_klinik" aria-label="Default select example">
                                                    <option selected>Spesialis</option>
                                                    <?php
                                                    include '../connection/connection.php';

                                                    $mysql = "SELECT * FROM klinik";
                                                    $query = mysqli_query($connect, $mysql);
                                                    while ($data_klinik = mysqli_fetch_array($query)) {
                                                    ?>
                                                        <option value="<?= $data_klinik['id_klinik'] ?>" <?= $data_dokter['id_klinik'] == $data_klinik['id_klinik'] ? "selected" : ""; ?>><?= $data_klinik['nama_klinik'] ?> - <?= $data_klinik['alamat_klinik'] ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col">
                                                <a class="text-white col" href="#">
                                                    <button class="w-100 btn btn-success text-white font-weight-normal">Submit</button>
                                                </a>
                                            </div>
                                            <div class="text-white col">
                                                <input type="reset" class="w-100 btn btn-secondary text-white font-weight-normal" value="Reset">
                                            </div>
                                        </div>
                                    </center>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">&copy; copyright 2022 by anonymous</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>

</body>

</html>