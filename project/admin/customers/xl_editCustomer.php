<?php
    // include '../database/database.php';
    require_once '../../database/Customer.php';
    $customerDB = new Customer;

    $id = $_POST['id'];

    $customer_name = $_POST['customer_name'];
    $customer_address= $_POST['customer_address'];
    $customer_phone = $_POST['customer_phone'];
    $customer_email = $_POST['customer_email'];

    $editCustomer = $customerDB->updateById($customer_name, $customer_address, $customer_phone, $customer_email, $id );
    if($editCustomer) {
        header('location: displayCustomers.php');
    }
?>