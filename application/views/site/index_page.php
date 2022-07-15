<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/css?family=Squada+One|Source+Code+Pro|Merriweather:300|Abril+Fatface" rel="stylesheet">

        <link href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">


        <link rel="stylesheet" href="https:/code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

        <link rel="stylesheet" href="<?php echo base_url('assets/site_css_file/jquery-ui.css') ?>">

        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

        <title><?= $page_title ?></title>
        <style>
            .ui-widget.ui-widget-content{
                background: black !important;
                color: white !important;
                opacity: 0.7 !important;
                text-align: center !important;
                border: none; !important;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <img src="<?= base_url('site-assets') ?>/images/Logo_epolicecheckfinal-02.png" style="height: 150px; width: 243px;">
                </div>
                <!--                <div class="col-6">
                                    <button type="button" class="btn btn-success border mt-5 align-self-center pull-right" style="width: 139px; ">LOGIN</button>
                                </div>-->
            </div>
            <div class="row">
                <div class="col-12 text-center">
                    <img src="<?= base_url('site-assets') ?>/images/Map1.jpeg" style="height: 550px; width: 1000px;">
                </div>
            </div>
            <div class="row">
                <div class="col-4 offset-8">
                    <div class="checkbox pull-right">
                        <tr bgcolor='#587C90'>
                        <label><input type="checkbox" id="check" title=" - I confirm that I am the real & genuine user who is accessing this page, electronically signing the forms & applications and confirm that personal information I am providing is of my own.
                                      - I understand that it is my responsibility to ensure that third-party firewall and anti-virus software is in use. Global Avenues Consulting Inc. (GAC) is not responsible for the security of my computer.
                                      - I understand and accept that Global Avenues Consulting Inc. (GAC) is not responsible for any losses or damages incurred by anyone because of :
                                      - The use of the information available to the gacportal.com Portal; 
                                      - Any restrictions, delay, malfunction, or unavailability of the gacportal.com Portal.
                                      - I certify that any information provided by me is true, complete and correct to best of my knowledge" data-mode="above">
                            <span class="text-danger" style="color:white; font-size: 10px;"> I agree to the terms & conditions </span></label></tr>
                    </div>
                </div>

            </div>
            <footer class="bg-light">
                <div class="row mb-3 p-2">
                    <div class="col-4 pt-2">Powered By<img src="<?= base_url('site-assets') ?>/images/GAC.png" style="height: 40px; width: 43px;"></div>
                    <div class="col-4 pt-2"><a href=""> Home</a> |<a href=""> FAQ </a>  | <a href="">Contact</a>  | <a href="">Privacy Policy</a></div>
                    <div class="col-4 pt-1"><a disabled href="javascript:" class="btn btn-danger enterbtn align-self-center pull-right" style="width: 139px;">Enter</a>
                    </div>
                </div>

            </footer>
        </div>
        <style>
            .bs-tooltip-auto[x-placement^=bottom] .arrow::before,
            .bs-tooltip-bottom .arrow::before {
                border-bottom-color: #f00; /* Red */
            }
        </style>
        <script>
            var services_url = "<?= base_url() ?>services";
            $(document).ready(function () {
                $(document).tooltip();
                $('#check').click(function () {
                    if ($(this).is(':checked')) {
                        $('.enterbtn').addClass('btn-success');
                        $('.enterbtn').removeClass('btn-danger');
                        $('.enterbtn').attr('href', services_url);
                    } else {
                        $('.enterbtn').addClass('btn-danger');
                        $('.enterbtn').removeClass('btn-success');
                        $('.enterbtn').attr('href', 'javascript:');
                    }
                });
            });
        </script>

    </body>
</html>