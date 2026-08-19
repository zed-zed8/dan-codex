<?php

// include dan koneksi database
include __DIR__ . "/../../../include/database.php";

// check buat login atau tidak
session_start();
if (!isset($_SESSION['username'])) {
    header("location:../../auth/login.php");
    exit();
}
