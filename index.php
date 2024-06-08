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

<h4 class="fs-1 text-center mb-5 pt-5 highlight"><mark style="background-color:#011c3c;"><span class="teks">Highlight</span> <span class="terkini">Terkini</span></h4></mark>
<div class="wrapper container-fluid mt-4">


    <!-- Card -->

    <div class="container-fluid title-movies" style="min-width: 300px; max-width: 700px; margin:0;" id="highlight">
    <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) { ?>
             <div class="card border-light mb-3">
             <img src="./assets/img/<?php echo $row['content_photo']; ?>" class="card-img" alt="..." style="object-fit: fit-content;">
             <div class="card-body">
             <h5 class="card-title" style="color:white;"> <?php echo $row['content_title']; ?></h5>
             <p class="card-text" style="color:white;"> <?php echo $row['content_movies']; ?></p>
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
    
<ul class="list-group" style="margin: 10px auto;">

  <li class="list-group-item active border-light" style="background-color: #011c3c; font-size:medium; font-weight:700;" aria-current="true">More News</li>
  
  <li class="list-group-item"><a href="https://www.idntimes.com/hype/entertainment/mito-rudito/pilar-dengan-program-latihan-terberat-dalam-demon-slayer-c1c2" style="text-decoration:none; color:black;">4 Pilar dengan Program Latihan Terberat dalam Demon Slayer, Sadis!</a></li>

  <li class="list-group-item"><a href="https://www.cnnindonesia.com/hiburan/20240307092336-220-1071469/live-action-avatar-the-last-airbender-lanjut-ke-musim-2-dan-3" style="text-decoration:none; color:black;">Live Action Avatar: The Last Airbender Lanjut ke Musim 2 dan 3</a></li>

  <li class="list-group-item"><a href="https://www.idntimes.com/tech/gadget/fauzan-maulana-wijaya/platform-film-legal-c1c2" style="text-decoration:none; color:black;">7 Rekomendasi Platform Legal Buat Nonton Film, Jangan Pakai Link Haram</a></li>

  <li class="list-group-item"><a href="https://www.detik.com/pop/movie/d-7375358/deretan-film-horor-terbaru-juni-2024" style="text-decoration:none; color:black;">Deretan Film Horor Terbaru Juni 2024</a></li>

  <li class="list-group-item"><a href="https://www.haibunda.com/trending/20240604154035-93-338853/6-film-korea-terbaru-juni-2024-terbaik-diprediksi-raih-penonton-terbanyak-rating-tertinggi" style="text-decoration:none; color:black;">6 Film Korea Terbaru Juni 2024, Terbaik Diprediksi Raih Penonton Terbanyak & Rating Tertinggi</a></li>

  <li class="list-group-item"><a href="https://wartakota.tribunnews.com/2024/06/06/sambut-film-dilan-1983-wo-ai-ni-tayang-bioskop-falcon-pictures-gelar-festival-dilan-1983-wo-ai-ni" style="text-decoration:none; color:black;">Sambut Film 'Dilan 1983 Wo Ai Ni' Tayang Bioskop, Falcon Pictures Gelar Festival Dilan 1983 Wo Ai Ni</a></li>

  <li class="list-group-item"><a href="https://www.viva.co.id/showbiz/film/1720727-film-dosen-ghaib-sudah-malam-atau-sudah-tahu-segera-meneror-penonton" style="text-decoration:none; color:black;">Film Dosen Ghaib: Sudah Malam atau Sudah Tahu Segera Meneror Penonton</a></li>

  <li class="list-group-item"><a href="https://www.suaramerdeka.com/hiburan/0412848031/series-peaky-blinders-dibuat-versi-film-masih-dibintangi-cillian-murphy-dan-diproduksi-netflix" style="text-decoration:none; color:black;">Series Peaky Blinders Dibuat Versi Film, Masih Dibintangi Cillian Murphy dan Diproduksi Netflix</a></li>

  <li class="list-group-item"><a href="https://jogja.idntimes.com/hype/entertainment/sandinugraha/aktor-yang-jadi-langganan-film-dan-series-joko-anwar-c1c2" style="text-decoration:none; color:black;">5 Aktor yang Jadi Langganan Film dan Series Joko Anwar</a></li>

  <li class="list-group-item"><a href="https://tirto.id/daftar-series-drakor-anime-dan-film-netflix-juni-2024-gY9h" style="text-decoration:none; color:black;">Daftar Series, Drakor, Anime, dan Film Netflix Juni 2024</a></li>

  <li class="list-group-item"><a href="https://www.detik.com/pop/culture/d-7375575/spoiler-one-piece-episode-1108-seraphim-vs-kru-topi-jerami" style="text-decoration:none; color:black;">Spoiler One Piece Episode 1108: Seraphim Vs Kru Topi Jerami</a></li>

  <li class="list-group-item"><a href="https://www.detik.com/pop/movie/d-7372287/hore-one-piece-live-action-lanjut-ke-season-3" style="text-decoration:none; color:black;">Hore! One Piece Live Action Lanjut ke Season 3!</a></li>

  <li class="list-group-item"><a href=https://radarmojokerto.jawapos.com/journey/824717137/film-hollywood-monkey-man-gabungkan-legenda-hanoman" style="text-decoration:none; color:black;">Film Hollywood Monkey Man, Gabungkan Legenda Hanoman</a></li>

  <li class="list-group-item"><a href="https://video.okezone.com/play/2024/06/01/6/181305/film-furiosa-a-mad-max-saga-menjadi-box-office-hollywood" style="text-decoration:none; color:black;">Film Furiosa: A Mad Max Saga menjadi Box Office Hollywood</a></li>

  <li class="list-group-item"><a href="https://www.idntimes.com/korea/knews/millions/aktor-korea-ini-pernah-ditanyai-kabar-kencan-artis-lain-c1c2" style="text-decoration:none; color:black;">3 Aktor Korea Ini Pernah Ditanyai Kabar Kencan Artis Lain</a></li>
  
</ul>

    <!-- End list group -->

    </div>
    
    <!-- End Wrapper -->
    

    <?php include './include/footer.php'?>
    <?php include 'script.php'?>
    <script>


    </script>
</body>
</html>
