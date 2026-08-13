<?php

include __DIR__ . "/../../../include/database.php";

session_start();
if (isset($_POST['masuk_keranjang'])) {
    $id_produk = $_POST['id_produk'];
    $_SESSION['keranjang'][] = $id_produk;
}

header("location:index.php");
exit();
