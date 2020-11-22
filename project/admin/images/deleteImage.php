<?php 
require_once '../../database/Image.php';

$id = $_GET['id'];
$imageDB = new ImageDB;
$deleteImage = $imageDB->deletebyId($id);
if($deleteImage) {
    header('location: displayImages.php');
}
?>