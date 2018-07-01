<?php session_start(); ?>
<?php require "php/xhtmlheader.php"; ?>
<head>
 <title>vipwell</title>
 <link rel="stylesheet" href="css/standard.css" type="text/css" />
</head>

<body>
<?php
if(isset($_SESSION['error_login']))
echo '<div class="error">There were the following problems with your login procedure:</div>';
?>

<script type="text/javascript" src="js/verify.js"></script>

<form name="loginform" action="login_verify.php" method="post"
 onsubmit="
   document.loginform.login.isMandatory = true;
   document.loginform.password.isMandatory = true;
   document.loginform.login.description = 'Login';
   document.loginform.password.description = 'Passwort';
   return verify(document.loginform);"
>
 <table align="center">
 <?php if(isset($_SESSION['error_login'])) echo "<tr><td>".$_SESSION['error_login']."</td></tr>"; ?>
 <tr><td>Login: </td><td><input type="text" name="login"/></td></tr>
 <tr><td>Password: </td><td><input type="password" name="password"/></td></tr>
 <tr><td>&nbsp;</td><td><input type="reset" name="reset"/></td></tr>
 <tr><td>&nbsp;</td><td><input type="submit" name="submit"/></td></tr>
 </table>
 </form>
</body>
</html>
<?php

unset($_SESSION['error_login']);
?>