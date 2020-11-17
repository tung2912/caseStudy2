<?php
    include '../database/database.php';

    $code = $_POST['categoryCode'];
    $name = $_POST['categoryName'];
    $description = $_POST['description'];
    $image = $_POST['image'];

    $addCategory = "INSERT INTO category (category_id, category_name, category_description, category_image) 
    VALUES ('$code', '$name', '$description', '$image')";
    $pdo->query($addCategory);
    // var_dump($addCategory);die();
    if($addCategory) {
        header('location:displayCategories.php');
    }
?>