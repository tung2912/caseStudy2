<?php 
    // include '../database/database.php';
require_once '../../database/Image.php';

$id = $_GET['id'];
$imageDB = new ImageDB;
$deleteImage = $imageDB->deletebyId($id);
// $delete = "DELETE FROM category WHERE category_id = '$id'";
// $pdo->query($delete);
if($deleteImage) {
    header('location: displayImages.php');
}
?>