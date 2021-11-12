<?php
  include "conn.php" ;
  $judul = $_POST['juduladd'];
  $pengarang = $_POST['pengarangadd'];
  $penerbit = $_POST['penerbitadd'];

  $query = "INSERT INTO buku (judul, pengarang, penerbit) VALUES ('$judul', '$pengarang', '$penerbit');";
  mysqli_query($conn,$query);
?>
