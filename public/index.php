<?php

include "../include/database.php";

session_start();
if (!isset($_SESSION['username'])) {
    header("location:auth/login.php");
    exit();
}


$users = new users();
switch ($users->userCheck($_SESSION['username'])) {
    case 'user':
        $_SESSION['keranjang'] = [];
        header("location:user/home");
        break;

    case 'admin':
        header("location:admin/dashboard");
        break;

    default:
        error_log("userCheck fail");
        break;
}
