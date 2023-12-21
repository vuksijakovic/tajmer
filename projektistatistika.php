<?php
  require 'glava.php';
      echo '<div class="col-10 offset-2">';

        if(isset($_GET['id'])) {
          $id = $_GET['id'];
          echo '<h2 style="margin-bottom:20px">Informacije o projektu</h2>';
          $sql = "SELECT * FROM projekat WHERE id=$id";
          $query = mysqli_query($db, $sql);
          $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
          $brojac=1;
          foreach ($result as $projekat) {
            $id = $projekat['id'];
            $sql1= "SELECT projekat.id AS id,projekat.name as ime, SUM(TIMESTAMPDIFF(SECOND, rad.pocetak, rad.kraj)) AS sekunde
            FROM rad
            JOIN (korisnik, projekat)
            ON (rad.korisnik_id=korisnik.id AND rad.projekat_id=projekat.id AND rad.kraj IS NOT NULL AND projekat.id=$id) GROUP BY projekat.id";
            $query1 = mysqli_query($db, $sql1);
            $result1 = mysqli_fetch_assoc($query1);
            $sql2 = "SELECT projekat.id AS id, korisnik.id AS kid,projekat.name as ime, SUM(TIMESTAMPDIFF(SECOND, rad.pocetak, rad.kraj)) AS sekunde
            FROM rad
            JOIN (korisnik, projekat)
            ON (rad.korisnik_id=korisnik.id AND rad.projekat_id=projekat.id AND rad.kraj IS NOT NULL AND projekat.id=$id) GROUP BY korisnik.id ORDER BY sekunde desc LIMIT 1";
            $query2 = mysqli_query($db, $sql2);
            $result2 = mysqli_fetch_assoc($query2);
            $id1 = $result2['kid'];
            $sql3 = "SELECT * FROM korisnik WHERE id = $id1";
            $query3 = mysqli_query($db, $sql3);
            $result3 = mysqli_fetch_assoc($query3);
            echo '<div class="card text-white bg-dark mb-3" style="max-width: 18rem;display:inline-block;margin-left:20px">';
            echo '<div class="card-header">'.$brojac++.'</div>';
            echo '<div class="card-body">';
            echo '<h5 class="card-title">'.$projekat['name'].'</h5>';
            echo '<p class="card-text">Ukupno vrijeme rada na projektu: '.gmdate("H:i:s", $result1['sekunde']).'</p>';
            echo '<p class="card-text">Korisnik koji je najviše radio na projektu: '.$result3['name'].' - '.gmdate("H:i:s", $result2['sekunde']).'</p>';
            echo '<a href="projektistatistika.php" style="color:#FFF">Prikaži sve</a>';
            echo '</div>';
            echo '</div>';

          }
        }
        else {
          echo '<h2 style="margin-bottom:20px">Informacije o projektima</h2>';
          $sql = "SELECT * FROM projekat";
          $query = mysqli_query($db, $sql);
          $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
          $brojac=1;

          foreach ($result as $projekat) {
            $id = $projekat['id'];
            $sql1= "SELECT korisnik.id AS id,projekat.name as ime, SUM(TIMESTAMPDIFF(SECOND, rad.pocetak, rad.kraj)) AS sekunde
            FROM rad
            JOIN (korisnik, projekat)
            ON (rad.korisnik_id=korisnik.id AND rad.projekat_id=projekat.id AND rad.kraj IS NOT NULL AND projekat.id=$id) GROUP BY projekat.id";
            $query1 = mysqli_query($db, $sql1);
            $result1 = mysqli_fetch_assoc($query1);
            $sql2 = "SELECT projekat.id AS id, korisnik.id AS kid,projekat.name as ime, SUM(TIMESTAMPDIFF(SECOND, rad.pocetak, rad.kraj)) AS sekunde
            FROM rad
            JOIN (korisnik, projekat)
            ON (rad.korisnik_id=korisnik.id AND rad.projekat_id=projekat.id AND rad.kraj IS NOT NULL AND projekat.id=$id) GROUP BY korisnik.id ORDER BY sekunde desc LIMIT 1";
            $query2 = mysqli_query($db, $sql2);
            $result2 = mysqli_fetch_assoc($query2);
            $id1 = $result2['kid'];
            $sql3 = "SELECT * FROM korisnik WHERE id = $id1";
            $query3 = mysqli_query($db, $sql3);
            $result3 = mysqli_fetch_assoc($query3);

            echo '<div class="card text-white bg-dark mb-3" style="max-width: 18rem;display:inline-block;margin-left:20px">';
            echo '<div class="card-header">'.$brojac++.'</div>';
            echo '<div class="card-body">';
            echo '<h5 class="card-title">'.$projekat['name'].'</h5>';
            echo '<p class="card-text">Ukupno vrijeme rada na projektu: '.gmdate("H:i:s", $result1['sekunde']).'</p>';
            echo '<p class="card-text">Korisnik koji je najviše radio na projektu: '.$result3['name'].' - '.gmdate("H:i:s", $result2['sekunde']).'</p>';
            echo '<a href="projektistatistika.php?id='.$projekat['id'].'" style="color:#FFF">Prikaži zasebno</a>';
            echo '</div>';
            echo '</div>';

          }
        }
      echo '</div>';
  require 'dno.php';
 ?>
