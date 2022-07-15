<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="row dashboard-sevices">


            <div class="col-lg-1 col-md-4 col-sm-6"> </div>

            <div class="col-lg-2 col-md-4 col-sm-6">
                <div class="card bg-gradient-info overflow-hidden text-white" style="background-image: linear-gradient(to bottom, #4a85fb 0, #163eaf 100%); box-shadow: 0 2px 10px rgb(22 62 175 / 30%);}">
                    <div class="card-body pb-0">
                        <p style="font-size: 15px; text-align: center;" class=" mb-1 "><b>Total Invoices </b></p>
                        <p style="font-size: 20px; text-align: center;" class=" mb-1 "><b>12</b></p>
                    </div>
                    <br>
                </div>
            </div>


            <div class="col-lg-2 col-md-4 col-sm-6">
                <div class="card bg-gradient-info overflow-hidden text-white" style="background-image: linear-gradient(to bottom, #fc7a5a 0, #d72e04 100%); box-shadow: 0 2px 10px rgb(215 46 4 / 30%);}">
                    <div class="card-body pb-0">
                        <p style="font-size: 15px; text-align: center;" class=" mb-1 "><b>Pending Invoices</b></p>
                        <p style="font-size: 20px; text-align: center;" class=" mb-1 "><b>5</b></p>
                    </div>
                    <br>
                </div>
            </div>


            <div class="col-lg-2 col-md-4 col-sm-6">
                <div class="card bg-gradient-info overflow-hidden text-white" style="background-image: linear-gradient(to bottom, #60c3b6 0, #269f90 100%);box-shadow: 0 2px 10px rgb(38 159 144 / 30%);">
                    <div class="card-body pb-0">
                        <p style="font-size: 15px; text-align: center;" class=" mb-1 "><b>Total Amount</b></p>
                        <p style="font-size: 20px; text-align: center;" class=" mb-1 "><b>4</b></p>
                    </div>
                    <br>
                </div>
            </div>


            <div class="col-lg-2 col-md-4 col-sm-6">
                <div class="card bg-gradient-info overflow-hidden text-white" style="background-image: linear-gradient(to bottom, #fb6ba7 0, #ea2167 100%);box-shadow: 0 2px 10px rgb(234 33 103 / 30%);">
                    <div class="card-body pb-0">
                        <p style="font-size: 15px; text-align: center;" class=" mb-1 "><b>Paid Amount:</b></p>
                        <p style="font-size: 20px; text-align: center;" class=" mb-1 "><b>8</b></p>
                    </div>
                    <br>
                </div>
            </div>
<!---->
<!---->
            <div class="col-lg-2 col-md-4 col-sm-6">
                <div class="card bg-gradient-info overflow-hidden text-white" style="background-image: linear-gradient(to bottom, rgb(255, 179, 94) 0, #c87517 100%);box-shadow: 0 2px 10px rgb(234 33 103 / 30%);">
                    <div class="card-body pb-0">
                        <p style="font-size: 15px; text-align: center;" class=" mb-1 "><b>Remaining</b></p>
                        <p style="font-size: 20px; text-align: center;" class=" mb-1 "><b>5</b></p>
                    </div>
                    <br>
                </div>
            </div>
<!---->
<!---->
            <div class="col-lg-1 col-md-4 col-sm-6"> </div>

        </div>
    </div>
</div>

<br/>
<br/>



<form>
    <div class="row mb-3">
        <div class="col-sm-2 mt-3 mt-md-0">
            <input type="datetime-local" value="<?= $client_id ?>" name="id" class="form-control" placeholder="Start Date">
        </div>

        <div class="col-sm-2 mt-3 mt-md-0">
            <input type="date" value="<?= $l_name ?>" name="l_name" class="form-control" placeholder="End Date">
        </div>


        <div class="col-sm-2 mt-3 mt-md-0">

            <select name="application_status" class="btn btn-secondary dropdown-toggle">
                <option value="3" selected>All Status</option>
                <option value="1">Paid</option>
                <option value="0">Unpaid</option>
            </select>
        </div>

        <div class="col-sm-1 mt-3 mt-md-0">
            <button type="submit" class="btn btn-primary btn-block">Search</button>
        </div>
    </div>
</form>


<!--<div class="row">-->
<!--    <div style="border: 1px #000000 solid;" class="col-md-4 col-lg-4">-->
<!--        <a href="--><?php //echo base_url('portal/action_outside_user') ?><!--">-->
<!--            <button class="btn btn-success" title="Download Excel Format">-->
<!--                <span class="fa fa-download"></span>-->
<!--            </button>-->
<!--        </a>-->
<!---->
<!--        <a href="--><?php //echo base_url('portal/action_outside_user') ?><!--">-->
<!--            <button class="btn btn-danger" title="Download Excel Format">-->
<!--                <span class="fa fa-download"></span>-->
<!--            </button>-->
<!--        </a>-->
<!--    </div>-->
<!---->
<!--</div>-->

<!--<div class="row">-->
<!--    <div style="border: 1px #000000 solid;" class="col-md-4 col-lg-4">-->
<!--        Total Amount: 4725-->
<!--    </div>-->
<!---->
<!--    <div style="border: 1px #000000 solid;" class="col-md-4 col-lg-4">-->
<!--        Paid Amount: 0-->
<!--    </div>-->
<!---->
<!--    <div style="border: 1px #000000 solid;" class="col-md-4 col-lg-4">-->
<!--        Remaining: 4725-->
<!--    </div>-->
<!--</div>-->


<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                <tr>

                    <th scope="col">  Invoice Id</th>
                    <th scope="col">user_id</th>
                    <th scope="col">Total Amount</th>
                    <th scope="col">Remaining</th>
                    <th scope="col">payable amount	</th>
                    <th scope="col">tax</th>
                    <th scope="col">Payment Status</th>
                    <th scope="col">created_at</th>
                    <th scope="col">created_by</th>
                    <th scope="col">Download PDF</th>

<!--                    <th scope="col">Created At </th>-->
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($office_desk as $value) {
                    ?>
                    <tr>

                        <td class="align-middle">
                            <a href="<?php echo base_url('#').$value->invoice_id; ?>">
                                <?= $value->invoice_id; ?>
                            </a>
                        </td>

                        <td class="align-middle"><?= $value->user_id; ?></td>
                        <td class="align-middle"><?= $value->total_amount; ?></td>
                        <td class="align-middle"><?= $value->remaining; ?></td>
                        <td class="align-middle"><?= $value->payable_amount; ?></td>
                        <td class="align-middle"><?= $value->tex; ?></td>

                            <td style="color: #4caf50;"  class="align-middle">0</td>


                        <td class="align-middle"><?= $value->created_at; ?></td>
                        <td class="align-middle"><?= $value->created_by; ?></td>

                        <td class="align-middle">
                            <a href="<?php echo base_url('portal/pdfDownload') ?>">
                                <button class="btn btn-success" title="Download Excel Format">
                                    <span class="fa fa-download"></span>
                                </button>
                            </a>
                        </td>

                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>