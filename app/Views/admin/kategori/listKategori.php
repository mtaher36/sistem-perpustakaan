<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<main id="main" class="main">

    <div class="pagetitle">
        <h1>List Member</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Kategori</li>
                <li class="breadcrumb-item active">List Kategori</li>
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
                                <!-- Disabled Backdrop Modal -->
                                <button type="button" class="btn btn-primary mt-3 mx-2" data-bs-toggle="modal" data-bs-target="#smallModal">
                                    + Tambah
                                </button>
                                <div class="modal fade" id="smallModal" tabindex="-1" data-bs-backdrop="false">
                                    <div class="modal-dialog modal-sm">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Tambah Data Kategori</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="/kategori/create" method="POST" class="row g-3" enctype='multipart/form-data'>
                                                    <div class="col-md-12">
                                                        <label for="kategori" class="form-label">Kategori</label>
                                                        <input type="text" class="form-control" id="kategori" name="kategori" autofocus value="<?= old('kategori'); ?>">
                                                    </div>
                                                    <div class="text-center mt-2">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Create</button>
                                                    </div>
                                                </form>
                                            </div>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Kategori</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1 ?>
                                <?php foreach ($kategori as $k) : ?>
                                    <tr>
                                        <th scope="row"><?= $i++; ?></th>
                                        <td><?= $k['kategori']; ?></td>
                                        <td>
                                            <form action="/kategori/delete/<?= $k['id']; ?> " method="post" class="d-inline">
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

    </section>

</main><!-- End #main -->
<?= $this->endSection(); ?>