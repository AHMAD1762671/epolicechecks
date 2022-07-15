
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



<!--    popup links-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

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

        .required_class:after {
            content:" *";
            color: red;
            font-size: 16px;
        }

        .col-xs-3 {
            width: 16%;
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
                <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
            </div>
            <div class="stepwizard-step col-xs-3" data-toggle="tooltip" data-placement="top" title="Applicant Information">
                <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
            </div>
            <div class="stepwizard-step col-xs-3" data-toggle="tooltip" data-placement="top" title="Applicant Information">
                <a href="#step-4" type="button" class="btn btn-default btn-circle" disabled="disabled">4</a>
            </div>


            <div class="stepwizard-step col-xs-3" data-toggle="tooltip" data-placement="top" title="Signature">
                <a href="" type="button" class="btn btn-default btn-circle" disabled="disabled" >5</a>
            </div>


            <div class="stepwizard-step col-xs-3" data-toggle="tooltip" data-placement="top" title="Signature">
                <a href="" type="button" class="btn btn-default btn-circle" disabled="disabled" >6</a>
            </div>

        </div>
    </div>


    <br/>




    <form role="form">

        <!--        step1 -->

        <div class="panel panel-primary setup-content" id="step-1">

            <div class="progress">
                <div class="progress-bar progress-bar-striped bg-success active" role="progressbar" style="width: 20%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
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
                <div class="progress-bar progress-bar-striped bg-success active" role="progressbar" style="width: 40%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
            </div>

            <div class="panel-heading">
                <h3 class="panel-title">Select Fingerprint Agency</h3>
            </div>
            <div class="panel-body gray_background">

                <div class="row">
                    <div class="col-sm-5" style="border-right: 1px solid #c1d72f;">

                        <img src="<?= base_url('site-assets') ?>/images/shop.png" class="mb-2 " style="height: 160px;width: 160px;margin-left: 31%;">

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

                                    <option>Alberta</option>
                                    <option></option>
                                    <option></option>
                                    <option></option>
                                    <option></option>
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
                                <select class="form-control" name="type_val[]" id="type_val" onchange="openPopup()">
                                    <option value="">Select Address</option>
                                    <option value="1">Single</option>
                                    <option value="2">Double</option>
                                    <option value="3" data-toggle="modal" data-target="#myModal">Others</option>
                                </select>
                            </div>
                        </div>
                        </br>
                    </div>
                </div>

                <div class="container">
<!--                    <h2>Modal Example</h2>-->
                    <!-- Trigger the modal with a button -->
<!--                    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>-->

                    <!-- Modal -->
                    <div class="modal fade" id="myModal" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Modal Header</h4>
                                </div>
                                <div class="modal-body">
                                    <p>Some text in the modal.</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>












                <div class="stepwizard-row setup-panel">
                    <div class="stepwizard-step col-xs-3" style="margin-left:900px; width: 2%;" data-toggle="tooltip" data-placement="top" title="" data-original-title="Consent to Disclosure of Criminal Record and Personal Information Release">
                        <a href="#step-1" type="button" style="width: 90px;" class="btn btn-primary next_button_custom_css mobile_setting_next_button btn-default">Back</a>
                    </div>


                    <button class="btn btn-success nextBtn pull-right next_button_custom_css mobile_setting_next_button" style="width: 90px;" type="button">Next</button>
                </div>

            </div>
        </div>




<!--        step 3-->
        <div class="panel panel-primary setup-content" id="step-3">

            <div class="progress">
                <div class="progress-bar progress-bar-striped bg-success active" role="progressbar" style="width: 60%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
            </div>

            <div class="panel-heading">
                <h3 class="panel-title">Applicant Information</h3>
            </div>
            <div class="panel-body gray_background">


                <div class="row" style="padding-left: 15px; padding-right: 15px; margin-right: 15px; margin-left: 15px;">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <label> First Name: <span class="required_class"> </span></label>
                        <div class="form-group">
                        <input required="" type="text" name="consent_last_name"class="form-control input"/>
                            </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <label>  Middle Name: </label>
                        <input required="" type="text" name="consent_first_name"class="form-control input"/>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <label>  Last Name:  <span class="required_class"> </span></label>
                        <div class="form-group">
                        <input type="text" name="consent_middle_name" required class="form-control input"/>
                            </div>
                    </div>
                </div>
                <br/>



                <div class="row" style="padding-left: 15px; padding-right: 15px; margin-right: 15px; margin-left: 15px;">
                    <div class="col-lg-4 col-md-4 col-sm-8 col-xs-12">
                        <label> Maiden/Alias/Nickname: </label>
                        <input required="" type="text" name="consent_last_name"class="form-control input"/>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <label>  Date of Birth: (YYYY/MM/DD) <span class="required_class"> </span></label>
                        <div class="form-group">
                        <input required="" type="text" name="consent_first_name"class="form-control input"/>
                            </div>
                    </div>

                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <label>  Email:  </label>
                        <input type="text" name="consent_middle_name" class="form-control input"/>
                    </div>
                </div>
                <br/>


                <div class="row" style="padding-left: 15px; padding-right: 15px; margin-right: 15px; margin-left: 15px;">
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <label> Street Address: <span class="required_class"> </span></label>
                        <div class="form-group">
                            <input required="" type="text" name="consent_last_name"class="form-control input"/>
                        </div>
                    </div>



                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <label>City:<span class="required_class"> </span></label>
                        <div class="form-group">
                            <input required="" type="text" name="consent_current_city" class="form-control input"/>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <label>Province:<span class="required_class"> </span></label>
                        <div class="form-group">
                            <input required="" type="text" name="consent_current_state" class="form-control input"/>
                        </div>
                    </div>


                </div>
                <br/>

                <div class="row" style="padding-left: 15px; padding-right: 15px; margin-right: 15px; margin-left: 15px;">

                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <label>Postal Code:<span class="required_class"> </span></label>
                        <div class="form-group">
                            <input required="" type="text" name="consent_current_post_code" class="form-control input"/>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <label> Tel: <span class="required_class"> </span></label>
                        <div class="form-group">
                        <input required="" type="text" name="consent_last_name"class="form-control input"/>
                            </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <label>  Cell: </label>
                        <input required="" type="text" name="consent_first_name"class="form-control input"/>
                    </div>

                </div>
                <br/>

                <br/>



                <div class="stepwizard-row setup-panel">
                    <div class="stepwizard-step col-xs-3" style="margin-left:900px; width: 2%;" data-toggle="tooltip" data-placement="top" title="" data-original-title="Consent to Disclosure of Criminal Record and Personal Information Release">
                        <a href="#step-2" type="button" style="width: 90px;" class="btn btn-primary next_button_custom_css mobile_setting_next_button btn-default">Back</a>
                    </div>


                    <button class="btn btn-success nextBtn pull-right next_button_custom_css mobile_setting_next_button" style="width: 90px;" type="button">Next</button>


<!--                    <button class="btn btn-success nextBtn pull-right next_button_custom_css mobile_setting_next_button" style="width: 90px;" type="button">Next</button>-->
                </div>

<!--                <button class="btn btn-primary nextBtn pull-right next_button_custom_css mobile_setting_next_button" type="button">Next</button>-->
            </div>
        </div>










<!--        step 4-->

        <div class="panel panel-primary setup-content" id="step-4">

            <div class="progress">
                <div class="progress-bar progress-bar-striped bg-success active" role="progressbar" style="width: 80%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
            </div>


            <div class="panel-heading">
                <h3 class="panel-title">Delivery Information</h3>
            </div>
            <div class="panel-body gray_background">


<!--                <div class="row" style="padding-left: 15px; padding-right: 15px; margin-right: 15px; margin-left: 15px;">-->
<!--                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">-->
<!--                        <label> First Name: <span class="required_class"> </span></label>-->
<!--                        <div class="form-group">-->
<!--                            <input required="" type="text" name="consent_last_name"class="form-control input"/>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">-->
<!--                        <label>  Middle Name: </label>-->
<!--                        <input required="" type="text" name="consent_first_name"class="form-control input"/>-->
<!--                    </div>-->
<!--                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">-->
<!--                        <label>  Last Name:  <span class="required_class"> </span></label>-->
<!--                        <div class="form-group">-->
<!--                            <input type="text" name="consent_middle_name" required class="form-control input"/>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <br/>-->
<!---->
<!---->
<!---->
<!--                <div class="row" style="padding-left: 15px; padding-right: 15px; margin-right: 15px; margin-left: 15px;">-->
<!--                    <div class="col-lg-4 col-md-4 col-sm-8 col-xs-12">-->
<!--                        <label> Maiden/Alias/Nickname: </label>-->
<!--                        <input required="" type="text" name="consent_last_name"class="form-control input"/>-->
<!--                    </div>-->
<!--                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">-->
<!--                        <label>  Date of Birth: (YYYY/MM/DD) <span class="required_class"> </span></label>-->
<!--                        <div class="form-group">-->
<!--                            <input required="" type="text" name="consent_first_name"class="form-control input"/>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <br/>-->
<!---->
<!---->
<!--                <div class="row" style="padding-left: 15px; padding-right: 15px; margin-right: 15px; margin-left: 15px;">-->
<!--                    <div class="col-lg-12 col-md-4 col-sm-12 col-xs-12">-->
<!--                        <label> Current Address: <span class="required_class"> </span></label>-->
<!--                        <div class="form-group">-->
<!--                            <input required="" type="text" name="consent_last_name"class="form-control input"/>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <br/>-->
<!---->
<!--                <div class="row" style="padding-left: 15px; padding-right: 15px; margin-right: 15px; margin-left: 15px;">-->
<!--                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">-->
<!--                        <label> Tel: <span class="required_class"> </span></label>-->
<!--                        <div class="form-group">-->
<!--                            <input required="" type="text" name="consent_last_name"class="form-control input"/>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">-->
<!--                        <label>  Cell: </label>-->
<!--                        <input required="" type="text" name="consent_first_name"class="form-control input"/>-->
<!--                    </div>-->
<!--                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">-->
<!--                        <label>  Email:  </label>-->
<!--                        <input type="text" name="consent_middle_name" class="form-control input"/>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <br/>-->

                <div class="row" style="padding-left: 15px; padding-right: 15px; margin-right: 15px; margin-left: 15px;">
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <label> Fingerprinting Agency Address: </label>
                        <input required="" type="text" name="consent_last_name"class="form-control input"/>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <label>  Fingerprinting Agency Tel: </label>
                        <input required="" type="text" name="consent_first_name"class="form-control input"/>
                    </div>


                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <label> RCMP Application Type: </label>
                        <input required="" type="text" name="consent_last_name"class="form-control input"/>
                    </div>
                </div>
                <br/>

                <div class="row" style="padding-left: 15px; padding-right: 15px; margin-right: 15px; margin-left: 15px;">
                    <div class="col-lg-6 col-md-4 col-sm-6 col-xs-12 margin-ajdustment">

                        <label> Send Result To:<span class="required_class"> </span> </label> &nbsp; &nbsp;
                        <input required="" onclick="javascript:yesnoCheck();" id="home" type="radio" value="Male" name="consent_gender"/> Home &nbsp; &nbsp;
                        <input required="" onclick="javascript:yesnoCheck();" type="radio" value="Female" name="consent_gender"/> Third Party &nbsp; &nbsp;
                    </div>


                    <script>
                        function yesnoCheck() {
                            if (document.getElementById('home').checked) {
                                document.getElementById('home_address').style.display = 'block';
                                document.getElementById('third_party').style.display = 'none';
                            }
                            else{
                                document.getElementById('home_address').style.display = 'none';
                                document.getElementById('third_party').style.display = 'block';
                            }
                        }
                    </script>
                </div>

                <br/>
                <br/>


                <div class="row" id="third_party" style="display:none; padding-left: 15px; padding-right: 15px; margin-right: 15px; margin-left: 15px;">

                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 margin-ajdustment">
                        <label> Company/Individual Name: <span class="required_class"> </span></label>
                        <div class="form-group">
                            <input type="text" name="consent_last_name" class="form-control input"/>
                        </div>
                    </div>


                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 margin-ajdustment">
                        <label> Address: <span class="required_class"> </span></label>
                        <div class="form-group">
                            <input type="text" name="consent_last_name" class="form-control input"/>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <label>City:<span class="required_class"> </span></label>
                        <div class="form-group">
                            <input type="text" name="consent_current_city" class="form-control input"/>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <label>Province:<span class="required_class"> </span></label>
                        <div class="form-group">
                            <input type="text" name="consent_current_state" class="form-control input"/>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <label>Postal Code:<span class="required_class"> </span></label>
                        <div class="form-group">
                            <input type="text" name="consent_current_post_code" class="form-control input"/>
                        </div>
                    </div>
                </div>









                <div class="row" id="home_address" style="display:none; padding-left: 15px; padding-right: 15px; margin-right: 15px; margin-left: 15px;">
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 margin-ajdustment">
                        <label> Street Address: <span class="required_class"> </span></label>
                        <div class="form-group">
                            <input required="" type="text" name="consent_last_name" class="form-control input"/>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <label>City:<span class="required_class"> </span></label>
                        <div class="form-group">
                            <input required="" type="text" name="consent_current_city" class="form-control input"/>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <label>Province:<span class="required_class"> </span></label>
                        <div class="form-group">
                            <input required="" type="text" name="consent_current_state" class="form-control input"/>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <label>Postal Code:<span class="required_class"> </span></label>
                        <div class="form-group">
                            <input required="" type="text" name="consent_current_post_code" class="form-control input"/>
                        </div>
                    </div>

                </div>






<!--                <div class="col-md-12 form-group mb-3" id="agent_of" style="display:none">-->
<!--                    <label>Corporate Email</label>-->
<!---->
<!--                </div>-->
                <br/>




                <div class="stepwizard-row setup-panel">
                    <div class="stepwizard-step col-xs-3" style="margin-left:900px; width: 2%;" data-toggle="tooltip" data-placement="top" title="" data-original-title="Consent to Disclosure of Criminal Record and Personal Information Release">
                        <a href="#step-3" type="button" style="width: 90px;" class="btn btn-primary next_button_custom_css mobile_setting_next_button btn-default">Back</a>
                    </div>


                    <a href="<?php echo base_url('user/digital_fingerprinting_signature') ?>">
                        <button class="btn btn-success pull-right next_button_custom_css mobile_setting_next_button" style="width: 90px;" type="button">Next</button>
                    </a>
<!--                    <button class="btn btn-success pull-right next_button_custom_css mobile_setting_next_button" style="width: 90px;" type="submit">Pay Now</button>-->

                </div>

            </div>


















        </div>





    </form>
</div>













</body>

<!--files for the signature module-->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.5.0-beta4/html2canvas.min.js"></script>

<!--<script src="--><?php //echo base_url('site-assets') ?><!--/step_form_files/jquery-3.3.1.min.js"></script>-->
<!--<script src="--><?php //echo base_url('site-assets') ?><!--/step_form_files/popper.min.js"></script>-->
<!--<script src="--><?php //echo base_url('site-assets') ?><!--/step_form_files/bootstrap.min.js"></script>-->
<!--<script src="--><?php //echo base_url('site-assets') ?><!--/step_form_files/slick.min.js"></script>-->
<!--<script src="--><?php //echo base_url('site-assets') ?><!--/step_form_files/main.js"></script>-->
<!--<script src="--><?php //echo base_url('site-assets') ?><!--/step_form_files/switch.js"></script>-->

<!--script for pricing-->
<script>
    $(document).ready(function () {
        $('.services_prices').change(function () {
            pricings();
        });
        $('#state_id').change(function () {
            pricings();
        });
        $('.delivery_method').change(function () {
            pricings();
        });
    });

    function pricings() {
        var subtotal = 0;
        var total = 0;
        var tax_rate = 0;
        tax_rate = parseInt($('#state_id').find(":selected").attr('data-tax'));
        var tax = 0;
        var delivery_fee = 0;
        delivery_fee = parseInt($("input[name=delivery_method]:checked").attr('data-price'));
        $('#delivery_method_price').val(delivery_fee);
        $('input:checkbox.services_prices:checked').each(function () {
            var service_price = $(this).closest('.row').find('strong>span').text();
            subtotal = subtotal + parseInt(service_price);
        });
        if (isNaN(delivery_fee)) {

        } else {
            subtotal = subtotal + delivery_fee;
        }
        if (isNaN(tax_rate)) {

        } else {
            tax = Math.ceil(((subtotal / 100) * tax_rate));
        }
        total = subtotal + tax;
        $('#total_sub').text(subtotal);
        $('#sub_total').val(subtotal);
        $('#total_tax').text(tax);
        $('#tax').val(tax);
        $('#total_grand').text(total);
        $('#grand_total').val(total);
    }
</script>

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

//            alert('hie');
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



<!--js for the signature module-->
<script>
    $(document).ready(() => {
        var canvasDiv = document.getElementById('canvasDiv');
    var canvas = document.createElement('canvas');
    canvas.setAttribute('id', 'canvas');
    canvasDiv.appendChild(canvas);
    $("#canvas").attr('height', $("#canvasDiv").outerHeight());
    $("#canvas").attr('width', $("#canvasDiv").width());
    if (typeof G_vmlCanvasManager != 'undefined') {
        canvas = G_vmlCanvasManager.initElement(canvas);
    }

    context = canvas.getContext("2d");
    $('#canvas').mousedown(function(e) {
        var offset = $(this).offset()
        var mouseX = e.pageX - this.offsetLeft;
        var mouseY = e.pageY - this.offsetTop;

        paint = true;
        addClick(e.pageX - offset.left, e.pageY - offset.top);
        redraw();
    });

    $('#canvas').mousemove(function(e) {
        if (paint) {
            var offset = $(this).offset()
            //addClick(e.pageX - this.offsetLeft, e.pageY - this.offsetTop, true);
            addClick(e.pageX - offset.left, e.pageY - offset.top, true);
            console.log(e.pageX, offset.left, e.pageY, offset.top);
            redraw();
        }
    });

    $('#canvas').mouseup(function(e) {
        paint = false;
    });

    $('#canvas').mouseleave(function(e) {
        paint = false;
    });

    var clickX = new Array();
    var clickY = new Array();
    var clickDrag = new Array();
    var paint;

    function addClick(x, y, dragging) {
        clickX.push(x);
        clickY.push(y);
        clickDrag.push(dragging);
    }

    $("#reset-btn").click(function() {
        context.clearRect(0, 0, window.innerWidth, window.innerWidth);
        clickX = [];
        clickY = [];
        clickDrag = [];
    });

    $(document).on('click', '#btn-save', function() {
        var mycanvas = document.getElementById('canvas');
        var img = mycanvas.toDataURL("image/png");
        anchor = $("#signature");
        anchor.val(img);
        $("#signatureform").submit();
    });

    var drawing = false;
    var mousePos = {
        x: 0,
        y: 0
    };
    var lastPos = mousePos;

    canvas.addEventListener("touchstart", function(e) {
        mousePos = getTouchPos(canvas, e);
        var touch = e.touches[0];
        var mouseEvent = new MouseEvent("mousedown", {
            clientX: touch.clientX,
            clientY: touch.clientY
        });
        canvas.dispatchEvent(mouseEvent);
    }, false);


    canvas.addEventListener("touchend", function(e) {
        var mouseEvent = new MouseEvent("mouseup", {});
        canvas.dispatchEvent(mouseEvent);
    }, false);


    canvas.addEventListener("touchmove", function(e) {

        var touch = e.touches[0];
        var offset = $('#canvas').offset();
        var mouseEvent = new MouseEvent("mousemove", {
            clientX: touch.clientX,
            clientY: touch.clientY
        });
        canvas.dispatchEvent(mouseEvent);
    }, false);



    // Get the position of a touch relative to the canvas
    function getTouchPos(canvasDiv, touchEvent) {
        var rect = canvasDiv.getBoundingClientRect();
        return {
            x: touchEvent.touches[0].clientX - rect.left,
            y: touchEvent.touches[0].clientY - rect.top
        };
    }

    var elem = document.getElementById("canvas");

    var defaultPrevent = function(e) {
        e.preventDefault();
    }
    elem.addEventListener("touchstart", defaultPrevent);
    elem.addEventListener("touchmove", defaultPrevent);

    function redraw() {
        lastPos = mousePos;
        for (var i = 0; i < clickX.length; i++) {
            context.beginPath();
            if (clickDrag[i] && i) {
                context.moveTo(clickX[i - 1], clickY[i - 1]);
            } else {
                context.moveTo(clickX[i] - 1, clickY[i]);
            }
            context.lineTo(clickX[i], clickY[i]);
            context.closePath();
            context.stroke();
        }
    }
    });

</script>

<script>
    function openPopup() {
        alert('some Information');
        $("#myModal").modal();
    }
</script>


</html>
