<?php
  require 'glava.php';
    echo '<div class="col-10 offset-1">';
      $brojac=1;
      echo '<table class="table table-dark">';
        echo '<thead>';
        echo '<tr>';
        echo   '<th scope="col">#</th>';
        echo     '<th scope="col">Projekat</th>';
        echo  '</tr>';
      $sql = "SELECT * FROM projekat";
      $query = mysqli_query($db, $sql);
      $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
      echo '<tbody>';
      foreach($result as $projekat) {
            echo '<tr>';
            echo '<th scope="row">'.$brojac++.'</th>';
            echo '<td><a href="projektistatistika.php?id='.$projekat['id'].'" style="color:#FFF">'.$projekat['name'].'</a></td>';
            echo '</tr>';
      }
      echo '<tr>';
      echo '<form action="dodajprojekt.php" method="get">';
      echo '<th scope="row">'.$brojac++.'</th>';
      echo '<td>';
      echo '<input type="text" name="projekat" placeholder="Novi projekat" class="form-control" style="width:50%;display:inline-block" required>';
      echo '<button type="submit" class="btn btn-primary form-control" style="width:30%;margin-bottom:4px;margin-left:10%;display:inline-block">Dodaj projekat</button>';
      echo '</td>';
      echo '</form>';
      echo '</tr>';
      echo '</tbody></table>';
    echo '</div>';
  require 'dno.php';
 ?>
