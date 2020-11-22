<?php

require_once '../../database/product.php';

$product_code = $_POST['productCode'];
$product_name = $_POST['productName'];
$category_id = $_POST['category'];

$instock_quantity = $_POST['inStock'];
$price = $_POST['price'];

$productDB = new ProductDB;
$addProduct = $productDB->insert($product_code, $product_name,$category_id, $instock_quantity, $price);
if ($addProduct) {
    header('location:displayProducts.php');
}
?>