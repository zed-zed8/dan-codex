<?php include __DIR__ . "/../template/include.php"; ?>

<!-- Start Header -->
<?php include __DIR__ . "/../template/head.php"; ?>
<!-- End Header -->

<body>
    <?php include __DIR__ . "/../template/header.php"; ?>

    <?php include __DIR__ . "/../template/sidebar.php"; ?>

    <main id="dashboard">
        <h1>Selamat Datang Di Dashboard Admin</h1>
        <p>Selamat Kembali, <?= $_SESSION['username']; ?></p>


        <section class="container mb-4">
            <div class="row">
                <?php $produk = new produk(); ?>
                <div class="card border-3 border-primary col-6 col-md-4 mb-2 mb-lg-0 col-lg-2">
                    <div class="card-body d-flex flex-column align-items-stretch justify-content-around">
                        <h5 class="card-title text-primary">Total Produk</h5>
                        <h6 class="card-subtitle mb-2 d-flex align-items-center">
                            <span class="text-muted me-3"><?= $produk->total_produk() ?></span> <span>Produk Tersedia </span>
                        </h6>
                    </div>
                </div>

                <div class="col-md-1"></div>

                <?php $pesanan = new pesanan(); ?>
                <div class="card border-3 border-primary col-6 col-md-4 mb-2 mb-lg-0 col-lg-2">
                    <div class="card-body d-flex flex-column align-items-stretch justify-content-around">
                        <h5 class="card-title text-primary">Total Pesanan</h5>
                        <h6 class="card-subtitle mb-2 d-flex align-items-center">
                            <span class="text-muted me-3"><?= $pesanan->total_pesanan() ?></span> <span>Pesanan</span>
                        </h6>
                    </div>
                </div>

                <div class="col-md-1"></div>

                <div class="card border-3 border-primary col-6 col-md-4 col-lg-2 mb-2 mb-md-0">
                    <div class="card-body d-flex flex-column align-items-stretch justify-content-around">
                        <h5 class="card-title text-primary ">Total Pesanan pending</h5>
                        <h6 class="card-subtitle mb-2 d-flex align-items-center">
                            <span class="text-muted me-3"><?= $pesanan->total_pesanan_pending() ?></span> <span>Pesanan Pending</span>
                        </h6>
                    </div>
                </div>

                <div class="col-md-1"></div>

                <div class="card border-3 border-primary col-6 col-md-4 col-lg-2 mb-2 mb-md-0">
                    <div class="card-body d-flex flex-column align-items-stretch justify-content-around">
                        <h5 class="card-title text-primary">Total Pesanan Selesai</h5>
                        <h6 class="card-subtitle mb-2 d-flex align-items-center">
                            <span class="text-muted me-3"><?= $pesanan->total_pesanan_done() ?></span> <span>Pesanan Selesai</span>
                        </h6>
                    </div>
                </div>
            </div>
        </section>

        <div class="card mb-4 me-5 rounded-3">
            <div class="card-body">
                <p class="ms-2">Pesanan Terbaru: </p>
                <div class="container text-center">
                    <?php $users = new users(); ?>
                    <?php $no = 0 ?>
                    <?php foreach ($pesanan->get_data() as $data) : ?>
                        <div class="row p-1">
                            <div class="col"><?= ++$no ?></div>
                            <div class="col"><?= $users->get_username($data['user_id']) ?></div>
                            <div class="col"><?= $data['tanggal_dibuat'] ?></div>
                            <div class="col"><?= $data['total_harga'] ?></div>
                            <div class="col <?= match ($data['status']) {
                                                "pending" => "bg-warning",
                                                "done" => "bg-success",
                                            } ?> rounded-3">
                                <?= $data['status']  ?>
                            </div>

                            <div class="col">
                                <form action="show.php" method="post">
                                    <input type="hidden" name="id_pesanan" value="<?= $data['id'] ?>">
                                    <button type="submit" name="lihat">Lihat</button>
                                </form>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </main>

    <?php include __DIR__ . "/../template/footer.php"; ?>
</body>

</html>