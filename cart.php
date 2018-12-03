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
    <title>CAFEKU</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/foundation.css" />
    <script src="js/vendor/modernizr.js"></script>
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
      <div class="large-12">
        <?php

          echo '<p><h3>Daftar Pesananmu</h3></p>';

          if(isset($_SESSION['cart'])) {

            $total = 0;
            echo '<table>';
            echo '<tr>';
            echo '<th>Nama Menu</th>';
            echo '<th>Jumlah Pesanan</th>';
            echo '<th>Harga Satuan</th>';
            echo '<th>Total Harga</th>';
            echo '</tr>';
            foreach($_SESSION['cart'] as $menu_id => $jumlah) {

            $result = $mysqli->query("SELECT nama_menu, desk_menu, jumlah, harga FROM menu WHERE id = ".$menu_id);


            if($result){

              while($obj = $result->fetch_object()) {
                $cost = $obj->harga * $jumlah; //work out the line cost
                $total = $total + $cost; //add to the total cost

                echo '<tr>';
                echo '<td>'.$obj->nama_menu.'</td>';
                echo '<td>'.$jumlah.'&nbsp;<a class="button [secondary success alert]" style="padding:5px;" href="update-cart.php?action=add&id='.$menu_id.'">+</a>&nbsp;<a class="button alert" style="padding:5px;" href="update-cart.php?action=remove&id='.$menu_id.'">-</a></td>';
                echo '<td>'.$obj->harga.'</td>';
                echo '<td>'.$cost.'</td>';
                echo '</tr>';
              }
            }

          }

          echo '<tr>';
          echo '<td colspan="3" align="right">Total</td>';
          echo '<td>'.$total.'</td>';
          echo '</tr>';

          echo '<tr>';
          echo '<td colspan="4" align="right"><a href="update-cart.php?action=empty" class="button alert">Kosongkan Daftar</a>&nbsp;<a href="products.php" class="button [secondary success alert]">Pilih Menu Lagi</a> ';
          if(isset($_SESSION['username'])) {
            echo '<button type="button" class="button [primary success alert]" data-toggle="modal" data-target="#myModal">Pesan</button>
            <!-- Modal -->
            <div id="myModal" class="modal fade" role="dialog">
              <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Konfirmasi Harga</h4>
                  </div>
                  <div class="modal-body">
                    <p> Total pesananmu sebesar Rp '.$total.',- , jika sudah sesuai silahkan klik tombol Proses</p>
                  </div>
                  <div class="modal-footer">
                    <a href="orders-update.php"><button style="float:right;">Proses</button></a>
                  </div>
                </div>
              </div>
            </div>';
          }

          else {
            echo '<a href="login.php"><button style="float:right;">Login</button></a>';
          }

          echo '</td>';

          echo '</tr>';
          echo '</table>';
        }

        else {
          echo "Kamu belum membuat pesanan!";
        }





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
