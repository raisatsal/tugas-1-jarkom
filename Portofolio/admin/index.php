<?php
session_start();

/* =========================
   CEK LOGIN
========================= */
if(!isset($_SESSION['login'])){
    header("Location: login.php");
    exit;
}
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PORTOFOLIO</title>

  <!-- Bootstrap -->
  <link href="css/bootstrap.min.css" rel="stylesheet" />

  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>

<body>

<?php
include_once 'koneksi.php';
include_once 'models/Jenis.php';
?>

<div class="container-fluid">

  <!-- HEADER -->
  <div class="row">
    <div class="col-md-12">
      <?php include_once 'header.php'; ?>
    </div>
  </div>

  <!-- MENU -->
  <div class="row">
    <div class="col-md-12">
      <?php include_once 'menu.php'; ?>
    </div>
  </div>

  <br />

  <!-- CONTENT -->
  <div class="row">

    <!-- MAIN -->
    <div class="col-md-8">

      <?php
      if (isset($_GET['hal'])) {

        $req = $_GET['hal'];
        $file = $req . '.php';

        if (file_exists($file)) {

          include_once $file;

        } else {

          echo "<div class='alert alert-danger'>
                  Halaman tidak ditemukan!
                </div>";
        }

      } else {

        include_once 'home.php';
      }
      ?>

    </div>

    <!-- SIDEBAR -->
    <div class="col-md-4">
      <?php include_once 'sidebar.php'; ?>
    </div>

  </div>

  <br />

  <!-- FOOTER -->
  <div class="row">
    <div class="col-md-12">
      <?php include_once 'footer.php'; ?>
    </div>
  </div>

</div>

<script src="js/bootstrap.bundle.min.js"></script>

</body>
</html>