<?php
    // include '../database/database.php';
    require_once '../../database/Image.php';
    $imageDB = new ImageDB;

    $id = $_POST['id'];

    $image_id = $_POST['image_id'];
    $product_code= $_POST['customer_address'];
    $image1 = $_POST['image1'];
    $image2 = $_POST['image2'];

    $editImage = $imageDB->updateById($image_id, $product_code, $image1, $image2 );
    if($editImage) {
        header('location: displayImages.php');
    }
?>