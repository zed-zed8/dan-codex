# dan-codex

## Hari ke 1 (selasa, 11-8-2026)

Membuat database dan form login register lalu dashbord admin dan struktur file
dan menambahkakn sedikit oop.

## Hari ke 2 (rabu, 12-8-2026)

Merapihkan kembali struktur file dan folder agar terlihat rapih membuat bagian produk
dan debugging bagian login. Membuat dashbord admin dan sedikit membuat sidebar.

## Hari ke 3 (kamis, 13-8-2026)

Menambahkan keranjang dan prosesnya, dan juga menambahkan bagian usernya.

## Hari ke 4 (jum'at, 14-8-2026)

Menambahkan fitur dashboard admin, dan memulai membuat halaman profil, dan juga membuat css buat user home.

## Hari ke 5 (sabtu, 15-8-2026)

Menambahkan fitur di admin/pengguna buat bisa show penggunanya, membuat ui bagian admin.

## Hari ke 6 (minggu, 16-8-2026)

Menambahkan payment method pakai Midtrans ke bagian user/keranjag, menambahkan hapus item dari keranjang, dan tidak bisa duplicate barang di kernajang.
Menyelesaikan ui untuk bagian admin, dan autentikasi, dan menambahkan logo.

## Hari ke 7 (senin, 17-8-2026)

membuat ui bagian user(header/footer, home, produk, profile.tentang)(menggunakan ai dikit). Menyempurnakan ui admin, menambakan lebih banyak kategori untuk produk, dan mengupsate database(deskripsi produk menjadi tipe text dan kategori menjadi varchar).

## Hari ke 8 (selasa, 18-8-2026)

Menambahkan sorting dan searching(sedikit menggunakan JavaScript). Membuat pdf.

## struktur file

```
assacom/
├── auth/
│   ├── proses_login.php
│   ├── proses_register.php
│   └── logout.php
├── include/
│   ├── class/
│   │   ├── users.php
│   │   ├── produk.php
│   │   └── pesanan.php
│   ├── midtrans-php-master/
│   └── database.php
├── main/
│   ├── admin/
│   │   ├── dashboard/
│   │   │   └── index.php
│   │   ├── pengguna/
│   │   │   ├── index.php
│   │   │   └── show.php
│   │   ├── pesanan/
│   │   │   ├── index.php
│   │   │   ├── proses.php
│   │   │   └── show.php
│   │   ├── produk/
│   │   │   ├── create.php
│   │   │   ├── edit.php
│   │   │   ├── index.php
│   │   │   ├── proses.php
│   │   │   └── show.php
│   │   ├── profile/
│   │   │   └── index.php
│   │   └── template/
│   │   │   ├── footer.php
│   │   │   ├── head.php
│   │   │   ├── header.php
│   │   │   ├── include.php
│   │   │   └── sidebar.php
│   │   └── tentang/
│   │   │   └── index.php
│   └── assets/
│   │   ├── css/
│   │   │   ├── admin/
│   │   │   │   ├── admin.css
│   │   │   │   └── main.css
│   │   │   └── user/
│   │   │       ├── main.css
│   │   │       └── user.css
│   │   ├── img/
│   │   │   └── img_produk/
│   │   └── js/
│   │   │   ├── checkout.js
│   │   │   └── sort.js
│   ├── auth/
│   │   ├── login.php
│   │   └── register.php
│   ├── user/
│   │   ├── home/
│   │   │   ├── index.php
│   │   │   └── proses.php
│   │   ├── keranjang/
│   │   │   ├── checkout.php
│   │   │   ├── checkout_proses.php
│   │   │   ├── index.php
│   │   │   └── proses.php
│   │   ├── produk/
│   │   │   ├── detail_produk.php
│   │   │   ├── index.php
│   │   │   └── proses.php
│   │   ├── profile/
│   │   │   └── index.php
│   │   └── template/
│   │   │   ├── footer.php
│   │   │   ├── head.php
│   │   │   ├── header.php
│   │   │   └── include.php
│   │   └── tentang/
│   │   │   └── index.php
│   └── index.php
├── ascom.sql
├── index.php
└── readme.md
```
