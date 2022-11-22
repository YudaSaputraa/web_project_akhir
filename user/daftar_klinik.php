<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <link rel="stylesheet" href="../style.css">
  <title>Profil Dokter</title>
</head>
<style>
  .card_img {
    display: block;
    margin-left: auto;
    margin-right: auto;
    width: 90%;
  }

  .profil {
    height: 200px;
    width: 100%;
    text-align: center;
    display: flex;
    flex-wrap: wrap;
  }

  .content-klinik {
    width: 400px;
  }

  .button-bottom {
    position: relative;
    display: flex;
    justify-content: flex-end;
    align-items: center;
    bottom: 0;

  }

  .batas {
    width: 70%;
  }

  .card-radius {
    border-radius: 10px;
  }

  .card-deskripsi {
    background-color: #3A8891;
    border-radius: 10px;
    padding: 10px;
    height: auto;
  }
</style>

<body>
  <nav class="navbar navbar-expand-lg ">
    <div class="container-fluid ">
      <a class="navbar-brand text-white" href="#">
        <img src="../assets/icon.png" class="icon d-inline-block align-center ms-2 me-2" alt="">
        Puskesmas Charity
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link text-secondary" aria-current="page" href="../index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-secondary" href="pendaftaran.php">Pendaftaran</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-secondary" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Dokter
            </a>
            <ul class="dropdown-menu bg-dark">
              <li><a class="dropdown-item text-white" href="profil_dokter.php">Profil Dokter</a></li>
              <li><a class="dropdown-item text-white" href="jadwal_dokter.php">Jadwal Dokter</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white active" href="daftar_klinik.php">Klinik</a>
          </li>
        </ul>

      </div>
    </div>
  </nav>
  <div class="main">
    <div class="judul">
      <center>
        <h2>DAFTAR KLINIK</h2>
        <hr size="5px" width="20%" color="white" />
        <p>Berikut merupakan daftar klinik yang ada di Puskesmas Charity</p>
      </center>
    </div>
    <div class="batas">
      <center>
        <?php
        include '../connection/connection.php';
        $sql = "SELECT * FROM klinik";
        $myquery = mysqli_query($connect, $sql);
        while ($data_klinik = mysqli_fetch_array($myquery)) {
        ?>
          <div class="card-radius row gx-4 gx-lg-5 p-4 align-items-center my-5" style="background-color: #D6E4E5;">
            <div class="col-lg-6"><img class="card_img img-fluid rounded mb-4 mb-lg-0" src="../assets/klinikk.png" alt="..." /></div>
            <div class="card-deskripsi col-lg-6">
              <h1 class="font-weight-light"><?= $data_klinik['nama_klinik'] ?></h1>
              <p>[<?= $data_klinik['alamat_klinik'] ?>]</p>
              <p><?= $data_klinik['deskripsi_klinik'] ?></p>
              <a class="btn btn-primary" href="pendaftaran.php?id_klinik=<?= $data_klinik['id_klinik'] ?>">Booking!</a>
            </div>
          </div>
        <?php
        }
        ?>
      </center>
    </div>
  </div>

  <footer class="bg-dark py-4 mt-auto">
    <div class="container px-5">
      <div class="row align-items-center justify-content-between flex-column flex-sm-row">
        <div class="col-auto">
          <div class="small m-0 text-white">&copy; copyright 2022 by anonymous</div>
        </div>
        <div class="col-auto">
          <a class="link-light small" href="#!">Privacy</a>
          <span class="text-white mx-1">&middot;</span>
          <a class="link-light small" href="#!">Terms</a>
          <span class="text-white mx-1">&middot;</span>
          <a class="link-light small" href="#!">Contact</a>
        </div>
      </div>
    </div>
  </footer>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>

</html>