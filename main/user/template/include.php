<?php

// include dan koneksi database
include_once __DIR__ . "/../../../include/database.php";

// check session
if (!isset($_SESSION)) {
    session_start();
}
// check buat login atau tidak
if (!isset($_SESSION['username'])) {
    header("location:../../auth/login.php");
    exit();
}
