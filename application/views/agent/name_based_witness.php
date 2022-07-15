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
</style>

<body>

<div class="clearfix"></div>


<div class="wrapper wizard d-flex clearfix multisteps-form position-relative">
    <div class="steps order-2 position-relative w-25">
        <div class="multisteps-form__progress">
            <span class="multisteps-form__progress-btn js-active" title="Witness Section"><i class="fa fa-user"></i> Witness Section <span></span></span>
        </div>
    </div>
    <form class="multisteps-form__form w-75 order-1" action="<?= base_url() ?>/agent/name-based-check/success/12/21" method="post" id="wizard">

        <div class="form-area position-relative">
            <!-- div 1 -->
            <div class="multisteps-form__panel js-active" data-animation="slideHorz">
                <div class="wizard-forms">
                    <div class="inner pb-200 clearfix">
                        <div class="wizard-title text-center">
                            <h3>Witness Section</h3>
                        </div>
                        <br/>
                        <div class="row" style="padding-left: 15px; padding-right: 15px; margin-right: 15px; margin-left: 15px;">
                            <div class="col-lg-12 col-md-12">
                                <b >
                                    Witness Section:
                                </b>
                                &nbsp; &nbsp;
                            </div>
                        </div>


                        <div class="row" style="padding-left: 15px; padding-right: 15px; margin-right: 15px;
                                     margin-left: 15px;">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <p  style="color: black;" align="justify">
                                    I solemnly declare by my true signature that I am not the applicant and have verified the applicant's identity by comparing two authorized pieces of ID, one of which was an authorized government photo ID. I confirm that the ID indicated matches the applicant and that the photo image is a true likeness of the applicant. I declare that I understand it is an offence to make a false statement.
                                </p>
                            </div>
                        </div>
                        <br/>
                        <div class="row" style="margin-left: 15px; margin-right: 15px;">
                            <table width="100%" id="offence-details">
                                <tr style="background-color: #9ac0cd;">
                                    <td align="center"> <b> Identification Type: </b> </td>
                                    <td align="center"> <b> ID Number:  </b> </td>
                                    <td align="center"> <b> Photo </b> </td>
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

                            <button type="button" id="add-offence" class="btn btn-default" aria-label="Plus Sign">
                                <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>
                            </button>
                        </div>

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
<!--                            <li><span class="js-btn-prev" title="BACK"><i class="fa fa-arrow-left"></i> BACK </span></li>-->
<!--                            <li><span class="js-btn-next" title="NEXT">Submit <i class="fa fa-arrow-right"></i></span></li>-->
                            <li>
                            <button type="submit" id="submit-button" title="NEXT">SUBMIT <i class="fa fa-arrow-right"></i></button>
                            </li>
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
</script>
</body>

</html>


