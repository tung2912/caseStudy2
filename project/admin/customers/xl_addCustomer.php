<?php
    // include '../database/database.php';
    require_once '../../database/Customer.php';

    $customer_name = $_POST['customer_name'];
    $customer_address = $_POST['customer_address'];
    $customer_phone = $_POST['customer_phone'];
    $customer_email = $_POST['customer_email'];

    $customerDB = new Customer;
    $addCustomer = $customerDB->insert($customer_name, $customer_address, $customer_phone, $customer_email);

    if($addCustomer) {
        header('location:displayCustomers.php');
    }
?>