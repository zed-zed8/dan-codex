<?php

include __DIR__ . "/../template/include.php";

$produk = new produk();

if (isset($_POST['tambah_produk'])) {
    $nama_produk = $_POST['nama_produk'];
    $kategori = $_POST['kategori'];
    $deskripsi = $_POST['deskripsi'];
    $harga = (int) $_POST['harga'];
    $stok = (int) $_POST['stok'];


    $file = $_FILES['gambar'];
    // Generasi nama unik
    $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
    $uniqueName = bin2hex(random_bytes(16)) . '.' . $extension;
    // path image
    $uploadFolder = __DIR__ . "/../../assets/img/img_produk";
    $path_gambar = $uploadFolder . "/" . $uniqueName;
    // move file to  img folder
    if (move_uploaded_file($file['tmp_name'], $path_gambar)) {
        $webPath      = "assets/img/img_produk/" . $uniqueName;
        $produk->create($nama_produk, $deskripsi, $kategori, $harga, $stok, $webPath);
    }
}

if (isset($_POST['edit_produk'])) {
    $nama_produk = $_POST['nama_produk'];
    $deskripsi = $_POST['deskripsi'];
    $kategori = $_POST['kategori'];
    $harga = (int) $_POST['harga'];
    $stok = (int) $_POST['stok'];
    $id_produk = (int) $_POST['id_produk'];


    $file = $_FILES['gambar'];
    // echo "<pre>";
    // var_dump($file);
    // echo "</pre>";

    // check file ada
    if ($file['name'] !== "") {
        // mengahapus gambar sebelumnya
        $data_produk = mysqli_fetch_assoc($produk->get_data_by_id($id_produk));
        $path_gambar = $data_produk['path_gambar'];
        unlink("../../$path_gambar");

        // Generasi nama unik
        $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
        $uniqueName = bin2hex(random_bytes(16)) . '.' . $extension;
        // path image
        $uploadFolder = __DIR__ . "/../../assets/img/img_produk";
        $path_gambar = $uploadFolder . "/" . $uniqueName;
        // move file to  img folder
        if (move_uploaded_file($file['tmp_name'], $path_gambar)) {
            $webPath      = "assets/img/img_produk/" . $uniqueName;
            $produk->edit($nama_produk, $deskripsi, $kategori, $harga, $stok, $id_produk, $webPath);
        }
    } else {
        $produk->edit($nama_produk, $deskripsi, $kategori, $harga, $stok, $id_produk);
    }
}

if (isset($_POST['delete'])) {
    $id_produk = $_POST['id_produk'];
    $data_produk = mysqli_fetch_assoc($produk->get_data_by_id($id_produk));
    $path_gambar = $data_produk['path_gambar'];

    unlink("../../$path_gambar");
    $produk->delete($id_produk);
}

header("location:index.php");
exit();
