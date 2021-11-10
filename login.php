<?php  
require "conn.php";
 session_start(); 
 if(isset($_POST["username"]))  
 {  
     $username = $_POST["username"];  
     $password = $_POST["password"];
      $query = "  
      SELECT * FROM sessions
      WHERE username = '".$username."'  
      AND password = '".$password."'
      ";  
      $result = mysqli_query($conn, $query); 
      $num_row = mysqli_num_rows($result); 
      if($num_row > 0) 
      {  
          $row = mysqli_fetch_array($result);
          $_SESSION['username'] = $row['username'];
          $_SESSION['id'] = $row['id'];
          $_SESSION['status'] = $row['status'];
          echo 'Yes';  
      }  
      else  
      {  
           echo 'No';  
      }  
 }  
 if(isset($_POST["action"]))  
 {  
      unset($_SESSION["username"]);
      session_destroy();
 }
