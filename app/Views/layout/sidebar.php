<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            <a class="nav-link " href="index.html">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->
        <!-- AWAL DATA MEMBER -->
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#dataMember-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-person"></i><span>Data Member</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="dataMember-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="dataMember-alerts.html">
                        <i class="bi bi-circle"></i><span>List Member</span>
                    </a>
                </li>
                <li>
                    <a href="dataMember-accordion.html">
                        <i class="bi bi-circle"></i><span>Tambah Member</span>
                    </a>
                </li>
            </ul>
        </li>

        <!-- AKHIR DATA MEMBER -->
        <!-- awal data Buku -->
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#dataBuku-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>Data Buku</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="dataBuku-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="<?= base_url('/admin/dataBuku/listBuku'); ?>">
                        <i class="bi bi-circle"></i><span>List Buku</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('/admin/dataBuku/tambahBuku'); ?>">
                        <i class="bi bi-circle"></i><span>Tambah Buku</span>
                    </a>
                </li>
            </ul>
        </li>
        <!-- End dataBuku Nav -->
        <!-- awal Data Peminjaman -->
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#dataPeminjaman-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-cart"></i><span>Data Peminjaman</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="dataPeminjaman-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="dataPeminjaman-alerts.html">
                        <i class="bi bi-circle"></i><span>List Peminjaman</span>
                    </a>
                </li>
                <li>
                    <a href="dataPeminjaman-accordion.html">
                        <i class="bi bi-circle"></i><span>Tambah Peminjaman</span>
                    </a>
                </li>
            </ul>
        </li>
        <!-- akhir data peminjaman -->
        <!-- awal data pengembalian -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#">
                <i class="bi bi-recycle"></i><span>Data Pengembalian</span></i>
            </a>
        </li>
        <!-- akhir data pengamblian -->
    </ul>

</aside>