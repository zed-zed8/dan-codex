<?php

// include dan koneksi database
include __DIR__ . "/../../../include/database.php";

// check buat login atau tidak
session_start();
if (!isset($_SESSION['username'])) {
    header("location:../../auth/login.php");
    exit();
}

// hanya admin yang boleh akses halaman admin
try {
    $users      = new users();
    $user_check = $users->userCheck($_SESSION['username']);

    if ($user_check !== 'admin') {
        header("location:../../user/home");
        exit();
    }
} catch (Exception $e) {
    error_log("Admin include role check error: " . $e->getMessage());
    header("location:../../auth/login.php");
    exit();
}
