<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Data Pengembalian</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Data Pengembalian</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <?php if (session()->getFlashdata('pesan')) : ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?= session()->getFlashdata('pesan'); ?>
                        <button type="button" class="btn btn-close" data-bs-dismiss="alert" aria-label="close"></button>
                    </div>
                <?php endif ?>
                <div class="card">
                    <div class="card-body">
                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">ID Peminjaman</th>
                                    <th scope="col">Tgl Pinjam</th>
                                    <th scope="col">Tgl Kembali</th>
                                    <th scope="col">Tgl Dikembalikan</th>
                                    <th scope="col">Denda</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1 ?>
                                <?php foreach ($peminjaman as $p) : ?>
                                    <tr>
                                        <?php if ($p['status'] == 'Kembali') : ?>
                                            <th scope="row"><?= $i++; ?></th>
                                            <td><?= $p['id_booking']; ?></td>
                                            <td><?= date('Y-m-d', strtotime($p['tgl_pinjam'])); ?></td>
                                            <td><?= date('Y-m-d', strtotime($p['tgl_kembali'])); ?></td>
                                            <td><?= date('Y-m-d', strtotime($p['tgl_dikembalikan'])); ?></td>
                                            <td><?php
                                                if ($p['status'] == 'Kembali') {
                                                    $tglKembali = strtotime($p['tgl_dikembalikan']);
                                                    $tglBatas = strtotime($p['tgl_kembali']);

                                                    if ($tglKembali > $tglBatas) {
                                                        // Menghitung selisih hari
                                                        $selisihHari = floor(($tglKembali - $tglBatas) / (60 * 60 * 24));

                                                        // Menghitung denda per hari
                                                        $dendaPerHari = 1000;

                                                        // Menghitung total denda
                                                        $totalDenda = $selisihHari * $dendaPerHari;

                                                        echo $totalDenda;
                                                    } else {
                                                        echo '0';
                                                    }
                                                } else {
                                                    echo '-';
                                                }

                                                ?></td>
                                            <td></td>
                                        <?php endif; ?>
                                    </tr>
                                <?php endforeach; ?>

                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->

                    </div>
                </div>

            </div>
        </div>

    </section>

</main><!-- End #main -->
<?= $this->endSection(); ?>