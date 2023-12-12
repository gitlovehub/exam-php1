<?php 

require '../pdo.php';

try {
    # code...
    $sql = "SELECT * FROM products WHERE product_id = :product_id LIMIT 1";

    $stmt = $conn->prepare($sql);

    $stmt->bindParam(":product_id", $_GET["get_id"]);
    
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
} catch (Exception $e) {
    # code...
    echo "ERROR: ". $e->getMessage();
    die();
}