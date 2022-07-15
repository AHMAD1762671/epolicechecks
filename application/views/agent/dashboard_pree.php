<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="row dashboard-sevices">

                <div class="col-lg-3 col-md-4 col-sm-6">
                    <a href="<?php echo base_url().'agent/dashboard'; ?>">
                        <div class="card bg-gradient-info overflow-hidden text-white" style="background-image: linear-gradient(to bottom, #4a85fb 0, #163eaf 100%); box-shadow: 0 2px 10px rgb(22 62 175 / 30%);}">
                            <div class="card-body pb-0">
                                <p style="font-size: 20px; text-align: center;" class=" mb-1 "><b>Active Applications</b></p>
                                <p style="font-size: 55px; text-align: center;" class=" mb-1 "><b><?= $get_namebase+$fingerprinting+$recordSuspension+$usEntry ?></b></p>
                            </div>
                            <br>
                        </div>
                    </a>
                </div>



                <div class="col-lg-3 col-md-4 col-sm-6">
                    <a href="<?php echo base_url().'agent/searchUserById'; ?>">
                        <div class="card bg-gradient-info overflow-hidden text-white" style="background-image: linear-gradient(to bottom, #fc7a5a 0, #d72e04 100%); box-shadow: 0 2px 10px rgb(215 46 4 / 30%);">
                            <div class="card-body pb-0">
                                <p style="font-size: 20px; text-align: center;" class=" mb-1 "><b>ID Verification </b></p>
                                <p style="font-size: 55px; text-align: center;" class=" mb-1 "><b>00</b></p>
                            </div>
                            <br>
                        </div>
                    </a>
                </div>


                <div class="col-lg-3 col-md-4 col-sm-6">
                    <a href="<?php echo base_url().'agent/service_order'; ?>">
                        <div class="card bg-gradient-info overflow-hidden text-white" style="background-image: linear-gradient(to bottom, #60c3b6 0, #269f90 100%);box-shadow: 0 2px 10px rgb(38 159 144 / 30%);">
                            <div class="card-body pb-0">
                                <p style="font-size: 20px; text-align: center;" class=" mb-1 "><b>Service Order</b></p>
                                <p style="font-size: 55px; text-align: center;" class=" mb-1 "><b>00</b></p>
                            </div>
                            <br>
                        </div>
                    </a>
                </div>


                <div class="col-lg-3 col-md-4 col-sm-6">
                    <a href="<?php echo base_url().'agent/agent_invoices'; ?>">
                        <div class="card bg-gradient-info overflow-hidden text-white" style="background-image: linear-gradient(to bottom, #fb6ba7 0, #ea2167 100%);box-shadow: 0 2px 10px rgb(234 33 103 / 30%);">
                            <div class="card-body pb-0">
                                <p style="font-size: 20px; text-align: center;" class=" mb-1 "><b>Invoices</b></p>
                                <p style="font-size: 55px; text-align: center;" class=" mb-1 "><b>00</b></p>
                            </div>
                            <br>
                        </div>
                    </a>
                </div>



            <?php
            if($this->session->userdata('sub_corporate_user_role_id') == 'f971e9f3-57c9-9206-a35d-1700188b'){
                ?>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <a href="<?= base_url() ?>user/name_based_check_applications_sub_corporate" target="_blank">
                        <div class="card card-icon mb-4">
                            <button type="button" class="btn btn-primary" style="background-color: #13375c;">
                                Total Applications <span class="badge badge-light">0</span>
                            </button>
                            <div class="card-body text-center">
                                <img src="<?= base_url('assets') ?>/images/services/name-based-check.png">
                                <p class="text-primary text-20 m-0">Name Based Check</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <a href="<?= base_url() ?>user/digital_fingerprinting_applications_sub_corporate" target="_blank">
                        <div class="card card-icon mb-4">
                            <button type="button" class="btn btn-primary" style="background-color: #13375c;">
                                Total Applications <span class="badge badge-light">0</span>
                            </button>
                            <div class="card-body text-center">
                                <img src="<?= base_url('assets') ?>/images/services/fingerprint-based-check.png">
                                <p class="text-primary text-20 m-0">Digital Fingerprinting</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <a href="<?= base_url() ?>user/record_suspension_applications_sub_corporate" target="_blank">
                        <div class="card card-icon mb-4">
                            <button type="button" class="btn btn-primary" style="background-color: #13375c;">
                                Total Applications <span class="badge badge-light">0</span>
                            </button>
                            <div class="card-body text-center">
                                <img src="<?= base_url('assets') ?>/images/services/record-suspension.png">
                                <p class="text-primary text-20 m-0">Record Suspension</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <a href="<?= base_url() ?>user/us_entry_waiver_applications_sub_corporate" target="_blank">
                        <div class="card card-icon mb-4">
                            <button type="button" class="btn btn-primary" style="background-color: #13375c;">
                                Total Applications <span class="badge badge-light">0</span>
                            </button>
                            <div class="card-body text-center">
                                <img src="<?= base_url('assets') ?>/images/services/us-entry-waiver.png">
                                <p class="text-primary text-20 m-0">U.S. Entry Waiver</p>
                            </div>
                        </div>
                    </a>
                </div>
            <?php }

            elseif($this->session->userdata('sub_agent_user_role_id') == 'f971e9f3-53z5-9206-a35d-1700188b'){
            ?>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <a href="<?= base_url() ?>user/name_based_check_applications_sub_agent" target="_blank">
                    <div class="card card-icon mb-4">
                        <button type="button" class="btn btn-primary" style="background-color: #13375c;">
                            Total Applications <span class="badge badge-light">0</span>
                        </button>
                        <div class="card-body text-center">
                            <img src="<?= base_url('assets') ?>/images/services/name-based-check.png">
                            <p class="text-primary text-20 m-0">Name Based Check</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <a href="<?= base_url() ?>user/digital_fingerprinting_applications_sub_agent"  target="_blank">
                    <div class="card card-icon mb-4">
                        <button type="button" class="btn btn-primary" style="background-color: #13375c;">
                            Total Applications <span class="badge badge-light">0</span>
                        </button>
                        <div class="card-body text-center">
                            <img src="<?= base_url('assets') ?>/images/services/fingerprint-based-check.png">
                            <p class="text-primary text-20 m-0">Digital Fingerprinting</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <a href="<?= base_url() ?>user/record_suspension_applications_sub_agent" target="_blank">
                    <div class="card card-icon mb-4">
                        <button type="button" class="btn btn-primary" style="background-color: #13375c;">
                            Total Applications <span class="badge badge-light">0</span>
                        </button>
                        <div class="card-body text-center">
                            <img src="<?= base_url('assets') ?>/images/services/record-suspension.png">
                            <p class="text-primary text-20 m-0">Record Suspension</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <a href="<?= base_url() ?>user/us_entry_waiver_applications_sub_agent" target="_blank">
                    <div class="card card-icon mb-4">
                        <button type="button" class="btn btn-primary" style="background-color: #13375c;">
                            Total Applications <span class="badge badge-light">0</span>
                        </button>
                        <div class="card-body text-center">
                            <img src="<?= base_url('assets') ?>/images/services/us-entry-waiver.png">
                            <p class="text-primary text-20 m-0">U.S. Entry Waiver</p>
                        </div>
                    </div>
                </a>
            </div>
            <?php }


            elseif($this->session->userdata('outsider_user_role_id') == 'f971e9f3-98c9-9243-adrt-1700188b'){
                ?>
                <div class="col-lg-3 col-md-4 col-sm-6">
<!--                    <a href="--><?//= base_url() ?><!--user/name_based_check_applications_sub_agent" target="_blank">-->
                        <div class="card card-icon mb-4">
                            <div class="card-body text-center">
<!--                                <img src="--><?//= base_url('assets') ?><!--/images/services/name-based-check.png">-->
                                <h3>Total Coupons</h3>
                                <p class="text-primary text-20 m-0"><?php echo $get_coupons->total_coupons; ?></p>
                            </div>
                        </div>
<!--                    </a>-->
                </div>

                <div class="col-lg-3 col-md-4 col-sm-6">
<!--                    <a href="--><?//= base_url() ?><!--user/name_based_check_applications_sub_agent" target="_blank">-->
                        <div class="card card-icon mb-4">
                            <div class="card-body text-center">
<!--                                <img src="--><?//= base_url('assets') ?><!--/images/services/name-based-check.png">-->
                                <h3>Coupon Id</h3>
                                <p class="text-primary text-20 m-0"><?php echo $get_coupons->coupon_id; ?></p>
                            </div>
                        </div>
<!--                    </a>-->
                </div>

                <div class="col-lg-3 col-md-4 col-sm-6">
<!--                    <a href="--><?//= base_url() ?><!--user/name_based_check_applications_sub_agent" target="_blank">-->
                        <div class="card card-icon mb-4">
                            <div class="card-body text-center">
<!--                                <img src="--><?//= base_url('assets') ?><!--/images/services/name-based-check.png">-->
                                <h3>Remaining Coupons</h3>
                                <p class="text-primary text-20 m-0"><?php echo $get_coupons->remaining_coupons; ?></p>
                            </div>
                        </div>
<!--                    </a>-->
                </div>
            <?php } ?>


        </div>
    </div>

</div>


    <?php
    if($this->session->userdata('outsider_user_role_id') == 'f971e9f3-98c9-9243-adrt-1700188b') {
    ?>

        <div class="row">
        </div>

        <?php
    } else{
    ?>




    <?php
    if(!empty($this->session->userdata('ind_user_logged_in'))){
        ?>



        <?php
    }
        ?>





<?php } ?>