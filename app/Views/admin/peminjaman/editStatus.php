<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Edit Status Peminjaman</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Data Peminjaman</li>
                <li class="breadcrumb-item active">Edit Status Peminjaman</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Edit Status Peminjaman</h5>
                <?php if (session()->getFlashdata('_ci_validation_errors')) : ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Terjadi kesalahan Penginputan Data Saat Validasi</strong>
                        <br>
                        <ul>
                            <?php foreach (session()->getFlashdata('_ci_validation_errors') as $k) : ?>
                                <li><?= $k ?></li>
                            <?php endforeach ?>
                        </ul>
                        <button type="button" class="btn btn-close" data-bs-dismiss="alert" aria-label="close"></button>
                    </div>
                <?php endif ?>


                <!-- error data -->
                <!-- Multi Columns Form -->

                <form action="/peminjaman/updateStatus/<?= $peminjaman['id_booking']; ?>" method="POST" class="row g-3" enctype='multipart/form-data'>
                    <div class="col-md-12">
                        <label class="form-label" for="status">Status:</label>
                        <select class="form-select" name="status" id="status" aria-label="Default select example">
                            <option value="Kembali" <?= old('status', $peminjaman['status']) === 'Kembali' ? 'selected' : ''; ?>>Kembali</option>
                            <option value="Pinjam" <?= old('status', $peminjaman['status']) === 'Pinjam' ? 'selected' : ''; ?>>Pinjam</option>
                        </select>
                    </div>
                    <div class="col-md-12">
                        <label class="form-label" for="tgl_dikembalikan">Tanggal Dikembalikan:</label>
                        <input class="form-control" type="date" name="tgl_dikembalikan" id="tgl_dikembalikan" value="<?= old('tgl_dikembalikan') ?>">

                    </div>
                    <div class="text-center mt-2">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </form><!-- End Multi Columns Form -->

            </div>
        </div>

    </section>


</main><!-- End #main -->

<script src="<?= base_url('js/'); ?>mystyles.js"></script>

<?= $this->endSection(); ?>