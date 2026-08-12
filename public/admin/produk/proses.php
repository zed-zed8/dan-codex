<?php

include __DIR__ . "/../../../include/database.php";

$produk = new produk();

if (isset($_POST['tambah_produk'])) {
    $nama_produk = $_POST['nama_produk'];
    $deskripsi = $_POST['deskripsi'];
    $kategori = $_POST['kategori'];
    $harga = (int) $_POST['harga'];
    $stok = (int) $_POST['stok'];

    $file = $_FILES['gambar'];
    // Generate a completely unique name using bin2hex or uniqid
    $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
    $uniqueName = bin2hex(random_bytes(16)) . '.' . $extension;
    // Define directory paths
    $uploadFolder = __DIR__ . "/../../assets/img_produk";
    $path_gambar = $uploadFolder . "/" . $uniqueName;
    // Move the physical file to the folder
    if (move_uploaded_file($file['tmp_name'], $path_gambar)) {
        $webPath      = "assets/img_produk/" . $uniqueName;
        $produk->create($nama_produk, $deskripsi, $kategori, $harga, $stok, $webPath);
    }
}

if (isset($_POST['tambah_produk'])) {
    $nama_produk = $_POST['nama_produk'];
    $deskripsi = $_POST['deskripsi'];
    $kategori = $_POST['kategori'];
    $harga = (int) $_POST['harga'];
    $stok = (int) $_POST['stok'];

    $file = $_FILES['gambar'];
    // Generate a completely unique name using bin2hex or uniqid
    $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
    $uniqueName = bin2hex(random_bytes(16)) . '.' . $extension;
    // Define directory paths
    $uploadFolder = __DIR__ . "/../../assets/img_produk";
    $path_gambar = $uploadFolder . "/" . $uniqueName;
    // Move the physical file to the folder
    if (move_uploaded_file($file['tmp_name'], $path_gambar)) {
        $webPath      = "assets/img_produk/" . $uniqueName;
        $produk->create($nama_produk, $deskripsi, $kategori, $harga, $stok, $webPath);
    }
}

if (isset($_POST['delete'])) {
    $nama_produk = $_POST['id_produk'];
    $produk->delete($nama_produk);
}

header("location:index.php");
exit();
