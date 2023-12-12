<?php 

require '../../pdo.php';

try {
    # code...
    $sql = "UPDATE products
            SET
            product_name   = :product_name,
            product_image  = :product_image,
            product_price  = :product_price,
            customer_id    = :customer_id WHERE product_id = :product_id";

    $stmt = $conn->prepare($sql);
    
    $stmt->bindParam(":product_id"   , $_POST["key"]);
    $stmt->bindParam(":product_name" , $_POST["ten"]);
    $stmt->bindParam(":product_price", $_POST["gia"]);
    $stmt->bindParam(":customer_id"  , $_POST["khach"]);

    $img = $_FILES['hinh'] ?? null;
    $pathSaveDB = $_POST["img-current"];
    if ($img) { 
        $pathUpload = __DIR__ . '/../uploads/' . $img['name'];
        if (move_uploaded_file($img['tmp_name'], $pathUpload)) {
            $pathSaveDB = 'uploads/' . $img['name'];
        }
    }
    $stmt->bindParam(':product_image' , $pathSaveDB);

    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    header("Location: ../index.php");
} catch (Exception $e) {
    # code...
    echo "ERROR: ". $e->getMessage();
    die();
}