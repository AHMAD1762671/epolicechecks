
<style>
    @media only screen and (max-device-width: 768px){
        .col-lg-2.col-md-4.col-sm-6 {
            margin-bottom: 10px;
        }
    }
</style>


<style>
    .mobile_setting {
        border-radius: 20px;
        width: 56%;
        height: 18px;
        padding-bottom: 21px;
    }

    @media only screen and (max-device-width: 376px) {
        .mobile_setting {
            border-radius: 14px;
            padding: 3px 20px;
        }
    }
</style>



<br/>



<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th class="align-middle text-center" scope="col">Invoice No</th>
                    <!--                    <th class="align-middle text-center" scope="col">No. of Applications</th>-->
                    <th class="align-middle text-center" scope="col">Total Amount</th>

                    <th class="align-middle text-center" scope="col">Download Invoice</th>
<!--                    <th class="align-middle text-center" scope="col">Pay Online</th>-->
                    <th class="align-middle text-center" scope="col">Payment Status</th>
                    <th class="align-middle text-center" scope="col">Created by</th>
                    <th class="align-middle text-center" scope="col">Created at</th>

                </tr>
                </thead>
                <tbody>
                <?php
                ?>
                <tr>
                    <th class="align-middle text-center">
                        1
                    </th>


                    <th class="align-middle text-center">
                        ---
                    </th>

                    <th class="align-middle text-center">
                        <a href="<?php echo base_url('reception/download_invoice') ?>">

                            <img src="<?php echo base_url('assets/pdf223.jpg') ?>" height="40" width="55">

                        </a>
                    </th>

                    <th class="align-middle text-center">
                            <span class="un_paid">
                                Unpaid
                            </span>
                    </th>
                    <th class="align-middle text-center">epolicechecks</th>
                    <th class="align-middle text-center">2020-11-12 20:45:41</th>



                </tr>





                <tr>
                    <th class="align-middle text-center">
                        1
                    </th>

                    <th class="align-middle text-center">---</th>



                    <th class="align-middle text-center">
                        <a href="<?php echo base_url('reception/download_invoice') ?>">
                            <img src="<?php echo base_url('assets/pdf223.jpg') ?>" height="40" width="55">
                            <span class="fa fa-file-pdf-o"></span>
                        </a>
                    </th>

                    <th class="align-middle text-center">
                            <span class="paid">
                                Paid
                            </span>
                    </th>
                    <th class="align-middle text-center">epolicechecks</th>
                    <th class="align-middle text-center">2020-11-12 20:45:41</th>



                </tr>
                </tbody>
            </table>
        </div>
        <?php
        //        echo $this->paginator->get_links();
        ?>
    </div>
</div>