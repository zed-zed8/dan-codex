<?php

include __DIR__ . "/../../../include/database.php";

?>

<!-- Start Header -->
<?php include __DIR__ . "/../template/head.php"; ?>
<!-- End Header -->

<body>
    <?php include __DIR__ . "/../template/header.php"; ?>

    <h1>Selamat Datang Di Assalaam E-Commerce</h1>


    <ul>
        <?php $produk = new produk(); ?>
        <?php foreach ($produk->get_data() as $data) : ?>
            <li>

                <form action="show.php" method="post">
                    <input type="hidden" name="id_produk" value="<?= $data['id'] ?>">
                    <button type="submit">
                        <img src="../../<?= htmlspecialchars($data['path_gambar']) ?>" alt="insert img here" width="100" height="100">
                    </button>
                </form>
                <p><?= $data['nama_produk'] ?> RP<?= number_format($data['harga'], 0, ",", ".") ?></p>
                <p><?= $data['deskripsi'] ?></p>
                <p><?= $data['kategori'] ?></p>
                <p><?= number_format($data['stok'], 0, ",", ".") ?></p>
                <form action="proses.php" method="post">
                    <input type="hidden" name="id_produk" value="<?= $data['id'] ?>">
                    <button type="submit" name="masuk_keranjang">Masukan ke keranjang</button>
                </form>
            </li>
        <?php endforeach ?>
    </ul>


    <?php include __DIR__ . "/../template/footer.php"; ?>
</body>

</html>