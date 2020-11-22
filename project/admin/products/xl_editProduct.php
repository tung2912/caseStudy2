<?php
    // include '../database/database.php';
    require_once '../../database/product.php';
    $id = $_POST['id'];

    $productCode = $_POST['productCode'];
    $productName = $_POST['productName'];
    $category = $_POST['category'];
    $description = $_POST['description'];
    $inStock = $_POST['inStock'];
    $price = $_POST['price'];
    $sold = $_POST['sold'];
    $views = $_POST['view'];
    $updateDate = "now()";

    $productDB = new ProductDB;
    $update = $productDB->updateById($productCode, $productName, $category, 
    $description, $inStock, $price, $sold, $views, $updateDate, $id);
    // $update = "UPDATE products
    // SET product_code = '$productCode', product_name = '$productName',
    // category_id = '$category', product_description = '$description', 
    // instock_quantity = '$inStock',
    // price = '$price',sold_quantity = '$sold',
    // views = '$views', update_date = '$updateDate'
    // WHERE product_code = '$id'";
    // $pdo->query($update);
    if ($update) {
        header('location:displayProducts.php');
    }
?>