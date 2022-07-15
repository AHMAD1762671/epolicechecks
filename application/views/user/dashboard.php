<style>

    span.badge.badge-light {
        font-size: 15px;
    }


     .card-icon .card-body {
         padding: .5rem .5rem;
     }
    .dashboard-sevices img {
        height: 52px;
    }

    /*header mobile logo setting*/
    @media screen and (max-width: 767px) {
        .main-header .logo img {
            width: 115px !important;
            height: 30px !important;
            max-width: none !important;
        }
        .menu-toggle{
            margin-left: 50px;
        }
    }



    /*for dashboard buttons in ipad and ipad pro size*/
    @media only screen and (max-width: 280px) and (min-width: 280px) {
        .button-width-set {
            width: 47% !important;
            font-size: 9px;
        }
    }


    @media only screen and (max-width: 1024px) and (min-width: 768px)  {
        .button-width-set{
            width: 47% !important;
            font-size: 8px;
        }


        .change-font-size{
            font-size: 16px;
        }

        .font-size-change-ipad{
            font-size: 11px;
        }
        .font-size-change-digital{
            font-size: 18px;
        }
    }
</style>


<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="row dashboard-sevices">

            <?php
            if($this->session->userdata('ind_user_role_id') == '3ee65tf9-7ed5-45ft-hdk1-f2afa31b'){
                ?>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <a href="<?= base_url() ?>user/name_based_check_applications" target="_blank">
                        <div class="card card-icon mb-4">
                            <button type="button" class="btn btn-primary" style="background-color: #13375c; width: 100%;">
                                Total Applications <span class="badge badge-light"><?php echo count($get_namebase); ?></span>
                            </button>
                            <div class="card-body text-center">
                                <img src="<?= base_url('assets') ?>/images/services/name-based-check.png">
                                <p class="text-primary text-20 m-0">Name Based Check</p>
                            </div>
                    </a>



<!--                    <div class="row" style="padding-left: 0%; padding-right: 0%;">-->
<!--                        <div class="col-lg-4 col-md-4">-->
<!--                            <a href="--><?php //echo base_url().'user/name_based_check_applications'; ?><!--" target="_blank">-->
<!--                                <button type="button" class="btn btn-danger"> New Message 2 </button>-->
<!--                            </a>-->
<!--                        </div>-->
<!--                        <div class="col-lg-4 col-md-4">-->
<!--                        </div>-->
<!--                        <div class="col-lg-4 col-md-4">-->
<!--                            <a href="--><?php //echo base_url().'user/app_name_based_check_form'; ?><!--" target="_blank">-->
<!--                                <button type="button" class="btn btn-success"> Apply Now </button>-->
<!--                            </a>-->
<!--                        </div>-->
<!--                    </div>-->


                    <div class="w3-show-inline-block">

                        <a href="<?php echo base_url().'user/name_based_check_applications'; ?>" target="_blank">
                            <button type="button" class="btn btn-danger button-width-set" style="float: left;">New Message <?= $namebasedcomments; ?></button>
                        </a>

                        <a href="<?php echo base_url().'user/app_name_based_check_form'; ?>" target="_blank">
                            <button type="button" class="btn btn-success button-width-set" style="float: right;"> Apply Now </button>
                        </a>

                    </div>


                </div>

                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <a href="<?= base_url() ?>user/security-screening/digital-fingerprinting" target="_blank">
                        <div class="card card-icon mb-4">
                            <button type="button" class="btn btn-primary" style="background-color: #13375c; width: 100%;">
                                Total Applications <span class="badge badge-light"><?php echo count($fingerprinting); ?></span>
                            </button>
                            <div class="card-body text-center">
                                <img src="<?= base_url('assets') ?>/images/services/fingerprint-based-check.png">
                                <p class="text-primary text-20 m-0 font-size-change-digital">Digital Fingerprinting</p>
                            </div>
                    </a>

                    <div class="w3-show-inline-block">

                        <a href="<?php echo base_url().'user/security-screening/digital-fingerprinting'; ?>" target="_blank">
                            <button type="button" class="btn btn-danger button-width-set" style="float: left;"> New Message <?= $fingerprintcomments; ?> </button>
                        </a>

                        <a href="<?php echo base_url().'user/digital_fingerprint_new'; ?>" target="_blank">
                            <button type="button" class="btn btn-success button-width-set" style="float: right;"> Apply Now </button>
                        </a>

                    </div>

                        </div>

                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <a href="<?= base_url() ?>user/security-screening/record-suspension" target="_blank">
                        <div class="card card-icon mb-4">
                            <button type="button" class="btn btn-primary" style="background-color: #13375c; width: 100%;">
                                Total Applications <span class="badge badge-light"><?php echo count($recordSuspension); ?></span>
                            </button>
                            <div class="card-body text-center">
                                <img src="<?= base_url('assets') ?>/images/services/record-suspension.png">
                                <p class="text-primary text-20 m-0">Record Suspension</p>
                            </div>
                    </a>


                    <div class="w3-show-inline-block">

                        <a href="<?php echo base_url().'user/security-screening/record-suspension'; ?>" target="_blank">
                            <button type="button" class="btn btn-danger button-width-set" style="float: left;"> New Message <?= $recordsuspensioncomments; ?> </button>
                        </a>

                        <a href="<?php echo base_url().'user/app_record_suspension'; ?>" target="_blank">
                            <button type="button" class="btn btn-success button-width-set" style="float: right;"> Apply Now </button>
                        </a>

                    </div>



<!--                            <a href="--><?php //echo base_url().'user/app_record_suspension'; ?><!--">-->
<!--                                <button type="button" class="btn btn-success" style="float: right;"> Apply Now </button>-->
<!--                            </a>-->
                </div>
            </div>


                <div class="col-lg-3 col-md-4 col-sm-6">
                    <a href="<?= base_url() ?>user/security-screening/us-entry-waiver" target="_blank">
                        <div class="card card-icon mb-4">
                            <button type="button" class="btn btn-primary" style="background-color: #13375c; width: 100%;">
                                Total Applications <span class="badge badge-light"><?php echo count($usEntry); ?></span>
                            </button>
                            <div class="card-body text-center">
                                <img src="<?= base_url('assets') ?>/images/services/us-entry-waiver.png">
                                <p class="text-primary text-20 m-0">U.S. Entry Waiver</p>
                            </div>
                    </a>


                    <div class="w3-show-inline-block">
                        <a href="<?php echo base_url().'user/security-screening/us-entry-waiver'; ?>" target="_blank">
                            <button type="button" class="btn btn-danger button-width-set" style="float: left;"> New Message <?= $usentrywaivercomments; ?> </button>
                        </a>

                        <a href="<?php echo base_url().'user/record_suspension_new'; ?>" target="_blank">
                            <button type="button" class="btn btn-success button-width-set" style="float: right;"> Apply Now </button>
                        </a>

                    </div>

                        </div>

                </div>








            <?php }

            elseif($this->session->userdata('sub_corporate_user_role_id') == 'f971e9f3-57c9-9206-a35d-1700188b'){
                ?>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <a href="<?= base_url() ?>user/name_based_check_applications_sub_corporate" target="_blank">
                        <div class="card card-icon mb-4">
                            <button type="button" class="btn btn-primary" style="background-color: #13375c;">
                                Total Applications <span class="badge badge-light"><?php echo count($get_namebase); ?></span>
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
                                Total Applications <span class="badge badge-light"><?php echo count($fingerprinting); ?></span>
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
                                Total Applications <span class="badge badge-light"><?php echo count($recordSuspension); ?></span>
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
                                Total Applications <span class="badge badge-light"><?php echo count($usEntry); ?></span>
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
                            Total Applications <span class="badge badge-light"><?php echo count($get_namebase); ?></span>
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
                            Total Applications <span class="badge badge-light"><?php echo count($fingerprinting); ?></span>
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
                            Total Applications <span class="badge badge-light"><?php echo count($recordSuspension); ?></span>
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
                            Total Applications <span class="badge badge-light"><?php echo count($usEntry); ?></span>
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

<br/>
<br/>
<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="row dashboard-sevices">

                <div class="col-lg-3 col-md-4 col-sm-6">

                </div>




        <div class="col-lg-3 col-md-4 col-sm-6">
            <a href="<?= base_url() ?>user/user_invitations" target="_blank">
                <div class="card card-icon mb-4">
                    <button type="button" class="btn btn-primary" style="background-color: #13375c; width: 100%;">
                        Total Invitations
                                <span class="badge badge-light">
                                    0
                                </span>
                    </button>
                    <div class="card-body text-center">
                        <img src="<?= base_url('assets') ?>/images/services/invitation.png">
                        <p class="text-primary text-20 m-0">My Invitations</p>
                    </div>
                    <!--                    </a>-->

                    <!--                    <a href="--><?php //echo base_url().'user/app_name_based_check_form'; ?><!--">-->
                    <!--                        <button type="button" class="btn btn-danger" style="float: left;"> New Message 2 </button>-->
                    <!---->
                    <!--                        <button type="button" class="btn btn-success" style="float: right;"> Apply Now </button>-->
            </a>

        </div>
    </div>


        <div class="col-lg-3 col-md-4 col-sm-6">
<!--            <a href="--><?//= base_url() ?><!--user/name_based_check_applications" target="_blank">-->
            <a href="<?= base_url() ?>user/user_pending_applications" target="_blank">
                <div class="card card-icon mb-4">
                    <button type="button" class="btn btn-primary font-size-change-ipad" style="background-color: #13375c; width: 100%;">
                       Total Pending Applications
                        <span class="badge badge-light">0</span>
                    </button>
                    <div class="card-body text-center">
                        <img src="<?= base_url('assets') ?>/images/services/pending-application.png">
                        <p class="text-primary text-20 m-0 change-font-size"> Pending Applications </p>
                    </div>
<!--            </a>-->

<!--            <a href="--><?php //echo base_url().'user/app_name_based_check_form'; ?><!--">-->
<!--                <button type="button" class="btn btn-danger" style="float: left;"> New Message 2 </button>-->
<!---->
<!--                <button type="button" class="btn btn-success" style="float: right;"> Apply Now </button>-->
            </a>
                </div>
        </div>



    <div class="col-lg-3 col-md-4 col-sm-6">

    </div>




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