<?php
include '../database/database.php';

$id = $_GET['id'];

$delete = "DELETE FROM products WHERE product_code = '$id'";
$pdo->query($delete);
if($delete) {
    header('location: displayProducts.php');
}
?>