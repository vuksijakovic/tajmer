<?php
  require 'glava.php';
  session_start();
  unset($_SESSION["id"]);
  unset($_SESSION["rad_id"]);
  session_destroy();
  header('Location: index.php');
 ?>
