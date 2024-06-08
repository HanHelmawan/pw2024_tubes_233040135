<?php
define('BASE_URL', 'http://localhost/pw2024_tubes_233040135/');
$username = isset( $_SESSION['username'] ) ? $_SESSION['username'] :'Guest';
?>
<nav class="navbar navbar-expand-lg">
  <div class="container-fluid">
    <a class="navbar-brand text-light" href="#"><img src="<?php echo BASE_URL; ?>/assets/img/logo_tubes_edited.png" style="width:200px; padding-left: 50px; padding-right: 10px; padding-top: 7px;"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="<?php echo BASE_URL; ?>index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo BASE_URL; ?>index.php#highlight">Highlight</a>
        </li>

        <?php if (!empty($username) && $username != 'Guest') { ?>
    <li class="nav-item">
        <a class="nav-link" href="<?php echo BASE_URL; ?>profile.php"><?php echo htmlspecialchars($username); ?></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?php echo BASE_URL; ?>logout.php">Logout</a>
    </li>
<?php } else { ?>
    <li class="nav-item">
        <a class="nav-link" href="<?php echo BASE_URL; ?>login_user.php">Login</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?php echo BASE_URL; ?>register_user.php">Register</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?php echo BASE_URL; ?>admin/login_admin.php">Admin</a>
    </li>
<?php } ?>
      </ul>
     <form class="d-flex" role="search" method="GET">
        <input class="form-control me-2" id="searchInputAja" name="search" type="search" placeholder="Mau Cari Apa ?" aria-label="Search" value="<?php echo isset($search) ? $search : ''; ?>">
        <button class="btn btn-outline-primary" type="submit">Cari</button>
      </form>
    </div>
  </div>
</nav>