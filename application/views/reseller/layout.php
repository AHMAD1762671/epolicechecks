

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $page_title ?> - ePolice Reception</title>
    <!--<link href="https://fonts.googleapis.com/css?family=Nunito:300,400,400i,600,700,800,900" rel="stylesheet">-->
    <link rel="stylesheet" href="<?= base_url('assets') ?>/styles/vendor/datatables.min.css">
    <link rel="stylesheet" href="<?= base_url('assets') ?>/styles/css/style.css">
    <link rel="stylesheet" href="<?= base_url('assets') ?>/styles/css/style.css">
    <link rel="stylesheet" href="<?= base_url('assets') ?>/styles/vendor/perfect-scrollbar.css">
    <link rel="stylesheet" href="<?= base_url('assets') ?>/styles/vendor/pickadate/classic.css">
    <link rel="stylesheet" href="<?= base_url('assets') ?>/styles/vendor/pickadate/classic.date.css">
    <link rel="stylesheet" href="<?= base_url('assets') ?>/styles/vendor/datatables.min.css">
    <link rel="stylesheet" href="<?= base_url('assets') ?>/styles/vendor/sweetalert2.min.css">
    <link rel="stylesheet" href="<?= base_url('assets') ?>/styles/vendor/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="<?= base_url('assets') ?>/styles/vendor/select2.min.css">
    <link rel="stylesheet" href="<?= base_url('assets') ?>/styles/vendor/select2-bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('assets') ?>/fonts/fontawesome/css/all.min.css">
    <!--        <link rel="icon" href="--><?//= base_url('assets') ?><!--/images/favicon.png" sizes="32x32" />-->
    <!--        <link rel="icon" href="--><?//= base_url('assets') ?><!--/images/favicon.png" sizes="192x192" />-->
    <link rel="apple-touch-icon-precomposed" href="<?= base_url('assets') ?>/images/favicon.png" />
    <script src="<?= base_url('assets') ?>/js/vendor/jquery-3.3.1.min.js"></script>
    <script src="<?= base_url('assets') ?>/js/vendor/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('assets') ?>/js/vendor/sweetalert2.min.js"></script>
</head>

<body>
<div class='ajax-loadscreen' id="ajax-preloader">
    <div class="ajax-loader spinner-bubble spinner-bubble-primary"></div>
</div>
<div class="app-admin-wrap">
    <div class="main-header">
        <div class="logo">
            <!--                    <img src="--><?//= base_url('assets') ?><!--/images/logo.png" alt="">-->
            <img src="<?= base_url('assets') ?>/images/logox.png">
        </div>

        <div class="menu-toggle">
            <div></div>
            <div></div>
            <div></div>
        </div>


        <div style="margin: auto"></div>

        <div class="header-part-right">

            <i class="i-Full-Screen header-icon d-none d-sm-inline-block" data-fullscreen=""></i>

            <div class="dropdown">
                <div class="user colalign-self-end">
                    <img src="<?= agent_profile_image() ?>" id="userDropdown" alt="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <div class="dropdown-header">
                            <i class="i-Lock-User mr-1"></i>
                            <?= $this->session->userdata('reception_name') ?>
                        </div>
                        <a class="dropdown-item" href="<?= base_url('reception/account') ?>">Account settings</a>
                        <a class="dropdown-item" href="<?= base_url('reception/logout') ?>">Sign out</a>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="side-content-wrap">
        <div class="sidebar-left open" data-perfect-scrollbar="" data-suppress-scroll-x="true">
            <ul class="navigation-left">
                <li class="nav-item <?= active_menu('reception/dashboard') ?>">
                    <a class="nav-item-hold" href="<?= base_url('reception/dashboard_pre') ?>">
                        <span class="nav-text"><span class="fa fa-chart-bar"></span> Dashboard</span>
                    </a>
                    <div class="triangle"></div>
                </li>



                <li class="nav-item <?= active_menu('reception/edit_agent_profile') ?>">
                    <a class="nav-item-hold" href="<?= base_url('agent/edit_agent_profile') ?>">
                        <span class="nav-text"><span class="fas fa-edit"></span> My Profile</span>
                    </a>
                    <div class="triangle"></div>
                </li>


                <li class="nav-item <?= active_menu('reception/edit_agent_profile') ?>">
                    <a class="nav-item-hold" href="<?= base_url('agent/edit_agent_profile') ?>">
                        <span class="nav-text"><span class="fas fa-edit"></span> Send Invitation</span>
                    </a>
                    <div class="triangle"></div>
                </li>


                <li class="nav-item <?= active_menu('reception/edit_agent_profile') ?>">
                    <a class="nav-item-hold" href="<?= base_url('agent/edit_agent_profile') ?>">
                        <span class="nav-text"><span class="fas fa-edit"></span> Appointment</span>
                    </a>
                    <div class="triangle"></div>
                </li>


