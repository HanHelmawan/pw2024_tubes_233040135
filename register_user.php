<?php

include("./include/config.php");
session_start();
// Menangkap data yang dikirim dari form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username_user = $_POST['username_user'];
    $email_user = $_POST['email_user'];
    $password_user = password_hash($_POST['password_user'], PASSWORD_DEFAULT); // Menggunakan password_hash untuk keamanan

    // Menyiapkan perintah SQL
    $sql = "INSERT INTO user (username_user, email_user, password_user) VALUES (?, ?, ?)";

    // Mempersiapkan prepared statement
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("sss", $username_user, $email_user, $password_user);

        // Menjalankan prepared statement
        if ($stmt->execute()) {
             echo "<script>alert('Pengguna berhasil didaftarkan!'); window.location.href='login_user.php';</script>";
        } else {
            echo "Error: " . $stmt->error;
        }

        // Menutup statement
        $stmt->close();
    } else {
        echo "Error: " . $conn->error;
    }
}

// Menutup koneksi
$conn->close();
?>

<!-- Formulir pendaftaran -->
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
            background-image: url(./assets/img/banner_2.jpg);
            background-position: center;
            background-size: cover;

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
            margin-top: -150px;
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

        button {
                
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

        button:hover {
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


    <title>Registrasi Pengguna</title>
</head>
<body>

<div class="container" style="width: 100%; height: 100vh;">
    <div class="content">
    <h1>Register</h1>
    <svg xmlns="http://www.w3.org/2000/svg" width="130" height="130" viewBox="0 0 24 24"><path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm0 22c-3.123 0-5.914-1.441-7.749-3.69.259-.588.783-.995 1.867-1.246 2.244-.518 4.459-.981 3.393-2.945-3.155-5.82-.899-9.119 2.489-9.119 3.322 0 5.634 3.177 2.489 9.119-1.035 1.952 1.1 2.416 3.393 2.945 1.082.25 1.61.655 1.871 1.241-1.836 2.253-4.628 3.695-7.753 3.695z"/></svg>
    <form method="POST" action="register_user.php">
        <label for="username_user">Username:</label>
        <input type="text" id="username_user" name="username_user" required><br><br>
        <label for="email_user">Email:</label>
        <input type="email" id="email_user" name="email_user" required><br><br>
        <label for="password_user">Password:</label>
        <input type="password" id="password_user" name="password_user" required><br><br>
        <div class="daftar" style="text-align:center;">
        <button type="submit" value="Daftar">Daftar</button>
        </div>
    </form>
    </div>
</div>
</body>
</html>