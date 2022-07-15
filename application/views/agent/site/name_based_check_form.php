<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title><?= $page_title ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('site-assets') ?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url('site-assets') ?>/step_form_files/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url('site-assets') ?>/step_form_files/animate.min.css">

    <link rel="stylesheet" href="<?php echo base_url('site-assets') ?>/step_form_files/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        ::after{
            display: none !important;
        }
    </style>

</head>

<body>

<div class="clearfix"></div>


<div class="wrapper wizard d-flex clearfix multisteps-form position-relative">
    <div class="steps order-2 position-relative w-25">
        <div class="multisteps-form__progress">
            <span class="multisteps-form__progress-btn js-active" title="Select a service to get started"><i class="fa fa-user"></i>Select a service to get started</span>
            <span class="multisteps-form__progress-btn" title="Select one of the following"><i class="fa fa-user"></i>Select one of the following</span>
<!--            <span class="multisteps-form__progress-btn" title="Select one of the following"><i class="fa fa-user"></i>Select one of the following</span>-->
<!--            <span class="multisteps-form__progress-btn" title="Name Based Check"><i class="fa fa-user"></i>Name Based Check<span></span></span>-->
        </div>
    </div>
    <form class="multisteps-form__form w-75 order-1" action="<?= base_url() ?>agent/application/name-based-check" method="post" id="wizard">
        <div class="form-area position-relative">


            <!-- div 1 -->
            <div class="multisteps-form__panel js-active" data-animation="slideHorz">
                <div class="wizard-forms">
                    <div class="inner pb-100 clearfix">
                        <div class="wizard-title text-center">
                            <h5>"How can we help you today? Select a service to get started"</h5>
                        </div>

                        <br/>




                        <div class="row" style="margin-bottom: 20px;">
                            <div class="col-sm-4">
                            </div>
                            <div class="col-sm-4 text-dark bg-white text-center abc " style=" border: 1px solid #d1d4db; border-bottom: 4px solid #c1d72f;">

                                <input type="radio" class="form-control input" checked>

                                <img src="<?= base_url('site-assets') ?>/images/police.png" class="mt-5 mb-2"  style="height: 122px; width: 154px;  ">
                                <h5 class="mt-3">Criminal Record Check</h5>
                                <!--                                </a>-->
                            </div>
                        </div>

                        <br/>
                        <br/>
                        <br/>
                        <br/>
                        <br/>
                        <br/>
                        <br/>
                        <div class="wizard-v3-progress">
                            <span>1 to 5 step</span>
                            <h3>0% to complete</h3>
                            <div class="progress">
                                <div class="progress-bar" style="width: 0%">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="actions">
                        <ul>
                            <li><span class="js-btn-next" title="NEXT">NEXT <i class="fa fa-arrow-right"></i></span></li>
                        </ul>
                    </div>
                </div>
            </div>










            <!-- div 2 -->
            <div class="multisteps-form__panel" data-animation="slideHorz">
                <div class="wizard-forms section-padding">
                    <div class="inner pb-100 clearfix">
                        <div class="wizard-title text-center">
                            <h3>Select one of the following</h3>
                        </div>

                        <br/>

                        <div class="row mb-3" >
                            <div class="col-sm-1">
                                <input type="radio" class="form-control input" checked>
                            </div>
                            <div class="col-sm-10 text-dark  bg-white abc " style="border: 1px solid #d1d4db;border-bottom: 4px solid #c1d72f;">

                                <div class="row abc">
                                    <div class="col-sm-5" style="border-right: 1px solid #c1d72f;">
                                        <a href="<?= base_url()?>agent/application/name-based-check">
                                            <img src="<?= base_url('site-assets') ?>/images/police.png" class="mt-3 mb-2 " style="height: 119px; width: 130px; float: left; ">
                                            <h6 style="margin-top: 70px;">Name Based Check</h6>
                                        </a>
                                    </div>
                                    <div class="col-sm-7 text-dark">
                                        <p class="mt-4"> <i class="fa fa-hand-o-right"></i> Employment -Canadian Organization<br><i class="fa fa-hand-o-right"></i> Tenant<br>
                                            <i class="fa fa-hand-o-right"></i> Licensing<br>
                                            <i class="fa fa-hand-o-right"></i> Other</p>

                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-1  ">

                            </div>
                        </div>

                        <br/>

                        <br/>
                        <br/>

                        <br/>
                        <br/>

                        <div class="wizard-v3-progress">
                            <span>2 to 2 step</span>
                            <h3>100% to complete</h3>
                            <div class="progress">
                                <div class="progress-bar" style="width: 38%">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="actions">
                        <ul>
                            <li><span class="js-btn-prev" title="BACK"><i class="fa fa-arrow-left"></i> BACK </span></li>
                            <li><span class="" title="NEXT"> <a href="http://localhost/epolicechecks/agent/app_name_based_check_consent"> NEXT </a><i class="fa fa-arrow-right"></i></span></li>

                            <!--                            <li><span class="js-btn-next" title="NEXT">NEXT <i class="fa fa-arrow-right"></i></span></li>-->
                        </ul>
                    </div>
                </div>
            </div>







            <!-- div 3 -->
