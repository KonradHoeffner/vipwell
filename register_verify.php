<?php
require "php/person.php";
session_start();
$first = $_POST['first'];
$last = $_POST['last'];
$login = $_POST['login'];
$password = $_POST['password'];
$email = $_POST['email'];

$person = new Person();
$userExists = $person->getFromDatabase($login);

// Login bereits vergeben? Dann Fehlermeldung setzen und abbrechen.
if($userExists)
{
 $_SESSION['error_register'] = "That username is already in use, please enter a different one or append a word or number.";
 header("Location: register.php".SID);
}
// User existiert noch nicht, in die Datenbank einfügen:
$user = new Person();
// Passwort hashen
//$password = sha1($password);
$user->set($first,$last,$login,$password,$email,"user");
$user->insertIntoDatabase();
// Weiterleiten
 header("Location: home.php".SID);
?>