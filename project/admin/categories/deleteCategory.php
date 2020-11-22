<?php 
require_once '../../database/category.php';
require_once '../../database/product.php';
$id = $_GET['id'];
$categoryDB = new Category;
$productDB = new ProductDB;
$productInCategory = $productDB->getAllByCategory($id);

if(!empty($productInCategory)) {
    echo "
    <script>
    alert('Please delete Product first');
    window.location = 'displayCategories.php';
    </script>
    ";
} else {
    $delete = $categoryDB->deletebyId($id);
    header('location: displayCategories.php');
}
?>