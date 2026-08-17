<!-- Pembungkus Utama (Container): Mengatur otomatis margin kiri-kanan seluruh halaman agar sejajar tegak lurus -->
<div class="" style="width: 100dvw;">

    <!-- NAVBAR ASSACOM -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary align-items-center w-100 px-5 position-sticky" style="height: 80px; top: 0;">
        <div class="container-fluid">
            <!-- Tombol Responsive untuk layar HP -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="nav-logo">
                <a href="../home">
                    <div class="d-flex fw-bold align-items-center">
                        <svg viewBox="0 0 16 16" width="48" height="48" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8,0.71 L14.59,5.29 L13.11,5.29 L13.11,11.41 L8,14.71 L2.89,11.41 L2.89,5.29 L1.41,5.29 Z"
                                fill="none" stroke="#2E9E44" stroke-width="0.61" stroke-linejoin="round" stroke-linecap="round" />

                            <polygon points="4.12,6.35 8,3.53 11.88,6.35 10.47,6.35 8,4.82 5.53,6.35"
                                fill="#7CC13B" />

                            <polygon points="5.29,7 8,5.5 10.71,7 10.71,12 5.29,12"
                                fill="#1B4C96" />

                            <path d="M6.35,7.82 L7.06,7.82 L7.29,8.29 L9.65,8.29 L9.29,9.71 L7.18,9.71 Z"
                                fill="none" stroke="#FFFFFF" stroke-width="0.24" stroke-linejoin="round" stroke-linecap="round" />
                            <line x1="7.8" y1="8.2" x2="7.8" y2="9.6" stroke="#FFFFFF" stroke-width="0.19" />
                            <line x1="8.4" y1="8.2" x2="8.4" y2="9.6" stroke="#FFFFFF" stroke-width="0.19" />
                            <line x1="9" y1="8.2" x2="9" y2="9.6" stroke="#FFFFFF" stroke-width="0.19" />

                            <line x1="7" y1="9.5" x2="7.8" y2="10.1" stroke="#FFFFFF" stroke-width="0.25" />
                            <line x1="7.8" y1="10.1" x2="9.3" y2="10.1" stroke="#FFFFFF" stroke-width="0.25" />

                            <circle cx="7.65" cy="10.4" r="0.33" fill="#FFFFFF" />
                            <circle cx="9.06" cy="10.4" r="0.33" fill="#FFFFFF" />
                        </svg>
                        <div class="d-flex flex-column">
                            <span class="text-info" style="font-size: 1rem;">ASSACOM</span>
                            <span class="" style="font-size: .75rem; color: greenyellow">KOPERASI SEKOLAH</span>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Menu Navigasi Tengah -->
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav align-items-center m-0 gap-3">
                    <li class="nav-item">
                        <a class="nav-link text-white px-3 py-2 <?= basename(getcwd()) == "home" ? "bg-info rounded fw-bold" : "" ?>" href="../home">
                            Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white px-3 py-2 <?= basename(getcwd()) == "produk" ? "bg-info rounded fw-bold" : "" ?>" href="../produk">
                            Produk
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white px-3 py-2 <?= basename(getcwd()) == "tentang" ? "bg-info rounded fw-bold" : "" ?>" href="../tentang">
                            Tentang
                        </a>
                    </li>
                </ul>
            </div>


            <div class="nav-profile d-flex gap-3 align-items-center">
                <div class="d-flex gap-1 align-items-center">
                    <a href="../keranjang">
                        <span class="<?= basename(getcwd()) == "keranjang" ? "btn btn-outline-info" : "btn btn-outline-warning" ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="<?= basename(getcwd()) == "keranjang" ? "white" : "yellow" ?>" class="cart" viewBox="0 0 16 16">
                                <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5M3.14 5l1.25 5h8.22l1.25-5zM5 13a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0m9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0" />
                            </svg>
                            <span class="text-decoration-none" style="color: <?= basename(getcwd()) == "keranjang" ? "white" : "yellow" ?>;">CART</span>
                        </span>
                    </a>
                </div>

                <div class="">
                    <a href="../profile">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="<?= basename(getcwd()) == "profile" ? "cyan" : "black" ?>" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </nav>
</div>