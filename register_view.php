<?php
  require 'glava.php';
  if(isset($_GET['error']) && $_GET['error']==1) {
    echo '<div class="container">';
    echo '<div class="row">';
    echo '<div class="col-3 offset-4">';
    echo '<p style="color:#df2525">Željeni e-mail je zauzet</p>';
    echo '</div></div></div>';
  }
  if(isset($_GET['error']) && $_GET['error']==2) {
    echo '<div class="container">';
    echo '<div class="row">';
    echo '<div class="col-3 offset-4">';
    echo '<p style="color:#df2525">Password mora da sadrži 8 ili više karaktera</p>';
    echo '</div></div></div>';
  }
  ?>
    <div class="container">
        <div class="row">
            <div class="col-3 offset-4">
                <form action="register.php" method="post">
                    <input type="text" name="name" placeholder="Ime" class="form-control" required><br>
                    <input type="email" name="email" placeholder="E-mail" class="form-control" required><br>
                    <input type="password" name="password" placeholder="Password" class="form-control" required><br>
                    <button type="submit" class="btn btn-primary form-control">Registruj se</button><br>
                </form>
            </div>
        </div>
    </div>
  <?php
  require 'dno.php';
 ?>
