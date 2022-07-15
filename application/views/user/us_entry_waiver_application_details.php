<div class="tab-content" id="profileTabContent">
    <div class="tab-pane fade active show">
        <div class="row text-center">
            <div class="col-6">
                <h4 class="text-theme"><strong>Client ID: </strong><?= $application->us_entry_waiver_id ?></h4>
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
        <h4 class="text-theme"><span class="fa fa-money-bill text-16 mr-1"></span> Pricing</h4>
        <div class="row">
            <div class="mb-4 col-md-4 col-lg-3 col-sm-6">
                <h5 class="mb-1 text-theme">Sub Total</h5>
                <span><?= $application->sub_total ?> CAD</span>
            </div>
            <div class="mb-4 col-md-4 col-lg-3 col-sm-6">
                <h5 class="mb-1 text-theme">Tax</h5>
                <span><?= $application->tax ?> CAD</span>
            </div>
            <div class="mb-4 col-md-4 col-lg-3 col-sm-6">
                <h5 class="mb-1 text-theme">Grand Total</h5>
                <span><?= $application->grand_total ?> CAD</span>
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
        <h4 class="text-theme"><span class="fa fa-money-bill text-16 mr-1"></span> Payment Option - Record Suspension/ File Destruction / Purge | U.S Entry Waiver | Court Records Search | File Review</h4>
        <div class="row">
            <div class="mb-4 col-md-4 col-lg-3 col-sm-6">
                <h5 class="mb-1 text-theme">1st Installment</h5>
                <span><?= $application->all_installment_1_payment ?> CAD</span>
            </div>
            <div class="mb-4 col-md-4 col-lg-3 col-sm-6">
                <h5 class="mb-1 text-theme">2nd Installment</h5>
                <span><?= $application->all_installment_2_payment ?> CAD</span>
            </div>
            <div class="mb-4 col-md-4 col-lg-3 col-sm-6">
                <h5 class="mb-1 text-theme">3rd Installment</h5>
                <span><?= $application->all_installment_3_payment ?> CAD</span>
            </div>
        </div>
        <hr>
        <h4 class="text-theme"><span class="fa fa-money-bill text-16 mr-1"></span> Payment Option - Both (Record Suspension & U.S Entry Waiver)</h4>
        <div class="row">
            <div class="mb-4 col-md-4 col-lg-3 col-sm-6">
                <h5 class="mb-1 text-theme">1st Installment</h5>
                <span><?= $application->both_installment_1_payment ?> CAD</span>
            </div>
            <div class="mb-4 col-md-4 col-lg-3 col-sm-6">
                <h5 class="mb-1 text-theme">2nd Installment</h5>
                <span><?= $application->both_installment_2_payment ?> CAD</span>
            </div>
            <div class="mb-4 col-md-4 col-lg-3 col-sm-6">
                <h5 class="mb-1 text-theme">3rd Installment</h5>
                <span><?= $application->both_installment_3_payment ?> CAD</span>
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
                <h5 class="mb-1 text-theme">Place of Birth</h5>
                <span><?= $application->consent_birth_place ?></span>
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
        </div>
        <hr>

        <h4 class="text-theme"><span class="fa fa-user text-16 mr-1"></span> Address</h4>
        <div class="row">
            <div class="mb-4 col-md-4 col-lg-3 col-sm-6">
                <h5 class="mb-1 text-theme">Current Address</h5>
                <span><?= $application->consent_current_address ?></span>
            </div>
            <div class="mb-4 col-md-4 col-lg-3 col-sm-6">
                <h5 class="mb-1 text-theme">City</h5>
                <span><?= $application->consent_current_city ?></span>
            </div>
            <div class="mb-4 col-md-4 col-lg-3 col-sm-6">
                <h5 class="mb-1 text-theme">Province</h5>
                <span><?= $application->consent_current_state ?></span>
            </div>
            <div class="mb-4 col-md-4 col-lg-3 col-sm-6">
                <h5 class="mb-1 text-theme">Post Code</h5>
                <span><?= $application->consent_current_post_code ?></span>
            </div>
        </div>
        <hr>

        <h4 class="text-theme"><span class="fa fa-user text-16 mr-1"></span> DECLARATION OF CRIMINAL RECORD</h4>
        <div class="row">
            <div class="mb-4 col-lg-7">
                <h6 class="mb-1 text-theme">Do you have a criminal record or ever been arrested in Canada?</h6>
                <strong><?= $application->consent_arrested_canada ?></strong>
            </div>
            <div class="mb-4 col-lg-7">
                <h6 class="mb-1 text-theme">Do you have a criminal record or ever been arrested in United States of America?</h6>
                <strong><?= $application->consent_arrested_america ?></strong>
            </div>
            <div class="mb-4 col-lg-7">
                <h6 class="mb-1 text-theme">Do you have a criminal record or ever been arrested in a Foreign Country?</h6>
                <strong><?= $application->consent_arrested_foreign ?></strong>
            </div>
            <div class="mb-4 col-lg-7">
                <h6 class="mb-1 text-theme">Have you ever been refused entry at the USA port of entry/USA border?</h6>
                <strong><?= $application->consent_refused_border ?> <?= $application->consent_refused_border_date ?></strong>
            </div>
            <div class="mb-4 col-lg-7">
                <h6 class="mb-1 text-theme">Have you ever been deported from the United States of America?</h6>
                <strong><?= $application->consent_deported_america ?> <?= $application->consent_deported_america_date ?></strong>
            </div>
            <div class="mb-4 col-lg-7">
                <h6 class="mb-1 text-theme">Have you ever received a fine for your criminal charges in Canada, USA or foreign country?</h6>
                <strong><?= $application->consent_criminal_country ?></strong>
            </div>
            <div class="mb-4 col-lg-7">
                <h6 class="mb-1 text-theme">Have you ever been convicted of a criminal offence for which a pardon has not been granted?</h6>
                <strong><?= $application->consent_criminal_offence ?></strong>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr class="text-center">
                        <th>Offence</th>
                        <th>Date of Sentence</th>
                        <th>City, Country</th>
                        <th>Type of Fine/Sentence?</th>
                        <th>Fine Paid/Sentence completed?</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($offences as $value) { ?>
                        <tr>
                            <td><?= $value->consent_offence ?></td>
                            <td><?= $value->consent_offence_date ?></td>
                            <td><?= $value->consent_offence_court ?></td>
                            <td><?= $value->consent_fine ?></td>
                            <td><?= $value->consent_paid ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <hr>

    </div>
</div>