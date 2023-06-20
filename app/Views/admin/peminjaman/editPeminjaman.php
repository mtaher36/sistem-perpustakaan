<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Edit Data Peminjaman</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Data Peminjaman</li>
                <li class="breadcrumb-item active">Edit Data Peminjaman</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Edit Data Peminjaman</h5>
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
                <form action="/peminjaman/update/<?= $peminjaman['id_booking']; ?>" method="POST" class="row g-3" enctype='multipart/form-data'>
                    <div class="col-md-6">
                        <label for="id_member" class="form-label">ID Member</label>
                        <select class="form-select" name="id_member" id="id_member" aria-label=" Default select example">
                            <?php $selectedIdMember = old('id_member') ?? $peminjaman['id_member']; ?>
                            <option value="<?= $selectedIdMember ?>"><?= $selectedIdMember ?></option>
                            <?php foreach ($member as $m) : ?>
                                <?php if ($m['id'] != $selectedIdMember) : ?>
                                    <option value="<?= $m['id'] ?>"><?= $m['id'] ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>

                        </select>
                    </div>
                    <div class="col-6">
                        <label class="form-label" for="nama_member">Nama Member:</label>
                        <input class="form-control" type="text" name="nama_member" id="nama_member" value="<?= old('nama_member'); ?>" readonly>
                    </div>
                    <div class="col-6">
                        <label class="form-label" for="id_booking">ID Peminjaman:</label>
                        <input class="form-control" type="text" name="id_booking" id="id_booking" value="<?= old('id_booking', $peminjaman['id_booking']); ?>" readonly>
                    </div>
                    <input class="form-control" type="hidden" name="sampul" id="sampul" value="">

                    <div class="col-md-6">
                        <label class="form-label" for="judul_buku">Judul Buku:</label>
                        <select class="form-select" name="judul_buku" id="judul_buku" aria-label="Default select example">
                            <?php $selectBuku = old('judul_buku') ?? $peminjaman['judul_buku']; ?>
                            <option value="<?= $selectBuku ?>"><?= $selectBuku ?></option>
                            <?php foreach ($buku as $m) : ?>
                                <?php if ($m['judul'] != $selectBuku) : ?>
                                    <option value="<?= $m['judul'] ?>"><?= $m['judul'] ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-6">
                        <label class="form-label" for="tgl_pinjam">Tanggal Pinjam:</label>
                        <input class="form-control" type="date" name="tgl_pinjam" id="tgl_pinjam" value="<?= old('tgl_pinjam', $peminjaman['tgl_pinjam']); ?>">
                    </div>
                    <div class="col-6">
                        <label class="form-label" for="tgl_kembali">Tanggal Kembali:</label>
                        <input class="form-control" type="date" name="tgl_kembali" id="tgl_kembali" value="<?= old('tgl_kembali', $peminjaman['tgl_kembali']); ?>">
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="/peminjaman">Kembali</a>
                    </div>
                </form><!-- End Multi Columns Form -->

            </div>
        </div>

    </section>


</main><!-- End #main -->

<script src="<?= base_url('js/'); ?>mystyles.js"></script>

<?= $this->endSection(); ?>