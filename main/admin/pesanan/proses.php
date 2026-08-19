<?php

include __DIR__ . "/../template/include.php";

if (isset($_POST['hapus_pesanan'])) {
    $id_pesanan = $_POST['id_pesanan'];

    $pesanan = new pesanan();
    $pesanan->delete($id_pesanan);
}

header("location:index.php");
exit();
