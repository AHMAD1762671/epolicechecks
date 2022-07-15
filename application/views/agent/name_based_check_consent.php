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

</head>

<style>
    ::after{
        display: none !important;
    }

    select.form-control:not([size]):not([multiple]) {
         height: calc(3.25rem + 2px) !important;
    }
</style>

<body>

<div class="clearfix"></div>

<?php //var_dump($application_data); ?>


<div class="wrapper wizard d-flex clearfix multisteps-form position-relative">
    <div class="steps order-2 position-relative w-25">
        <div class="multisteps-form__progress">
            <span class="multisteps-form__progress-btn js-active" title="Consent to Disclosure of Criminal Record and Personal Information Release"><i class="fa fa-user"></i>Consent to Disclosure of Cri... </span>
            <span class="multisteps-form__progress-btn" title="Address"><i class="fa fa-user"></i>Address</span>
            <span class="multisteps-form__progress-btn" title="Reason for Request"><i class="fa fa-user"></i>Reason for Request</span>
            <span class="multisteps-form__progress-btn" title="Declaration of Criminal Record"><i class="fa fa-user"></i>Declaration of Criminal Record</span>
            <span class="multisteps-form__progress-btn" title="Signature"><i class="fa fa-user"></i>Signature</span>
        </div>
    </div>
    <form class="multisteps-form__form w-75 order-1" action="<?= base_url() ?>agent/application/name-based-check/consent" method="post" id="wizard">

        <div class="form-area position-relative">
            <!-- div 1 -->
            <div class="multisteps-form__panel js-active" data-animation="slideHorz">
                <div class="wizard-forms">
                    <div class="inner pb-100 clearfix">
                        <div class="wizard-title text-center">
                            <h3>Consent to Disclosureof Criminal Record and Personal Information Release</h3>

                            <h4 style="color: #72bb4c;">Application Id: <?= $application_data->name_based_application_id ?></h4>
                        </div>
                        <br/>


                        <div class="row" style="padding-left: 15px; padding-right: 15px; margin-right: 15px; margin-left: 15px;">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <label> Last Name: </label>
                                <input required="" value="<?= $application_data->consent_last_name ?>" type="text" name="consent_last_name"class="form-control input"/>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <label> First Name: </label>
                                <input required="" value="<?= $application_data->consent_first_name ?>" type="text" name="consent_first_name"class="form-control input"/>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <label> Middle Name:  </label>
                                <input type="text" value="<?= $application_data->consent_middle_name ?>" name="consent_middle_name" class="form-control input"/>
                            </div>
                        </div>

                        <br/>

                        <div class="row" style="padding-left: 15px; padding-right: 15px; margin-right: 15px; margin-left: 15px;">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label> Maiden/Alias/Nickname: </label>
                                <input type="text" name="consent_nickname" value="<?= $application_data->consent_nickname ?>" class="form-control input"/>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="padding-top: 25px;">
                                <label> Gender: </label> &nbsp; &nbsp;
                                <input required="" type="radio" value="Male" value="Male" <?php if ( $application_data->consent_gender == "Male") echo "checked";?> required="" name="consent_gender"/> Male &nbsp; &nbsp;
                                <input required="" type="radio" value="Female" <?php if ( $application_data->consent_gender == "Female") echo "checked";?> name="consent_gender"/> Female &nbsp; &nbsp;
                                <input required="" type="radio" value="Unknown" <?php if ( $application_data->consent_gender == "Unknown") echo "checked";?> name="consent_gender"/> Unknown &nbsp; &nbsp;
                            </div>
                        </div>

                        <br/>

                        <div class="row" style="padding-left: 15px; padding-right: 15px; margin-right: 15px; margin-left: 15px;">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <label> Date of Birth: </label>
                                <input required="" type="date" name="consent_dob" value="<?= $application_data->consent_dob ?>" class="form-control input"/>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <label> Place of Birth: </label>
                                <input required="" type="text" name="consent_birth_place" value="<?= $application_data->consent_birth_place ?>" placeholder="City/Town, Province/State" class="form-control input"/>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <label> Country: </label>
                                <select name="consent_country" required="" class="form-control input">
                                    <option selected=""> ---Select Your Country--- </option>
                                    <option value="Australia" <?php if($application_data->consent_country == "Australia") echo 'selected="selected"'; ?>> Australia </option>
                                    <option value="Canada" <?php if($application_data->consent_country == "Canada") echo 'selected="selected"'; ?>> Canada </option>
                                    <option value="Italy" <?php if($application_data->consent_country == "Italy") echo 'selected="selected"'; ?>> Italy </option>
                                    <option value="Germany" <?php if($application_data->consent_country == "Germany") echo 'selected="selected"'; ?>> Germany </option>
                                    <option value="Pakistan" <?php if($application_data->consent_country == "Pakistan") echo 'selected="selected"'; ?>> Pakistan </option>
                                    <option value="England" <?php if($application_data->consent_country == "England") echo 'selected="selected"'; ?>> England </option>
                                </select>
                            </div>
                        </div>

                        <br/>
                        <br/>


                        <div class="row" style="padding-left: 15px; padding-right: 15px; margin-right: 15px; margin-left: 15px;">
                            <div class="col-lg-4  col-md-4  col-sm-4 col-xs-12">
                                <label>Telephone:</label>
                                <input required="" type="number" value="<?= $application_data->consent_phone ?>" name="consent_phone" class="form-control input"/>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <label>Cell:</label>
                                <input type="number" name="consent_cellphone" value="<?= $application_data->consent_cellphone ?>" class="form-control input"/>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <label>Email:</label>
                                <input required="" type="email" name="consent_email" value="<?= $application_data->consent_email ?>" class="form-control input"/>
                            </div>
                        </div>



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
                            <h3>Address</h3>
                        </div>

                        <div class="row" style="padding-left: 15px; padding-right: 15px; margin-right: 15px; margin-left: 15px;">
                            <div class="col-lg-12 col-md-12">
                                <label>Current address:</label>
                                <input required="" type="text" name="consent_current_address" value="<?= $application_data->consent_current_address ?>" class="form-control input"/>
                            </div>
                        </div>

                        <br/>
                        <br/>

                        <div class="row" style="padding-left: 15px; padding-right: 15px; margin-right: 15px; margin-left: 15px;">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <label>City:</label>
                                <input required="" type="text" name="consent_current_city" value="<?= $application_data->consent_current_city ?>" class="form-control input"/>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <label>Province:</label>
                                <input required="" type="text" name="consent_current_state" value="<?= $application_data->consent_current_state ?>" class="form-control input"/>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <label>Postal Code:</label>
                                <input required="" type="text" name="consent_current_post_code" value="<?= $application_data->consent_current_post_code ?>" class="form-control input"/>
                            </div>
                        </div>

                        <br/>
                        <br/>

                        <div class="row" style="padding-left: 15px; padding-right: 15px; margin-right: 15px; margin-left: 15px;">
                            <div class="col-lg-12 col-md-12">
                                <label>Previous Address, if less than 5 years: </label>
                                <input type="text" name="consent_previous_address" value="<?= $application_data->consent_previous_address ?>" class="form-control input"/>
                            </div>
                        </div>

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
                            <h3>Reason for Request :</h3>
                        </div>

                        <div class="row" style="margin-right: 15px; margin-left: 15px; padding-left: 15px; color: black;">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <input required="" type="radio" value="Employment / Pre-Employment" <?php echo ($application_data->consent_reason =='Employment / Pre-Employment')?'checked':'' ?> name="consent_reason"/> Employment / Pre-Employment
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <input required="" type="radio" value="Volunteer" <?php echo ($application_data->consent_reason =='Volunteer')?'checked':'' ?> name="consent_reason"/> Volunteer
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                <input required="" type="radio" value="Other" <?php echo ($application_data->consent_reason =='Other')?'checked':'' ?> name="consent_reason"/> Other :
                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <input type="text" name="consent_reason_other" class="form-control input" />
                            </div>
                        </div>

                        <br />
                        <br />

                        <div class="row"  style="padding-left: 15px; padding-right: 15px; margin-right: 15px; margin-left: 15px;">
                            <div class="col-lg-12 col-md-12 col-xs-12">
                                <p style="color: black;  text-align:justify;" >
                                    I hereby authorize and consent to the full disclosure of information by the Police service , Global Avenues
                                    Consulting Inc. o/a GAC Screening Solutions, its associates,  to Employer and/or Individual:
                                </p>

                                <br/>

                                <div class="row" style="margin-right: 15px; margin-left: 15px;">
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <label> Organization Name: </label>
                                        <input required="" type="text" name="consent_organization" value="<?= $application_data->consent_organization ?>" class="form-control input"/>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <label> Contact Person: </label>
                                        <input required="" type="text" name="consent_contact_name" value="<?= $application_data->consent_contact_name ?>" class="form-control input"/>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <label> Contact Number: </label>
                                        <input required="" type="text" name="consent_contact_phone" value="<?= $application_data->consent_contact_phone ?>" class="form-control input"/>
                                    </div>
                                </div>
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
                                    in this form is complete and accurate in every respect. <br />
                                    <strong> Privacy Policy Statement: </strong> The information on
                                    this form is required for the purpose of conducting criminal record check. The information collected
                                    and disclosed in this form is in compliance with all federal, provincial and municipal laws.
                                </p>
                            </div>
                        </div>
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
                            <h3>Declaration of Criminal Record</h3>
                        </div>
                        <div class="row" style="padding-left: 15px; padding-right: 15px; margin-right: 15px; margin-left: 15px;">
                            <div class="col-lg-12 col-md-12">
                                <b >Have you ever been convicted of a criminal offence for which a pardon has not been granted? &nbsp; &nbsp;
                                    <input required="" type="radio" value="Yes" <?php echo ($application_data->consent_criminal_offence =='Yes')?'checked':'' ?> name="consent_criminal_offence"/> Yes &nbsp; &nbsp;
                                    <input required="" type="radio" value="No" <?php echo ($application_data->consent_criminal_offence =='No')?'checked':'' ?> name="consent_criminal_offence"/> No &nbsp; &nbsp;
                                </b>
