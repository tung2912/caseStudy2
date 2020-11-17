<?php
    include '../database/database.php';
    $id = $_POST['id'];

    $categoryCode = $_POST['categoryCode'];
    $categoryName= $_POST['categoryName'];
    $categoryDescription = $_POST['categoryDescription'];
    $image = $_POST['image'];

    $edit = "UPDATE category 
    SET category_id = '$categoryCode', category_name = '$categoryName', category_description = '$categoryDescription',
    category_image = '$image' 
    WHERE category_id = '$id'";

    $pdo->query($edit);
    if($edit) {
        header('location: displayCategories.php');
    }
?>