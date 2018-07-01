<?php
/* -------------------------------------------------------------

----------------------------------------------------------------*/

require "php/product.php";
session_start();

$backto = $_REQUEST['backto'];

$product = new Product();
$product->set("New Product","0","Insert category here","0","Insert description here","newproduct_small.jpg","newproduct_large.jpg");

$product->insertIntoDatabase();

unset($_SESSION['products']);
$_SESSION['products'] = Product::getAllFromDatabase();

header("Location: $backto".SID);
?>