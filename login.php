<?php
    require 'glava.php';
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT id FROM korisnik WHERE email='$email' AND password='$password'";
    $query = mysqli_query($db, $sql);
    $result = mysqli_fetch_assoc($query);
    if(isset($result)) {
      $_SESSION['id']=$result['id'];
      $id = $result['id'];
      $sql = "SELECT * FROM rad WHERE korisnik_id=$id";
      $query = mysqli_query($db, $sql);
      $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
      foreach($result as $rad) {
        if($rad['kraj']==NULL) {
          $_SESSION['rad_id']=$rad['id'];
          break;
        }
      }
      header('Location: pocetna.php');
    }else {
      header('Location: login_view.php?error=1');
    }
    require 'dno.php';
 ?>
