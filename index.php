<?php 
include 'include/config.php'; // Pastikan path ke config.php benar
    $sql = "SELECT content_title, content_movies, url_content, content_photo FROM movies_content";
    $result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'head.php'?>

</head>
    <body>
    <?php include './include/navbar.php'?>


    <div class="wrapper container-fluid mt-4">
        <div class="container-sm highlight" style="width: 30%;">
            <h3>Berita Lainnya</h3>
           <div class="card" style="width: 20rem;">
        <ul class="list-group list-group-flush">
            <li class="list-group-item">An item</li>
            <li class="list-group-item">A second item</li>
            <li class="list-group-item">A third item</li>
        </ul>
        </div>
        </div>
    <div class="container-fluid title-movies" style="width: 70%; margin:0;">
        <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo '<div class="card text-bg-danger border-light mb-3" style="width: 90vh; flex-direction:row; display:flex; left:0;">';
            echo '<img src="./assets/img/' . $row["content_photo"] . '" class="card-img" alt="...">';
            echo '<div class="card-body">';
            echo '<h5 class="card-title">' . $row["content_title"] . '</h5>';
            echo '<p class="card-text">' . $row["content_movies"] . '</p>';
            echo '<a href="' . $row["url_content"] . '" class="btn btn-primary">Go somewhere</a>';
            echo '</div>';
            echo '</div>';
        }
    } else {
        echo "Tidak ada data yang ditemukan";
    }
    $conn->close();
    ?>
    </div>
    </div>
    
    

    <?php include './include/footer.php'?>
    <?php include 'script.php'?>
</body>
</html>
