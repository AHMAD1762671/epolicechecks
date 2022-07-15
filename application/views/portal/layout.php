<!DOCTYPE html>
<html lang="en">
    <head>

        <title><?= $page_title ?> - ePolice Portal</title>
        <link rel="stylesheet" href="<?= base_url('assets') ?>/styles/vendor/datatables.min.css">
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
<!--        <link rel="apple-touch-icon-precomposed" href="--><?//= base_url('assets') ?><!--/images/favicon.png" />-->
        <script type="text/javascript" src="<?= base_url('assets') ?>/js/vendor/jquery.min.js"></script>
        <script src="<?= base_url('assets') ?>/js/vendor/bootstrap.bundle.min.js"></script>
        <script src="<?= base_url('assets') ?>/js/vendor/sweetalert2.min.js"></script>


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<!--                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />-->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>


        <style>
            .navigation-left li.nav-item:hover {
                transform: scale(1.1);
                background-color: #e1e1e1;
                transition-duration: 0.7s;
            }

            /*to remove table forward icon color*/
            .fa-forward:before {
                color: #ffffff;
            }

            th {
                text-align: center;
            }
            tr {
                text-align: center;
            }






            @media only screen and (min-device-width: 768px){
                .app-footer p {
                    padding-top: 80px !important;
                    float: right;
                }

                /*submit button all size*/
                .screen-submit-btn{
                    width: 6%;
                }
            }

            @media only screen and (max-device-width: 768px){
                .app-footer p {
                    text-align: center !important;
                }

                dl, ol, ul {
                    margin-top: -4px;
                }
            }

            .main-header .header-part-right .user {
                 margin-right: 0;
            }



        </style>




    </head>

    <body>
        <div class='ajax-loadscreen' id="ajax-preloader">
            <div class="ajax-loader spinner-bubble spinner-bubble-primary"></div>
        </div>
        <div class="app-admin-wrap">
            <div class="main-header">
                <div class="logo">
                    <img src="<?= base_url('assets') ?>/images/logox.png" alt="">
                </div>

                <div class="menu-toggle">
                    <div></div>
                    <div></div>
                    <div></div>
                </div>


                <div style="margin: auto"></div>


<!--                notification start -->

                <div class="header-part-right" id="example1">

                    <div class="dropdown">
                        <div class="user colalign-self-end">
                            <img src="<?php echo base_url('assets/images/admin/notification.png'); ?>" id="userDropdown" alt="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown" id="showdata">
                                <a class="dropdown-item" href="<?= base_url('portal/account') ?>">Account settings</a>
                                <a class="dropdown-item" href="<?= base_url('portal/logout') ?>">Sign out</a>
                            </div>
                        </div>
                    </div>
                </div>



<!--                notification end -->



                <div class="header-part-right">

                    <i style="background-color: #f5f5f5;" class="i-Full-Screen header-icon d-none d-sm-inline-block" data-fullscreen=""></i>

                    <div class="dropdown">
                        <div class="user colalign-self-end">
                            <img src="<?= admin_profile_image() ?>" id="userDropdown" alt="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                                <div class="dropdown-header">
                                    <i class="i-Lock-User mr-1"></i> <?= $this->session->userdata('name') ?>
                                </div>
                                <a class="dropdown-item" href="<?= base_url('portal/account') ?>">Account settings</a>
                                <a class="dropdown-item" href="<?= base_url('portal/logout') ?>">Sign out</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="side-content-wrap">
                <div class="sidebar-left open" data-perfect-scrollbar="" data-suppress-scroll-x="true">
                    <ul class="navigation-left">

                        <li class="nav-item <?= active_menu('portal/dashboard') ?>">
                            <a class="nav-item-hold" href="<?= base_url('portal/dashboard') ?>">
                                <span class="nav-text"><span class="fa fa-chart-bar"></span> Dashboard</span>
                            </a>
                            <div class="triangle"></div>
                        </li>



