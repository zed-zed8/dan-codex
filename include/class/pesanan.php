<?php

class pesanan extends database
{
    // membuat pesanan
    public function create(int $user_id, int $total_harga, array $keranjang, string $status = "pending"): void
    {
        // isi keranjang [['produk_id' => , 'jumlah' => , 'harga_satuan' => ], ]
        $tanggal_dibuat = date('Y-m-d H:i:s');

        // $sql = "INSERT INTO pesanan VALUES (NULL, ?, ?, ?, ?)";
        // $stmt = mysqli_prepare($this->koneksi, $sql);

        // mysqli_stmt_bind_param($stmt, "iiss", $user_id, $total_harga, $status, $tanggal_dibuat);
        // mysqli_stmt_execute($stmt);
        mysqli_query(
            $this->koneksi,
            "INSERT INTO pesanan VALUES (NULL, '$user_id', '$total_harga', '$status', '$tanggal_dibuat')"
        );

        // mendapatkan id pesanan
        $pesanan_id_query = mysqli_query($this->koneksi, "SELECT id FROM pesanan ORDER BY id DESC LIMIT 1");
        $pesanan_id_data = mysqli_fetch_assoc($pesanan_id_query);
        $pesanan_id = $pesanan_id_data['id'];

        // menambahkan detail pesanan
        foreach ($keranjang as $value) {
            $produk_id = $value['produk_id'];
            $jumlah = $value['jumlah'];
            $harga_satuan = $value['harga_satuan'];
            $this->create_detail_pesanan($pesanan_id, $produk_id, $jumlah, $harga_satuan);
        }
    }

    // menambahkan ke detail_pesanan
    private function create_detail_pesanan(int $pesanan_id, int $produk_id, int $jumlah, int $harga_satuan): void
    {
        $sql = "INSERT INTO detail_pesanan VALUES (NULL, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($this->koneksi, $sql);

        mysqli_stmt_bind_param($stmt, "iiii", $pesanan_id, $produk_id, $jumlah, $harga_satuan);
        mysqli_stmt_execute($stmt);
    }

    // mendapatkan semua data
    public function get_data(): mysqli_result|bool
    {
        $data = mysqli_query($this->koneksi, "SELECT * FROM pesanan ORDER BY tanggal_dibuat DESC");
        return $data;
    }

    // mendapatkan semua data dari detail_pesanan
    public function get_detail_pesanan(int $pesanan_id): bool|mysqli_result
    {
        $sql = "SELECT * FROM detail_pesanan WHERE pesanan_id = ?";
        $stmt = mysqli_prepare($this->koneksi, $sql);

        mysqli_stmt_bind_param($stmt, "i", $pesanan_id);
        mysqli_stmt_execute($stmt);

        return mysqli_stmt_get_result($stmt);
    }

    // mendapatkan semua data bedasarkan user
    public function get_data_user(int $user_id): mysqli_result|bool
    {
        $sql = "SELECT * FROM pesanan WHERE user_id = ? ORDER BY tanggal_dibuat DESC";
        $stmt = mysqli_prepare($this->koneksi, $sql);

        mysqli_stmt_bind_param($stmt, "i", $user_id);
        mysqli_stmt_execute($stmt);

        return mysqli_stmt_get_result($stmt);
    }


    // menghitung total pesanan
    public function total_pesanan(): int
    {
        $data = mysqli_query(
            $this->koneksi,
            "SELECT * FROM pesanan"
        );
        return mysqli_num_rows($data);
    }

    // menghitung total pesanan yang sedang diproses
    public function total_pesanan_pending(): int
    {
        $data = mysqli_query(
            $this->koneksi,
            "SELECT * FROM pesanan WHERE `status` = 'pending'"
        );
        return mysqli_num_rows($data);
    }

    // menghitung total pesanan yang sudah diproses
    public function total_pesanan_done(): int
    {
        $data = mysqli_query(
            $this->koneksi,
            "SELECT * FROM pesanan WHERE `status` = 'done'"
        );
        return mysqli_num_rows($data);
    }


    // menghitung total pesanan bedasarkan user
    public function total_pesanan_by_user(int $user_id): int
    {
        $sql = "SELECT * FROM pesanan WHERE user_id = ?";
        $stmt = mysqli_prepare($this->koneksi, $sql);

        mysqli_stmt_bind_param($stmt, "i", $user_id);
        mysqli_stmt_execute($stmt);

        return mysqli_num_rows(mysqli_stmt_get_result($stmt));
    }

    // menghitung total pesanan pending bedasarkan user
    public function total_pesanan_pending_by_user(int $user_id): int
    {
        $sql = "SELECT * FROM pesanan WHERE user_id = ? AND `status` = 'pending'";
        $stmt = mysqli_prepare($this->koneksi, $sql);

        mysqli_stmt_bind_param($stmt, "i", $user_id);
        mysqli_stmt_execute($stmt);

        return mysqli_num_rows(mysqli_stmt_get_result($stmt));
    }

    // menghitung total pesanan done bedasarkan user
    public function total_pesanan_done_by_user(int $user_id): int
    {
        $sql = "SELECT * FROM pesanan WHERE user_id = ? AND `status` = 'done'";
        $stmt = mysqli_prepare($this->koneksi, $sql);

        mysqli_stmt_bind_param($stmt, "i", $user_id);
        mysqli_stmt_execute($stmt);

        return mysqli_num_rows(mysqli_stmt_get_result($stmt));
    }

    // menghapus data pesanan
    public function delete(int $pesanan_id): void
    {
        $sql = "DELETE FROM pesanan WHERE id = ?";
        $stmt = mysqli_prepare($this->koneksi, $sql);

        mysqli_stmt_bind_param($stmt, "i", $pesanan_id);
        mysqli_stmt_execute($stmt);
    }
}
