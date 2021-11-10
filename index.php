<?php
require "conn.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/css/bootstrap.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Titillium+Web&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
  <link rel="icon" href="assets/img/Freebraryflat.svg">
  <title>Freebrary</title>
</head>

<body>

  <!--H E A D E R / N A V B A R-->
  <nav class="navbar navbar-expand-lg navbar-light bg-primary bg-gradient shadow sticky-top">
    <div class="container">
      <a class="navbar-brand" href="index.php"><img src="assets/img/Freebraryflat.svg" height="50" width="50"><span class="fw-bold h2 align-middle text-white"> Freebrary</span></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active text-white" aria-current="page" href="index.php">Beranda</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="#buku">Buku</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" data-bs-toggle="modal" data-bs-target="#modalAbout">Tentang Kami</a>
          </li>

          <!--L O G I N / R E G I S T E R / P R O F I L-->
          <li class="nav-item dropdown">
            <!--S U D A H L O G I N-->
            <?php if (isset($_SESSION['username'])) { ?>
              <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <?php echo $_SESSION['username']; ?> - <?php echo $_SESSION['status']; ?>
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" id="logout" name="logout">Logout</a></li>
              </ul>
              <!--B E L U M L O G I N-->
            <?php } else { ?>
              <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Masuk
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalLogin">Login</a></li>
                <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalRegister">Register</a></li>
              </ul>
            <?php } ?>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!--I  S I-->
  <div class="p-2 mb-4 rounded-3">
    <div class="container py-5">
      <div class="row">
        <div class="col-sm-5">
          <img src="assets/img/Book.jpg" alt="" width="100%" height="auto">
        </div>
        <div class="col-sm-7">
          <h1 class="display-5 fw-bold">Buku Terbaik</h1>
          <p class="col-md-8 fs-4">Lihat dan Dapatkan bermacam macam buku yang anda sukai. Tersedia berbagai buku dengan banyak genre terbaru</p>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <h1 class="fw-bold text-center display-5" id="buku">Buku-Buku</h1>
    <form class="d-flex mb-4" action="" method="GET">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="buku">
      <button class="btn btn-outline-primary" type="submit"><i class="fas fa-search"></i></button>
    </form>
    <?php
    if (!isset($_SESSION['status'])) { ?>
      <br>
    <?php } elseif ($_SESSION['status'] != "User") { ?>
      <Button class="btn btn-warning mb-3">Tambah Buku</Button>
    <?php } ?>
    <div class="row justify-content-evenly">
      <?php
      if (isset($_GET['buku'])) {
        $buku = $_GET['buku'];
        $hasil = mysqli_query($conn, "SELECT * FROM buku WHERE judul LIKE '%{$buku}%'");
      } else {
        $hasil = mysqli_query($conn, "SELECT * FROM buku ORDER BY id_buku ASC");
      }
      while ($value = mysqli_fetch_assoc($hasil)) : ?>
        <div class="col-sm-2 m-2 p-3 bg-info rounded col-5">
          <p><?php echo $value['judul'] ?></p>
          <p><?php echo $value['pengarang'] ?></p>
          <p><?php echo $value['penerbit'] ?></p>
        </div>
      <?php endwhile; ?>
    </div>
  </div>

  <!--F O O T E R-->
  <div class="bg-primary bg-gradient">
    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 mt-4 border-top container">
      <p class="col-md-4 mb-0 fw-bolder">© 2021 Freebrary ID</p>
      <a href="index.php" class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
        <img src="assets/img/Freebraryflat.svg" height="80" width="80">
      </a>
      <ul class="nav col-md-4 justify-content-end">
        <li class="nav-item"><a href="#" class="nav-link px-2 text-dark fw-bold">Home</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2 text-dark fw-bold">Features</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2 text-dark fw-bold">Pricing</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2 text-dark fw-bold">About</a></li>
      </ul>
    </footer>
  </div>

  <div class=" I S I M O D A L ">
    <!--M O D A L T E N T A N G-->
    <div class="modal fade" id="modalAbout" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-body text-center headernocenter">
            <button type="button" class="btn-close float-end" data-bs-dismiss="modal" aria-label="Close"></button><br><br>
            <img class="mx-auto" src="assets/img/Freebrary2.png" alt="Gambar Freebrary" height="200" width="200">
            <h2 class="fw-bold align-middle text-dark">Freebrary</h2>
            <p class="text-justify indentabout">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Mollitia provident amet tempora sit cum odio? Explicabo eius praesentium inventore. Doloribus dolorum deleniti reiciendis, nesciunt officia id vel beatae dolores sapiente adipisci, nisi necessitatibus quisquam voluptates omnis est inventore distinctio expedita quos explicabo qui laboriosam harum, officiis ea aut? Ex, temporibus.</p>
          </div>
        </div>
      </div>
    </div>
    <!--M O D A L L O G I N-->
    <div class="modal fade" id="modalLogin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header headernocenter" style="background-image: url(assets/img/login_image.jpg);height:200px;width:100.1%;background-repeat: no-repeat;">
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body container">
            <h5 class="text-center fw-bold">LOGIN</h5>

            <!--F O R M L O G I N-->
            <form action="index.php" method="POST">
              <div class="mb-2">
                <label for="exampleInputEmail1" class="form-label">Username</label>
                <input type="text" class="form-control form-control-sm" id="username" name="username" placeholder="bambangjuan">
              </div>
              <div class="mb-2">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control form-control-sm" id="password" name="password" placeholder="Password">
              </div>
              <button type="button" class="btn btn-success my-2" data-bs-dismiss="modal" id="tblLogin" name="tblLogin">Login</button><br>
            </form>

          </div>
        </div>
      </div>
    </div>

    <!--M O D A L R E G I S T E R-->
    <div class="modal fade" id="modalRegister" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header headernocenter" style="background-image: url(assets/img/register_image.jpg);height:200px;width:100.1%;">
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body container">
            <h5 class="text-center fw-bold">REGISTER</h5>

            <!--F O R M R E G I S T E R-->
            <form action="" method="POST">
              <div class="mb-2">
                <label for="exampleInputEmail1" class="form-label">Username</label>
                <input type="email" class="form-control form-control-sm" id="usernameregister" name="usernameregister" placeholder="Masukan Username">
              </div>
              <div class="mb-2">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control form-control-sm" id="emailregister" name="emailregister" placeholder="Masukan Alamat Email">
              </div>
              <div class="mb-2">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control form-control-sm" id="passwordregister" name="passwordregister" placeholder="Masukan Password">
              </div>
              <button type="button" class="btn btn-success my-2" data-bs-dismiss="modal">Login</button><br>
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="assets/js/bootstrap.js"></script>
  <script src="assets/js/jquery.js"></script>
  <script>
    $(document).ready(function() {
      $('#tblLogin').click(function() {
        var username = $('#username').val();
        var password = $('#password').val();
        if (username != '' && password != '') {
          $.ajax({
            url: "login.php",
            method: "POST",
            data: {
              username: username,
              password: password
            },
            success: function(data) {
              if (data.success == 'No') {
                Swal.fire({
                  icon: 'error',
                  title: 'Oops...',
                  text: 'Email Atau Password Salah'
                })
              } else {
                location.reload();
              }
            }
          });
        } else {
          Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Isi Password dan Email!'
          })
        }
      });
      $('#logout').click(function() {
        var action = "logout";
        $.ajax({
          url: "login.php",
          method: "POST",
          data: {
            action: action
          },
          success: function() {
            location.reload();
          }
        });
      });
    });
  </script>
</body>

</html>