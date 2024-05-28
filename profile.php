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
            color: #EEC4DC;
            font-family: "Poppins", sans-serif;
            font-weight: 500;
            font-size: 50px;
            font-style: normal;
            background-color: #4B0082;
            background-image: linear-gradient(to top left, #EE82EE, #8806CE)
            
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
    <h1>Selamat Datang, <?php echo $username ?></h1>
    <p>Anda sudah berhasil login 🥳</p>
    </div>
    <?php include './include/footer.php'?>
    <?php include 'script.php'?>
</body>
</html>
