<?php
include('form-handler.php');


$submitAdd = (isset($_POST["registerBtn"]))?$_POST["registerBtn"]:"";


if (isset($_POST["registerBtn"])) {

    $password = sanitizeInput($_POST['registerPassword']);
    $confirmPassword = sanitizeInput($_POST['confirmPassword']);
    $username = sanitizeInput($_POST['registerUserName']);
    $userFullName = sanitizeInput($_POST['userFullName']);
    $phone = sanitizeInput($_POST['phone']);
    $email = sanitizeInput($_POST['email']);
    $isRegisterSuccess = $account->register($username, $userFullName, $email, $phone, $password, $confirmPassword);
    if ($isRegisterSuccess) {
        header("Location: login.php");
    }
}
?>


