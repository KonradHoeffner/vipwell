<?php
require "php/person.php";
session_start();

$login = $_POST['login'];
$password = $_POST['password'];
// Hash bilden
$digest = sha1($password);
$person = new Person();
$userExists = $person->getFromDatabase($login);
$loginSuccessful = false;
if($userExists)
{
 if($digest==$person->password)
 {
  $_SESSION['user'] = $person;
  $loginSuccessful = true;
  unset($_SESSION['error_login']);
 } else $_SESSION['error_login'] = "Password does not match. Please check spelling.";
} else $_SESSION['error_login'] = "User not found. Please check spelling or register.";
?>
<?php require "php/xhtmlheader.php"; ?>
<head>
<link rel="stylesheet" href="css/standard.css" type="text/css" />
<script type="text/javascript" src="js/scripts.js"></script>
</head>
<body onload="
<?php
if($loginSuccessful)
{
echo "setFrame('header.php','header');";
echo "setFrame('home.php','main');";

} else echo "redirect('login.php');";
?>

">

</body>
</html>

<?php /*
header("Location: index.html".SID);
http_redirect("home.php",true);
*/
?>