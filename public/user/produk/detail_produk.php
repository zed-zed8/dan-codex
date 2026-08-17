<?php include __DIR__ .  "/../template/include.php"; ?>

<!-- Start Header -->
<?php include __DIR__ . "/../template/head.php"; ?>
<!-- End Header -->

<body class="overflow-hidden">
    <?php include __DIR__ . "/../template/header.php"; ?>

    <main id="produk" style="height: 24em;">
        <h1>Produk-Produk kita</h1>

        <div class="card me-5">
            <?php $produk = new produk() ?>
            <?php foreach ($produk->get_data_by_id($_GET['id']) as $data) : ?>
                <div class="d-flex">
                    <div class="d-flex justify-content-center">
                        <img src="../../<?= htmlspecialchars($data['path_gambar']) ?>" alt="insert img here" width="320" height="320">
                    </div>

                    <div class="w-100">
                        <div class="d-flex mt-2">
                            <h1 class="card-title mb-0 w-100">
                                <?php echo $data['nama_produk']; ?>
                            </h1>
                            <h3 class="fw-bold mb-1 w-100 text-end">
                                RP <?= number_format($data['harga'], 0, ',', '.'); ?>
                            </h3>
                        </div>

                        <div class="text-muted" style="font-size: .8em;">
                            <span>
                                kategori: <?= str_replace("_", " ", $data['kategori']) ?>
                            </span>
                        </div>

                        <div class="mb-2 overflow-auto">
                            <p class="card-text">
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
            <?php endforeach ?>
        </div>
    </main>

    <?php include __DIR__ . "/../template/footer.php"; ?>
</body>

</html>