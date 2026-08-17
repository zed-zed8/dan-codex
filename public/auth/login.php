<!-- head -->
<?php include "../user/template/head.php"; ?>
<!-- end head -->

<body>
    <main id="login" class="d-flex justify-content-center align-items-center" style="width: 100dvw; height: 100dvh;">
        <section class="p-3" style="border: 2px solid black;">
            <h1 class="text-center">Login</h1>

            <form action="../../auth/proses_login.php" method="post">
                <div class="">
                    <label for="username">Username</label>
                </div>

                <div class="">
                    <input type="text" name="username" id="username" class="w-100" required>
                </div>

                <div class="">
                    <label for="password">Password</label>
                </div>
                <div class="">
                    <input type="password" name="password" id="password" class="w-100" required>
                </div>

                <div class="mt-2 text-end">
                    <button type="submit" name="btnlogin">Login</button>
                </div>
            </form>
            <br>

            Sudah Register? <a href="register.php">Register Sekarang</a>
        </section>
    </main>
</body>

</html>