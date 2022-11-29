<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <link rel="stylesheet" href="../style.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
  <title>Profil Dokter</title>
</head>
<style>
  .card_img {
    display: block;
    margin-left: auto;
    margin-right: auto;
    width: 40%;
  }

  .profil {
    height: 200px;
    width: 100%;
    text-align: center;
    display: flex;
    flex-wrap: wrap;
  }

  .batas {
    width: 60%;
  }

  .card-batas {
    height: auto;

  }

  .main {
    display: flex;
    justify-content: center;
    font-size: 40px;
    font-family: 'roboto';
    align-items: center;
    color: rgb(231, 231, 231);
    background-color: #282A3A;
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
            <a class="nav-link dropdown-toggle text-white active" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Dokter
            </a>
            <ul class="dropdown-menu bg-dark">
              <li><a class="dropdown-item text-white disable" href="profil_dokter.php">Profil Dokter</a></li>
              <li><a class="dropdown-item text-white" href="jadwal_dokter.php">Jadwal Dokter</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link text-secondary" href="daftar_klinik.php">Klinik</a>
          </li>

        </ul>
      </div>
    </div>
  </nav>
  <div class="main" style="font-family: 'Poppins';">
    <div class="judul">
      <center>
        <h2 style="font-family: 'Poppins'; font-size: 40px; font-weight: medium;">DAFTAR PROFILE DOKTER</h2>
        <hr size="5px" width="20%" color="white" />
        <p style="font-family: 'Poppins';">Berikut merupakan daftar Dokter Puskesmas Charity</p>
      </center>
    </div>
    <div class="batas">
      <?php
      include '../connection/connection.php';
      $sql = "SELECT dokter.nip_dokter, dokter.nama, dokter.alamat, dokter.id_klinik, dokter.no_hp, klinik.nama_klinik
                    FROM dokter
                    INNER JOIN klinik ON klinik.id_klinik = dokter.id_klinik;";
      $myquery = mysqli_query($connect, $sql);
      while ($data_dokter = mysqli_fetch_array($myquery)) {
      ?>
        <center>
          <div class="card-batas card border-0 shadow rounded-3 overflow-hidden mt-3">
            <div class="card-body p-0 text-bg-secondary">
              <div class="row gx-0">
                <div class="col-lg-7 col-xl-7 py-lg-6">
                  <div class="p-2">
                    <div class="badge bg-primary bg-gradient rounded-pill mb-2 ms-5">
                      <img src="../assets/doctor.png" width="35px" alt="">
                      Profil Dokter
                    </div>
                    <table class="table ms-5 fs-5 text-white">
                      <tbody class="ms-1">
                        <tr>
                          <th scope="row">NIP</th>
                          <td>
                            <?= $data_dokter['nip_dokter'] ?>
                          </td>
                        </tr>
                        <tr>
                          <th scope="row">Nama</th>
                          <td><?= $data_dokter['nama'] ?></td>
                        </tr>
                        <tr>
                          <th scope="row">Alamat</th>
                          <td><?= $data_dokter['alamat'] ?></td>
                        </tr>
                        <tr>
                          <th scope="row">Spesialis</th>
                          <td><?= $data_dokter['nama_klinik'] ?></td>
                        </tr>
                        <tr>
                          <th scope="row">No Telp</th>
                          <td><?= $data_dokter['no_hp'] ?></td>
                        </tr>
                      </tbody>
                    </table>
                    <i class="bi bi-arrow-right"></i>
                    </a>
                  </div>
                </div>
                <div class="col-lg-5 col-xl-5">
                  <div class="bg-featured-blog mt-5">
                    <img src="../assets/profile_dokter.png" class="card_img" alt="...">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </center>
      <?php
      }
      ?>
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

</html>