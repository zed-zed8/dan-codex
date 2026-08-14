<?php include __DIR__ . "/../template/include.php"; ?>

<!-- Start Header -->
<?php include __DIR__ . "/../template/head.php"; ?>
<!-- End Header -->

<body>
    <?php include __DIR__ . "/../template/header.php"; ?>

    <?php include __DIR__ . "/../template/sidebar.php"; ?>

    <h1>Pesanan</h1>

    <p>Daftar semua pesanan yang masuk</p>

    <ul>
        <?php $pesanan = new pesanan(); ?>
        <?php $users = new users(); ?>
        <?php $no = 0 ?>
        <?php foreach ($pesanan->get_data() as $data) : ?>
            <li>
                <p><?= ++$no ?></p>
                <p><?= $users->get_username($data['user_id']) ?></p>
                <p><?= $data['tanggal_dibuat'] ?></p>
                <p><?= $data['total_harga'] ?></p>
                <p><?= $data['status'] ?></p>

                <form action="show.php" method="post">
                    <input type="hidden" name="id_pesanan" value="<?= $data['id'] ?>">
                    <button type="submit" name="lihat">Lihat</button>
                </form>
            </li>
        <?php endforeach; ?>
    </ul>

    <?php include __DIR__ . "/../template/footer.php"; ?>
</body>

</html>