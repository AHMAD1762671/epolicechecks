
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Wizard V3</title>
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
            <span class="multisteps-form__progress-btn js-active" title="Application data"><i class="fa fa-user"></i><span>Personal information</span></span>
            <span class="multisteps-form__progress-btn" title="Tax residency"><i class="fa fa-user"></i><span>ADDRESS</span></span>
            <span class="multisteps-form__progress-btn" title="Indentity documents"><i class="fa fa-user"></i><span>REASON FOR REQUEST :</span></span>
            <span class="multisteps-form__progress-btn" title="Investability"><i class="fa fa-user"></i><span>DECLARATION OF CRIMINAL RECORD</span></span>
<!--            <span class="multisteps-form__progress-btn" title="Review"><i class="fa fa-user"></i><span>Review </span></span>-->
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




<!--                        <div class="row">-->
<!--                            <div class="col-sm-12 text-center">-->
<!--                                <img src="--><?//= base_url('site-assets') ?><!--/images/Logo_epolicecheckfinal-02.png" style="height: 200px; width: 343px;">-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="row">-->
<!--                            <div class="col-sm-12 text-center text-info">-->
<!--                                <h5>"How can we help you today? Select a service to get started"</h5>-->
<!--                            </div>-->
<!--                        </div>-->



                        <div class="row" style="margin-bottom: 20px;">
                            <div class="col-sm-4">

<!--                            <input type="radio" class="form-control input" checked>-->
                        </div>


                            <div class="col-sm-4 text-dark bg-white text-center abc " style=" border: 1px solid #d1d4db;

         border-bottom: 4px solid #c1d72f;">

                                <input type="radio" class="form-control input" checked>

<!--                                <a href="--><?//= base_url() ?><!--agent/application/criminal-record-check">-->



                                    <img src="<?= base_url('site-assets') ?>/images/police.png" class="mt-5 mb-2 " style="height: 59px; width: 70px;  ">
                                    <h5 class="mt-3">Criminal Record Check</h5>
<!--                                </a>-->
                            </div>

<!--                            <div class="col-sm-2  ">-->
<!---->
<!--                            </div>-->
                        </div>


<!--                        <div class="row" >-->
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

                        <br/>
                        <br/>
                        <br/>
                        <br/>
                        <br/>
                        <br/>
                        <br/>
                        <br/>

<!--                        <div class="row" >-->
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

                        <br/>
                        <br/>
                        <br/>

<!--                        <div class="row" >-->
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

                        <br/>
                        <br/>


