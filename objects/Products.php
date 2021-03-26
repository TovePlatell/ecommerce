<?php

//include('../../config/dbConnection.php');//database connection

class Product{

  //object properties
  
  public $product_id;
  public $product_name;
  public $product_desc;
  public $product_price;

   // db connection
  private $db_Connection;

  function __construct($db){

  $this->db_Connection = $db;  //db är våran pdo koppling
}

  
// methods

function createProducts($product_name_IN, $product_desc_IN, $product_price_IN){


  
  $sql = "INSERT INTO products (product_name, product_desc, price) VALUES (:product_name_IN, :product_desc_IN, :product_price_IN)"; 

  $stm = $this->db_Connection->prepare($sql);

  $stm->bindParam(":product_name_IN", $product_name_IN);
  $stm->bindParam(":product_desc_IN", $product_desc_IN);
  $stm->bindParam(":product_price_IN", $product_price_IN);

  //return $stm->execute();

  if($stm->execute()){

    echo "Created product sucessfully";
    die();
  }
}



function DeleteProduct($product_id){

  $sql = "DELETE FROM products where product_id = :product_id_IN";

  $stm = $this->db_Connection->prepare($sql);
  $stm->bindParam(":product_id_IN", $product_id);
  $stm->execute();

   if($stm->rowCount() > 0){

      //echo "$product_id is removed";
   } 
  

}

function UpdateProduct($changeProduct, $product_name, $product_desc, $product_price, $product_id){

  $sql = "UPDATE products SET $changeProduct WHERE product_id = :product_id";

  $stm = $this->db_Connection->prepare($sql);
  $stm->bindParam(":product_id", $product_id);

  if($product_name != false){
      $stm->bindParam(":product_name", $product_name);
  }
  
  if($product_desc != false){
      $stm->bindParam(":product_desc", $product_desc);
  }

  if($product_price != false){
      $stm->bindParam(":product_price", $product_price);
  }

  $stm->execute();

}



// anders kod
function ShowAllProducts() {
  $sql = "SELECT product_id, product_name, product_desc, price FROM products";
  $stm = $this->db_Connection->prepare($sql);
  $stm->execute();
  return json_encode($stm->fetchAll(PDO::FETCH_ASSOC));
}
}



