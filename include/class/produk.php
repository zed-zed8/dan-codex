<?php

class produk extends database
{
    public function create(string $nama_produk, string $deskripsi, string $kategori, int  $harga, int $stok): void
    {
        mysqli_query(
            $this->koneksi,
            "INSERT INTO produk VALUES (NULL, '$nama_produk', '$deskripsi', '$kategori', '$harga', '$stok')"
        );
    }

    public function get_data(): mysqli_result|bool
    {
        $data = mysqli_query($this->koneksi, "SELECT * FROM produk");
        return $data;
    }
}
