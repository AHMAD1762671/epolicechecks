<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="row dashboard-sevices">

            <div class="col-lg-2 col-md-4 col-sm-6">
                <div class="card bg-gradient-info overflow-hidden text-white" style="background-image: linear-gradient(to bottom, #4a85fb 0, #163eaf 100%); box-shadow: 0 2px 10px rgb(22 62 175 / 30%);}">
                    <div class="card-body pb-0">
                        <p style="font-size: 15px; text-align: center;" class=" mb-1 "><b> Total Invoices </b></p>
                        <p style="font-size: 20px; text-align: center;" class=" mb-1 "><b>2</b></p>
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
                        <p style="font-size: 20px; text-align: center;" class=" mb-1 "><b>1</b></p>
                    </div>
                    <br>
                </div>
            </div>

            <div class="col-lg-1 col-md-4 col-sm-6"> </div>

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
<!--                    <th class="align-middle" scope="col">Select Applications</th>-->
                    <th class="align-middle" scope="col">Application No.</th>
                    <th class="align-middle" scope="col">Type</th>
                    <th class="align-middle" scope="col">Email</th>
                    <th class="align-middle" scope="col">Status</th>
                    <th class="align-middle" scope="col">Created at</th>
<!--                    <th class="align-middle" scope="col">Action</th>-->
                </tr>
                </thead>
                <tbody>
                <?php
                $i = 1;
                //                foreach ($agent_users as $key => $value) {
                ?>
                <tr>


<!--                    <th class="align-middle"><input type="checkbox" name="select_applications"></th>-->
                    <th class="align-middle">20002</th>
                    <th class="align-middle">Digital FingerPrinting Application</th>
                    <th class="align-middle">agent@gmail.com</th>
                    <th class="align-middle">UnPaid</th>
                    <th class="align-middle">2021-08-27 22:32:16</th>



<!--                    <td class="align-middle">-->
<!---->
<!--                        <form style="display: inline-grid;" action="--><?//= base_url('#') ?><!--" method="post">-->
<!--                            <button class="btn btn-danger" title="Change Status of User">-->
<!--                                <span class="fa fa-power-off"></span>-->
<!--                                <input type="hidden" value="--><?php // ?><!--" name="id">-->
<!--                                <input type="hidden" value="on" name="status">-->
<!--                            </button>-->
<!--                        </form>-->
<!---->
<!--                    </td>-->



                </tr>



                <tr>


<!--                    <th class="align-middle"><input type="checkbox" name="select_applications"></th>-->
                    <th class="align-middle">20002</th>
                    <th class="align-middle">Digital FingerPrinting Application</th>
                    <th class="align-middle">agent@gmail.com</th>
                    <th class="align-middle">UnPaid</th>
                    <th class="align-middle">2021-08-27 22:32:16</th>



<!--                    <td class="align-middle">-->
<!---->
<!--                        <form style="display: inline-grid;" action="--><?//= base_url('#') ?><!--" method="post">-->
<!--                            <button class="btn btn-danger" title="Change Status of User">-->
<!--                                <span class="fa fa-power-off"></span>-->
<!--                                <input type="hidden" value="--><?php // ?><!--" name="id">-->
<!--                                <input type="hidden" value="on" name="status">-->
<!--                            </button>-->
<!--                        </form>-->
<!--                    </td>-->
                </tr>

                </tbody>
            </table>


            <br/>
            <hr/>






        </div>
        <?php echo $this->paginator->get_links(); ?>
    </div>
</div>

<!--<form action="--><?php //echo base_url('account'); ?><!--">-->
<!--    <div class="row">-->
<!---->
<!--            <div class="col-6 col-md-4">-->
<!--                <label>Enter due date</label>-->
<!--                <input type="datetime" class="form-control"  name="due_date">-->
<!--            </div>-->
<!--            <div class="col-6 col-md-4">-->
<!--                <label>Message</label>-->
<!--                <textarea class="form-control" cols="50" rows="4"></textarea>-->
<!--            </div>-->
<!---->
<!--            <div class="col-6 col-md-4" style="margin-top:80px;"><button class="btn btn-success">Generate Invoice</button></div>-->
<!---->
<!--    </div>-->
<!--</form>-->

