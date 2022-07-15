<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style>
    p{
        font-size: 11px;
    }
    .first_style tr td{
        font-size: 10px;
    }
    .second_style tr td{
        font-size: 10px;
    }
    .third_style th{
        font-size: 10px;
    }
    .third_style th td{
        font-size: 8px;
    }
    .forth_style td{
        font-size: 10px;
    }
    ul {
        list-style: none;
    }
    ul li:before {
        content: '*';
    }
    button {
        height: 14px;
    }

    input[type=checkbox] {
        transform: scale(1.5);
    }

</style>




<div class="tab-content" id="profileTabContent"  style="background-image: url('<?php echo base_url('assets/images/bg-img-pdf.jpg'); ?>'); background-repeat: no-repeat; opacity: 0.5; background-position: center;">

    <div class="tab-pane fade active show">

        <table class="table" style="padding-top: -30px;">
            <thead>
            <tr>
                <td colspan="1" style="float: left; clear: both;"> <b> <img style="width: 100px; height: 65px; padding-top: 7px;" src="<?php echo base_url('assets/images/logox.png'); ?>" alt=""> </b></td>
                <td colspan="1" style="text-align: center; color: red; font-size: 18px;"> <b> Fingerprinting Form</b></td>
                <td colspan="1" style="text-align: right !important; clear: both; line-height: normal; font-size: 9px;">
                    <!--                    <span style="float: right !important; clear: both; line-height: normal; font-size: 9px;">-->
                    200 – 7404 King George Blvd., <br>
                    Surrey, BC V3W 1N6 <br>
                    <b>Tel:</b> 604.501.0800 <b>Fax:</b> 604.501.0848 <br>
                    <b>Email:</b> info@gacgroup.ca <br/>
                    <b>Web:</b> www.gacgroup.ca
                    <!--                    </span>-->
                </td>
            </tr>
            </thead>
        </table>

        <hr style="height:1px;border-width:0;color:red;background-color:red; padding: -3px 0 -5px 3px;">

        <p style="font-size: 10px; border-bottom: 2px solid red; width: 24%; margin-bottom: -1px;"><b>CLIENT PERSONAL INFORMATION</b></p>
        <table class="table table-bordered second_style" style="background-color: #f2f2f263 !important; margin-top: 1px;">
            <tbody style="border-top-style: none; border-bottom-style: none;">
            <tr style="border-top-style: none; border-bottom-style: none;">
                <td style="border-top-style: none; border-bottom-style: none; border-right-style: none; border-left-style: none;"> <b> Last Name: </b><?= $application->consent_last_name ?></td>
                <td style="border-top-style: none; border-bottom-style: none; border-right-style: none; border-left-style: none;"> <b>First Name:</b> <?= $application->consent_first_name ?></td>
                <td style="border-top-style: none; border-bottom-style: none; border-right-style: none; border-left-style: none;"> <b>Middle Name:</b> <?= $application->consent_middle_name ?></td>
            </tr>
            <tr style="border-top-style: none; border-bottom-style: none;">
                <td style="border-top-style: none; border-bottom-style: none; border-right-style: none; border-left-style: none;"> <b>Maiden/Alias/Nickname:</b> <?= $application->consent_maiden_name ?></td>
                <td style="border-top-style: none; border-bottom-style: none; border-right-style: none; border-left-style: none;"> <b> Date of Birth:   </b> <?= $application->consent_dob ?> </td>
                <td style="border-top-style: none; border-bottom-style: none; border-right-style: none; border-left-style: none;"> <b> Place of Birth:   </b> <?= $application->consent_place_of_birth ?></td>
            </tr>
            </tbody>
        </table>


        <p style="font-size: 10px; border-bottom: 2px solid red; width: 15%; margin-bottom: -1px;"><b>CUREENT ADDRESS</b></p>
        <table class="table table-bordered second_style" style="background-color: #f2f2f263 !important;margin-top: 1px">
            <tbody style="border-top-style: none; border-bottom-style: none;">
            <tr style="border-top-style: none; border-bottom-style: none;">
                <td  colspan="6" style="border-right-style: none; border-left-style: none; border-top-style: none; border-bottom-style: none;"> <b>Street address:</b> <?= $application->consent_current_address ?> </td>
            </tr>
            <tr style="border-top-style: none; border-bottom-style: none;">
                <td  colspan="2" style="border-top-style: none; border-bottom-style: none; border-right-style: none; border-left-style: none;"> <b>City:</b> </td>
                <td  colspan="2" style="border-top-style: none; border-bottom-style: none; border-right-style: none; border-left-style: none;"> <b>Province:</b>  </td>
                <td  colspan="2" style="border-top-style: none; border-bottom-style: none; border-right-style: none; border-left-style: none;"> <b>Postal Code:</b>  </td>
            </tr>
            </tbody>
        </table>



        <p style="font-size: 10px; border-bottom: 2px solid red;width: 28%; margin-bottom: -1px;"><b>PERSONAL APPREANCE INFORMATION</b></p>
        <table class="table table-bordered second_style" style="border-top-style: none; border-bottom-style: none; background-color: #f2f2f263 !important;margin-top: 1px">
            <tbody>
            <tr style="border-top-style: none; border-bottom-style: none;">
                <td  colspan="1" style="border-right-style: none; border-left-style: none;"> <b>Sex: </b>  <?php echo $application->gender; ?> </td>
                <td  colspan="1" style="border-right-style: none; border-left-style: none;">   <b>Hair Color: </b> <?php echo $application->hair_color; ?>  </td>
                <td  colspan="1" style=" border-right-style: none; border-left-style: none;"> <b>Eye Color: </b> <?php echo $application->eye_color; ?>   </td>
                <td  colspan="1" style="border-right-style: none; border-left-style: none;">  <b>Height: </b> <?php echo $application->height; ?>  </td>
                <td  colspan="1" style="border-right-style: none; border-left-style: none;">  <b>Weight:  </b> <?php echo $application->weight ?>  </td>

            </tr>
            </tbody>
        </table>





        <p style="font-size: 10px; border-bottom: 2px solid red;width: 22%; margin-bottom: -1px;"><b>PURPOSE OF FINGERPRINTING</b></p>
        <table class="table table-bordered second_style" style=" border-bottom-style: none; background-color: #f2f2f263 !important;margin-top: 1px">
            <tbody>
            <tr style="border-top-style: none; border-bottom-style: none;">
                <td style="border-top-style: none; border-bottom-style: none; border-right-style: none; border-left-style: none;">
                    <label style="position: relative; padding-left: 20px;">
                        <input style="position: absolute; top: -1px; left: 0;" type="checkbox" <?php echo ($application->federal_employment ==1 ? 'checked' : '');?>> <b>Federal Employment </b>
                    </label>
                </td>
                <td style="border-top-style: none; border-bottom-style: none; border-right-style: none; border-left-style: none;"> <b>  Employer Name: </b>  <?= $application->federal_employer_name ?> </td>
                <td style="border-top-style: none; border-bottom-style: none; border-right-style: none; border-left-style: none;"> <b>  Job Title:  </b>  abc dummy </td>
            </tr>

            <tr style="border-top-style: none; border-bottom-style: none;">
                <td style="border-top-style: none; border-bottom-style: none; border-right-style: none; border-left-style: none;"><label style="position: relative; padding-left: 20px;"> <input style="position: absolute; top: -1px; left: 0;" type="checkbox" <?php echo ($application->provincial_employment ==1 ? 'checked' : '');?>> <b>Provincial Employment </b></label> </td>
                <td style="border-top-style: none; border-bottom-style: none; border-right-style: none; border-left-style: none;"> <b> Employer Name: </b>  abc dummy </td>
                <td style="border-top-style: none; border-bottom-style: none; border-right-style: none; border-left-style: none;"> <b>  Job Title:  </b> abc dummy </td>

            </tr>

            <tr style="border-top-style: none; border-bottom-style: none;">
                <td style="border-top-style: none; border-bottom-style: none; border-right-style: none; border-left-style: none;"><label style="position: relative; padding-left: 20px;"> <input style="position: absolute; top: -1px; left: 0;" type="checkbox" <?php echo ($application->private_industry ==1 ? 'checked' : '');?>> <b>Private Industry </b></label> </td>
                <td style="border-top-style: none; border-bottom-style: none; border-right-style: none; border-left-style: none;"> <b>  Company Name: </b>  abc dummy </td>
                <td style="border-top-style: none; border-bottom-style: none; border-right-style: none; border-left-style: none;"> <b>  Position:  </b> abc dummy </td>

            </tr>

            <tr style="border-top-style: none; border-bottom-style: none;">
                <td style="border-top-style: none; border-bottom-style: none; border-right-style: none; border-left-style: none;"><label style="position: relative; padding-left: 20px;"> <input style="position: absolute; top: -1px; left: 0;" type="checkbox" <?php echo ($application->Citizenship ==1 ? 'checked' : '');?>> <b>Citizenship</b></label> </td>
                <td style="border-top-style: none; border-bottom-style: none; border-right-style: none; border-left-style: none;"> <b>  IRCC File No: </b>  abc dummy </td>
                <td style="border-top-style: none; border-bottom-style: none; border-right-style: none; border-left-style: none;"> <b>  UCI :  </b> abc dummy </td>
            </tr>

            </tbody>
        </table>



        <table class="table table-bordered second_style" style=" border-top-style: none; background-color: #f2f2f263 !important; margin-top: -20px;">
            <tbody>

            <tr style="border-top-style: none; border-bottom-style: none;">
                <td  style="border-top-style: none; border-bottom-style: none; border-right-style: none; border-left-style: none;"><label style="position: relative; padding-left: 20px;"> <input style="position: absolute; top: -1px; left: 0;" type="checkbox" <?php echo ($application->permanent_residency ==1 ? 'checked' : '');?>> <b>Permanent Residency</b></label> </td>
                <td style="border-top-style: none; border-bottom-style: none; border-right-style: none; border-left-style: none;"><label style="position: relative; padding-left: 20px;"> <input style="position: absolute; top: -1px; left: 0;" type="checkbox" <?php echo ($application->vulnerable_sector ==1 ? 'checked' : '');?>> <b>Vulnerable Sector</b> </label></td>
                <td style="border-top-style: none; border-bottom-style: none; border-right-style: none; border-left-style: none;"><label style="position: relative; padding-left: 20px;"> <input style="position: absolute; top: -1px; left: 0;" type="checkbox" <?php echo ($application->volunteer_work ==1 ? 'checked' : '');?>> <b>Volunteer Work</b> </label></td>
                <td style="border-top-style: none; border-bottom-style: none; border-right-style: none; border-left-style: none;"><label style="position: relative; padding-left: 20px;"> <input style="position: absolute; top: -1px; left: 0;" type="checkbox" <?php echo ($application->adoption ==1 ? 'checked' : '');?>> <b>Adoption</b> </label></td>
                <td style="border-top-style: none; border-bottom-style: none; border-right-style: none; border-left-style: none;"><label style="position: relative; padding-left: 20px;"> <input style="position: absolute; top: -1px; left: 0;" type="checkbox" <?php echo ($application->fbi ==1 ? 'checked' : '');?>> <b>FBI</b> </label></td>

            </tr>

            <tr style="border-top-style: none; border-bottom-style: none;">
                <td style="border-top-style: none; border-bottom-style: none; border-right-style: none; border-left-style: none;"><label style="position: relative; padding-left: 20px;"> <input style="position: absolute; top: -1px; left: 0;" type="checkbox" <?php echo ($application->record_suspension ==1 ? 'checked' : '');?>> <b>Record Suspension</b></label> </td>
                <td style="border-top-style: none; border-bottom-style: none; border-right-style: none; border-left-style: none;"><label style="position: relative; padding-left: 20px;"> <input style="position: absolute; top: -1px; left: 0;" type="checkbox" <?php echo ($application->us_entry_waiver_travel_visa ==1 ? 'checked' : '');?>> <b>U.S. Entry Waiver/Travel/Visa</b></label> </td>
                <td style="border-top-style: none; border-bottom-style: none; border-right-style: none; border-left-style: none;"><label style="position: relative; padding-left: 20px;"> <input style="position: absolute; top: -1px; left: 0;" type="checkbox" <?php echo ($application->name_change ==1 ? 'checked' : '');?>> <b>Name Change</b></label> </td>
                <td style="border-top-style: none; border-bottom-style: none; border-right-style: none; border-left-style: none;"><label style="position: relative; padding-left: 20px;"> <input style="position: absolute; top: -1px; left: 0;" type="checkbox" <?php echo ($application->other ==1 ? 'checked' : '');?>> <b>Other:</b> </label> </td>
                <td style="border-top-style: none; border-bottom-style: none; border-right-style: none; border-left-style: none;"><label style="position: relative;"> <b>abc dummy conetnt hellow</b> </label> </td>
            </tr>
            </tbody>
        </table>





        <!--            <p style="font-size: 10px;border-bottom: 2px solid red;width: 21%; margin-bottom: -3px;"><b>Where did you hear about us?  </b></p>-->
        <p style="font-size: 10px;border-bottom: 2px solid red;width: 26%; margin-bottom: -1px;"><b>WHERE DID YOU HEAR ABOUT US?  </b></p>
        <table class="table table-bordered second_style" style="margin-bottom: 13px; background-color: #f2f2f263 !important;margin-top: 1px">
            <tbody>
            <tr style="border-top-style: none; border-bottom-style: none;">
                <td  colspan="1" style="border-top-style: none; border-bottom-style: none; border-right-style: none; border-left-style: none;"> <label style="position: relative; padding-left: 20px;"><input style="position: absolute; top: -1px; left: 0;" type="checkbox" <?php echo ($application->others ==1 ? 'checked' : '');?>> <b>Walk-In </b> </label> </td>
                <td  colspan="1" style="border-top-style: none; border-bottom-style: none; border-right-style: none; border-left-style: none;"> <label style="position: relative; padding-left: 20px;"><input style="position: absolute; top: -1px; left: 0;" type="checkbox" <?php echo ($application->others ==1 ? 'checked' : '');?>> <b>Online </b> </label> </td>
                <td  colspan="1" style="border-top-style: none; border-bottom-style: none; border-right-style: none; border-left-style: none;"> <label style="position: relative; padding-left: 20px;"><input style="position: absolute; top: -1px; left: 0;" type="checkbox" <?php echo ($application->others ==1 ? 'checked' : '');?>> <b>Friend </b> </label> </td>
                <td  colspan="1" style="border-top-style: none; border-bottom-style: none; border-right-style: none; border-left-style: none;"> <label style="position: relative; padding-left: 20px;"><input style="position: absolute; top: -1px; left: 0;" type="checkbox" <?php echo ($application->others ==1 ? 'checked' : '');?>> <b>Newspaper  </b> </label> </td>
                <td  colspan="1" style="border-top-style: none; border-bottom-style: none; border-right-style: none; border-left-style: none;"> <label style="position: relative; padding-left: 20px;"><input style="position: absolute; top: -1px; left: 0;" type="checkbox" <?php echo ($application->others ==1 ? 'checked' : '');?>> <b>Flyer  </b> </label> </td>
                <td  colspan="1" style="border-top-style: none; border-bottom-style: none; border-right-style: none; border-left-style: none;"> <label style="position: relative; padding-left: 20px;"><input style="position: absolute; top: -1px; left: 0;" type="checkbox" <?php echo ($application->others ==1 ? 'checked' : '');?>> <b>Other   </b> </label> </td>
            </tr>
            </tbody>
        </table>

        <p style="font-size: 10px; margin-bottom: -7px;">I certify that to the best knowledge, the information I have provided on all above GAC Screening Solutions Fingerprinting Form is complete and accurate in every respect. The information collected on this form is only for GAC screening solutions to conduct fingerprinting and will not be shared with any third part whatsoever but according to Law. </p>


        <br/>

        <table class="table" style="font-size: 10px; padding-bottom: -25px;">
            <tbody>
            <tr>
                <td  colspan="1" style="border-top-style: none; border-bottom-style: none;"> <b style="vertical-align:text-top;">Client Signature </b>  </td>
                <td  colspan="1" style="border-top-style: none; border-bottom-style: none;"></td>
                <td  colspan="1" style="border-top-style: none; border-bottom-style: none;"></td>
                <td  colspan="1" style="border-top-style: none; border-bottom-style: none;"></td>
                <td  colspan="2" style="border-top-style: none; border-bottom-style: none;"></td>
                <td  colspan="2" style="border-top-style: none; border-bottom-style: none;"></td>
                <td  colspan="2" style="border-top-style: none; border-bottom-style: none;"></td>
                <td  colspan="1" style="border-top-style: none; border-bottom-style: none;"></td>
                <td  colspan="1" style="border-top-style: none; border-bottom-style: none;"></td>
                <td  colspan="1" style="border-top-style: none; border-bottom-style: none;"> <b>Date (YYYY/MM/DD)  </b> <?php echo $application->created_at; ?>  </td>
            </tr>
            </tbody>
        </table>



        <p style="font-size: 10px; border-bottom: 2px solid red;width: 17%; margin-bottom: -1px;"><b>FOR OFFICE USE ONLY</b></p>
        <table class="table table-bordered second_style"  style="background-color: #f2f2f263 !important;margin-top: 1px;">
            <tbody>

            <tr>
                <td  colspan="2"> <b>Client ID 1:   </b>   </td>
                <td  colspan="2"> <b> ID Number:   </b>  </td>
                <td  colspan="2"> <b>Photo:</b> <input type="checkbox" value="" class=""> <b>Yes</b>   <input type="checkbox" value="" class=""> <b>No</b> </td>
            </tr>
            <tr>
                <td  colspan="2"> <b> <b>Client ID 2:</b> </b>  </td>
                <td  colspan="2"> <b>  <b>ID Number:</b>   </b>  </td>
                <td  colspan="2"> <b>Photo:</b> <input type="checkbox" value="" class=""> <b>Yes</b>   <input type="checkbox" value="" class=""> <b>No</b> </td>
            </tr>
            <tr>x
                <td  colspan="2"> <b> GAC Client ID#</b>      </td>
                <td  colspan="4"> <b> Officer:</b>    </td>
            </tr>

            </tbody>
        </table>





        <table class="table table-borderless second_style">
            <tbody>
            <tr>
                <td  colspan="1" style="border-top-style: none; border-bottom-style: none;"> <b style="font-size: 10px;"> DCN:   </b>   <?php echo $application->dcb_number; ?> </td>
                <td  colspan="1" style="border-top-style: none; border-bottom-style: none;"></td>
                <td  colspan="1" style="border-top-style: none; border-bottom-style: none;"></td>
                <td  colspan="2" style="border-top-style: none; border-bottom-style: none;"></td>
                <td  colspan="2" style="border-top-style: none; border-bottom-style: none;"></td>
                <td  colspan="2" style="border-top-style: none; border-bottom-style: none;"></td>
                <td  colspan="1" style="border-top-style: none; border-bottom-style: none;"></td>
                <td  colspan="1" style="border-top-style: none; border-bottom-style: none; ">
                    <b style="font-size: 10px; padding-left: -20px;">  Time Fingerprinted:   </b> <?php echo $application->date_fingerprinted ."-". $application->time_fingerprinted; ?>
                </td>

            </tr>
            </tbody>
        </table>
    </div>
