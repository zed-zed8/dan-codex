<?php

include "../include/database.php";

if (isset($_POST['btnregister'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    $users = new users();
    $users->create($username, $email, $password);

    header("location:../public/index.php");
    exit();
}
