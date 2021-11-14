<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=0">
    <meta name="format-detection" content="telephone=no">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= APP_NAME ?> | <?= $subtitle ?></title>

    <!-- App favicon -->
    <link rel="shortcut icon" href="<?= base_url() ?>assets/images/favicon.ico">

    <!-- plugins -->
    <link href="<?= base_url() ?>assets/libs/flatpickr/flatpickr.min.css" rel="stylesheet" type="text/css" />
            <!-- plugin css -->
    <link href="<?= base_url() ?>assets/libs/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>assets/libs/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>assets/libs/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>assets/libs/datatables/select.bootstrap4.min.css" rel="stylesheet" type="text/css" /> 

    <!-- App css -->
    <link href="<?= base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>assets/css/app.min.css" rel="stylesheet" type="text/css" />
    <style>
    .swal-text {
        text-align: center
    }
    </style>
</head>

<body>
    <div id="wrapper">
        <?= $header; ?>
        <?= $sidebar; ?>
        <div class="content-page">
            <div class="content">
                <div class="container-fluid">
                <?php 
                $uri = $this->uri->segment(1);
                if($uri != 'dashboard'){
                    echo $breadcum;
                }
                echo $_config_content;
                echo $modal; ?>
                </div>
            </div>
        </div>
        <?= $footer; ?>
    </div>

    <!-- Vendor js -->
    <script src="<?= base_url() ?>assets/js/vendor.min.js"></script>

    <!-- datatable js -->
        <script src="<?= base_url() ?>assets/libs/datatables/jquery.dataTables.min.js"></script>
        <script src="<?= base_url() ?>assets/libs/datatables/dataTables.bootstrap4.min.js"></script>
        <script src="<?= base_url() ?>assets/libs/datatables/dataTables.responsive.min.js"></script>
        <script src="<?= base_url() ?>assets/libs/datatables/responsive.bootstrap4.min.js"></script>
        
        <script src="<?= base_url() ?>assets/libs/datatables/dataTables.buttons.min.js"></script>
        <script src="<?= base_url() ?>assets/libs/datatables/buttons.bootstrap4.min.js"></script>
        <script src="<?= base_url() ?>assets/libs/datatables/buttons.html5.min.js"></script>
        <script src="<?= base_url() ?>assets/libs/datatables/buttons.flash.min.js"></script>
        <script src="<?= base_url() ?>assets/libs/datatables/buttons.print.min.js"></script>

        <script src="<?= base_url() ?>assets/libs/datatables/dataTables.keyTable.min.js"></script>
        <script src="<?= base_url() ?>assets/libs/datatables/dataTables.select.min.js"></script>

    <!-- optional plugins -->
    <script src="<?= base_url() ?>assets/libs/moment/moment.min.js"></script>
    <script src="<?= base_url() ?>assets/libs/apexcharts/apexcharts.min.js"></script>
    <script src="<?= base_url() ?>assets/libs/flatpickr/flatpickr.min.js"></script>

    <!-- page js -->
    <script src="<?= base_url() ?>assets/js/pages/dashboard.init.js"></script>

    <!-- App js -->
    <script src="<?= base_url() ?>assets/js/app.min.js"></script>
    <script src="<?= base_url() ?>assets/js/sweetalert.min.js"></script>
    <?= $js ?>
</body>

</html>