<?php
require "conn.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<!--CSS & FONT-->

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

<body id="beranda">

  <!--HEADER / NAVBAR-->
  <nav class="navbar navbar-expand-lg navbar-light bg-primary bg-gradient shadow sticky-top">
    <div class="container">
      <a class="navbar-brand" href="index.php"><img src="assets/img/Freebraryflat.svg" height="50" width="50"><span class="fw-bold h2 align-middle text-white"> Freebrary</span></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active text-white" aria-current="page" href="#beranda">Beranda</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="#buku">Buku</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" data-bs-toggle="modal" data-bs-target="#modalAbout">Tentang Kami</a>
          </li>

          <!--PROFIL LOGIN / REGISTER-->
          <li class="nav-item dropdown">
            <!--SUDAH LOGIN-->
            <?php if (isset($_SESSION['username'])) { ?>
              <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <?php echo $_SESSION['username']; ?> - <?php echo $_SESSION['status']; ?>
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" id="logout" name="logout">Logout</a></li>
              </ul>
              <!--BELUM LOGIN-->
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

  <!--ISI-->
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

  <!--BUKU & SEARCH-->
  <div class="container">
    <h1 class="fw-bold text-center display-5" id="buku">Buku-Buku</h1>
    <form class="d-flex mb-4" action="" method="POST">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" id="search">
    </form>
    <?php
    if (!isset($_SESSION['status']) || ($_SESSION['status'] != "Admin")) { ?>
      <br>
    <?php } else { ?>
      <Button class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#modalTambah">Tambah Buku</Button><br><br>
    <?php } ?>
    <div class="row mx-auto mb-5" id="tampil">
      <?php
      $hasil = mysqli_query($conn, "SELECT * FROM buku ORDER BY id_buku ASC");
      while ($value = mysqli_fetch_assoc($hasil)) : ?>
        <div class="col-md-3 me-2 my-1 bg-light rounded shadow details col-5" data-id="<?php echo $value['id_buku']; ?>" data-bs-toggle="modal" data-bs-target="#modalDetail">
          <img src="bookimg/<?php echo $value['gambar'] ?>" width="100%" height="250px" class="my-3 rounded shadow d-inline-block mx-auto">
          <h6 class="fw-bold"><?php echo $value['judul'] ?></h6>
          <h6><?php echo $value['pengarang'] ?></h6>
        </div>
      <?php endwhile; ?>
    </div>
  </div>

  <!--FOOTER-->
  <div class="bg-primary bg-gradient">
    <footer class="d-flex flex-wrap justify-content-evenly align-items-center py-3 mt-4 border-top container">
      <p class="col-md-4 mb-0 fw-bolder">© 2021 Freebrary ID</p>
      <a href="javascript:void(0)" class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
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

  <!--ISI MODAL-->
  <div>
    <!--MODAL TENTANG-->
    <div class="modal fade" id="modalAbout" data-bs-keyboard="false" tabindex="-1">
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

    <!--MODAL LOGIN-->
    <div class="modal fade" id="modalLogin" tabindex="-1">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header headernocenter" style="background-image: url(assets/img/login_image.jpg);height:200px;width:100.1%;background-repeat: no-repeat;">
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body container">
            <h5 class="text-center fw-bold">LOGIN</h5>

            <!--F O R M L O G I N-->
            <form id="formlogin">
              <div class="mb-2">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input type="email" class="form-control form-control-sm" id="email" name="email" placeholder="bambangjuan">
              </div>
              <div class="mb-2">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control form-control-sm" id="password" name="password" placeholder="Password">
              </div>
              <div class="d-flex justify-content-between">
                <button type="button" class="btn btn-success my-2" data-bs-dismiss="modal" id="tblLogin" name="tblLogin">Login</button><br>
                <p class="text-reset my-auto h7">Belum mempunyai akun?<br><a class="text-primary fw-bold h7" href="" data-bs-toggle="modal" data-bs-target="#modalRegister">Buat Akun</a></p>
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>

    <!--MODAL REGISTER-->
    <div class="modal fade" id="modalRegister" tabindex="-1">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header headernocenter" style="background-image: url(assets/img/register_image.jpg);height:200px;width:100.1%;">
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body container">
            <h5 class="text-center fw-bold">REGISTER</h5>

            <!--F O R M R E G I S T E R-->
            <form action="" method="POST" id="formRegister">
              <div class="mb-2">
                <label for="exampleInputEmail1" class="form-label">Username</label>
                <input type="text" class="form-control form-control-sm" id="usernameregister" name="usernameregister" placeholder="Masukan Username">
              </div>
              <div class="mb-2">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control form-control-sm" id="emailregister" name="emailregister" placeholder="Masukan Alamat Email">
              </div>
              <div class="mb-2">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control form-control-sm" id="passwordregister" name="passwordregister" placeholder="Masukan Password">
              </div>
              <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-success my-2" data-bs-dismiss="modal" id="register">Register!</button><br>
                <p class="text-reset my-auto h7">Sudah mempunyai akun?<br><a class="text-warning fw-bold h7" href="" data-bs-toggle="modal" data-bs-target="#modalLogin">Login Sekarang</a></p>
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>

    <!--MODAL TAMBAH-->
    <div class="modal fade" id="modalTambah" tabindex="-1">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-body container">
            <button type="button" class="btn-close float-end" data-bs-dismiss="modal" aria-label="Close"></button><br><br>
            <h5 class="text-center fw-bold">TAMBAH DATA</h5>

            <!--F O R M T A M B A H-->
            <form action="" method="POST" id="formTambah" enctype="multipart/form-data">
              <div class="mb-2">
                <label class="form-label">Gambar Buku</label>
                <input type="file" class="form-control form-control-sm" id="gambaradd" name="gambaradd">
              </div>
              <div class="mb-2">
                <label class="form-label">Judul Buku</label>
                <input type="text" class="form-control form-control-sm" id="juduladd" name="juduladd" placeholder="Masukan Judul Buku">
              </div>
              <div class="mb-2">
                <label class="form-label">Pengarang</label>
                <input type="text" class="form-control form-control-sm" id="pengarangadd" name="pengarangadd" placeholder="Masukan Pengarang">
              </div>
              <div class="mb-2">
                <label class="form-label">Penerbit</label>
                <input type="text" class="form-control form-control-sm" id="penerbitadd" name="penerbitadd" placeholder="Masukan Penerbit">
              </div>
              <div class="mb-2">
                <label class="form-label">Genre</label>
                <input type="text" class="form-control form-control-sm" id="genreadd" name="genreadd" placeholder="Masukan Genre">
              </div>
              <button type="submit" class="btn btn-success my-2" data-bs-dismiss="modal" id="tambah">Tambah</button><br>
            </form>

          </div>
        </div>
      </div>
    </div>

    <!--MODAL EDIT-->
    <div class="modal fade" id="modalEdit" tabindex="-1">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-body container">
            <h5 class="text-center fw-bold">EDIT DATA</h5>

            <!--FORM EDIT-->
            <form action="" method="POST" id="formEdit" enctype="multipart/form-data">
              <input name="id" type="hidden" id="id"/>
              <div class="mb-2">
                <label class="form-label">Gambar Buku</label>
                <input type="file" class="form-control form-control-sm" id="gambaredit" name="gambaredit">
              </div>
              <div class="mb-2">
                <label class="form-label">Judul Buku</label>
                <input type="text" class="form-control form-control-sm" id="juduledit" name="juduledit" placeholder="Edit Judul Buku">
              </div>
              <div class="mb-2">
                <label class="form-label">Pengarang</label>
                <input type="text" class="form-control form-control-sm" id="pengarangedit" name="pengarangedit" placeholder="Edit Pengarang">
              </div>
              <div class="mb-2">
                <label class="form-label">Penerbit</label>
                <input type="text" class="form-control form-control-sm" id="penerbitedit" name="penerbitedit" placeholder="Edit Penerbit">
              </div>
              <div class="mb-2">
                <label class="form-label">Genre</label>
                <input type="text" class="form-control form-control-sm" id="genreedit" name="genreedit" placeholder="Edit Genre">
              </div>
              <button type="submit" class="btn btn-success my-2" data-bs-dismiss="modal" id="edit">Edit Data</button><br>
            </form>

          </div>
        </div>
      </div>
    </div>

    <!--MODAL DETAIL-->
    <div class="modal fade" id="modalDetail" tabindex="-1">
      <div class="modal-dialog">
        <div class="modal-content" id="data-buku">

        </div>
      </div>
    </div>
  </div>

  <!--SCRIPT & AJAX-->
  <script src="assets/js/sweetalert.js"></script>
  <script src="assets/js/bootstrap.js"></script>
  <script src="assets/js/jquery.js"></script>
  <script>
    $(document).ready(function() {

      // LOGIN
      $('#tblLogin').click(function() {
        var email = $('#email').val();
        var password = $('#password').val();
        if (email != '' && password != '') {
          $.ajax({
            url: "login.php",
            method: "POST",
            data: {
              email: email,
              password: password
            },
            success: function(datalogin) {
              if (datalogin == 'No') {
                Swal.fire({
                  icon: 'error',
                  title: 'Oops...',
                  text: 'Email Atau Password Salah'
                })
                $('#formlogin').trigger("reset");
              } else {
                Swal.fire({
                  icon: 'success',
                  title: 'Berhasil Login',
                  showCancelButton: false,
                  showConfirmButton: false
                })
                setTimeout(function() {
                  location.reload();
                }, 1500);
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

      // LOGOUT
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

      // DETAIL
      $('.details').click(function() {
        var id_buku = $(this).data("id")
        $.ajax({
          url: "detail.php",
          method: "POST",
          data: {
            id_buku: id_buku
          },
          success: function(data) {
            $("#data-buku").html(data)
            $("#modalDetail").modal('show')
          }
        });
      });

      // SEARCH
      $('#search').on('keyup', function() {
        $.ajax({
          type: 'POST',
          url: 'search.php',
          data: {
            search: $('#search').val()
          },
          success: function(data) {
            $('#tampil').html(data)
          }
        });
      });

      //TAMBAH DATA
      $('#formTambah').on("submit", function(event) {
        event.preventDefault();
        if ($('#juduladd').val() == "" || $('#penerbitadd').val() == "" || $('#pengarangadd').val() == "" || $('#gambaradd').val() == "" || $('#genreadd').val() == "") {
          Swal.fire({
            icon: 'error',
            text: 'Lengkapi Semua Data!'
          });
          $('#formTambah').trigger("reset");
        } else {
          const gambar = $('#gambaradd').prop('files')[0];
          const judul = $('#juduladd').val();
          const pengarang = $('#pengarangadd').val();
          const penerbit = $('#penerbitadd').val();
          const genre = $('#genreadd').val();
          let formTambah = new FormData();
          formTambah.append('gambaradd', gambar);
          formTambah.append('juduladd', judul);
          formTambah.append('pengarangadd', pengarang);
          formTambah.append('penerbitadd', penerbit);
          formTambah.append('genreadd', genre);
          $.ajax({
            url: "tambah.php",
            method: "POST",
            data: formTambah,
            cache: false,
            processData: false,
            contentType: false,
            success: function() {
              $('#formTambah')[0].reset();
              $('#modalTambah').modal('hide');
              location.reload();
            }
          });
        }
      });

      //REGISTER
      $('#formRegister').on("submit", function(event) {
        event.preventDefault();
        if ($('#usernameregister').val() == "" || $('#emailregister').val() == "" || $('#passwordregister').val() == "") {
          Swal.fire({
            icon: 'error',
            text: 'Lengkapi Semua Data!'
          });
        } else {
          $.ajax({
            url: "register.php",
            method: "POST",
            data: $('#formRegister').serialize(),
            beforeSend: function() {
              $('#register').val("Inserting");
            },
            success: function() {
              Swal.fire({
                icon: 'success',
                title: 'Akun Berhasil dibuat, Silahkan Login',
                showCancelButton: false,
                showConfirmButton: false
              })
              setTimeout(function() {
                $('#formRegister')[0].reset();
                $('#modalRegister').modal('hide');
                location.reload();
              }, 2000);
            }
          });
        }
      });

      //UPDATE
      $('#formEdit').on("submit", function(event) {
        event.preventDefault();
        if ($('#juduledit').val() == "" || $('#penerbitedit').val() == "" || $('#pengarangedit').val() == "" || $('#genreedit').val() == "") {
          Swal.fire({
            icon: 'error',
            text: 'Lengkapi Semua Data!'
          });
          $('#formEdit').trigger("reset");
        } else {
          const id = $("input[name='id']").val();
          // console.log(id);
          // throw Error("Tes error")
          const gambar = $('#gambaredit').prop('files')[0];
          const judul = $('#juduledit').val();
          const pengarang = $('#pengarangedit').val();
          const penerbit = $('#penerbitedit').val();
          const genre = $('#genreedit').val();
          let formEdit = new FormData();
          formEdit.append('id', id);
          formEdit.append('gambaredit', gambar);
          formEdit.append('juduledit', judul);
          formEdit.append('pengarangedit', pengarang);
          formEdit.append('penerbitedit', penerbit);
          formEdit.append('genreedit', genre);
          $.ajax({
            url: "update.php",
            method: "POST",
            data: formEdit,
            cache: false,
            processData: false,
            contentType: false,
            success: function() {
              $('#modalEdit').modal('hide');
              location.reload();
            }
          });
        }
      });
    });
  </script>
</body>

</html>