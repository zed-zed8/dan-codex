<?php include __DIR__ .  "/../template/include.php"; ?>

<!-- Start Header -->
<?php include __DIR__ . "/../template/head.php"; ?>
<!-- End Header -->

<body>
    <?php include __DIR__ . "/../template/header.php"; ?>

    <main section="keranjang">
        <div class="card p-3 my-3">
            <form action="checkout_proses.php" method="post">
                <h1>Checkout</h1>

                <label for="first_name">First Name</label><br>
                <input type="text" name="first_name" id="first_name" required>
                <br><br>

                <label for="last_name">Last Name</label><br>
                <input type="text" name="last_name" id="last_name" required>
                <br><br>

                <label for="email">Email Address</label><br>
                <input type="email" name="email" id="email" required>
                <br><br>

                <label for="phone">Phone Number</label><br>
                <input type="tel" name="phone" id="phone" required>
                <br><br>

                <button type="submit" name="bayar" class="btn btn-success">Bayar</button>
            </form>

        </div>
    </main>
    <?php include __DIR__ . "/../template/footer.php"; ?>
</body>

</html>