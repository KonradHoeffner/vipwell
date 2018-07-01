<?php
require "php/person.php";
session_start();
require "php/xhtmlheader.php";
unset($customers);
$customers = Person::getAllCustomersFromDatabase();
?>

<head>
 <title>vipwell</title>
 <link rel="stylesheet" href="css/standard.css" type="text/css" />
</head>

<body>


<table border="1">
<tr>
<td>Forename</td>
<td>Surname</td>
<td>Login</td>
<td>Password</td>
<td>Email</td>
<td>&nbsp;</td>
</tr>

<?php foreach ($customers as $person): ?>
<tr>
<form method="post" action="process_customers.php">
<input type="hidden" name="login" value="<?=$person->login ?> " />
<input type="hidden" name="operation" value="modify" />
<td><input type="text" name="newforename" value="<?=$person->forename?>" /></td>
<td><input type="text" name="newsurname" value="<?=$person->surname?>" /></td>
<td><input type="text" name="newlogin" value="<?=$person->login?>" /></td>
<td><input type="password" name="newpassword" value="" /></td>
<td><input type="text" name="newemail" value="<?=$person->email?>" /></td>
<td><input type="submit" name="modify" value="Modify" />
</form>
<a href="process_customers.php?login=<?=$person->login?>&operation=delete">
<input type="button" value="Delete"/></td>
</a>
</tr>

<?php endforeach; ?>

<tr>
<form method="post" action="process_customers.php">
<input type="hidden" name="operation" value="add" />
<td><input type="text" name="forename" value="" /></td>
<td><input type="text" name="surname" value="" /></td>
<td><input type="text" name="login" value="" /></td>
<td><input type="password" name="password" value="" /></td>
<td><input type="text" name="email" value="" /></td>
<td><input type="submit" name="newperson,add" value="Add new Customer" /></td>
</form>
</tr>

</form>
</table>
</body>
</html>