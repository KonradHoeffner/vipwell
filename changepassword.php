<?php
/* -------------------------------------------------------------

----------------------------------------------------------------*/

require "php/person.php";
session_start();
$user = $_SESSION['user'];
$oldpassword =	$_REQUEST["oldpassword"];
$newpassword1 =	$_REQUEST["newpassword1"];
$newpassword2 =	$_REQUEST["newpassword2"];
$backto =	$_REQUEST["backto"];

if($user->password==sha1($oldpassword)&&$newpassword1==$newpassword2)
{
$user->password = sha1($newpassword1);
Person::deleteFromDatabase($user->login);
$user->insertIntoDatabase();
unset($_SESSION['error_password_modify']);
header("Location: logout.php".SID);
} else
{
 $_SESSION['error_password_modify'] = "Wrong password or new passwords do not match";
 header("Location: $backto".SID);
}

?>