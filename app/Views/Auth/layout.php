<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?= base_url('/public/img/favicon.png'); ?>">
    <title>NiceAdmin Login</title>
    <!-- Favicons -->
    <link href="<?= base_url('img/'); ?>favicon.png" rel="icon">
    <link href="<?= base_url('img/'); ?>apple-touch-icon.png" rel="apple-touch-icon">
    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <!-- Vendor CSS Files -->
    <link href="<?= base_url('library/'); ?>bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('library/'); ?>bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?= base_url('library/'); ?>boxicons/css/boxicons.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?= base_url('css/'); ?>style.css" rel="stylesheet">


    <?= $this->renderSection('pageStyles') ?>
</head>

<body>


    <main role="main" class="container">
        <?= $this->renderSection('main') ?>
    </main><!-- /.container -->


    <!-- Bootstrap core JavaScript
================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

    <!-- Vendor JS Files -->
    <script src="<?= base_url('library/'); ?>apexcharts/apexcharts.min.js"></script>
    <script src="<?= base_url('library/'); ?>bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('library/'); ?>chart.js/chart.umd.js"></script>
    <script src="<?= base_url('library/'); ?>echarts/echarts.min.js"></script>
    <script src="<?= base_url('library/'); ?>quill/quill.min.js"></script>
    <script src="<?= base_url('library/'); ?>simple-datatables/simple-datatables.js"></script>
    <script src="<?= base_url('library/'); ?>tinymce/tinymce.min.js"></script>
    <script src="<?= base_url('library/'); ?>php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="../../../../../public/js/main.js"></script>


    <?= $this->renderSection('pageScripts') ?>
</body>

</html>