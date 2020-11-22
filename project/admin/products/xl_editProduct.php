<?php
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

    $productDB = new ProductDB;
    $update = $productDB->updateById($productCode, $productName, $category, 
    $description, $inStock, $price, $sold, $views, $id);
    if ($update) {
        header('location:displayProducts.php');
    }
?>