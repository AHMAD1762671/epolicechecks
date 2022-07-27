
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


    <style>
        .has-error .form-control {
            border: 1px solid red !important;
        }


        .padding-top{
            padding-top: 16px !important;
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
            </div>
            <div class="stepwizard-step col-xs-3" data-toggle="tooltip" data-placement="top" title="Select Fingerprint Agency">
                <a href="#step-2" type="button" class="btn btn-default btn-circle">2</a>
            </div>
            <div class="stepwizard-step col-xs-3" data-toggle="tooltip" data-placement="top" title="Signature">
                <a href="#step-4" type="button" class="btn btn-default btn-circle">3</a>
            </div>


        </div>
    </div>


    <br/>




    <form role="form" action="<?php echo base_url('agent/app_digital_fingerprinting_form_save') ?>" method="post">

        <!--        step1 -->

        <div class="panel panel-primary setup-content" id="step-1">


            <div class="progress">
                <div class="progress-bar progress-bar-striped bg-success active" role="progressbar" style="width: 75%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
            </div>

            <div class="panel-heading">
                <h3 class="panel-title"> <b>Select one of the following</b> </h3>
            </div>
            <div class="panel-body gray_background margin-top-adjustment">

                <div class="row" style="padding-left: 15px; padding-right: 15px; margin-right: 15px; margin-left: 15px;">

                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="form-group">
                            <label class="control-label"> Series Type: </label>
                            <select name="series_type" class="form-control" required="">
                                <option value="">Section one option</option>
                                <option value="F">F</option>
                                <option value="CF">CF</option>
                                <option value="N">N</option>
                            </select>
                        </div>
                    </div>


                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="form-group">
                            <label class="control-label"> First Name: </label>
                            <input type="text" name="consent_first_name" class="form-control"/>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="form-group">
                            <label class="control-label">  Middle Name: </label>
                            <input type="text" name="consent_middle_name" class="form-control"/>
                        </div>
                    </div>

                </div>
                <br/>



                <div class="row" style="padding-left: 15px; padding-right: 15px; margin-right: 15px; margin-left: 15px;">

                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="form-group">
                            <label class="control-label">  Last Name:  </label>
                            <input type="text" required name="consent_last_name" class="form-control"/>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="form-group">
                            <label class="control-label"> Maiden/Alias/Nickname: </label>
                            <input type="text" name="consent_nick_name" class="form-control input"/>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="form-group">
                            <label class="control-label">  Date of Birth: (YYYY/MM/DD) </label>
                            <input required="" type="text" name="consent_dob" class="form-control"/>
                        </div>
                    </div>



                </div>
                <br/>


                <div class="row" style="padding-left: 15px; padding-right: 15px; margin-right: 15px; margin-left: 15px;">

                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="form-group">
                            <label class="control-label">  Email:  </label>
                            <input type="text" name="consent_email" class="form-control"/>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label class="control-label">  Place of Birth:  </label>
                            <input type="text" name="consent_place_of_birth" class="form-control input"/>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="form-group">
                            <label> Tell: </label>
                            <input type="text" name="consent_phone" class="form-control input"/>
                        </div>
                    </div>




                </div>
                <br/>

                <div class="row" style="padding-left: 15px; padding-right: 15px; margin-right: 15px; margin-left: 15px;">

                    <div class="col-lg-8 col-md-4 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label class="control-label"> Current Address: </label>
                            <input required="" type="text" name="consent_current_address" class="form-control input"/>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="form-group">
                            <label class="control-label">  City: </label>
                            <input required="" type="text" name="consent_cellphone" class="form-control input"/>
                        </div>
                    </div>

                </div>

                <br/>




                <div class="row" style="padding-left: 15px; padding-right: 15px; margin-right: 15px; margin-left: 15px;">

                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label class="control-label"> Province: </label>
                            <input required="" type="text" name="consent_current_address" class="form-control input"/>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="form-group">
                            <label class="control-label">  Postal Code: </label>
                            <input required="" type="text" name="consent_cellphone" class="form-control input"/>
                        </div>
                    </div>



                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="form-group">
                            <label class="control-label">  Cell: </label>
                            <input required="" type="text" name="consent_cellphone" class="form-control input"/>
                        </div>
                    </div>

                </div>
                <br/>


                <div class="row" style="padding-left: 15px; padding-right: 15px; margin-right: 15px; margin-left: 15px;">

                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label class="control-label">  Sex: (Male/Female/Unknown):  </label>
                            <input required="" type="text" name="consent_gender" class="form-control input"/>
                        </div>
                    </div>


                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label class="control-label">  Hair Color:  </label>
                            <input type="text" name="consent_hair_color" class="form-control input"/>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label class="control-label">  Eye Color:  </label>
                            <input type="text" name="consent_eye_color" class="form-control input"/>
                        </div>
                    </div>

                </div>
                <br/>



                <div class="row" style="padding-left: 15px; padding-right: 15px; margin-right: 15px; margin-left: 15px;">

                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label class="control-label">  Height:  </label>
                            <input type="text" name="consent_height" class="form-control input"/>
                        </div>
                    </div>


                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label class="control-label">  Weight:  </label>
                            <input type="text" name="consent_weight" class="form-control input"/>
                        </div>
                    </div>


                </div>







                <button class="btn btn-primary nextBtn pull-right next_button_custom_css mobile_setting_next_button"  type="button">Next</button>
            </div>


        </div>



        <!--        step 2-->


        <div class="panel panel-primary setup-content" id="step-2">

            <div class="progress">
                <div class="progress-bar progress-bar-striped bg-success active" role="progressbar" style="width: 50%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
            </div>

            <div class="panel-heading">
                <h3 class="panel-title">Applicant Information</h3>
            </div>
            <div class="panel-body gray_background">


                <div class="row" style="padding-left: 15px; padding-right: 15px; margin-right: 15px; margin-left: 15px;">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 padding-top">
                        <input type="checkbox" name="federal_employment" value="1" class="">
                        <label>Federal Employment :</label>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <label>  Employer Name: : </label>
                        <input type="text" name="federal_employer_name" class="form-control input"/>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <label>  Job Title:  </label>
                        <input type="text" name="federal_job_title" class="form-control input"/>
                    </div>
                </div>

                <br/>


                <div class="row" style="padding-left: 15px; padding-right: 15px; margin-right: 15px; margin-left: 15px;">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 padding-top">

                        <input type="checkbox" name="provincial_employment" value="1" class="">
                        <label>Provincial Employment :</label>

                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <label>  Employer Name: : </label>
                        <input type="text" name="provincial_employer_name" class="form-control input"/>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <label>  Job Title:  </label>
                        <input type="text" name="provincial_job_title" class="form-control input"/>
                    </div>
                </div>

                <br/>


                <div class="row" style="padding-left: 15px; padding-right: 15px; margin-right: 15px; margin-left: 15px;">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 padding-top">
                        <input type="checkbox" name="private_industry" value="1" class="">
                        <label>Private Industry :</label>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <label>  Company Name: </label>
                        <input  type="text" name="private_industry_company_name" class="form-control input"/>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <label>  Position:  </label>
                        <input type="text" name="private_industry_position" class="form-control input"/>
                    </div>
                </div>

                <br/>



                <div class="row" style="padding-left: 15px; padding-right: 15px; margin-right: 15px; margin-left: 15px;">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 padding-top">

                        <input type="checkbox" name="citizenship" value="1" class="">
                        <label>Citizenship :</label>

                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <label>  IRCC File No : </label>
                        <input  type="text" name="citizenship_ircc_file_no" class="form-control input"/>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <label>  UCI:  </label>
                        <input type="text" name="citizenship_uci" class="form-control input"/>
                    </div>
                </div>

                <br/>




                <div class="row" style="padding-left: 15px; padding-right: 15px; margin-right: 15px; margin-left: 15px;">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 padding-top">
                        <input type="checkbox" name="permanent_residency" value="1" class="">
                        <label>Permanent Residency :</label>
                    </div>

                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <label>  IRCC File No : </label>
                        <input type="text" name="permanent_residency_ircc_file_no" class="form-control input"/>
                    </div>

                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <label>  UCI:  </label>
                        <input type="text" name="permanent_residency_uci" class="form-control input"/>
                    </div>

                </div>

                <br/>
                <br/>



                <div class="row" style="padding-left: 15px; padding-right: 15px; margin-right: 15px; margin-left: 15px;">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <input type="checkbox" name="vulnerable_sector" value="1"/>
                        <label>  Vulnerable Sector  </label>

                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-4 col-xs-12">
                        <input type="checkbox" name="volunteer_work" value="1"/>
                        <label>  Volunteer Work  </label>

                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-4 col-xs-12">
                        <input type="checkbox" name="adoption" value="1"/>
                        <label>  Adoption  </label>

                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-4 col-xs-12">
                        <input type="checkbox" name="fbi" value="1"/>
                        <label>  FBI  </label>
                    </div>

                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <input type="checkbox" name="international_fingerprints" value="1"/>
                        <label>  International Fingerprints  </label>
                    </div>
                </div>

                <br/>

                <div class="row" style="padding-left: 15px; padding-right: 15px; margin-right: 15px; margin-left: 15px;">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <input type="checkbox" name="record_suspension" value="1" class="">
                        <label>Record Suspension</label>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <input type="checkbox" name="us_entry_waiver_travel_visa" value="1"/>
                        <label>  U.S. Entry Waiver/Travel/Visa</label>

                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-4 col-xs-12">
                        <input type="checkbox" name="name_change" value="1"/>
                        <label>  Name Change </label>

                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <input type="checkbox" name="other" value="1"/>
                        <label>  Other  </label>
                        <input style="width: 80%; float: right; margin-top: -5px;" type="text" name="other_text" class="form-control"/>

                    </div>
                </div>

                <br/>


                <div class="row" style="padding-left: 15px; padding-right: 15px; margin-right: 15px; margin-left: 15px;">
                    <div class="col-lg-12 col-md-4 col-sm-4 col-xs-12">
                        <label for="comments">Comments</label>
                        <textarea class="form-control" name="consent_comments" id="consent_comments" rows="4"></textarea>
                    </div>
                </div>



                <br/>














                <button class="btn btn-primary nextBtn pull-right next_button_custom_css mobile_setting_next_button"  type="button">Next</button>
            </div>
        </div>





        <!--        step 4-->

        <div class="panel panel-primary setup-content" id="step-4">

            <div class="progress">
                <div class="progress-bar progress-bar-striped bg-success active" role="progressbar" style="width: 100%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
            </div>

            <div class="panel-heading">
                <h3 class="panel-title">Select Fingerprint Agency</h3>
            </div>
            <div class="panel-body gray_background">


                <div class="row" style="padding-left: 15px; padding-right: 15px; margin-right: 15px; margin-left: 15px;">
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label class="control-label">  Officer Name:  </label>
                            <input type="text" required name="officer_name" class="form-control"/>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label class="control-label">  Date Fingerprinted:  </label>
                            <input type="text" required name="date_fingerprinted" class="form-control"/>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label class="control-label">  Time Fingerprinted:  </label>
                            <input type="text" required name="time_fingerprinted" class="form-control"/>
                        </div>
                    </div>

                </div>




                <div class="row" style="padding-left: 15px; padding-right: 15px; margin-right: 15px; margin-left: 15px;">
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label class="control-label">  Date submitted:  </label>
                            <input type="text" required name="date_submitted" class="form-control"/>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label class="control-label">  Result Delivery:	  </label>
<!--                            <input type="text" required name="consent_eye_color" class="form-control"/>-->
                            <select class="form-control" name="result_deliver">
                                <option>Select Delivery Address</option>
                                <option name="Individual">Individual</option>
                                <option name="Contributor">Contributor</option>
                                <option name="Response Address">Response Address</option>
                            </select>
                        </div>
                    </div>


                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label class="control-label">  Address	 </label>
                            <textarea class="form-control" id="" name="address" rows="2"></textarea>
                        </div>
                    </div>



                </div>



                <div class="row" style="padding-left: 15px; padding-right: 15px; margin-right: 15px; margin-left: 15px;">
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label class="control-label">  RCMP Status:	 </label>
                            <select class="form-control" name="rcmp_status">
                                <option>Select RCMP Status</option>
                                <option>Cleared</option>
                                <option>Error</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label class="control-label"> DCN number:  </label>
                            <input type="text" name="dcn_number" class="form-control input"/>
                        </div>
                    </div>


                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label class="control-label"> Referred By:  </label>
                            <input type="text" name="referred_by" class="form-control input"/>
                        </div>
                    </div>
                </div>


                <br/>



                <div class="row" style="padding-left: 15px; padding-right: 15px; margin-right: 15px; margin-left: 15px;">

                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label class="control-label">  Client Type	 </label>
                            <select class="form-control" name="client_type">
                                <option>Select Client Type</option>
                                <option>Walk in</option>
                                <option>Agent</option>
                                <option>Corporate</option>
                                <option>International</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label class="control-label">  Mode of Payment	 </label>
                            <select class="form-control" name="mode_of_payment">
                                <option>Select mode of Payment</option>
                                <option>Cash</option>
                                <option>Debit card</option>
                                <option>Credit Card</option>
                                <option>Credit Account</option>
                            </select>
                        </div>
                    </div>

                </div>


                <br/>

                <div class="row" style="padding-left: 15px; padding-right: 15px; margin-right: 15px; margin-left: 15px;">

                    <div class="col-lg-4 col-md-3 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label class="control-label">  Select Agent	 </label>
                            <select class="form-control" name="agent_email">
                                <option>Select RCMP Status</option>
                                <option>agent@gmail.com</option>
<!--                                <option>Error</option>-->
                            </select>
                        </div>
                    </div>


                    <div class="col-lg-4 col-md-3 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label class="control-label">  Select Corporate </label>
                            <select class="form-control" name="corporate_email">
                                <option>Select RCMP Status</option>
                                <option>corporate@gmail.com</option>
                            </select>
                        </div>
                    </div>


                    <div class="col-lg-4 col-md-3 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label class="control-label">  Enter Email/Name </label>
                            <input type="text" name="email_address" class="form-control input"/>
                        </div>
                    </div>

                </div>









                <button class="btn btn-primary pull-right next_button_custom_css mobile_setting_next_button" type="submit">Submit</button>
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
<!--<script>-->
<!--    $(document).ready(function () {-->
<!--        $('.services_prices').change(function () {-->
<!--            pricings();-->
<!--        });-->
<!--        $('#state_id').change(function () {-->
<!--            pricings();-->
<!--        });-->
<!--        $('.delivery_method').change(function () {-->
<!--            pricings();-->
<!--        });-->
<!--    });-->
<!---->
<!--    function pricings() {-->
<!--        var subtotal = 0;-->
<!--        var total = 0;-->
<!--        var tax_rate = 0;-->
<!--        tax_rate = parseInt($('#state_id').find(":selected").attr('data-tax'));-->
<!--        var tax = 0;-->
<!--        var delivery_fee = 0;-->
<!--        delivery_fee = parseInt($("input[name=delivery_method]:checked").attr('data-price'));-->
<!--        $('#delivery_method_price').val(delivery_fee);-->
<!--        $('input:checkbox.services_prices:checked').each(function () {-->
<!--            var service_price = $(this).closest('.row').find('strong>span').text();-->
<!--            subtotal = subtotal + parseInt(service_price);-->
<!--        });-->
<!--        if (isNaN(delivery_fee)) {-->
<!---->
<!--        } else {-->
<!--            subtotal = subtotal + delivery_fee;-->
<!--        }-->
<!--        if (isNaN(tax_rate)) {-->
<!---->
<!--        } else {-->
<!--            tax = Math.ceil(((subtotal / 100) * tax_rate));-->
<!--        }-->
<!--        total = subtotal + tax;-->
<!--        $('#total_sub').text(subtotal);-->
<!--        $('#sub_total').val(subtotal);-->
<!--        $('#total_tax').text(tax);-->
<!--        $('#tax').val(tax);-->
<!--        $('#total_grand').text(total);-->
<!--        $('#grand_total').val(total);-->
<!--    }-->
<!--</script>-->

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