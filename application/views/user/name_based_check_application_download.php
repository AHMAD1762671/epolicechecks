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








</div>