<!--            <div class="multisteps-form__panel" data-animation="slideHorz">-->
<!--                <div class="wizard-forms">-->
<!--                    <div class="inner pb-100 clearfix">-->
<!--                        <div class="wizard-title text-center">-->
<!--                            <h3>Select one of the following</h3>-->
<!--                        </div>-->
<!---->
<!--                        <br/>-->
<!---->
<!--                        <div class="row" style="margin-bottom: 70px;">-->
<!--                            <div class="col-sm-2"> </div>-->
<!---->
<!---->
<!--                            <div class="col-sm-4 text-dark bg-white text-center abc " style=" border: 1px solid #d1d4db; border-bottom: 4px solid #c1d72f;">-->
<!--                                <input type="radio" name="canada" class="form-control input" >-->
<!--                                <img src="--><?//= base_url('site-assets') ?><!--/images/Canadian.gif" class="mt-5 mb-2 " style="height: 130px; width: 135px;  ">-->
<!--                                <h5 class="mt-3">CANADA</h5>-->
<!--                                <p>I am currently residing in Canada </p>-->
<!--                            </div>-->
<!---->
<!---->
<!--                            <div class="col-sm-4 text-dark  bg-white text-center abc" style="margin-left: 10px; border: 1px solid #d1d4db; border-bottom: 4px solid #c1d72f;">-->
<!--                                <input type="radio" name="canada" class="form-control input">-->
<!--                                <img src="--><?//= base_url('site-assets') ?><!--/images/map.png" class="mt-5 mb-2 " style="height: 130px; width: 135px;  ">-->
<!--                                <h5 class="mt-3">INTERNATIONAL</h5>-->
<!--                                <p>I am currently residing in a foreign country </p>-->
<!--                            </div>-->
<!--                            <div class="col-sm-2  "></div>-->
<!--                        </div>-->
<!---->
<!---->
<!---->
<!---->
<!--                        <br />-->
<!--                        <br />-->
<!---->
<!--                        <div class="wizard-v3-progress">-->
<!--                            <span>3 to 5 step</span>-->
<!--                            <h3>59% to complete</h3>-->
<!--                            <div class="progress">-->
<!--                                <div class="progress-bar" style="width: 59%">-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="actions">-->
<!--                        <ul>-->
<!--                            <li><span class="js-btn-prev" title="BACK"><i class="fa fa-arrow-left"></i> BACK </span></li>-->
<!--<!--                            <li><span class="js-btn-next" title="NEXT">  NEXT <i class="fa fa-arrow-right"></i></span></li>-->
<!--                            <li><span class="" title="NEXT"> <a href="http://localhost/epolicechecks/agent/application/name-based-check/consent/16f418d3b89013d71ad333e7c0cef569a27c1986cee04240fcbb8267a8d961d818fff78fbfbefbda42fc1516effc07456cee0f59ac5d55becded071b204b0e1a/100214"> NEXT </a><i class="fa fa-arrow-right"></i></span></li>-->
<!--                        </ul>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->











            <!-- div 4 -->
