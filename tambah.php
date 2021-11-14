<?php
  include "conn.php" ;
if(!isset($_POST['juduladd'])){
  header("Location: index.php");
  exit;
}

  $judul = $_POST['juduladd'];
  $pengarang = $_POST['pengarangadd'];
  $penerbit = $_POST['penerbitadd'];
  $genre = $_POST['genreadd'];
  
  $nama_gambar = $_FILES['gambaradd']['name'];
  $sumber = $_FILES['gambaradd']['tmp_name'];
  $ekstension = pathinfo($nama_gambar, PATHINFO_EXTENSION);
  $gambarbaru = "{$judul}-".date('dmYHis').".{$ekstension}";
  $pathfile = './bookimg/'.$gambarbaru;
  $pindah = move_uploaded_file($sumber, $pathfile);
  
  // var_dump($pathfile, $pindah);
  // die;

  $query = "INSERT INTO buku (judul, pengarang, penerbit, gambar, genre) VALUES ('$judul', '$pengarang', '$penerbit', '$gambarbaru','$genre');";
  mysqli_query($conn,$query);
?>
! 
