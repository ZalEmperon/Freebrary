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
  <title>Print</title>
</head>

<body>
  <?php
  $id = ($_GET["id_buku"]);
  $hasil = mysqli_query($conn, "SELECT * FROM buku WHERE id_buku='$id'");
  while ($row = mysqli_fetch_array($hasil)) {
  ?>
    <div class="container my-5">
      <div class="card">
        <div class="card-header text-muted"></div>
        <div class="card-body text-center">
          <h3 class="text-center mt-2"><b><?php echo $row['judul']; ?></b></h3>
          <img src="gambar/<?php echo $row['gambar'] ?>" class="card-img-top border" alt="gambar" style="height: 20%; width: 20%;">
          <h5 class="text-center mt-2"><b><?php echo $row['pengarang']; ?></b></h5>
          <h6 div class="text-center mt-2"><i><?php echo $row['penerbit']; ?></i></h6>
          <p div class="text-center mt-3"><?php echo $row['sinopsis']; ?></p>
        </div>
        <div class="card-footer text-muted"></div>
      </div>
    </div>
  <?php
  }
  ?>
  <script>
    window.print();
  </script>
</body>

</html>