<?php include __DIR__ . "/../template/include.php"; ?>

<!-- Start Header -->
<?php include __DIR__ . "/../template/head.php"; ?>
<!-- End Header -->

<body>
    <?php include __DIR__ . "/../template/header.php"; ?>

    <?php include __DIR__ . "/../template/sidebar.php"; ?>

    <main class="pesanan">
        <h1>Pesanan</h1>

        <p>Daftar semua pesanan yang masuk</p>

        <section class="card me-5 overflow-auto" style="height: 22em;">
            <div class="container text-center overflow-auto">
                <div class="row bg-info fw-bold p-2">
                    <div class="col">NO</div>
                    <div class="col">Username</div>
                    <div class="col">Tanggal</div>
                    <div class="col">Total Harga</div>
                    <div class="col">Status</div>
                    <div class="col">Aksi</div>
                </div>
                <?php $pesanan = new pesanan(); ?>
                <?php $users = new users(); ?>
                <?php $no = 0 ?>
                <?php foreach ($pesanan->get_data() as $data) : ?>
                    <div class="row p-2">
                        <div class="col"><?= ++$no ?></div>
                        <div class="col"><?= $users->get_username($data['user_id']) ?></div>
                        <div class="col"><?= $data['tanggal_dibuat'] ?></div>
                        <div class="col"><?= $data['total_harga'] ?></div>
                        <div class="col <?= match ($data['status']) {
                                            "pending" => "bg-warning",
                                            "done" => "bg-success",
                                        } ?> rounded-3">
                            <?= $data['status'] ?>
                        </div>

                        <div class="col">
                            <div class="d-flex gap-3">
                                <form action="show.php" method="post">
                                    <input type="hidden" name="id_pesanan" value="<?= $data['id'] ?>">
                                    <button type="submit" name="lihat">Lihat</button>
                                </form>

                                <form action="proses.php" method="post">
                                    <input type="hidden" name="id_pesanan" value="<?= $data['id'] ?>">
                                    <button type="submit" name="hapus_pesanan">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>
    </main>
    <?php include __DIR__ . "/../template/footer.php"; ?>
</body>

</html>