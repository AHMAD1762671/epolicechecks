
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">

<head>

    <meta content="width=device-width, initial-scale=1" name="viewport" />

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>-->
    <!--    <script src="https://cdn.jsdelivr.net/momentjs/2.14.1/moment.min.js"></script>-->
    <!--    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>-->
    <!--    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">



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



        small {
            color: #ffffff;
        }
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
            padding-top: 50px;
        }


        /*query for step form header box small to adjust more elements*/
        @media (min-width:1281px) {
            .col-xs-3 {
                width: 25%;
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
        div#step-3 {
            border: none;
        }
        div#step-4 {
            border: none;
        }

        .panel-body.gray_background{
            border: 1px solid #13375c;
        }



        /*next button color change*/
        button.btn.btn-primary.nextBtn.pull-right.next_button_custom_css {
            background: #13375c;
        }
    </style>


    <!--    custom css for version changes-->
    <style>
        p {
            font-size: 16px;
        }
        h5 {
            font-size: 20px;
            font-family: 'Oswald', sans-serif;
            color: #263EA5;
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

        .mobile_setting_next_button{
            width: 10%;
        }

        .margin-onlaptop{
            margin-top: 56px !important;
        }

        .margin-adjustment{
            padding:10px;
            margin-left: 15px;
            margin-right: 15px;
        }


        /*@media only screen and (min-width: 200px) and (max-width: 767px)  {*/
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
                width: 25%;
            }

            .col-md-6.col-lg-6.col-sm-6.col-xs-12 {
                padding-left: 10px;
            }

            .margin_top_mobile{
                margin-top: 5%;
            }
            .margin-onlaptop {
                margin-top: 45px !important;
            }

            .logo-big-on-mobile {
                width: 120px !important;
                max-width: none;
            }

            label {
                display: contents;
            }

            .margin-adjustment{
                padding: 0px !important;
                margin-left: 0px !important;
                margin-right: 0px !important;
            }

            .mobile_visibility {
                display: flex !important;
                flex-wrap: nowrap !important;
            }

        }



    </style>


    <!--    css for the signature module-->
    <!--    css for the signature module-->

    <style>
        .nav-tabs > li a {
            margin: 36px 23px !important;
            width: 100px !important;
        }

        @media (min-width: 992px)
            .col-md-offset-2 {
                margin-left: 5.5% !important;
            }

    </style>

    <style>
        .nav-tabs > li a {
            margin: 36px 23px !important;
            width: 100px !important;
        }

        @media (min-width: 992px){
            .col-md-offset-2 {
                margin-left: 5.5% !important;
            } }
        .tab-pane {
            padding-top: 0px !important;
        }
        .board {
            margin-top: 0px !important;
        }

        .breadcrumb {
            display: none;
        }

    </style>

    <style>


        #canvasDiv{
            position: relative;
            border: 2px dashed grey;
            height:300px;
            width: 740px;
        }

        @media screen and (max-width: 767px)  {
            #canvasDiv{
                position: relative;
                border: 2px dashed grey;
                height:300px;
                width: 300px;
            }
        }


    </style>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <style>
        .panel-primary>.panel-heading {
            background-color: #13375c;
        }

        .btn-primary {
            background-color: #13375c;
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
            <div class="stepwizard-step col-xs-3" data-toggle="tooltip" data-placement="top" title="Select one or more of the following option(s):">
                <a href="#step-1" type="button" class="btn btn-success btn-circle">1</a>
                <!--                <p><small>Shipper</small></p>-->
            </div>
            <div class="stepwizard-step col-xs-3" data-toggle="tooltip" data-placement="top" title="Select Fingerprint Agency">
                <a href="#step-2" type="button" class="btn btn-default btn-circle">2</a>
                <!--                <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>-->
                <!--                <p><small>Destination</small></p>-->
            </div>
            <div class="stepwizard-step col-xs-3" data-toggle="tooltip" data-placement="top" title="Applicant Information">
                <a href="#step-3" type="button" class="btn btn-default btn-circle">3</a>
                <!--                <p><small>Schedule</small></p>-->
            </div>
                        <div class="stepwizard-step col-xs-3" data-toggle="tooltip" data-placement="top" title="Signature">
                            <a href="#step-4" type="button" class="btn btn-default btn-circle">4</a>
                            <p><small>Cargo</small></p>
                        </div>


        </div>
    </div>


    <br/>




    <form role="form">

        <!--        step1 -->

        <div class="panel panel-primary setup-content" id="step-1">

            <div class="progress">
                <div class="progress-bar progress-bar-striped bg-success active" role="progressbar" style="width: 33%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
            </div>

            <div class="panel-heading">
                <h3 class="panel-title"> <b>Select one of the following</b> </h3>
            </div>
            <div class="panel-body gray_background margin-top-adjustment">

                <div class="row" style="margin-bottom: 20px;">
                    <div class="col-sm-1">

                    </div>
                    <div class="col-sm-10 text-dark  bg-white abc" style="border: 1px solid #d1d4db; border-bottom: 4px solid #c1d72f;">
                        <div class="row">
                            <div class="col-sm-5" style="border-right: 1px solid #c1d72f;">

                                <!--                                <h6 style="margin-top: 150px;">   Digital Fingerprints</h6>-->
                                <h3 style="text-align: center;">   Digital Fingerprints</h3>
                                <br/>
                                <img src="<?= base_url('site-assets') ?>/images/2.png" class="mb-2 " style="height: 139px;width: 123px;margin-left: 35%;">
                                <!--                                <img src="--><?//= base_url('site-assets') ?><!--/images/2.png" class="mb-2 " style="height: 139px; width: 123px; margin-top: 100px; float: left; ">-->

                            </div>
                            <div class="col-sm-7">
                                <p>
                                    <?php foreach ($options as $value) { ?>
                                        <input type="checkbox" name="digital_fingerprinting_options[]" value="<?= $value->digital_fingerprinting_option ?>">  <?= $value->digital_fingerprinting_option ?> <br>
                                    <?php } ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <button class="btn btn-primary nextBtn pull-right next_button_custom_css mobile_setting_next_button"  type="button">Next</button>




            </div>
        </div>



        <!--        step 2-->


        <div class="panel panel-primary setup-content" id="step-2">

            <div class="progress">
                <div class="progress-bar progress-bar-striped bg-success active" role="progressbar" style="width: 66%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
            </div>

            <div class="panel-heading">
                <h3 class="panel-title">Select Fingerprint Agency</h3>
            </div>
            <div class="panel-body gray_background">

                <div class="row">
                    <div class="col-sm-5" style="border-right: 1px solid #c1d72f;">

                        <img src="<?= base_url('site-assets') ?>/images/fingerprint_location.png" class="mb-2 " style="height: 139px;width: 123px;margin-left: 35%;">

                        <br/>
                    </div>
                    <div class="col-sm-7" style="margin-top: 30px;">
                        <div class="row" style="margin-bottom:5px;">
                            <div class="col-6">
                                <label>Select Province</label>
                            </div>
                            <div class="col-6">
                                <select class="form-control" required="" id="states" name="agency_state">
                                    <option selected disabled="" value="">Select Province</option>
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="row" style="margin-bottom:5px;">
                            <div class="col-6">
                                <label>Select City</label>
                            </div>
                            <div class="col-6">
                                <select class="form-control" id="cities" name="agency_city" required="">
                                    <option value="">Select City</option>
                                </select>
                            </div>
                        </div>
                        <div class="row" style="margin-bottom:5px;">
                            <div class="col-6">
                                <label>Select Address</label>
                            </div>
                            <div class="col-6">
                                <select class="form-control" id="agency_address" name="agency_address" required="">
                                    <option value="">Select Address</option>
                                </select>
                            </div>
                        </div>

                        <hr/>


                        <!--                        appointment date-->
                        <div class="row" style="margin-bottom:5px;">
                            <div class="col-6">
                                <label>Select Appointment Date & Time</label>
                            </div>
                            <!--                            <div class="col-6">-->
                            <!--                                <select class="form-control" id="agency_address" name="agency_address" required="">-->
                            <!--                                    <option value="">Select Address</option>-->
                            <!--                                </select>-->
                            <!--                            </div>-->



                            <div class='col-md-6'>
                                <div class="form-group">
                                    <label class="control-label">Appointment Time</label>
                                    <div class='input-group date' id='datetimepicker1'>
                                        <input type='text' class="form-control" />
                                         <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                         </span>
                                    </div>
                                </div>
                            </div>






                        </div>

                        </br>
                    </div>
                </div>


                <button class="btn btn-primary nextBtn pull-right next_button_custom_css mobile_setting_next_button"  type="button">Next</button>
            </div>
        </div>




        <!--        step 3-->
        <div class="panel panel-primary setup-content" id="step-3">

            <div class="progress">
                <div class="progress-bar progress-bar-striped bg-success active" role="progressbar" style="width: 99%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
            </div>

            <div class="panel-heading">
                <h3 class="panel-title">Applicant Information</h3>
            </div>
            <div class="panel-body gray_background">


                <div class="row" style="padding-left: 15px; padding-right: 15px; margin-right: 15px; margin-left: 15px;">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <label> First Name: </label>
                        <input required="" type="text" name="consent_last_name"class="form-control input"/>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <label>  Middle Name: </label>
                        <input required="" type="text" name="consent_first_name"class="form-control input"/>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <label>  Last Name:  </label>
                        <input type="text" name="consent_middle_name" class="form-control input"/>
                    </div>
                </div>
                <br/>



                <div class="row" style="padding-left: 15px; padding-right: 15px; margin-right: 15px; margin-left: 15px;">
                    <div class="col-lg-4 col-md-4 col-sm-8 col-xs-12">
                        <label> Maiden/Alias/Nickname: </label>
                        <input required="" type="text" name="consent_last_name"class="form-control input"/>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <label>  Date of Birth: (YYYY/MM/DD) </label>
                        <input required="" type="text" name="consent_first_name"class="form-control input"/>
                    </div>
                </div>
                <br/>


                <div class="row" style="padding-left: 15px; padding-right: 15px; margin-right: 15px; margin-left: 15px;">
                    <div class="col-lg-12 col-md-4 col-sm-12 col-xs-12">
                        <label> Current Address: </label>
                        <input required="" type="text" name="consent_last_name"class="form-control input"/>
                    </div>
                </div>
                <br/>

                <div class="row" style="padding-left: 15px; padding-right: 15px; margin-right: 15px; margin-left: 15px;">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <label> Tell: </label>
                        <input required="" type="text" name="consent_last_name"class="form-control input"/>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <label>  Cell: </label>
                        <input required="" type="text" name="consent_first_name"class="form-control input"/>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <label>  Email:  </label>
                        <input type="text" name="consent_middle_name" class="form-control input"/>
                    </div>
                </div>
                <br/>

                <div class="row" style="padding-left: 15px; padding-right: 15px; margin-right: 15px; margin-left: 15px;">
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <label> Fingerprinting Agency Address: </label>
                        <input required="" type="text" name="consent_last_name"class="form-control input"/>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <label>  Fingerprinting Agency Tel: </label>
                        <input required="" type="text" name="consent_first_name"class="form-control input"/>
                    </div>
                </div>
                <br/>

                <div class="row" style="padding-left: 15px; padding-right: 15px; margin-right: 15px; margin-left: 15px;">
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <label> RCMP Application Type: </label>
                        <input required="" type="text" name="consent_last_name"class="form-control input"/>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <label>  Send Result To:  </label>
                        <input required="" type="text" name="consent_first_name"class="form-control input"/>
                    </div>
                </div>
                <br/>





                <button class="btn btn-primary nextBtn pull-right next_button_custom_css mobile_setting_next_button" type="button">Next</button>
            </div>
        </div>





<!--        here is step 4-->

        <div class="panel panel-primary setup-content" id="step-4">

            <div class="progress">
                <div class="progress-bar progress-bar-striped bg-success active" role="progressbar" style="width: 99%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
            </div>

            <div class="panel-heading">
                <h3 class="panel-title">Select Fingerprint Agency</h3>
            </div>
            <div class="panel-body gray_background">

                <div class="row" style="padding-left: 15px; padding-right: 15px; margin-right: 15px; margin-left: 15px;">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

                        <input type="checkbox" value="" class="">
                        <label>Federal Employment :</label>

                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <label>  Employer Name: : </label>
                        <input required="" type="text" name="consent_first_name" class="form-control input"/>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <label>  Job Title:  </label>
                        <input type="text" name="consent_middle_name" class="form-control input"/>
                    </div>
                </div>


                <div class="row" style="padding-left: 15px; padding-right: 15px; margin-right: 15px; margin-left: 15px;">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

                        <input type="checkbox" value="" class="">
                        <label>Provincial Employment :</label>

                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <label>  Employer Name: : </label>
                        <input required="" type="text" name="consent_first_name" class="form-control input"/>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <label>  Job Title:  </label>
                        <input type="text" name="consent_middle_name" class="form-control input"/>
                    </div>
                </div>


                <div class="row" style="padding-left: 15px; padding-right: 15px; margin-right: 15px; margin-left: 15px;">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <input type="checkbox" value="" class="">
                        <label>Private Industry :</label>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <label>  Company Name: : </label>
                        <input required="" type="text" name="consent_first_name" class="form-control input"/>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <label>  Position:  </label>
                        <input type="text" name="consent_middle_name" class="form-control input"/>
                    </div>
                </div>



                <div class="row" style="padding-left: 15px; padding-right: 15px; margin-right: 15px; margin-left: 15px;">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

                        <input type="checkbox" value="" class="">
                        <label>Citizenship :</label>

                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <label>  IRCC File No : </label>
                        <input required="" type="text" name="consent_first_name" class="form-control input"/>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <label>  UCI:  </label>
                        <input type="text" name="consent_middle_name" class="form-control input"/>
                    </div>
                </div>




                <div class="row" style="padding-left: 15px; padding-right: 15px; margin-right: 15px; margin-left: 15px;">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <input type="checkbox" value="" class="">
                        <label>Permanent Residency :</label>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-4 col-xs-12">
                        <label>  Vulnerable Sector : </label>
                        <input required="" type="checkbox" name="consent_first_name" class="form-control input"/>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-4 col-xs-12">
                        <label>  Volunteer Work:  </label>
                        <input type="checkbox" name="consent_middle_name" class="form-control input"/>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-4 col-xs-12">
                        <label>  Adoption:  </label>
                        <input type="checkbox" name="consent_middle_name" class="form-control input"/>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-4 col-xs-12">
                        <label>  FBI:  </label>
                        <input type="checkbox" name="consent_middle_name" class="form-control input"/>
                    </div>
                </div>



                <div class="row" style="padding-left: 15px; padding-right: 15px; margin-right: 15px; margin-left: 15px;">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

                        <input type="checkbox" value="" class="">
                        <label>Record Suspension :</label>

                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-4 col-xs-12">
                        <label>  U.S. Entry Waiver/Travel/Visa : </label>
                        <input required="" type="checkbox" name="consent_first_name" class="form-control input"/>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-4 col-xs-12">
                        <label>  Name Change:  </label>
                        <input type="checkbox" name="consent_middle_name" class="form-control input"/>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-4 col-xs-12">
                        <label>  Other:  </label>
                        <input type="checkbox" name="consent_middle_name" class="form-control input"/>
                    </div>
                </div>




                <br/>




                <button class="btn btn-primary nextBtn pull-right next_button_custom_css mobile_setting_next_button" type="button">Submit</button>
            </div>
        </div>

    </form>
</div>













</body>



<script>
    $(function () {
        $('#datetimepicker1').datetimepicker();
    });



</script>


<!--for appointment-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/momentjs/2.14.1/moment.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>


<!--files for the signature module-->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.5.0-beta4/html2canvas.min.js"></script>

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



</html>
