<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="row dashboard-sevices">

            <div class="col-lg-2 col-md-4 col-sm-6">
                <div class="card bg-gradient-info overflow-hidden text-white" style="background-image: linear-gradient(to bottom, #4a85fb 0, #163eaf 100%); box-shadow: 0 2px 10px rgb(22 62 175 / 30%);}">
                    <div class="card-body pb-0">
                        <p style="font-size: 15px; text-align: center;" class=" mb-1 "><b>New </b></p>
                        <p style="font-size: 20px; text-align: center;" class=" mb-1 "><b><?= $digitalTotalNew ?></b></p>
                    </div>
                    <br>
                </div>
            </div>


            <div class="col-lg-2 col-md-4 col-sm-6">
                <div class="card bg-gradient-info overflow-hidden text-white" style="background-image: linear-gradient(to bottom, #fc7a5a 0, #d72e04 100%); box-shadow: 0 2px 10px rgb(215 46 4 / 30%);}">
                    <div class="card-body pb-0">
                        <p style="font-size: 15px; text-align: center;" class=" mb-1 "><b>Under Process </b></p>
                        <p style="font-size: 20px; text-align: center;" class=" mb-1 "><b><?= $digitalTotalUnderProcess ?></b></p>
                    </div>
                    <br>
                </div>
            </div>


            <div class="col-lg-2 col-md-4 col-sm-6">
                <div class="card bg-gradient-info overflow-hidden text-white" style="background-image: linear-gradient(to bottom, #60c3b6 0, #269f90 100%);box-shadow: 0 2px 10px rgb(38 159 144 / 30%);">
                    <div class="card-body pb-0">
                        <p style="font-size: 15px; text-align: center;" class=" mb-1 "><b>Pending Documents</b></p>
                        <p style="font-size: 20px; text-align: center;" class=" mb-1 "><b><?= $digitalTotalPendingDocuments ?></b></p>
                    </div>
                    <br>
                </div>
            </div>


            <div class="col-lg-2 col-md-4 col-sm-6">
                <div class="card bg-gradient-info overflow-hidden text-white" style="background-image: linear-gradient(to bottom, #fb6ba7 0, #ea2167 100%);box-shadow: 0 2px 10px rgb(234 33 103 / 30%);">
                    <div class="card-body pb-0">
                        <p style="font-size: 15px; text-align: center;" class=" mb-1 "><b>Completed</b></p>
                        <p style="font-size: 20px; text-align: center;" class=" mb-1 "><b><?= $digitalTotalCompelted ?></b></p>
                    </div>
                    <br>
                </div>
            </div>


            <div class="col-lg-2 col-md-4 col-sm-6">
                <a href="<?php echo base_url('reception/digital_fingerprint_form'); ?>">
                    <div class="card bg-gradient-info overflow-hidden text-white" style="background-image: linear-gradient(to bottom, rgb(255, 179, 94) 0, #c87517 100%);box-shadow: 0 2px 10px rgb(234 33 103 / 30%);">
                        <div class="card-body pb-0">
                            <p style="font-size: 15px; text-align: center;" class=" mb-1 "><b>Start application</b></p>
                            <p style="font-size: 20px; text-align: center;" class=" mb-1 "><b>from Scratch</b></p>
                        </div>
                        <br>
                    </div>
                </a>
            </div>


            <div class="col-lg-2 col-md-4 col-sm-6">

                <a href="<?php echo base_url('reception/digital_fingerprint'); ?>">
                    <div class="card bg-gradient-info overflow-hidden text-white" style="background-image: linear-gradient(to bottom, 	rgb(0, 128, 0) 0, #00FF00 100%);box-shadow: 0 2px 10px rgb(234 33 103 / 30%);">
                        <div class="card-body pb-0">
                            <p style="font-size: 15px; text-align: center;" class=" mb-1 "><b>Start</b></p>
                            <p style="font-size: 15px; text-align: center;" class=" mb-1 "><b>Applicaiton (ticket)</b></p>
    <!--                        <p style="font-size: 20px; text-align: center;" class=" mb-1 "><b>5</b></p>-->
                        </div>
                        <br>
                    </div>
                </a>

            </div>

        </div>
    </div>
</div>

<br/>


