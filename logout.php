<?php
session_start(); // Memulai session

// Menghapus semua variabel session
session_unset();

// Menghancurkan session
session_destroy();

// Mengarahkan ke halaman utama setelah logout
header("Location: index.php");
exit;
?>