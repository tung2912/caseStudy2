<?php
    require_once '../../database/product.php';
    require_once '../../database/orderDetail.php';
    $productDB = new ProductDB;
    $orderDetailDB = new OrderDetail;
    $orderNumber = $_POST['orderNumber'];
    $product_code = $_POST['product_code'];
    $buy_quantity = $_POST['buy_quantity'];
    $productToAdd = $productDB->getById2tables($product_code);
    $priceEachProduct = $productToAdd['price'];

    $addProduct = $orderDetailDB->insert($orderNumber, $product_code, $buy_quantity, $priceEachProduct );

    if($addProduct) {
        $productDB->updateStockbyId($buy_quantity, $product_code);
        header("location:displayOrderDetails.php?id=$orderNumber");
    }
?>