<?php
// Koneksi ke database MySQL
$host     = "localhost";
$user     = "root";
$password = "";               // default XAMPP kosong
$database = "toko_online";

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}