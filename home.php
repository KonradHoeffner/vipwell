<?php
require "php/product.php";
require "php/person.php";
session_start();
if(isset($_SESSION["user"])) $user = $_SESSION["user"];
?>
<?php require "php/xhtmlheader.php"; ?>
<head>
 <title>vipwell</title>
 <link rel="stylesheet" href="css/standard.css" type="text/css" />
</head>

<body>
<table cellspacing="20">
<?php
 $products = Product::getAllFromDatabase();
 $_SESSION['products'] = $products;
$column = 0;
foreach($products as $product)
{
 if($column==0) { echo "<tr>"; $open=true;}
 echo "<td>\n";
 echo "<a href='details.php?product_id=$product->id'>\n";
 echo "<img src='img/$product->image_small' alt='$product->name'/><br/>\n";
 echo "$product->name \n";
 echo "</a>\n";
 if(isset($user)&&$user->type=="admin"&&$product->quantity<10) echo "<span style='color:red'>low in stock</span>";
 echo "</td>";
 if($column==2) { echo "</tr>"; $open=false;}
 $column = ($column+1)%3;
}
 if($open) echo "</tr>";
?>
</table>
<?php
if(isset($_SESSION['user'])&&$_SESSION['user']->type=='admin'):
?>
<form method="post" action="newproduct.php">
<input type="submit" name="Add product" value="Add product"/>
<input type="hidden" name="backto" value="home.php"/>

</form>
<?php endif;?>

</body>
</html>