<?php
require "php/product.php";
require "php/sale.php";
require "php/person.php";
session_start();
?>
<?php require "php/xhtmlheader.php"; ?>
<head>
 <title>vipwell</title>
 <link rel="stylesheet" href="css/standard.css" type="text/css" />
</head>

<body>
<table border="1">
<tr>
<td>Customer</td>
<td>Product</td>
<td>Quantity</td>
<td>Time</td>
</tr>
<?php
unset($sales);
$sales = Sale::getAllFromDatabase();

foreach ($sales as $sale)
{
 $person = new Person();
 $person->getFromDataBase($sale->person_login);
 $product = new Product();
 $product->getFromDatabase($sale->product_id);
 echo "<tr>";
 echo "<td>".$person->forename." ".$person->surname."</td>";
 echo "<td>".$product->name."</td>";
 echo "<td>".$sale->quantity."</td>";
 echo "<td>".date("D M j G:i:s",$sale->timestamp) ."</td>";
 echo "</tr>";

 }
?>
</table>
</body>
</html>