<?php
include "conn.php";
session_start();
if(isset($_POST['id'])){
  $id = $_POST['id'];
  $selectimg = "SELECT * FROM buku WHERE id_buku ='$id'";
  $hasil = mysqli_query($conn,$selectimg);
  $fetch = mysqli_fetch_assoc($hasil);
  $fetchnamaimg = $fetch['gambar'];
  $pathimg = "./bookimg/".$fetchnamaimg;
  if(unlink($pathimg)){
    $query = "DELETE FROM buku WHERE id_buku ='$id'";
    mysqli_query($conn, $query);
  }else{
    $displayErrMessage = "Gambar Tidak Terhapus";
  }
}
?>