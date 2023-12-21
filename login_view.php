<?php
require 'glava.php';
if(isset($_GET['suc'])) {
  echo '<div class="container">';
    echo   ' <div class="row">';
      echo        '<div class="col-3 offset-4">';
          echo '<p>Registracija uspješna</p>';
      echo       ' </div>';
    echo    ' </div>';
  echo '</div>';
}
if(isset($_GET['error'])) {
  echo '<div class="container">';
    echo   ' <div class="row">';
      echo        '<div class="col-3 offset-4">';
          echo '<p style="color:#df2525">Pogrešan e-mail ili password</p>';
      echo       ' </div>';
    echo    ' </div>';
  echo '</div>';
}
?>
<div class="container">
    <div class="row">
        <div class="col-3 offset-4">
            <form action="login.php" method="post">
                <input type="email" name="email" placeholder="E-mail" class="form-control" required><br>
                <input type="password" name="password" placeholder="Password" class="form-control" required><br>
                <button type="submit" class="btn btn-info form-control">Uloguj se</button><br>
            </form>
        </div>
    </div>
</div>
<?php
require 'dno.php';
 ?>
