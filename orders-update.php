<?php
//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}

include 'config.php';

if(isset($_SESSION['cart'])) {
  $total = 0;
  foreach($_SESSION['cart'] as $menu_id => $quantity) {
    $result = $mysqli->query("SELECT * FROM menu WHERE id = ".$menu_id);
    if($result){
      if($obj = $result->fetch_object()) {
        $cost = $obj->harga * $quantity;
        $user = $_SESSION["username"];
        $query = $mysqli->query("INSERT INTO pesanan (kode_menu, nama_menu, desk_menu, harga, jumlah, total, email) VALUES('$obj->kode_menu', '$obj->nama_menu', '$obj->desk_menu', $obj->harga, $quantity, $cost, '$user')");

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
