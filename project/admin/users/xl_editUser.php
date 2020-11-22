<?php
require_once '../../database/user.php';

$userDB = new User;
$id = $_POST['id'];
$name = $_POST['name'];
$password = $_POST['password'];
$email = $_POST['email'];
$phone = $_POST['phone'];

$editUser = $userDB->updateById($name, $password, $email, $phone, $id);

if($editUser) {
    header('location:displayUsers.php');
}
?>