<?php

class users extends database
{
    public function create(string $username, string $password): void
    {
        $password = password_hash($password, PASSWORD_DEFAULT);

        mysqli_query(
            $this->koneksi,
            "INSERT INTO users VALUES (NULL, '$username', '$password', DEFAULT)"
        );
    }

    public function get_user(string $username, string $password): bool|mysqli_result
    {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $result = mysqli_query(
            $this->koneksi,
            "SELECT * FROM users WHERE username = '$username' and password = '$password'"
        );
        return $result;
    }

    public function userCheck(string $username): string
    {
        $sql = "SELECT * FROM users WHERE username = ?";
        $stmt = mysqli_prepare($this->koneksi, $sql);

        mysqli_stmt_bind_param($stmt, "s", $username);
        $result = mysqli_stmt_execute($stmt);

        $user_data = mysqli_stmt_get_result($stmt);

        foreach ($user_data as $value) {
            switch ($value['role']) {
                case 'user':
                    return "user";
                case 'admin':
                    return "admin";

                default:
                    return "user check gagal";
            }
        }
        return "user check gagal";
    }
}
