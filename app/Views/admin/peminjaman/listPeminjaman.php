<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<main id="main" class="main">

    <div class="pagetitle">
        <h1>List Peminjaman</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Data Peminjaman</li>
                <li class="breadcrumb-item active">List Peminjaman</li>
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
                                    <th scope="col">ID Pinjam</th>
                                    <th scope="col">ID Member</th>
                                    <th scope="col">Sampul</th>
                                    <th scope="col">Judul Buku</th>
                                    <th scope="col">Tanggal Peminjaman</th>
                                    <th scope="col">Tangal Pengembalian</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1 ?>
                                <?php foreach ($peminjaman as $p) : ?>
                                    <tr>
                                        <th scope="row"><?= $i++; ?></th>
                                        <td><?= $p['id_booking']; ?></td>
                                        <td><?= $p['id_member']; ?></td>
                                        <td><img src="/img/cover/<?= $p['sampul']; ?>" alt="" class="sampul"></td>
                                        <td><?= $p['judul_buku']; ?></td>
                                        <td><?= $p['tgl_pinjam']; ?></td>
                                        <td><?= $p['tgl_kembali']; ?></td>
                                        <td>
                                            <span><?= $p['status']; ?></span>
                                            <a href="/peminjaman/editStatusForm/<?= $p['id_booking']; ?>" class="btn btn-warning btn-sm"><i class="bi bi-pencil"></i></a>

                                        </td>
                                        <td><a href="/peminjaman/edit/<?= $p['id_booking']; ?>" class="btn btn-warning btn-sm "><i class="bi bi-pencil"></i></a>
                                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#smallModal1">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                            <div class="modal fade" id="smallModal1" tabindex="-1">
                                                <div class="modal-dialog modal-sm">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Delete Data</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Apakah Anda Yakin?
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                <form action="<?= base_url('peminjaman/delete/' . $p['id_booking']); ?>" method="POST">
                                                                    <?= csrf_field() ?>
                                                                    <input type="hidden" name="_method" value="DELETE">
                                                                    <button type="submit" class="btn btn-primary">Delete</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>


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