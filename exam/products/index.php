<?php
require 'mysql/select.php';

session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap 5 MaxCDN link here -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <title>products</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #ddd;
            text-align: left;
            padding: 8px;
        }

        thead {
            background-color: tomato;
        }

        img {
            height: 100px;
            object-fit: cover;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>
            <?php
            if (!empty($_SESSION['key'])) {
                
                echo $_SESSION['key']['username'];
            } else {
                echo 'vui long dang nhap!';
            }
            ?>
        </h1>
        <a class="btn btn-primary my-2" href="create.php">them</a>
        <?php
        if (!empty($_SESSION['key'])) {
            echo '<a class="btn btn-secondary" href="../logout.php">dang xuat</a>';
        } else {
            echo '<a class="btn btn-secondary" href="../login.php">dang nhap</a>';
        }
        ?>
        
        <table>
            <thead>
                <tr>
                    <th class="col-1">id</th>
                    <th>name</th>
                    <th>image</th>
                    <th>price</th>
                    <th>customer</th>
                    <th class="col-1">operations</th>
                </tr>
            </thead>
            <tbody>
                <?php

                if ($result) {
                    foreach ($result as $value) {
                        $id       = $value['p_product_id'];
                        $name     = $value['p_product_name'];
                        $image    = $value['p_product_image'];
                        $price    = $value['p_product_price'];
                        $customer = $value['c_customer_name'];

                        echo '
                    <tr>
                        <th>' . $id        . '</th>
                        <td>' . $name      . '</td>
                        <td>
                            <img src="' . $image . '">  
                        </td>
                        <td>' . $price     . '</td>
                        <td>' . $customer  . '</td>
                        <td>
                            <div class="d-grid gap-2">
                                <a class="btn btn-outline-success" href="edit.php?get_id=' . $id . '">sua</a>
                                <button class="btn btn-outline-danger" onclick="confirmDelete(' . $id . ')">xoa</button>
                            </div>
                        </td>
                    </tr>
                    ';
                    }
                }
                ?>
            </tbody>
        </table>
    </div>

    <script>
        function confirmDelete(id) {
            var result = window.confirm("Delete item?");
            if (result) {
                window.location.href = 'mysql/delete.php?get_id=' + id;
            }
        }
    </script>
</body>

</html>