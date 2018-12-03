<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}
include 'config.php';
?>

<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Daftar Menu || CAFEKU</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <script src="js/vendor/modernizr.js"></script>
  </head>
  <body>

    <nav class="top-bar" data-topbar role="navigation">
      <ul class="title-area">
        <li class="name">
          <h1><a href="index.php">We Served, You Tasted!</a></h1>
        </li>
        <li class="toggle-topbar menu-icon"><a href="#"><span></span></a></li>
      </ul>

      <section class="top-bar-section">
      <!-- Right Nav Section -->
        <ul class="right">
          <li><a href="products.php">Menu</a></li>
          <li><a href="cart.php">Daftar Pesanan</a></li>
          <li><a href="orders.php">Riwayat Pembelian</a></li>
          <li><a href="contact.php">Kontak</a></li>
          <?php

          if(isset($_SESSION['username'])){
            echo '<li><a href="account.php">Akun Saya</a></li>';
            echo '<li><a href="logout.php">Log Out</a></li>';
          }
          else{
            echo '<li><a href="login.php">Log In</a></li>';
          }
          ?>
        </ul>
      </section>
    </nav>




    <div class="row" style="margin-top:10px;">
      <div class="small-12">
        <?php
          $i=0;
          $menu_id = array();
          $menu_quantity = array();

          $result = $mysqli->query('SELECT * FROM menu');
          if($result === FALSE){
            die(mysql_error());
          }

          if($result){

            while($obj = $result->fetch_object()) {

              echo '<div class="large-4 columns">';
              echo '<p><h3>'.$obj->nama_menu.'</h3></p>';
              echo '<img src="images/menu/'.$obj->gambar_menu.'"/>';
              echo '<p><strong>Deskripsi</strong>: '.$obj->desk_menu.'</p>';
              echo '<p><strong>Jumlah Porsi yang Tersedia</strong>: '.$obj->jumlah.'</p>';
              echo '<p><strong>Harga (Per Porsi)</strong>: '.$obj->harga.'</p>';



              if($obj->jumlah > 0){
                echo '<p><a href="update-cart.php?action=add&id='.$obj->id.'"><input type="submit" value="Tambahkan" style="clear:both; background: #0078A0; border: none; color: #fff; font-size: 1em; padding: 10px;" /></a></p>';
              }
              else {
                echo 'Menu Telah Habis!';
              }
              echo '</div>';

              $i++;
            }

          }

          $_SESSION['menu_id'] = $menu_id;


          echo '</div>';
          echo '</div>';
          ?>

        <div class="row" style="margin-top:10px;">
          <div class="small-12">




        <footer style="margin-top:10px;">
           <p style="text-align:center; font-size:0.8em;">&copy; CAFEKU. All Rights Reserved. 2018</p>
        </footer>

      </div>
    </div>





    <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>
  </body>
</html>
