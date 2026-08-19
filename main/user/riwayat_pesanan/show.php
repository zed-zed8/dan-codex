<?php include __DIR__ . "/../template/include.php"; ?>

<!-- Start Header -->
<?php include __DIR__ . "/../template/head.php"; ?>
<!-- End Header -->

<body>
    <?php include __DIR__ . "/../template/header.php"; ?>

    <main class="pesanan-show">
        <div class="my-3">
            <a href="index.php" class="btn btn-primary">kembali</a>
        </div>

        <?php 
        $pesanan = new pesanan(); 
        $users = new users();
        $produk = new produk(); 

        $id_pesanan = (int) $_POST['id_pesanan'];
        $pesanan_data = $pesanan->get_pesanan_by_id($id_pesanan);
        $current_user_data = mysqli_fetch_assoc($users->get_user($_SESSION['username']));
        $current_user_id = $current_user_data['id'];

        if (!$pesanan_data || $pesanan_data['user_id'] != $current_user_id) {
            echo "<script>alert('Anda tidak berhak melihat pesanan ini!'); window.location.href='index.php';</script>";
            exit();
        }
        ?>

        <section class="card me-5 overflow-auto" style="height: 20em;">
            <div class="container mt-2 text-center">
                <div class="row bg-info fw-bold p-2">
                    <div class="col">NO</div>
                    <div class="col">Nama Produk</div>
                    <div class="col">Jumlah</div>
                    <div class="col">Harga Satuan</div>
                </div>
                <?php $no = 0; ?>
                <?php foreach ($pesanan->get_detail_pesanan($id_pesanan) as $data) : ?>
                    <div class="row p-2">
                        <div class="col"><?= ++$no ?></div>
                        <div class="col"><?= $produk->get_nama($data['produk_id']) ?></div>
                        <div class="col"><?= number_format($data['jumlah'], 0, ",", ".") ?></div>
                        <div class="col">RP<?= number_format($data['harga_satuan'], 0, ",", ".") ?></div>
                    </div>
                <?php endforeach ?>
            </div>
        </section>
    </main>

    <?php include __DIR__ . "/../template/footer.php"; ?>
</body>

</html>