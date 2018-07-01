<?php
require "php/person.php";
session_start();
$user = $_SESSION['user'];

require "php/xhtmlheader.php"; ?>
<head>
 <title>vipwell</title>
 <link rel="stylesheet" href="css/standard.css" type="text/css" />
</head>

<body>
<?php  if(isset($_SESSION['error_password_modify']))
{
 echo "<div class='error'>".$_SESSION['error_password_modify']."</div>";
 unset($_SESSION['error_password_modify']);
}
?>

<form method="post" action="changepassword.php">
<input type="hidden" name="backto" value="modifypassword.php" />
<table border="1">
<tr>
<td>old password</td>
<td>new password</td>
<td>new password (confirmation)</td>
</tr>
<tr>
<td><input type="password" name="oldpassword" value="" /></td>
<td><input type="password" name="newpassword1" value="" /></td>
<td><input type="password" name="newpassword2" value="" /></td>
</tr>
<tr><td><input type="submit" value="Change password"/></td></tr>
</table>

</form>
</body>
</html>