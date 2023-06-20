<?= $this->extend($config->viewLayout) ?>
<?= $this->section('main') ?>
<main>
    <div class="container">

        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                        <div class="d-flex justify-content-center py-4">
                            <a href="index.html" class="logo d-flex align-items-center w-auto">
                                <img src="assets/img/logo.png" alt="">
                                <span class="d-none d-lg-block">NiceAdmin</span>
                            </a>
                        </div><!-- End Logo -->

                        <div class="card mb-3">

                            <div class="card-body">

                                <div class="pt-4 pb-2">
                                    <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
                                    <p class="text-center small">Enter your personal details to create account</p>
                                </div>
                                <?= view('App\Views\Auth\_message_block') ?>

                                <form action="<?= url_to('register') ?>" method="post" class="row g-3 needs-validation" novalidate>
                                    <?= csrf_field() ?>

                                    <div class="col-12">
                                        <label for="email" class="form-label"><?= lang('Auth.email') ?></label>
                                        <input type="email" name="email" class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" id="email" aria-describedby="emailHelp" placeholder="<?= lang('Auth.email') ?> " value=" <?= old('email') ?>">
                                        <small id="emailHelp" class="form-text text-muted"><?= lang('Auth.weNeverShare') ?></small>
                                    </div>


                                    <div class="col-6">
                                        <label for="username" class="form-label"><?= lang('Auth.username') ?></label>
                                        <input type="text" name="username" class="form-control  <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>" id="username" placeholder="<?= lang('Auth.username') ?>" value="<?= old('username') ?>">
                                    </div>
                                    <div class="col-6">
                                        <label for="fav" class="form-label"><?= lang('Auth.fav') ?></label>
                                        <input type="text" name="fav" class="form-control  <?php if (session('errors.fav')) : ?>is-invalid<?php endif ?>" id="fav" placeholder="<?= lang('Auth.fav') ?>" value="<?= old('fav') ?>">
                                    </div>

                                    <div class="col-12">
                                        <label for="password" class="form-label"><?= lang('Auth.password') ?></label>
                                        <input type="password" name="password" class="form-control  <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" id="password" placeholder="<?= lang('Auth.password') ?>" value="<?= old('password') ?>">
                                    </div>

                                    <div class="col-12">
                                        <label for="pass_confirm" class="form-label"><?= lang('Auth.repeatPassword') ?></label>
                                        <input type="password" name="pass_confirm" class="form-control  <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" id="password" placeholder="<?= lang('Auth.repeatPassword') ?>" autocomplete="off" ?>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" name="terms" type="checkbox" value="" id="acceptTerms" required>
                                            <label class="form-check-label" for="acceptTerms">I agree and accept the <a href="#">terms and conditions</a></label>
                                            <div class="invalid-feedback">You must agree before submitting.</div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-primary w-100" type="submit"><?= lang('Auth.register') ?></button>
                                    </div>
                                    <div class="col-12">
                                        <p class="small mb-0"><?= lang('Auth.alreadyRegistered') ?> <a href="<?= url_to('login') ?>"><?= lang('Auth.signIn') ?></a></p>
                                    </div>
                                </form>

                            </div>
                        </div>

                        <div class="credits">
                            <!-- All the links in the footer should remain intact. -->
                            <!-- You can delete the links only if you purchased the pro version. -->
                            <!-- Licensing information: https://bootstrapmade.com/license/ -->
                            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
                            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
                        </div>

                    </div>
                </div>
            </div>

        </section>

    </div>
</main><!-- End #main -->

<?= $this->endSection() ?>