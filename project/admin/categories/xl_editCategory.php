<?php
    require_once '../../database/category.php';
    $categoryDB = new Category;

    $id = $_POST['id'];

    $categoryCode = $_POST['categoryCode'];
    $categoryName= $_POST['categoryName'];
    $categoryDescription = $_POST['categoryDescription'];
    $image = $_POST['image'];

    $edit = $categoryDB->updateById($categoryCode, $categoryName, $categoryDescription, $image, $id );
    if($edit) {
        header('location: displayCategories.php');
    }
?>