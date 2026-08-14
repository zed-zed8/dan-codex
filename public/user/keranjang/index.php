<?php

include __DIR__ . "/../../../include/database.php";

?>

<!-- Start Header -->
<?php include __DIR__ . "/../template/head.php"; ?>
<!-- End Header -->

<body>
    <?php include __DIR__ . "/../template/header.php"; ?>

    <form action="proses.php" method="post">

        <h1>Keranjang</h1>

        <ul>
            <?php
            session_start();
            $keranjang = $_SESSION['keranjang'];
            $produk = new produk();
            ?>
            <?php foreach ($keranjang as $data) : ?>
                <?php foreach ($produk->get_data_by_id($data) as $data2) : ?>
                    <li>
                        <p>
                            <img src="../../<?= htmlspecialchars($data2['path_gambar']) ?>" alt="insert img here" width="50" height="50">
                            <?= $data2['nama_produk'] ?> RP<?= number_format($data2['harga'], 0, ",", ".") ?> <?= $data2['kategori'] ?>

                            <label for="<?= $data2 ?>">Masukkan Jumlah</label>
                            <input type="number" name="jumlah[]" id="<?= $data2 ?>">
                        </p>
                    </li>
                <?php endforeach ?>
            <?php endforeach ?>
        </ul>

        <button type="submit" name="beli">Beli</button>
    </form>

    <?php include __DIR__ . "/../template/footer.php"; ?>
</body>

</html>