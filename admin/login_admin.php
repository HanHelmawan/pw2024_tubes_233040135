<?php
include '../include/config.php'; // Menambahkan file konfigurasi
define('BASE_URL', 'http://localhost/pw2024_tubes_233040135/');
session_start();
$error = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['admin_username'];
    $password = $_POST['admin_password'];

    // Query ke database untuk mencari user dengan username yang diberikan
    $query = "SELECT admin_password FROM admin WHERE admin_username = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $password_user);
    $result = mysqli_stmt_fetch($stmt);
    mysqli_stmt_close($stmt);

    if ($result) {
        // Verifikasi password
        if (password_verify($password, $password_user)) {
            // Setel sesi sebagai user
            $_SESSION['username'] = $username;

            header("Location: admin.php");
            exit();
        } else {
            $error = 'Username atau password salah!';
        }
    } else {
        $error = 'Anda belum terdaftar!';
    }
}

?>

<!DOCTYPE html>
<html>
<head>

     <style>
         * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            width: 100%;
            color: white;
            background-image: url(../assets/img/movie.jpg);

        }

        .content {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            margin: auto;
            background-color: #011c3c;
            width: 400px;
            height: 600px;
            border-radius: 20px;
            flex-wrap: wrap;
        }

        h1 {
            color: white;
            margin-bottom: 50%;
            font-family: "Poppins", sans-serif;
            font-weight: 700;
            font-size: 60px;
            font-style: normal;
            
        }

        svg {
            position: absolute;
            margin-top: -50px;
            margin-right: 6px;
            fill: white;
            justify-content: center;
            align-items: center;
        }

        input {
            margin-top: 10px;
            border: 2px solid black;
            width: 220px;
            height: 25px;
        }

        button, .Tombol {
                
            position: relative;
            display: inline-flex;
            font-size: 15px;
            color: rgb(241, 221, 197);
            align-items: center;
            justify-content: center;
            font-weight: 600;
            text-decoration: none;
            width: 100px;
            height: 40px;
            background-color: #330066;
            border-radius: 7px;
            border: 1px solid;
            margin-top: 10px;
            transition: .2s;
            cursor: pointer;
            font-family: "Yanone Kaffeesatz", sans-serif;
            font-size: 23px;

        }

        button:hover, .Tombol:hover {
            background-color: #1C0039;
        }

        p {
            color: red;
        }

        form li {
            list-style-type: none;
            font-family: "Yanone Kaffeesatz", sans-serif;
            font-size: 30px;
        }

        form input {
            border: none;
            border-radius: 10px;
        }
    </style>

    <title>Login</title>
</head>
<body>

 <div class="container">
        <div class="content">
    <h1>Login Admin</h1>
    <svg xmlns="http://www.w3.org/2000/svg" width="130" height="130" viewBox="0 0 24 24"><path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm0 22c-3.123 0-5.914-1.441-7.749-3.69.259-.588.783-.995 1.867-1.246 2.244-.518 4.459-.981 3.393-2.945-3.155-5.82-.899-9.119 2.489-9.119 3.322 0 5.634 3.177 2.489 9.119-1.035 1.952 1.1 2.416 3.393 2.945 1.082.25 1.61.655 1.871 1.241-1.836 2.253-4.628 3.695-7.753 3.695z"/></svg>
    <?php if( isset($error) ) : ?>
        <p style="color: red; font-style: italic;"><?php echo $error ?></p>
    <?php endif; ?>

    <form method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="admin_username" required><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="admin_password" required><br>
        <button type="submit" name="login">Login</button>
        <a href="<?php echo BASE_URL;?>index.php" class="Tombol">Kembali</a>
    </form>
    </div>
    </div>
</body>
</html>