<!--                <li class="nav-item --><?//= active_menu('reception/edit_agent_profile') ?><!--">-->
<!--                    <a class="nav-item-hold" href="--><?//= base_url() ?><!--reception/dashboard">-->
<!--                        <span class="nav-text"><span class="fal fa-browser"></span>My Applications </span>-->
<!--                    </a>-->
<!--                    <div class="triangle"></div>-->
<!--                </li>-->


<!--                <li class="nav-item --><?//= active_menu('reception/service_order') ?><!--">-->
<!--                    <a class="nav-item-hold" href="--><?//= base_url() ?><!--reception/accounts">-->
<!--                        <span class="nav-text"><span class="fal fa-browser"></span> Accounts </span>-->
<!--                    </a>-->
<!--                    <div class="triangle"></div>-->
<!--                </li>-->


<!--                <li class="nav-item --><?//= active_menu('reception/invoice') ?><!--">-->
<!--                    <a class="nav-item-hold" href="--><?//= base_url() ?><!--reception/invoice">-->
<!--                        <span class="nav-text"><span class="fas fa-id-card"></span> Invoices </span>-->
<!--                    </a>-->
<!--                    <div class="triangle"></div>-->
<!--                </li>-->





            </ul>
        </div>
        <div class="sidebar-overlay"></div>
    </div>

    <div class="main-content-wrap sidenav-open d-flex flex-column">

        <div class="breadcrumb">
            <h1><?= $page_title ?></h1>
        </div>
        <?php if ($flashmsg = $this->session->flashdata('success_message')) { ?>
            <div class="alert alert-success" role="alert">
                <strong class="text-capitalize"><?= $flashmsg ?></strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">??</span>
                </button>
            </div>
            <?php
        }
        if ($flashmsg = $this->session->flashdata('error_message')) {
            ?>
            <div class="alert alert-error" role="alert">
                <strong class="text-capitalize"><?= $flashmsg ?></strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">??</span>
                </button>
            </div>
        <?php }
        ?>
        <div class="card">
            <div class="card-body">
                <?php
                $this->load->view($main_view);
                ?>
            </div></div>
        <div class="flex-grow-1"></div>


        <div class="app-footer" style="padding:0px;margin-top: 0px;">
            <div class="row">
                <div class="col-sm-2">
                </div>
                <div class="col-sm-2">
                </div>
                <div class="col-sm-4">
                    <div id="gcwu-sft-in" style="line-height: 2.6;background-image: url(<?= base_url('assets') ?>/images/download.png);background-position: center top,left top,right top;background-repeat: no-repeat;background-color: transparent;">
                        <div id="gcwu-tctr">
                            <ul style="">
                                <li class="gcwu-tc" style="color: #EEEEEE;"> </li>
                                <li class="gcwu-tr" style="color: #EEEEEE;"></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-sm-2">
                </div>
                <div class="col-sm-2">
                </div>
            </div>
        </div>





        <!--                <div class="app-footer">-->
        <!--                    <div class="footer-bottom border-top pt-3 d-flex flex-column flex-sm-row align-items-center">-->
        <!---->
        <!--                        <span class="flex-grow-1"></span>-->
        <!--                        <div class="d-flex align-items-center">-->
        <!--                            <img class="logo" src="--><?//= base_url('assets') ?><!--/images/logo.jpg" alt="">-->
        <!--                            <div>-->
        <!--                                <p class="m-0">&copy; --><?//= date('Y') ?><!-- ePolice.</p>-->
        <!--                                <p class="m-0">All rights reserved</p>-->
        <!--                            </div>-->
        <!--                        </div>-->
        <!--                    </div>-->
        <!--                </div>-->

    </div>

</div>
<div class="search-ui">
    <div class="search-header">
        <img src="<?= base_url('assets') ?>/images/logo.png" alt="" class="logo">
        <button class="search-close btn btn-icon bg-transparent float-right mt-2">
            <i class="i-Close-Window text-22 text-muted"></i>
        </button>
    </div>

</div>

<script>
    var url = "<?= base_url('assets') ?>/images";
    var base_url = "<?= base_url() ?>";
</script>
<script src="<?= base_url('assets') ?>/js/vendor/jquery.mask.min.js"></script>
<script src="<?= base_url('assets') ?>/js/vendor/perfect-scrollbar.min.js"></script>
<script src="<?= base_url('assets') ?>/js/vendor/datatables.min.js"></script>
<script src="<?= base_url('assets') ?>/js/vendor/pickadate/picker.js"></script>
<script src="<?= base_url('assets') ?>/js/vendor/pickadate/picker.date.js"></script>
<script src="<?= base_url('assets') ?>/js/es5/script.min.js"></script>
<script src="<?= base_url('assets') ?>/js/vendor/datatables.min.js"></script>
<script src="<?= base_url('assets') ?>/js/vendor/dropzone.min.js"></script>
<script src="<?= base_url('assets') ?>/js/vendor/bootstrap-datepicker.min.js"></script>
<script src="<?= base_url('assets') ?>/js/vendor/select2.min.js"></script>
<script src="<?= base_url('assets') ?>/js/scripts.js"></script>
</body>

</html>
