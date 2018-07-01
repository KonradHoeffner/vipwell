<?php
/* -------------------------------------------------------------
Makes changes which items are in the customers cart and in what amount
@product_id: The id of the product you want to change in the customers cart
@amount: The amount you want to change (an integer number, possibly negative).
If the resulting amount is <=0, the item will be removed from the cart.
@method: Specifies whether you want to set the amount this item occurs in a cart (method="absolute")
or if you want to add "amount" items of that type to it (method="relative")
@backto: As this page does not do any (X)HTML output, it sends the user back to where he came from after doing the changes.
The parameter backto specifies which page to send the user to.
----------------------------------------------------------------*/

require "php/product.php";
session_start();
$product_id = $_REQUEST["product_id"];
$amount = $_REQUEST["amount"];
$method = $_REQUEST["method"];
$backto = $_REQUEST["backto"];

if($method=="relative"&&isset($_SESSION['cart']["$product_id"]))
 $_SESSION['cart']["$product_id"] += $amount;

else $_SESSION['cart']["$product_id"] = $amount;

if($_SESSION['cart']["$product_id"] <= 0) unset($_SESSION["cart"]["$product_id"]);

header("Location: $backto".SID);
?>