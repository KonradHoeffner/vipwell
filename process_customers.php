<?php
require "php/person.php";
session_start();
//$ = $_SESSION['persons'];
$operation = $_REQUEST['operation'];

if($operation=="add")
{
 $person = new Person();
 $person->set($_REQUEST['forename'],$_REQUEST['surname'],$_REQUEST['login'],$_REQUEST['password'],$_REQUEST['email'],"user");
 $person->insertIntoDataBase();
}
if($operation=="delete")
{
$login = $_REQUEST['login'];
 Person::deleteFromDatabase($login);
}
if($operation=="modify")
{
$oldLogin = $_REQUEST['login'];
$newForename = $_REQUEST['newforename'];
$newSurname = $_REQUEST['newsurname'];
$newLogin = $_REQUEST['newlogin'];
$newPassword = $_REQUEST['newpassword'];
$newEmail = $_REQUEST['newemail'];
// Password has not changed
if($newPassword=="")
{
$person = new Person();
$person->getFromDatabase($oldLogin);
$person->setWithoutPassword($newForename,$newSurname,$newLogin,$newEmail,"user");
} else
{
$person = new Person();
$person->set($newForename,$newSurname,$newLogin,$newPassword,$newEmail,"user");
}
Person::deleteFromDatabase($oldLogin);
$person->insertIntoDatabase();
}

header("Location: customers.php".SID);
?>
