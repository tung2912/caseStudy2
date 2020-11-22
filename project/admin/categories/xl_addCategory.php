<?php
    require_once '../../database/category.php';

    $code = $_POST['categoryCode'];
    $name = $_POST['categoryName'];
    $description = $_POST['description'];
    $image = $_POST['image'];

    $categoryDB = new Category;
    $addCategory = $categoryDB->insert($code, $name, $description, $image);
    if($addCategory) {
        header('location:displayCategories.php');
    }
?>