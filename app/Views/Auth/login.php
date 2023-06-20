<?= $this->extend($config->viewLayout) ?>
<?= $this->section('main') ?>

<div class="container">
	<section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

					<div class="d-flex justify-content-center py-4">
						<a href="index.html" class="logo d-flex align-items-center w-auto">
							<img src="<?= base_url('public/img/logo.png'); ?>" alt="">
							<span class="d-none d-lg-block">NiceAdmin</span>
						</a>
					</div><!-- End Logo -->

					<div class="card mb-3">

						<div class="card-body">
							<?= view('App\Views\Auth\_message_block') ?>

							<div class="pt-4 pb-2">
								<h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
								<p class="text-center small">Enter your email or username & password to login</p>
							</div>

							<form action="<?= url_to('login') ?>" method="post" class="row g-3 needs-validation" novalidate>
								<?= csrf_field() ?>

								<?php if ($config->validFields === ['email']) : ?>
									<div class="col-12">
										<label for="login" class="form-label"><?= lang('Auth.email') ?></label>
										<div class="input-group has-validation">
											<span class="input-group-text" id="inputGroupPrepend">@</span>
											<input type="text" name="login" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" id="login" placeholder="<?= lang('Auth.email') ?>">
											<div class="invalid-feedback">
												<?= session('errors.login') ?>
											</div>
										</div>
									</div>
								<?php else : ?>
									<div class="col-12">
										<label for="login" class="form-label"><?= lang('Auth.emailOrUsername') ?></label>
										<div class="input-group has-validation">
											<span class="input-group-text" id="inputGroupPrepend">@</span>
											<input type="text" name="login" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" id="login" placeholder="<?= lang('Auth.emailOrUsername') ?>">
											<div class="invalid-feedback">
												<?= session('errors.login') ?>
											</div>
										</div>
									</div>
								<?php endif; ?>

								<div class="col-12">
									<label for="password" class="form-label"><?= lang('Auth.password') ?></label>
									<input type="password" name="password" class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" id="password" placeholder="<?= lang('Auth.password') ?>">
									<div class="invalid-feedback">
										<?= session('errors.password') ?>
									</div>
								</div>

								<?php if ($config->allowRemembering) : ?>
									<div class="col-12">
										<div class="form-check">
											<input class="form-check-input" <?php if (old('remember')) : ?> checked <?php endif ?> type="checkbox" name="remember" value="true" id="rememberMe">
											<label class="form-check-label" for="rememberMe"><?= lang('Auth.rememberMe') ?></label>
										</div>
									</div>
								<?php endif; ?>
								<div class="col-12">
									<button class="btn btn-primary w-100" type="submit"><?= lang('Auth.loginAction') ?></button>
								</div>
								<!-- <div class="col-12">
									<p class="small mb-0">Don't have account? <a href="pages-register.html">Create an account</a></p>
								</div> -->
								<hr>

								<?php if ($config->allowRegistration) : ?>
									<p><a href="<?= url_to('register') ?>"><?= lang('Auth.needAnAccount') ?></a></p>
								<?php endif; ?>

								<?php if ($config->activeResetter) : ?>
									<p><a href="<?= url_to('forgot') ?>"><?= lang('Auth.forgotYourPassword') ?></a></p>
								<?php endif; ?>
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

<?= $this->endSection() ?>