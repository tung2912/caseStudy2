<?php
require_once '../../database/user.php';

$id = $_GET['id'];

$userDB = new User;
$deleteUser = $userDB->deleteById($id);
if($deleteUser) {
    header('location:displayUsers.php');
}
?>