</div>















<div class="tab-content" id="profileTabContent" style="background-image: url('<?php echo base_url('assets/images/bg-img-pdf.jpg'); ?>'); background-repeat: no-repeat; opacity: 0.5; background-position: center;">
    <div class="tab-pane fade active show">

    <table class="table" style="padding-top: -30px;">
        <thead>
        <tr>
            <td colspan="1" style="float: left; clear: both;"> <b> <img style="width: 100px; height: 65px; padding-top: 7px;" src="<?php echo base_url('assets/images/logox.png'); ?>" alt=""> </b></td>
            <td colspan="1" style="text-align: center; color: red; font-size: 18px;"> <b> Fingerprinting Form</b></td>
            <td colspan="1" style="text-align: right !important; clear: both; line-height: normal; font-size: 9px;">

                200 – 7404 King George Blvd., <br>
                Surrey, BC V3W 1N6 <br>
                <b>Tel:</b> 604.501.0800 <b>Fax:</b> 604.501.0848 <br>
                <b>Email:</b> info@gacgroup.ca <br/>
                <b>Web:</b> www.gacgroup.ca
            </td>
        </tr>
        </thead>
    </table>

    <hr style="height:1px;border-width:0;color:red;background-color:red; padding: -3px 0 -5px 3px;">


        <div class="row">
            <h2 style="text-align: center; font-size: 14px; color: red;">Third Party Consent Form</h2>
            <h5 style="text-align: center; font-size: 9px;">Consent to Release Personal Information</h5>
        </div>

        <div class="row">
            <p style="font-weight: bold; font-size: 9px;">The Commissioner, R.C.M.P. <br/>
                1200 Vanier Parkway <br/>
                Ottawa, Ontario K1A 0R2 <br/>
                Attn: Information & Identification <br/>
                Civil Section
            </p>
        </div>




