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
</style>
<div class="tab-content" id="profileTabContent">
<!--    <img style="width: 100px; padding-left: 40%;" src="https://gacportal.com/epolicechecks/assets/images/services/epolice.png" alt="">-->
    <img style="width: 100px; padding-left: 40%;" src="<?php echo base_url('assets/images/services/epolice.png'); ?>" alt="">
    <br>
    <br>

    <div class="tab-pane fade active show">
        <div class="row">
        </div>
        <h4 style="text-align: center; text-decoration: underline; font-size: 12px;"><b> DIGITAL FINGERPRINTING VOUCHER </b></h4>
        <p><button type="button" class="btn btn-primary">Step 1</button> Contact the authorized fingerprinting agency location to book an appointment</p>
        <p><button type="button" class="btn btn-primary">Step 2</button> Print and Sign this form</p>
        <p><button type="button" class="btn btn-primary">Step 3</button> Bring this signed form, a letter indicating the reason for fingerprinting such as employment letter/immigration</p>
        <p style="padding-left: 63px;"> letter/etc. (if applicable), along with 2 pieces of government issued identification. One primary piece of</p>
        <p style="padding-left: 63px;"> identification must include a photo, along with a Secondary identification that includes a signature.</p>

        <div class="tab-pane fade active show">
            <table class="table table-bordered second_style">
                <thead>
                <tr>
                    <td colspan="2" style="text-align: center; font-size: 11px; background-color: #d3d0d0; padding-top: -2px; padding-bottom: -2px;"> <b>Acceptable Identifications </b></td>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>
                        <ul>
                            <li style="font-size: 10px;">Driver’s Licence</li>
                            <li style="font-size: 10px;">Passport</li>
                            <li style="font-size: 10px;">Canadian Citizenship Card</li>
                            <li style="font-size: 10px;">Permanent Resident Card</li>
                            <li style="font-size: 10px;">Student Identity Card</li>
                        </ul>
                    </td>
                    <td>
                        <ul>
                            <li style="font-size: 10px;">Federal, Provincial or Municipal Identification Card</li>
                            <li style="font-size: 10px;">Firearms Acquisition Certificate (FAC)</li>
                            <li style="font-size: 10px;">Military Family Identification Card (MFID)</li>
                            <li style="font-size: 10px;">Certificate of Indian Status</li>
                            <li style="font-size: 10px;">Canadian Immigration Documents </li>
                        </ul>
                    </td>
                </tr>
                <tr>
                    <td  colspan="2" style="font-size: 10px; background-color: #d3d0d0;"><span style="font-size: 11px;padding-top: -1px; padding-bottom: -1px;"><b>Note:</b></span> Health cards (Issued by Canadian Province or Territory), Immigration documents and Social Insurance Number (SIN) card are not acceptable as primary piece of identification but may be submitted as a secondary piece of Identification</td>
                </tr>
                </tbody>
            </table>


            <table class="table table-bordered second_style">
                <thead>
                <tr>
                    <td colspan="3" style="text-align: center; font-size: 11px; background-color: #d3d0d0; padding-top: -2px; padding-bottom: -2px;"> <b> APPLICANT INFORMATION </b></td>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td> First Name: <?= $application->consent_first_name ?></td>
                    <td> Middle Name: <?= $application->consent_middle_name ?></td>
                    <td> Last Name: <?= $application->consent_last_name ?></td>
                </tr>
                <tr>
                    <td colspan="2"> Maiden/Alias/Nickname: <?= $application->consent_nickname ?> </td>
                    <td> Date of Birth: (YYYY/MM/DD) <?= $application->consent_dob ?></td>
                </tr>
                <tr>
                    <td colspan="3"> Current Address: <?= $application->consent_current_address ?></td>
                </tr>
                <tr>
                    <td> Tel: <?= $application->consent_phone ?> </td>
                    <td> Cell: <?= $application->consent_cellphone ?> </td>
                    <td> Email: <?= $application->consent_email ?> </td>
                </tr>
                <tr>
                    <td colspan="2"> Fingerprinting Agency Address: <?= $application->consent_current_address ?></td>
                    <td> Fingerprinting Agency Tel: <?= $application->consent_cellphone ?> </td>
                </tr>
                <tr>
                    <td> RCMP Application Type:  </td>
                    <td colspan="2"> Send Result To: <br> <input type="checkbox"> Home <input type="checkbox"> Third Party Name:   </td>
                </tr>
                <tr>
                    <td colspan="3"> Send Result to Address:   </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="tab-pane fade active show">
        <table class="table">
            <thead>
            <tr>
                <th>Applicant Signature</th>
                <th>Date (YYYY/MM/DD)</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td><img height="30px" width="70px"  src="<?php echo base_url().'upload/applicant_signatures/'.$application->consent_signature_drawable ?>">  </th>
                <td><?= $application->created_at ?></td>
            </tr>
            </tbody>
        </table>
    </div>

    <p style="border-bottom: 1.5px dashed;"></p>
    <br>

    <h4 class="text-theme" style="font-size: 11px;"><span class="fa fa-support text-16 mr-1"></span> <b> FOR FINGERPRINTING AGENCY USE ONLY </b> </h4>
    <div class="tab-pane fade active show" style="background-color: #f5f5f5; border-style: solid; border-bottom: 1px solid #000000; padding: 10px;">
        <span style="font-size: 11px;">Fingerprinting Agency Name:_________________________________________________ </span> <span style="font-size: 11px;">City:_____________________________</span> <br> <br>
        <span style="font-size: 11px;">Officer Name:___________________________________</span> <span  style="font-size: 11px;"> Signature:_________________________</span> <span style="font-size: 11px;"> Date:____________________</span>
    </div>



    <div class="tab-pane fade active show">
        <h4 class="text-theme" style="font-size: 11px;"><span class="fa fa-support text-16 mr-1"></span> <b> FOR OFFICE USE ONLY </b> </h4>
        <table class="table table-bordered second_style">
            <thead>
            <tr>
                <td> Client ID: </td>
                <td> Agency ID: </td>
                <td> Officer:  </td>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td> Transaction Number: </td>
                <td colspan="2"> Date:  </td>
            </tr>
            </tbody>
        </table>
    </div>
</div>