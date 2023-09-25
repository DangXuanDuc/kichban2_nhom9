<?php
  $servername = "localhost";
  $user = "root";
  $pass = "";
  $dbname = "users";
  $connect = mysqli_connect($servername, $user, $pass,$dbname) or die('Không thể kết nối đến Database!');

  if ($connect === false) {
    die("Không thể kết nối đến Database!" . mysqli_connect_error());
  }
?>