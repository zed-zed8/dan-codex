<?php

class produk extends database
{
    // membuat produk baru
    public function create(string $nama_produk, string $deskripsi, string $kategori, int  $harga, int $stok, string $path_gambar): void
    {
        $sql = "INSERT INTO produk VALUES (NULL, ?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($this->koneksi, $sql);

        mysqli_stmt_bind_param($stmt, "sssiis", $nama_produk, $deskripsi, $kategori, $harga, $stok, $path_gambar);
        mysqli_stmt_execute($stmt);
    }

    // mendapatkan semua data produk
    public function get_data(): mysqli_result|bool
    {
        $data = mysqli_query($this->koneksi, "SELECT * FROM produk");
        return $data;
    }

    // mendapatkan semua data produk bedasarkan nama
    public function get_data_by_id(int $id_produk): mysqli_result|bool
    {
        $sql = "SELECT * FROM produk WHERE id = ?";
        $stmt = mysqli_prepare($this->koneksi, $sql);

        mysqli_stmt_bind_param($stmt, "i", $id_produk);
        mysqli_stmt_execute($stmt);

        return mysqli_stmt_get_result($stmt);
    }

    // mengedit data produk bedasarkan id
    public function edit(string $nama_produk, string $deskripsi, string $kategori, int  $harga, int $stok, int $id_produk, string $path_gambar = ""): void
    {
        $sql = "UPDATE produk SET id = ?, nama_produk = ?, deskripsi = ?, kategori = ?,harga = ?, stok = ? WHERE id = ?";
        $stmt = mysqli_prepare($this->koneksi, $sql);

        mysqli_stmt_bind_param($stmt, "sssiisi", $nama_produk, $deskripsi, $kategori, $harga, $stok, $id_produk);
        mysqli_stmt_execute($stmt);

        if ($path_gambar !== "") {
            $sql = "UPDATE produk SET path_gambar = ? WHERE id = ?";
            $stmt = mysqli_prepare($this->koneksi, $sql);

            mysqli_stmt_bind_param($stmt, "s", $path_gambar, $id_produk);
            mysqli_stmt_execute($stmt);
        }
    }

    // menghapus produk
    public function delete(int $id_produk): void
    {
        mysqli_query($this->koneksi, "DELETE FROM produk WHERE id = '$id_produk'");
    }

    public function get_nama(int $id): string
    {
        $sql = "SELECT nama_produk FROM produk WHERE id = ?";
        $stmt = mysqli_prepare($this->koneksi, $sql);

        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);
        $data = mysqli_fetch_assoc($result);
        return $data['nama_produk'];
    }

    // mengurangi stok produk setelah membeli
    public function reduce_stok(int $id_produk, int $jumlah): void
    {
        // mendapatkan stok lama
        $sql = "SELECT stok FROM produk WHERE id = ?";
        $stmt = mysqli_prepare($this->koneksi, $sql);

        mysqli_stmt_bind_param($stmt, "i", $id_produk);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);
        $data = mysqli_fetch_assoc($result);
        // melakukan kalkulasi
        $stok_baru = $data['stok'] - $jumlah;

        // update stok
        $sql = "UPDATE produk SET stok = ? WHERE id = ?";
        $stmt = mysqli_prepare($this->koneksi, $sql);

        mysqli_stmt_bind_param($stmt, "ii", $stok_baru, $id_produk);
        mysqli_stmt_execute($stmt);
    }

    // menghitung total produk
    public function total_produk(): int
    {
        $data = mysqli_query(
            $this->koneksi,
            "SELECT * FROM produk"
        );
        return mysqli_num_rows($data);
    }
}
