<?php
    require_once '../../database/Image.php';

    $image_id = $_POST['image_id'];
    $product_code = $_POST['product_code'];
    $image1 = $_POST['image1'];
    $image2 = $_POST['image2'];

    $imageDB = new ImageDB;
    $addImage = $imageDB->insert($image_id, $product_code, $image1, $image2);

    if($addImage) {
        header('location:displayImages.php');
    }
?>