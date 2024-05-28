<?php
include '../include/config.php'; // Pastikan path ke config.php benar

// Cek apakah ID konten telah diberikan
if (isset($_GET['content_id'])) {
    $id = $_GET['content_id'];

    // Mengambil data konten dari database
    $sql = "SELECT * FROM movies_content WHERE content_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if (!$row) {
        echo "Data tidak ditemukan!";
        exit;
    }
} else {
    echo "ID tidak diberikan!";
    exit;
}

// Menghandle form submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $content_title = $_POST['content_title'];
    $content_movies = $_POST['content_movies'];
    $url_content = $_POST['url_content'];
    $content_photo = $_FILES['content_photo']['name'];

    // Update data ke database
    $sql = "UPDATE movies_content SET content_title=?, content_movies=?, url_content=?, content_photo=? WHERE content_id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssi", $content_title, $content_movies, $url_content, $content_photo, $id);
    if ($stmt->execute()) {
        echo "<script>alert('Data berhasil diupdate');window.location.href='admin.php';</script>";
    } else {
        echo "Error: " . $stmt->error;
    }
}
// Cek apakah form telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $content_photo = $_FILES['content_photo']['name'];

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
    $sql = "INSERT INTO movies_content (content_title, content_movies, url_content, content_photo) VALUES (?, ?, ?, ?)";

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'head.php'; ?>
</head>
<body>
    <?php include '../include/navbar.php'; ?>
    <div class="container">
        <h2>Edit Konten Film</h2>
        <form method="POST" action="edit.php?content_id=<?php echo $id; ?>" enctype="multipart/form-data">
            <div class="form-group">
                <label for="content_title">Judul Konten</label>
                <input type="text" class="form-control" id="content_title" name="content_title" value="<?php echo $row['content_title']; ?>" required>
            </div>
            <div class="form-group">
                <label for="content_movies">Film</label>
                <input type="text" class="form-control" id="content_movies" name="content_movies" value="<?php echo $row['content_movies']; ?>" required>
            </div>
            <div class="form-group">
                <label for="url_content">URL</label>
                <input type="text" class="form-control" id="url_content" name="url_content" value="<?php echo $row['url_content']; ?>" required>
            </div>
            <div class="form-group">
                <label for="content_photo">Foto</label>
                <input type="file" class="form-control" id="content_photo" name="content_photo" required>
                <img src="../assets/img/<?php echo $row['content_photo']; ?>" style="width: 100px;">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
    <?php include '../include/footer.php'; ?>
    <?php include 'script.php'; ?>
</body>
</html>