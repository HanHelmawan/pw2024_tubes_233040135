<?php 
include '../include/config.php'; // Pastikan path ke config.php benar
$search = isset($_GET["search"]) ? $_GET["search"] : null;
session_start();

$search = isset($_GET['search']) ? $_GET['search'] : '';
$sort = isset($_GET['sort']) ? $_GET['sort'] : '';

// Dasar kueri SQL
$sql = "SELECT content_id, content_title, content_movies, url_content, content_photo FROM movies_content";

// Menambahkan pencarian jika ada
if ($search) {
    $sql .= " WHERE content_title LIKE '%$search%'";
}
                
                $sql = "SELECT content_id, content_title, content_movies, url_content, content_photo FROM movies_content";
                if ($search) {
                $sql .=" WHERE content_title LIKE '%$search%'";
                }
                // Menambahkan sortir jika ada
                switch ($sort) {
                    case 'content_id_asc':
                        $sql .= " ORDER BY content_id ASC";
                        break;
                    case 'content_title_asc':
                        $sql .= " ORDER BY content_title ASC"; // Misalkan 'username_user_asc' mengacu pada judul konten
                        break;
                    case 'content_title_desc':
                        $sql .= " ORDER BY content_title DESC"; // 'username_name_desc' juga mengacu pada judul konten
                        break;
                    default:
                        // Default sortir jika diperlukan
                        $sql .= " ORDER BY content_id ASC";
                        break;
                }
                $result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <?php include 'head.php' ?>
</head>
<body>
    <?php include '../include/navbar.php'?>
<div class="container-fluid">
        <h2 style="padding-top: 20px;"><mark style="background-color: #011c3c; color:white;">Konten Film</mark></h2>
    <div style="padding-top: 20px;">
    <a href="tambah_konten.php" class="btn btn-danger">Tambah Konten</a>
    <a href="./kelola_user.php" class="btn btn-warning">Kelola User</a>
    </div>

    <div class="table-responsive" style="padding-top: 20px;">

    <select id="sortingSelect" name="sort" onchange="applySort()">
        <option value="content_id_asc" <?php if ($sort == 'content_id_asc') echo 'selected'; ?>>Default</option>
        <option value="content_title_asc" <?php if ($sort == 'content_title_asc') echo 'selected'; ?>>Judul A to Z</option>
        <option value="content_title_desc" <?php if ($sort == 'content_title_desc') echo 'selected'; ?>>Judul Z to A</option>
    </select>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">NO.</th>
                    <th scope="col">Judul Konten</th>
                    <th scope="col">Film</th>
                    <th scope="col">URL</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    $no = 1;
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<th scope='row'>" . $no++ . "</th>";
                        echo "<td>" . $row["content_title"] . "</td>";
                        echo "<td>" . $row["content_movies"] . "</td>";
                        echo "<td>" . $row["url_content"] . "</td>";
                        echo "<td><img src='../assets/img/" . $row["content_photo"] . "' style='width: 100px;'></td>";
                        echo "<td><a href='edit.php?content_id= ". $row["content_id"]  .  "'class='btn btn-success' onclick='return confirm(\"Yakin Diubah?\");'><i class='bi bi-pencil'></i>Edit</a>
                                <a href='hapus.php?content_id= ". $row["content_id"]  . "' class='btn btn-danger' onclick='return confirm(\"Yakin Dihapus?\");'><i class='bi bi-trash'></i> Hapus</a> </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>Tidak ada data</td></tr>";
                }
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
    </div>

    <script>
function applySort() {
    var sortingValue = document.getElementById("sortingSelect").value;
    // Misalkan kita mengirimkan permintaan melalui GET
    window.location.href = "?sort=" + sortingValue;
}
</script>


    <?php include '../include/footer.php' ?>

    <?php include 'script.php' ?>
</body>
</html>