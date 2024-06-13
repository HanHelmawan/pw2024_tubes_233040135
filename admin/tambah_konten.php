<?php
include '../include/config.php'; // Pastikan path ke config.php benar

// Cek apakah form telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $content_title = $_POST['content_title'];
    $content_movies = $_POST['content_movies'];
    $url_content = $_POST['url_content'];
    $content_photo = $_FILES['content_photo']['name'];
    $admin_id = $_POST['admin_id'];

     // Handle file upload
    if (is_uploaded_file($_FILES['content_photo']['tmp_name'])) {
        $target_dir = "../assets/img/";
        $target_file = $target_dir . basename($_FILES['content_photo']['name']);
        if (move_uploaded_file($_FILES['content_photo']['tmp_name'], $target_file)) {
            echo "<script>alert('File " . $_FILES['content_photo']['name'] . " upload berhasil.');</script>";
        } else {
            echo "<script>alert('upload gagal');</script>";
        }
    } else {
        echo "Possible file upload attack: filename '". $_FILES['content_photo']['tmp_name'] . "'.";
    }

    // Query untuk insert data
    $sql = "INSERT INTO movies_content (content_title, content_movies, url_content, content_photo, admin_id) VALUES ('$content_title', '$content_movies', '$url_content', '$content_photo', '$admin_id')";
    if ($conn->query($sql) === TRUE) {
        echo "Data Ditambahkan";
        header("Location: admin.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Tutup koneksi
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'head.php'; ?>
</head>
<body>
    <?php include '../include/navbar.php'; ?>
    <div class="container">

       <h2 style="padding-top: 20px;"><mark style="background-color: #011c3c; color:white;">Tambah Konten Film</mark></h2>

     <div style="padding-top: 20px;">
    <a href="./admin.php" class="btn btn-warning">Kembali ke halaman admin</a>
    </div>

        <form method="POST" action="tambah_konten.php" enctype="multipart/form-data">
            <div class="form-group" style="padding-top: 20px;">
                <label for="content_title" style="color: white; font-size: large; font-weight: 700;">Judul Konten</label>
                <input type="text" class="form-control" id="content_title" name="content_title" required>
            </div>
            <div class="form-group">
                <label for="content_movies" style="color: white; font-size: large; font-weight: 700;">Deskripsi Konten</label>
                <input type="text" class="form-control" id="content_movies" name="content_movies" required>
            </div>
            <div class="form-group">
                <label for="url_content" style="color: white; font-size: large; font-weight: 700;">URL</label>
                <input type="text" class="form-control" id="url_content" name="url_content" required>
            </div>
            <div class="form-group">
                <label for="content_photo" style="color: white; font-size: large; font-weight: 700;">Foto</label>
                 <input type="file" class="form-control" id="content_photo" accept="image/jpg, image/png, image/jpeg" name="content_photo" required>
            </div>
             <div class="form-group">
                <label for="admin_id" style="color: white; font-size: large; font-weight: 700;">Admin Id</label>
                <input type="text" class="form-control" id="admin_id" name="admin_id" required>
            </div>
            <button type="submit" class="btn btn-primary" style="margin-top: 10px;">Tambah</button>
        </form>
    </div>
    <?php include '../include/footer.php'; ?>
    <?php include 'script.php'; ?>
</body>
</html>