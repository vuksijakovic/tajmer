<?php
  require 'glava.php';
  echo '<div class="col-10 offset-2 d-flex">';
      echo '<div class="col-5 offset-0" style="display:inline-block">';
        echo '<h1>Lična statistika</h1>';
        $id = $_SESSION['id'];
        $sql1 = "SELECT korisnik.id AS id,
        SUM(TIMESTAMPDIFF(SECOND, rad.pocetak, rad.kraj)) AS sekunde
        FROM rad
        JOIN (korisnik, projekat)
        ON (rad.korisnik_id=korisnik.id AND rad.projekat_id=projekat.id AND rad.kraj IS NOT NULL AND korisnik.id=$id)
        GROUP BY korisnik.id";
        $query1 = mysqli_query($db, $sql1);
        $result1 = mysqli_fetch_assoc($query1);
        echo '<h5>Ukupno vrijeme rada: </h5>';
          echo '<ul class="list-group" style="width:70%;margin-bottom:20px;">';
          echo '<li class="list-group-item bg-dark text-white">'.gmdate("H:i:s", $result1['sekunde']).'</li>';
          echo '</ul>';
        echo '<h5>Vrijeme rada po projektima: </h5>';
        $sql2= "SELECT korisnik.id AS id,projekat.name as ime, SUM(TIMESTAMPDIFF(SECOND, rad.pocetak, rad.kraj)) AS sekunde
        FROM rad
        JOIN (korisnik, projekat)
        ON (rad.korisnik_id=korisnik.id AND rad.projekat_id=projekat.id AND rad.kraj IS NOT NULL AND korisnik.id=$id) GROUP BY projekat.id, korisnik.id ORDER BY sekunde desc";
        $query2 = mysqli_query($db, $sql2);
        $result2= mysqli_fetch_all($query2, MYSQLI_ASSOC);
        echo '<ul class="list-group" style="width:70%">';
        foreach($result2 as $niz) {

            echo '<li class="list-group-item bg-dark text-white">'.$niz['ime'].' - '.gmdate("H:i:s", $niz['sekunde']).'</li>';

        }
        echo '</ul>';
      echo '</div>';
      echo '<div class="col-5 offset-0" style="display:inline-block">';
        echo '<h1>Timska statistika</h1>';
        $sql1 = "SELECT korisnik.id AS id,
        SUM(TIMESTAMPDIFF(SECOND, rad.pocetak, rad.kraj)) AS sekunde
        FROM rad
        JOIN (korisnik, projekat)
        ON (rad.korisnik_id=korisnik.id AND rad.projekat_id=projekat.id AND rad.kraj IS NOT NULL)
        GROUP BY korisnik.id";
        $query1 = mysqli_query($db, $sql1);
        $result1 = mysqli_fetch_all($query1, MYSQLI_ASSOC);
        $date=0;
        foreach($result1 as $rad) {
          $date+=  $rad['sekunde'];
        }
        echo '<h5>Ukupno vrijeme rada: </h5>';
          echo '<ul class="list-group" style="width:70%;margin-bottom:20px;">';
          echo '<li class="list-group-item bg-dark text-white">'.gmdate("H:i:s", $date).'</li>';
          echo '</ul>';
        echo '<h5>Vrijeme rada po projektima: </h5>';
        $sql2= "SELECT korisnik.id AS id,projekat.name as ime, SUM(TIMESTAMPDIFF(SECOND, rad.pocetak, rad.kraj)) AS sekunde
        FROM rad
        JOIN (korisnik, projekat)
        ON (rad.korisnik_id=korisnik.id AND rad.projekat_id=projekat.id AND rad.kraj IS NOT NULL) GROUP BY projekat.id ORDER BY sekunde desc";
        $query2 = mysqli_query($db, $sql2);
        $result2= mysqli_fetch_all($query2, MYSQLI_ASSOC);
        echo '<ul class="list-group" style="width:70%;margin-bottom:20px">';
        foreach($result2 as $niz) {
            echo '<li class="list-group-item bg-dark text-white">'.$niz['ime'].' - '.gmdate("H:i:s", $niz['sekunde']).'</li>';
        }
        echo '</ul>';
        $sql3 = "SELECT korisnik.id AS id, korisnik.name AS name,
        SUM(TIMESTAMPDIFF(SECOND, rad.pocetak, rad.kraj)) AS sekunde
        FROM rad
        JOIN (korisnik, projekat)
        ON (rad.korisnik_id=korisnik.id AND rad.projekat_id=projekat.id AND rad.kraj IS NOT NULL)
        GROUP BY korisnik.id ORDER BY sekunde desc LIMIT 1";
        $query3 = mysqli_query($db, $sql3);
        $result3 = mysqli_fetch_assoc($query3);
        echo '<h5>Radnik koji je radio najviše vremena</h5>';
        echo '<ul class="list-group" style="width:70%;margin-bottom:20px;">';
        echo '<li class="list-group-item bg-dark text-white">'.$result3['name'].' - '.gmdate("H:i:s", $result3['sekunde']).'</li>';
        echo '</ul>';
      echo '</div>';

  echo '</div>';

  require 'dno.php';
 ?>
