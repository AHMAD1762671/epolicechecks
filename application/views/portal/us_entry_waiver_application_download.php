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
        font-size: 10px;
    }

    .third_style th td{
        font-size: 8px;
    }
    .forth_style td{
        font-size: 9px;
    }
</style>

<h2 style="text-align: center; color: #FF0000; font-size: 14px; text-decoration: underline;"> U.S. Entry Waiver Application </h2>


<div class="tab-content" id="profileTabContent">
    <div class="tab-pane fade active show">

        <br>
        <h4 class="text-theme" style="font-size: 11px;"><span class="fa fa-support text-16 mr-1"></span> <b> PERSONAL INFORMATION </b></h4>


        <table class="table table-bordered first_style">
            <thead>
            <tr>
                <td>Last Name : <?= $application->consent_last_name ?></td>
                <td>First Name : <?= $application->consent_first_name ?></td>

            </tr>
            <tr>
                <td>Middle Name : <?= $application->consent_middle_name ?></td>
                <td>Maiden/Alias/Nickname: <?= $application->consent_nickname ?></td>
            </tr>
            </thead>
        </table>

        <span style="font-size: 11px;"><b>DATE OF BIRTH</b></span>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <span style="font-size: 11px; margin-left: 200px;"><b>PLACE OF BIRTH</b></span>

        <table class="table table-bordered first_style">
            <thead>
            <tr>
                <td>DOB: <?= $application->consent_dob ?></td>
                <td>Place of DOB: <?= $application->consent_birth_place ?></td>

            </tr>
            </thead>
        </table>

        <span style="font-size: 11px;"><b>CURRENT ADDRESS</b></span>
        <table class="table table-bordered first_style">
            <thead>
            <tr>
                <td colspan="3">Street address: <?= $application->consent_current_address ?></td>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>City: <?= $application->consent_current_city ?></td>
                <td>Province: <?= $application->consent_current_state ?></td>
                <td> Postal Code: <?= $application->consent_current_postal_code ?></td>
            </tr>
        </table>
    </div>



    <div class="tab-pane fade active show">
        <span style="font-size: 11px;"> <b>CONTACT INFORMATION </b></span>
        <table class="table table-bordered second_style">
            <tbody>
            <tr>
                <td>Telephone: <?= $application->consent_current_city ?></td>
                <td>Cell: <?= $application->consent_current_state ?></td>
                <td>Email: <?= $application->consent_current_post_code ?></td>
            </tr>
            </tbody>
        </table>
    </div>

    <h4 class="text-theme" style="font-size: 11px;"><span class="fa fa-support text-16 mr-1"></span> <b> DECLARATION OF CRIMINAL RECORD </b></h4>
    <div style="border: solid 0.5px #000000; padding: 10px">
        <span style="font-size: 9px;">Do you have a criminal record or ever been arrested in Canada?</span> <br>  <b>No</b> <br>
        <span style="font-size: 9px;">Do you have a criminal record or ever been arrested in United States of America?</span> <br> <b>No</b> <br>
        <span style="font-size: 9px;">Do you have a criminal record or ever been arrested in a Foreign Country?</span>  <br> <b>No</b> <br>
        <span style="font-size: 9px;">Have you ever been refused entry at the USA port of entry/USA border?</span>  <br><b>No</b> <br>
        <span style="font-size: 9px;">Have you ever been refused entry at the USA port of entry/USA border?</span>  <br> <b>No</b> <br>
        <span style="font-size: 9px;">Have you ever received a fine for your criminal charges in Canada, USA or foreign country?</span>  <br> <b>No</b> <br>
        <span style="font-size: 9px;">Have you ever been convicted of a criminal offence for which a pardon has not been granted?</span>  <br> <b>No</b> <br>
        <span style="font-size: 9px;">If you answered <b>YES</b>, please provide the details of all criminal convictions. </span> <br>
        <!--        </span>-->
        <h4 class="text-theme" style="font-size: 10px;"><b> ADDRESS </b> </h4>
        <table class="table table-bordered third_style">
            <thead>
            <tr>
                <th style="font-size: 12px;"> <b>Offence </b></th>
                <th style="font-size: 12px;"><b> Date of sentence (YYYY/MM/DD)</b></th>
                <th style="font-size: 12px;"><b> City, Country </b></th>
                <th style="font-size: 12px;"><b> Type of Fine/Sentence? </b></th>
                <th style="font-size: 12px;"><b> Fine Paid/Sentence completed? </b></th>
            </tr>
            </thead>
            <tbody>

            <?php foreach ($offences as $value) { ?>
                <tr>
                    <td> <?= $value->consent_criminal_offence ?></td>
                    <td> <?= $value->consent_offence_date ?></td>
                    <td> <?= $value->consent_current_city ?></td>
                    <td> <?= $value->consent_offence_court ?></td>
                    <td> <?= $value->consent_offence_court ?></td>
                </tr>
            <?php } ?>

            </tbody>
        </table>
    </div>
    <br>

    <h5><b>COMMENTS</b></h5>
    <div style="border: solid 0.5px #000000;">
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
    </div>

    <br>
    <br>
    <br>
    <br>

    <h5 style="text-align: center; color: #FF0000; text-decoration: underline; font-size: 14px;"> TERMS AND CONDITIONS </h5>
    <br>
    <p style="font-size: 11px;">I authorized Global Avenues Consulting Inc.(GAC) to act on my behalf of obtaining Record Suspension and/or File destruction and or/ File purge and/or U.S entry waiver from Royal Canadian Mounted Police, regional & local police services and/or USA department of homeland security (DHS). GAC is hereby authorized to act on my behalf for the purpose of any above stated application(s). GAC will only assist in the file preparation, collecting required documents, postal handling and submission of any above stated application(s). </p>
    <br>
    <p style="font-size: 11px;">I authorized GAC to communicate with any and all government offices necessary for the completion of my file, including the RCMP, regional & local police, Canadian and USA courts, in addition to any government related office necessary for the completion of my file, whatsoever the details may be. I understand and acknowledge that GAC is not a law firm and instruction provided by GAC is not a legal advice. Should the client require legal advise, the client should consult a lawyer.I acknowledge that I am responsible for providing all information and documents required by the Canadian & USA authorities and all documentation and information will be genuine and I understand that any inaccuracies may seriously affect the status of my application. Any false information and document submitted to Canadian & USA authorities is my sole responsibility and GAC will not be responsible or part of any false information and documentation submissions. </p>
    <br>
    <p style="font-size: 11px;">I understand that any further personal criminal activity, occurring while my application is in process may result a significant postponement on my eligibility. I further understand that any delay caused by my activity may result in additional charges to be covered by me. I understand that GAC has no control, whatsoever, over my application time frame, over The Parole Board of Canada, the RCMP, the DHS, Canadian & USA courts. I affirm that GAC will not be responsible if I am ineligible to apply for record suspension and/or file destruction, file purge and/or U.S entry waiver application due to my unpaid fines, surcharges, restitution, waiting period implications with police and any nature of convictions. I understand that any time frames offered by GAC are estimates only and that no time frames can be guaranteed under any circumstance, regardless of the details and or urgency of the file. I acknowledge that GAC is not giving any guarantees on the outcome of my application for Canadian Record Suspension and/or File destruction, File purge and/or U.S. entry waiver. I understand that granting or rejection of my record suspension/file destruction/purge/ U.S entry waiver is a solely decision of The Parole Board of Canada, Royal Canadian Mounted Police, regional & local police services and USA department of homeland security (DHS). </p>
    <br>
    <p style="font-size: 11px;">I understand that GAC administrative fee is for assisting me with my application preparation only. I understand GAC administration fee for my application preparation is non-refundable. All payments are quoted in Canadian dollar which are subject to applicable taxes and may change at any time. I understand that I can cancel my application within three business days of the file opening with GAC. I further understand & acknowledge that I will be entitled to a refund of my GAC administrative fee payment made only upon the written request of cancellation made within three business days except $250 dollars of file opening fee minus the credit card administrative fee charged when the file was opened. I affirm that I will not be entitled to a refund due to my unpaid fines, surcharges, restitution, waiting period implications with police and any nature of conviction(s). The administration fee does not include any Canadian & USA court fees, local police checks fee, Parole board of Canada (PBC) and USA department of homeland security (DHS) application processing fee and document(s) translation by certified translator, if applicable. Canadian & USA court fees, local police checks fee, Parole board of Canada (PBC) and USA department of homeland security (DHS) fee(s) can change at any time without notice. In cases of U.S. Entry Waiver applications only, if any convictions took place in the province of Quebec, the client is responsible for the translation of the court documents for submission to the U.S. homeland Security. GAC offers to provide authorized and certified translation through a third party at the client’s expense. The PBC and DHS processing fee will be due upon completion of my file preparation. If applicable, I agree to pay the Canadian & USA court fees and local police checks fees during the process of my application(s). Non-payment of Service fees, Canadian & USA court fees, local police checks fee and disbursements, in a timely manner will result in my file being discontinued. A $50.00 fee will be charged for missed and/or declined credit card payment. GAC reserves the right to change the terms & conditions prior to any payment made. I authorize Global Avenues Consulting Inc. (GAC) to charge my credit card to cover all amounts due when opening the file and during the application process as indicated on this terms & conditions. All payments will be automatically charged on my credit card without prior notice to me. I understand that Global Avenues Consulting Inc. will discontinue its services if the payment is not received when due. </p>
    <br>
    <p style="font-size: 11px;">I agree to maintain consistent communication with GAC to ensure all my contacts and address information is updated at all the time while my application is in process. I understand that GAC will discontinue the processing of my application(s) if I am unable to provide all the pending information & documents and if I am not reachable with my telephone number(s) and/or email and/or postal mail is returned undeliverable for 30 days. A $100.00 fee will apply to reactivate the closed file within 12 months. If applicable, I understand and acknowledge that if GAC has not received my record from RCMP and/or USA authorities within two years than my application will be considered inactive and $100.00 will be charged to re-activate my file. I understand after 12 months my file and all the information therein will be destroyed by GAC and a new application preparation term & conditions of GAC and administration fees will apply. If applicable, I understand that if my submitted application(s) to The Parole Board of Canada (PBC), Royal Canadian Mounted Police, regional & local police services and/or USA department of homeland security (DHS) is found to be ineligible due to any reason than I will be charged $150 by GAC for maintaining and holding my file until I am eligible to apply. By providing credit card details to GAC the client agrees that this information may be used to automatically charge any and all disbursement fees owing. </p>
    <br>
    <p style="font-size: 11px;">I acknowledge this GAC service terms & conditions and do hereby state that I understand and agree to all of the terms and conditions as stipulated herein. The client understands and agrees that in no event shall GAC be liable for any damages whatsoever, including direct claim, indirect claim, incidental, consequential, special or exemplary damages, and any damages for loss of profits, savings, goodwill or other intangible claim. I agree that upon accepting GAC service terms & conditions, if at any time I decide to retain other service provider or transfer my file from GAC to other service provider in connection with above mentioned services matters, or terminate the services or cancel or withdraw my application, then the total fees shall become due owning immediately. I acknowledge that GAC reserves the right to reject processing my application at any time with any notice. If any change is not acceptable to the client, the client must discontinue the client’s use of this GAC services immediately.</p>
</div>



<div class="tab-pane fade active show">
    <table class="table">
        <thead>
        <tr>
            <th>Applicant Signature</th>
            <th>Date (YYYY/MM/DD) </th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>
                <?php if(!empty($application->consent_signature_drawable)){ ?>
                <img height="50px" width="100px"  src="<?php echo $application->consent_signature_drawable ?>">
                <?php } ?>

            </td>
            <td> <?= $application->created_at ?> </td>
        </tr>

        </tbody>
    </table>
</div>