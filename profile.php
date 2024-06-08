<?php 
include 'include/config.php'; // Pastikan path ke config.php benar
$username = isset( $_SESSION['username'] );
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <style>
         #Profile {
            display: flex;
            justify-content: center;
            flex-direction: column;
            gap: 50px;
            align-items: center;
            height: 100vh;
            width: 100%;
            color: white;
            font-family: "Poppins", sans-serif;
            font-weight: 500;
            font-size: 50px;
            font-style: normal;
            background-image: url(./assets/img/movie.jpg);
            
        }

        a {
           text-decoration: none;
           color: #1C0039
        }


    </style>

    <?php include 'head.php'?>
</head>
    <body>
    <?php include './include/navbar.php'?>
    <div class="container-fluid" id="Profile">
    <h1><mark style="background-color: #011c3c; color:white;">Selamat Datang, <?php echo $username ?></mark></h1>
    <p><mark style="background-color: #011c3c; color:white;">Anda sudah berhasil login 🥳</mark></p>
    </div>
    <?php include './include/footer.php'?>
    <?php include 'script.php'?>
</body>
</html>
