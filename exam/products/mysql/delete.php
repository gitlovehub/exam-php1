<?php 

require '../../pdo.php';

session_start();

if (empty($_SESSION['key'])) {
    header('location: ../../login.php');
    exit();
}

try {
    # code...
    $id = $_GET["get_id"];

    $sql = "DELETE FROM products WHERE product_id = $id";

    $stmt = $conn->prepare($sql);
    
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    header("Location: ../index.php");
} catch (Exception $e) {
    # code...
    echo "ERROR: ". $e->getMessage();
    die();
}