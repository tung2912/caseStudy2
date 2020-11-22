<?php
    require_once '../../database/orderDetail.php';
    require_once '../../database/product.php';
    
    $productDB = new ProductDB;
    $orderDetailDB = new OrderDetail;
    // Get Info from editPage
    $orderNumber = $_POST['orderNumber'];
    $old_product_code = $_POST['old_product_code'];
    $new_product_code = $_POST['new_product_code'];
    $old_quantity = $_POST['old_quantity'];
    $new_quantity = $_POST['new_quantity'];
    //change the price of edited Product
    $newProduct = $productDB->getById2tables($new_product_code);
    $new_priceEach = $newProduct['price'];

    //change the product
    $editItem = $orderDetailDB->updateItemInDetail($orderNumber, $old_product_code, $new_product_code, $new_quantity, $new_priceEach);
    //change the amount and sold in stock
    if($editItem) {
        $minusOldProduct = $productDB->updateStockbyIdReverse($old_quantity,$old_product_code);
        $addNewProduct = $productDB->updateStockbyId($new_quantity, $new_product_code);
        header("location:displayOrderDetails.php?id=$orderNumber");
    }
?>