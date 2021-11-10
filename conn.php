<?php
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "perpus";    

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if($conn) {
} else {
    echo "Koneksi Gagal! : ". mysqli_connect_error();
}

?>