<style>
    .card-icon .card-body {
        /* padding: 2rem .5rem; */
        padding: .5rem .5rem;
    }
</style>

<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="row dashboard-sevices">

            <?php
//                        if(!empty($this->session->userdata('agent_namebase_check'))){
            ?>
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <a href="<?= base_url() ?>reception/name_based_check_applications">
                                <div class="card card-icon mb-4">
                                    <button type="button" class="btn btn-primary" style="background-color: #13375c; width: 100%;">
                                        Total Applications <span class="badge badge-light"><?= $namebased_application_count ?></span>
                                    </button>
                                    <div class="card-body text-center">
                                        <img src="<?= base_url('assets') ?>/images/services/name-based-check.png">
                                        <p class="text-primary text-20 m-0">Name Based Check</p>
                                    </div>
                                    <a href="<?php echo base_url('reception/app_name_based_check_form') ?>">
                                        <button type="button" class="btn btn-success" style="width: 100%;">
                                            <i class="fa fa-plus" aria-hidden="true" style="font-size: 15px;"></i> &nbsp; Start New Application
                                        </button>
                                    </a>
                                </div>
                            </a>
                        </div>
<!--                        --><?php //}
//                        if(!empty($this->session->userdata('agent_digital_fingerprinting'))){
                        ?>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <a href="<?= base_url() ?>reception/digital_fingerprinting_applications">
                    <div class="card card-icon mb-4">
                        <button type="button" class="btn btn-primary" style="background-color: #13375c; width: 100%;">
                            Total Applications <span class="badge badge-light"><?= $digitalfingerprinting_application_count ?></span>
                        </button>
                        <div class="card-body text-center">
<!--                            <img src="--><?//= base_url('assets') ?><!--/images/logo.png" style="height: 70px;">-->
                            <img src="<?= base_url('assets') ?>/images/services/fingerprint-based-check.png" style="height: 70px;">
                            <p class="text-primary text-20 m-0">Digital Fingerprinting </p>
                        </div>
                        <a href="<?php echo base_url('reception/digital_fingerprint_form') ?>">
                            <button type="button" class="btn btn-success" style="width: 100%;">
                                <i class="fa fa-plus" aria-hidden="true" style="font-size: 15px;"></i> &nbsp; Start New Application
                            </button>
                        </a>
                    </div>
                </a>
            </div>

                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <a href="<?= base_url() ?>reception/record_suspension_applications">
                                <div class="card card-icon mb-4">
                                    <button type="button" class="btn btn-primary" style="background-color: #13375c; width: 100%;">
                                        Total Applications <span class="badge badge-light"><?= $record_suspension_application_count ?></span>
                                    </button>
                                    <div class="card-body text-center">
                                        <img src="<?= base_url('assets') ?>/images/services/record-suspension.png">
                                        <p class="text-primary text-20 m-0">Record Suspension</p>
                                    </div>
                                    <a href="<?php echo base_url('reception/app_record_suspension') ?>">
                                        <button type="button" class="btn btn-success" style="width: 100%;">
                                            <i class="fa fa-plus" aria-hidden="true" style="font-size: 15px;"></i> &nbsp; Start New Application
                                        </button>
                                    </a>
                                </div>
                            </a>
                        </div>


                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <a href="<?= base_url() ?>reception/record_suspension_applications">
                                <div class="card card-icon mb-4">
                                    <button type="button" class="btn btn-primary" style="background-color: #13375c; width: 100%;">
                                        Total Applications <span class="badge badge-light"><?= $usentry_application_count ?></span>
                                    </button>
                                    <div class="card-body text-center">
                                        <img src="<?= base_url('assets') ?>/images/services/us-entry-waiver.png">
                                        <p class="text-primary text-20 m-0">U.S. Entry Waiver</p>
                                    </div>
                                    <a href="<?php echo base_url('reception/app_record_suspension') ?>">
                                        <button type="button" class="btn btn-success" style="width: 100%;">
                                            <i class="fa fa-plus" aria-hidden="true" style="font-size: 15px;"></i> &nbsp; Start New Application
                                        </button>
                                    </a>
                                </div>
                            </a>
                        </div>
        </div>
    </div>

</div>