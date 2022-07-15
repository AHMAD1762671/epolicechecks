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


    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

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
        /*.btn-circle {*/
        /*width: 30px;*/
        /*height: 30px;*/
        /*text-align: center;*/
        /*padding: 6px 0;*/
        /*font-size: 12px;*/
        /*line-height: 1.428571429;*/
        /*border-radius: 15px;*/
        /*}*/
    </style>

    <link rel="stylesheet" href="<?= base_url('assets') ?>/styles/css/style.css">

    <style>
        .margin-top-adjustment{
            padding-top: 20px;
        }


        /*query for step form header box small to adjust more elements*/
        @media (min-width:1281px) {
            .col-xs-3 {
                width: 14%;
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

        @media (min-width: 1281px)
        {
            .col-xs-3 {
                width: 12% !important;
            }
        }

        .required_class:after {
            content:" *";
            color: red;
            font-size: 16px;
        }

    </style>




    <style>
        .has-error .form-control {
            border-color: red;
        }
        .has-error .help-block, .has-error .control-label, .has-error .radio, .has-error .checkbox, .has-error .radio-inline, .has-error .checkbox-inline, .has-error.radio label, .has-error.checkbox label, .has-error.radio-inline label, .has-error.checkbox-inline label {
            color: red;
        }
    </style>


<!--    for header circle-->

    <style>
    /*body {*/
    /*margin-top:30px;*/
    /*}*/
    /*.stepwizard-step p {*/
    /*margin-top: 0px;*/
    /*color:#666;*/
    /*}*/
    /*.stepwizard-row {*/
    /*display: table-row;*/
    /*}*/
    /*.stepwizard {*/
    /*display: table;*/
    /*width: 100%;*/
    /*position: relative;*/
    /*}*/
    /*.stepwizard-step button[disabled] {*/
    /*!*opacity: 1 !important;*/
    /*filter: alpha(opacity=100) !important;*!*/
    /*}*/
    /*.stepwizard .btn.disabled, .stepwizard .btn[disabled], .stepwizard fieldset[disabled] .btn {*/
    /*opacity:1 !important;*/
    /*color:#bbb;*/
    /*}*/
    /*.stepwizard-row:before {*/
    /*top: 14px;*/
    /*bottom: 0;*/
    /*position: absolute;*/
    /*content:" ";*/
    /*width: 100%;*/
    /*height: 1px;*/
    /*background-color: #ccc;*/
    /*z-index: 0;*/
    /*}*/
    /*.stepwizard-step {*/
    /*display: table-cell;*/
    /*text-align: center;*/
    /*position: relative;*/
    /*}*/
    /*.btn-circle {*/
    /*width: 30px;*/
    /*height: 30px;*/
    /*text-align: center;*/
    /*padding: 6px 0;*/
    /*font-size: 12px;*/
    /*line-height: 1.428571429;*/
    /*border-radius: 15px;*/
    /*}*/
    </style>
<!--    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>-->
<!--    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>-->
<!--    <script type="text/javascript">-->
<!--    window.alert = function(){};-->
<!--    var defaultCSS = document.getElementById('bootstrap-css');-->
<!--    function changeCSS(css){-->
<!--    if(css) $('head > link').filter(':first').replaceWith('<link rel="stylesheet" href="'+ css +'" type="text/css" />');-->
<!--        else $('head > link').filter(':first').replaceWith(defaultCSS);-->
<!--    }-->
<!--    $( document ).ready(function() {-->
<!--        var iframe_height = parseInt($('html').height());-->
<!--        window.parent.postMessage( iframe_height, 'https://bootsnipp.com');-->
<!--    });-->
<!--    </script>-->












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
                <a href="#step-5" type="button" class="btn btn-default btn-circle" disabled="disabled">1</a>
<!--                <p><small>Cargo</small></p>-->
            </div>
            <div class="stepwizard-step col-xs-3">
                <a href="#step-6" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
<!--                <p><small>Cargo</small></p>-->
            </div>
            <div class="stepwizard-step col-xs-3">
                <a href="#step-7" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
<!--                <p><small>Cargo</small></p>-->
            </div>


            <div class="stepwizard-step col-xs-3" data-toggle="tooltip" data-placement="top" title="Consent to Disclosure of Criminal Record and Personal Information Release">
                <a href="#step-1" type="button" class="btn btn-success btn-circle">4</a>
<!--                <p><small>Shipper</small></p>-->
            </div>
<!--            <div class="stepwizard-step col-xs-3" data-toggle="tooltip">-->
            <div class="stepwizard-step col-xs-3">
                <a href="#step-2" type="button" class="btn btn-default btn-circle" data-placement="top" disabled="disabled" title="Address">5</a>
<!--                <p><small>Address</small></p>-->
            </div>
            <div class="stepwizard-step col-xs-3">
<!--                <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled" title="Reason for Request">6</a>-->
                <a href="#step-3" type="button" class="btn btn-default btn-circle" data-placement="top" disabled="disabled" title="Reason for Request">6</a>
<!--                <p><small>Reason for Request</small></p>-->
            </div>
            <div class="stepwizard-step col-xs-3">
                <a href="#step-4" type="button" class="btn btn-default btn-circle" data-placement="top" disabled="disabled" title="Declaration of Criminal Record">7</a>
            </div>
            <div class="stepwizard-step col-xs-3">
                <a href="#step-4" type="button" class="btn btn-default btn-circle" data-placement="top" disabled="disabled" title="Declaration of Criminal Record">8</a>
            </div>




        </div>
    </div>


<br/>




    <form role="form">

        <!--        step1-->
        <div class="panel panel-primary setup-content" id="step-1">

            <div class="progress">
                <div class="progress-bar progress-bar-striped bg-success active" role="progressbar" style="width: 56%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
            </div>

            <div class="panel-heading">
                <h3 class="panel-title">Consent to Disclosure of Criminal Record and Personal Information Release</h3>
            </div>
            <div class="panel-body gray_background margin-top-adjustment">

<!--                step 1 body-->
                <div class="row" style="padding-left: 15px; padding-right: 15px; margin-right: 15px; margin-left: 15px;">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

                        <div class="form-group">
                            <label  class="control-label"> Last Name:<span class="required_class"> </span> </label>
                            <input required="" type="text" name="consent_last_name" value="abaidin" class="form-control"/>
                        </div>


                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

                        <div class="form-group">
                            <label class="control-label"> First Name:<span class="required_class"> </span> </label>

                            <input required="" type="text" name="consent_first_name" value="zain" class="form-control"/>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <label> Middle Name:  </label>
                        <input type="text" name="consent_middle_name" value="ul" class="form-control"/>
                    </div>
                </div>


                <div class="row" style="padding-left: 15px; padding-right: 15px; margin-right: 15px; margin-left: 15px;">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <label> Maiden/Alias/Nickname: </label>
                        <input type="text" name="consent_nickname" class="form-control"/>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 margin-ajdustment" style="padding-top: 25px;">

                        <div class="form-group">
                            <label class="control-label"> Gender:<span class="required_class"> </span> </label> &nbsp; &nbsp;
                            <input class="" placeholder="DOB" required type="radio" value="Male" name="consent_gender"/> Male &nbsp; &nbsp;
                            <input class="" placeholder="DOB" required type="radio" value="Female" name="consent_gender"/> Female &nbsp; &nbsp;
                            <input class="" placeholder="DOB" required type="radio" value="Unknown" name="consent_gender"/> Unknown &nbsp; &nbsp;
                        </div>
                    </div>
                </div>


                <div class="row" style="padding-left: 15px; padding-right: 15px; margin-right: 15px; margin-left: 15px;">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

                        <div class="form-group">
                            <label class="control-label"> Date of Birth:<span class="required_class"> </span> </label>
                            <input required type="date" name="consent_dob" placeholder="DOB" class="form-control"/>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

                        <div class="form-group">
                            <label class="control-label"> Place of Birth: <span class="required_class"> </span></label>
                            <input required="required" type="text" name="consent_birth_place" placeholder="City/Town, Province/State" class="form-control"/>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

                        <div class="form-group">
                            <label class="control-label"> Country of Birth:<span class="required_class"> </span> </label>
                            <select name="consent_country" required="required" class="form-control">
                                <option selected=""> ---Select Your Country--- </option>
                                <option> Australia </option>
                                <option> Canada </option>
                                <option> Italy </option>
                                <option> Germany </option>
                                <option> Pakistan </option>
                                <option> England </option>
                            </select>
                        </div>
                    </div>
                </div>


                <div class="row" style="padding-left: 15px; padding-right: 15px; margin-right: 15px; margin-left: 15px;">
                    <div class="col-lg-4  col-md-4  col-sm-4 col-xs-12">
                        <div class="form-group">
                        <label class="control-label">Telephone:<span class="required_class"> </span></label>

                            <input required="" value="03246337362" type="number" name="consent_phone" class="form-control input"/>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <label>Cel:</label>
<!--                        <div class="form-group">-->
                        <input type="text" value="03246337362" name="consent_cellphone" required="required" class="form-control"/>
<!--                            </div>-->
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <label>Email:</label>
                        <input required="" value="zainulabaidinz@gmail.com" type="email" name="consent_email" class="form-control input" disabled/>
                    </div>
                </div>

<!--                <br/>-->

                <button class="btn btn-primary nextBtn pull-right" type="button">Next</button>
<!--                <button class="btn btn-primary nextBtn pull-right next_button_custom_css mobile_setting_next_button nextBtn" type="button">Next</button>-->
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

                <br/>
<!--                step 2 body-->
                <div class="row" style="padding-left: 15px; padding-right: 15px; margin-right: 15px; margin-left: 15px;">
                    <div class="col-lg-12 col-md-12 mobile-margin-bottom">
                        <label>Street address:<span class="required_class"> </span></label>
                        <div class="form-group">
                        <input required="" type="text" value="House no. 15, Street no. 02, Zaman park sanda kalan Lahore" name="consent_current_address" class="form-control input"/>
                        </div>
                    </div>
                </div>

<!--                <br/>-->
<!--                <br/>-->

                <div class="row" style="padding-left: 15px; padding-right: 15px; margin-right: 15px; margin-left: 15px;">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <label>City:<span class="required_class"> </span></label>
                        <div class="form-group">
                        <input required="" type="text" value="Lahore" name="consent_current_city" class="form-control input"/>
                            </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <label>Province:<span class="required_class"> </span></label>
                        <div class="form-group">
                        <input required="" type="text" value="Punjab" name="consent_current_state" class="form-control input"/>
                            </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <label>Postal Code:<span class="required_class"> </span></label>
                        <div class="form-group">
                        <input required="" type="text" value="Canada" name="consent_current_post_code" class="form-control input"/>
                            </div>
                    </div>
                </div>

<!--                <br/>-->
<!--                <br/>-->

                <div class="row" style="padding-left: 15px; padding-right: 15px; margin-right: 15px; margin-left: 15px;">
                    <div class="col-lg-12 col-md-12">
                        <label>Previous Address, if less than 5 years: </label>
                        <input type="text" name="consent_previous_address" class="form-control input"/>
                    </div>
                </div>


                <br/>


                    <div class="stepwizard-row setup-panel">
                        <div class="stepwizard-step col-xs-3" style=" margin-left: 900px;" data-toggle="tooltip" data-placement="top" title="Consent to Disclosure of Criminal Record and Personal Information Release">
                            <a href="#step-1" type="button" style="width: 126px;" class="btn btn-primary next_button_custom_css mobile_setting_next_button">Back</a>
                        </div>


                        <button class="btn btn-success nextBtn pull-right next_button_custom_css mobile_setting_next_button"  style="width: 126px;" type="button">Next</button>
                    </div>

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

                        <br/>
<!--                        step 3 body-->
                        <div class="row" style="margin-right: 15px; margin-left: 15px; padding-left: 15px; color: black;">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 labels_with_radio" style="margin-bottom: 0px;">
                                <input required="" type="radio" value="Employment / Pre-Employment" name="consent_reason"/> Employment / Pre-Employment
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 labels_with_radio" style="margin-top: 0%;margin-left: 0%;">
                                <input required="" type="radio" value="Volunteer" name="consent_reason"/> Volunteer
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 labels_with_radio">
                                <input required="" type="radio" value="Other" name="consent_reason"/> Other :
                                <!--                                <input type="text" name="consent_reason_other" class="form-control input" />-->
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 labels_with_radio" style="margin-top: 0%;margin-left: 0%;">
                                <input type="text" name="consent_reason_other" class="form-control input" />
                            </div>
                        </div>

<!--                        <br />-->
                        <br />

                        <div class="row"  style="padding-left: 15px; padding-right: 15px; margin-right: 15px; margin-left: 15px;">
                            <div class="col-lg-12 col-md-12 col-xs-12">
                                <p style="color: black;  text-align:justify;" >
                                    I hereby authorize and consent to the full disclosure of information by the Police service , Global Avenues
                                    Consulting Inc. o/a GAC Screening Solutions, its associates,  to Employer and/or Individual:
                                </p>

<!--                                <br/>-->

                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <label> Organization Name:<span class="required_class"> </span> </label>
                                        <input required="" type="text" name="consent_organization" class="form-control input"/>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <label> Contact Person: </label>
                                        <input required="" type="text" name="consent_contact_name" class="form-control input"/>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <label> Contact Number: </label>
                                        <input required="" type="text" name="consent_contact_phone" class="form-control input"/>
                                    </div>
                                </div>
                                <br/>
<!--                                <br/>-->
                                <p style="color: black;  text-align:justify;" >	and to me. I hereby
                                    release and forever discharge the Police service board, police service and all their agents, officers and
                                    representatives from any and all liability, actions and claims for damages, costs, cause of actions,
                                    loss or injury of any nature which may be sustained by me as a result of the disclosure of information
                                    by the police services to Global Avenues Consulting Inc. o/a GAC Screening Solutions, its associates
                                    and employer. Accordingly, neither the Police Service nor the Board can guarantee that the information
                                    provided is complete or up to date. The search conducted by the Police Service will involve a query
                                    of the Identification Data Bank via the CPIC & PIP Systems. I am aware and I give consent that my
                                    record may be transmitted electronically or in a hard copy within Canada. I understand and acknowledge
                                    that my records and/or information located and/or disclosed by the police service may or may not
                                    pertain to me. Positive identification can only be confirmed through the comparison of fingerprints
                                    which must be submitted by me. I certify that to the best knowledge, the information I have provided
                                    in this form is complete and accurate in every respect.

                                    <br />
                                    <br />

                                    <strong> Privacy Policy Statement: </strong> The information on
                                    this form is required for the purpose of conducting criminal record check. The information collected
                                    and disclosed in this form is in compliance with all federal, provincial and municipal laws.
                                </p>
                            </div>
                        </div>

<!--                        <br/>-->

                        <button class="btn btn-primary nextBtn pull-right next_button_custom_css mobile_setting_next_button" type="button">Next</button>
                    </div>
                </div>


        <!--        4th step-->

                <div class="panel panel-primary setup-content" id="step-4">
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: 95%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>

                    <div class="panel-heading">
                        <h3 class="panel-title">Declaration of Criminal Record </h3>
                    </div>
                    <div class="panel-body gray_background">
<!--                        step 4 body-->

                        <div class="row" style="margin-right: 10px; margin-left: 10px;">
                            <div class="col-lg-12 col-md-12 labels_with_radio">
                                <b >Have you ever been convicted of a criminal offence for which a pardon has not been granted? <span class="required_class"> </span> &nbsp; &nbsp;
                                    <input required="" type="radio" value="Yes" name="consent_criminal_offence"/> Yes &nbsp; &nbsp;
                                    <input required="" type="radio" value="No" name="consent_criminal_offence"/> No &nbsp; &nbsp;
                                </b>
                                <!--                                &nbsp; &nbsp;-->
                                <br/>
                                <br/>
                                <!--                                <input required="" type="radio" value="Yes" name="consent_criminal_offence"/> Yes &nbsp; &nbsp;-->
                                <!--                                <input required="" type="radio" value="No" name="consent_criminal_offence"/> No &nbsp; &nbsp;-->
                            </div>
                        </div>
                        <div class="row" style="padding-left: 15px; padding-right: 15px; margin-right: 15px;
                                     margin-left: 15px;">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <p  style="color: black;" align="justify">
                                    If you answered YES, please provide the details of all criminal	convictions. Use separate form if the
                                    offence are more. Do not declare the following: Absolute
                                    discharges or Conditional discharges, pursuant to the Criminal code, section 730, Any charges for
                                    which you have received a pardon, pursuant to the Criminal Records Act, Any offences while you were a
                                    "young person" (12 years old but less than 18 years old), pursuant to the Youth Criminal Justice Act,
                                    Any charges for which you were not convicted, for example, charges that were withdrawn, dismissed,
                                    etc, Any provincial or municipal offences, Any charges dealt with outside of Canada.
                                </p>
                            </div>
                        </div>
<!--                        <br/>-->
<!--                        <br/>-->
                        <div class="row" style="margin-left: 15px; margin-right: 15px;">
                            <table width="100%" id="offence-details">
                                <tr style="background-color: #9ac0cd;">
                                    <td align="center" class="labels_with_radio"> <b> Offence </b> </td>
                                    <td align="center" class="labels_with_radio"> <b> Date of Sentence (YYYY/MM/DD) </b> </td>
                                    <td align="center" class="labels_with_radio"> <b> Court Location (City, Province) </b> </td>
                                </tr>
                                <tr>
                                    <td > <input type="text" name="consent_offence[]" class="form-control"/> </td>
                                    <td > <input type="text" name="consent_offence_date[]" class="form-control"/> </td>
                                    <td > <input type="text" name="consent_offence_court[]" class="form-control"/> </td>
                                </tr>
                                <tr>
                                    <td > <input type="text" name="consent_offence[]" class="form-control"/> </td>
                                    <td > <input type="text" name="consent_offence_date[]" class="form-control"/> </td>
                                    <td > <input type="text" name="consent_offence_court[]" class="form-control"/> </td>
                                </tr>
                                <tr>
                                    <td > <input type="text" name="consent_offence[]" class="form-control"/> </td>
                                    <td > <input type="text" name="consent_offence_date[]" class="form-control"/> </td>
                                    <td > <input type="text" name="consent_offence_court[]" class="form-control"/> </td>
                                </tr>
                            </table>

                            <input type="hidden" name="application_id" value="<?= $application_id ?>">
                            <input type="hidden" name="client_id" value="<?= $client_id ?>">




                            <button type="button" id="add-offence" class="btn btn-default" aria-label="Plus Sign">
                                <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>
                            </button>
                        </div>




<!--                        <button class="btn btn-success pull-right" type="submit">Finish!</button>-->

                        <a href="<?php echo base_url('user/namebased_check_signature'); ?>">
                            <button class="btn btn-primary nextBtn pull-right next_button_custom_css mobile_setting_next_button" type="button">Next</button>
                        </a>
                    </div>
                </div>





    </form>
</div>













</body>


<script src="<?php echo base_url('site-assets') ?>/step_form_files/jquery-3.3.1.min.js"></script>
<script src="<?php echo base_url('site-assets') ?>/step_form_files/popper.min.js"></script>
<script src="<?php echo base_url('site-assets') ?>/step_form_files/bootstrap.min.js"></script>
<script src="<?php echo base_url('site-assets') ?>/step_form_files/slick.min.js"></script>
<script src="<?php echo base_url('site-assets') ?>/step_form_files/main.js"></script>
<script src="<?php echo base_url('site-assets') ?>/step_form_files/switch.js"></script>



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
            var curStep = $(this).closest(".setup-content"),
                curStepBtn = curStep.attr("id"),
                nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
                curInputs = curStep.find("input[type='text'], input[type='date'], input[type='radio'], input[type='number'], input[type='url']"),
                isValid = true;

//            alert(curStep);

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
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#profile-image')
                    .attr('src', e.target.result)
                    .width(150)
                    .height(200);
            };

            reader.readAsDataURL(input.files[0]);
        }
    };
    $("#customFile").change(function() {
        filename = this.files[0].name
    });

    //    code for ciriminal record expander with plus button add more fields
    $('#add-offence').click(function () {
        $('#offence-details').append('<tr>'
            + '<td > <input type="text" name="consent_offence[]" class="form-control"/> </td>'
            + '<td > <input type="text" name="consent_offence_date[]" class="form-control"/> </td>'
            + '<td > <input type="text" name="consent_offence_court[]" class="form-control"/> </td>'
            + '</tr>');
    });

</script>






</html>