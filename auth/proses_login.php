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
        $_SESSION['login'] = $row['username'];

        // Free result set
        mysqli_free_result($result);

        switch ($users->userCheck($_SESSION['login'])) {
            case 'user':
                header("location:../main/user/index.php");
                break;

            case 'admin':
                header("location:../main/admin/dashboard.php");
                break;

            default:
                error_log("userCheck fail");
                break;
        }
    } else {
        $_SESSION['login'] = "gagal";
    }
}
