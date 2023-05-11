<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title><?= isset($titles) == 0 ? 'Dashboard' : $titles ?></title>
    <meta name="description" content="Sistem Akademik Kepolisian" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

    <link rel="apple-touch-icon" sizes="180x180" href="<?=base_url()?>/assets/img/favico/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?=base_url()?>/assets/img/favico/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?=base_url()?>/assets/img/favico/favicon-16x16.png">
    <link rel="manifest" href="<?=base_url()?>/assets/img/favico/site.webmanifest">
    
    <!-- style -->
    <!-- build:css ../assets/css/site.min.css -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/theme.css" type="text/css" />
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/style.css" type="text/css" />
    <link rel="stylesheet" href="<?= base_url() ?>/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" type="text/css" />
    <link rel="stylesheet" href="<?= base_url() ?>/assets/libs/select2/dist/css/select2.min.css" type="text/css" />
    <link rel="stylesheet" href="<?= base_url() ?>/assets/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css" type="text/css" />
    <link rel="stylesheet" href="<?= base_url() ?>/assets/libs/dropzone/dist/min/dropzone.min.css" type="text/css" />
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css'>

    <!-- dataTabel button -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.bootstrap4.min.css" />
    <!-- jQuery -->
    <script src="<?= base_url() ?>/assets/libs/jquery/dist/jquery.min.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js'></script>

    <!-- endbuild -->
    <style type="text/css">
        .select2 {
            width: 100% !important;
        }

        .btn-icon-datatable {
            width: 2.125rem;
            height: 2.125rem;
            padding: 7px;
            margin: 0 3px;
        }

        .column-2action {
            width: 100px !important;
        }

        .nav-pills .nav-link.active,
        .nav-pills .show>.nav-link {
            background-color: #a62c47 !important;
        }

        .nav-link: hover {
            color: white !important;
        }

        .btn-primary {
            background-color: #a62c47 !important;
            border-color: #a62c47 !important;
        }

        a:not(.active):hover {
            color: #a62c47 !important;
        }

        #datatable.table td {
            padding: 0.25rem !important;
        }

        .page-hero .padding {
            padding: 1rem 2rem;
        }

        div.dt-buttons {
            /*float: left; */
            padding-bottom: 15px;
        }

        .page-title>h2.text-highlight {
            margin-left: -23px !important;
            font-size: 1.05rem !important;
        }
    </style>
</head>

<body class="layout-row">

    <div id="main" class="layout-column flex">


        <!-- ############ Content START-->
        <div id="content" class="flex ">
            <!-- ############ Main START-->
            <?php if (isset($load_view)) {
                echo view($load_view);
            } ?>
            <!-- ############ Main END-->
        </div>
        <!-- ############ Content END-->

        <?php echo view('App\Modules\Main\Views\footer'); ?>
    </div>
    <!-- build:js ../assets/js/site.min.js -->
    <!-- Bootstrap -->
    <script src="<?= base_url() ?>/assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="<?= base_url() ?>/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- ajax page -->
    <!-- <script src="<?= base_url() ?>assets/libs/pjax/pjax.min.js"></script> -->
    <!-- <script src="<?= base_url() ?>assets/js/ajax.js"></script> -->
    <!-- lazyload plugin -->
    <script src="<?= base_url() ?>/assets/js/lazyload.config.js"></script>
    <script src="<?= base_url() ?>/assets/js/lazyload.js"></script>
    <script src="<?= base_url() ?>/assets/js/plugin.js"></script>
    <!-- scrollreveal -->
    <script src="<?= base_url() ?>/assets/libs/scrollreveal/dist/scrollreveal.min.js"></script>
    <!-- feathericon -->
    <script src="<?= base_url() ?>/assets/libs/feather-icons/dist/feather.min.js"></script>
    <script src="<?= base_url() ?>/assets/js/plugins/feathericon.js"></script>
    <!-- theme -->
    <script src="<?= base_url() ?>/assets/js/theme.js"></script>
    <script src="<?= base_url() ?>/assets/js/utils.js"></script>
    <!-- endbuild -->
    <script src="<?= base_url() ?>/assets/libs/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url() ?>/assets/libs/select2/dist/js/select2.full.min.js"></script>
    <script src="<?= base_url() ?>/assets/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <script src="<?= base_url() ?>/assets/js/plugins/sweetalert.js"></script>



    <!-- <script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script> -->
    <!-- <script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script> -->
    <!-- dataTabel button -->

    <script type="text/javascript" src="<?= base_url() ?>/assets/libs/datatables/2.5.0/jszip.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>/assets/libs/datatables/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>/assets/libs/datatables/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>/assets/libs/datatables/1.11.3/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>/assets/libs/datatables/1.11.3/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>/assets/libs/datatables/2.1.1/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>/assets/libs/datatables/2.1.1/js/buttons.bootstrap4.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>/assets/libs/datatables/2.1.1/js/buttons.colVis.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>/assets/libs/datatables/2.1.1/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>/assets/libs/datatables/2.1.1/js/buttons.print.min.js"></script>
    <!-- <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.bootstrap4.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.print.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.colVis.min.js"></script> -->




    <!-- Default jquerya action -->
    <script src="<?= base_url() ?>/assets/js/coreevents.js"></script>
</body>

</html>