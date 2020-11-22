<?php
session_start();
$products = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
include '../layout/header.php';
?>
<?php 
    if(empty($_SESSION['cart'])) {
        include 'emptyCart.php';
    } else {
        include 'issetCart.php';    
    }    
?>
<?php
include '../layout/footer.php';
?>