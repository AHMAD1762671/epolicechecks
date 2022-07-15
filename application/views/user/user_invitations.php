
<style>
    @media only screen and (max-device-width: 768px){
        .col-lg-2.col-md-4.col-sm-6 {
            margin-bottom: 10px;
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
                        <p style="font-size: 15px; text-align: center;" class=" mb-1 "><b>Total Invitation </b></p>
                        <p style="font-size: 25px; text-align: center;" class=" mb-1 "><b>30</b></p>
                    </div>
                    <!--                    <br>-->
                </div>
            </div>


            <div class="col-lg-2 col-md-4 col-sm-6">
                <div class="card bg-gradient-info overflow-hidden text-white" style="background-image: linear-gradient(to bottom, #fc7a5a 0, #d72e04 100%); box-shadow: 0 2px 10px rgb(215 46 4 / 30%);}">
                    <div class="card-body pb-0">
                        <p style="font-size: 15px; text-align: center;" class=" mb-1 "><b>Completed  </b></p>
                        <p style="font-size: 25px; text-align: center;" class=" mb-1 "><b>25</b></p>
                    </div>
                    <!--                    <br>-->
                </div>
            </div>





            <div class="col-lg-2 col-md-4 col-sm-6">
                <div class="card bg-gradient-info overflow-hidden text-white" style="background-image: linear-gradient(to bottom, #62db17 0, #487a1b 100%); box-shadow: 0 2px 10px rgb(215 46 4 / 30%);}">
                    <div class="card-body pb-0">
                        <p style="font-size: 15px; text-align: center;" class=" mb-1 "><b>Remaining  </b></p>
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
<!--                    <th class="align-middle text-center" scope="col">Invitation No</th>-->
                    <!--                    <th class="align-middle text-center" scope="col">No. of Applications</th>-->
                    <th class="align-middle text-center" scope="col">Application Type</th>

<!--                    <th class="align-middle text-center" scope="col">Invitation Date</th>-->



                    <th class="align-middle text-center" scope="col">Created by</th>
                    <th class="align-middle text-center" scope="col">Created at</th>

                    <th class="align-middle text-center" scope="col">Invitation Status</th>

                    <th class="align-middle text-center" scope="col">Action</th>

                </tr>
                </thead>
                <tbody>
                <?php
                //                foreach ($applications as $key => $value) {
                ?>
                <tr>
<!--                    <th class="align-middle text-center">-->
                        <!--                            <a href="--><?php //echo base_url('user/user_invoice_detail'); ?><!--"> 1 </a>-->
<!--                        1-->
<!--                    </th>-->

                    <th class="align-middle text-center">NameBased</th>



<!--                    <th class="align-middle text-center">-->
<!--                        <a href="--><?php //echo base_url('portal/action_corporate') ?><!--">-->
<!--                            <button class="btn btn-success" title="Download the Invoice">-->
<!--                                <span class="fa fa-download"></span>-->
<!--                            </button>-->
<!--                        </a>-->
<!--                    </th>-->






                    <!--                        payment button-->




                    <th class="align-middle text-center">epolicechecks</th>
                    <th class="align-middle text-center">2020-11-12 20:45:41</th>

                    <th class="align-middle text-center">
                            <span class="un_paid">
                                Pending
                            </span>
                    </th>

                    <th class="align-middle text-center">



                        <INPUT TYPE="SUBMIT" NAME="Continue" class="btn btn-success screen-submit-btn" style="width: 30%;" VALUE="Continue" formtarget="_blank">
                        <INPUT TYPE="SUBMIT" NAME="Withdraw" class="btn btn-danger screen-submit-btn" style="width: 30%;" VALUE="Withdraw" formtarget="_blank">
                    </th>



                </tr>





                <tr>
                    <th class="align-middle text-center">NameBased</th>
                    <th class="align-middle text-center">epolicechecks</th>
                    <th class="align-middle text-center">2020-11-12 20:45:41</th>
                    <th class="align-middle text-center">
                            <span class="un_paid">
                                Pending
                            </span>
                    </th>

                    <!--                        payment button-->
                    <th class="align-middle text-center">

<!--                        <a target="_blank" href="#" class="btn btn-success" title="Edit Application">-->
<!--                            <span class="fa fa-edit"></span>-->
<!--                        </a>-->
<!---->
<!--                        <a target="_blank" href="#" class="btn btn-danger" title="Withdraw Application">-->
<!--                            <span class="fa fa-window-close"></span>-->
<!--                        </a>-->

                        <INPUT TYPE="SUBMIT" NAME="Continue" class="btn btn-success screen-submit-btn" style="width: 30%;" VALUE="Continue" formtarget="_blank">
                        <INPUT TYPE="SUBMIT" NAME="Withdraw" class="btn btn-danger screen-submit-btn" style="width: 30%;" VALUE="Withdraw" formtarget="_blank">


<!--                        <INPUT TYPE="SUBMIT" NAME="SUBMIT" class="btn btn-primary screen-submit-btn" style="width: 56%;" VALUE="Click here" formtarget="_blank">-->
                    </th>



                </tr>

                </tbody>
            </table>
        </div>
        <?php
        //        echo $this->paginator->get_links();
        ?>
    </div>
</div>