<?php include __DIR__ . "/../template/include.php"; ?>

<!-- Start Header -->
<?php include __DIR__ . "/../template/head.php"; ?>
<!-- End Header -->

<body>
    <?php include __DIR__ . "/../template/header.php"; ?>

    <?php include __DIR__ . "/../template/sidebar.php"; ?>

    <main class="pesanan">
        <div class="d-flex justify-content-between">
            <div class="">
                <h1>Pesanan</h1>

                <p>Daftar semua pesanan yang masuk</p>
            </div>

            <div class="me-5">
                <form action="" method="get">
                    <div class="mt-5 bg-danger text-center">
                        <?php
                        if (!empty($_GET)) {
                            $tanggal_awal  = $_GET['tanggal_awal'];
                            $tanggal_akhir = $_GET['tanggal_akhir'];

                            if ($tanggal_awal >= $tanggal_akhir) : ?>
                                data yang dimasukkan tidak valid!
                        <?php endif;
                        }
                        ?>
                    </div>
                    <div class="d-flex gap-3">
                        <div class="fw-bold">
                            <label for="tanggal_awal">Tanggal Awal: </label>
                            <input type="date" name="tanggal_awal" id="tanggal_awal" required>
                        </div>
                        <div class="fw-bold">
                            <label for="tanggal_akhir">Tanggal Akhir: </label>
                            <input type="date" name="tanggal_akhir" id="tanggal_akhir" required>
                        </div>
                        <button type="submit" name="sort" class="btn btn-warning">Sort</button>
                    </div>
                </form>
            </div>
        </div>

        <section class="card me-5 overflow-auto" style="height: 22em;">
            <div class="container text-center overflow-auto">
                <div class="row bg-info fw-bold p-2">
                    <div class="col">NO</div>
                    <div class="col">Username</div>
                    <div class="col">Tanggal</div>
                    <div class="col">Total Harga</div>
                    <div class="col">Status</div>
                    <div class="col">Aksi</div>
                </div>
                <?php $pesanan = new pesanan(); ?>
                <?php $users = new users(); ?>
                <?php $no = 0 ?>
                <?php foreach ($pesanan->get_data() as $data) : ?>
                    <?php
                    if (!empty($_GET)) {
                        $tanggal_awal  = $_GET['tanggal_awal'];
                        $tanggal_akhir = $_GET['tanggal_akhir'];
                        $tanggal_data  = explode(" ", $data['tanggal_dibuat'])[0];

                        if ($tanggal_data < $tanggal_awal || $tanggal_data > $tanggal_akhir) {
                            continue;
                        }
                    }
                    ?>
                    <div class="row p-2">
                        <div class="col"><?= ++$no ?></div>
                        <div class="col"><?= $users->get_username($data['user_id']) ?></div>

                        <div class="col">
                            <?php
                            $text = explode(" ", $data['tanggal_dibuat'])[0];

                            $nama_bulan = [
                                'Januari',
                                'Februari',
                                'Maret',
                                'April',
                                'Mei',
                                'Juni',
                                'Juli',
                                'Agustus',
                                'September',
                                'Oktober',
                                'November',
                                'Desember'
                            ];

                            $tahun = explode("-", $text)[0];
                            $bulan = explode("-", $text)[1];
                            $bulan = $nama_bulan[substr($bulan, 1)];
                            $tanggal = explode("-", $text)[2];

                            $text = "$tanggal $bulan $tahun";

                            echo $text;
                            ?>
                        </div>

                        <div class="col"><?= $data['total_harga'] ?></div>
                        <div class="col <?= match ($data['status']) {
                                            "pending" => "bg-warning",
                                            "done" => "bg-success",
                                        } ?> rounded-3">
                            <?= $data['status'] ?>
                        </div>

                        <div class="col">
                            <div class="d-flex gap-3">
                                <form action="show.php" method="post">
                                    <input type="hidden" name="id_pesanan" value="<?= $data['id'] ?>">
                                    <button type="submit" name="lihat" class="btn btn-primary">Lihat</button>
                                </form>

                                <form action="proses.php" method="post">
                                    <input type="hidden" name="id_pesanan" value="<?= $data['id'] ?>">
                                    <button type="submit" name="hapus_pesanan" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>
    </main>
    <?php include __DIR__ . "/../template/footer.php"; ?>

    <script src="../../assets/js/admin/sort_pesanan.js" defer></script>
</body>

</html>