<?php
    require_once '../../database/category.php';

    $code = $_POST['categoryCode'];
    $name = $_POST['categoryName'];
    $description = $_POST['description'];
    $image = $_POST['image'];

    $categoryDB = new Category;
    $addCategory = $categoryDB->insert($code, $name, $description, $image);
    // $addCategory = "INSERT INTO category (category_id, category_name, category_description, category_image) 
    // VALUES ('$code', '$name', '$description', '$image')";
    // $pdo->query($addCategory);
    if($addCategory) {
        header('location:displayCategories.php');
    }
?>