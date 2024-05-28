<?php
include '../include/config.php'; // Pastikan path ini sesuai dengan lokasi file koneksi Anda

// Mendapatkan user_id dari URL
$content_id = isset($_GET['content_id']) ? $_GET['content_id'] : '';

// Mengecek apakah user_id tidak kosong
if (!empty($content_id)) {
    // Query untuk menghapus user berdasarkan user_id
    $query = "DELETE FROM movies_content WHERE content_id = ?";
    
    // Mempersiapkan statement untuk eksekusi
    $stmt = mysqli_prepare($conn, $query);
    
    // Mengikat parameter ke statement
    mysqli_stmt_bind_param($stmt, "i", $content_id);
    
    // Menjalankan statement
    if (mysqli_stmt_execute($stmt)) {
        echo "Content berhasil dihapus.";
    } else {
        echo "Error: " . mysqli_stmt_error($stmt);
    }
    
    // Menutup statement
    mysqli_stmt_close($stmt);
} else {
    echo "ID content tidak ditemukan.";
}

// Mengarahkan kembali ke halaman utama
header("Location: admin.php");
exit();
?>