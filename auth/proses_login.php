<?php

include '../include/database.php';

session_start();

if (isset($_POST['btnlogin'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $users = new users();
    $result = $users->get_user($username);

    // Associative array
    $row = mysqli_fetch_assoc($result);
    if (password_verify($password, $row['password'])) {

        session_regenerate_id(true);
        $_SESSION['username'] = $row['username'];

        // Free result set
        mysqli_free_result($result);

        header("location:../public/index.php");
    }

    mysqli_free_result($result);
    header("location:../public/index.php");
    exit();
}
