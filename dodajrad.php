<?php
    require 'glava.php';
    $id = $_SESSION['id'];
    $pid = $_GET['select'];
    $sql = "INSERT INTO rad(`id`, `korisnik_id`, `projekat_id`, `pocetak`, `kraj`) VALUES (NULL,'$id','$pid',CURRENT_TIMESTAMP,NULL)";
    $query = mysqli_query($db, $sql);
    $sql = "SELECT * FROM rad WHERE korisnik_id=$id AND kraj IS NULL";
    $query = mysqli_query($db, $sql);
    $result = mysqli_fetch_assoc($query);
    $_SESSION['rad_id']= $result['id'];
    header('Location: pocetna.php');
    require 'dno.php';
 ?>
