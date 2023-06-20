<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <!-- Buku Card -->
                    <div class="col-xxl-4 col-md-6 col-xl-4">
                        <div class="card info-card buku-card">

                            <!-- <div class="filter">
                        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <li class="dropdown-header text-start">
                                <h6>Filter</h6>
                            </li>

                            <li><a class="dropdown-item" href="#">Today</a></li>
                            <li><a class="dropdown-item" href="#">This Month</a></li>
                            <li><a class="dropdown-item" href="#">This Year</a></li>
                        </ul>
                        </div> -->

                            <div class="card-body">
                                <h5 class="card-title">Data Buku</h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-book"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>145</h6>
                                        <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Buku Card -->

                    <!-- Member Card -->
                    <div class="col-xxl-4 col-md-6 col-xl-4">

                        <div class="card info-card members-card">

                            <div class="card-body">
                                <h5 class="card-title">Data Member</h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-people"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>1244</h6>
                                        <span class="text-danger small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">decrease</span>

                                    </div>
                                </div>

                            </div>
                        </div>

                    </div><!-- End Member Card -->

                    <!-- Member Card -->
                    <div class="col-xxl-4 col-md-6 col-xl-4">

                        <div class="card info-card peminjaman-card">
                            <div class="card-body">
                                <h5 class="card-title">Data Peminjaman</h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-cart"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>12</h6>
                                        <span class="text-warning small pt-1 fw-bold">10%</span> <span class="text-muted small pt-2 ps-1">decrease</span>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div><!-- End Member Card -->

                </div>
            </div>
            <div class="col-lg-8">
                <div class="row">
                    <!-- Awal Recent Data Buku -->
                    <div class="col-12">
                        <div class="card recent-buku overflow-auto">
                            <div class="card-body">
                                <h5 class="card-title">Recent Data Buku <span>| Today</span></h5>
                            </div>

                            <table class="table table-borderless datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Sampul</th>
                                        <th scope="col">Judul</th>
                                        <th scope="col">Kategori</th>
                                        <th scope="col">Penerbit</th>
                                        <th scope="col">Pengarang</th>
                                        <th scope="col">Tahun</th>
                                        <th scope="col">Jumlah</th>
                                        <th scope="col">Rak</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1 ?>
                                    <?php foreach ($buku as $k) : ?>
                                        <tr>
                                            <th scope="row"><?= $i++; ?></th>
                                            <td><img src="/img/cover/<?= $k['sampul']; ?>" alt="" class="sampul"></td>
                                            <td><?= $k['judul']; ?></td>
                                            <td><?= $k['kategori']; ?></td>
                                            <td><?= $k['penerbit']; ?></td>
                                            <td><?= $k['pengarang']; ?></td>
                                            <td><?= $k['tahun']; ?></td>
                                            <td><?= $k['jumlah']; ?></td>
                                            <td><?= $k['rak']; ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- akhir recent table data buku -->

                    <!-- awal dari member data -->
                    <div class="col-12">
                        <div class="card recent-members overflow-auto">
                            <div class="card-body">
                                <h5 class="card-title">Recent Data Member <span>| Today</span></h5>
                            </div>

                            <table class="table table-borderless datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">NIS</th>
                                        <th scope="col">Kelas</th>
                                        <th scope="col">Jurusan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1 ?>
                                    <?php foreach ($member as $m) : ?>
                                        <tr>
                                            <th scope="row"><?= $i++; ?></th>
                                            <td><?= $m['nama']; ?></td>
                                            <td><?= $m['nis']; ?></td>
                                            <td><?= $m['kelas']; ?></td>
                                            <td><?= $m['jurusan']; ?></td>
                                        </tr>
                                    <?php endforeach; ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- akhir  table data member -->
                </div>
            </div>
            <div class="col-lg-4">
                <!-- awal dari kategori data -->

                <div class="card recent-peminjaman overflow-auto">
                    <div class="card-body">
                        <h5 class="card-title">Recent Data Kategori <span>| Today</span></h5>
                    </div>

                    <table class="table table-borderless datatable">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Kategori</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1 ?>
                            <?php foreach ($kategori as $k) : ?>
                                <tr>
                                    <th scope="row"><?= $i++; ?></th>
                                    <td><?= $k['kategori']; ?></td>
                                </tr>
                            <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>

                <!-- akhir recent table data kategori -->
            </div>
        </div>

    </section>
</main>


<?= $this->endSection(); ?>