<?php

class pesanan extends database
{
    // membuat pesanan
    public function create(int $user_id, int $total_harga, array $keranjang, string $status = "pending"): void
    {
        // isi keranjang [['produk_id' => , 'jumlah' => , 'harga_satuan' => ], ]
        try {
            $tanggal_dibuat = date('Y-m-d H:i:s');

            $sql  = "INSERT INTO pesanan (user_id, total_harga, status, tanggal_dibuat) VALUES (?, ?, ?, ?)";
            $stmt = mysqli_prepare($this->koneksi, $sql);

            if (!$stmt) {
                throw new Exception("Prepare statement gagal: " . mysqli_error($this->koneksi));
            }

            mysqli_stmt_bind_param($stmt, "iiss", $user_id, $total_harga, $status, $tanggal_dibuat);
            mysqli_stmt_execute($stmt);

            // mendapatkan id pesanan yang baru dibuat
            $pesanan_id = mysqli_insert_id($this->koneksi);
            mysqli_stmt_close($stmt);

            // menambahkan detail pesanan
            foreach ($keranjang as $value) {
                $produk_id   = $value['produk_id'];
                $jumlah      = $value['jumlah'];
                $harga_satuan = $value['harga_satuan'];
                $this->create_detail_pesanan($pesanan_id, $produk_id, $jumlah, $harga_satuan);
            }
        } catch (Exception $e) {
            error_log("pesanan::create() error: " . $e->getMessage());
            throw $e;
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

    // mendapatkan data pesanan bedasarkan id
    public function get_pesanan_by_id(int $pesanan_id): array|null
    {
        $sql = "SELECT * FROM pesanan WHERE id = ?";
        $stmt = mysqli_prepare($this->koneksi, $sql);

        mysqli_stmt_bind_param($stmt, "i", $pesanan_id);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);
        return mysqli_fetch_assoc($result);
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

    // menghitung pendapatan hari ini
    public function pendapatan_hari_ini(): int
    {
        try {
            $date = date("Y-m-d");
            $sql  = "SELECT total_harga FROM pesanan WHERE DATE(tanggal_dibuat) = ?";
            $stmt = mysqli_prepare($this->koneksi, $sql);

            if (!$stmt) {
                throw new Exception("Prepare statement gagal: " . mysqli_error($this->koneksi));
            }

            mysqli_stmt_bind_param($stmt, "s", $date);
            mysqli_stmt_execute($stmt);

            $query = mysqli_stmt_get_result($stmt);
            $data  = mysqli_fetch_all($query);
            mysqli_stmt_close($stmt);

            $total = 0;
            foreach ($data as $value) {
                $total += $value[0];
            }

            return $total;
        } catch (Exception $e) {
            error_log("pesanan::pendapatan_hari_ini() error: " . $e->getMessage());
            return 0;
        }
    }

    // menghitung pendapatan bulan ini
    public function pendapatan_bulan_ini(): int
    {
        try {
            $date = date("Y-m");
            $sql  = "SELECT total_harga FROM pesanan WHERE DATE_FORMAT(tanggal_dibuat, '%Y-%m') = ?";
            $stmt = mysqli_prepare($this->koneksi, $sql);

            if (!$stmt) {
                throw new Exception("Prepare statement gagal: " . mysqli_error($this->koneksi));
            }

            mysqli_stmt_bind_param($stmt, "s", $date);
            mysqli_stmt_execute($stmt);

            $query = mysqli_stmt_get_result($stmt);
            $data  = mysqli_fetch_all($query);
            mysqli_stmt_close($stmt);

            $total = 0;
            foreach ($data as $value) {
                $total += $value[0];
            }

            return $total;
        } catch (Exception $e) {
            error_log("pesanan::pendapatan_bulan_ini() error: " . $e->getMessage());
            return 0;
        }
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
