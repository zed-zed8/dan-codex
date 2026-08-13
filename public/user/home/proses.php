<?php

include __DIR__ . "/../../../include/database.php";

if (isset($_POST['masuk_keranjang'])) {
    $id_produk = $_POST['id_produk'];
    $_SESSION['keranjang'][] = $id_produk;
}
