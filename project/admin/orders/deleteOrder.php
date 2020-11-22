<?php
require_once '../../database/order.php';
require_once '../../database/orderDetail.php';

$id = $_GET['id'];
$orderDB = new Order;
$orderDetailDB = new OrderDetail;
$orderDetail = $orderDetailDB->getByOrderNumber($id);
if(!empty($orderDetail)) {
    echo "<script>
    alert('Please delete Orderdetails before delete Order');
    window.location = 'displayOrders.php';
    </script>";   
    // header('location: displayOrders.php');
    
} 
else{
    $delete = $orderDB->deleteById($id);
    header('location: displayOrders.php');
}

?>