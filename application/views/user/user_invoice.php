
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



<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="row dashboard-sevices">


            <!--            <div class="col-lg-1 col-md-4 col-sm-6"> </div>-->

            <div class="col-lg-2 col-md-4 col-sm-6">
                <div class="card bg-gradient-info overflow-hidden text-white" style="background-image: linear-gradient(to bottom, #4a85fb 0, #163eaf 100%); box-shadow: 0 2px 10px rgb(22 62 175 / 30%);}">
                    <div class="card-body pb-0">
                        <p style="font-size: 15px; text-align: center;" class=" mb-1 "><b>Total Invoices </b></p>
                        <p style="font-size: 25px; text-align: center;" class=" mb-1 "><b>30</b></p>
                    </div>
                    <!--                    <br>-->
                </div>
            </div>


            <div class="col-lg-2 col-md-4 col-sm-6">
                <div class="card bg-gradient-info overflow-hidden text-white" style="background-image: linear-gradient(to bottom, #fc7a5a 0, #d72e04 100%); box-shadow: 0 2px 10px rgb(215 46 4 / 30%);}">
                    <div class="card-body pb-0">
                        <p style="font-size: 15px; text-align: center;" class=" mb-1 "><b>Unpaid Invoices </b></p>
                        <p style="font-size: 25px; text-align: center;" class=" mb-1 "><b>25</b></p>
                    </div>
                    <!--                    <br>-->
                </div>
            </div>





            <div class="col-lg-2 col-md-4 col-sm-6">
                <div class="card bg-gradient-info overflow-hidden text-white" style="background-image: linear-gradient(to bottom, #62db17 0, #487a1b 100%); box-shadow: 0 2px 10px rgb(215 46 4 / 30%);}">
                    <div class="card-body pb-0">
                        <p style="font-size: 15px; text-align: center;" class=" mb-1 "><b>Paid Invoices </b></p>
                        <p style="font-size: 25px; text-align: center;" class=" mb-1 "><b>05</b></p>
                    </div>
                    <!--                    <br>-->
                </div>
            </div>


        </div>
    </div>
</div>


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
                    <th class="align-middle text-center" scope="col">Pay Online</th>
                    <th class="align-middle text-center" scope="col">Payment Status</th>
                    <th class="align-middle text-center" scope="col">Created by</th>
                    <th class="align-middle text-center" scope="col">Created at</th>

                </tr>
                </thead>
                <tbody>
                <?php
//                foreach ($applications as $key => $value) {
                    ?>
                    <tr>
                        <th class="align-middle text-center">
<!--                            <a href="--><?php //echo base_url('user/user_invoice_detail'); ?><!--"> 1 </a>-->
                        1
                        </th>

                        <th class="align-middle text-center">CAD 100</th>



                        <th class="align-middle text-center">
                            <a href="<?php echo base_url('user/download_invoice') ?>">

                                <img src="<?php echo base_url('assets/pdf223.jpg') ?>" height="40" width="55">

<!--                                <button class="btn btn-success" title="Download the Invoice">-->
<!--                                    <span class="fa fa-download"></span>-->
<!--                                </button>-->
                            </a>
                        </th>

<!--                        payment button-->
                        <th class="align-middle text-center">
                            <FORM METHOD="POST" style="text-align: center !important;" ACTION= https://www3.moneris.com/HPPDP/index.php  >
                                <INPUT TYPE="HIDDEN" NAME="ps_store_id" VALUE="H3ZY219448">
                                <INPUT TYPE="HIDDEN" NAME="hpp_key" VALUE="hpO9MV8XG8H5">
                                <INPUT TYPE="HIDDEN" NAME="charge_total" VALUE="100">
                                <INPUT TYPE="HIDDEN" NAME="invoice_id" VALUE="1158">
                                <INPUT TYPE="HIDDEN" NAME="bill_company_name" VALUE="GAC">
                                <input type="hidden" name="cust_id" VALUE="123456">
                                <INPUT TYPE="HIDDEN" NAME="descriptionn" VALUE="Hellow Description">
                                <INPUT TYPE="HIDDEN" NAME="quantity" VALUE="2">