<!--                                &nbsp; &nbsp;-->
                                <br/>
                                <br/>
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
                        <div class="row" style="margin-left: 15px; margin-right: 15px;">
                            <table width="100%" id="offence-details">
                                <tr style="background-color: #9ac0cd;">
                                    <td align="center"> <b> Offence </b> </td>
                                    <td align="center"> <b> Date of Sentence (YYYY/MM/DD) </b> </td>
                                    <td align="center"> <b> Court Location (City, Province) </b> </td>
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

                            <input type="hidden" name="application_id" value="<?= $application_data->name_based_application_id ?>">

                            <button type="button" id="add-offence" class="btn btn-default" aria-label="Plus Sign">
                                <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>
                            </button>
                        </div>

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
                            <li><span class="js-btn-next" title="NEXT">NEXT <i class="fa fa-arrow-right"></i></span></li>
                        </ul>
                    </div>
                </div>
            </div>




            <!-- div 5 -->
            <div class="multisteps-form__panel" data-animation="slideHorz">
                <div class="wizard-forms">
                    <div class="inner pb-100">
                        <div class="wizard-title text-center">
                            <h3>Signature</h3>
                        </div>

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

                        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

                        <div class="row">
                            <div class="container">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a data-toggle="tab" href="#home">Draw your Signature</a></li>
                                    <li><a data-toggle="tab" href="#menu2">Upload signature image</a></li>
                                </ul>

                                <div class="tab-content">
                                    <h3>Previous Saved Signature</h3>
                                    <img src="<?=  base_url().'upload/applicant_signatures/'. $application_data->consent_signature_drawable ?>">
                                    
                                    <div id="home" class="tab-pane fade in active" style="">
                                        <h3>Draw New Signature (if you want)</h3>
                                        <style>
                                            #canvasDiv{
                                                position: relative;
                                                border: 2px dashed grey;
                                                height:300px;
                                                width: 740px;
                                            }
                                        </style>
                                        <section>
                                            <div class="row">
                                                <div class="board">
                                                    <div class="tab-content">
                                                        <div class="tab-pane fade in active" id="step1" style="">
                                                            <div class="row" style="margin-right: 15px;">

                                                                <div class="col-md-8 col-md-offset-2" style="float: left;">

                                                                    <div id="canvasDiv"></div>
                                                                    <br>
                                                                    <button type="button" class="btn btn-danger" id="reset-btn">Clear</button>
                                                                    <!-- <button type="button" class="btn btn-success" id="btn-save">Save</button>-->
                                                                </div>
