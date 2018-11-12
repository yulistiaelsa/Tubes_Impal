<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}

?>

<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CAFEKU</title>
    <link rel="stylesheet" href="css/foundation.css" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
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
          <li><a href="cart.php">Keranjang</a></li>
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

</div>
<div class="jumbotron" align="center">
<img src="images/logo.png">

</div>


<div style="position:relative;">
  <div style="color:#ddd;background-color:#282E34;text-align:center;padding:50px 80px;text-align: center; align-content: center">
    <h3 style="text-align:center; color: #FFFFFF">CARA PESAN MENU<br> <br></h3>
	  <div class="row" style="align-self: center; margin-left: 100px">
        <div class="col-lg-3 col-sm-6 text-center mb-4">
          <img class="rounded-circle img-fluid d-block mx-auto" src="images/signin.jpg" alt="">
          <h3>Login Sesuai Nomor Meja</h3>
        </div>
        <div class="col-lg-3 col-sm-6 text-center mb-4">
          <img class="rounded-circle img-fluid d-block mx-auto" src="images/menu.jpg" alt="">
          <h3>Pilih Menu Lalu Tambahkan Ke Keranjang</h3>

        </div>
        <div class="col-lg-3 col-sm-6 text-center mb-4">
          <img class="rounded-circle img-fluid d-block mx-auto" src="images/order.jpg" alt="">
          <h3>Klik Pesan</h3>
        </div>
        <div class="col-lg-3 col-sm-6 text-center mb-4">
          <img class="rounded-circle img-fluid d-block mx-auto" src="images/proses.jpg" alt="">
          <h3>Pesanan Dibuat:)</h3>
        </div>
      </div>
  </div>
</div>

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
