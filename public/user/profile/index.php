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
            <h1>Profile Akun</h1>
            <div class="card pt-2 mt-2 me-5 d-block ps-2">
                <div class="d-flex align-items-center mb-2">
                    <div class="ms-3 me-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
                        </svg>
                    </div>

                    <div class="d-grid">
                        <div>Username : <?= $data['username']; ?></div>
                        <div>Email : <?= $data['email']; ?></div>
                        <div>Role : <?= $data['role']; ?></div>
                    </div>

                    <div class="ms-auto me-5">
                        <a href="../../../auth/logout.php" class="btn btn-danger">logout</a>
                    </div>
                </div>

                <?php $pesanan = new pesanan(); ?>
                <p>Total Pesanan : <?= $pesanan->total_pesanan_by_user($user_id) ?></p>
                <p>Total Pesanan yang sedang diproses : <?= $pesanan->total_pesanan_pending_by_user($user_id) ?></p>
                <p>Total Pesanan yang sudah diproses : <?= $pesanan->total_pesanan_done_by_user($user_id) ?></p>

                <p>Pesanan Terbaru: </p>
                <div class="card m-2">
                    <div class="container text-center">
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

                            <!-- hanya menunjukkan maks 3 pesanan terbaru -->
                            <?php if ($no >= 1) break; ?>
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