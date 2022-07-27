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
            padding-top: 50px;
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
                width: 14%;
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

            .coupon-field{
                width: 160% !important;
            }

        }

        @media screen and (min-width: 768px)  {
            .coupon-field{
                width: 40% !important;
            }
        }

        .form-control {
            box-shadow: none !important;
        }



        .required_class:after {
            content:" *";
            color: red;
            font-size: 16px;
        }


        .has-error .form-control {
            border-color: red;
        }
        .has-error .help-block, .has-error .control-label, .has-error .radio, .has-error .checkbox, .has-error .radio-inline, .has-error .checkbox-inline, .has-error.radio label, .has-error.checkbox label, .has-error.radio-inline label, .has-error.checkbox-inline label {
            color: red;
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
            <div class="stepwizard-step col-xs-3" data-toggle="tooltip" data-placement="top" title="Select one of the following!">
                <a href="#step-1" type="button" class="btn btn-success btn-circle">1</a>
                <!--                <p><small>Shipper</small></p>-->
            </div>
            <div class="stepwizard-step col-xs-3" data-toggle="tooltip" data-placement="top" title="Payment Information">
                <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                <!--                <p><small>Destination</small></p>-->
            </div>

            <div class="stepwizard-step col-xs-3">
                <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
                <!--                <p><small>Cargo</small></p>-->
            </div>
            <div class="stepwizard-step col-xs-3">
                <a href="#step-4" type="button" class="btn btn-default btn-circle" disabled="disabled">4</a>
                <!--                <p><small>Cargo</small></p>-->
            </div>
            <div class="stepwizard-step col-xs-3">
                <a href="#step-5" type="button" class="btn btn-default btn-circle" disabled="disabled">5</a>
                <!--                <p><small>Cargo</small></p>-->
            </div>
            <div class="stepwizard-step col-xs-3">
                <a href="#step-6" type="button" class="btn btn-default btn-circle" disabled="disabled">6</a>
            </div>
            <div class="stepwizard-step col-xs-3">
                <a href="#step-7" type="button" class="btn btn-default btn-circle" disabled="disabled">7</a>
            </div>

        </div>
    </div>


    <br/>




    <form role="form" action="<?php echo base_url('agent/app_name_based_check_form_save') ?>" method="post">

        <!--        step1-->

        <div class="panel panel-primary setup-content" id="step-1">

            <div class="progress">
                <div class="progress-bar progress-bar-striped bg-success active" role="progressbar" style="width: 14%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
            </div>

            <div class="panel-heading">
                <h3 class="panel-title"> <b>Select one of the following</b> </h3>
            </div>
            <div class="panel-body gray_background margin-top-adjustment">

                <div class="row" style="margin-bottom: 70px;">
                    <div class="col-sm-2"> </div>

                    <div class="col-sm-4 text-dark bg-white text-center abc " style=" border: 1px solid #d1d4db; border-bottom: 4px solid #c1d72f;">
                        <input type="radio" name="state_name" value="canada" class="form-control input" style="width: 10%; text-align: center; margin-left: 46%;" >
                        <br/>
                        <img src="<?= base_url('site-assets') ?>/images/Canadian.gif" class="mt-5 mb-2 margin-onlaptop" style="height: 100px; width: 135px;">
                        <br/>
<!--                        <br/>-->
<!--                        <br/>-->
                        <h5 class="mt-3">CANADA</h5>
                        <p>I am currently residing in Canada </p>
                    </div>



                    <div class="col-sm-4 text-dark  bg-white text-center abc margin_top_mobile" style="border: 1px solid #d1d4db; border-bottom: 4px solid #c1d72f;">
                        <input type="radio" name="state_name" value="international" class="form-control input" style="width: 10%; text-align: center; margin-left: 46%;">
                        <img src="<?= base_url('site-assets') ?>/images/map.png" class="mt-5 mb-2 " style="height: 130px; width: 135px;  ">
                        <br/>
<!--                        <br/>-->
<!--                        <br/>-->
                        <h5 class="mt-3">INTERNATIONAL</h5>
                        <p>I am currently residing in a foreign country </p>
                    </div>
                    <div class="col-sm-2  "></div>
                </div>

                <button class="btn btn-primary nextBtn pull-right next_button_custom_css mobile_setting_next_button" type="button">Next</button>

            </div>
        </div>



        <!--        step 2-->


        <div class="panel panel-primary setup-content" id="step-2">

            <div class="progress">
                <div class="progress-bar progress-bar-striped bg-success active" role="progressbar" style="width: 28%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
            </div>

            <div class="panel-heading">
                <h3 class="panel-title">Payment Information</h3>
            </div>
            <div class="panel-body gray_background">

                <section class="accordion-section clearfix mt-3" aria-label="Question Accordions">
                    <div class="container">

                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

                            <!--                            accordian step 1-->
                            <div class="panel panel-default">
                                <div class="panel-heading p-3 mb-3" role="tab" id="heading0">
                                    <h3 class="panel-title">
                                        <a class="collapsed" role="button" title="" data-toggle="collapse" data-parent="#accordion" href="#collapse0" aria-expanded="true" aria-controls="collapse0">
                                            Select your current residence: <span class="required_class"> </span>
                                        </a>
                                    </h3>
                                </div>

                                <div id="collapse0" class="panel-collapse collapse show" role="tabpanel" aria-labelledby="heading0" data-parent="#accordion">


                                    <div class="panel-body px-3 mb-4">
                                        <div class="row mobile_visibility" style="margin-left: 15px; margin-right: 15px;">
                                            <div class="col-lg-12" style="">
                                                <div class="form-group">
                                                    <select class="form-control" required="" id="state_id" name="state_id">
                                                        <option value="">---Select your Province---</option>
                                                        <?php foreach ($states as $value) { ?>
                                                            <option data-tax="<?= $value->tax_rate ?>" value="<?= $value->state_id ?>"><?= $value->name ?></option>
                                                        <?php }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>



                                        <div class="row margin-adjustment">
                                            <div class="col-lg-12" >

                                                <!--                                                <label><b>I want my original result to be delivered at:</b></label><br><br>-->

                                                <div class="form-group">
                                                    <label class="control-label" for="inputdefault">Applicant Name / Company Name / Third Party Name:</label>
                                                    <input class="form-control" id="inputdefault" required="" name="applicant_name" type="text">
                                                </div>


                                                <div class="form-group">
                                                    <label for="inputdefault">Address:</label>
                                                    <input class="form-control" id="inputdefault" required="" name="delivery_address" type="text">
                                                </div>
                                                <div class="row">
                                                    <!--CITY-->
                                                    <div class="col-md-5">
                                                        <div class="form-group">
                                                            <label for="inputdefault">City:</label>
                                                            <input class="form-control" id="inputdefault" required="" name="delivery_city" type="text">
                                                        </div>

                                                    </div>
                                                    <!--CITY-->
                                                    <!--Province-->
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="inputdefault">Province:</label>
                                                            <input class="form-control" id="inputdefault" required="" name="delivery_state" type="text">
                                                        </div>
                                                    </div>
                                                    <!--Province-->
                                                    <!--Country-->
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="inputdefault">Country:</label>
                                                            <input class="form-control" id="inputdefault" required="" name="delivery_country" type="text">
                                                        </div>
                                                    </div>
                                                    <!--Country-->
                                                </div>
                                                <div class="row">
                                                    <!--Tel-->
                                                    <div class="col-md-5">
                                                        <div class="form-group">
                                                            <label for="inputdefault">Tel:</label>
                                                            <input class="form-control" id="inputdefault" required="" name="delivery_phone" type="text">
                                                        </div>
                                                    </div>
                                                    <!--Tel-->
                                                    <!--Email-->
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="inputdefault">Email:</label>
                                                            <input class="form-control" id="inputdefault" type="text" required="" name="delivery_email">
                                                        </div>
                                                    </div>


                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="inputdefault">Reffered By:</label>
                                                            <input class="form-control" id="inputdefault" type="text" required="" name="delivery_email">
                                                        </div>
                                                    </div>
                                                    <!--Email-->
<!--                                                    <div class="col-md-3"></div>-->
                                                </div>


                                            </div>
                                        </div>




<!--                                        <a href="--><?php //echo base_url('reception/app_name_based_check_consent'); ?><!--">-->
                                            <button class="btn btn-primary nextBtn pull-right next_button_custom_css mobile_setting_next_button" type="submit">Next</button>
<!--                                        </a>-->




                                    </div>
                                </div>
                            </div>


                            <!--                            accordian step 2-->



                        </div>
                    </div>
                </section>


<!--                <a href="--><?php //echo base_url('user/app_name_based_check_consent'); ?><!--">-->
<!--                    <button class="btn btn-primary nextBtn pull-right next_button_custom_css mobile_setting_next_button"  type="button">Next</button>-->
<!--                </a>-->
            </div>
        </div>


    </form>
</div>













</body>


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
