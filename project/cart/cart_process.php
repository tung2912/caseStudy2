<?php 
    session_start();
    include '../admin/database/database.php';

    $id = isset($_GET['id']) ? $_GET['id']: 0;
    $quantity = isset($_GET['quantity']) ? $_GET['quantity']: 1;
    $action = isset($_GET['action']) ? $_GET['action']: 'add';

    $query = $pdo->query("SELECT * FROM products INNER JOIN images ON products.product_code = images.product_code WHERE products.product_code = '$id'");
    $item = $query->fetch();
    if ($item && $action =='add') {
        if(isset($_SESSION['cart'][$id])) {
            $_SESSION['cart'][$id]['quantity'] += $quantity;
        }
        else {
            $cart = [
                'id'=>$item['product_code'],
                'name'=>$item['product_name'],
                'price'=>$item['price'],
                'image'=>$item['image1'],
                'quantity'=>$quantity
            ];
            $_SESSION['cart'][$id] = $cart;
        }
    }

    header('location:cart.php');

    // echo '<pre>';
    // print_r($_SESSION['cart']);

    if($action == 'delete') {
        if(isset($_SESSION['cart'][$id])){
            unset($_SESSION['cart'][$id]);
        }
        header('location:cart.php');
    }
    if($action == 'increase') {
        if(isset($_SESSION['cart'][$id])) {
            $_SESSION['cart'][$id]['quantity']++;
        }
    }
    if($action =='decrease') {
        if(isset($_SESSION['cart'][$id])) {
            $_SESSION['cart'][$id]['quantity']--;
        }
    }
    if($action == 'clear') {
        
    }
?>