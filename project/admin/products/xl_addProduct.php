<?php
include '../database/database.php';

$code = $_POST['productCode'];
$name = $_POST['productName'];
$category = $_POST['category'];
$description = $_POST['description'];
$inStock = $_POST['inStock'];
$price = $_POST['price'];
$soldQuantity = $_POST['soldQuantity'];
$views = $_POST['views'];
$updateDate = date("Y/m/d",time());
$addProduct = "INSERT INTO products (product_code, product_name, category_id, product_description,
 instock_quantity, price, sold_quantity, views, update_date ) 
VALUES('$code','$name','$category','$description','$inStock','$price', '$soldQuantity','$views', '$updateDate' );";
$pdo->query($addProduct);
// var_dump($addProduct); die();
if ($addProduct) {
    header('location:displayProducts.php');
}
?>