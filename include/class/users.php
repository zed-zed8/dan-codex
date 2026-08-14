<?php

class users extends database
{
    // register user baru
    public function create(string $username, string $email, string $password): void
    {
        $password = password_hash($password, PASSWORD_DEFAULT);

        mysqli_query(
            $this->koneksi,
            "INSERT INTO users VALUES (NULL, '$username', '$email', '$password', DEFAULT)"
        );
    }

    // mendapatkan semua data user
    public function get_user(string $username): bool|mysqli_result
    {
        $sql = "SELECT * FROM users WHERE username = ?";
        $stmt = mysqli_prepare($this->koneksi, $sql);

        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);
        return $result;
    }

    public function get_data(): bool|mysqli_result
    {
        $sql = "SELECT * FROM users";
        $stmt = mysqli_prepare($this->koneksi, $sql);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);
        return $result;
    }

    // mengecek akun itu admin atau user 
    public function userCheck(string $username): string
    {
        $sql = "SELECT * FROM users WHERE username = ?";
        $stmt = mysqli_prepare($this->koneksi, $sql);

        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);

        $user_data = mysqli_stmt_get_result($stmt);

        foreach ($user_data as $value) {
            return match ($value['role']) {
                'user' => 'user',
                'admin' => 'admin',
            };
        }
        return error_log("userCheck fail");
    }

    // mendapatkan username
    public function get_username(int $id): string
    {
        $sql = "SELECT username FROM users WHERE id = ?";
        $stmt = mysqli_prepare($this->koneksi, $sql);

        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);
        $data = mysqli_fetch_assoc($result);
        return $data['username'];
    }
}
