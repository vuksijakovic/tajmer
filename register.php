<?php
    require 'glava.php';
    $ime = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM korisnik WHERE email='$email'";
    $query = mysqli_query($db,$sql);
    $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
    if(sizeof($result)>0) {
      header('Location: register_view.php?error=1');
    }
    if(strlen($password)<8) {
      header('Location: register_view.php?error=2');
    }
    if(sizeof($result)==0 && strlen($password)>=8 && strlen($ime)>0) {
      $sql = "INSERT INTO korisnik(`id`, `name`, `email`, `password`) VALUES (NULL,'$ime','$email','$password')";
      $query = mysqli_query($db, $sql);
      header('Location: login_view.php?suc=1');
    }
    require 'dno.php';
 ?>
