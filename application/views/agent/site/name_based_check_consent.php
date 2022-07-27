<!DOCTYPE html>
<html lang="en">

<head>

    <meta content="width=device-width, initial-scale=1" name="viewport" />

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <style>

        .checkout-wrapper{padding-top: 40px; padding-bottom:40px; background-color: #fafbfa;}
        .checkout{    background-color: #fff;
            border:1px solid #eaefe9;

            font-size: 14px;}
        .panel{margin-bottom: 0px;}
        .checkout-step {

            border-top: 1px solid #f2f2f2;
            color: #666;
            font-size: 14px;
            padding: 30px;
            position: relative;
        }

        .checkout-step-number {
            border-radius: 50%;
            border: 1px solid #666;
            display: inline-block;
            font-size: 12px;
            height: 32px;
            margin-right: 26px;
            padding: 6px;
            text-align: center;
            width: 32px;
        }
        .checkout-step-title{ font-size: 18px;
            font-weight: 500;
            vertical-align: middle;display: inline-block; margin: 0px;
        }

        .checout-address-step{}
        .checout-address-step .form-group{margin-bottom: 18px;display: inline-block;
            width: 100%;}

        .checkout-step-body{padding-left: 60px; padding-top: 30px;}

        .checkout-step-active{display: block;}
        .checkout-step-disabled{display: none;}

        .checkout-login{}
        .login-phone{display: inline-block;}
        .login-phone:after {
            content: '+91 - ';
            font-size: 14px;
            left: 36px;
        }
        .login-phone:before {
            content: "";
            font-style: normal;
            color: #333;
            font-size: 18px;
            left: 12px;
            display: inline-block;
            font: normal normal normal 14px/1 FontAwesome;
            font-size: inherit;
            text-rendering: auto;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }
        .login-phone:after, .login-phone:before {
            position: absolute;
            top: 50%;
            -webkit-transform: translateY(-50%);
            transform: translateY(-50%);
        }
        .login-phone .form-control {
            padding-left: 68px;
            font-size: 14px;

        }
        .checkout-login .btn{height: 42px;     line-height: 1.8;}

        .otp-verifaction{margin-top: 30px;}
        .checkout-sidebar{background-color: #fff;
            border:1px solid #eaefe9; padding: 30px; margin-bottom: 30px;}
        .checkout-sidebar-merchant-box{background-color: #fff;
            border:1px solid #eaefe9; margin-bottom: 30px;}
        .checkout-total{border-bottom: 1px solid #eaefe9; padding-bottom: 10px;margin-bottom: 10px; }
        .checkout-invoice{display: inline-block;
            width: 100%;}
        .checout-invoice-title{    float: left; color: #30322f;}
        .checout-invoice-price{    float: right; color: #30322f;}
        .checkout-charges{display: inline-block;
            width: 100%;}
        .checout-charges-title{float: left; }
        .checout-charges-price{float: right;}
        .charges-free{color: #43b02a; font-weight: 600;}
        .checkout-payable{display: inline-block;
            width: 100%; color: #333;}
        .checkout-payable-title{float: left; }
        .checkout-payable-price{float: right;}

        .checkout-cart-merchant-box{ padding: 20px;display: inline-block;width: 100%; border-bottom: 1px solid #eaefe9;
            padding-bottom: 20px; }
        .checkout-cart-merchant-name{color: #30322f; float: left;}
        .checkout-cart-merchant-item{ float: right; color: #30322f; }
        .checkout-cart-products{}

        .checkout-cart-products .checkout-charges{ padding: 10px 20px;
            color: #333;}
        .checkout-cart-item{ border-bottom: 1px solid #eaefe9;
            box-sizing: border-box;
            display: table;
            font-size: 12px;
            padding: 22px 20px;
            width: 100%;}
        .checkout-item-list{}
        .checkout-item-count{ float: left; }
        .checkout-item-img{width: 60px; float: left;}
        .checkout-item-name-box{ float: left; }
        .checkout-item-title{ color: #30322f; font-size: 14px;  }
        .checkout-item-unit{  }
        .checkout-item-price{float: right;color: #30322f; font-size: 14px; font-weight: 600;}


        .checkout-viewmore-btn{padding: 10px; text-align: center;}

        .header-checkout-item{text-align: right; padding-top: 20px;}
        .checkout-promise-item {
            background-repeat: no-repeat;
            background-size: 14px;
            display: inline-block;
            margin-left: 20px;
            padding-left: 24px;
            color: #30322f;
        }
        .checkout-promise-item i{padding-right: 10px;color: #43b02a;}

        .panel-primary>.panel-heading {
            background-color: #13375c;
        }

        small {
            color: #ffffff;
        }
        /*input {*/
        /*border: 1px solid !important;*/
        /*}*/

    </style>

    <style>

        h2 {
            font-family: Arial, Verdana;
            font-weight: 800;
            font-size: 2.5rem;
            color: #091f2f;
            text-transform: uppercase;
        }
        .accordion-section .panel-default > .panel-heading {
            border: 0;
            background: #f4f4f4;
            padding: 0;
        }
        .accordion-section .panel-default .panel-title a {
            display: block;
            font-style: italic;
            /*font-size: 1.5rem;*/
        }
        .accordion-section .panel-default .panel-title a:after {
            font-family: 'FontAwesome';
            font-style: normal;
            font-size: 2rem;
            content: "\f106";
            color: #263EA5;
            float: right;
            margin-top: -12px;
        }
        .accordion-section .panel-default .panel-title a.collapsed:after {
            content: "\f107";
        }
        /*.accordion-section .panel-default .panel-body {*/
        /*font-size: 1.2rem;*/
        /*}*/


        /*undo the default visibility*/
        .collapse {
            display: none;
            visibility: inherit;
        }



        /*accordian header title and background color*/
        /*h3.panel-title a {*/
        /*color: #263EA5;*/
        /*}*/
        /*.panel-heading .p-3 .mb-3 {*/
        /*background: #b4b4b4;*/
        /*}*/
        /*a.collapsed {*/
        /*text-decoration: none;*/
        /*}*/

        /*background of step 2 accordian*/

        .gray_background{
            background: #f5f5f5;
        }



        /*next button custom css code*/
        .next_button_custom_css{
            font-weight: 900;
            padding: 10px 23px;
            font-size: 14px;
            border-radius: 1rem;
        }


        /*.btn{*/
        /*background-color: #ffffff;*/
        /*}*/

    </style>

    <style>
        /* Latest compiled and minified CSS included as External Resource*/

        /* Optional theme */

        /*@import url('//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-theme.min.css');*/
        body {
            margin-top:30px;
        }
        .stepwizard-step p {
            margin-top: 0px;
            color:#666;
        }
        .stepwizard-row {
            display: table-row;
        }
        .stepwizard {
            display: table;
            width: 100%;
            position: relative;
        }
        .stepwizard-step button[disabled] {
            /*opacity: 1 !important;
            filter: alpha(opacity=100) !important;*/
        }
        .stepwizard .btn.disabled, .stepwizard .btn[disabled], .stepwizard fieldset[disabled] .btn {
            opacity:1 !important;
            color:#bbb;
        }
        .stepwizard-row:before {
            top: 14px;
            bottom: 0;
            position: absolute;
            content:" ";
            width: 100%;
            height: 1px;
            background-color: #ccc;
            z-index: 0;
        }
        .stepwizard-step {
            display: table-cell;
            text-align: center;
            position: relative;
        }

    </style>

    <link rel="stylesheet" href="<?= base_url('assets') ?>/styles/css/style.css">

    <style>
        .margin-top-adjustment{
            padding-top: 20px;
        }


        /*query for step form header box small to adjust more elements*/
        @media (min-width:1281px) {
            .col-xs-3 {
                width: 11%;
            }


            /*progress bar top*/
            .progress {
                display: -ms-flexbox;
                display: flex;
                height: 1rem;
                margin-bottom: 15px;
            }

            /*progress bar upside margin 0*/
            p {
                margin: 0 0 0px;
            }
        }


        /*progress bar speed*/
        .progress.active .progress-bar, .progress-bar.active {
            -webkit-animation: progress-bar-stripes 1s linear infinite;
        }

        /*border icon top */
        .btn {
            border: 1px solid;
        }

        /*border curve progress bar*/
        .progress {
            border-radius: 15px;
        }


        /*remove border of section from the top*/
        div#step-1 {
            border: none;
        }
        div#step-2 {
            border: none;
        }

        .panel-body.gray_background{
            border: 1px solid #263ea5;
        }



        /*next button color change*/
        button.btn.btn-primary.nextBtn.pull-right.next_button_custom_css {
            background: #13375c;
        }
    </style>


    <!--    custom css for version changes-->
    <style>
        /*p {*/
        /*font-size: 16px;*/
        /*}*/
        h5 {
            /*font-size: 20px;*/
            /*font-family: 'Oswald', sans-serif;*/
            /*color: #263EA5;*/
        }
        .form-control {
            display: block;
            width: 100%;
            height: 34px;
            padding: 6px 12px;
            font-size: 14px;
            line-height: 1.42857143;
            color: #555;
            background-color: #fff;
            background-image: none;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        label {
            display: inline-block;
            max-width: 100%;
            margin-bottom: 5px;
            font-weight: 700;
        }

    </style>

    <style>
        /*@media only screen and (min-width: 200px) and (max-width: 767px)  {*/
        @media screen and (min-width: 768px) {
            .row {
                margin-bottom: 15px;
            }
        }


        @media screen and (max-width: 767px)  {
            .mobile_setting_next_button {
                width: 35% !important;
                height: 120% !important;
                font-size: 24px !important;
            }

            .button_center_mobile{
                /*margin-left: -20%;*/
            }

            .col-xs-3 {
                width: 14%;
            }

            .col-md-6.col-lg-6.col-sm-6.col-xs-12 {
                padding-left: 10px;
            }

            .margin_top_mobile{
                margin-top: 5%;
            }

            .col-sm-3 {
                margin-top: 10%;
                margin-left: 25%;
            }

            .btn{
                padding: .675rem .75rem;
                font-size: 18px;
            }
            .col-lg-4.col-md-4.col-sm-4.col-xs-12 {
                margin-bottom: 20px;
            }

            .mobile-margin-bottom {
                margin-bottom: 20px;
            }

            .logo-big-on-mobile {
                width: 120px !important;
                max-width: none;
            }
        }

        .mobile_setting_next_button{
            width: 10%;
        }

        .panel-primary {
            border: none;
        }

    </style>

    <style>
        .required_class:after {
            content:" *";
            color: red;
            font-size: 16px;
        }
    </style>


</head>



<body>





<!--page header area-->

<div class="main-header">
    <div class="logo">
        <img class="logo-big-on-mobile" src="<?= base_url('assets') ?>/images/logo.png" alt="">
    </div>

    <div style="margin: auto"></div>

    <div class="header-part-right">

        <i class="i-Full-Screen header-icon d-none d-sm-inline-block" data-fullscreen=""></i>

        <div class="dropdown">
            <div class="user colalign-self-end">
                <img src="<?= agent_profile_image() ?>" id="userDropdown" alt="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <div class="dropdown-header">
                        <i class="i-Lock-User mr-1"></i> <?= $this->session->userdata('name') ?>
                    </div>
                    <a class="dropdown-item" href="#">Account settings</a>
                    <a class="dropdown-item" href="#">Message</a>
                    <a class="dropdown-item" href="<?= base_url('user/logout') ?>">Sign out</a>
                </div>
            </div>
        </div>
    </div>

</div>










<br/>
<br/>
<br/>
<br/>












<div class="container">


    <div class="stepwizard">
        <div class="stepwizard-row setup-panel">

            <div class="stepwizard-step col-xs-3">
                <a href="#step-0" type="button" class="btn btn-default btn-circle" disabled="disabled">1</a>
                <!--                <p><small>Cargo</small></p>-->
            </div>
            <div class="stepwizard-step col-xs-3">
                <a href="#step-0" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                <!--                <p><small>Cargo</small></p>-->
            </div>



            <div class="stepwizard-step col-xs-3" data-toggle="tooltip" data-placement="top" title="Personal Information">
                <a href="#step-1" type="button" class="btn btn-success btn-circle">3</a>
                <!--                <p><small>Shipper</small></p>-->
            </div>
            <div class="stepwizard-step col-xs-3" data-toggle="tooltip">
                <a href="#step-2" type="button" class="btn btn-default btn-circle"  data-placement="top"  title="Address" disabled="disabled">4</a>
                <!--                <p><small>Address</small></p>-->
            </div>
            <div class="stepwizard-step col-xs-3">
                <!--                <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled" title="Reason for Request">6</a>-->
                <a href="#step-3" type="button" class="btn btn-default btn-circle" data-placement="top" title="Reason for Request" disabled="disabled">5</a>
                <!--                <p><small>Reason for Request</small></p>-->
            </div>
            <div class="stepwizard-step col-xs-3">
                <a href="#step-4" type="button" class="btn btn-default btn-circle" data-placement="top" title="Declaration of Criminal Record" disabled="disabled">6</a>
                <!--                <p><small>Declaration of Criminal Record</small></p>-->
            </div>

            <div class="stepwizard-step col-xs-3">
                <a href="#step-5" type="button" class="btn btn-default btn-circle" data-placement="top" title="Signature" disabled="disabled">7</a>
                <!--                <p><small>Declaration of Criminal Record</small></p>-->
            </div>

        </div>
    </div>


    <br/>




    <form role="form" action="<?php echo base_url('agent/app_name_based_check_consent_save') ?>" method="post">

        <!--        step1-->
        <div class="panel panel-primary setup-content" id="step-1">

            <div class="progress">
                <div class="progress-bar progress-bar-striped bg-success active" role="progressbar" style="width: 56%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
            </div>

            <div class="panel-heading">
                <h3 class="panel-title">Personal Information</h3>
            </div>
            <div class="panel-body gray_background margin-top-adjustment">
                <div class="row" style="margin-left: 15px; margin-right: 15px;">
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-6">
                        <label> Last Name: </label>  <span class="required_class"> </span>  <br />
                        <input required="" type="text" name="consent_last_name"class="form-control input"/>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-6">
                        <label> First Name: </label>  <span class="required_class"> </span>  <br />
                        <input required="" type="text" name="consent_first_name"class="form-control input"/>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-6">
                        <label> Middle Name:  </label> <br />
                        <input type="text" name="consent_middle_name" class="form-control input"/>
                    </div>
                </div>
                <br/>

                <div class="row" style="margin-left: 15px; margin-right: 15px;">

                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-6">
                        <label> Maiden/Alias/Nickname: </label> <br />
                        <input type="text" name="consent_nickname" class="form-control input"/>
                    </div>

                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-6">
                        <label> Date of Birth</label>  <span class="required_class"> </span>  <br />
                        <input required="" type="date" name="consent_dob" class="form-control input"/>
                    </div>

                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-6">
                        <label>Place of Birth (City, State, Country)</label>  <span class="required_class"> </span>  <br />
                        <input required="" type="text" name="consent_birth_place" placeholder="City/Town, Province/State" class="form-control input"/>
                    </div>
                </div>

                <button class="btn btn-primary nextBtn pull-right next_button_custom_css mobile_setting_next_button" type="button">Next</button>
            </div>
        </div>



        <!--        step 2-->

        <div class="panel panel-primary setup-content" id="step-2">

            <div class="progress">
                <div class="progress-bar progress-bar-striped bg-success active" role="progressbar" style="width: 70%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
            </div>

            <div class="panel-heading">
                <h3 class="panel-title">Address</h3>
            </div>
            <div class="panel-body gray_background">

                <!--                <br/>-->

                <div class="row" style="margin-left: 15px; margin-right: 15px;">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <label>Street Address:</label>  <span class="required_class"> </span>  <br />
                        <input required="" type="text" name="consent_current_address" class="form-control input"/>
                    </div>
                </div>

                <div class="row" style="margin-left: 15px; margin-right: 15px;">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                        <label>City:</label>  <span class="required_class"> </span>  <br />
                        <input required="" type="text" name="consent_current_city" class="form-control input"/>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                        <label>Province:</label>  <span class="required_class"> </span>  <br />
                        <input required="" type="text" name="consent_current_state" class="form-control input"/>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                        <label>Postal Code:</label>  <span class="required_class"> </span>  <br />
                        <input required="" type="text" name="consent_current_post_code" class="form-control input"/>
                    </div>
                </div>

                <div class="row" style="margin-left: 15px; margin-right: 15px;">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                        <label>Telephone:</label>  <span class="required_class"> </span>  <br />
                        <input required="" type="number" name="consent_phone" class="form-control input"/>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                        <label>Cell:</label> <br />
                        <input type="number" name="consent_cellphone" class="form-control input"/>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                        <label>Email:</label>  <span class="required_class"> </span>  <br />
                        <input required="" type="email" name="consent_email" class="form-control input"/>
                    </div>
                </div>
                <button class="btn btn-primary nextBtn pull-right next_button_custom_css mobile_setting_next_button" type="button">Next</button>
            </div>
        </div>




        <!--        3rd step about step form-->
        <div class="panel panel-primary setup-content" id="step-3">
            <div class="progress">
                <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: 84%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
            </div>


            <div class="panel-heading">
                <h3 class="panel-title">Reason for Request</h3>
            </div>
            <div class="panel-body gray_background">

                <div class="row" style="margin-left: 15px; margin-right: 15px;">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <p style="color: black;">
                            Do you have a criminal record or ever been arrested in Canada?  <span class="required_class"> </span>
                            <input type="radio" required="" value="Yes" name="consent_arrested_canada"/> Yes
                            <input type="radio" required="" value="No" name="consent_arrested_canada"/> No
                        </p>
                        <br/>
                        <p style="color: black;">
                            Do you have a criminal record or ever been arrested in United States of America?  <span class="required_class"> </span>
                            <input type="radio" required="" value="Yes" name="consent_arrested_america"/> Yes
                            <input type="radio" required="" value="No" name="consent_arrested_america"/> No
                        </p>
                        <br/>
                        <p style="color: black;">
                            Do you have a criminal record or ever been arrested in a Foreign Country?  <span class="required_class"> </span>
                            <input type="radio" required="" value="Yes" name="consent_arrested_foreign"/> Yes
                            <input type="radio" required="" value="No" name="consent_arrested_foreign"/> No
                        </p>
                        <br/>
                        <p style="color: black;">
                            Have you ever been refused entry at the USA port of entry/USA border?  <span class="required_class"> </span>
                            <input type="radio" required="" value="Yes" name="consent_refused_border"/> Yes
                            <input type="radio" required="" value="No" name="consent_refused_border"/> No
                        </p>
                        <!--                        <br/>-->
                        <p style="color: black;">
                            If yes, when (MM-DD-YYYY)  <input type="date" name="consent_refused_border_date" class="form-control input"/>
                        </p>

                        <br/>
                        <p style="color: black;">
                            Have you ever been deported from the United States of America? <span class="required_class"> </span>
                            <input type="radio" required="" value="Yes" name="consent_deported_america"/> Yes
                            <input type="radio" required="" value="No" name="consent_deported_america"/>  No
                        </p>
                        <p style="color: black;">
                            If yes, when (MM-DD-YYYY) <input  type="date" name="consent_deported_america_date" class="form-control input"/>
                        </p>
                        <br/>
                        <p style="color: black;">
                            Have you ever received a fine for your criminal charges in Canada, USA or foreign country?  <span class="required_class"> </span>
                            <input type="radio" required="" value="Yes" name="consent_criminal_country"/> Yes
                            <input type="radio" required="" value="No" name="consent_criminal_country"/> No
                        </p>
                    </div>
                </div>
                <button class="btn btn-primary nextBtn pull-right next_button_custom_css mobile_setting_next_button" type="button">Next</button>
            </div>
        </div>


        <!--        4th step-->

        <div class="panel panel-primary setup-content" id="step-4">
            <div class="progress">
                <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: 95%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
            </div>

            <div class="panel-heading">
                <h3 class="panel-title">Declaration of Criminal Record</h3>
            </div>
            <div class="panel-body gray_background">
                <!--                        step 4 body-->
                <br/>
                <br/>
                <div class="row" style="margin-top: -30px; margin-left: 15px; margin-right: 15px;">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <p style="color: black;">
                            Have you ever been convicted of a criminal offence for which a pardon has not
                            been granted? <span class="required_class"> </span>
                            <input type="radio" required="" value="Yes" name="consent_criminal_offence"/> Yes
                            <input type="radio" required="" value="No" name="consent_criminal_offence"/> No
                        </p>
                    </div>
                </div><br>
                <div class="row" style="margin-top: -30px; margin-left: 15px; margin-right: 15px;">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <p style="color: black;">
                            If you answered YES, please provide the details of all criminal convictions.
                        </p>
                    </div>
                </div>


                <!--                dynamic fields with plus button -->
                <div class="row" style="margin-left: 15px; margin-right: 15px;">
                    <table width="100%" id="offence-details">
                        <tr style="background-color: #9ac0cd;">
                            <td align="center" class="labels_with_radio"> <b> Offence </b> </td>
                            <td align="center" class="labels_with_radio"> <b> Date of Sentence (YYYY/MM/DD) </b> </td>
                            <td align="center" class="labels_with_radio"> <b> City, Country	 </b> </td>
                            <td align="center" class="labels_with_radio"> <b> Type of Fine/Sentence? </b> </td>
                            <td align="center" class="labels_with_radio"> <b> Fine Paid/Sentence completed? </b> </td>
                        </tr>
                        <tr>
                            <td > <input type="text" name="consent_offence[]" class="form-control"/> </td>
                            <td > <input type="text" name="consent_offence_date[]" class="form-control"/> </td>
                            <td > <input type="text" name="consent_offence_court[]" class="form-control"/> </td>
                            <td > <input type="text" name="type_of_fine[]" class="form-control"/> </td>
                            <td align="center">
                                <input type="radio" value="Yes" name="consent_paid[2]"/> Yes
                                <input type="radio" value="No" name="consent_paid[2]"/> No
                            </td>
                        </tr>
                        <tr>
                            <td > <input type="text" name="consent_offence[]" class="form-control"/> </td>
                            <td > <input type="text" name="consent_offence_date[]" class="form-control"/> </td>
                            <td > <input type="text" name="consent_offence_court[]" class="form-control"/> </td>
                            <td > <input type="text" name="type_of_fine[]" class="form-control"/> </td>
                            <td align="center">
                                <input type="radio" value="Yes" name="consent_paid[2]"/> Yes
                                <input type="radio" value="No" name="consent_paid[2]"/> No
                            </td>
                        </tr>
                    </table>
                    <input type="hidden" name="application_id" value="<?= $application_id ?>">
                    <input type="hidden" name="client_id" value="<?= $client_id ?>">
                    <button type="button" id="add-offence" class="btn btn-default" aria-label="Plus Sign">
                        <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>
                    </button>
                </div>


                <br />
                <div class="row" style="margin-left: 15px; margin-right: 15px;">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <h4 align="left" style="font-size: 15px;"><b>Comments</b></h4>
                        <textarea class="form-control" required="" name="consent_comments" rows="5" id="comment"></textarea>
                    </div>
                </div> <br />

                <button class="btn btn-primary nextBtn pull-right next_button_custom_css mobile_setting_next_button" type="button">Next!</button>
            </div>
        </div>











        <!--        5th step-->

        <div class="panel panel-primary setup-content" id="step-5">
            <div class="progress">
                <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: 95%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
            </div>

            <div class="panel-heading">
                <h3 class="panel-title">Terms and Conditions</h3>
            </div>
            <div class="panel-body gray_background">
                <!--                        step 5th body-->

                <br/>
                <div class="row" style="margin-top: -30px; margin-left: 15px; margin-right: 15px;">

                    <p style="font-size: 15px; text-align: justify;">
                        I authorized Global Avenues Consulting Inc.(GAC) to act on my behalf of obtaining Record Suspension and/or File destruction and or/ File purge and/or U.S entry waiver from Royal Canadian Mounted Police, regional & local police services and/or USA department of homeland security (DHS). GAC is hereby authorized to act on my behalf for the purpose of any above stated application(s). GAC will only assist in the file preparation, collecting required documents, postal handling and submission of any above stated application(s).

                    </p>
                    <!--                    <br/>-->
                    <br/>

                    <p style="font-size: 15px; text-align: justify;">
                        I authorized GAC to communicate with any and all government offices necessary for the completion of my file, including the RCMP, regional & local police, Canadian and USA courts, in addition to any government related office necessary for the completion of my file, whatsoever the details may be. I understand and acknowledge that GAC is not a law firm and instruction provided by GAC is not a legal advice. Should the client require legal advise, the client should consult a lawyer.I acknowledge that I am responsible for providing all information and documents required by the Canadian & USA authorities and all documentation and information will be genuine and I understand that any inaccuracies may seriously affect the status of my application. Any false information and document submitted to Canadian & USA authorities is my sole responsibility and GAC will not be responsible or part of any false information and documentation submissions.
                    </p>
                    <!--                        <br/>-->
                    <br/>

                    <p style="font-size: 15px; text-align: justify;">
                        I understand that any further personal criminal activity, occurring while my application is in process may result a significant postponement on my eligibility. I further understand that any delay caused by my activity may result in additional charges to be covered by me. I understand that GAC has no control, whatsoever, over my application time frame, over The Parole Board of Canada, the RCMP, the DHS, Canadian & USA courts. I affirm that GAC will not be responsible if I am ineligible to apply for record suspension and/or file destruction, file purge and/or U.S entry waiver application due to my unpaid fines, surcharges, restitution, waiting period implications with police and any nature of convictions. I understand that any time frames offered by GAC are estimates only and that no time frames can be guaranteed under any circumstance, regardless of the details and or urgency of the file. I acknowledge that GAC is not giving any guarantees on the outcome of my application for Canadian Record Suspension and/or File destruction, File purge and/or U.S. entry waiver. I understand that granting or rejection of my record suspension/file destruction/purge/ U.S entry waiver is a solely decision of The Parole Board of Canada, Royal Canadian Mounted Police, regional & local police services and USA department of homeland security (DHS).
                    </p>
                    <!--                        <br/>-->
                    <br/>


                    <p style="font-size: 15px; text-align: justify;">
                        I understand that GAC administrative fee is for assisting me with my application preparation only. I understand GAC administration fee for my application preparation is non-refundable. All payments are quoted in Canadian dollar which are subject to applicable taxes and may change at any time. I understand that I can cancel my application within three business days of the file opening with GAC. I further understand & acknowledge that I will be entitled to a refund of my GAC administrative fee payment made only upon the written request of cancellation made within three business days except $250 dollars of file opening fee minus the credit card administrative fee charged when the file was opened. I affirm that I will not be entitled to a refund due to my unpaid fines, surcharges, restitution, waiting period implications with police and any nature of conviction(s). The administration fee does not include any Canadian & USA court fees, local police checks fee, Parole board of Canada (PBC) and USA department of homeland security (DHS) application processing fee and document(s) translation by certified translator, if applicable. Canadian & USA court fees, local police checks fee, Parole board of Canada (PBC) and USA department of homeland security (DHS) fee(s) can change at any time without notice. In cases of U.S. Entry Waiver applications only, if any convictions took place in the province of Quebec, the client is responsible for the translation of the court documents for submission to the U.S. homeland Security. GAC offers to provide authorized and certified translation through a third party at the client's expense. The PBC and DHS processing fee will be due upon completion of my file preparation. If applicable, I agree to pay the Canadian & USA court fees and local police checks fees during the process of my application(s). Non-payment of Service fees, Canadian & USA court fees, local police checks fee and disbursements, in a timely manner will result in my file being discontinued. A $50.00 fee will be charged for missed and/or declined credit card payment. GAC reserves the right to change the terms & conditions prior to any payment made. I authorize Global Avenues Consulting Inc. (GAC) to charge my credit card to cover all amounts due when opening the file and during the application process as indicated on this terms & conditions. All payments will be automatically charged on my credit card without prior notice to me. I understand that Global Avenues Consulting Inc. will discontinue its services if the payment is not received when due.
                    </p>
                    <!--                        <br/>-->
                    <br/>

                    <p style="font-size: 15px; text-align: justify;">
                        I agree to maintain consistent communication with GAC to ensure all my contacts and address information is updated at all the time while my application is in process. I understand that GAC will discontinue the processing of my application(s) if I am unable to provide all the pending information & documents and if I am not reachable with my telephone number(s) and/or email and/or postal mail is returned undeliverable for 30 days. A $100.00 fee will apply to reactivate the closed file within 12 months. If applicable, I understand and acknowledge that if GAC has not received my record from RCMP and/or USA authorities within two years than my application will be considered inactive and $100.00 will be charged to re-activate my file. I understand after 12 months my file and all the information therein will be destroyed by GAC and a new application preparation term & conditions of GAC and administration fees will apply. If applicable, I understand that if my submitted application(s) to The Parole Board of Canada (PBC), Royal Canadian Mounted Police, regional & local police services and/or USA department of homeland security (DHS) is found to be ineligible due to any reason than I will be charged $150 by GAC for maintaining and holding my file until I am eligible to apply. By providing credit card details to GAC the client agrees that this information may be used to automatically charge any and all disbursement fees owing.
                    </p>
                    <!--                        <br/>-->
                    <br/>

                    <p style="font-size: 15px; text-align: justify;">
                        I acknowledge this GAC service terms & conditions and do hereby state that I understand and agree to all of the terms and conditions as stipulated herein. The client understands and agrees that in no event shall GAC be liable for any damages whatsoever, including direct claim, indirect claim, incidental, consequential, special or exemplary damages, and any damages for loss of profits, savings, goodwill or other intangible claim. I agree that upon accepting GAC service terms & conditions, if at any time I decide to retain other service provider or transfer my file from GAC to other service provider in connection with above mentioned services matters, or terminate the services or cancel or withdraw my application, then the total fees shall become due owning immediately. I acknowledge that GAC reserves the right to reject processing my application at any time with any notice. If any change is not acceptable to the client, the client must discontinue the client's use of this GAC services immediately.
                    </p>
                    <!--                        <br/>-->
                    <br/>
                </div>
                    <button class="btn btn-primary nextBtn pull-right next_button_custom_css mobile_setting_next_button" type="submit" name="submit">Submit</button>
            </div>
        </div>

    </form>
</div>


</body>



<!--script for according-->
<script>
    $(document).ready(function () {

        var navListItems = $('div.setup-panel div a'),
            allWells = $('.setup-content'),
            allNextBtn = $('.nextBtn');

        allWells.hide();

        navListItems.click(function (e) {
            e.preventDefault();
            var $target = $($(this).attr('href')),
                $item = $(this);

            if (!$item.hasClass('disabled')) {
                navListItems.removeClass('btn-success').addClass('btn-default');
                $item.addClass('btn-success');
                allWells.hide();
                $target.show();
                $target.find('input:eq(0)').focus();
            }
        });

        allNextBtn.click(function () {
            var curStep = $(this).closest(".setup-content"),
                curStepBtn = curStep.attr("id"),
                nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
                curInputs = curStep.find("input[type='text'],input[type='url']"),
                isValid = true;

            $(".form-group").removeClass("has-error");
            for (var i = 0; i < curInputs.length; i++) {
                if (!curInputs[i].validity.valid) {
                    isValid = false;
                    $(curInputs[i]).closest(".form-group").addClass("has-error");
                }
            }

            if (isValid) nextStepWizard.removeAttr('disabled').trigger('click');
        });

        $('div.setup-panel div a.btn-success').trigger('click');
    });
</script>

<script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>

<script>

    //    code for dynamic fields ciriminal record expander with plus button add more fields
    $('#add-offence').click(function () {
        $('#offence-details').append('<tr>'
            + '<td > <input type="text" name="consent_offence[]" class="form-control"/> </td>'
            + '<td > <input type="text" name="consent_offence_date[]" class="form-control"/> </td>'
            + '<td > <input type="text" name="consent_offence_court[]" class="form-control"/> </td>'
            + '<td > <input type="text" name="type_of_fine[]" class="form-control"/> </td>'


            + '<td align="center">  <input type="radio" value="Yes" name="consent_paid[2]"/> Yes <input type="radio" value="No" name="consent_paid[2]"/> No </td>'

            + '</tr>');
    });
</script>



</html>
