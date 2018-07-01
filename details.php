<?php
require "php/product.php";
require "php/person.php";
session_start();
$products = Product::getAllFromDatabase();

$product = $products[$_REQUEST["product_id"]];
if(isset($_SESSION["user"])) $user = $_SESSION["user"];

?>
<?php require "php/xhtmlheader.php"; ?>
<head>
 <title>vipwell</title>
 <link rel="stylesheet" href="css/standard.css" type="text/css" />
</head>

<body>

<table cellspacing="30">
<tr>
<td>
<img src="img/<?=$product->image_large?>" alt="$product->name"/>
</td>
<td>
<!-- Admin ******************************************** -->
<?php if(isset($user)&&$user->type=="admin"){ ?>
<form method="post" action="changeproduct.php">
<table border="0" cellspacing="5">
<tr>
<td>Name</td>
<td><input type="text" name="name"		value="<?=$product->name ?>"/></td>
</tr><tr>
<td>Quantity</td>
<td><input type="text" name="quantity"		value="<?=$product->quantity ?>"/></td>
</tr><tr>
<td>Category</td>
<td><input type="text" name="category"		value="<?=$product->category ?>"/></td>
</tr><tr>
<td>Price</td>
<td><input type="text" name="price"		value="<?=$product->price ?>"/></td>
</tr><tr>
<td>Description</td>
<td><input type="text" name="description"	value="<?=$product->description ?>"/></td>
</tr><tr>
<td>Small Image filename (300x200)</td>
<td><input type="text" name="image_small"	value="<?=$product->image_small ?>"/></td>
</tr><tr>
<td>Large Image filename (600x400)</td>
<td><input type="text" name="image_large"	value="<?=$product->image_large ?>"/></td>
</tr>
</table>
<input type="hidden" name="backto"	value="<?php echo "details.php?product_id=$product->id"; ?>"/>
<input type="hidden" name="id"		value="<?=$product->id ?>"/>
<input type="submit" value="Change product." />
</form>
<!-- Customer ******************************** -->
<?php } // endif
else {?>
<h2><?=$product->name ?> </h2>
Category: <?=$product->category ?><br/>
Price: <?=$product->formatOwnPrice() ?><br/><br/> 

<form method="post" action="changecart.php">
<?php if(isset($_SESSION['cart']["$product->id"]))echo $_SESSION['cart']["$product->id"]." times in your cart.<br/>" ?>

<input type="hidden" name="product_id" value="<?=$product->id ?>"/>
<input type="hidden" name="amount"     value="1"/>
<input type="hidden" name="method"     value="relative"/>
<input type="hidden" name="backto"     value="<?php echo "details.php?product_id=$product->id"; ?>"/>
<input type="submit" value="Add to shopping cart." />
</form>
</td>
</tr>
<tr><td>
<?php
echo $product->description;
}
?>
</td></tr>
</table>
</body>
</html>