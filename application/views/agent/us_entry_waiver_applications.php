<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="row dashboard-sevices">


            <div class="col-lg-1 col-md-4 col-sm-6"> </div>

            <div class="col-lg-2 col-md-4 col-sm-6">
                <div class="card bg-gradient-info overflow-hidden text-white" style="background-image: linear-gradient(to bottom, #4a85fb 0, #163eaf 100%); box-shadow: 0 2px 10px rgb(22 62 175 / 30%);}">
                    <div class="card-body pb-0">
                        <p style="font-size: 15px; text-align: center;" class=" mb-1 "><b>New </b></p>
                        <p style="font-size: 20px; text-align: center;" class=" mb-1 "><b><?= $usentryTotalNew ?></b></p>
                    </div>
                    <br>
                </div>
            </div>


            <div class="col-lg-2 col-md-4 col-sm-6">
                <div class="card bg-gradient-info overflow-hidden text-white" style="background-image: linear-gradient(to bottom, #fc7a5a 0, #d72e04 100%); box-shadow: 0 2px 10px rgb(215 46 4 / 30%);}">
                    <div class="card-body pb-0">
                        <p style="font-size: 15px; text-align: center;" class=" mb-1 "><b>Under Process </b></p>
                        <p style="font-size: 20px; text-align: center;" class=" mb-1 "><b><?= $usentryTotalUnderProcess; ?></b></p>
                    </div>
                    <br>
                </div>
            </div>


            <div class="col-lg-2 col-md-4 col-sm-6">
                <div class="card bg-gradient-info overflow-hidden text-white" style="background-image: linear-gradient(to bottom, #60c3b6 0, #269f90 100%);box-shadow: 0 2px 10px rgb(38 159 144 / 30%);">
                    <div class="card-body pb-0">
                        <p style="font-size: 15px; text-align: center;" class=" mb-1 "><b>Pending Documents</b></p>
                        <p style="font-size: 20px; text-align: center;" class=" mb-1 "><b><?= $usentryTotalPendingDocuments; ?></b></p>
                    </div>
                    <br>
                </div>
            </div>


            <div class="col-lg-2 col-md-4 col-sm-6">
                <div class="card bg-gradient-info overflow-hidden text-white" style="background-image: linear-gradient(to bottom, #fb6ba7 0, #ea2167 100%);box-shadow: 0 2px 10px rgb(234 33 103 / 30%);">
                    <div class="card-body pb-0">
                        <p style="font-size: 15px; text-align: center;" class=" mb-1 "><b>Completed</b></p>
                        <p style="font-size: 20px; text-align: center;" class=" mb-1 "><b><?= $usentryTotalCompelted; ?></b></p>
                    </div>
                    <br>
                </div>
            </div>


            <div class="col-lg-2 col-md-4 col-sm-6">
                <div class="card bg-gradient-info overflow-hidden text-white" style="background-image: linear-gradient(to bottom, rgb(255, 179, 94) 0, #c87517 100%);box-shadow: 0 2px 10px rgb(234 33 103 / 30%);">
                    <div class="card-body pb-0">
                        <p style="font-size: 15px; text-align: center;" class=" mb-1 "><b>Not Applied</b></p>
                        <p style="font-size: 20px; text-align: center;" class=" mb-1 "><b><?= $usentryTotalNotApplied; ?></b></p>
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
                    <th scope="col">Client ID</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Date of Birth</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Application Status</th>
                    <th scope="col">Submitted By</th>
                    <th scope="col">Created At</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($applications as $key => $value) {
                        ?>
                        <tr>
                            <th class="align-middle text-center"><?= $value->us_entry_waiver_id ?></th>
                            <th class="align-middle text-center"><?= $value->consent_last_name ?></th>
                            <th class="align-middle text-center"><?= $value->consent_first_name ?></th>
                            <th class="align-middle text-center"><?= $value->consent_dob ?></th>
                            <th class="align-middle text-center"><?= $value->consent_phone ?></th>
<!--                            <th class="align-middle text-center"></th>-->
                            <td class="align-middle"><?= $value->application_status ?> CAD</td>
                            <td class="align-middle"><?= get_admin_email_by_id($value->agent_id) ?></td>
                            <td class="align-middle"><?= $value->created_at ?></td>
<!--                            <td class="align-middle">-->
<!--                                <a href="--><?//= base_url() ?><!--agent/security-screening/us-entry-waiver/details/<?= $value->us_entry_waiver_id ?>" class="btn btn-primary" title="View Application">-->
<!--                                    <span class="fa fa-eye"></span>-->
<!--                                </a>-->
<!--                            </td>-->
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