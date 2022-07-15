<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 8/26/2020
 * Time: 5:32 PM
 */

//var_dump($corporate);
//var_dump($corporate->name_based_check);
//var_dump($corporate->digital_fingerprinting);
//var_dump($corporate->record_suspension);
//var_dump($corporate->us_entry_waiver);
?>

<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="row dashboard-sevices">
<!--            --><?php //if(!empty($corporate->name_based_check)){ ?>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <a href="<?= base_url() ?>corporate/security-screening/name-based-check">
                    <div class="card card-icon mb-4">
                        <div class="card-body text-center">
                            <img src="<?= base_url('assets') ?>/images/services/name-based-check.png">
                            <p class="text-primary text-20 m-0">Name Based Check</p>
                        </div>
                    </div>
                </a>
            </div>

<!--            --><?php //} if(!empty($corporate->digital_fingerprinting)){ ?>

            <div class="col-lg-3 col-md-4 col-sm-6">
                <a href="<?= base_url() ?>corporate/security-screening/digital-fingerprinting">
                    <div class="card card-icon mb-4">
                        <div class="card-body text-center">
                            <img src="<?= base_url('assets') ?>/images/services/fingerprint-based-check.png">
                            <p class="text-primary text-20 m-0">Digital Fingerprinting</p>
                        </div>
                    </div>
                </a>
            </div>

<!--            --><?php //} if(!empty($corporate->record_suspension)){ ?>

            <div class="col-lg-3 col-md-4 col-sm-6">
                <a href="<?= base_url() ?>corporate/security-screening/record-suspension">
                    <div class="card card-icon mb-4">
                        <div class="card-body text-center">
                            <img src="<?= base_url('assets') ?>/images/services/record-suspension.png">
                            <p class="text-primary text-20 m-0">Record Suspension</p>
                        </div>
                    </div>
                </a>
            </div>

<!--            --><?php //} if(!empty($corporate->us_entry_waiver)){ ?>

            <div class="col-lg-3 col-md-4 col-sm-6">
                <a href="<?= base_url() ?>corporate/security-screening/us-entry-waiver">
                    <div class="card card-icon mb-4">
                        <div class="card-body text-center">
                            <img src="<?= base_url('assets') ?>/images/services/us-entry-waiver.png">
                            <p class="text-primary text-20 m-0">U.S. Entry Waiver</p>
                        </div>
                    </div>
                </a>
            </div>
<!--            --><?php //} ?>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-lg-12 col-md-12 mt-5">
        <div class="row dashboard-sevices">
            <div class="col-lg-6 col-md-6 col-sm-6 mt-5 offset-md-3">
                <a href="<?= base_url() ?>corporate/application/services">
                    <div class="card card-icon mb-4">
                        <div class="card-body text-center">
                            <p class="text-primary text-20 m-0">Submit New Application</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>