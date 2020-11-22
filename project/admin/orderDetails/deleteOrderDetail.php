<?php 
require_once '../../database/orderDetail.php';
require_once '../../database/product.php';
$orderDetailDB = new OrderDetail;
$productDB = new ProductDB;
$quantity = $_GET['quantity'];
$product_code = $_GET['product_code'];
$orderNumber = $_GET['orderNumber'];
$deleteDetail = $orderDetailDB->deleteByProductCode($product_code);

if($deleteDetail) {
    $productDB->updateStockbyIdReverse($quantity, $product_code);
    header("location:displayOrderDetails.php?id=$orderNumber");
}
?>