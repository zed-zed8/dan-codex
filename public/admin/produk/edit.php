<?php include __DIR__ . "/../template/include.php"; ?>

<!-- Start Header -->
<?php include __DIR__ . "/../template/head.php"; ?>
<!-- End Header -->

<body>
    <?php include __DIR__ . "/../template/header.php"; ?>

    <?php include __DIR__ . "/../template/sidebar.php"; ?>

    <main id="produk-edit">
        <a href="index.php">back</a>

        <?php $produk = new produk(); ?>
        <?php foreach ($produk->get_data_by_id($_POST['id_produk']) as $data) : ?>
            <form action="proses.php" method="post" enctype="multipart/form-data">
                <label for="nama_produk">Nama Produk</label><br>
                <input type="text" name="nama_produk" id="nama_produk" required value="<?= $data['nama_produk'] ?>">
                <br><br>

                <label for="deskripsi">Deskripsi</label><br>
                <input type="text" name="deskripsi" id="deskripsi" required value="<?= $data['deskripsi'] ?>">
                <br><br>

                <label for="kategori">Kategori</label><br>
                <select name="kategori" id="kategori">
                    <option value="Pilih_Kategori" disabled>Pilih Kategori</option>
                    <option value="alat_tulis" <?= $data['kategori'] == 'alat_tulis' ? "selected" : "" ?>>Alat Tulis</option>
                </select>
                <br><br>

                <label for="harga">Harga</label><br>
                <input type="number" name="harga" id="harga" required value="<?= $data['harga'] ?>">
                <br><br>

                <label for="stok">Stok</label><br>
                <input type="number" name="stok" id="stok" required value="<?= $data['stok'] ?>">
                <br><br>

                <img src="../../<?= htmlspecialchars($data['path_gambar']) ?>" alt="insert img here" width="100" height="100">
                <label for="gambar">Foto gambar baru(kalo tidak ada gambar baru lewati saja)</label><br>
                <input type="file" name="gambar" id="gambar" accept="image/png, image/jpeg, image/webp">
                <br><br>

                <input type="hidden" name="id_produk" value="<?= $data['id'] ?>">
                <button type="submit" name="edit_produk">Edit Produk</button>
            </form>
        <?php endforeach ?>
    </main>

    <?php include __DIR__ . "/../template/footer.php"; ?>
</body>

</html>