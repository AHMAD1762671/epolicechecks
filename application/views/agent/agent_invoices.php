<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="row dashboard-sevices">

            <div class="col-lg-2 col-md-4 col-sm-6">
                <div class="card bg-gradient-info overflow-hidden text-white" style="background-image: linear-gradient(to bottom, #4a85fb 0, #163eaf 100%); box-shadow: 0 2px 10px rgb(22 62 175 / 30%);}">
                    <div class="card-body pb-0">
                        <p style="font-size: 15px; text-align: center;" class=" mb-1 "><b>Total Invoices </b></p>
                        <p style="font-size: 25px; text-align: center;" class=" mb-1 "><b>00</b></p>
                    </div>
                </div>
            </div>


            <div class="col-lg-2 col-md-4 col-sm-6">
                <div class="card bg-gradient-info overflow-hidden text-white" style="background-image: linear-gradient(to bottom, #fc7a5a 0, #d72e04 100%); box-shadow: 0 2px 10px rgb(215 46 4 / 30%);}">
                    <div class="card-body pb-0">
                        <p style="font-size: 15px; text-align: center;" class=" mb-1 "><b>Unpaid Invoices </b></p>
                        <p style="font-size: 25px; text-align: center;" class=" mb-1 "><b>25</b></p>
                    </div>
                </div>
            </div>




            <div class="col-lg-2 col-md-4 col-sm-6">
                <div class="card bg-gradient-info overflow-hidden text-white" style="background-image: linear-gradient(to bottom, #62db17 0, #487a1b 100%); box-shadow: 0 2px 10px rgb(215 46 4 / 30%);}">
                    <div class="card-body pb-0">
                        <p style="font-size: 15px; text-align: center;" class=" mb-1 "><b>Paid Invoices </b></p>
                        <p style="font-size: 25px; text-align: center;" class=" mb-1 "><b>00</b></p>
                    </div>
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
                    <th class="align-middle text-center" scope="col">No. of Applications</th>
                    <th class="align-middle text-center" scope="col">Total Amount</th>
                    <th class="align-middle text-center" scope="col">Created at</th>
                    <th class="align-middle text-center" scope="col">Download Payment</th>
                    <th class="align-middle text-center" scope="col">Go to Payment</th>
                    <th class="align-middle text-center" scope="col">Created by</th>
                </tr>
                </thead>
                <tbody>
                <?php

                ?>
                <tr>
                    <th class="align-middle text-center"><a href="<?php echo base_url('agent/agent_invoice_detail'); ?>"> 1 </a></th>
                    <th class="align-middle text-center">2</th>
                    <th class="align-middle text-center">100</th>
                    <th class="align-middle text-center">2020-11-12 20:45:41</th>

                    <td class="align-middle text-center">
                        <a href="<?php echo base_url('reception/download_invoice') ?>">
                            <button class="btn btn-success" title="Download Excel Format">
                                <span class="fa fa-download"></span>
                            </button>
                        </a>
                    </td>

                    <th class="align-middle text-center" style="float: right;">
                        <FORM METHOD="POST" ACTION= https://www3.moneris.com/HPPDP/index.php  >
                            <INPUT TYPE="HIDDEN" NAME="ps_store_id" VALUE="SNL4519448">
                            <INPUT TYPE="HIDDEN" NAME="hpp_key" VALUE="hpZ9E5BTBHMV">
                            <INPUT TYPE="HIDDEN" NAME="charge_total" VALUE="0.1">
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
                            <INPUT TYPE="SUBMIT" NAME="SUBMIT" VALUE="Click to proceed to Secure Payment" formtarget="_blank">
                            <!--                                    </a>-->
                        </FORM>
                    </th>




                    <th class="align-middle text-center">admin@epolicechecks.com</th>
                </tr>


                </tbody>
            </table>
        </div>
        <?php
        //        echo $this->paginator->get_links();
        ?>
    </div>
</div>