<!--                        <li class="nav-item --><?//= active_menu('portal/dashboard') ?><!--">-->
<!--                            <a class="nav-item-hold" href="--><?//= base_url('portal/dashboard') ?><!--">-->
<!--                                <span class="nav-text"><span class="fa fa-chart-bar"></span> Dashboard</span>-->
<!--                            </a>-->
<!--                            <div class="triangle"></div>-->
<!--                        </li>-->



<!--                        --><?php //if (check_route('brands-dashboard', 'get')): ?>
<!--                            <li class="nav-item --><?//= active_menu('portal/brands-dashboard') ?><!--">-->
<!--                                <a class="nav-item-hold" href="--><?//= base_url('portal/brands-dashboard') ?><!--">-->
<!--                                    <span class="nav-text"><span class="fa fa-folder"></span> Dashboard</span>-->
<!--                                </a>-->
<!--                                <div class="triangle"></div>-->
<!--                            </li>-->
                            <?php
//                        endif;


                        if (check_route('locations', 'get')):
                            ?>
                            <li class="nav-item <?= base_url('portal/locations') ?>">
                                <a class="nav-item-hold" href="<?= base_url('portal/locations') ?>">
                                    <span class="nav-text"><span class="fas fa-globe"></span> Locations</span>
                                </a>
                                <div class="triangle"></div>
                            </li>
                            <?php
                        endif;
                        if (check_route('users', 'get')):
                            ?>
                            <li class="nav-item <?= active_menu('portal/users') ?>">
                                <a class="nav-item-hold" href="<?= base_url('portal/users') ?>">
                                    <span class="nav-text"><span class="fa fa-users"></span> Staff Users </span>
                                </a>
                                <div class="triangle"></div>
                            </li>
                            <?php
                        endif;
                        if (check_route('agents', 'get')):
                            ?>
                            <li class="nav-item <?= active_menu('portal/agents') ?>">
                                <a class="nav-item-hold" href="<?= base_url('portal/agents') ?>">
                                    <span class="nav-text"><span class="fa fa-users"></span> Agents</span>
                                </a>
                                <div class="triangle"></div>
                            </li>
                            <?php
                        endif;
                        if (check_route('corporates', 'get')):
                            ?>
                            <li class="nav-item <?= active_menu('portal/corporates') ?>">
                                <a class="nav-item-hold" href="<?= base_url('portal/corporates') ?>">
                                    <span class="nav-text"><span class="fa fa-users"></span> Corporates</span>
                                </a>
                                <div class="triangle"></div>
                            </li>
                            <?php
                        endif;

                            if (check_route('corporates', 'get')):
                                ?>
                                <li class="nav-item <?= active_menu('portal/reseller_list') ?>">
                                    <a class="nav-item-hold" href="<?= base_url('portal/reseller_list') ?>">
                                        <span class="nav-text"><span class="fa fa-users"></span> Reseller</span>
                                    </a>
                                    <div class="triangle"></div>
                                </li>
                                <?php
                            endif;


                        if (check_route('prices', 'get')):
                            ?>
                            <li class="nav-item <?= active_menu('portal/prices') ?>">
                                <a class="nav-item-hold" href="<?= base_url('portal/prices') ?>">
                                    <span class="nav-text"><span class="fas fa-money-bill"></span> Price</span>
                                </a>
                                <div class="triangle"></div>
                            </li>
                            <?php
                        endif;
//                        if (check_route('office-desk', 'get')):
                            ?>
<!--                            <li class="nav-item --><?//= active_menu('portal/office-desk') ?><!--">-->
<!--                                <a class="nav-item-hold" href="--><?//= base_url('portal/office-desk') ?><!--">-->
<!--                                    <span class="nav-text"><span class="fas fa-file"></span> Office Desk </span>-->
<!--                                </a>-->
<!--                                <div class="triangle"></div>-->
<!--                            </li>-->
                            <?php
