<style>
    .card-icon .card-body {
        /* padding: 2rem .5rem; */
        padding: .5rem .5rem;
    }
</style>

<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="row dashboard-sevices">
            <div class="col-lg-3 col-md-4 col-sm-6">
                <a href="<?= base_url() ?>reception/dashboard_pre">
                    <div class="card card-icon mb-4">
                        <button type="button" class="btn btn-primary" style="background-color: #13375c; width: 100%;">
                            Total Applications <span class="badge badge-light"><?= $namebased_application_count+$digitalfingerprinting_application_count+$record_suspension_application_count+$usentry_application_count ?></span>
                        </button>
                        <div class="card-body text-center">
                            <img src="<?= base_url('assets') ?>/images/logo.png" style="height: 100px;">
                            <p class="text-primary text-20 m-0">Start Application </p>
                        </div>
                    </div>
                </a>
            </div>
<!--            --><?php //}
//            if(!empty($this->session->userdata('agent_record_suspension'))){
//            ?>

<!--            <div class="col-lg-3 col-md-4 col-sm-6">-->
<!--                <a href="--><?//= base_url() ?><!--agent/security-screening/record-suspension">-->
<!--                    <div class="card card-icon mb-4">-->
<!--                        <div class="card-body text-center">-->
<!--                            <img src="--><?//= base_url('assets') ?><!--/images/services/record-suspension.png">-->
<!--                            <p class="text-primary text-20 m-0">Record Suspension</p>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </a>-->
<!--            </div>-->
<!--            --><?php //}
//            if(!empty($this->session->userdata('agent_us_entry_waiver'))){
//            ?>

<!--            <div class="col-lg-3 col-md-4 col-sm-6">-->
<!--                <a href="--><?//= base_url() ?><!--agent/security-screening/us-entry-waiver">-->
<!--                    <div class="card card-icon mb-4">-->
<!--                        <div class="card-body text-center">-->
<!--                            <img src="--><?//= base_url('assets') ?><!--/images/services/us-entry-waiver.png">-->
<!--                            <p class="text-primary text-20 m-0">U.S. Entry Waiver</p>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </a>-->
<!--            </div>-->
<!--            --><?php //}
            ?>
        </div>
    </div>

</div>

<!--<div class="row">-->
<!--    <div class="col-lg-12 col-md-12 mt-5">-->
<!--        <div class="row dashboard-sevices">-->
<!--            <div class="col-lg-6 col-md-6 col-sm-6 mt-5 offset-md-3">-->
<!--                <a href="--><?//= base_url() ?><!--agent/application/services">-->
<!--                    <div class="card card-icon mb-4">-->
<!--                        <div class="card-body text-center">-->
<!--                            <p class="text-primary text-20 m-0">Start New Application</p>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </a>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->