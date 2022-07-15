
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
                        <p style="font-size: 15px; text-align: center;" class=" mb-1 "><b>Total Pendings </b></p>
                        <p style="font-size: 25px; text-align: center;" class=" mb-1 "><b>30</b></p>
                    </div>
                    <!--                    <br>-->
                </div>
            </div>


            <div class="col-lg-2 col-md-4 col-sm-6">
                <div class="card bg-gradient-info overflow-hidden text-white" style="background-image: linear-gradient(to bottom, #fc7a5a 0, #d72e04 100%); box-shadow: 0 2px 10px rgb(215 46 4 / 30%);}">
                    <div class="card-body pb-0">
                        <p style="font-size: 15px; text-align: center;" class=" mb-1 "><b>Incompleted  </b></p>
                        <p style="font-size: 25px; text-align: center;" class=" mb-1 "><b>25</b></p>
                    </div>
                    <!--                    <br>-->
                </div>
            </div>





            <div class="col-lg-2 col-md-4 col-sm-6">
                <div class="card bg-gradient-info overflow-hidden text-white" style="background-image: linear-gradient(to bottom, #62db17 0, #487a1b 100%); box-shadow: 0 2px 10px rgb(215 46 4 / 30%);}">
                    <div class="card-body pb-0">
                        <p style="font-size: 15px; text-align: center;" class=" mb-1 "><b>Completed </b></p>
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
                    <th class="align-middle text-center" scope="col">Application No</th>
                    <th class="align-middle text-center" scope="col">Application Type</th>
                    <th class="align-middle text-center" scope="col">Created by</th>
                    <th class="align-middle text-center" scope="col">Created at</th>
                    <th class="align-middle text-center" scope="col">Actions</th>

                </tr>
                </thead>
                <tbody>
                <?php
                //                foreach ($applications as $key => $value) {
                ?>
                <tr>
                    <th class="align-middle text-center">
                        1
                    </th>

                    <th class="align-middle text-center">Namebased Check</th>
                    <th class="align-middle text-center">epolicechecks</th>
                    <th class="align-middle text-center">2020-11-12 20:45:41</th>
                    <th class="align-middle text-center">
                        <FORM METHOD="POST" style="text-align: center !important;" ACTION='#'>
                            <INPUT TYPE="SUBMIT" NAME="SUBMIT" class="btn btn-success screen-submit-btn" style="  width: 30%; " VALUE="Continue" formtarget="_blank">
                            <INPUT TYPE="SUBMIT" NAME="SUBMIT" class="btn btn-danger screen-submit-btn" style="  width: 30%;" VALUE="Withdraw" formtarget="_blank">
                        </FORM>
                    </th>

                </tr>



                <tr>
                    <th class="align-middle text-center">
                        2
                    </th>

                    <th class="align-middle text-center">Digital Finger Prints</th>
<!--                    <th class="align-middle text-center">Corporate2@gmail.com</th>-->





<!--                    <th class="align-middle text-center">-->
<!--                            <span class="paid">-->
<!--                                Paid-->
<!--                            </span>-->
<!--                    </th>-->
                    <th class="align-middle text-center">epolicechecks</th>
                    <th class="align-middle text-center">2020-11-12 20:45:41</th>


                    <th class="align-middle text-center">
                        <FORM METHOD="POST" style="text-align: center !important;" ACTION='#'>
                            <INPUT TYPE="SUBMIT" NAME="SUBMIT" class="btn btn-success screen-submit-btn" style="  width: 30%; " VALUE="Continue" formtarget="_blank">
                            <INPUT TYPE="SUBMIT" NAME="SUBMIT" class="btn btn-danger screen-submit-btn" style="  width: 30%;" VALUE="Withdraw" formtarget="_blank">
                        </FORM>
                    </th>

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