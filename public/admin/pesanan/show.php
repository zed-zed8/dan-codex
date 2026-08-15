<?php include __DIR__ . "/../template/include.php"; ?>

<!-- Start Header -->
<?php include __DIR__ . "/../template/head.php"; ?>
<!-- End Header -->

<body>
    <?php include __DIR__ . "/../template/header.php"; ?>

    <?php include __DIR__ . "/../template/sidebar.php"; ?>

    <main class="pesanan-show">
        <?php echo "<pre>";
        var_dump($_POST);
        echo "</pre>";; ?>
        <a href="index.php">back</a>

        <ul>
            <?php $pesanan = new pesanan(); ?>
            <?php $produk = new produk(); ?>
            <?php $no = 0; ?>
            <?php foreach ($pesanan->get_detail_pesanan($_POST['id_pesanan']) as $data) : ?>
                <li>
                    <p><?= ++$no ?></p>
                    <p><?= $produk->get_nama($data['produk_id']) ?></p>
                    <p><?= number_format($data['jumlah'], 0, ",", ".") ?></p>
                    <p>RP<?= number_format($data['harga_satuan'], 0, ",", ".") ?></p>
                </li>
            <?php endforeach ?>
        </ul>
        </mainc>

        <?php include __DIR__ . "/../template/footer.php"; ?>
</body>

</html>