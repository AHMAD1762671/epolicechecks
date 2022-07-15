<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="row dashboard-sevices">
            <?php
            //            if (check_route('epolice-services', 'get')):
            ?>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <a href="#">
                    <div class="card card-icon mb-4">
                        <div class="card-body text-center">
<!--                                                            <img src="--><?//= base_url() ?><!--assets/images/services/epolice.png">-->
                            <a href="<?php echo base_url('portal/emails_report'); ?>"></a>
                            <p class="text-primary text-20 m-0">Emails</p>
                        </div>
                    </div>
                </a>
            </div>



            <div class="col-lg-3 col-md-4 col-sm-6">
                <a href="<?= base_url() ?>portal/get_corporate_users">
                    <div class="card card-icon mb-4">
                        <div class="card-body text-center">
                            <p class="text-primary text-20 m-0">Sales</p>
                        </div>
                    </div>
                </a>
            </div>


            <div class="col-lg-3 col-md-4 col-sm-6">
                <a href="#">
                    <div class="card card-icon mb-4">
                        <div class="card-body text-center">
                            <p class="text-primary text-20 m-0">Brands</p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-lg-3 col-md-4 col-sm-6">
                <a href="<?= base_url() ?>portal/monthly_report">
                    <div class="card card-icon mb-4">
                        <div class="card-body text-center">
                            <p class="text-primary text-20 m-0">Report List</p>
                        </div>
                    </div>
                </a>
            </div>



            <!--            --><?php //endif; ?>
        </div>
    </div>
</div>
