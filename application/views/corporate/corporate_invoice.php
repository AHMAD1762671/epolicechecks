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


<!--<div class="row">-->
<!--    <div class="col-lg-12 col-md-12">-->
<!--        <div class="container">-->
<!--            <br />-->
<!--            <div class="col-lg-12 col-md-12">-->
<!---->
<!--                <div class="container">-->
<!--                    <br />-->
<!--                    <br />-->
<!--                    <h3 style="text-align: center;">Service Order</h3>-->
<!--                    <div class="form-group">-->
<!--                        <form action="--><?//= base_url('corporate/multiple_file_upload') ?><!--" method="post" enctype="multipart/form-data" name="add_name" id="add_name">-->
<!--                            <div class="table-responsive">-->
<!--                                <label>Attach Document</label>-->
<!--                                <table class="table table-bordered" id="dynamic_field">-->
<!--                                    <tr>-->
<!--                                        <td><input type="file" class="form-control" name="files[]" multiple/></td>-->
<!--                                        <input type="hidden" name="submitted_to" value="83dbdd12-fb78-4433-832a-da8f8516">-->
<!---->
<!--                                    </tr>-->
<!--                                </table>-->
<!--                                <input style="background-color: #13375c; color: #ffffff;" class="form-control" type="submit" name="fileSubmit" value="Send Document"/>-->
<!--                            </div>-->
<!--                        </form>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->

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
                    <th class="align-middle text-center" scope="col">Created by</th>
                    <th class="align-middle text-center" scope="col">Download PDF</th>
                    <th class="align-middle text-center" scope="col">Go To Payment</th>
                    <th class="align-middle text-center" scope="col">Payment Status</th>
                </tr>
                </thead>
                <tbody>
                <?php
//                foreach ($applications as $key => $value) {
                    ?>
                    <tr>
                        <th class="align-middle text-center"><a href="<?php echo base_url('corporate/corporate_invoice_detail'); ?>"> 1 </a></th>
                        <th class="align-middle text-center">2</th>
                        <th class="align-middle text-center">CAD 100</th>
                        <th class="align-middle text-center">2020-11-12 20:45:41</th>
                        <th class="align-middle text-center">epolicechecks</th>


                        <td class="align-middle text-center">
                            <a href="<?php echo base_url('reception/download_invoice') ?>">
                                <button class="btn btn-success" title="Download Excel Format">
                                    <span class="fa fa-download"></span>
                                </button>
                            </a>
                        </td>

<!--                        payment button-->
                        <th class="align-middle text-center" style="float: right;">
                            <FORM METHOD="POST" ACTION= https://www3.moneris.com/HPPDP/index.php >
                                <INPUT TYPE="HIDDEN" NAME="ps_store_id" VALUE="QS8CE19448">
                                <INPUT TYPE="HIDDEN" NAME="hpp_key" VALUE="hp71OISP8IUL">
                                <INPUT TYPE="HIDDEN" NAME="charge_total" VALUE="0.1">
                                <INPUT TYPE="HIDDEN" NAME="invoice_id" VALUE="1158">
                                <INPUT TYPE="HIDDEN" NAME="bill_company_name" VALUE="GAC">
                                <input type="hidden" name="cust_id" VALUE="123456">
                                <INPUT TYPE="HIDDEN" NAME="descriptionn" VALUE="Hellow Description">
                                <INPUT TYPE="HIDDEN" NAME="quantity" VALUE="2">
                                <INPUT TYPE="SUBMIT" NAME="SUBMIT" VALUE="Proceed to Secure Payment" formtarget="_blank">
                            </FORM>
                        </th>


                        <th class="align-middle text-center">Unpaid</th>


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