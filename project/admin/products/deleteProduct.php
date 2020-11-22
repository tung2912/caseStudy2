<?php
require_once '../../database/product.php';
require_once '../../database/Image.php';

$id = $_GET['id'];
$productDB = new ProductDB;
$imageDB = new ImageDB;

$imageWithProductCode = $imageDB->getbyProductCode($id);

if(!empty($imageWithProductCode)) {
    echo "
        <script>
            alert('Please delete image first');
            window.location = 'displayProducts.php';
        </script>
    ";
}
 else {
    $delete = $productDB->deleteById($id);
    header('location: displayProducts.php');
 }
?>