<?php
  require 'glava.php';
  $id = $_SESSION['rad_id'];
  $sql = "UPDATE rad
          SET kraj = CURRENT_TIMESTAMP
          WHERE id= $id";
  $query = mysqli_query($db, $sql);
  unset($_SESSION["rad_id"]);
  header('Location: pocetna.php');
  require 'dno.php';
 ?>
