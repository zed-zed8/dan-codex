<?php

include __DIR__ . "/../../../include/database.php";

?>


<!-- Start Header -->
<?php include __DIR__ . "/../template/head.php"; ?>
<!-- End Header -->

<body>
    <?php include __DIR__ . "/../template/header.php"; ?>

    <?php include __DIR__ . "/../template/sidebar.php"; ?>

    <h1>Selamat Datang Di Dashboard Admin</h1>

    <?php $produk = new produk(); ?>
    <p>Total Produk : <?= $produk->total_produk() ?></p>

    <?php $pesanan = new pesanan(); ?>
    <p>Total Pesanan : <?= $pesanan->total_pesanan() ?></p>

    <p>Total Pesanan yang sedang diproses : <?= $pesanan->total_pesanan_pending() ?></p>

    <p>Total Pesanan yang sudah diproses : <?= $pesanan->total_pesanan_done() ?></p>

    <p>Pesanan Terbaru: </p>
    <ul>
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