<?php
//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}

include 'config.php';
// include 'orders.php';

if(isset($_SESSION['cart'])) {
  $total = 0;
  foreach($_SESSION['cart'] as $menu_id => $quantity) {
    $result = $mysqli->query("SELECT * FROM user, menu WHERE id = ".$menu_id);
    if($result){
      if($obj = $result->fetch_object()) {
        $cost = $obj->harga * $quantity;
        $user = $_SESSION["username"];
        if ($user = "cafeku1@gmail.com") {
          $idP = 1;
        } elseif ($user = "cafeku2@gmail.com") {
          $idP = 2;
        } elseif ($user = "cafeku3@gmail.com") {
          $idP = 3;
        } elseif ($user = "cafeku4@gmail.com") {
          $idP = 4;
        } elseif ($user = "cafeku5@gmail.com") {
          $idP = 5;
        }
        $query = $mysqli->query("INSERT INTO pesanan (idP, id, kode_login, nama_menu, harga, jumlah, total, email) VALUES('$idP', '$obj->id', '$obj->kode_login', '$obj->nama_menu', $obj->harga, $quantity, $cost, '$user')");

        if($query){
          $newqty = $obj->jumlah - $quantity;
          if($mysqli->query("UPDATE menu SET jumlah = ".$newqty." WHERE id = ".$menu_id)){

          }
        }
      }
    }
  }
}

unset($_SESSION['cart']);
header("location:success.php");

?>
