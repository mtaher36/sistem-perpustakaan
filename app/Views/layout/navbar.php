<header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
        <a href="/admin" class="logo d-flex align-items-center">
            <img src="assets/img/logo.png" alt="">
            <span class="d-none d-lg-block">NiceAdmin</span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->


    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">

            <li class="nav-item dropdown pe-3">

                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                    <?php if (logged_in()) : ?>
                        <span class="d-none d-md-block dropdown-toggle ps-2"><?= user()->email; ?></span>
                    <?php endif; ?>
                </a><!-- End Profile Iamge Icon -->

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                    <li class="dropdown-header">
                        <?php if (logged_in()) : ?>
                            <h6><?= user()->username; ?></h6>
                        <?php endif; ?>
                        <span>Admin Gaul</span>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <?php if (logged_in()) : ?>
                        <a class="dropdown-item d-flex align-items-center" href="<?= site_url('admin/profile/' . user_id()) ?>">

                            <i class="bi bi-person"></i>
                            <span>My Profile</span>
                        </a>
                    <?php endif; ?>

            </li>
            <li>
                <hr class="dropdown-divider">
            </li>
            <?php if (logged_in()) : ?>
                <li>
                    <a class="dropdown-item d-flex align-items-center" href="/logout">
                        <i class="bi bi-box-arrow-right"></i>
                        <span>Sign Out</span>
                    </a>
                </li>
            <?php endif; ?>

        </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

        </ul>
    </nav><!-- End Icons Navigation -->

</header><!-- End Header -->