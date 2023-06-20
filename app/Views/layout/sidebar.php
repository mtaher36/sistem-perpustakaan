<?php

$currentUri = $_SERVER['REQUEST_URI'];
$dashboardUri = '/admin'; //
$memberUri = '/member';
$memberTambahUri = '/member/tambah';
$kategoriUri = '/kategori';
$peminjamanUri = '/peminjaman';
$bukuUri = '/admin/dataBuku/listBuku';
$TambahbukuUri = '/admin/dataBuku/tambahBuku';
$pengembalianUri = '/pengembalian';
$tambahPeminjamanUri = '/peminjaman/tambah';


// Inisialisasi $activePage dengan nilai default

// Lakukan pengecekan halaman aktif dan atur $activePage sesuai dengan kondisi
if ($currentUri == $dashboardUri) {
    $activePage = 'dashboard';
    $activeLink = 'dataMemberList';
} elseif ($currentUri == $kategoriUri) {
    $activePage = 'dataKategori';
    $activeLink = 'dataMemberList';
} elseif ($currentUri == $memberUri) {
    $activePage = 'dataMember';
    $activeLink = 'dataMemberList';
} elseif ($currentUri == $bukuUri) {
    $activePage = 'dataBuku';
    $activeLink = 'dataBukuList';
} elseif ($currentUri == $peminjamanUri) {
    $activePage = 'dataPeminjaman';
    $activeLink = 'dataPeminjamanList';
} elseif ($currentUri == $pengembalianUri) {
    $activePage = 'dataPengembalian';
    $activeLink = 'dataMemberList';
} elseif ($currentUri == $memberTambahUri) {
    $activeLink = 'dataMemberTambah';
    $activePage = 'dataMember';
} elseif ($currentUri == $TambahbukuUri) {
    $activePage = 'dataBuku';
    $activeLink = 'dataBukuTambah';
} elseif ($currentUri == $tambahPeminjamanUri) {
    $activePage = 'dataPeminjaman';
    $activeLink = 'dataPeminjamanTambah';
} else {
    $activePage = '';
    $activeLink = '';
}

?>
<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            <a class="nav-link collapsed <?php echo ($activePage == 'dashboard') ? 'active' : ''; ?>" href="/admin">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed <?php echo ($activePage == 'dataMember') ? 'active' : ''; ?>" data-bs-target="#dataMember-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-person"></i><span>Data Member</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="dataMember-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <li>
                    <a class="nav-link <?php echo ($activeLink == 'dataMemberList') ? 'active' : ''; ?>" href="<?= base_url('/member'); ?>">
                        <i class="bi bi-circle"></i><span>List Member</span>
                    </a>
                </li>
                <li>
                    <a class="nav-link <?php echo ($activeLink == 'dataMemberTambah') ? 'active' : ''; ?>" href="<?= base_url('/member/tambah'); ?>">
                        <i class="bi bi-circle"></i><span>Tambah Member</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed <?php echo ($activePage == 'dataKategori') ? 'active' : ''; ?>" href="/kategori">
                <i class="bx bxs-category"></i><span>List kategori</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed <?php echo ($activePage == 'dataBuku') ? 'active' : ''; ?>" data-bs-target="#dataBuku-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-book"></i><span>Data Buku</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="dataBuku-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <li>
                    <a class="nav-link <?php echo ($activeLink == 'dataBukuList') ? 'active' : ''; ?>" href="<?= base_url('/admin/dataBuku/listBuku'); ?>">
                        <i class="bi bi-circle"></i><span>List Buku</span>
                    </a>
                </li>
                <li>
                    <a class="nav-link <?php echo ($activeLink == 'dataBukuTambah') ? 'active' : ''; ?>" href="<?= base_url('/admin/dataBuku/tambahBuku'); ?>">
                        <i class="bi bi-circle"></i><span>Tambah Buku</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed <?php echo ($activePage == 'dataPeminjaman') ? 'active' : ''; ?>" data-bs-target="#dataPeminjaman-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-cart"></i><span>Data Peminjaman</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="dataPeminjaman-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <li>
                    <a class="nav-link <?php echo ($activeLink == 'dataPeminjamanList') ? 'active' : ''; ?>" href="/peminjaman">
                        <i class="bi bi-circle"></i><span>List Peminjaman</span>
                    </a>
                </li>
                <li>
                    <a class="nav-link <?php echo ($activeLink == 'dataPeminjamanTambah') ? 'active' : ''; ?>" href="/peminjaman/tambah">
                        <i class="bi bi-circle"></i><span>Tambah Peminjaman</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed<?php echo ($activePage == 'dataPengembalian') ? 'active' : ''; ?>" href="/pengembalian">
                <i class="bi bi-recycle"></i><span>Data Pengembalian</span>
            </a>
        </li>
    </ul>
</aside>