<form>
    <div class="row mb-3">
        <div class="col-sm-2 mt-3 mt-md-0">
            <input type="text" value="<?= $client_id ?>" name="id" class="form-control" placeholder="Client ID">
        </div>

        <div class="col-sm-2 mt-3 mt-md-0">
            <input type="text" value="<?= $name ?>" name="name" class="form-control" placeholder="Last Name">
        </div>

        <div class="col-sm-2 mt-3 mt-md-0">
            <input type="text" value="<?= $name ?>" name="name" class="form-control" placeholder="First Name">
        </div>

        <div class="col-sm-2 mt-3 mt-md-0">
            <input type="text" value="<?= $dob ?>" name="dob" autocomplete="off" class="form-control picker2"  data-date-format="yyyy-mm-dd" placeholder="Date of Birth">
        </div>

        <div class="col-sm-2 mt-3 mt-md-0">
            <input type="text" value="<?= $phone ?>" name="phone" class="form-control" placeholder="Phone No.">
        </div>

        <div class="col-sm-2 mt-3 mt-md-0">
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
<!--                        <th class="align-middle text-center" scope="col">Client ID</th>-->
<!--                        <th class="align-middle text-center" scope="col">Series Type</th>-->
                        <th class="align-middle text-center" scope="col">Application ID</th>
                        <th class="align-middle text-center" scope="col">Last Name</th>
                        <th class="align-middle text-center" scope="col">First Name</th>
                        <th class="align-middle text-center" scope="col">Date of Birth</th>
                        <th class="align-middle text-center" scope="col">Phone</th>
                        <th class="align-middle text-center" scope="col">Application Status</th>
<!--                        <th class="align-middle text-center" scope="col">Complete/Incomplete</th>-->
                        <th class="align-middle text-center" scope="col">Created At</th>
                        <th class="align-middle text-center" scope="col">Actions</th>
                    </tr>
                </thead>

                <tbody>

                    <?php

                    $id = 300;

                    foreach ($applications as $key => $value) {
                        $id++;
                        ?>
                        <tr>
<!--                            <th class="align-middle text-center">--><?php //echo $id; ?><!--</th>-->
<!--                            <th class="align-middle text-center"> --><?php //echo $id; ?><!-----><?php //echo $value->series_type; ?><!-----><?php //echo $value->digital_fingerprinting_application_id; ?><!-- </th>-->
                            <th class="align-middle text-center"><?php echo date('y')."-F-".$value->digital_fingerprinting_application_id; ?></th>
                            <th class="align-middle text-center"><?php echo $value->consent_last_name; ?></th>
                            <th class="align-middle text-center"><?php echo $value->consent_first_name; ?></th>
                            <th class="align-middle text-center"><?php echo $value->consent_dob; ?></th>
                            <th class="align-middle text-center"><?php echo $value->consent_cellphone; ?></th>
                            <th class="align-middle text-center"><?php echo $value->application_status; ?></th>
                            <th class="align-middle text-center"><?php echo $value->created_at; ?></th>
                            <th class="align-middle text-center">
                                <?php if($value->edit_application == 0){ ?>
                                    <a href="<?php echo base_url('reception/edit_digital_fingerprint_form/').$value->digital_fingerprinting_application_id; ?>" class="btn btn-success" title="Edit Application">
                                        <span class="fa fa-edit"></span>
                                    </a>
                                <?php } ?>

<!--                                <a href="http://localhost/epolicechecks/reception/digital_fingerprinting_application_download/200004" class="btn btn-primary" title="Download Application">-->
                                <a href="<?php echo base_url('reception/digital_fingerprinting_application_download/').$value->digital_fingerprinting_application_id; ?>" target="_blank" class="btn btn-primary" title="Download Application">
                                    <span class="fa fa-download"></span>
                                </a>

                                <a href="<?php echo base_url('reception/digital_fingerprinting_application_details/').$value->digital_fingerprinting_application_id; ?>" target="_blank" class="btn btn-primary" title="View Application">
                                    <span class="fa fa-eye"></span>
                                </a>

                                <?php if($value->edit_application == 0){ ?>
                                    <a href="<?php echo base_url('reception/complete_digital_fingerprinting_application/').$value->digital_fingerprinting_application_id; ?>" class="btn btn-danger" title="Finish Application">
                                        <span class="fa fa-check"></span>
                                    </a>
                                <?php } ?>
                            </th>


                        </tr>
                        <?php
                    }
                    if (empty($applications)) {
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