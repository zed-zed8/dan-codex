<?php

include '../include/database.php';

session_start();

if (isset($_POST['btnlogin'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $users = new users();
    $result = $users->get_user($username, $password);

    if (mysqli_num_rows($result) > 0) {
        // Associative array
        $row = mysqli_fetch_assoc($result);

        $_SESSION['username'] = $row['username'];

        // Free result set
        mysqli_free_result($result);

        header("location:../public/index.php");
    } else {
        header("location:../public/index.php");
    }
}
