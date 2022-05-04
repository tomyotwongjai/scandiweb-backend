<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET, POST,DELETE");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include 'db_connection.php';

$objDb = new DbConnect;
$conn = $objDb->connect();


 $method = $_SERVER['REQUEST_METHOD'];
 switch($method) {
  case "POST" : 
      $product = json_decode(file_get_contents("php://input"));
      $sql = "INSERT INTO products(id, sku, name, price, size, height, width, length, weight) VALUES(:id, :sku, :name, :price, :size, :height, :width, :length, :weight)";
         $stmt = $conn->prepare($sql);
           $stmt->bindParam(':id', $product->id);
         $stmt->bindParam(':sku', $product->sku);
         $stmt->bindParam(':name', $product->name);
         $stmt->bindParam(':price', $product->price);
         $stmt->bindParam(':size', $product->size);
         $stmt->bindParam(':height', $product->height);
        $stmt->bindParam(':width', $product->width);
         $stmt->bindParam(':length', $product->length);
         $stmt->bindParam(':weight', $product->weight);
      if($stmt->execute()) {
          $response = [
              'status' => 1,
              'message' => 'Product Added Successfully'
          ];
      }else {
          $response = [
              'status' => 0,
              'message' => 'Product Not Added'
          ];
      }
      echo json_encode($response);
      break;

       case "GET": 
      $sql = "SELECT * FROM products";
      $stmt = $conn->prepare($sql);
      $stmt->execute();
      $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
      echo json_encode($products);
      break;

      case "DELETE" :
        $sql = "DELETE  FROM products WHERE id = :id";
         $path = explode('/', $_SERVER['REQUEST_URI']);
         $stmt = $conn->prepare($sql);
          $stmt->bindParam(':id', $path[3]);
      

         if($stmt->execute()) {
             $response = [
                 'status' => 1,
                 'message' => 'Product Deleted Successfully'
             ];
         }else {
             $response = [
                 'status' => 0,
                 'message' => 'Product Not Deleted'
             ];
         }
      echo json_encode($response);
      break;   
      
 }