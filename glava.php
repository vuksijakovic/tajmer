

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <!-- CSS only -->
    <!-- JavaScript Bundle with Popper -->
    <script src="jquery-3.6.1.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
<script src="js/bootstrap.js"></script>
<link rel="stylesheet" href="css/bootstrap.css"></link>
<link rel="stylesheet" href="style.css"></link>
<?php
  date_default_timezone_set('America/Los_Angeles');
 $db = mysqli_connect('localhost','root','','tajmer') or die ("Connection error");
// $db = mysqli_connect('sql308.epizy.com','epiz_32672204','4EkNtDtbv3','epiz_32672204_tajmer') or die ("Connection error");
        session_start();
   ?>
    <title>Time</title>
</head>
<body style="background-color: #E1D9D1">
    <div class = "meni">
        <nav class = "navbar navbar-expand navbar-dark" style="background-color:#232b2b">
          <?php if(isset($_SESSION['id'])): ?>

          <a href="pocetna.php" style="padding:5px" class = "navbar-brand">Početna</a>
          <a href="projekti.php" style="padding:5px" class = "navbar-brand">Projekti</a>
          <a href="statistika.php" style="padding:5px" class = "navbar-brand">Statistika</a>
          <a href="projektistatistika.php" style="padding:5px" class = "navbar-brand">Informacije o projektima</a>
        <?php else: ?>
            <a href="index.php" style="padding:5px" class = "navbar-brand">Početna</a>
        <?php endif ?>
          <ul class="navbar-nav ms-auto">
            <?php if(isset($_SESSION['id'])): ?>
              <li class="nav-item"><a href="logout.php" class="nav-link">Izloguj se</a></li>
          <?php else: ?>
            <li class="nav-item"><a href="login_view.php" class="nav-link">Uloguj se</a></li>
            <li class="nav-item"><a href="register_view.php" class="nav-link">Registruj se</a></li>
          <?php endif ?>
          </ul>
        </nav>
      </div>
     <br>
