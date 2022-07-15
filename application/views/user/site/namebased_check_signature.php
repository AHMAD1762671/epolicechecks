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

        .col-xs-3 {
            width: 14% !important;
        }

        .panel-primary>.panel-heading {
            background-color: #13375c !important;
        }

        .col-xs-3 {
            width: 12% !important;
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



            <div class="stepwizard-step col-xs-3" data-toggle="tooltip">
                <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled" data-placement="top" disabled="disabled" title="Address">4</a>
                <!--                <p><small>Address</small></p>-->
            </div>
            <div class="stepwizard-step col-xs-3">
                <!--                <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled" title="Reason for Request">6</a>-->
                <a href="#step-3" type="button" class="btn btn-default btn-circle" data-placement="top" disabled="disabled" title="Reason for Request">5</a>
                <!--                <p><small>Reason for Request</small></p>-->
            </div>
            <div class="stepwizard-step col-xs-3">
                <a href="#step-4" type="button" class="btn btn-default btn-circle" data-placement="top" disabled="disabled" title="Declaration of Criminal Record">6</a>
                <!--                <p><small>Declaration of Criminal Record</small></p>-->
            </div>
            <div class="stepwizard-step col-xs-3">
                <a href="#step-5" type="button" class="btn btn-default btn-circle" data-placement="top" disabled="disabled" title="Declaration of Criminal Record">7</a>
                <!--                <p><small>Declaration of Criminal Record</small></p>-->
            </div>

            <div class="stepwizard-step col-xs-3" data-toggle="tooltip" data-placement="top" title="Consent to Disclosure of Criminal Record and Personal Information Release">
                <a href="#step-1" type="button" class="btn btn-success btn-circle">8</a>
            </div>




        </div>
    </div>


    <br/>




    <form role="form" method="post" action="#">

        <!--        step1-->
        <div class="panel panel-primary setup-content" id="step-1">

            <div class="progress">
                <div class="progress-bar progress-bar-striped bg-success active" role="progressbar" style="width: 100%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
            </div>

            <div class="panel-heading">
                <h3 class="panel-title">Consent to Disclosure of Criminal Record and Personal Information Release</h3>
            </div>
            <div class="panel-body gray_background margin-top-adjustment">



                <div class="row" style="margin-left: 15px; margin-right: 15px;">
                    <div class="container">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#home">Draw your Signature</a></li>
                            <li><a data-toggle="tab" href="#menu2">Upload signature image</a></li>
                        </ul>

                        <div class="tab-content">
                            <div id="home" class="tab-pane fade in active" style="">
                                <h3>Draw Signature</h3>
                                <style>
                                    #canvasDiv{
                                        position: relative;
                                        border: 2px dashed grey;
                                        height:300px;
                                        width: 740px;
                                    }
                                </style>
                                <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
                                <section style="background:#efefe9;">
                                    <div class="row">
                                        <div class="board">
                                            <div class="tab-content">
                                                <div class="tab-pane fade in active" id="step1" style="">
                                                    <div class="row" style="margin-right: 15px;">

                                                        <div class="col-md-8 col-md-offset-2" style="float: left;">

                                                            <div id="canvasDiv"></div>
                                                            <br>
                                                            <button type="button" class="btn btn-danger" id="reset-btn">Clear</button>
                                                            <button type="button" class="btn btn-success" id="btn-save">Save</button>
                                                        </div>
                                                        <form id="signatureform" action="<?php echo base_url() ?>agent/save_name_based_check_drawable_signature" enctype="multipart/form-data" style="display:none" method="post">
                                                            <input type="hidden" id="signature" name="signature">
                                                            <input type="hidden" name="signaturesubmit" value="1">

                                                            <input type="hidden" name="client_id" value="<?php echo $client_id ?>">
                                                            <input type="hidden" name="application_id" value="<?php echo $application_id ?>">
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>

                            <div id="menu2" class="tab-pane fade" style="margin-bottom: 50px;">
                                <form action="<?php echo base_url() ?>agent/save_name_based_check_picture_signature" method="post" enctype="multipart/form-data">


                                    <div class="col-lg-6 col-md-4 col-sm-6 col-xs-6">
                                        <label style="color: black;">Applicant Signature's picture:</label> &nbsp; <input style="color: black;" type="file" name="consent_signature_picture"/>
                                        <input type="hidden" name="client_id" value="<?php echo $client_id ?>">
                                        <input type="hidden" name="application_id" value="<?php echo $application_id ?>">
                                    </div>

                                    <br/>

                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" align="right">
                                        <button type="submit" class="btn btn-success" style="width: 139px; margin-left: 55px;">Submit</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>

                <button style="width: 12%;" class="btn btn-primary nextBtn pull-right next_button_custom_css mobile_setting_next_button" type="button">Submit</button>
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



<script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>









<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.5.0-beta4/html2canvas.min.js"></script>
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
        //
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





</html>
