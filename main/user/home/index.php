<?php include __DIR__ . "/../template/include.php"; ?>

<!-- Start Header -->
<?php include __DIR__ . "/../template/head.php"; ?>
<!-- End Header -->

<body>
    <?php include __DIR__ . "/../template/header.php"; ?>

    <main id="home">
        <h1>Selamat Datang Di Assalaam E-Commerce</h1>

        <h2>Halo, <?= $_SESSION['username']; ?></h2>
        <p align="center">WEBSITE E-COMMERCE PENYEDIA KEBUTUHAN SEKOLAH MU</p>
        <br>

        <div class="row g-4 justify-content-center">
            <?php $produk = new produk() ?>
            <?php $no = 0 ?>
            <?php foreach ($produk->get_data() as $data) : ?>
                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <div class="card h-100 border-2 border-info">
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

                            <div class="mb-3">
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
                </div>
                <?php $no++ ?>
                <?php if ($no >= 3) break; ?>
            <?php endforeach ?>
        </div>
    </main>


    <?php include __DIR__ . "/../template/footer.php"; ?>
</body>

</html>