<?php 
require_once '../../database/Customer.php';
require_once '../../database/order.php';

$id = $_GET['id'];
$customerDB = new Customer;
$orderDB = new Order;
$order = $orderDB->getbyCustomerId($id);

if(!empty($order)) {
    echo "<script>
    alert('Please delete Order before Customer');
    window.location = 'displayCustomers.php';
    </script>";
}
else {
    $deleteCustomer = $customerDB->deletebyId($id);
    header('location: displayCustomers.php');
}
?>