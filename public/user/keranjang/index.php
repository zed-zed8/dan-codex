<?php include __DIR__ .  "/../template/include.php"; ?>

<!-- Start Header -->
<?php include __DIR__ . "/../template/head.php"; ?>
<!-- End Header -->

<body>
    <?php include __DIR__ . "/../template/header.php"; ?>

    <main section="keranjang">
        <div class="card p-3 my-3 overflow-auto" style="height: 22em;">
            <form action="proses.php" method="post">
                <h1>Keranjang</h1>

                <?php if ($_SESSION['keranjang'] !== []) : ?>
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <div class="d-grid text-center" style="grid-auto-flow: column;grid-auto-columns: 1fr;">
                                    <span class="">Nama Produk</span>
                                    <span class="">Harga</span>
                                    <span class="">Kategori</span>
                                    <span class="">Jumlah</span>
                                    <span class="">Aksi</span>
                                </div>
                            </div>
                        </div>

                        <?php
                        $keranjang = $_SESSION['keranjang'];
                        $produk = new produk();
                        $no = 0;
                        ?>
                        <?php foreach ($keranjang as $data) : ?>
                            <?php foreach ($produk->get_data_by_id($data) as $data2) : ?>
                                <div class="row">
                                    <div class="col">
                                        <div class="d-grid text-center" style="grid-auto-flow: column;grid-auto-columns: 1fr;">
                                            <span class="">
                                                <?= $data2['nama_produk'] ?>
                                            </span>
                                            <span class="">
                                                RP<?= number_format($data2['harga'], 0, ",", ".") ?>
                                            </span>
                                            <span class="">
                                                <?= $data2['kategori'] ?>
                                            </span>


                                            <span class="">
                                                <input type="number" name="jumlah[]" id="jumlah-<?= $data2['id'] ?>" value="1" class="w-50">
                                            </span>

                                            <span class="m-1">
                                                <a href="proses.php?hapus=true&id=<?= $data2['id'] ?>&no=<?= $no++ ?>" class="btn btn-danger">Hapus</a>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach ?>
                        <?php endforeach ?>
                    </div>
                <?php endif ?>

                <?php if ($_SESSION['keranjang'] !== []) : ?>
                    <div class="d-flex justify-content-end me-md-5 mt-3">
                        <button type="submit" name="beli" class="btn" style="background-color: blanchedalmond; border: 2px solid tan;">Beli</button>
                    </div>
                <?php else : ?>
                    <div class="d-flex justify-content-center align-items-center mt-5">
                        <h3>keranjang kosong</h3>
                    </div>
                <?php endif; ?>
            </form>
        </div>
    </main>

    <?php include __DIR__ . "/../template/footer.php"; ?>
</body>

</html>