<?php

class Person

{

  public $forename;
  public $surname;
  public $login;
  public $password;
  public $email;
  public $type;

  function createFromDatabaseEntry($entry)
  {
   $this->forename = $entry['forename'];
   $this->surname = $entry['surname'];
   $this->login = $entry['login'];
   $this->password = $entry['password'];
   $this->email = $entry['email'];
   $this->type = $entry['type'];
  }

  function getFromDatabase($login)
  {
   require "php/database.php";
   $mysqli = new mysqli($hostName, $userName, $password);
   $mysqli->select_db($dbName);
   $result = $mysqli->query("LOCK TABLES persons READ;");
   $personEntrys = $mysqli->query("SELECT * FROM persons WHERE login='$login'");
   $personEntry = $personEntrys->fetch_array();
   $result = $mysqli->query("UNLOCK TABLES;");
   if(!$personEntry) return false;
   $this->createFromDatabaseEntry($personEntry);
   return true;
  }

   static function getAllFromDatabase()
   {
   require "php/database.php";
   $mysqli = new mysqli($hostName, $userName, $password);
   $mysqli->select_db($dbName);
   $result = $mysqli->query("LOCK TABLES persons READ;");
   $personEntrys = $mysqli->query("SELECT * FROM persons");
   $result = $mysqli->query("UNLOCK TABLES;");
   unset($persons);
   $persons = array();
   while($personEntry = $personEntrys->fetch_array())
   {
    $person = new Person();
    $person->createFromDatabaseEntry($personEntry);
    $persons[]=$person;
   }
   return $persons;
  }

   static function getAllCustomersFromDatabase()
   {
   require "php/database.php";
   $mysqli = new mysqli($hostName, $userName, $password);
   $mysqli->select_db($dbName);
   $result = $mysqli->query("LOCK TABLES persons READ;");
   $personEntrys = $mysqli->query("SELECT * FROM persons where type='user'");
   $result = $mysqli->query("UNLOCK TABLES;");
   unset($persons);
   $persons = array();
   while($personEntry = $personEntrys->fetch_array())
   {
    $person = new Person();
    $person->createFromDatabaseEntry($personEntry);
    $persons[$person->login]=$person;
   }
   return $persons;
  }

   function insertIntoDatabase()
  {
   // no lock, only one sql statement
   require "php/database.php";
   $mysqli = new mysqli($hostName, $userName, $password);
   $mysqli->select_db($dbName);
   $result = $mysqli->query("INSERT INTO persons(forename,surname,login,password,email,type) values('$this->forename','$this->surname','$this->login','$this->password','$this->email','$this->type')");
  }

   static function deleteFromDatabase($login)
  {

   require "php/database.php";
   $mysqli = new mysqli($hostName, $userName, $password);
   $mysqli->select_db($dbName);
   $result = $mysqli->query("LOCK TABLES persons WRITE;");
   $result = $mysqli->query("DELETE FROM persons WHERE login='$login'");
   $result = $mysqli->query("UNLOCK TABLES;");
  }


  function set($forename,$surname,$login,$password,$email,$type)
  {
   $this->forename = $forename;
   $this->surname = $surname;
   $this->login = $login;
   $this->password = sha1($password);
   $this->email = $email;
   $this->type = $type;
   }

  // Leaves Password unchanged
  function setWithoutPassword($forename,$surname,$login,$email,$type)
  {
   $this->forename = $forename;
   $this->surname = $surname;
   $this->login = $login;
   $this->email = $email;
   $this->type = $type;
   }

  function __destruct()
  {
  }
}

/*
  $graf = new Person("Steffi", "Graf", 37);
  echo $graf->format() . "<br /> \n";

  $becker = new Person("Boris", "Becker", 39);
  echo $becker->format() . "<br /> \n";

  unset($becker);

  $schroeder = new Student("Holger", "Schroeder", 29, "Heyer");
  echo $schroeder->format() . "<br /> \n";

  $student = clone $schroeder;
  $student->setAge(19); */
?>
