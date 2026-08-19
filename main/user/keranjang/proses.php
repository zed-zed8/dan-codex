<?php

include __DIR__ . "/../template/include.php";

if (isset($_POST['beli'])) {
    $jumlah = $_POST['jumlah'];
    $_SESSION['jumlah'] = $jumlah;
    header("location:checkout.php");
    exit();
}

if (isset($_GET['hapus'])) {
    $id = (int) $_GET['id'];
    $no = (int) $_GET['no'];

    if (isset($_SESSION['keranjang'][$no])) {
        unset($_SESSION['keranjang'][$no]);
        unset($_SESSION['jumlah'][$no]);

        // reset numbering
        $_SESSION['keranjang'] = array_values($_SESSION['keranjang']);
        $_SESSION['jumlah']    = array_values($_SESSION['jumlah']);
    }

    header("location:index.php");
    exit();
}

if (isset($_POST['json'])) {
    try {
        $session_keranjang = $_SESSION['keranjang'] ?? [];
        $jumlah            = $_SESSION['jumlah'] ?? [];
        $json              = $_POST['json'];
        $json              = json_decode($json, true);

        if ($json === null) {
            throw new Exception("JSON payload tidak valid.");
        }

        // membuat isi keranjang + total harga
        $produk         = new produk();
        $isi_keranjang  = [];
        $no             = 0;
        $total_harga    = 0;
        $stok_error     = false;

        foreach ($session_keranjang as $data) {
            foreach ($produk->get_data_by_id($data) as $data2) {
                $qty_diminta = (int) ($jumlah[$no] ?? 1);

                // FIX BUG KRITIS: Validasi stok sebelum mengurangi
                if ($qty_diminta > (int) $data2['stok']) {
                    $stok_error = true;
                    break 2;
                }
                if ($qty_diminta < 1) {
                    $qty_diminta = 1;
                }

                $isi_keranjang[] = [
                    "produk_id"   => $data2['id'],
                    "jumlah"      => $qty_diminta,
                    "harga_satuan" => $data2['harga'],
                ];
                $total_harga += $qty_diminta * $data2['harga'];

                // mengurangi stok produk
                $produk->reduce_stok($data2['id'], $qty_diminta);
                $no++;
            }
        }

        if ($stok_error) {
            header("location:index.php?error=stok");
            exit();
        }

        // mendapatkan user id
        $users = new users();
        foreach ($users->get_user($_SESSION['username']) as $data) {
            $user_id = $data['id'];
        }

        // create pesanan
        $pesanan = new pesanan();
        if (isset($json['status_message']) && $json['status_message'] === "Success, transaction is found") {
            $pesanan->create($user_id, $total_harga, $isi_keranjang, "done");
        } else {
            $pesanan->create($user_id, $total_harga, $isi_keranjang);
        }

        // reset keranjang dan jumlah
        $_SESSION['keranjang'] = [];
        $_SESSION['jumlah']    = [];

    } catch (Exception $e) {
        header("location:index.php?error=server");
        exit();
    }
}

header("location:../home");
exit();
