<?php
session_start();
require_once '../database/product.php';

$id = isset($_GET['id']) ? $_GET['id'] : 0;
$quantity = isset($_GET['quantity']) ? $_GET['quantity'] : 1;
$action = isset($_GET['action']) ? $_GET['action'] : 'add';

$productDB = new ProductDB;
$item = $productDB->getById2tables($id);

if ($item && $action == 'add') {
  if (isset($_SESSION['cart'][$id])) {
    $_SESSION['cart'][$id]['quantity'] += $quantity;
  } else {
    $cart = [
      'id' => $item['product_code'],
      'name' => $item['product_name'],
      'price' => $item['price'],
      'image' => $item['image1'],
      'quantity' => $quantity
    ];
    $_SESSION['cart'][$id] = $cart;
  }
}
header('location:cart.php');

if ($action == 'delete') {
  if (isset($_SESSION['cart'][$id])) {
    unset($_SESSION['cart'][$id]);
  }
  header('location:cart.php');
}
if ($action == 'increase') {
  if (isset($_SESSION['cart'][$id])) {
    $_SESSION['cart'][$id]['quantity']++;
  }
}
if ($action == 'decrease') {
  if (isset($_SESSION['cart'][$id])) {
    $_SESSION['cart'][$id]['quantity']--;
  }
}
