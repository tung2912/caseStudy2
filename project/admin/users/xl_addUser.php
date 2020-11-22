<?php
    require_once '../../database/user.php';
    $userDB = new User;

    $id = $_POST['id'];
    $name = $_POST['name'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $addUser = $userDB->insert($name, $password, $email, $phone);
    if($addUser) {
        header('location: displayUsers.php');
    }
?>