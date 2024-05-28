<?php 
session_start();
include 'include/config.php'; // Pastikan path ke config.php benar
$search = isset($_GET["search"]) ? $_GET["search"] : null ;
$sql = "SELECT content_title, content_movies, url_content, content_photo FROM movies_content";
    if ($search) {
      $sql .=" WHERE content_title LIKE '%$search%'";
    }
    $result = $conn->query($sql);
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'head.php'?>
    <style>
        .card {
            width: auto; 
            min-height: 200px; 
            flex-direction:row; 
            display:flex; left:0;   
        }

        @media screen and (max-width: 626px) {
    .card {
        flex-direction: column;
        height: fit-content;
        max-width: fit-content;
    }
    .card img {
        height: 50%;
    }
}
    </style>
</head>
    <body>
    <?php include './include/navbar.php'?>


    <!-- Banner -->
    
     <div class="container-fluid banner">
      <div class="container banner-content col-lg-6">
        <div class="text-start">
          <h2> <img src="./assets/img/logo_tubes_edited.png" alt=""></h2>
          <p class="d-none d-sm-block">Website Film & Series Kesayangan Kalian</p>
        </div>
      </div>
     </div>

    <!-- EndBanner -->
    
    <!-- Carousel -->

   <div class="container-fluid carousel-contain py-5">
      <div class="container-fluid">
         <h4 class="fs-1 text-center mb-5">Now <span class="kami">Showing</span></h4>
    <div id="carouselExampleAutoplaying" class="carousel slide col-lg-6 offset-lg-3" data-bs-ride="carousel">
  <div class="carousel-inner">
      <div class="carousel-item active">
          <img src="./assets/img/TIAB.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="./assets/img/VINA.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="./assets/img/HTMMBGD.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="./assets/img/APES.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="./assets/img/DYSWIS.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="./assets/img/GARFIELD.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="./assets/img/FURIOSA.jpg" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
  </button>
</div>
</div>
</div>




<!-- End carousel -->

<!-- Wrapper -->  

<h4 class="fs-1 text-center mb-5 pt-5 highlight"> Highlight <span class="kami">Terkini</span></h4>
<div class="wrapper container-fluid mt-4">


    <!-- Card -->

    <div class="container-fluid title-movies" style="min-width: 300px; max-width: 700px; margin:0;" id="highlight">
    <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) { ?>
             <div class="card text-bg-danger border-light mb-3">
             <img src="./assets/img/<?php echo $row['content_photo']; ?>" class="card-img" alt="..." style="object-fit: fit-content;">
             <div class="card-body">
             <h5 class="card-title"> <?php echo $row['content_title']; ?></h5>
             <p class="card-text"> <?php echo $row['content_movies']; ?></p>
             <a href="<?php echo $row['url_content']; ?>" class="btn btn-primary">Baca Selengkapnya</a>
             </div>
             </div>
    <?php       }
    } else {
        echo "Tidak ada data yang ditemukan";
    }
    ?>
    </div>

    <!-- End card -->

    <!-- List group -->
    
    <div class="list-group" style="margin: 10px auto;">
  <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
    HOME
  </a>
  <?php
  $sql = "SELECT content_title, url_content FROM movies_content";
    $hasil = $conn->query($sql);
    if ($hasil->num_rows > 0) {
        while($row = $hasil->fetch_assoc()) { ?>
  <a href="<?php echo $row['url_content']; ?>" class="list-group-item list-group-item-action"><?php echo $row['content_title']; ?></a>
  <?php       }
    } else {
        echo "Tidak ada data yang ditemukan";
    }
    $conn->close();
    ?>
</div>

    <!-- End list group -->

    </div>
    
    <!-- End Wrapper -->
    

    <?php include './include/footer.php'?>
    <?php include 'script.php'?>
    <script>


    </script>
</body>
</html>
