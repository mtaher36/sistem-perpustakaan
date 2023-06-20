<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Tambah Peminjaman</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Data Peminjaman</li>
                <li class="breadcrumb-item active">Tambah Peminjaman</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Tambah Peminjaman</h5>
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
                <form action="/peminjaman/create" method="POST" class="row g-3" enctype='multipart/form-data'>
                    <div class="col-md-6">
                        <label for="id_member" class="form-label">ID Member</label>
                        <select class="form-select" name="id_member" id="id_member" aria-label=" Default select example">
                            <option selected>ID Member</option>
                            <?php foreach ($member as $m) : ?>
                                <option value="<?= $m['id'] ?>"><?= $m['id'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-6">
                        <label class="form-label" for="nama_member">Nama Member:</label>
                        <input class="form-control" type="text" name="nama_member" id="nama_member" readonly>
                    </div>
                    <div class="col-6">
                        <label class="form-label" for="id_booking">ID Peminjaman:</label>
                        <input class="form-control" type="text" name="id_booking" id="id_booking" value="<?= rand(10000, 99999) ?>" readonly>
                    </div>
                    <input class="form-control" type="hidden" name="sampul" id="sampul" value="">

                    <div class="col-md-6">
                        <label class="form-label" for="judul_buku">Judul Buku:</label>
                        <select class="form-select" name="judul_buku" id="judul_buku" aria-label="Default select example">
                            <option selected>Judul Buku</option>
                            <?php foreach ($buku as $b) : ?>
                                <option value="<?= $b['judul'] ?>"><?= $b['judul'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-4">
                        <label class="form-label" for="tgl_pinjam">Tanggal Pinjam:</label>
                        <input class="form-control" type="date" name="tgl_pinjam" id="tgl_pinjam">
                    </div>
                    <div class="col-4">
                        <label class="form-label" for="tgl_kembali">Tanggal Kembali:</label>
                        <input class="form-control" type="date" name="tgl_kembali" id="tgl_kembali">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label" for="status">Status:</label>
                        <select class="form-select" name="status" id="status" aria-label="Default select example">
                            <option value="Kembali">Kembali</option>
                            <option value="Pinjam" selected>Pinjam</option>
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

<script src="<?= base_url('js/'); ?>mystyles.js"></script>

<?= $this->endSection(); ?>