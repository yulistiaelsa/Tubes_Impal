<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}

include 'config.php';

$menu_id = $_GET['id'];
$action = $_GET['action'];


if($action === 'empty')
  unset($_SESSION['cart']);

$result = $mysqli->query("SELECT jumlah FROM menu WHERE id = ".$menu_id);


if($result){

  if($obj = $result->fetch_object()) {

    switch($action) {

      case "add":
      if($_SESSION['cart'][$menu_id]+1 <= $obj->jumlah)
        $_SESSION['cart'][$menu_id]++;
      break;

      case "remove":
      $_SESSION['cart'][$menu_id]--;
      if($_SESSION['cart'][$menu_id] == 0)
        unset($_SESSION['cart'][$menu_id]);
        break;

    }
  }
}



header("location:cart.php");

?>
