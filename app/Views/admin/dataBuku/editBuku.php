<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Ubah Data Buku</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Data Buku</li>
                <li class="breadcrumb-item active">Ubah Data Buku</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Edit Buku</h5>
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
                <?php if (!empty($buku) && isset($buku['id'])) : ?>
                    <form action="/admin/update/<?= $buku['id']; ?>" method="POST" class="row g-3" enctype='multipart/form-data'>
                        <?= csrf_field(); ?>
                        <input type="hidden" name="slugh" value="<?= $buku['slugh']; ?>">
                        <div class="col-md-12">
                            <label for="judul" class="form-label">Judul</label>
                            <input type="text" class="form-control" id="judul" name="judul" autofocus value="<?= (old('judul')) ? old('judul') : $buku['judul']; ?>">
                        </div>
                        <div class="col-md-6">
                            <label for="penerbit" class="form-label">Penerbit</label>
                            <input type="text" class="form-control" id="penerbit" name="penerbit" value="<?= (old('penerbit')) ? old('penerbit') : $buku['penerbit']; ?>">
                        </div>
                        <div class="col-md-6">
                            <label for="pengarang" class="form-label">Pengarang</label>
                            <input type="text" class="form-control" id="pengarang" name="pengarang" value="<?= (old('pengarang')) ? old('pengarang') : $buku['pengarang']; ?>">
                        </div>
                        <div class="col-3">
                            <label for="kategori" class="form-label">Kategori</label>
                            <select class="form-control form-select" id="kategori" name="kategori" aria-label="Default select example">
                                <option>Pilih Kategori</option>
                                <?php foreach ($kategori as $k) : ?>
                                    <option value="<?= $buku['kategori']; ?>" <?= old('kategori', $buku['kategori']) === $k['kategori'] ? 'selected' : ''; ?>><?= $k['kategori']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-3">
                            <label for="tahun" class="form-label">Tahun</label>
                            <input type="number" class="form-control" id="tahun" name="tahun" value="<?= (old('tahun')) ? old('tahun') : $buku['tahun']; ?>">
                        </div>
                        <div class="col-3">
                            <label for="jumlah" class="form-label">Jumlah</label>
                            <input type="number" class="form-control" id="jumlah" name="jumlah" value="<?= (old('jumlah')) ? old('jumlah') : $buku['jumlah']; ?>">
                        </div>
                        <div class="col-3">
                            <label for="rak" class="form-label">Rak</label>
                            <input type="number" class="form-control" id="rak" name="rak" value="<?= (old('rak')) ? old('rak') : $buku['rak']; ?>">
                        </div>
                        <div class="col-12">
                            <label for="sampul" class="form-label">Sampul</label>
                            <input class="form-control" type="file" id="sampul" name="sampul" value="<?= (old('sampul')) ? old('sampul') : $buku['sampul']; ?>">
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Ubah</button>
                            <a href="/admin/dataBuku/listBuku">Kembali</a>
                        </div>
                    </form><!-- End Multi Columns Form -->
                <?php else : ?>
                    <p>Gagal</p>
                <?php endif ?>

            </div>
        </div>

    </section>
</main>

<?= $this->endSection() ?>