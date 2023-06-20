<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<main id="main" class="main">

    <div class="pagetitle">
        <h1>List Buku</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Data Buku</li>
                <li class="breadcrumb-item active">List Buku</li>
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
                                    <th scope="col">Sampul</th>
                                    <th scope="col">Judul</th>
                                    <th scope="col">Kategori</th>
                                    <th scope="col">Penerbit</th>
                                    <th scope="col">Pengarang</th>
                                    <th scope="col">Tahun</th>
                                    <th scope="col">Jumlah</th>
                                    <th scope="col">Rak</th>
                                    <th scope="col">Aksi</th>
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
                                        <td><a href="/admin/dataBuku/editBuku/<?= $k['slugh']; ?>" class="btn btn-warning"><i class="bi bi-pencil"></i></a>
                                            <form action="/admin/dataBuku/listBuku/<?= $k['id']; ?> " method="post" class="d-inline">
                                                <?= csrf_field(); ?>
                                                <input type="hidden" name="_method" value="DELETE">

                                                <button type="submit" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#basicModal" onclick="return confirm('apakah anda yakin?')"><i class="bi bi-trash"></i></button>
                                            </form>


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
        <!-- modal Hapus -->
        <!-- <div class="modal fade" id="basicModal" data-bs-backdrop="false">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Konfirmasi</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Apakah Anda yakin ingin menghapusnya?
                    </div>

                    <div class="modal-footer">

                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                        <button type="submit" class="btn btn-primary">Delete</button>
                        </form>

                    </div>

                </div>
            </div>
        </div> -->
    </section>

</main><!-- End #main -->
<?= $this->endSection(); ?>