<?php
require "php/person.php";
require "php/product.php";
require "php/sale.php";
session_start();
$products = Product::getAllFromDatabase();

if(isset($_SESSION['cart']))
$cart = $_SESSION['cart'];
else $cart = array();
$user = $_SESSION["user"];
$error="";
foreach($cart as $product_id => $quantity)
{
  if($quantity>$products["$product_id"]->quantity) $error="Some products you have chosen are not enough in stock. You may have to wait until these products arrive. ";
  $sale = new Sale();
  $sale->set($user->login,$product_id,$quantity);
  $sale->insertIntoDatabase();
}

$_SESSION['cart'] = array();
if($error=="") header("Location: logout.php".SID);
else header("Location: logout.php?purchase_error=$error".SID);
?>