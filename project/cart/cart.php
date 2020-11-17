<?php
include '../admin/database/database.php';
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

    // if(isset($_GET['action'])) {
    //     switch ($_GET['action']){
    //         case 'increase':
    //             $quantity = $_GET['itemQty'];
    //             $id = $_GET['id'];
    //             $products[$id][$quantity]++;
    //         break;
    //         }
    // }
    
?>
<?php
include '../layout/footer.php';
?>