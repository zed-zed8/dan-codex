<?php include __DIR__ .  "/../template/include.php"; ?>

<!-- Start Header -->
<?php include __DIR__ . "/../template/head.php"; ?>
<!-- End Header -->

<body>
    <?php include __DIR__ . "/../template/header.php"; ?>

    <main id="produk">
        <h1>Produk-Produk kita</h1>

        <div class="row g-4 me-2">
            <?php $produk = new produk() ?>
            <?php foreach ($produk->get_data() as $data) : ?>
                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <a href="detail_produk.php?id=<?= $data['id'] ?>" class="text-dark text-decoration-none">
                        <div class="card h-100">
                            <div class="card-body d-flex flex-column">
                                <div class="d-flex justify-content-center">
                                    <img src="../../<?= htmlspecialchars($data['path_gambar']) ?>" alt="insert img here" width="240" height="240">
                                </div>

                                <div class="d-flex">
                                    <h5 class="card-title mb-0">
                                        <?php echo $data['nama_produk']; ?>
                                    </h5>
                                    <span class="fw-bold mb-1 w-100 text-end">
                                        RP <?= number_format($data['harga'], 0, ',', '.'); ?>
                                    </span>
                                </div>

                                <div class="text-muted" style="font-size: .8em;">
                                    <span>
                                        <?= str_replace("_", " ", $data['kategori']) ?>
                                    </span>
                                </div>

                                <div class="mb-2">
                                    <p class="card-text text-truncate">
                                        <?php echo $data['deskripsi']; ?>
                                    </p>
                                </div>

                                <div class="mt-auto">
                                    <?php if (!in_array($data['id'], $_SESSION['keranjang'])) : ?>
                                        <form action="proses.php" method="post">
                                            <input type="hidden" name="id_produk" value="<?= $data['id'] ?>">
                                            <button type="submit" name="masuk_keranjang" class="btn btn-primary w-100">Masukan ke keranjang</button>
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
</body>

</html>