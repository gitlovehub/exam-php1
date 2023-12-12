<?php 

require '../pdo.php';

try {
    # code...
    $sql = "SELECT * FROM customers";

    $stmt = $conn->prepare($sql);
    
    $stmt->execute();
    $allCustomers = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {
    # code...
    echo "ERROR: ". $e->getMessage();
    die();
}