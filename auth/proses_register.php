<?php

include "../include/database.php";

if (isset($_POST['btnregister'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    $users = new users();

    $error = [];
    if ($users->is_username_exist($username)) {
        $error += ["username" => true];
    }
    if ($users->is_email_exist($email)) {
        $error += ["email" => true];
    }
    if (isset($error)) {
        $get_data = "";
        foreach ($error as $key => $value) {
            if ($value) {
                $get_data .= "&$key=fail";
            }
        }
        header("location:../public/auth/register.php?register=fail" . $get_data);
        exit();
    }


    $users->create($username, $email, $password);

    header("location:../public/index.php");
    exit();
}
