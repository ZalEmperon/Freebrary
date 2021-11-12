<?php
  include "conn.php" ;
  $username = $_POST['usernameregister'];
  $email = $_POST['emailregister'];
  $password = $_POST['passwordregister'];
  $status = 'User';

  $query = "INSERT INTO sessions (email, username, password, status) VALUES ('$email', '$username', '$password', '$status');";
  mysqli_query($conn,$query);
?>
