

<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "pw2024_tubes_233040135";

// Membuat koneksi
$conn = new mysqli($host, $username, $password, $database);

// Mengecek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
