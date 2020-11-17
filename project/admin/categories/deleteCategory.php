<?php 
    include '../database/database.php';

    $id = $_GET['id'];

$delete = "DELETE FROM category WHERE category_id = '$id'";
$pdo->query($delete);
if($delete) {
    header('location: displayCategories.php');
}
?>