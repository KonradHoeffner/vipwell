<?php
require "php/product.php";
session_start();
$products = Product::getAllFromDatabase();
if(isset($_SESSION['cart']))
$cart = $_SESSION['cart'];
else $cart = array();
?>
<?php require "php/xhtmlheader.php"; ?>
<head>
 <title>vipwell</title>
 <link rel="stylesheet" href="css/standard.css" type="text/css" />
</head>

<body>
<h2>Your shopping cart</h2>
<table cellspacing="15" border="0">
<tr style="font-weight:bold;">

<td>Name</td>
<td>Amount</td>
<td>Price each</td>
<td>Price total</td>

</tr>
<?php
foreach($cart as $product_id => $amount): 
 $product = $products["$product_id"];  ?>
 <tr>
 <td><?=$product->name ?></td>
 <td><?=$amount ?></td>
 <td><?=$product->formatOwnPrice() ?></td>
 <td><?=Product::formatPrice($product->price*$amount) ?></td>

 <td>
 <form action="changecart.php">
 <input type="hidden" name="amount" value="1" />
 <input type="hidden" name="method" value="relative" />
 <input type="hidden" name="backto" value="cart.php" />
 <input type="hidden" name="product_id" value="<?=$product_id ?>" />
 <input type="submit" value="+" />
 </form>
 </td>

 <td>
 <form action="changecart.php">
 <input type="hidden" name="amount" value="-1" />
 <input type="hidden" name="method" value="relative" />
 <input type="hidden" name="backto" value="cart.php" />
 <input type="hidden" name="product_id" value="<?=$product_id ?>" />
 <input type="submit" value="-" />
 </form>
 </td>

 <td>
 <form action="changecart.php">
 <input type="hidden" name="amount" value="0" />
 <input type="hidden" name="method" value="absolute" />
 <input type="hidden" name="backto" value="cart.php" />
 <input type="hidden" name="product_id" value="<?=$product_id ?>" />
 <input type="submit" value="Remove All" />
 </form>
 </td>

 <?php endforeach; ?>
 <tr><td>
<?php if(isset($_SESSION['user'])&&count($cart)>=1): ?>
 <form action="buy.php">
 <input type="submit" value="Buy" />
 </form>
<?php endif;?>
 </td></tr>
 </table>

</body>
</html>