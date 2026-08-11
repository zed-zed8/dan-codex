<?php

include "../include/database.php";

if (isset($_POST['btnregister'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $users = new users();
    $users->create($username, $password);

    header("location:login.php");
}
