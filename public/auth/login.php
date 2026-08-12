<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <h1>Login</h1>

    <form action="/../auth/proses_login.php" method="post">
        <label>Username</label><br>
        <input type="text" name="username" required>
        <br><br>

        <label>Password</label><br>
        <input type="password" name="password" required>
        <br><br>

        <button type="submit" name="btnlogin">Login</button>
    </form>

    <a href="register.php">register</a>
</body>

</html>

<?php
session_start();
echo "<pre>";
var_dump($_SESSION);
echo "</pre>";
?>