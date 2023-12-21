<?php
  require 'glava.php';
  echo '<div class="col-8 offset-2">';
  if(isset($_SESSION['rad_id'])) {
    echo '<h3>Trenutna aktivnost</h3>';
    $id = $_SESSION['rad_id'];
    $sql2 = "SELECT * FROM rad WHERE id=$id";
    $query2 = mysqli_query($db, $sql2);
    $result2 = mysqli_fetch_assoc($query2);
    $id = $result2['projekat_id'];
    $sql3 = "SELECT * FROM projekat WHERE id=$id";
    $query3 = mysqli_query($db, $sql3);
    $result3 = mysqli_fetch_assoc($query3);
    $date = date_create($result2['pocetak']);
    echo '<h5>Aktivan projekat: '.$result3['name'].'</h5>';
    echo '<h5>Započet: '.date_format($date,"d.m.Y. H:i:s").'</h5>';
    echo '<form action="prekinirad.php">';
    echo '<button type="submit" class="btn btn-primary form-control" style="background-color:#232b2b;border-color:#232b2b;margin-bottom:4px;width:25%;display:inline-block">Prekini aktivnost</button>';
    echo '</form>';
  }
  else {
    echo '<h3>Započni novu aktivnost</h3>';
    $sql2 = "SELECT * FROM projekat";
    $query2 = mysqli_query($db, $sql2);
    $result2 = mysqli_fetch_all($query2, MYSQLI_ASSOC);
    echo '<form action="dodajrad.php" >';
    echo '<select style="display:inline-block;width:50%;height:100%" class="form-select" name="select"     required >';
    foreach($result2 as $opcija) {
        echo '<option value="'.$opcija['id'].'">'.$opcija['name'].'</option>';
    }
    echo '</select>';
    echo '<button type="submit" class="btn btn-primary form-control" style="background-color:#232b2b;border-color:#232b2b;margin-bottom:4px;width:25%;display:inline-block; margin-left:5%">Započni</button>';
    echo '</form>';
  }
  echo '<br>';
  echo '<h3>Prethodne aktivnosti korisnika</h3>';
  echo '<table class="table table-dark">';
  echo '<thead>';
  echo  '<tr>';
  echo    '<th scope="col">#</th>';
  echo    '<th scope="col">Projekat</th>';
  echo    '<th scope="col">Početak</th>';
  echo  '<th scope="col">Kraj</th>';
  echo  '</tr>';
  echo '</thead>';
  echo '<tbody>';

  $id = $_SESSION['id'];
  $sql = "SELECT * FROM rad WHERE korisnik_id='$id' AND kraj IS NOT NULL";
  $query = mysqli_query($db, $sql);
  $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
  $brojac=1;
  foreach($result as $rad) {
    $id1 = $rad['projekat_id'];
    $sql1 = "SELECT * FROM projekat WHERE id = $id1";
    $query1 = mysqli_query($db, $sql1);
    $result1= mysqli_fetch_assoc($query1);
    echo  '<tr>';
    echo    '<th scope="row">'.$brojac++.'</th>';
    echo    '<td>'.$result1['name'].'</td>';
    $date = date_create($rad['pocetak']);
    echo    '<td>'.date_format($date,"d.m.Y. H:i:s").'</td>';
    $date2 = date_create($rad['kraj']);
    echo    '<td>'.date_format($date2,"d.m.Y. H:i:s").'</td>';
    echo  '</tr>';
  }

  echo '</tbody></table>';
  echo '</div>';
  require 'dno.php';
 ?>
