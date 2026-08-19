<nav id="sidebar-nav" class="position-fixed flex-column flex-shrink-0 pt-2 text-dark">
    <ul class="nav nav-pills flex-column">
        <li class="nav-item">
            <a href="../dashboard" class="nav-link <?= basename(getcwd()) == "dashboard" ? "active" : "text-dark" ?>" aria-current="page">
                <svg class="bi me-2" width="4" height="4">
                    <use xlink:href="../dashboard">
                </svg>
                Dashboard
            </a>
        </li>
        <li>
            <a href="../produk" class="nav-link <?= basename(getcwd()) == "produk" ? "active" : "text-dark" ?>">
                <svg class="bi me-2" width="4" height="4">
                    <use xlink:href="../produk" />
                </svg>
                Produk
            </a>
        </li>
        <li>
            <a href="../pesanan" class="nav-link <?= basename(getcwd()) == "pesanan" ? "active" : "text-dark" ?>">
                <svg class="bi me-2" width="4" height="4">
                    <use xlink:href="../pesanan" />
                </svg>
                Pesanan
            </a>
        </li>
        <li>
            <a href="../pengguna" class="nav-link <?= basename(getcwd()) == "pengguna" ? "active" : "text-dark" ?>">
                <svg class="bi me-2" width="4" height="4">
                    <use xlink:href="../pengguna" />
                </svg>
                Pengguna
            </a>
        </li>
    </ul>
</nav>