//                        endif;
                        if (check_route('locations', 'get')):
                            ?>
                            <li class="nav-item <?= active_menu('portal/coupons') ?>">
                                <a class="nav-item-hold" href="<?= base_url('portal/coupons') ?>">
                                    <span class="nav-text"><span class="fa fa-gift"></span> Coupons</span>
                                </a>
                                <div class="triangle"></div>
                            </li>
                            <?php
                        endif;
                        if (check_route('locations', 'get')):
                            ?>
                            <li class="nav-item <?= active_menu('portal/account') ?>">
                                <a class="nav-item-hold" href="<?= base_url('portal/account') ?>">
                                    <span class="nav-text"><span class="fa fa-money-bill"></span> Accounts</span>
                                </a>
                                <div class="triangle"></div>
                            </li>
                            <?php
                        endif;
                            ?>

                        <li class="nav-item <?= active_menu('portal/invoice') ?>">
                            <a class="nav-item-hold" href="<?= base_url('portal/invoice') ?>">
                                <span class="nav-text"><span class="fas fa-file-invoice"></span> Invoices </span>
                            </a>
                            <div class="triangle"></div>
                        </li>

                        <li class="nav-item <?= active_menu('portal/view_service_order_images') ?>">
                            <a class="nav-item-hold" href="<?= base_url('portal/view_service_order_images') ?>">
                                <span class="nav-text"><span class="fa fa-file"></span> Service Order</span>
                            </a>
                            <div class="triangle"></div>
                        </li>

                        <li class="nav-item <?= active_menu('portal/series_list') ?>">
                            <a class="nav-item-hold" href="<?= base_url('portal/series_list') ?>">
                                <span class="nav-text"><span class="fa fa-file"></span> Series Table</span>
                            </a>
                            <div class="triangle"></div>
                        </li>

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
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <?php
                }
                if ($flashmsg = $this->session->flashdata('error_message')) {
                    ?>
                    <div class="alert alert-error" role="alert">
                        <strong class="text-capitalize"><?= $flashmsg ?></strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                <?php }
                if ($flashmsg = $this->session->tempdata('error_message')) {
                    ?>
                    <div class="alert alert-error" role="alert">
                        <strong class="text-capitalize"><?= $flashmsg ?></strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                <?php }                
               if ($flashmsg = $this->session->tempdata('success_message')) {
                ?>
                <div class="alert alert-success" role="alert">
                    <strong class="text-capitalize"><?= $flashmsg ?></strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            <?php }
            ?>                
                <div class="card">
                    <div class="card-body">
                        <?php
                        if($page == "country_by_id"){
                            $this->load->view('portal/country_by_id', $record);
                        }
                        elseif($page == "name_based_applications"){
                            $this->load->view('portal/name_based_application_by_id', $record);
                        }
                        else
                            $this->load->view($main_view, $numberOfNewApplications);
                        ?>
                    </div>
                </div>


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
        
                        <div class="col-sm-4">
                            <p style="font-size: 12px;">
                                © 2021 ePolice ®
                                Registered trademark of Global Avenues Consulting Inc.
                            </p>
                        </div>

                    </div>
                </div>
            </div>

        </div>
        <div class="search-ui">
            <div class="search-header">
                <img src="<?= base_url('assets') ?>/images/logox.png" alt="" class="logo">
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
    </body>

</html>


<script>
    $(function(){
        showAllEmployee();
        //function
        function showAllEmployee(){
            $.ajax({
                type: 'ajax',
                url: '<?php echo base_url() ?>portal/get_notification',
                async: false,
                dataType: 'json',
                success: function(data){
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html +=
                            '<a class="dropdown-item" href="<?php echo base_url('portal/notificationDetails/') ?>'+data[i].table_id +'/'+ data[i].table_name +'">' + data[i].description + '---' + data[i].created_at  +'</a>'
                    }
                    $('#showdata').html(html);
                },
            });
        }
    });
</script>