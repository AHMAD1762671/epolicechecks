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

        .gray_background{
            background: #f5f5f5;
        }



        /*next button custom css code*/
        .next_button_custom_css{
            font-weight: 900;
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
                margin-left: 24%;
            }

            .btn{
                padding: .675rem .75rem;
                font-size: 18px;
            }

            .h5, h5 {
                font-size: 1.25rem;
            }
            .next_button_custom_css{
                width: 50% !important;
                font-size: 24px !important;
            }

            .logo-big-on-mobile {
                width: 120px !important;
                max-width: none;
            }
        }

        .mobile_setting_next_button{
            width: 10%;
            /*width: 35% !important;*/
            /*height: 120% !important;*/
            /*font-size: 24px !important;*/
        }

        /*.mobile_setting_next_button{*/
            /*width: 10%;*/
        /*}*/

        .panel-primary {
            border: none;
        }



    </style>


    <style>

        @media screen and (min-width: 768px){
            p {
                font-size: 10px;
            }
        }

    </style>

</head>



<body>





<!--page header area-->

<div class="main-header">
    <div class="logo">
        <img class="logo-big-on-mobile" src="<?= base_url('assets') ?>/images/logoNew2.png" alt="">
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

            <div class="stepwizard-step col-xs-3" data-toggle="tooltip" data-placement="top" title="Payment Information">
                <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">1</a>
                <p><small>Destination</small></p>
            </div>
            <div class="stepwizard-step col-xs-3">
                <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                <p><small>Schedule</small></p>
            </div>

            <div class="stepwizard-step col-xs-3" data-toggle="tooltip" data-placement="top" title="Select one of the following!">
                <a href="#step-1" type="button" class="btn btn-success btn-circle">3</a>
                <p><small>Shipper</small></p>
            </div>


            <div class="stepwizard-step col-xs-3">
                <a href="#step-4" type="button" class="btn btn-default btn-circle" disabled="disabled">4</a>
                <p><small>Cargo</small></p>
            </div>
            <div class="stepwizard-step col-xs-3">
                <a href="#step-5" type="button" class="btn btn-default btn-circle" disabled="disabled">5</a>
                <p><small>Cargo</small></p>
            </div>
            <div class="stepwizard-step col-xs-3">
                <a href="#step-6" type="button" class="btn btn-default btn-circle" disabled="disabled">6</a>
                <p><small>Cargo</small></p>
            </div>
            <div class="stepwizard-step col-xs-3">
                <a href="#step-7" type="button" class="btn btn-default btn-circle" disabled="disabled">7</a>
                <p><small>Cargo</small></p>
            </div>

        </div>
    </div>



    <form role="form">

        <!--        step1-->

        <div class="panel panel-primary setup-content" id="step-4">

            <div class="progress">
                <div class="progress-bar progress-bar-striped bg-success active" role="progressbar" style="width: 42%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
            </div>



            <div class="panel-heading">
                <h3 class="panel-title">Payment Summary </h3>
            </div>

            <div class="panel-body gray_background margin-top-adjustment">

                <div class="row" style="margin-bottom: 70px;">
                    <div class="col-sm-2">

                        <p>Date: <b> 2020-10-01 18:26:18</b></p>
                        <p>Application #: <b>2020-SS-100144</b></p>
                    </div>


                    <div class="col-sm-7" style="margin-top: 5%;">

                        <h5> Name: <b>Muhammad Zain ul Abadin</b> </h5> <br/>
                        <h5> Delivery Address: <b>House no. 15, Street no. 02, Zaman park sanda kalan Lahore</b> </h5> <br/>
                        <h5> Service: <b>Criminal Record Check</b> </h5> <br/>
                        <h5>Service Fee: <b>25.50 CAD </b></h5>

                    </div>


                    <div class="col-sm-3">
                        <img class="moneris_logo" src="<?php echo base_url('assets/moneris_gateway/moneris_logo.jpg') ?>" alt="Moneris Logo">
                    </div>
                </div>



                <button class="btn btn-primary nextBtn pull-right next_button_custom_css mobile_setting_next_button" type="button">Pay Now</button>
            </div>
        </div>





    </form>
</div>


</body>

<script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>



</html>