<!--        for bg watermark-->



        <div class="row">
            <p style="text-align: center; font-size: 10px;"> <b>Authorization for RCMP to disclose the results of Criminal Record Check </b> </p>
        </div>


        <div class="row">
            <p> I, _________________________________________, Born (YYYY-MM-DD) _____________________ hereby give consent to the Royal Canadian Mounted Police to disclose the results of a search of my fingerprints against the national Repository of criminal records in Canada to: </p>
        </div>

<!--        <div class="tab-pane fade active show">-->
            <table class="table table-bordered second_style">
                <tbody>
                <tr>
                    <td  colspan="2" style="font-size: 9px;"> <b>Name of Individual/agency </b></td>
                    <td  colspan="2"> </td>
                </tr>
                <tr>
                    <td  colspan="2" style="font-size: 9px;"> <b>Address</b> </td>
                    <td  colspan="2"> </td>
                </tr>
                <tr>
                    <td  colspan="2" style="font-size: 9px;"> <b>City</b> </td>
                    <td  colspan="2"> </td>
                </tr>
                <tr>
                    <td  colspan="2" style="font-size: 9px;"> <b>Province</b> </td>
                    <td  colspan="4"> </td>
                </tr>
                <tr>
                    <td  colspan="2" style="font-size: 9px;"> <b>Postal Code</b> </td>
                    <td  colspan="4"> </td>
                </tr>
                <tr>
                    <td  colspan="2" style="font-size: 9px;"> <b>Country</b> </td>
                    <td  colspan="4"> </td>
                </tr>
                <tr>
                    <td  colspan="2" style="font-size: 9px;"> <b>Application type</b> </td>
                    <td  colspan="4"> </td>
                </tr>
                </tbody>
            </table>


            <p style="font-size: 9px;">I understand that giving this consent allows the results to be sent to the third party indicated above and have provided an impression of one of my fingers as proof that I have read and signed this agreement. <b> Refusal to consent to disclosure of this information to the above person or company will not have any negative consequences on my request.</b></p>




            <br/>
            <br/>
            <br/>

            <table class="table" style="font-size: 10px; padding-bottom: -25px;">
                <tbody>
                <tr>
                    <td  colspan="1" style="border-top-style: none; border-bottom-style: none;"> __________________ </td>
                    <td  colspan="1" style="border-top-style: none; border-bottom-style: none;"></td>
                    <td  colspan="1" style="border-top-style: none; border-bottom-style: none;"></td>
                    <td  colspan="1" style="border-top-style: none; border-bottom-style: none;"></td>
                    <td  colspan="2" style="border-top-style: none; border-bottom-style: none;"></td>
                    <td  colspan="2" style="border-top-style: none; border-bottom-style: none;"></td>
                    <td  colspan="2" style="border-top-style: none; border-bottom-style: none;"></td>
                    <td  colspan="1" style="border-top-style: none; border-bottom-style: none;"></td>
                    <td  colspan="1" style="border-top-style: none; border-bottom-style: none;"></td>
                    <td  colspan="1" style="border-top-style: none; border-bottom-style: none;"> ______________________  </td>
                </tr>
                </tbody>
            </table>


            <table class="table" style="font-size: 10px; padding-bottom: -25px;">
                <tbody>
                <tr>
                    <td  colspan="1" style="border-top-style: none; border-bottom-style: none;"> <b style="vertical-align:text-top;">Applicant’s Signature </b>  </td>
                    <td  colspan="1" style="border-top-style: none; border-bottom-style: none;"></td>
                    <td  colspan="1" style="border-top-style: none; border-bottom-style: none;"></td>
                    <td  colspan="1" style="border-top-style: none; border-bottom-style: none;"></td>
                    <td  colspan="2" style="border-top-style: none; border-bottom-style: none;"></td>
                    <td  colspan="2" style="border-top-style: none; border-bottom-style: none;"></td>
                    <td  colspan="2" style="border-top-style: none; border-bottom-style: none;"></td>
                    <td  colspan="1" style="border-top-style: none; border-bottom-style: none;"></td>
                    <td  colspan="1" style="border-top-style: none; border-bottom-style: none;"></td>
                    <td  colspan="1" style="border-top-style: none; border-bottom-style: none;"> <b>Date (YYYY/MM/DD)  </b> 12/05/2015  </td>
                </tr>
                </tbody>
            </table>


            <br/>
            <br/>


        <table class="table" style="padding-top: -30px;">
            <thead>
            <tr>
                <td colspan="1" style="float: left; clear: both;">
                    <table class="table table-bordered second_style" style="width: 33%; float: left;">
                        <tbody>
                        <tr>
                            <td  colspan="2"> <b style="font-size: 9px;">Hair Color   </b>   </td>
                            <td  colspan="2"> <b style=""> <?php echo $application->hair_color; ?> </b>  </td>
                        </tr>
                        <tr>
                            <td  colspan="2"> <b style="font-size: 9px;">Eye Color</b>  </td>
                            <td  colspan="2"> <b style="color: white;"> <?php echo $application->eye_color; ?> </b>   </td>
                        </tr>
                        <tr>
                            <td  colspan="2"> <b style="font-size: 9px;">Height </b>  </td>
                            <td  colspan="2"> <b style="color: white;"> <?php echo $application->height; ?> </b>   </td>
                        </tr>
                        <tr>
                            <td  colspan="2"> <b style="font-size: 9px;">Weight</b>  </td>
                            <td  colspan="2"> <b style="color: white;"> <?php echo $application->weight; ?> </b>   </td>
                        </tr>
                        </tbody>
                    </table>
                </td>



                <td colspan="1" style="">
                    <table class="table table-bordered second_style" style="width: 33%; float: left; border-top-right-radius: 15px; border-top-left-radius: 15px;">
                        <tbody>
                        <tr style="border-bottom-style: none; border-right-style: none; border-left-style: none; border-top-style: none;">
                            <td  colspan="2" style="border-bottom-style: none; border-right-style: none; border-left-style: none; border-top-style: none;"> <b style="color: white;">Hair Color   </b>   </td>
                            <td  colspan="2" style="border-bottom-style: none; border-right-style: none; border-left-style: none; border-top-style: none;"> <b style="color: white;"> ID Number:   </b>  </td>
                        </tr>
                        <tr>
                            <td  colspan="2" style="border-bottom-style: none; border-right-style: none; border-left-style: none; border-top-style: none;"> <b style="color: white;"> Eye Color</b>  </td>
                            <td  colspan="2" style="border-bottom-style: none; border-right-style: none; border-left-style: none; border-top-style: none;"> <b style="color: white;">  ID Number:</b>   </td>
                        </tr>
                        <tr>
                            <td  colspan="2" style="border-bottom-style: none; border-right-style: none; border-left-style: none; border-top-style: none;"> <b style="color: white;">Height </b>  </td>
                            <td  colspan="2" style="border-bottom-style: none; border-right-style: none; border-left-style: none; border-top-style: none;"> <b style="color: white;"> Officer:</b>    </td>
                        </tr>
                        <tr>
                            <td  colspan="2" style="border-bottom-style: none; border-right-style: none; border-left-style: none; border-top-style: none;"> <b style="color: white;">Weight</b>  </td>
                            <td  colspan="2" style="border-bottom-style: none; border-right-style: none; border-left-style: none; border-top-style: none;"> <b style="color: white;"> Officer:</b>    </td>
                        </tr>
                        <tr>
                            <td  colspan="2" style="border-bottom-style: none; border-right-style: none; border-left-style: none; border-top-style: none;"> <b style="color: white;">Weight</b>  </td>
                            <td  colspan="2" style="border-bottom-style: none; border-right-style: none; border-left-style: none; border-top-style: none;"> <b style="color: white;"> Officer:</b>    </td>
                        </tr>
                        </tbody>
                    </table>
                </td>

                <td colspan="1" style="text-align: right !important; float: right; clear: both; line-height: normal; font-size: 9px;">

                    <table class="table table-bordered second_style" style="width: 33%; float: left;">
                        <tbody>
                        <tr>
                            <td  colspan="2"> <b style="font-size: 7px;">Thumb   </b>   </td>
                            <td  colspan="2"> <b style="color: white;"> Officer: abc</b>  </td>
                        </tr>
                        <tr>
                            <td  colspan="2"> <b style="font-size: 7px;">Index</b>  </td>
                            <td  colspan="2"> <b style="color: white;"> Officer: abc</b>   </td>
                        </tr>
                        <tr>
                            <td  colspan="2"> <b style="font-size: 7px;">Middle</b>  </td>
                            <td  colspan="2"> <b style="color: white;"> Officer: abc</b>    </td>
                        </tr>
                        <tr>
                            <td  colspan="2"> <b style="font-size: 7px;">Ring</b>  </td>
                            <td  colspan="2"> <b style="color: white;"> Officer: abc</b>    </td>
                        </tr>

                        <tr>
                            <td  colspan="2"> <b style="font-size: 7px;">little</b>  </td>
                            <td  colspan="2"> <b style="color: white;"> Officer: abc</b>   </td>
                        </tr>

                        </tbody>
                    </table>
                </td>
            </tr>
            </thead>
        </table>


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







    </div>
</div>