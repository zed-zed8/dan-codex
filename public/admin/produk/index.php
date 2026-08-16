<?php include __DIR__ . "/../template/include.php"; ?>

<!-- Start Header -->
<?php include __DIR__ . "/../template/head.php"; ?>
<!-- End Header -->

<body>
    <?php include __DIR__ . "/../template/header.php"; ?>

    <?php include __DIR__ . "/../template/sidebar.php"; ?>

    <main class="produk">
        <a href="create.php">Tambah Produk</a>

        <section class="card p-3 me-5">
            <div class="d-grid" style="grid-auto-flow: column; grid-template-columns: 1fr 1fr 1fr; grid-auto-rows: 1fr;">
                <?php $produk = new produk(); ?>
                <?php foreach ($produk->get_data() as $data) : ?>
                    <div class="card-body bg-info container" style="width: 200px;">
                        <div class="row mb-2">
                            <div class="col">
                                <div class="d-flex justify-content-center">
                                    <form action="show.php" method="post">
                                        <input type="hidden" name="id_produk" value="<?= $data['id'] ?>">
                                        <button type="submit">
                                            <img src="../../<?= htmlspecialchars($data['path_gambar']) ?>" alt="insert img here" width="160" height="160">
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col"><?= $data['nama_produk'] ?></div>
                            <div class="col align-self-end text-end">RP<?= number_format($data['harga'], 0, ",", ".") ?></div>
                        </div>

                        <div class="row mb-2">
                            <div class="col text-secondary" style="font-size: .8em;"><?= $data['kategori'] ?></div>
                        </div>

                        <div class="row mb-2">
                            <div class="col">Stok : <?= number_format($data['stok'], 0, ",", ".") ?></div>
                        </div>

                        <div class="row mb-2">
                            <div class="col d-flex justify-content-evenly">
                                <div class="">
                                    <form action="edit.php" method="post">
                                        <input type="hidden" name="id_produk" value="<?= $data['id'] ?>">
                                        <button type="submit">Edit</button>
                                    </form>
                                </div>
                                <div class="">
                                    <form action="proses.php" method="post">
                                        <input type="hidden" name="id_produk" value="<?= $data['id'] ?>">
                                        <button type="submit" name="delete">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </section>
    </main>

    <?php include __DIR__ . "/../template/footer.php"; ?>
</body>

</html>