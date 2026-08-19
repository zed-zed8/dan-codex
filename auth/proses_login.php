<?php

include '../include/database.php';

session_start();

if (isset($_POST['btnlogin'])) {
    try {
        $username = trim($_POST['username']);
        $password = $_POST['password'];

        if (empty($username) || empty($password)) {
            header("location:../main/auth/login.php?login=fail&reason=empty");
            exit();
        }

        $users  = new users();
        $result = $users->get_user($username);

        // Associative array
        $row = mysqli_fetch_assoc($result);

        // Cek apakah user ditemukan dan password cocok
        if ($row === null || !password_verify($password, $row['password'])) {
            mysqli_free_result($result);
            header("location:../main/auth/login.php?login=fail&reason=invalid");
            exit();
        }

        // Login berhasil
        session_regenerate_id(true);
        $_SESSION['username'] = $row['username'];

        mysqli_free_result($result);

        header("location:../main/index.php");
        exit();

    } catch (Exception $e) {
        error_log("proses_login error: " . $e->getMessage());
        header("location:../main/auth/login.php?login=fail&reason=error");
        exit();
    }
}

// Jika tidak ada POST request, redirect ke login
header("location:../main/auth/login.php");
exit();
