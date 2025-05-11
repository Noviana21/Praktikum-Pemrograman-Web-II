<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "peminjaman_buku";

$koneksi = mysqli_connect($host, $username, $password, $database);

// if (!$koneksi) {
//     die("Koneksi gagal: " . mysqli_connect_error());
// } else {
//     echo "Koneksi berhasil";
// }