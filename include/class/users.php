<?php

class users extends database
{
    // register user baru
    public function create(string $username, string $email, string $password): void
    {
        try {
            $password = password_hash($password, PASSWORD_DEFAULT);

            $sql  = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
            $stmt = mysqli_prepare($this->koneksi, $sql);

            if (!$stmt) {
                throw new Exception("Prepare statement gagal: " . mysqli_error($this->koneksi));
            }

            mysqli_stmt_bind_param($stmt, "sss", $username, $email, $password);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
        } catch (Exception $e) {
            error_log("users::create() error: " . $e->getMessage());
            throw $e;
        }
    }

    // mendapatkan semua data user bedasarkan username
    public function get_user(string $username): bool|mysqli_result
    {
        $sql = "SELECT * FROM users WHERE username = ?";
        $stmt = mysqli_prepare($this->koneksi, $sql);

        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);
        return $result;
    }

    // mendapatkan data semua user
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

    // mengecek jika username udah ada
    public function is_username_exist(string $username): bool
    {
        try {
            $sql  = "SELECT COUNT(*) AS total FROM users WHERE username = ?";
            $stmt = mysqli_prepare($this->koneksi, $sql);

            if (!$stmt) {
                throw new Exception("Prepare statement gagal: " . mysqli_error($this->koneksi));
            }

            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);

            $result = mysqli_stmt_get_result($stmt);
            $data   = mysqli_fetch_assoc($result);
            mysqli_stmt_close($stmt);

            return $data['total'] > 0;
        } catch (Exception $e) {
            error_log("users::is_username_exist() error: " . $e->getMessage());
            return false;
        }
    }

    // mengecek jika email udah ada
    public function is_email_exist(string $email): bool
    {
        try {
            $sql  = "SELECT COUNT(*) AS total FROM users WHERE email = ?";
            $stmt = mysqli_prepare($this->koneksi, $sql);

            if (!$stmt) {
                throw new Exception("Prepare statement gagal: " . mysqli_error($this->koneksi));
            }

            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);

            $result = mysqli_stmt_get_result($stmt);
            $data   = mysqli_fetch_assoc($result);
            mysqli_stmt_close($stmt);

            return $data['total'] > 0;
        } catch (Exception $e) {
            error_log("users::is_email_exist() error: " . $e->getMessage());
            return false;
        }
    }
}
