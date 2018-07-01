<?php
require "php/person.php";
session_start();
require "php/xhtmlheader.php"; ?>
<head>
 <title>vipwell</title>
 <link rel="stylesheet" href="css/header.css" type="text/css" />
</head>

<body>

<div align="right">VOGUE&nbsp;&nbsp;YOUNG&nbsp;&nbsp;PERFECT</div>
<span class="logo">VIPWELL</span>

<span class="option">
<a href="home.php" target="main">Home</a></span>
<?php
if(isset($_SESSION["user"]))
{
 $user = $_SESSION["user"];

 echo "<span class='option'>Willkommen ".$user->forename." ".$user->surname."</span>";
 echo '<a href="logout.php" target="main">';
 echo '<span class="option">logout</span></a>';
 if($user->type=="admin")
 {
 echo '<a href="customers.php" target="main">';
 echo '<span class="option">list customers</span></a>';
 echo '<a href="view_sales.php" target="main">';
 echo '<span class="option">view sales</span></a>';

 } else // Your logged in as user
 {
 echo '<a href="modifypassword.php" target="main">';
 echo '<span class="option">change password</span></a>';
 echo '<span class="option">';
 echo '<img src="img/cart.gif" alt="cart"/>';
 echo '<a href="cart.php" target="main">cart</a>';

 }
 } else // You are not logged in at all
 {
 echo '<a href="login.php" target="main">';
 echo '<span class="option">login</span></a>';
 echo '<a href="register.php" target="main">';
 echo '<span class="option">register</span></a>';
 echo '<span class="option">';
 echo '<img src="img/cart.gif" alt="cart"/>';
 echo '<a href="cart.php" target="main">cart</a>';

 }

?>

</span>
</body>
</html>