<!--            <div class="multisteps-form__panel" data-animation="slideHorz">-->
<!--                <div class="wizard-forms">-->
<!--                    <div class="inner pb-200 clearfix">-->
<!--                        <div class="wizard-title text-center">-->
<!--                            <h3>Name Based Check</h3>-->
<!--                        </div>-->
<!---->
<!--                        <br/>-->
<!---->
<!--<!--                        251 - 325-->
<!---->
<!--                        <div class="row" style="padding-left: 15px; padding-right: 15px; margin-right: 15px; margin-left: 15px;">-->
<!--                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">-->
<!--                                <label> Last Name: </label>-->
<!--                                <input required="" type="text" name="consent_last_name"class="form-control input"/>-->
<!--                            </div>-->
<!--                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">-->
<!--                                <label> First Name: </label>-->
<!--                                <input required="" type="text" name="consent_first_name"class="form-control input"/>-->
<!--                            </div>-->
<!--                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">-->
<!--                                <label> Middle Name:  </label>-->
<!--                                <input type="text" name="consent_middle_name" class="form-control input"/>-->
<!--                            </div>-->
<!--                        </div>-->
<!---->
<!--                        <br/>-->
<!---->
<!--                        <div class="row" style="padding-left: 15px; padding-right: 15px; margin-right: 15px; margin-left: 15px;">-->
<!--                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">-->
<!--                                <label> Maiden/Alias/Nickname: </label>-->
<!--                                <input type="text" name="consent_nickname" class="form-control input"/>-->
<!--                            </div>-->
<!--                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="padding-top: 25px;">-->
<!--                                <label> Gender: </label> &nbsp; &nbsp;-->
<!--                                <input required="" type="radio" value="Male" required="" name="consent_gender"/> Male &nbsp; &nbsp;-->
<!--                                <input required="" type="radio" value="Female" name="consent_gender"/> Female &nbsp; &nbsp;-->
<!--                                <input required="" type="radio" value="Unknown" name="consent_gender"/> Unknown &nbsp; &nbsp;-->
<!--                            </div>-->
<!--                        </div>-->
<!---->
<!--                        <br/>-->
<!---->
<!--                        <div class="row" style="padding-left: 15px; padding-right: 15px; margin-right: 15px; margin-left: 15px;">-->
<!--                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">-->
<!--                                <label> Date of Birth: </label>-->
<!--                                <input required="" type="date" name="consent_dob" class="form-control input"/>-->
<!--                            </div>-->
<!--                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">-->
<!--                                <label> Place of Birth: </label>-->
<!--                                <input required="" type="text" name="consent_birth_place" placeholder="City/Town, Province/State" class="form-control input"/>-->
<!--                            </div>-->
<!--                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">-->
<!--                                <label> Country: </label>-->
<!--                                <select name="consent_country" required="" class="form-control input">-->
<!--                                    <option selected=""> ---Select Your Country--- </option>-->
<!--                                    <option> Australia </option>-->
<!--                                    <option> Canada </option>-->
<!--                                    <option> Italy </option>-->
<!--                                    <option> Germany </option>-->
<!--                                    <option> Pakistan </option>-->
<!--                                    <option> England </option>-->
<!--                                </select>-->
<!--                            </div>-->
<!--                        </div>-->
<!---->
<!--                        <br/>-->
<!--                        <br/>-->
<!---->
<!---->
<!--                        <div class="row" style="padding-left: 15px; padding-right: 15px; margin-right: 15px; margin-left: 15px;">-->
<!--                            <div class="col-lg-4  col-md-4  col-sm-4 col-xs-12">-->
<!--                                <label>Telephone:</label>-->
<!--                                <input required="" type="number" name="consent_phone" class="form-control input"/>-->
<!--                            </div>-->
<!--                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">-->
<!--                                <label>Cell:</label>-->
<!--                                <input type="number" name="consent_cellphone" class="form-control input"/>-->
<!--                            </div>-->
<!--                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">-->
<!--                                <label>Email:</label>-->
<!--                                <input required="" type="email" name="consent_email" class="form-control input"/>-->
<!--                            </div>-->
<!--                        </div>-->
<!---->
<!---->
<!---->
<!---->
<!--                        <br/>-->
<!--                        <br/>-->
<!--                        <br/>-->
<!--                        <br/>-->
<!--                        <br/>-->
<!--                        <br/>-->
<!--                        <br/>-->
<!---->
<!---->
<!---->
<!---->
<!--                        <div class="wizard-v3-progress">-->
<!--                            <span>4 to 5 step</span>-->
<!--                            <h3>79% to complete</h3>-->
<!--                            <div class="progress">-->
<!--                                <div class="progress-bar" style="width: 79%">-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="actions">-->
<!--                        <ul>-->
<!--                            <li><span class="js-btn-prev" title="BACK"><i class="fa fa-arrow-left"></i> BACK </span></li>-->
<!--                            <li><button type="submit" id="submit-button" title="Submit">SUBMIT <i class="fa fa-arrow-right"></i></button></li>-->
<!--                        </ul>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->

        </div>
    </form>
</div>

<script src="<?php echo base_url('site-assets') ?>/step_form_files/jquery-3.3.1.min.js"></script>
<script src="<?php echo base_url('site-assets') ?>/step_form_files/popper.min.js"></script>
<script src="<?php echo base_url('site-assets') ?>/step_form_files/bootstrap.min.js"></script>
<script src="<?php echo base_url('site-assets') ?>/step_form_files/slick.min.js"></script>
<script src="<?php echo base_url('site-assets') ?>/step_form_files/main.js"></script>
<script src="<?php echo base_url('site-assets') ?>/step_form_files/switch.js"></script>
</body>

</html>
