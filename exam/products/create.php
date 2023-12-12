<?php
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

    <title>create</title>
</head>

<body>
    <div class="container col-lg-4 col-md-8">
        <h1 class="text-center">create</h1>
        <form action="mysql/insert.php" method="post" enctype="multipart/form-data">
            <!-- combo box -->
            <label for="khach">customer:</label>
            <select class="form-control" name="khach" id="khach">
                <?php foreach ($allCustomers as $value) : ?>
                    <option value="<?= $value['customer_id'] ?>">
                        <?= $value['customer_name'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <br>
            <label for="ten">name:</label>
            <input class="form-control" type="text" name="ten" id="ten">
            <br>
            <label for="gia">price:</label>
            <input class="form-control" type="number" name="gia" id="gia">
            <br>
            <label for="hinh">image:</label>
            <input class="form-control" type="file" name="hinh" id="hinh">
            <br>
            <div class="d-grid">
                <button class="btn btn-primary" type="submit">add</button>
            </div>
        </form>
    </div>
</body>

</html>