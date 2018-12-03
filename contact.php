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
    <script src="js/vendor/modernizr.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBu-916DdpKAjTmJNIgngS6HL_kDIKU0aU&callback=myMap"></script>
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



    <div class="row" style="margin-top:30px;">
      <div class="small-12">

        <div id="map" style="width:1000px;height:400px;background:yellow"></div>

          <script>
            function myMap() {
            var mapOptions = {
                center: new google.maps.LatLng(-6.975353, 107.629601),
                zoom: 16,
                mapTypeId: google.maps.MapTypeId.ROADMAP
              }
            var map = new google.maps.Map(document.getElementById("map"), mapOptions);
            }
          </script>
          <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCujfYF49tiIVFzH-DNpuLzxyqPTw56xkM&callback=myMap"></script>
      </div>
	  <div class="small-6">
		<h4>LOKASI OUTLET CAFEKU</h4>
		  <p>Food Court Sukabirus Lantai 2 ( Depan Indomart Sukabirus )<br>
		  <p>Jalan Raya Sukabirus, Bojongsoang, Bandung, Jawa Barat</p>
	  </div>
    </div>

        <footer style="margin-top:10px;">
           <p style="text-align:center; font-size:0.8em;">&copy; CAFEKU. All Rights Reserved. 2018</p>
        </footer>
    <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>
  </body>
</html>
