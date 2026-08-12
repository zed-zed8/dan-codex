<?php

include __DIR__ . "/../../../include/database.php";

?>

<!-- Start Header -->
<?php include __DIR__ . "/../template/header.php"; ?>
<!-- End Header -->

<body>
    <?php include __DIR__ . "/../template/header.php"; ?>

    <?php include __DIR__ . "/../template/sidebar.php"; ?>

    <a href="index.php">back</a>

    <ul>
        <?php $produk = new produk(); ?>
        <?php foreach ($produk->get_data_by_id($_POST['id_produk']) as $data) : ?>
            <li>
                <img src="../../<?= htmlspecialchars($data['path_gambar']) ?>" alt="insert img here" width="100" height="100">
                <p><?= $data['nama_produk'] ?> RP<?= number_format($data['harga'], 0, ",", ".") ?></p>
                <p><?= $data['deskripsi'] ?></p>
                <p><?= $data['kategori'] ?></p>
                <p></p>
                <p><?= number_format($data['stok'], 0, ",", ".") ?></p>
            </li>
        <?php endforeach ?>
    </ul>

    <?php include __DIR__ . "/../template/footer.php"; ?>
</body>

</html>