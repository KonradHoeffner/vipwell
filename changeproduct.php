<?php
/* -------------------------------------------------------------

----------------------------------------------------------------*/

require "php/product.php";
session_start();
$id =		$_REQUEST["id"];
$name =		$_REQUEST["name"];
$quantity =	$_REQUEST["quantity"];
$category =	$_REQUEST["category"];
$price =		$_REQUEST["price"];
$description =	$_REQUEST["description"];
$image_large =	$_REQUEST["image_large"];
$image_small =	$_REQUEST["image_small"];
$backto =	$_REQUEST["backto"];

$product = $_SESSION['products']["$id"];
$product->set($name,$quantity,$category,$price,$description,$image_small,$image_large);
$product->modifyInDatabase();

header("Location: $backto".SID);
?>