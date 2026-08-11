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

    public function get_data(): mysqli|bool
    {
        $data = mysqli_query($this->koneksi, "SELECT * FROM 'pesanan'");
        return $data;
    }
}
