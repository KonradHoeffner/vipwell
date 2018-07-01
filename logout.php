<?php
session_start();
session_destroy();
?>
<?php require "php/xhtmlheader.php"; ?>
<head>
 <title>vipwell</title>
 <link rel="stylesheet" href="css/standard.css" type="text/css" />
 <script type="text/javascript" src="js/scripts.js"></script>
</head>

<body onload="setFrame('header.php','header');"> 
<?php
if(isset($_GET['purchase_error']))
{
 $purchase_error = $_GET['purchase_error'];
 echo "<p class='error'>There was a problem with your purchase. $purchase_error</p>";
}
?>

Thank you for your visit.<br/>
<a href="home.php">Keep shopping.</a>
</body>
</html>