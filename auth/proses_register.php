<?php

include "../include/database.php";

if (isset($_POST['btnregister'])) {
    try {
        $username = trim($_POST['username']);
        $password = $_POST['password'];
        $email    = trim($_POST['email']);

        // Validasi dasar server-side
        $error = [];

        if (empty($username) || strlen($username) < 3) {
            $error['username_format'] = true;
        }

        if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error['email_format'] = true;
        }

        if (empty($password) || strlen($password) < 6) {
            $error['password_format'] = true;
        }

        $users = new users();

        // Cek duplikasi hanya jika format valid
        if (!isset($error['username_format']) && $users->is_username_exist($username)) {
            $error['username'] = true;
        }
        if (!isset($error['email_format']) && $users->is_email_exist($email)) {
            $error['email'] = true;
        }

       
        if (!empty($error)) {
            $get_data = "";
            foreach ($error as $key => $value) {
                if ($value) {
                    $get_data .= "&$key=fail";
                }
            }
            header("location:../main/auth/register.php?register=fail" . $get_data);
            exit();
        }

        $users->create($username, $email, $password);

        header("location:../main/auth/login.php?register=success");
        exit();

    } catch (Exception $e) {
        error_log("proses_register error: " . $e->getMessage());
        header("location:../main/auth/register.php?register=fail&error=server");
        exit();
    }
}

// Jika tidak ada POST request, redirect ke register
header("location:../main/auth/register.php");
exit();
