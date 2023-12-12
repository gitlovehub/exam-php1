<?php 

require '../../pdo.php';

try {
    # code...
    $sql = " INSERT INTO products
            (product_id, product_name, product_image, product_price, customer_id)
            VALUE (:product_id, :product_name, :product_image, :product_price, :customer_id);";

    $stmt = $conn->prepare($sql);
    
    $stmt->bindParam("product_id"   , $_POST["ma"]);
    $stmt->bindParam("product_name" , $_POST["ten"]);
    $stmt->bindParam("product_price", $_POST["gia"]);
    $stmt->bindParam("customer_id"  , $_POST["khach"]);

    $img = $_FILES['hinh'] ?? null;
    $pathSaveDB = '';
    // Xử lý upload ảnh
    if ($img) { // Khi mà có upload ảnh lên thì mới xử lý upload
        $pathUpload = __DIR__ . '/../uploads/' . $img['name'];
        // Upload file lên để lưu trữ
        if (move_uploaded_file($img['tmp_name'], $pathUpload)) {
            $pathSaveDB = 'uploads/' . $img['name'];
        }
    }
    $stmt->bindParam(':product_image', $pathSaveDB);

    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    header("Location: ../index.php");
} catch (Exception $e) {
    # code...
    echo "ERROR: ". $e->getMessage();
    die();
}