<?php
require 'mysql/get-id.php';
require 'mysql/get-all.php';

session_start();

if (empty($_SESSION['key'])) {
    header('location: ../login.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap 5 MaxCDN link here -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <title>update</title>
</head>

<body>
    <div class="container col-lg-4 col-md-8">
        <h1 class="text-center">update</h1>
        <form action="mysql/update.php" method="post" enctype="multipart/form-data">

            <input type="hidden" name="key" value="<?= $_GET["get_id"] ?>">

            <!-- combobox -->
            <label for="khach">customer:</label>
            <select class="form-control" name="khach" id="khach">
                <?php foreach ($allCustomers as $value) : ?>
                    <option <?= $value['customer_id'] == $result['customer_id'] ? 'selected' : '' ?>
                    value="<?= $value['customer_id'] ?>">
                        <?= $value['customer_name'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <br>
            <label for="ten">name:</label>
            <input class="form-control" type="text" name="ten" id="ten" value="<?= $result['product_name'] ?>">
            <br>
            <label for="gia">price:</label>
            <input class="form-control" type="number" name="gia" id="gia" value="<?= $result['product_price'] ?>">
            <br>
            <label for="hinh">image:</label>
            <input class="form-control" type="file" name="hinh" id="hinh">
            <!-- show img -->
            <input type="hidden" name="img-current" value="<?= $result['product_image'] ?>">      
            <img src="<?= $result['product_image'] ?>" width="150px" height="150px" class="my-4">        
            
            <div class="d-grid">
                <button class="btn btn-primary" type="submit">save</button>
            </div>
        </form>
    </div>
</body>

</html>