<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Profile</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Users</li>
                <li class="breadcrumb-item active">Profile</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
        <div class="row">
            <div class="col-xl-12">

                <div class="card">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered">
                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                            </li>

                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
                            </li>

                        </ul>
                        <div class="tab-content pt-2">

                            <div class="tab-pane fade show active profile-edit pt-3" id="profile-edit">

                                <?php if (session()->has('errors')) : ?>
                                    <div class="alert alert-danger">
                                        <?php foreach (session('errors') as $error) : ?>
                                            <?= esc($error) ?><br>
                                        <?php endforeach ?>
                                    </div>
                                <?php endif ?>

                                <!-- Profile Edit Form -->
                                <?php if (logged_in()) : ?>
                                    <form action="<?= site_url('profile/update/' . user_id()) ?>" method="post" class="row g-3 needs-validation" novalidate>
                                        <?= csrf_field() ?>

                                        <div class="col-12">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" name="email" class="form-control " id="email" placeholder="Email " value="<?= old('email', user()->email) ?>">
                                        </div>
                                        <div class="col-6">
                                            <label for="username" class="form-label">username</label>
                                            <input type="text" name="username" class="form-control" id="username" placeholder="username " value="<?= old('username', user()->username) ?>">
                                        </div>
                                        <div class="col-6">
                                            <label for="fav" class="form-label">fav</label>
                                            <input type="text" name="fav" class="form-control " id="fav" placeholder="Kata Favorit " value="<?= old('fav', user()->fav) ?>">
                                        </div>
                                    <?php endif; ?>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                    </div>
                                    </form>
                                    <!-- End Profile Edit Form -->

                            </div>

                            <div class="tab-pane fade pt-3" id="profile-change-password">
                                <!-- Change Password Form -->
                                <form>

                                    <div class="row mb-3">
                                        <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="password" type="password" class="form-control" id="currentPassword">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="newpassword" type="password" class="form-control" id="newPassword">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="renewpassword" type="password" class="form-control" id="renewPassword">
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Change Password</button>
                                    </div>
                                </form><!-- End Change Password Form -->

                            </div>

                        </div><!-- End Bordered Tabs -->

                    </div>
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->



<?= $this->endSection() ?>