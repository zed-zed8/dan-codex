<?php include __DIR__ . "/../template/include.php"; ?>

<!-- Start Header -->
<?php include __DIR__ . "/../template/head.php"; ?>
<!-- End Header -->

<body>
    <?php include __DIR__ . "/../template/header.php"; ?>

    <?php include __DIR__ . "/../template/sidebar.php"; ?>

    <main id="pengguna">
        <h1>Pengguna</h1>

        <p>Daftar semua user :</p>


        <section class="card me-5 overflow-auto" style="height: 22em;">
            <div class="container text-center overflow-auto">
                <div class="row bg-info fw-bold p-2">
                    <div class="col">NO</div>
                    <div class="col">Username</div>
                    <div class="col">Email</div>
                    <div class="col">Role</div>
                    <div class="col">Aksi</div>
                </div>
                <?php $users = new users(); ?>
                <?php $no = 0 ?>
                <?php foreach ($users->get_data() as $data) : ?>
                    <div class="row p-2">
                        <div class="col"><?= ++$no ?></div>
                        <div class="col"><?= $data['username'] ?></div>
                        <div class="col"><?= $data['email'] ?></div>
                        <div class="col <?= match ($data['role']) {
                                            "admin" => "bg-secondary",
                                            "user" => "bg-success",
                                        } ?> rounded-3 text-white">
                            <?= $data['role'] ?></div>

                        <div class="col">
                            <form action="show.php" method="post">
                                <input type="hidden" name="username" value="<?= $data['username'] ?>">
                                <button type="submit" name="lihat" class="btn btn-primary">Lihat Profile</button>
                            </form>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>
    </main>

    <?php include __DIR__ . "/../template/footer.php"; ?>
</body>

</html>