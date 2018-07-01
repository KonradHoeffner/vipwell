<?php


class Product
{
  public $id;
  public $name;
  public $quantity;
  public $category;
  public $price;
  public $description;
  public $image_small;
  public $image_large;

 static function formatPrice($price)
 {
  $euro = (int)($price/100);
  $cent = $price%100;
  if($cent==0) return "$euro &euro;";
  return "$euro.$cent &euro;";
  }

 function formatOwnPrice()
 {
  return Product::formatPrice($this->price);
 }
 
  function modifyInDatabase()
  {
   require "php/database.php";

   $mysqli = new mysqli($hostName, $userName, $password);
   $mysqli->select_db($dbName);
  // Writelock auf dieses Element erzeugen
   $result = $mysqli->query("LOCK TABLES products WRITE;");
   $query =
   "UPDATE `products` SET `name` = '$this->name',
  `quantity` = '$this->quantity',
  `category` = '$this->category',
  `price` = '$this->price',
  `description` = '$this->description',
  `image_small` = '$this->image_small',
  `image_large` = '$this->image_large' WHERE `products`.`id` = $this->id LIMIT 1 ;";
   //  echo $query;
   $result = $mysqli->query($query);
  // Writelock aufheben
   $result = $mysqli->query("UNLOCK TABLES;");

  }

function insertIntoDatabase()
  {
   require "php/database.php";

   $mysqli = new mysqli($hostName, $userName, $password);
   $mysqli->select_db($dbName);
  // Writelock auf dieses Element erzeugen
   $result = $mysqli->query("LOCK TABLES products WRITE;");
   
   $query =
   "INSERT INTO products(id,name,quantity,category,price,description,image_small,image_large) 
   values(NULL,'$this->name','$this->quantity','$this->category','$this->price','$this->description','$this->image_small','$this->image_large');";
   $result = $mysqli->query($query);
  // Writelock aufheben
   $result = $mysqli->query("UNLOCK TABLES;");
  }
  
  function createFromDatabaseEntry($entry)
  {
   $this->id = $entry['id'];
   $this->name = $entry['name'];
   $this->quantity = $entry['quantity'];
   $this->category = $entry['category'];
   $this->price = $entry['price'];
   $this->description = $entry['description'];
   $this->image_small = $entry['image_small'];
   $this->image_large = $entry['image_large'];
  }

   static function getAllFromDatabase()
   {
   require "php/database.php";
   $mysqli = new mysqli($hostName, $userName, $password);
   $mysqli->select_db($dbName);
   $result = $mysqli->query("LOCK TABLES products READ;");
   $productEntrys = $mysqli->query("SELECT * FROM products ORDER BY `category` ASC ");
   $result = $mysqli->query("UNLOCK TABLES;");
   unset($products);

   while($productEntry = $productEntrys->fetch_array())
   {
    $product = new Product();
    $product->createFromDatabaseEntry($productEntry);
    $products[$product->id]=$product;
   }
   return $products;

  }

  function getFromDatabase($id)
  {
   require "php/database.php";
   $mysqli = new mysqli($hostName, $userName, $password);
   $mysqli->select_db($dbName);
   $result = $mysqli->query("LOCK TABLES products READ;");
   $productEntrys = $mysqli->query("SELECT * FROM products WHERE id='$id'");
   $result = $mysqli->query("UNLOCK TABLES;");
   $productEntry = $productEntrys->fetch_array();
   if(!$productEntry) return false;
   $this->createFromDatabaseEntry($productEntry);
   return true;
  }

  function set($name,$quantity,$category,$price,$description,$image_small,$image_large)
  {
    $this->name = $name;
    $this->quantity = max(0,$quantity);
    $this->category = $category;
    $this->price = $price;
    $this->description = $description;
    $this->image_small = $image_small;
    $this->image_large = $image_large;
  }

}

?>
