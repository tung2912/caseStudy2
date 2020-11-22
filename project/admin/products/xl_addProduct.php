<?php
// include '../database/database.php';
require_once '../../database/product.php';

$product_code = $_POST['productCode'];
$product_name = $_POST['productName'];
$category_id = $_POST['category'];
// $description = $_POST['description'];
$instock_quantity = $_POST['inStock'];
$price = $_POST['price'];
// $soldQuantity = $_POST['soldQuantity'];
// $views = $_POST['views'];
// $updateDate = date("Y/m/d",time());
// $addProduct = "INSERT INTO products (product_code, product_name, category_id,
//  instock_quantity, price) 
// VALUES('$product_code','$product_name','$category_id','$instock_quantity','$price');";
// $pdo->query($addProduct);

$productDB = new ProductDB;
$addProduct = $productDB->insert($product_code, $product_name,$category_id, $instock_quantity, $price);
// var_dump($addProduct); die();
if ($addProduct) {
    header('location:displayProducts.php');
}
?>