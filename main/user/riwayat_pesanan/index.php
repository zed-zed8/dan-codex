<?php include __DIR__ . "/../template/include.php"; ?>

<!-- Start Header -->
<?php include __DIR__ . "/../template/head.php"; ?>
<!-- End Header -->

<body>
    <?php include __DIR__ . "/../template/header.php"; ?>

    <main id="profile">
        <?php $users = new users(); ?>
        <?php foreach ($users->get_user($_SESSION['username']) as $data) : ?>
            <?php $user_id = $data['id']; ?>
            <?php $pesanan = new pesanan(); ?>

            <p class="mt-2">Riwayat Pesanan: </p>
            <div class="card m-2">
                <div class="container text-center overflow-auto" style="height: 21em;">
                    <?php $no = 0 ?>
                    <?php foreach ($pesanan->get_data_user($user_id) as $data2) : ?>
                        <div class="row p-3">
                            <div class="col"><?= ++$no ?></div>
                            <div class="col"><?= $users->get_username($data2['user_id']) ?></div>
                            <div class="col"><?= $data2['tanggal_dibuat'] ?></div>
                            <div class="col"><?= $data2['total_harga'] ?></div>
                            <div class="col <?= match ($data2['status']) {
                                                "pending" => "bg-warning",
                                                "done" => "bg-success",
                                            } ?> rounded-3">
                                <?= $data2['status'] ?>
                            </div>

                            <div class="col">
                                <form action="show.php" method="post">
                                    <input type="hidden" name="id_pesanan" value="<?= $data2['id'] ?>">
                                    <button type="submit" name="lihat" class="btn btn-primary">Lihat</button>
                                </form>
                            </div>
                        </div>

                    <?php endforeach; ?>

                    <!-- jika tidak ada pesanan -->
                    <?php if ($no === 0) : ?>
                        <p class="text-start">Belum ada pesanan</p>
                    <?php endif; ?>
                </div>
            </div>
            </div>
        <?php endforeach; ?>
    </main>

    <?php include __DIR__ . "/../template/footer.php"; ?>
</body>

</html>