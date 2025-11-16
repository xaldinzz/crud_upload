<?php
$host = "localhost";
$user = "root";
$pass = ""; 
$db = "crud_upload"; // <-- PASTIKAN ini sesuai dengan nama DB Anda

$koneksi = mysqli_connect($host, $user, $pass, $db);

if (!$koneksi) {
  die("Koneksi gagal: " . mysqli_connect_error());
}
?>