<?php
    require_once '../../database/order.php';
    $id = $_POST['id'];
    $orderDate = $_POST['orderDate'];
    $status = $_POST['status'];

    $orderDB = new Order;
    $editOrder = $orderDB->updateById($id, $orderDate, $status);

    if($editOrder) {
        header('location: displayOrders.php');
    }
?>