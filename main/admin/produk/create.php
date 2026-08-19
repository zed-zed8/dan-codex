<?php include __DIR__ . "/../template/include.php"; ?>

<!-- Start Header -->
<?php include __DIR__ . "/../template/head.php"; ?>
<!-- End Header -->

<body>
    <?php include __DIR__ . "/../template/header.php"; ?>

    <?php include __DIR__ . "/../template/sidebar.php"; ?>

    <main class="produk-create">
        <div class="m-3 d-flex align-items-center justify-content-start w-100">
            <div class="text-start">
                <a href="index.php" class="nav-link text-white btn btn-primary">Kembali</a>
            </div>
            <div class="w-75 text-center">
                <h1>Menambahkan Produk</h1>
            </div>
        </div>

        <section class="card me-5">
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
                            <input type="text" name="nama_produk" id="nama_produk" required>
                        </div>
                        <div class="col">
                            <input type="number" name="harga" id="harga" min="0" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <label for="kategori">Kategori</label>
                        </div>
                        <div class="col">
                            <label for="stok">Stok</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <select name="kategori" id="kategori">
                                <option value="Pilih_Kategori" aria-readonly="true">Pilih Kategori</option>
                                <option value="Alat Tulis">Alat Tulis</option>
                                <option value="Buku Pelajaran dan Modul">Buku Pelajaran & Modul</option>
                                <option value="Seragam dan Atribut Sekolah">Seragam & Atribut Sekolah</option>
                                <option value="Perlengkapan Pramuka">Perlengkapan Pramuka</option>
                                <option value="Makanan Ringan dan Minuman">Makanan Ringan & Minuman</option>
                                <option value="Aksesoris dan Lain-lain">Aksesoris & Lain-lain</option>
                            </select>
                        </div>
                        <div class="col">
                            <input type="number" name="stok" id="stok" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <label for="deskripsi">Deskripsi</label>
                        </div>
                        <div class="col">
                            <label for="gambar">Foto gambar</label>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col">
                            <textarea type="text" name="deskripsi" id="deskripsi" maxlength="16383" class="w-50" required style="resize: none; min-height: 100px; max-height: 100%;"></textarea>
                        </div>
                        <div class="col">
                            <div class="containe">
                                <div class="row">
                                    <div class="col">
                                        <input type="file" name="gambar" id="gambar" accept="image/png, image/jpeg, image/webp" required>
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col">
                                        <button type="submit" name="tambah_produk" class="btn btn-info">Tambah Produk</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </form>
        </section>
    </main>

    <?php include __DIR__ . "/../template/footer.php"; ?>
</body>

</html>