<!--                        <div class="row" >-->
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
                        <br/>
                        <br/>
                        <br/>
                        <br/>
                        <br/>
                        <br/>

                        <br/>
                        <br/>


                        <br/>
                        <br/>

                        <br/>
                        <br/>


                        <div class="wizard-v3-progress">
                            <span>2 to 5 step</span>
                            <h3>38% to complete</h3>
                            <div class="progress">
                                <div class="progress-bar" style="width: 38%">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="actions">
                        <ul>
                            <li><span class="js-btn-prev" title="BACK"><i class="fa fa-arrow-left"></i> BACK </span></li>
                            <li><span class="js-btn-next" title="NEXT">NEXT <i class="fa fa-arrow-right"></i></span></li>
                        </ul>
                    </div>
                </div>
            </div>







            <!-- div 3 -->
            <div class="multisteps-form__panel" data-animation="slideHorz">
                <div class="wizard-forms">
                    <div class="inner pb-100 clearfix">
                        <div class="wizard-title text-center">
                            <h3>Select one of the following</h3>
                        </div>

                        <div class="row" style="margin-bottom: 70px;">
                            <div class="col-sm-2"> </div>

                            <div class="col-sm-4 text-dark bg-white text-center abc " style=" border: 1px solid #d1d4db; border-bottom: 4px solid #c1d72f;">
                                <input type="radio" name="canada" class="form-control input" >
                                    <img src="<?= base_url('site-assets') ?>/images/Canadian.gif" class="mt-5 mb-2 " style="height: 139px; width: i35px;  ">
                                    <h5 class="mt-3">CANADA</h5>
                                    <p>I am currently residing in Canada </p>
                            </div>


                            <div class="col-sm-4 text-dark  bg-white text-center abc" style="margin-left: 10px; border: 1px solid #d1d4db; border-bottom: 4px solid #c1d72f;">
                                <input type="radio" name="canada" class="form-control input">
                                    <img src="<?= base_url('site-assets') ?>/images/map.png" class="mt-5 mb-2 " style="height: 139px; width: 135px;  ">
                                    <h5 class="mt-3">INTERNATIONAL</h5>
                                    <p>I am currently residing in a foreign country </p>
                            </div>
                            <div class="col-sm-2  "></div>
                        </div>



                        <br />
                        <br />

                        <div class="wizard-v3-progress">
                            <span>3 to 5 step</span>
                            <h3>59% to complete</h3>
                            <div class="progress">
                                <div class="progress-bar" style="width: 59%">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="actions">
                        <ul>
                            <li><span class="js-btn-prev" title="BACK"><i class="fa fa-arrow-left"></i> BACK </span></li>
                            <li><span class="js-btn-next" title="NEXT">NEXT <i class="fa fa-arrow-right"></i></span></li>
                        </ul>
                    </div>
                </div>
            </div>











            <!-- div 4 -->
            <div class="multisteps-form__panel" data-animation="slideHorz">
                <div class="wizard-forms">
                    <div class="inner pb-200 clearfix">
                        <div class="wizard-title text-center">
                            <h3>DECLARATION OF CRIMINAL RECORDr</h3>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="inputdefault">Address:</label>
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


                        <br/>
                        <br/>
                        <br/>





                        <div class="row" >
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="inputdefault">Name/Company/Third Party Name:</label>
                                    <input class="form-control" id="inputdefault" required="" name="delivery_name" type="text">
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="inputdefault">Address:</label>
                                    <input class="form-control" id="inputdefault" required="" name="delivery_address" type="text">
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="inputdefault">City:</label>
                                    <input class="form-control" id="inputdefault" required="" name="delivery_city" type="text">
                                </div>

                            </div>
                            <!--CITY-->
                            <!--Province-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="inputdefault">Province:</label>
                                    <input class="form-control" id="inputdefault" required="" name="delivery_state" type="text">
                                </div>
                            </div>
                            <!--Province-->
                            <!--Country-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="inputdefault">Country:</label>
                                    <input class="form-control" id="inputdefault" required="" name="delivery_country" type="text">
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="inputdefault">Tel:</label>
                                    <input class="form-control" id="inputdefault" required="" name="delivery_phone" type="text">
                                </div>
                            </div>
                            <!--Tel-->
                            <!--Email-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="inputdefault">Email:</label>
                                    <input class="form-control" id="inputdefault" type="text" required="" name="delivery_email">
                                </div>
                            </div>
                        </div>








                        <br/>
                        <br/>
                        <br/>

                        <br/>
                        <br/>
                        <br/>


                        <br/>
                        <br/>




                        <div class="wizard-v3-progress">
                            <span>4 to 5 step</span>
                            <h3>79% to complete</h3>
                            <div class="progress">
                                <div class="progress-bar" style="width: 79%">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="actions">
                        <ul>
                            <li><span class="js-btn-prev" title="BACK"><i class="fa fa-arrow-left"></i> BACK </span></li>
                            <li><button type="submit" id="submit-button" title="Submit">SUBMIT <i class="fa fa-arrow-right"></i></button></li>
<!--                            <li><span class="js-btn-next" title="NEXT">NEXT <i class="fa fa-arrow-right"></i></span></li>-->
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </form>
</div>
<script src="https://jthemes.net/themes/html/wizard-form/v3/assets/js/jquery-3.3.1.min.js"></script>
<script src="https://jthemes.net/themes/html/wizard-form/v3/assets/js/popper.min.js"></script>
<script src="https://jthemes.net/themes/html/wizard-form/v3/assets/js/bootstrap.min.js"></script>
<script src="https://jthemes.net/themes/html/wizard-form/v3/assets/js/slick.min.js"></script>
<script src="https://jthemes.net/themes/html/wizard-form/v3/assets/js/main.js"></script>
<script src="https://jthemes.net/themes/html/wizard-form/v3/assets/js/switch.js"></script>
<script>
//    function readURL(input) {
//        if (input.files && input.files[0]) {
//            var reader = new FileReader();
//
//            reader.onload = function(e) {
//                $('#profile-image')
//                    .attr('src', e.target.result)
//                    .width(150)
//                    .height(200);
//            };
//
//            reader.readAsDataURL(input.files[0]);
//        }
//    };
//    $("#customFile").change(function() {
//        filename = this.files[0].name
//    });
</script>
</body>

</html>