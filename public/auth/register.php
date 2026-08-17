<!-- head -->
<?php include __DIR__ . "/../user/template/head.php"; ?>
<!-- end head -->

<body>
    <main id="login" class="d-flex justify-content-center align-items-center" style="width: 100dvw; height: 100dvh;">
        <section class="p-3" style="border: 2px solid black;">
            <h1 class="text-center">Register</h1>

            <form action="../../auth/proses_register.php" method="post" id="form">
                <div class="">
                    <label for="username">Username</label>
                </div>
                <div class="">
                    <input type="text" name="username" id="username" class="w-100" required>
                </div>
                <?php if (isset($_GET['username'])) : ?>
                    <div class="text-danger" style="font-size: .8em;">
                        <label for="username">Username sudah ada!</label>
                    </div>
                <?php endif; ?>

                <div class="">
                    <label for="email">Email</label>
                </div>
                <div class="">
                    <input type="email" name="email" id="email" class="w-100" required>
                </div>
                <?php if (isset($_GET['email'])) : ?>
                    <div class="text-danger" style="font-size: .8em;">
                        <label for="email">Email sudah dipakai!</label>
                    </div>
                <?php endif; ?>

                <div class="">
                    <label for="password">Password</label>
                </div>
                <div class="">
                    <input type="password" name="password" id="password" class="w-100" required>
                </div>

                <div class="mt-2 text-end">
                    <button type="submit" name="btnregister" id="btnregister">Register</button>
                </div>
            </form>

            Sudah Register? <a href="login.php">Login Sekarang</a>
        </section>
    </main>
</body>

</html>