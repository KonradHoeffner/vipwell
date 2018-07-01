<?php session_start(); ?>
<?php require "php/xhtmlheader.php"; ?>
<head>
 <title>vipwell</title>
 <link rel="stylesheet" href="css/standard.css" type="text/css" />
</head>

<body>
<div align="center">
<?php
if(isset($_SESSION['error_register']))
echo "<div class='error'>There were the following problems with your registration:</div>";
?>
<script type="text/javascript" src="js/verify.js"></script>

<form method="post" action="register_verify.php" name="updateform"
 onsubmit="
   document.updateform.first.isMandatory = true;
   document.updateform.last.isMandatory = true;
   document.updateform.login.isMandatory = true;
   document.updateform.password.isMandatory = true;
   document.updateform.first.isAlpha = true;
   document.updateform.last.isAlpha = true;
   document.updateform.password.minLength = 6;
   document.updateform.email.isEmail = true;
   document.updateform.first.description = 'First Name';
   document.updateform.last.description = 'Last Name';
   document.updateform.login.description = 'Login';
   document.updateform.password.description = 'Password';
   document.updateform.email.description = 'Email address';
   return verify(document.updateform);"
>

<table>
<tr><td align="right">First Name</td>
    <td><input type="text" name="first" size="20" /></td>
    <td> &nbsp; </td></tr>
<tr><td align="right">Last Name</td>
    <td><input type="text" name="last" size="20" /></td>
    <td> &nbsp; </td></tr>
<tr><td align="right">Login</td>
    <td><input type="text" name="login" size="20" /></td>
    <td> &nbsp; </td></tr>
<tr><td align="right">Password</td>
    <td><input type="password" name="password" size="20" /></td>
    <td>&nbsp; </td></tr>
<tr><td align="right">Email address</td>
    <td><input type="text" name="email" size="20" /></td>
    <td>&nbsp;</td></tr>
</table>
<br />

<input type="reset"/>
<input type="submit" />
</form>
</div>
</body>
</html>
<?php
unset($_SESSION['error_register']);
?>