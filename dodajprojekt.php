<?php
  require 'glava.php';
  $projekat =$_GET['projekat'];
  $sql = "INSERT INTO projekat(`id`, `name`) VALUES (NULL,'$projekat')";
  $query = mysqli_query($db, $sql);
  header('Location: projekti.php');
  require 'dno.php';
 ?>
