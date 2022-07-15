
<div class="tab-content" id="profileTabContent">
    <div class="tab-pane fade active show">
        <div class="row text-center">
            <div class="col-6">
                <h4 class="text-theme"><strong>Client ID: </strong><?= $application->digital_fingerprinting_application_id ?></h4>
            </div>
            <div class="col-6">
                <h4 class="text-theme"><strong>State: </strong><?= get_state_name_by_id($application->state_id) ?></h4>
            </div>
        </div>
        <hr>
        <h4 class="text-theme"><span class="fa fa-support text-16 mr-1"></span> Requested Services</h4>
        <div class="row">
            <ul>
                <?php foreach ($services as $value) { ?>
                    <li>
                        <span class="pr-5"><?= $value->subservice_name ?></span> 
                        <span class="float-right"><?= $value->service_price ?> CAD</span>
                    </li>
                <?php } ?>
            </ul>
        </div>
        <hr>

        <h4 class="text-theme"><span class="fa fa-list text-16 mr-1"></span> Options</h4>
        <div class="row">
           <ul>
               <?php foreach ($options as $value) { ?>
                         <li><?= $value->digital_fingerprinting_application_option ?></li>
                <?php  }  ?>
            </ul>
        </div>
        <hr>

        <h4 class="text-theme"><span class="fa fa-map-marker-alt text-16 mr-1"></span> Agency Address</h4>
        <div class="row">
            <div class="mb-4 col-md-12 col-lg-12 col-sm-12">
                <h5 class="mb-1 text-theme">Province</h5>
                <span><?= $application->agency_address ?>, <?= get_city_name_by_id($application->agency_city) ?>, <?= get_state_name_by_id($application->agency_state) ?></span>
            </div>
        </div>
        <hr>

        <h4 class="text-theme"><span class="fa fa-map-marker-alt text-16 mr-1"></span> Delivery Details</h4>
        <div class="row">
            <div class="mb-4 col-md-4 col-lg-3 col-sm-6">
                <h5 class="mb-1 text-theme">Name</h5>
                <span><?= $application->delivery_name ?></span>
            </div>
            <div class="mb-4 col-md-4 col-lg-3 col-sm-6">
                <h5 class="mb-1 text-theme">Address</h5>
                <span><?= $application->delivery_address ?></span>
            </div>
            <div class="mb-4 col-md-4 col-lg-3 col-sm-6">
                <h5 class="mb-1 text-theme">City</h5>
                <span><?= $application->delivery_city ?></span>
            </div>
            <div class="mb-4 col-md-4 col-lg-3 col-sm-6">
                <h5 class="mb-1 text-theme">Province</h5>
                <span><?= $application->delivery_state ?></span>
            </div>
            <div class="mb-4 col-md-4 col-lg-3 col-sm-6">
                <h5 class="mb-1 text-theme">Country</h5>
                <span><?= $application->delivery_country ?></span>
            </div>
            <div class="mb-4 col-md-4 col-lg-3 col-sm-6">
                <h5 class="mb-1 text-theme">Phone</h5>
                <span><?= $application->delivery_phone ?></span>
            </div>
            <div class="mb-4 col-md-4 col-lg-3 col-sm-6">
                <h5 class="mb-1 text-theme">Email</h5>
                <span><?= $application->delivery_email ?></span>
            </div>
            <div class="mb-4 col-md-4 col-lg-3 col-sm-6">
                <h5 class="mb-1 text-theme">Share Result?</h5>
                <span><?= $application->share_result ?></span>
            </div>
            <div class="mb-4 col-md-4 col-lg-3 col-sm-6">
                <h5 class="mb-1 text-theme">Share To</h5>
                <span><?= $application->share_email ?></span>
            </div>
            <div class="mb-4 col-md-4 col-lg-3 col-sm-6">
                <h5 class="mb-1 text-theme">Delivery Method</h5>
                <span class="pr-2"><?= get_delivery_method_name_by_id($application->delivery_method_id) ?></span><span><strong><?= $application->delivery_method_price ?> CAD</strong></span>
            </div>
        </div>
        <hr>
        <h4 class="text-theme"><span class="fa fa-money-bill text-16 mr-1"></span> Pricing</h4>
        <div class="row">
            <div class="mb-4 col-md-4 col-lg-3 col-sm-6">
                <h5 class="mb-1 text-theme">Sub Total</h5>
                <span><?= $application->sub_total ?></span>
            </div>
            <div class="mb-4 col-md-4 col-lg-3 col-sm-6">
                <h5 class="mb-1 text-theme">Tax</h5>
                <span><?= $application->tax ?></span>
            </div>
            <div class="mb-4 col-md-4 col-lg-3 col-sm-6">
                <h5 class="mb-1 text-theme">Grand Total</h5>
                <span><?= $application->grand_total ?></span>
            </div>
            <div class="mb-4 col-md-4 col-lg-3 col-sm-6">
                <h5 class="mb-1 text-theme">Payment Status</h5>
                <span><?= ($application->payment_status) ? 'Paid' : 'Unpaid' ?></span>
            </div>
            <div class="mb-4 col-md-4 col-lg-3 col-sm-6">
                <h5 class="mb-1 text-theme">Card Number</h5>
                <span><?= str_replace(range(0, 9), "*", substr($application->card_number, 0, -4)) . substr($application->card_number, -4); ?></span>
            </div>
            <div class="mb-4 col-md-4 col-lg-3 col-sm-6">
                <h5 class="mb-1 text-theme">Card Expiry</h5>
                <span><?= $application->card_expiry ?></span>
            </div>
            <div class="mb-4 col-md-4 col-lg-3 col-sm-6">
                <h5 class="mb-1 text-theme">Card Holder Name</h5>
                <span><?= $application->card_holder_name ?></span>
            </div>
            <div class="mb-4 col-md-4 col-lg-3 col-sm-6">
                <h5 class="mb-1 text-theme">CVV2/CVC2 Code</h5>
                <span><?= $application->card_cvc ?></span>
            </div>
            <div class="mb-4 col-md-4 col-lg-3 col-sm-6">
                <h5 class="mb-1 text-theme">Email</h5>
                <span><?= $application->card_holder_email ?></span>
            </div>
            <div class="mb-4 col-md-4 col-lg-3 col-sm-6">
                <h5 class="mb-1 text-theme">Phone</h5>
                <span><?= $application->card_holder_phone ?></span>
            </div>
        </div>
        <hr>
        <h4 class="text-theme"><span class="fa fa-user text-16 mr-1"></span> PERSONAL INFORMATION</h4>
        <div class="row">
            <div class="mb-4 col-md-4 col-lg-3 col-sm-6">
                <h5 class="mb-1 text-theme">Last Name</h5>
                <span><?= $application->consent_last_name ?></span>
            </div>
            <div class="mb-4 col-md-4 col-lg-3 col-sm-6">
                <h5 class="mb-1 text-theme">First Name</h5>
                <span><?= $application->consent_first_name ?></span>
            </div>
            <div class="mb-4 col-md-4 col-lg-3 col-sm-6">
                <h5 class="mb-1 text-theme">Middle Name</h5>
                <span><?= $application->consent_middle_name ?></span>
            </div>
            <div class="mb-4 col-md-4 col-lg-3 col-sm-6">
                <h5 class="mb-1 text-theme">Maiden/Alias/Nickname</h5>
                <span><?= $application->consent_nickname ?></span>
            </div>
            <div class="mb-4 col-md-4 col-lg-3 col-sm-6">
                <h5 class="mb-1 text-theme">Date of Birth</h5>
                <span><?= $application->consent_dob ?></span>
            </div>
            <div class="mb-4 col-md-4 col-lg-3 col-sm-6">
                <h5 class="mb-1 text-theme">Current Address</h5>
                <span><?= $application->consent_current_address ?></span>
            </div>
            <div class="mb-4 col-md-4 col-lg-3 col-sm-6">
                <h5 class="mb-1 text-theme">Telephone</h5>
                <span><?= $application->consent_phone ?></span>
            </div>
            <div class="mb-4 col-md-4 col-lg-3 col-sm-6">
                <h5 class="mb-1 text-theme">Cell</h5>
                <span><?= $application->consent_cellphone ?></span>
            </div>
            <div class="mb-4 col-md-4 col-lg-3 col-sm-6">
                <h5 class="mb-1 text-theme">Email</h5>
                <span><?= $application->consent_email ?></span>
            </div>
            <div class="mb-4 col-md-4 col-lg-3 col-sm-6">
                <h5 class="mb-1 text-theme">Fingerprinting Agency Address</h5>
                <span><?= $application->fingerprinting_agency_address ?></span>
            </div>
            <div class="mb-4 col-md-4 col-lg-3 col-sm-6">
                <h5 class="mb-1 text-theme">Fingerprinting Agency Tel</h5>
                <span><?= $application->fingerprinting_agency_phone ?></span>
            </div>
            <div class="mb-4 col-md-4 col-lg-3 col-sm-6">
                <h5 class="mb-1 text-theme">RCMP Application Type</h5>
                <span><?= $application->rcmp_type ?></span>
            </div>
            <div class="mb-4 col-md-4 col-lg-3 col-sm-6">
                <h5 class="mb-1 text-theme">Send Result To</h5>
                <span><?= $application->send_result ?></span>
            </div>
            <div class="mb-4 col-md-4 col-lg-3 col-sm-6">
                <h5 class="mb-1 text-theme">Send Result to Address</h5>
                <span><?= $application->send_home_address ?></span>
            </div>
            <div class="mb-4 col-md-4 col-lg-3 col-sm-6">
                <h5 class="mb-1 text-theme">Third Party Name</h5>
                <span><?= $application->send_third_party ?></span>
            </div>
        </div>
        <hr>
        <div class="row">
<!--            <div class="mb-4 col-md-4 col-lg-3 col-sm-6">-->
<!--                <h5 class="mb-1 text-theme">Applicant Signature</h5>-->
<!--                <span>--><?php //echo $application->consent_signature ?><!--</span>-->
<!--            </div>-->
            <div class="mb-4 col-md-4 col-lg-3 col-sm-6">
                <h5 class="mb-1 text-theme">Date</h5>
                <span><?= $application->created_at ?></span>
            </div>
        </div>
        <hr>

    </div>
</div>