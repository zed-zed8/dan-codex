<?php include __DIR__ .  "/../template/include.php"; ?>

<!-- Start Header -->
<?php include __DIR__ . "/../template/head.php"; ?>
<!-- End Header -->

<body>
    <?php include __DIR__ . "/../template/header.php"; ?>

    <form action="proses.php" method="post">
        <h1>Keranjang</h1>

        <ul>
            <?php
            $keranjang = $_SESSION['keranjang'];
            $produk = new produk();
            $no = 0;
            ?>
            <?php foreach ($keranjang as $data) : ?>
                <?php foreach ($produk->get_data_by_id($data) as $data2) : ?>
                    <li>
                        <p>
                            <img src="../../<?= htmlspecialchars($data2['path_gambar']) ?>" alt="insert img here" width="50" height="50">
                            <?= $data2['nama_produk'] ?> RP<?= number_format($data2['harga'], 0, ",", ".") ?> <?= $data2['kategori'] ?>

                            <label for="<?= $data2 ?>">Masukkan Jumlah</label>
                            <input type="number" name="jumlah[]" id="jumlah-<?= $data2['id'] ?>" value="1">
                            <a href="proses.php?hapus=true&id=<?= $data2['id'] ?>&no=<?= $no++ ?>">Hapus dari keranjang</a>
                        </p>
                    </li>
                <?php endforeach ?>
            <?php endforeach ?>
        </ul>

        <?php if ($_SESSION['keranjang'] !== []) : ?>
            <button type="submit" name="beli">Beli</button>
        <?php else : ?>
            <p>keranjang kosong</p>
        <?php endif; ?>
    </form>

    <?php include __DIR__ . "/../template/footer.php"; ?>
</body>

</html>