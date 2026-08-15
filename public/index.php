<?php

include "../include/database.php";

// check buat login atau tidak
session_start();
if (!isset($_SESSION['username'])) {
    header("location:auth/login.php");
    exit();
}

// mengecek akun
session_start();
$users = new users();
switch ($users->userCheck($_SESSION['username'])) {
    case 'user':
        $_SESSION['keranjang'] = [];
        header("location:user/home");
        exit();

    case 'admin':
        header("location:admin/dashboard");
        exit();

    default:
        header("location:user/home");
        exit();
}
