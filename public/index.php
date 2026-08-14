<?php

include "../include/database.php";

// mengecek akun
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
