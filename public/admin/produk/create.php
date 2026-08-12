<?php

include __DIR__ . "/../../../include/database.php";

?>

<!-- Start Header -->
<?php include __DIR__ . "/../template/header.php"; ?>
<!-- End Header -->

<body>
    <?php include __DIR__ . "/../template/header.php"; ?>

    <?php include __DIR__ . "/../template/sidebar.php"; ?>

    <a href="index.php">back</a>

    <form action="proses.php" method="post" enctype="multipart/form-data">
        <label for="nama_produk">Nama Produk</label><br>
        <input type="text" name="nama_produk" id="nama_produk" required>
        <br><br>

        <label for="deskripsi">Deskripsi</label><br>
        <input type="text" name="deskripsi" id="deskripsi" required>
        <br><br>

        <label for="kategori">Kategori</label><br>
        <select name="kategori" id="kategori">
            <option value="Pilih_Kategori" aria-readonly="true">Pilih Kategori</option>
            <option value="alat_tulis">Alat Tulis</option>
        </select>
        <br><br>

        <label for="harga">Harga</label><br>
        <input type="number" name="harga" id="harga" required>
        <br><br>

        <label for="stok">Stok</label><br>
        <input type="number" name="stok" id="stok" required>
        <br><br>

        <label for="gambar">Foto gambar</label><br>
        <input type="file" name="gambar" id="gambar" accept="image/png, image/jpeg, image/webp" required>
        <br><br>

        <button type="submit" name="tambah_produk">Tambah Produk</button>
    </form>

    <?php include __DIR__ . "/../template/footer.php"; ?>
</body>

</html>