<!--                                <INPUT TYPE="HIDDEN" NAME="email" VALUE="test@email.com">-->
<!--                                <INPUT TYPE="HIDDEN" NAME="note" VALUE="Note details are here">-->
<!--                                <INPUT TYPE="HIDDEN" NAME="idn" VALUE="pcode">-->
<!--                                <INPUT TYPE="HIDDEN" NAME="quantityn" VALUE="1">-->
<!--                                <INPUT TYPE="HIDDEN" NAME="gst" VALUE="1">-->
<!--                                <INPUT TYPE="HIDDEN" NAME="hst" VALUE="1">-->
<!--                                <INPUT TYPE="HIDDEN" NAME="pricen" VALUE="1">-->
<!--                                <INPUT TYPE="HIDDEN" NAME="subtotaln" VALUE="1">-->
<!--                                <a href="" target="_blank">-->
                                <INPUT TYPE="SUBMIT" NAME="SUBMIT" class="btn btn-primary" style="padding: 3px 20px; border-radius: 14px;" VALUE="Pay Now" formtarget="_blank">
<!--                                    </a>-->
                            </FORM>
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
<!--                            <a href="--><?php //echo base_url('user/user_invoice_detail'); ?><!--"> 1 </a>-->
                        1
                        </th>

                        <th class="align-middle text-center">CAD 100</th>



                        <th class="align-middle text-center">
                            <a href="<?php echo base_url('user/download_invoice') ?>">
                                <img src="<?php echo base_url('assets/pdf223.jpg') ?>" height="40" width="55">
<!--                                <button class="btn btn-success" title="Download the Invoice">-->
                                    <span class="fa fa-file-pdf-o"></span>
<!--                                </button>-->
                            </a>
                        </th>

<!--                        payment button-->
                        <th class="align-middle text-center">
                            <FORM METHOD="POST" style="text-align: center !important;" ACTION= https://www3.moneris.com/HPPDP/index.php  >
                                <INPUT TYPE="HIDDEN" NAME="ps_store_id" VALUE="H3ZY219448">
                                <INPUT TYPE="HIDDEN" NAME="hpp_key" VALUE="hpO9MV8XG8H5">
                                <INPUT TYPE="HIDDEN" NAME="charge_total" VALUE="100">
                                <INPUT TYPE="HIDDEN" NAME="invoice_id" VALUE="1158">
                                <INPUT TYPE="HIDDEN" NAME="bill_company_name" VALUE="GAC">
                                <input type="hidden" name="cust_id" VALUE="123456">
                                <INPUT TYPE="HIDDEN" NAME="descriptionn" VALUE="Hellow Description">
                                <INPUT TYPE="HIDDEN" NAME="quantity" VALUE="2">
<!--                                <INPUT TYPE="HIDDEN" NAME="email" VALUE="test@email.com">-->
<!--                                <INPUT TYPE="HIDDEN" NAME="note" VALUE="Note details are here">-->
<!--                                <INPUT TYPE="HIDDEN" NAME="idn" VALUE="pcode">-->
<!--                                <INPUT TYPE="HIDDEN" NAME="quantityn" VALUE="1">-->
<!--                                <INPUT TYPE="HIDDEN" NAME="gst" VALUE="1">-->
<!--                                <INPUT TYPE="HIDDEN" NAME="hst" VALUE="1">-->
<!--                                <INPUT TYPE="HIDDEN" NAME="pricen" VALUE="1">-->
<!--                                <INPUT TYPE="HIDDEN" NAME="subtotaln" VALUE="1">-->
<!--                                <a href="" target="_blank">-->
                                <INPUT TYPE="SUBMIT" NAME="SUBMIT" class="btn btn-primary" style="padding: 3px 20px; border-radius: 14px;" VALUE="Pay Now" formtarget="_blank">
<!--                                <INPUT TYPE="SUBMIT" NAME="SUBMIT" class="btn btn-primary screen-submit-btn mobile_setting" style="border-radius: 14px; padding: 3px 20px;" VALUE="Pay Now" formtarget="_blank">-->
<!--                                    </a>-->



                            </FORM>

                        </th>


                        <th class="align-middle text-center">
                            <span class="paid">
                                Paid
                            </span>
                        </th>
                        <th class="align-middle text-center">epolicechecks</th>
                        <th class="align-middle text-center">2020-11-12 20:45:41</th>



                    </tr>
                    <?php
//                }
//                if (empty($applications)) {
//                    ?>
<!--                    <tr>-->
<!--                        <td colspan="100" class="text-center">No Record Found</td>-->
<!--                    </tr>-->
<!--                --><?php //
//                }
//                ?>
                </tbody>
            </table>
        </div>
        <?php
//        echo $this->paginator->get_links();
        ?>
    </div>
</div>