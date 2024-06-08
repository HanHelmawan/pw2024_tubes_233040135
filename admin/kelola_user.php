<?php
$search = isset($_GET["search"]) ? $_GET["search"] : null ;
session_start();
include '../include/config.php'; // Pastikan path ke config.php benar
 $sql = "SELECT * FROM user";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <?php include 'head.php' ?>
</head>
<body>
    <?php include '../include/navbar.php'?>
<div class="container-fluid">
       <h2 style="padding-top: 20px;"><mark style="background-color: #011c3c; color:white;">Kelola User</mark></h2>
    <div style="padding-top: 20px;">
    <a href="./admin.php" class="btn btn-warning">Kembali ke halaman admin</a>
    </div>

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">NO.</th>
                    <th scope="col">ID</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                </tr>
            </thead>
            <tbody>
                
<?php
                if ($search) {
                $sql .=" WHERE content_title LIKE '%$search%'";
                }
                $result = $conn->query($sql);

                 if ($result->num_rows > 0) {
                    $no = 1;
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<th scope='row'>" . $no++ . "</th>";
                        echo "<td>" . $row["user_id"] . "</td>";
                        echo "<td>" . $row["username_user"] . "</td>";
                        echo "<td>" . $row["email_user"] . "</td>";
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


    <?php include '../include/footer.php' ?>

    <?php include 'script.php' ?>
</body>
</html>