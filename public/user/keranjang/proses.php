<!-- Bikin Proses membeli -->
<?php

include __DIR__ . "/../template/include.php";

if (isset($_POST['beli'])) {
    $session_keranjang = $_SESSION['keranjang'];
    $jumlah = $_POST['jumlah'];

    // membuat isi keranjang + total harga
    $produk = new produk();
    $isi_keranjang = [];
    $no = 0;
    $total_harga = 0;
    foreach ($session_keranjang as $data) {
        foreach ($produk->get_data_by_id($data) as $data2) {
            $isi_keranjang[] = [
                "produk_id" => $data2['id'],
                "jumlah" => $jumlah[$no],
                "harga_satuan" => $data2['harga'],
            ];
            $total_harga += $jumlah[$no] * $data2['harga'];
            // mengurangi stok produk
            $produk->reduce_stok($data2['id'], $jumlah[$no]);

            $no++;
        }
    }

    // mendapatkan user id
    $users  = new users();
    foreach ($users->get_user($_SESSION['username']) as $data) {
        $user_id = $data['id'];
    }

    // create pesanan
    $pesanan = new pesanan();
    $pesanan->create($user_id, $total_harga, $isi_keranjang);

    // reset keranjang
    $_SESSION['keranjang'] = [];
}

header("location:../home");
exit();
