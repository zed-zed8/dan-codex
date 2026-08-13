<?php

class pesanan extends database
{
    public function create(int $user_id, int $total_harga): void
    {
        $tanggal_dibuat = date('Y-m-d');
        mysqli_query(
            $this->koneksi,
            "INSERT INTO pesanan VALUES (NULL, $user_id, '$total_harga', DEFAULT, '$tanggal_dibuat')"
        );
    }

    public function get_data(): mysqli_result|bool
    {
        $data = mysqli_query($this->koneksi, "SELECT * FROM pesanan");
        return $data;
    }

    public function get_detail_pesanan(int $pesanan_id): bool|mysqli_result
    {
        $sql = "SELECT * FROM detail_pesanan WHERE pesanan_id = ?";
        $stmt = mysqli_prepare($this->koneksi, $sql);

        mysqli_stmt_bind_param($stmt, "i", $pesanan_id);
        mysqli_stmt_execute($stmt);

        return mysqli_stmt_get_result($stmt);
    }
}
