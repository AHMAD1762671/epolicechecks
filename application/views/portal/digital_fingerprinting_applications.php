<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="row dashboard-sevices">


            <div class="col-lg-1 col-md-4 col-sm-6"> </div>

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
                <div class="card bg-gradient-info overflow-hidden text-white" style="background-image: linear-gradient(to bottom, rgb(255, 179, 94) 0, #c87517 100%);box-shadow: 0 2px 10px rgb(234 33 103 / 30%);">
                    <div class="card-body pb-0">
                        <p style="font-size: 15px; text-align: center;" class=" mb-1 "><b>Not Applied</b></p>
                        <p style="font-size: 20px; text-align: center;" class=" mb-1 "><b><?= $digitalTotalNotApplied ?></b></p>
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
            <input type="text" value="<?= $client_id ?>" name="id" class="form-control" placeholder="Application ID">
        </div>

        <div class="col-sm-2 mt-3 mt-md-0">
            <input type="text" value="<?= $l_name ?>" name="l_name" class="form-control" placeholder="Last Name">
        </div>

        <div class="col-sm-2 mt-3 mt-md-0">
            <input type="text" value="<?= $f_name ?>" name="f_name" class="form-control" placeholder="First Name">
        </div>


        <div class="col-sm-2 mt-3 mt-md-0">
            <input type="text" value="<?= $phone ?>" name="phone" class="form-control" placeholder="Phone No.">
        </div>

        <div class="col-sm-2 mt-3 mt-md-0">
            <input type="text" value="<?= $dob ?>" name="dob" autocomplete="off" class="form-control picker2"  data-date-format="yyyy-mm-dd" placeholder="Date of Birth">
        </div>

        <div class="col-sm-2 mt-3 mt-md-0">
            <select name="application_status" class="btn btn-secondary dropdown-toggle">
                <option value="" selected>All Status</option>
                <option <?= $status == 'New' ? ' selected="selected"' : '';?> value="New">New</option>
                <option <?= $status == 'Under Process' ? ' selected="selected"' : '';?> value="Under Process">Under Process</option>
                <option <?= $status == 'Pending Documents' ? ' selected="selected"' : '';?> value="Pending Documents">Pending Documents</option>
                <option <?= $status == 'Completed' ? ' selected="selected"' : '';?> value="Completed">Completed</option>
                <option <?= $status == 'Not Applied' ? ' selected="selected"' : '';?> value="Not Applied">Not Applied</option>
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
                        <th scope="col">Application ID</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Date of Birth</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Total Price</th>
                        <th scope="col">Submitted By</th>
                        <th scope="col">Application Status</th>
                        <th scope="col">Payment Status</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($applications as $key => $value) {
                        ?>
                        <tr>
                            <th class="align-middle">
                                <?php if($value->new_application == 1){ ?>
                                    <span style="color: #1e7e34;">new</span>
                                <?php } ?>
                                <?= date("Y")."-F-". $value->digital_fingerprinting_application_id ?>
                            </th>
                            <td class="align-middle"><?= $value->consent_last_name ?></td>
                            <td class="align-middle"><?= $value->consent_first_name ?></td>
                            <td class="align-middle"><?= $value->consent_date ?></td>
                            <td class="align-middle"><?= $value->consent_phone ?></td>
                            <td class="align-middle"><?= $value->grand_total ?> CAD</td>
                            <td class="align-middle"> </td>
<!--                            <td class="align-middle">--><?php //echo get_application_submitted_by($value->agent_id, $value->corporate_id); ?><!--</td>-->

                            <?php
                            if($value->application_status == "New"){
                                ?>
                                <td style="color: #ffa514;" class="align-middle">
                                    <span class="new">
                                        <?= $value->application_status ?>
                                    </span>
                                </td>
                            <?php } ?>

                            <?php
                            if($value->application_status == "Under Processing"){
                                ?>
                                <td style="color: #800020;" class="align-middle">
                                    <span class="under_processing">
                                        <?= $value->application_status ?>
                                    </span>
                                </td>
                            <?php } ?>

                            <?php
                            if($value->application_status == "Pending Documents"){
                                ?>
                                <td style="color: #4caf50;" class="align-middle">

                                    <span class="pending_documents">
                                        <?= $value->application_status ?>
                                    </span>

                            <?php }
                            ?>
                            <?php
                            if($value->application_status == "Completed"){
                                ?>
                                <td style="color: #301934;" class="align-middle"><?= $value->application_status ?> </td>
                            <?php } ?>

                            <?php
                            if($value->application_status == "Not Applied"){
                                ?>
                                <td style="color: #FF0000;" class="align-middle">

                                    <span class="not_applied">
                                        <?= $value->application_status ?>
                                    </span>
                            <?php } ?>

                            <td class="align-middle">

                                <?php
                                if($value->payment_status == 1){ ?>

                                    <span class="paid">
                                    Paid
                                </span>

                                <?php }

                                if($value->payment_status == 0){ ?>
                                    <span class="un_paid">
                                    Unpaid
                                    </span>

                                <?php } ?>


                            </td>
                            <td class="align-middle"><?= $value->created_at ?></td>
                            <td class="align-middle">
                                <?php
                                if (check_route('security-screening/digital-fingerprinting/details', 'get')):
                                    ?>
                                    <a target="_blank" href="<?= base_url() ?>portal/security-screening/digital-fingerprinting/details/<?= $value->digital_fingerprinting_application_id ?>" class="btn btn-success" title="View Application">
                                        <span class="fa fa-eye"></span>
                                    </a>
                                    <?php
                                endif;
                                ?>
                                <?php
                                if (check_route('security-screening/digital-fingerprinting/download', 'get')):
                                    ?>
                                    <a target="_blank" href="<?= base_url() ?>portal/security-screening/digital-fingerprinting/download/<?= $value->digital_fingerprinting_application_id ?>" class="btn btn-primary" title="Download Application">
                                        <span class="fa fa-download"></span>
                                    </a>
                                    <?php
                                endif;
                                ?>

                                <button style="margin-top: 1px;" class="btn btn-danger" data-toggle="modal" data-target="#forward_application_to_user<?= $value->digital_fingerprinting_application_id ?>" title="Assign Application">
                                    <span class="fas fa-forward"></span>
                                </button>


                                <!--    forward_application_to_user -->
                                <!--    forward_application_to_user -->
                                <div class="modal fade" id="forward_application_to_user<?= $value->digital_fingerprinting_application_id ?>" data-backdrop="static" data-keyboard="false">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <form action="<?php echo base_url('site/forward_application_to_user') ?>" method="post">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Assign Application  </h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">

                                                        <?php
                                                        $comment_pic= get_user_roles_by_id($value->digital_fingerprinting_application_id);
                                                        ?>

                                                        <div class="col-md-12 form-group mb-3">
                                                            <label>Select User Role

                                                                <?php
                                                                if(!empty($comment_pic->user_role_id)){
                                                                    $name = get_user_role_name_by_id($comment_pic->user_role_id);
                                                                }
                                                                ?>

                                                                <b>/ <?php echo $name; ?></b>



                                                            </label>
                                                            <select class="form-control add-states" id="" required="" name="state_id">
                                                                <option value="">Select State </option>
                                                                <?php foreach ($user_roles as $st) { ?>
                                                                    <option value="<?= $st->user_role_id ?>"><?= $st->user_role_name ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>

                                                        <div class="col-md-12 form-group mb-3">
                                                            <label>Select User


                                                                <?php
                                                                if(!empty($comment_pic->user_role_id)){
                                                                    $name = get_user_name_by_id($comment_pic->user_id);
                                                                }
                                                                ?>

                                                                <b>/ <?php echo $name; ?></b>


                                                            </label>
                                                            <select class="form-control add-cities" id="" required="" name="city_id" >
                                                            </select>
                                                            <div class="text-danger"><?= form_error('city_id'); ?></div>
                                                        </div>

                                                        <input type="hidden" class="form-control" required="" name="digital_fingerprinting_application_id" value="<?= $value->digital_fingerprinting_application_id ?>">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Assign Application</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </td>
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

<script>
    //    dynamic dependent userrole and users
    $(document).ready(function () {

        $('.add-states').on('change', function () {
            var state_id = $(this).val();
            $.post('<?= base_url() ?>portal/get_user_by_role',
                {state_id: state_id},
                function (data) {
                    $('.add-cities').html(data);
                });
        });
    });
</script>