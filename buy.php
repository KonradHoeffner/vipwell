<?php
require "php/product.php";
session_start();
$products = Product::getAllFromDatabase();

if(isset($_SESSION['cart']))
$cart = $_SESSION['cart'];
else $cart = array();

require "php/xhtmlheader.php"; ?>
<head>
 <title>vipwell</title>
 <link rel="stylesheet" href="css/standard.css" type="text/css" />
</head>

<body>
<?php
$totalcost = 0;
foreach($cart as $product_id => $amount)
{
  $product = $products["$product_id"];
  $totalcost+= $product->price*$amount;
}
 echo "<p>The total cost is ".Product::formatPrice($totalcost)."</p>";
 ?>
<br/>
<form action="finalisepurchase.php">
Please choose your payment method:<br/>
<input type="radio" name="Zahlmethode" value="bank transfer" checked="checked" /> bank transfer<br/>
<input type="radio" name="Zahlmethode" value="AmericanExpress" />euro cheque <br/>
<input type="radio" name="Zahlmethode" value="Credit Card" />credit card<br/>
<input type="submit" value="Finalise purchase and log out." />
 </form>

</body>
</html>