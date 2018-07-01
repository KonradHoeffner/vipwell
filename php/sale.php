<?php

// no locks needed because only write accesses with elements of different primary keys
// (each user only creates sale entrys marked with his login)

class Sale
{

  public $person_login;
  public $product_id;
  public $quantity;
  public $timestamp;


  function createFromDatabaseEntry($entry)
  {
  $this->person_login=$entry['person_login'];
  $this->product_id=$entry['product_id'];
  $this->quantity=$entry['quantity'];
  $this->timestamp=$entry['timestamp'];
  }

   static function getAllFromDatabase()
   {
   require "php/database.php";
   $mysqli = new mysqli($hostName, $userName, $password);
   $mysqli->select_db($dbName);
   $saleEntrys = $mysqli->query("SELECT * FROM sales ORDER BY timestamp ASC");
   unset($sales);
   $sales = array();
   while($saleEntry = $saleEntrys->fetch_array())
   {
    $sale = new Sale();
    $sale->createFromDatabaseEntry($saleEntry);
    $sales[]=$sale;
   }
   return $sales;
  }

  function insertIntoDatabase()
  {
   require "php/database.php";
   $mysqli = new mysqli($hostName, $userName, $password);
   $mysqli->select_db($dbName);
   $result = $mysqli->query("INSERT INTO sales(person_login,product_id,quantity,timestamp) values('$this->person_login','$this->product_id','$this->quantity','$this->timestamp')");
  }

  function set($person_login,$product_id,$quantity)
  {
   $this->person_login = $person_login;
   $this->product_id = $product_id;
   $this->quantity = $quantity;
   $this->timestamp = time();
   }
/*  function getFromDatabase($id)
  {
   require "php/database.php";
   $mysqli = new mysqli($hostName, $userName, $password);
   $mysqli->select_db($dbName);
   $personEntrys = $mysqli->query("SELECT * FROM persons WHERE login='$login'");
   $personEntry = $personEntrys->fetch_array();
   if(!$personEntry) return false;
   $this->createFromDatabaseEntry($personEntry);
   return true;
  }
*/


/*  function __construct($name,$description,$image_small,$image_large,$quantity,$category,$price)
  {
    $this->name = $name;
    $this->description = $description;
    $this->image_small = $image_small;
    $this->image_large = $image_large;
    $this->quantity = $quantity;
    $this->category = $category;
    $this->price = $price;
  }*/

  function __destruct()
  {
  }
}

?>
