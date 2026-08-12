<?php

include "../include/database.php";

session_start();
if (!isset($_SESSION['username'])) {
    header("location:auth/login.php");
}

$users = new users();
switch ($users->userCheck($_SESSION['username'])) {
    case 'user':
        header("location:user/index.php");
        break;

    case 'admin':
        header("location:admin/dashboard.php");
        break;

    default:
        error_log("userCheck fail");
        break;
}
