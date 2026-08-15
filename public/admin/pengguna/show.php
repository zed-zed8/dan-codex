<?php include __DIR__ . "/../template/include.php"; ?>

<!-- Start Header -->
<?php include __DIR__ . "/../template/head.php"; ?>
<!-- End Header -->

<body>
    <?php include __DIR__ . "/../template/header.php"; ?>

    <?php include __DIR__ . "/../template/sidebar.php"; ?>

    <main class="pengguna-show">
        <?php $users = new users(); ?>
        <?php foreach ($users->get_user($_POST['username']) as $data) : ?>
            <?php $user_id = $data['id']; ?>
            <h1>Profile Akun <?= $_POST['username'] ?> </h1>
            <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
            </svg>
            <p>Username : <?= $data['username']; ?></p>
            <p>Email : <?= $data['email']; ?></p>
            <p>Role : <?= $data['role']; ?></p>

            <?php $pesanan = new pesanan(); ?>
            <p>Total Pesanan : <?= $pesanan->total_pesanan_by_user($user_id) ?></p>
            <p>Total Pesanan yang sedang diproses : <?= $pesanan->total_pesanan_pending_by_user($user_id) ?></p>
            <p>Total Pesanan yang sudah diproses : <?= $pesanan->total_pesanan_done_by_user($user_id) ?></p>

            <p>Pesanan Terbaru: </p>
            <ul>
                <?php $no = 0 ?>
                <?php foreach ($pesanan->get_data_user($user_id) as $data2) : ?>
                    <li>
                        <p><?= ++$no ?></p>
                        <p><?= $users->get_username($data2['user_id']) ?></p>
                        <p><?= $data2['tanggal_dibuat'] ?></p>
                        <p><?= $data2['total_harga'] ?></p>
                        <p><?= $data2['status'] ?></p>

                        <form action="show.php" method="post">
                            <input type="hidden" name="id_pesanan" value="<?= $data2['id'] ?>">
                            <button type="submit" name="lihat">Lihat</button>
                        </form>
                    </li>

                    <!-- hanya menunjukkan maks 3 pesanan terbaru -->
                    <?php if ($no >= 3) break; ?>
                <?php endforeach; ?>

                <!-- jika tidak ada pesanan -->
                <?php if ($no === 0) : ?>
                    <p>Belum ada pesanan</p>
                <?php endif; ?>
            </ul>
        <?php endforeach; ?>
    </main>


    <?php include __DIR__ . "/../template/footer.php"; ?>
</body>

</html>