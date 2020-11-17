<?php
    include '../database/database.php';
    $id = $_POST['id'];
    $productCode = $_POST['productCode'];
    $productName = $_POST['productName'];
    $category = $_POST['category'];
    $description = $_POST['description'];
    $inStock = $_POST['inStock'];
    $price = $_POST['price'];
    $sold = $_POST['sold'];
    $views = $_POST['view'];
    $updateDate = date("Y/m/d");
    $update = "UPDATE products
    SET product_code = '$productCode', product_name = '$productName',
    category_id = '$category', product_description = '$description', 
    instock_quantity = '$inStock',
    price = '$price',sold_quantity = '$sold',
    views = '$views', update_date = '$updateDate'
    WHERE product_code = '$id'";
    // var_dump($update);die();
    $pdo->query($update);
    // var_dump($pdo->query($update));die();
    if ($update) {
        header('location:displayProducts.php');
    }
?>