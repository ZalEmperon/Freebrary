<?php  
include 'conn.php';
if(isset($_POST["id_buku"]))  
 {  
      $id_buku = $_POST['id_buku'];
      $query = "SELECT * FROM buku WHERE id_buku = '$id_buku'";  
      $result = mysqli_query($conn, $query);  
      $row = mysqli_fetch_array($result);  
      echo json_encode($row);  
 }  
 ?>