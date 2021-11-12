<?php
include "conn.php";
session_start();
$id = $_POST['id'];
$query = "DELETE FROM buku WHERE id_buku ='$id'";
mysqli_query($conn, $query);
?>