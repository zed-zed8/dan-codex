<?php include __DIR__ . "/../template/include.php"; ?>

<!-- Start Header -->
<?php include __DIR__ . "/../template/head.php"; ?>
<!-- End Header -->

<body>
    <?php include __DIR__ . "/../template/header.php"; ?>

    <?php include __DIR__ . "/../template/sidebar.php"; ?>

    <main class="produk-show">
        <div class="my-3 btn btn-primary">
            <a href="index.php" class="nav-link text-white">Kembali</a>
        </div>

        <section class="card me-5">
            <div class=" d-flex justify-content-center">
                <?php $produk = new produk(); ?>
                <?php foreach ($produk->get_data_by_id($_POST['id_produk']) as $data) : ?>
                    <div class="">
                        <img src="../../<?= htmlspecialchars($data['path_gambar']) ?>" alt="insert img here" width="300" height="300">
                    </div>
                    <div class="container">
                        <div class="row">
                            <div calss="col">Nama Produk : <?= $data['nama_produk'] ?></div>
                            <div class="col">Harga : RP<?= number_format($data['harga'], 0, ",", ".") ?></div>
                            <div calss="col">Kategori : <?= $data['kategori'] ?></div>
                            <div calss="col">Stok : <?= number_format($data['stok'], 0, ",", ".") ?></div>
                            <div class="col mt-2">Desk:</div>
                            <div calss="col"><?= $data['deskripsi'] ?></div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </section>
    </main>

    <?php include __DIR__ . "/../template/footer.php"; ?>
</body>

</html>