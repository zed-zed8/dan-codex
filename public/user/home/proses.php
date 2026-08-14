<?php

include __DIR__ . "/../template/include.php";

if (isset($_POST['masuk_keranjang'])) {
    $id_produk = $_POST['id_produk'];
    $_SESSION['keranjang'][] = $id_produk;
}

header("location:index.php");
exit();
