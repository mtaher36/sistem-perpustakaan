<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Tambah Member</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Data Member</li>
                <li class="breadcrumb-item active">Tambah Member</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Tambah Member</h5>
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
                <form action="/member/create" method="POST" class="row g-3" enctype='multipart/form-data'>
                    <div class="col-md-12">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" autofocus value="<?= old('nama'); ?>">
                    </div>
                    <div class="col-md-12">
                        <label for="nis" class="form-label">NIS</label>
                        <input type="number" class="form-control" id="nis" name="nis" value="<?= old('nis'); ?>">
                    </div>
                    <div class="col-md-6">
                        <label class="col-sm-2 col-form-label" for="kelas">Kelas</label>

                        <select class="form-select" name="kelas" id="kelas" aria-label="Default select example">
                            <option selected>Kelas</option>
                            <option value="X" <?= old('kelas') === 'X' ? 'selected' : '' ?>>X</option>
                            <option value="XI" <?= old('kelas') === 'XI' ? 'selected' : '' ?>>XI</option>
                            <option value="XII" <?= old('kelas') === 'XII' ? 'selected' : '' ?>>XII</option>
                        </select>

                    </div>
                    <div class="col-6">
                        <label class="col-sm-2 col-form-label" for="jurusan">Jurusan</label>

                        <select class="form-select" name="jurusan" id="jurusan" aria-label="Default select example">
                            <option selected>Jurusan</option>
                            <option value="IPA" <?= old('jurusan') === 'IPA' ? 'selected' : '' ?>>IPA</option>
                            <option value="IPS" <?= old('jurusan') === 'IPS' ? 'selected' : '' ?>>IPS</option>
                            <option value="Bahasa" <?= old('jurusan') === 'Bahasa' ? 'selected' : '' ?>>Bahasa</option>
                        </select>

                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                    </div>
                </form><!-- End Multi Columns Form -->

            </div>
        </div>

    </section>

</main><!-- End #main -->

<?= $this->endSection(); ?>