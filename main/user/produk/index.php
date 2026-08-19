<?php include __DIR__ .  "/../template/include.php"; ?>

<!-- Start Header -->
<?php include __DIR__ . "/../template/head.php"; ?>
<!-- End Header -->

<body>
    <?php include __DIR__ . "/../template/header.php"; ?>

    <main id="produk">
        <div class="d-flex justify-content-between align-items-center me-4">
            <div class="">
                <h1>Produk-Produk kita</h1>
            </div>
            <div class="d-flex gap-2">
                <form action="" method="get">
                    <div class="d-flex">
                        <input type="text" name="search" class="form-control" placeholder="kategori:">
                        <button type="submit" class="btn btn-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                            </svg>
                        </button>
                    </div>
                </form>

                <div class="dropdown">
                    <button class="btn btn-warning" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5" />
                        </svg>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="#" data-value="a-z">A-Z</a></li>
                        <li><a class="dropdown-item" href="#" data-value="z-a">Z-A</a></li>
                        <li><a class="dropdown-item" href="#" data-value="mahal">Kemahalan</a></li>
                        <li><a class="dropdown-item" href="#" data-value="murah">Kemurahan</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row g-4 me-2" name="produk-data">
            <?php $produk = new produk() ?>
            <?php foreach ($produk->get_data() as $data) : ?>
                <?php
                if (isset($_GET['search'])) {
                    if (substr($_GET['search'], 0, 9) == "kategori:") {
                        $kategori = substr($_GET['search'], 9);
                        if ($data['kategori'] != $kategori) {
                            continue;
                        }
                    }
                    if (substr($_GET['search'], 0, 6) == "harga:") {
                        $harga = substr($_GET['search'], 6);
                        if (!str_contains($data['harga'], $harga)) {
                            continue;
                        }
                    } else {
                        if (!str_contains($data['nama_produk'], $_GET['search'])) {
                            continue;
                        }
                    }
                }
                ?>
                <div class="col-12 col-sm-6 col-md-4 col-lg-3" name="produk">
                    <a href="detail_produk.php?id=<?= $data['id'] ?>" class="text-dark text-decoration-none">
                        <div class="card h-100">
                            <div class="card-body d-flex flex-column">
                                <div class="d-flex justify-content-center">
                                    <img src="../../<?= htmlspecialchars($data['path_gambar']) ?>" alt="insert img here" width="240" height="240">
                                </div>

                                <div class="d-flex">
                                    <h5 class="card-title mb-0" name="nama-produk">
                                        <?php echo htmlspecialchars($data['nama_produk']); ?>
                                    </h5>
                                    <span class="fw-bold mb-1 w-100 text-end" name="harga-produk">
                                        RP <?= number_format($data['harga'], 0, ',', '.'); ?>
                                    </span>

                                    <!-- to help with sorting -->
                                    <?= "<" . htmlspecialchars($data['nama_produk']) . "></" . htmlspecialchars($data['nama_produk']) . ">" ?>
                                </div>

                                <div class="text-muted" style="font-size: .8em;">
                                    <span>
                                        <?= $data['kategori'] ?>
                                    </span>
                                </div>

                                <div class="mb-2">
                                    <p class="card-text text-truncate">
                                        <?php echo htmlspecialchars($data['deskripsi']); ?>
                                    </p>
                                </div>

                                <div class="mt-auto">
                                    <?php if (!in_array($data['id'], $_SESSION['keranjang'])) : ?>
                                        <form action="proses.php" method="post">
                                            <input type="hidden" name="id_produk" value="<?= $data['id'] ?>">
                                            <?php if ($data['stok'] >= 1) : ?>
                                                <button type="submit" name="masuk_keranjang" class="btn btn-primary w-100">Masukan ke keranjang</button>
                                            <?php else : ?>
                                                <button disabled="disabled" class="btn btn-secondary w-100">Stok Barang Habis</button>
                                            <?php endif; ?>
                                        </form>
                                    <?php else : ?>
                                        <button class="btn btn-secondary disabled w-100">Produk Sudah Dalam Keranjang</button>
                                    <?php endif; ?>
                                </div>

                            </div>
                        </div>
                    </a>
                </div>
            <?php endforeach ?>
        </div>
    </main>

    <?php include __DIR__ . "/../template/footer.php"; ?>

    <script src="../../assets/js/sort.js" defer></script>
</body>

</html>