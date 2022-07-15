<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="row dashboard-sevices">

            <div class="col-lg-2 col-md-4 col-sm-6">
                <div class="card bg-gradient-info overflow-hidden text-white" style="background-image: linear-gradient(to bottom, #4a85fb 0, #163eaf 100%); box-shadow: 0 2px 10px rgb(22 62 175 / 30%);}">
                    <div class="card-body pb-0">
                        <p style="font-size: 15px; text-align: center;" class=" mb-1 "><b> Total Receiveable </b></p>
                        <p style="font-size: 20px; text-align: center;" class=" mb-1 "><b>2</b></p>
                    </div>
                    <br>
                </div>
            </div>

            <div class="col-lg-2 col-md-4 col-sm-6">
                <div class="card bg-gradient-info overflow-hidden text-white" style="background-image: linear-gradient(to bottom, #62db17 0, #487a1b 100%); box-shadow: 0 2px 10px rgb(215 46 4 / 30%);}">
                    <div class="card-body pb-0">
                        <p style="font-size: 15px; text-align: center;" class=" mb-1 "><b> Un-Paid Charges </b></p>
                        <p style="font-size: 20px; text-align: center;" class=" mb-1 "><b>400 CAD</b></p>
                    </div>
                    <br>
                </div>
            </div>


            <div class="col-lg-2 col-md-4 col-sm-6">
                <div class="card bg-gradient-info overflow-hidden text-white" style="background-image: linear-gradient(to bottom, #fc7a5a 0, #d72e04 100%); box-shadow: 0 2px 10px rgb(215 46 4 / 30%);}">
                    <div class="card-body pb-0">
                        <p style="font-size: 15px; text-align: center;" class=" mb-1 "><b> Paid </b></p>
                        <p style="font-size: 20px; text-align: center;" class=" mb-1 "><b>00 CAD</b></p>
                    </div>
                    <br>
                </div>
            </div>

            <div class="col-lg-1 col-md-4 col-sm-6"> </div>

        </div>
    </div>
</div>

<br/>



<form>
    <div class="row mb-3">
        <div class="col-sm-1 mt-3 mt-md-0">
            <input type="text" value="" name="id" class="form-control" placeholder="Agent ID">
        </div>

        <div class="col-sm-2 mt-3 mt-md-0">
            <input type="text" value="" name="l_name" class="form-control" placeholder="Name">
        </div>

        <div class="col-sm-2 mt-3 mt-md-0">
            <input type="text" value="" name="f_name" class="form-control" placeholder="Email">
        </div>

        <div class="col-sm-2 mt-3 mt-md-0">
            <input type="text" value="" name="phone" class="form-control" placeholder="Start Date">
        </div>

        <div class="col-sm-2 mt-3 mt-md-0">
            <input type="text" value="" name="dob" autocomplete="off" class="form-control picker2"  data-date-format="yyyy-mm-dd" placeholder="End Date">
        </div>

        <div class="col-sm-2 mt-3 mt-md-0">
            <!--            <input type="text" value="" name="dob" autocomplete="off" class="form-control picker2"  data-date-format="yyyy-mm-dd" placeholder="Created Date">-->
            <select class="form-control" name="payment_status">
                <option>Select an Option</option>
                <option value="un_paid">Un-Paid</option>
                <option value="paid">Paid</option>
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
                    <th class="align-middle" scope="col">Id</th>
                    <!--                                    <th class="align-middle" scope="col">User</th>-->
                    <th class="align-middle" scope="col">Name</th>
                    <th class="align-middle" scope="col">Email</th>
                    <th class="align-middle" scope="col">Receiveable</th>
                    <th class="align-middle" scope="col">Created at</th>
                    <th class="align-middle" scope="col">Action</th>
                    <!--                                    <th class="align-middle" scope="col">Action</th>-->
                </tr>
                </thead>
                <tbody>
                <?php
                $i = 1;
                foreach ($agent_users as $key => $value) {
                    ?>
                    <tr>
                        <th class="align-middle">
                            <a href="<?php echo base_url('account/agent_applications_list/').$value->id; ?>">
                                <?php  echo $i++; ?>
                            </a>
                        </th>

                        <!--                                        <th class="align-middle">-->
                        <!--                                            --><?php //if (empty($value->profile_image)){ ?>
                        <!--                                                <img src="--><?php // echo base_url('assets').'/images/admin/Male.png'; ?><!--" height="60" width="60">-->
                        <!--                                            --><?php //}else { ?>
                        <!--                                                <img src="--><?php // echo base_url('upload').'/users_profile_images'. $value->profile_image; ?><!--" height="60" width="60">-->
                        <!--                                            --><?php //} ?>
                        <!--                                        </th>-->

                        <th class="align-middle"><?php  echo $value->first_name." ".$value->last_name ?></th>
                        <th class="align-middle"><?php  echo $value->email ?></th>
<!--                        <th class="align-middle">--><?php // echo $value->active ?><!--</th>-->
                        <th class="align-middle"><?php  echo "200CAD" ?></th>
                        <th class="align-middle"><?php  echo $value->created_at ?></th>
<!--                        <th class="align-middle">--><?php // echo $value->created_at ?><!--</th>-->



                        <th class="align-middle">

                        <a href="#">
                            <button class="btn btn-success" title="Send Reminder">
                                <span class="fa fa-bell"></span>
                                <input type="hidden" value="<?php  ?>" name="id">
                                <input type="hidden" value="on" name="status">
                            </button>
                        </a>

                        </th>



                    </tr>
                    <?php
                }
                if (empty($agent_users)) {
                    ?>
                    <tr>
                        <td colspan="100" class="text-center">No Record Found</td>
                    </tr>
                <?php }
                ?>
                </tbody>

            </table>
        </div>
        <?php echo $this->paginator->get_links(); ?>
    </div>
</div>

