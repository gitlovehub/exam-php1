<?php 

require '../pdo.php';

try {
    # code...
    $sql = "SELECT
            p.product_id    as p_product_id,
            p.product_name  as p_product_name,
            p.product_image as p_product_image,
            p.product_price as p_product_price,
            c.customer_name as c_customer_name
            FROM products as p
            INNER JOIN customers as c
            ON c.customer_id = p.customer_id ORDER BY p.product_id ASC;";

    $stmt = $conn->prepare($sql);
    
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {
    # code...
    echo "ERROR: ". $e->getMessage();
    die();
}