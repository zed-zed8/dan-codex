<?php

include __DIR__ . "/../../../include/database.php";

?>

<!-- Start Header -->
<?php include __DIR__ . "/../template/head.php"; ?>
<!-- End Header -->

<body>
    <?php include __DIR__ . "/../template/header.php"; ?>

    <?php include __DIR__ . "/../template/sidebar.php"; ?>

    <h1>Pengguna</h1>

    <p>Daftar semua user</p>

    <ul>
        <?php $users = new users(); ?>
        <?php $no = 0 ?>
        <?php foreach ($users->get_data() as $data) : ?>
            <li>
                <p><?= ++$no ?></p>
                <p><?= $data['username'] ?></p>
                <p><?= $data['email'] ?></p>

                <form action="show.php" method="post">
                    <input type="hidden" name="id_pesanan" value="<?= $data['id'] ?>">
                    <button type="submit" name="lihat">Lihat Profile</button>
                </form>
            </li>
        <?php endforeach; ?>
    </ul>


    <?php include __DIR__ . "/../template/footer.php"; ?>
</body>

</html>