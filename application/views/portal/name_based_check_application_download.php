<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<style>
    .first_style tr td{
        font-size: 9px;
    }
    .second_style tr td{
        font-size: 8px;
    }
    .third_style th{
        font-size: 8px;
    }

    .third_style th td{
        font-size: 7px;
    }

    .third_style tr td{
        font-size: 7px;
    }

    .forth_style td{
        font-size: 9px;
    }
</style>



<div class="tab-content" id="profileTabContent">


<!--    <img style="width: 150px; padding-left: 20px; float: left;" src="http://localhost/epolicechecks/assets/images/logo.png" alt="">-->
    <img style="width: 150px; padding-left: 20px; float: left;" src="<?php echo base_url('assets/images/logox.png'); ?>" alt="">


    <span style="font-size: 8px; font-style: italic; float: right;">
                                            200 – 7404 King George Blvd., <br>
                                            Surrey, British Columbia      V3W 1N6 <br>
                                            Canada <br>
                                            Tel: 604-501-0800    Fax: 604-501-0848 <br>
                                            Email: info@gacgroup.ca <br>
                                            www.gacgroup.ca <br>
                    </span>


    <div class="tab-pane fade active show">

        <div class="row">



        </div>

        <hr style="border-top: 5px solid red;">

        <h4 style="text-align: center; color: #FF0000; text-decoration: underline; font-size: 12px;"> Consent to Disclosure of Criminal Record and Personal Information Release </h4>
        <p style="text-align: right; font-size: 8px;">Date of Request (YYYY/MM/DD): <?= DATE($application->created_at) ?></p>
        <h4 class="text-theme" style="font-size: 10px;"><span class="fa fa-support text-16 mr-1"></span> PERSONAL INFORMATION </h4>
        <table class="table table-bordered first_style">
            <thead>
            <tr>
                <td>Last Name : <?= $application->consent_last_name ?></td>
                <td>First Name : <?= $application->consent_first_name ?></td>
                <td>Middle Name : <?= $application->consent_middle_name ?></td>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>Maiden/Alias/Nickname: <?= $application->consent_nickname ?></td>
                <td colspan="2">Gender: <?= $application->consent_gender ?></td>
            </tr>

            <tr>
                <td> D.O.B: (YYYY/MM/DD): <?= $application->consent_dob ?></td>
                <td colspan="2">Place of Birth: (City/Town, Province/State, Country) : <?= $application->consent_birth_place ?></td>
            </tr>

            <tr>
                <td> Telephone: <?= $application->consent_phone ?></td>
                <td> Cell: <?= $application->consent_cellphone ?></td>
                <td> Email: <?= $application->consent_email ?></td>
            </tr>
            </tbody>
        </table>
    </div>



    <div class="tab-pane fade active show">
        <h4 class="text-theme" style="font-size: 10px;"><span class="fa fa-support text-16 mr-1"></span> ADDRESS</h4>
        <table class="table table-bordered second_style">
            <thead>
            <tr>
                <td colspan="3">Current address: : <?= $application->consent_current_address ?></td>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>City: <?= $application->consent_current_city ?></td>
                <td>Province : <?= $application->consent_current_state ?></td>
                <td>Postal Code: <?= $application->consent_current_post_code ?></td>
            </tr>
            <tr>
                <td  colspan="3">Previous Address, if less than 5 years:  <?= $application->consent_previous_address ?></td>
            </tr>
            </tbody>
        </table>
    </div>




    <h5 class="text-theme" style="font-size: 10px;"><span class="fa fa-support text-16 mr-1"></span> REASON FOR REQUEST: <?= $application->consent_reason ?> </h5>


    <p style="font-size: 7.5px;">
        I hereby authorize and consent to the full disclosure of information by the Police service , Global Avenues Consulting Inc. o/a GAC Screening Solutions, its associates,  to Employer and/or Individual: <span style="text-decoration: underline;">  Organization Name: <b><?= $application->consent_organization ?></b> Contact Person: <b><?= $application->consent_contact_name ?></b>            Contact Number: <b><?= $application->consent_contact_phone ?></b> </span> and to me. I hereby release and forever discharge the Police service board, police service and all their agents, officers and representatives from any and all liability, actions and claims for damages, costs, cause of actions, loss or injury of any nature which may be sustained by me as a result of the disclosure of information by the police services to Global Avenues Consulting Inc. o/a GAC Screening Solutions, its associates and employer. Accordingly, neither the Police Service nor the Board can guarantee that the information provided is complete or up to date. The search conducted by the Police Service will involve a query of the Identification Data Bank via the CPIC & PIP Systems. I am aware and I give consent that my record may be transmitted electronically or in a hard copy within Canada. I understand and acknowledge that my records and/or information located and/or disclosed by the police service may or may not pertain to me. Positive identification can only be confirmed through the comparison of fingerprints which must be submitted by me. I certify that to the best knowledge, the information I have provided in this form is complete and accurate in every respect. Privacy Policy Statement: The information on this form is required for the purpose of conducting criminal record check. The information collected and disclosed in this form is in compliance with all federal, provincial and municipal laws.
    </p>


    <h4 class="text-theme" style="font-size: 10px;"><span class="fa fa-support text-16 mr-1"></span> DECLARATION OF CRIMINAL RECORD </h4>
    <h5 style="font-size: 9px;"> Have you ever been convicted of a criminal offence for which a pardon has not been granted? : <?= $application->consent_criminal_offence ?> </h5>

    <p style="font-size: 7.5px;">
        If you answered YES, please provide the details of all criminal convictions. Use separate form if the offence are more. Do not declare the following: Absolute discharges or Conditional discharges, pursuant to the Criminal code, section 730, Any charges for which you have received a pardon, pursuant to the Criminal Records Act, Any offences while you were a “young person” (12 years old but less than 18 years old), pursuant to the Youth Criminal Justice Act, Any charges for which you were not convicted, for example, charges that were withdrawn, dismissed, etc, Any provincial or municipal offences, Any charges dealt with outside of Canada
    </p>


    <div class="tab-pane fade active show">
        <h4 class="text-theme" style="font-size: 10px;"><span class="fa fa-support text-16 mr-1"></span> ADDRESS</h4>
        <table class="table table-bordered third_style">
            <thead>
            <tr>
                <th> Offence </th>
                <th> Date of sentence (YYYY/MM/DD)</th>
                <th> Court Location (City, Province) </th>
            </tr>
            </thead>
            <tbody>

            <?php foreach ($offences as $value) { ?>
                <tr>
                    <td> <?= $value->consent_offence ?></td>
                    <td> <?= $value->consent_offence_date ?></td>
                    <td> <?= $value->consent_offence_court ?></td>
                </tr>
            <?php } ?>

            </tbody>
        </table>
    </div>



    <div class="tab-pane fade active show">
