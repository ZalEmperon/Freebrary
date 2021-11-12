<?php
require "conn.php";
session_start();
if (isset($_POST["email"])) {
     $email = $_POST["email"];
     $password = $_POST["password"];
     $query = "  
      SELECT * FROM sessions
      WHERE email = '" . $email . "'  
      AND password = '" . $password . "'
      ";
     $result = mysqli_query($conn, $query);
     $num_row = mysqli_num_rows($result);
     $row = mysqli_fetch_array($result);
     if ($num_row > 0) {
          echo 'Yes';
          $_SESSION['username'] = $row['username'];
          $_SESSION['id_buku'] = $row['id_buku'];
          $_SESSION['status'] = $row['status'];
     } else {
          echo 'No';
     }
}
if (isset($_POST["action"])) {
     unset($_SESSION["username"]);
     session_destroy();
}
