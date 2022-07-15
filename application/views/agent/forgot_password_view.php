﻿<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Authentication forms">
    <meta name="author" content="Arasari Studio">

    <title><?= $page_title ?></title>
    <link href="<?php echo base_url('site-assets').'/login-page-files/bootstrap.min.css' ?>" rel="stylesheet">
    <link href="<?php echo base_url('site-assets').'/login-page-files/common.css' ?>" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700&display=swap" rel="stylesheet">
    <link href="<?php echo base_url('site-assets').'/login-page-files/theme-03.css' ?>" rel="stylesheet">

    <style>
        @media only screen and (min-width: 850px) and (max-width: 1024px)  {
            .forny-container {
                background: url('<?php echo base_url().'/assets/images/business-deal-ipadPro.jpg'; ?>')  center center no-repeat;
/*                background: url(*/<?php //echo base_url().'/assets/images/business-deal-ipadPro.jpg'; ?>/*)  center center no-repeat;*/
            }
        }
        @media only screen and (min-width: 768px) and (max-width: 849px)  {
            .forny-container {
                background: url('<?php echo base_url().'/assets/images/business-deal-ipad.jpg'; ?>')  center center no-repeat;
/*                background: url('*/<?php //echo base_url().'/assets/images/business-deal-ipad.jpg'; ?>/*')  center center no-repeat;*/
            }
        }
        @media (min-width: 1025px) {
            .forny-container {
                background: url('<?php echo base_url().'/assets/images/business-deal.jpg'; ?>') center center no-repeat;
/*                background: url('*/<?php //echo base_url().'/assets/images/business-deal.jpg'; ?>/*') center center no-repeat;*/
            }
        }


        @media (min-width: 1025px) {
            .forny-container {
                background: url('<?php echo base_url().'/assets/images/business-deal.jpg'; ?>') center center no-repeat;
/*                background: url('*/<?php //echo base_url().'/assets/images/business-deal.jpg'; ?>/*') center center no-repeat;*/
            }
        }

        @media screen and (min-width: 1900px) {
            .forny-container {
                background: url('<?php echo base_url().'/assets/images/business-deal_32_inch.jpg'; ?>') center center no-repeat;
            }
        }

    </style>

</head>

<body>
<div class="forny-container">

    <div class="forny-inner">

        <div class="forny-form">

            <div class="mb-6 text-center forny-logo">
                <img height="40" width="150" src="<?= base_url().'assets/images/logo-epolice.png' ?>">
            </div>


            <div class="text-center">
                <h4>Forgot Password</h4>
            </div>
            <br/>

            <?php if ($this->session->flashdata('no_user_access')) { ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $this->session->flashdata('no_user_access'); ?>
                </div>
            <?php } ?>
            <?php if ($this->session->flashdata('signup_success')) { ?>
                <div class="alert alert-success" role="alert">
                    <?php echo $this->session->flashdata('signup_success'); ?>
                </div>
            <?php } ?>


            <!--            <form method="post" action="#">-->
            <form method="post" action="<?= base_url('user/forgot-password') ?>">

                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="16" viewBox="0 0 24 16">
                                    <g transform="translate(0)">
                                        <path d="M23.983,101.792a1.3,1.3,0,0,0-1.229-1.347h0l-21.525.032a1.169,1.169,0,0,0-.869.4,1.41,1.41,0,0,0-.359.954L.017,115.1a1.408,1.408,0,0,0,.361.953,1.169,1.169,0,0,0,.868.394h0l21.525-.032A1.3,1.3,0,0,0,24,115.062Zm-2.58,0L12,108.967,2.58,101.824Zm-5.427,8.525,5.577,4.745-19.124.029,5.611-4.774a.719.719,0,0,0,.109-.946.579.579,0,0,0-.862-.12L1.245,114.4,1.23,102.44l10.422,7.9a.57.57,0,0,0,.7,0l10.4-7.934.016,11.986-6.04-5.139a.579.579,0,0,0-.862.12A.719.719,0,0,0,15.977,110.321Z" transform="translate(0 -100.445)"/>
                                    </g>
                                </svg>
                            </span>
                        </div>
                        <input required  class="form-control" name="email" type="email" placeholder="Email Address">
                    </div>
                </div>


                <br/>
                <div class="col-12 d-flex align-items-center">
                    <button class="btn btn-primary btn-block" style="background-color: #0F3C78;">Request Password Rest</button>
                </div>


        </div>

        </form>
    </div>
</div>

</div>

<script src="<?php echo base_url('site-assets').'/login-page-files/jquery.min.js' ?>"></script>
<script src="<?php echo base_url('site-assets').'/login-page-files/bootstrap.min.js' ?>"></script>
<script src="<?php echo base_url('site-assets').'/login-page-files/main.js' ?>"></script>
<script src="<?php echo base_url('site-assets').'/login-page-files/demo.js' ?>"></script>


</body>

</html>