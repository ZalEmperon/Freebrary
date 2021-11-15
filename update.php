<?php
include "conn.php" ;
if (isset($_POST['id'])){
  $id = $_POST['id'];
  $judul = $_POST['juduledit'];
  $pengarang = $_POST['pengarangedit'];
  $penerbit = $_POST['penerbitedit'];
  $genre = $_POST['genreedit'];
  
  // var_dump();
  // die;
  if(file_exists($_FILES['gambaredit']['tmp_name'])){
    $nama_gambar = $_FILES['gambaredit']['name'];
    $sumber = $_FILES['gambaredit']['tmp_name'];
    $ekstension = pathinfo($nama_gambar, PATHINFO_EXTENSION);
    $gambarbaru = "{$judul}-".date('dmYHis').".{$ekstension}";
    $pathfile = './bookimg/'.$gambarbaru;
    $pindah = move_uploaded_file($sumber, $pathfile);
    $query = "UPDATE buku SET gambar='$gambarbaru' WHERE id_buku = '$id'";
    mysqli_query($conn,$query);
  }

  $query = "UPDATE buku SET judul='$judul', pengarang='$pengarang', penerbit='$penerbit', genre='$genre' WHERE id_buku = '$id'";
  mysqli_query($conn,$query);
}else{
  header("Location: index.php");
  exit;
}
?>
