<!-- head -->
<?php include __DIR__ . "/../user/template/head.php"; ?>
<!-- end head -->

<body>
    <main id="login" class="d-flex justify-content-center align-items-center" style="width: 100dvw; height: 100dvh;">
        <section class="p-3" style="border: 2px solid black;">
            <h1 class="text-center">Login</h1>

            <?php if (isset($_GET['login']) && $_GET['login'] === 'fail') : ?>
                <div class="alert alert-danger py-1 mb-2" role="alert">
                    <?php
                    $reason = $_GET['reason'] ?? '';
                    echo match ($reason) {
                        'empty'   => 'Username dan password tidak boleh kosong.',
                        'invalid' => 'Username atau password salah.',
                        default   => 'Terjadi kesalahan saat login. Coba lagi.',
                    };
                    ?>
                </div>
            <?php endif; ?>

            <form action="../../auth/proses_login.php" method="post">
                <div class="">
                    <label for="username">Username</label>
                </div>

                <div class="input-group flex-nowrap">
                    <input type="text" name="username" id="username" class="w-100 form-control" required placeholder="Masukan Username" aria-label="Username" aria-describedby="addon-wrapping">
                </div>

                <div class="">
                    <label for="password">Password</label>
                </div>
                <div class="input-group flex-nowrap">
                    <input type="password" name="password" id="password" class="w-100 form-control" required placeholder="••••••" aria-label="Password" aria-describedby="addon-wrapping">
                </div>

                <div class="mt-2 text-start">
                    <button type="submit" name="btnlogin" class="btn btn-primary">Login</button>
                </div>
            </form>
            <br>

            Belum Punya Akun? <a href="register.php">Register Sekarang</a>
        </section>
    </main>
</body>

</html>