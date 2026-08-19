<?php include __DIR__ . "/../template/include.php"; ?>

<!-- Start Header -->
<?php include __DIR__ . "/../template/head.php"; ?>
<!-- End Header -->

<body>
    <?php include __DIR__ . "/../template/header.php"; ?>

    <?php include __DIR__ . "/../template/sidebar.php"; ?>

    <main id="produk-edit">
        <div class="m-3 d-flex align-items-center justify-content-start w-100">
            <div class="text-start">
                <a href="index.php" class="nav-link text-white btn btn-primary">Kembali</a>
            </div>
            <div class="w-75 text-center">
                <h1>Mengedit Produk</h1>
            </div>
        </div>

        <section class="card me-5">
            <?php $produk = new produk(); ?>
            <?php foreach ($produk->get_data_by_id($_POST['id_produk']) as $data) : ?>
                <form action="proses.php" method="post" enctype="multipart/form-data">
                    <div class="container p-3">
                        <div class="row">
                            <div class="col">
                                <label for="nama_produk">Nama Produk</label>
                            </div>
                            <div class="col">
                                <label for="harga">Harga</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <input type="text" name="nama_produk" id="nama_produk" required value="<?= $data['nama_produk'] ?>">
                            </div>
                            <div class="col">
                                <input type="number" name="harga" id="harga" required value="<?= $data['harga'] ?>">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <label for="deskripsi">Deskripsi</label>
                            </div>
                            <div class="col">
                                <label for="stok">Stok</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <input type="text" name="deskripsi" id="deskripsi" required value="<?= $data['deskripsi'] ?>">
                            </div>
                            <div class="col">
                                <input type="number" name="stok" id="stok" required value="<?= $data['stok'] ?>">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="h-100 d-flex align-items-end">
                                    <label for="kategori">Kategori</label>
                                </div>
                            </div>
                            <div class="col">
                                <img src="../../<?= htmlspecialchars($data['path_gambar']) ?>" alt="insert img here" width="100" height="100"><br>
                                <label for="gambar">Foto gambar baru(kalo tidak ada gambar baru lewati saja)</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <select name="kategori" id="kategori">
                                    <option value="Pilih_Kategori" disabled>Pilih Kategori</option>
                                    <option value="Alat Tulis" <?= in_array($data['kategori'], ['Alat Tulis', 'alat_tulis', 'Alat Potong', 'alat_potong', 'Alat Perekat', 'alat_perekat']) ? "selected" : "" ?>>Alat Tulis</option>
                                    <option value="Buku Pelajaran dan Modul" <?= in_array($data['kategori'], ['Buku Pelajaran dan Modul', 'Buku', 'buku']) ? "selected" : "" ?>>Buku Pelajaran & Modul</option>
                                    <option value="Seragam dan Atribut Sekolah" <?= $data['kategori'] == 'Seragam dan Atribut Sekolah' ? "selected" : "" ?>>Seragam & Atribut Sekolah</option>
                                    <option value="Perlengkapan Pramuka" <?= $data['kategori'] == 'Perlengkapan Pramuka' ? "selected" : "" ?>>Perlengkapan Pramuka</option>
                                    <option value="Makanan Ringan dan Minuman" <?= $data['kategori'] == 'Makanan Ringan dan Minuman' ? "selected" : "" ?>>Makanan Ringan & Minuman</option>
                                    <option value="Aksesoris dan Lain-lain" <?= in_array($data['kategori'], ['Aksesoris dan Lain-lain', 'Perlengkapan Lukis dan Seni', 'perlengkapan_lukis_dan_seni']) ? "selected" : "" ?>>Aksesoris & Lain-lain</option>
                                </select>
                            </div>
                            <div class="col">
                                <input type="file" name="gambar" id="gambar" accept="image/png, image/jpeg, image/webp">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <input type="hidden" name="id_produk" value="<?= $data['id'] ?>">
                                <button type="submit" name="edit_produk" class="btn btn-info">Edit Produk</button>
                            </div>
                        </div>

                    </div>
                </form>
            <?php endforeach ?>
        </section>
    </main>

    <?php include __DIR__ . "/../template/footer.php"; ?>
</body>

</html>