<!--        <table style="border=0px;" class="table">-->
        <table style="border=0px;" class="">
            <thead>
            <tr>
                <th style="vertical-align: middle;"> Applicant Signature </th>
                <th style="vertical-align: middle;"> <img height="100px" width="200px" style="margin-top: 10%;" src="<?php echo base_url().'upload/applicant_signatures/'.$application->consent_signature_drawable ?>">  </th>
                <th style="vertical-align: middle;"> Date (YYYY/MM/DD) : </th>
                <th style="vertical-align: middle;"> <?= $application->created_at ?> </th>
            </tr>
            </thead>
        </table>
    </div>


    <b style="font-size: 10px;"> Witness Section: </b> <span style="font-size: 7.5px"> I solemnly declare by my true signature that I am not the applicant and have verified the applicant's identity by comparing two authorized pieces of ID, one of which was an authorized government photo ID. I confirm that the ID indicated matches the applicant and that the photo image is a true likeness of the applicant. I declare that I understand it is an offence to make a false statement. </span>

    <br>
    <br>

    <table class="table table-bordered forth_style">
        <thead>
        <tr>
            <td> Identification Type 01: <b>Lorem Ipsum is simply dummy text </b> </td>
            <td> ID Number: <b>012354698</b> </td>
            <td> Photo: <b>No</b></td>
        </tr>

        <tr>
            <td> Identification Type 01: <b>Lorem Ipsum is simply dummy text </b> </td>
            <td> ID Number: <b>012354698</b> </td>
            <td> Photo: <b>No</b></td>
        </tr>
        </thead>
        <tbody>

        </tbody>
    </table>


<!--    <div class="tab-pane fade active show">-->




        <table class="table">
            <thead>
            <tr>
                <th>Witness Name :</th>
                <th>Signature:</th>
                <th>Date (YYYY/MM/DD)</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td><?= $application->consent_contact_name ?> </td>
                <td><img height="50px" width="100px"  src="<?php echo base_url().'upload/applicant_signatures/'.$application->consent_signature_drawable ?>">  </th>
                <td><?= $application->created_at ?></td>
            </tr>

            </tbody>
        </table>

<!--    </div>-->



</div>