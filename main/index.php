<?php

include "../include/database.php";

// check buat login atau tidak 
session_start();
if (!isset($_SESSION['username'])) {
    header("location:auth/login.php");
    exit();
}

// mengecek akun
try {
    $users = new users();
    switch ($users->userCheck($_SESSION['username'])) {
        case 'user':
            // Inisialisasi keranjang hanya jika belum ada 
            if (!isset($_SESSION['keranjang'])) {
                $_SESSION['keranjang'] = [];
            }
            if (!isset($_SESSION['jumlah'])) {
                $_SESSION['jumlah'] = [];
            }
            header("location:user/home");
            exit();

        case 'admin':
            header("location:admin/dashboard");
            exit();

        default:
            header("location:auth/login.php");
            exit();
    }
} catch (Exception $e) {
    error_log("main/index.php userCheck error: " . $e->getMessage());
    header("location:auth/login.php");
    exit();
}