<!--                                                                <form id="signatureform" action="--><?php //echo base_url() ?><!--agent/save_name_based_check_drawable_signature" enctype="multipart/form-data" style="display:none" method="post">-->
                                                                    <input type="hidden" id="signature" name="signature">
                                                                    <input type="hidden" name="signaturesubmit" value="1">

<!--                                                                </form>-->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    </div>

                                    <div id="menu2" class="tab-pane fade" style="margin-bottom: 50px;">
<!--                                        <form action="--><?php //echo base_url() ?><!--agent/save_name_based_check_picture_signature" method="post" enctype="multipart/form-data">-->

                                            <div class="col-lg-6 col-md-4 col-sm-6 col-xs-6">
                                                <label style="color: black;">Applicant Signature's picture:</label> &nbsp; <input style="color: black;" type="file" name="consent_signature_picture"/>
                                            </div>

                                            <br/>

                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" align="right">
                                                <!--                                                                <button type="submit" class="btn btn-success" style="width: 139px; margin-left: 55px;">Submit</button>-->
                                            </div>
<!--                                        </form>-->
                                    </div>

                                </div>
                            </div>
                        </div>



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



                        <br/>
                        <br/>

                        <div class="wizard-v3-progress">
                            <span>5 to 5 step</span>
                            <h3>100% to complete</h3>
                            <div class="progress">
                                <div class="progress-bar" style="width: 100%">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.inner -->
                    <div class="vector-img-one position-relative">
                        <h3>Are you Sure want to go next.?</h3>
                    </div>
                    <div class="actions mt-60">
                        <ul>
                            <li><span class="js-btn-prev" title="BACK"><i class="fa fa-arrow-left"></i> BACK </span></li>
                            <li><button type="submit" id="submit-button" title="NEXT">SUBMIT <i class="fa fa-arrow-right"></i></button></li>
                            <!--                            <button type="submit" class="btn btn-success" id="submit-button">Submit</button>-->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>



<script src="<?php echo base_url('site-assets') ?>/step_form_files/jquery-3.3.1.min.js"></script>
<script src="<?php echo base_url('site-assets') ?>/step_form_files/popper.min.js"></script>
<script src="<?php echo base_url('site-assets') ?>/step_form_files/bootstrap.min.js"></script>
<script src="<?php echo base_url('site-assets') ?>/step_form_files/slick.min.js"></script>
<script src="<?php echo base_url('site-assets') ?>/step_form_files/main.js"></script>
<script src="<?php echo base_url('site-assets') ?>/step_form_files/switch.js"></script>

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
</body>

</html>