<div class="navbar bg-base-100">
    <div class="navbar-start">
        <div class="dropdown">
            <div tabindex="0" role="button" class="btn btn-ghost lg:hidden">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" />
                </svg>
            </div>
            <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52">
                <li><a>Item 1</a></li>
                <li>
                    <a>Parent</a>
                    <ul class="p-2">
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('index.php/admin/dashboard') ?>">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('index.php/admin/user') ?>">User</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('index.php/admin/pasien') ?>">Pasien</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('index.php/admin/dokter') ?>">Dokter</a>
                        </li>
                    </ul>
                </li>
                <li><a>Item 3</a></li>
            </ul>
        </div>
        <a class="btn btn-ghost text-xl">daisyUI</a>
    </div>
    <div class="navbar-center hidden lg:flex">
        <ul class="menu menu-horizontal px-1">
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('index.php/admin/dashboard') ?>">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('index.php/admin/user') ?>">User</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('index.php/admin/pasien') ?>">Pasien</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('index.php/admin/dokter') ?>">Dokter</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('index.php/admin/spesialisasi') ?>">Spesialisasi</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('index.php/admin/obat') ?>">Obat</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('index.php/admin/kategori_obat') ?>">Kategori Obat</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('index.php/admin/resep') ?>">Resep</a>
            </li>
        </ul>
    </div>
    <div class="navbar-end">
        <form action="<?= base_url('index.php/auth/logout') ?>" method="post"
            onsubmit="return confirm('Konfirmasi logout')">
            <button class="btn btn-sm btn-error" type="submit">Logout</button>
        </form>
    </div>
</div>
