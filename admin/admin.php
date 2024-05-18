<?php 
include '../include/config.php'; // Pastikan path ke config.php benar
    $sql = "SELECT content_title, content_movies, url_content, content_photo FROM movies_content";
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
        <h2>Konten Film</h2>
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
                include '../include/config.php'; // Pastikan path ke config.php benar
                $sql = "SELECT content_title, content_movies, url_content, content_photo FROM movies_content";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    $no = 1;
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<th scope='row'>" . $no++ . "</th>";
                        echo "<td>" . $row["content_title"] . "</td>";
                        echo "<td>" . $row["content_movies"] . "</td>";
                        echo "<td>" . $row["url_content"] . "</td>";
                        echo "<td><img src='../assets/img/" . $row["content_photo"] . "' style='width: 100px;'></td>";
                        echo "<td><a href=''>Edit </a> <a href=''> Hapus</a> </td>";
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


    <?php include '../include/footer.php' ?>

    <?php include 'script.php' ?>
</body>
</html>