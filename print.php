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

<body class="bodyprint rounded bg-primary">
  <?php
  $id = ($_GET["id_buku"]);
  $hasil = mysqli_query($conn, "SELECT * FROM buku WHERE id_buku='$id'");
  while ($row = mysqli_fetch_array($hasil)) {
  ?>
    <div class="mx-auto my-5 bg-light rounded shadow" style="width: 90%;">
      <div class="container">
        <h1 class="text-center py-2 display-5 fw-bold"><?php echo $row['judul']; ?></h1>
        <img src="bookimg/<?php echo $row['gambar'] ?>" class="border mx-auto d-block my-3 shadow" alt="gambar" height="400px" width="45%">
        <h2 class="ms-5 d-block pt-3 fw-bold">Pengarang :<?php echo $row['pengarang']; ?></h2><br>
        <h2 class="ms-5 d-block">Penerbit : <?php echo $row['penerbit']; ?></h2><br>
        <h2 class="ms-5 pb-5 d-block">Genre : <?php echo $row['genre']; ?></h2>
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