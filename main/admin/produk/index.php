<?php include __DIR__ . "/../template/include.php"; ?>

<!-- Start Header -->
<?php include __DIR__ . "/../template/head.php"; ?>
<!-- End Header -->

<body>
    <?php include __DIR__ . "/../template/header.php"; ?>

    <?php include __DIR__ . "/../template/sidebar.php"; ?>

    <main class="produk">
        <div class="my-2">
            <a href="create.php" class="btn btn-primary">Tambah Produk</a>
        </div>

        <section class="card p-3 me-5 overflow-auto" style="height: 25em;">
            <div class="d-grid" style="grid-template-columns: repeat(4, 1fr); gap: 1em; grid-auto-rows: 1fr;">
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
                            <div class="col <?= $data['stok'] == 0 ? "text-danger" : "" ?>">Stok : <?= number_format($data['stok'], 0, ",", ".") ?> <?= $data['stok'] == 0 ? "!" : "" ?></div>
                        </div>

                        <div class="row mb-2">
                            <div class="col d-flex justify-content-evenly">
                                <div class="">
                                    <form action="edit.php" method="post">
                                        <input type="hidden" name="id_produk" value="<?= $data['id'] ?>">
                                        <button type="submit" class="btn btn-primary">Edit</button>
                                    </form>
                                </div>
                                <div class="">
                                    <form action="proses.php" method="post">
                                        <input type="hidden" name="id_produk" value="<?= $data['id'] ?>">
                                        <button type="submit" name="delete" class="btn btn-danger">Delete</button>
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