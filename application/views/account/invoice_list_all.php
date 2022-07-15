<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="row dashboard-sevices">

            <div class="col-lg-2 col-md-4 col-sm-6">
                <div class="card bg-gradient-info overflow-hidden text-white" style="background-image: linear-gradient(to bottom, #4a85fb 0, #163eaf 100%); box-shadow: 0 2px 10px rgb(22 62 175 / 30%);}">
                    <div class="card-body pb-0">
                        <p style="font-size: 15px; text-align: center;" class=" mb-1 "><b> Total Invoices </b></p>
                        <p style="font-size: 20px; text-align: center;" class=" mb-1 "><b><?php echo count($invoices_custom); ?></b></p>
                    </div>
                    <br>
                </div>
            </div>

            <div class="col-lg-2 col-md-4 col-sm-6">
                <div class="card bg-gradient-info overflow-hidden text-white" style="background-image: linear-gradient(to bottom, #62db17 0, #487a1b 100%); box-shadow: 0 2px 10px rgb(215 46 4 / 30%);}">
                    <div class="card-body pb-0">
                        <p style="font-size: 15px; text-align: center;" class=" mb-1 "><b> Paid Invoices </b></p>
                        <p style="font-size: 20px; text-align: center;" class=" mb-1 "><b>00</b></p>
                    </div>
                    <br>
                </div>
            </div>

            <div class="col-lg-2 col-md-4 col-sm-6">
                <div class="card bg-gradient-info overflow-hidden text-white" style="background-image: linear-gradient(to bottom, #fc7a5a 0, #d72e04 100%); box-shadow: 0 2px 10px rgb(215 46 4 / 30%);}">
                    <div class="card-body pb-0">
                        <p style="font-size: 15px; text-align: center;" class=" mb-1 "><b> Un-Paid Invoices </b></p>
                        <p style="font-size: 20px; text-align: center;" class=" mb-1 "><b><?php echo count($invoices_custom); ?></b></p>
                    </div>
                    <br>
                </div>
            </div>




            <div class="col-lg-2 col-md-4 col-sm-6">
                <a href="<?php echo base_url('account').'/custom_invoices'; ?>">
                    <div class="card bg-gradient-info overflow-hidden text-white" style="background-image: linear-gradient(to bottom, #fc7a5a 0, #d72e04 100%); box-shadow: 0 2px 10px rgb(215 46 4 / 30%);}">
                        <div class="card-body pb-0">
                            <p style="font-size: 15px; text-align: center;" class=" mb-1 "><b> Generate Custom </b></p>
                            <p style="font-size: 15px; text-align: center;" class=" mb-1 "><b>Invoice</b></p>
                        </div>
                        <br>
                    </div>
                </a>
            </div>


            <div class="col-lg-1 col-md-4 col-sm-6"> </div>

        </div>
    </div>
</div>

<br/>




<form>
    <div class="row mb-3">
        <div class="col-sm-1 mt-3 mt-md-0">
            <input type="text" value="" name="id" class="form-control" placeholder="Invoice No.">
        </div>

        <div class="col-sm-2 mt-3 mt-md-0">
            <input type="text" value="" name="l_name" class="form-control" placeholder="Name">
        </div>

        <div class="col-sm-2 mt-3 mt-md-0">
            <input type="text" value="" name="f_name" class="form-control" placeholder="Email">
        </div>

<!--        <div class="col-sm-2 mt-3 mt-md-0">-->
<!--            <input type="text" value="" name="phone" class="form-control" placeholder="Start Date">-->
<!--        </div>-->



        <div class="col-sm-2 mt-3 mt-md-0">
            <input type="text" value="" name="dob" autocomplete="off" class="form-control picker2"  data-date-format="yyyy-mm-dd" placeholder="Date">
        </div>


        <div class="col-sm-2 mt-3 mt-md-0">
<!--            <input type="text" value="" name="dob" autocomplete="off" class="form-control picker2"  data-date-format="yyyy-mm-dd" placeholder="End Date">-->
            <select class="form-control">
                <option>Select Invoice Status</option>
                <option>Paid </option>
                <option>Un-Paid</option>
            </select>
        </div>

        <div class="col-sm-1 mt-3 mt-md-0">
            <button type="submit" class="btn btn-primary btn-block">Search</button>
        </div>
    </div>
</form>





<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th class="align-middle" scope="col">Invoice No.</th>
                    <th class="align-middle" scope="col">Email</th>
                    <th class="align-middle" scope="col">Amount</th>
                    <th class="align-middle" scope="col">Due Date</th>
                    <th class="align-middle" scope="col">Status</th>
                    <th class="align-middle" scope="col">Created at</th>
                    <th class="align-middle" scope="col">Action</th>
                </tr>
                </thead>
                <tbody>




                <?php
//                $i = 101;
                foreach ($invoices_custom as $key => $value) {
                    ?>

                    <tr>

                        <th class="align-middle">
                            <a href="<?php echo base_url('account').'/download_invoice/'.$value->invoice_id; ?>">
                                <?php  echo $value->invoice_id ; ?>
                            </a>
                        </th>

                        <th class="align-middle"><?php echo $value->user_id; ?></th>
                        <th class="align-middle"><b><?php echo $value->total_amount; ?></th>
                        <th class="align-middle"><?php echo $value->created_at; ?></th>
                        <th class="align-middle"><?php echo $value->payment_status; ?></th>
                        <th class="align-middle"><?php echo $value->created_at; ?></th>

                        <td class="align-middle">

                            <!--                                <form style="display: inline-grid;" action="--><?//= base_url('#') ?><!--" method="post">-->
<!--                            <button class="btn btn-danger" title="Change Status of User">-->
<!--                                <span class="fa fa-power-off"></span>-->
<!--                                <input type="hidden" value="--><?php // ?><!--" name="id">-->
<!--                                <input type="hidden" value="on" name="status">-->
<!--                            </button>-->
                            <!--                                </form>-->

                            <!--                            <form style="display: inline-grid;" action="--><?//= base_url('http://localhost/epolicechecks/user/download_invoice') ?><!--" method="post">-->
                            <a href="<?php echo base_url('account').'/download_invoice/'.$value->invoice_id; ?>">
                                <button class="btn btn-primary" title="download invoice">
                                    <span class="fa fa-download"></span>
                                    <input type="hidden" value="<?php  ?>" name="id">
                                    <input type="hidden" value="on" name="status">
                                </button>
                            </a>



                            <a href="#">
                                <button class="btn btn-success" title="Send to User">
                                    <span class="fa fa-paper-plane"></span>
                                    <input type="hidden" value="<?php  ?>" name="id">
                                    <input type="hidden" value="on" name="status">
                                </button>
                            </a>


                            <!--                            </form>-->
                        </td>
                    </tr>

                <?php } ?>


                </tbody>

            </table>
        </div>
<!--        --><?php //echo $this->paginator->get_links(); ?>
    </div>
</div>

