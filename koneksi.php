<?php
$host = "localhost";
$user = "root"; // sesuaikan dengan user database Anda
$password = ""; // sesuaikan dengan password database Anda
$database = "inventaris";

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
