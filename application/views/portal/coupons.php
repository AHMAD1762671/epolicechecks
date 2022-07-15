
<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="row dashboard-sevices">


            <div class="col-lg-3 col-md-4 col-sm-6"> </div>

            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="card bg-gradient-info overflow-hidden text-white" style="background-image: linear-gradient(to bottom, #4a85fb 0, #163eaf 100%); box-shadow: 0 2px 10px rgb(22 62 175 / 30%);}">
                    <div class="card-body pb-0">
                        <p style="font-size: 15px; text-align: center;" class=" mb-1 "><b> Total Coupons </b></p>
                        <p style="font-size: 20px; text-align: center;" class=" mb-1 "><b>1752</b></p>
                    </div>
                    <br>
                </div>
            </div>


            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="card bg-gradient-info overflow-hidden text-white" style="background-image: linear-gradient(to bottom, #fc7a5a 0, #d72e04 100%); box-shadow: 0 2px 10px rgb(215 46 4 / 30%);}">
                    <div class="card-body pb-0">
                        <p style="font-size: 15px; text-align: center;" class=" mb-1 "><b> Remaining Coupons </b></p>
                        <p style="font-size: 20px; text-align: center;" class=" mb-1 "><b>1752</b></p>
                    </div>
                    <br>
                </div>
            </div>


            <!--            <div class="col-lg-2 col-md-4 col-sm-6">-->
            <!--                <div class="card bg-gradient-info overflow-hidden text-white" style="background-image: linear-gradient(to bottom, #60c3b6 0, #269f90 100%);box-shadow: 0 2px 10px rgb(38 159 144 / 30%);">-->
            <!--                    <div class="card-body pb-0">-->
            <!--                        <p style="font-size: 15px; text-align: center;" class=" mb-1 "><b>Pending Documents</b></p>-->
            <!--                        <p style="font-size: 20px; text-align: center;" class=" mb-1 "><b>4</b></p>-->
            <!--                    </div>-->
            <!--                    <br>-->
            <!--                </div>-->
            <!--            </div>-->


            <!--            <div class="col-lg-2 col-md-4 col-sm-6">-->
            <!--                <div class="card bg-gradient-info overflow-hidden text-white" style="background-image: linear-gradient(to bottom, #fb6ba7 0, #ea2167 100%);box-shadow: 0 2px 10px rgb(234 33 103 / 30%);">-->
            <!--                    <div class="card-body pb-0">-->
            <!--                        <p style="font-size: 15px; text-align: center;" class=" mb-1 "><b>Completed</b></p>-->
            <!--                        <p style="font-size: 20px; text-align: center;" class=" mb-1 "><b>8</b></p>-->
            <!--                    </div>-->
            <!--                    <br>-->
            <!--                </div>-->
            <!--            </div>-->


            <!--            <div class="col-lg-2 col-md-4 col-sm-6">-->
            <!--                <div class="card bg-gradient-info overflow-hidden text-white" style="background-image: linear-gradient(to bottom, rgb(255, 179, 94) 0, #c87517 100%);box-shadow: 0 2px 10px rgb(234 33 103 / 30%);">-->
            <!--                    <div class="card-body pb-0">-->
            <!--                        <p style="font-size: 15px; text-align: center;" class=" mb-1 "><b>Not Applied</b></p>-->
            <!--                        <p style="font-size: 20px; text-align: center;" class=" mb-1 "><b>5</b></p>-->
            <!--                    </div>-->
            <!--                    <br>-->
            <!--                </div>-->
            <!--            </div>-->


            <div class="col-lg-3 col-md-4 col-sm-6"> </div>

        </div>
    </div>
</div>

<br/>



<div class="row mb-3 ml-1">
<!--    --><?php //if (check_route('add-user', 'post')): ?>
        <div class="col-xl-9 col-lg-6 col-md-4">
            <button class="btn btn-primary" data-toggle="modal" data-target="#add_coupons_corporate">Add Corporate Coupons </button>
            <button class="btn btn-primary" data-toggle="modal" data-target="#add_coupons_agent">Add Agent Coupons </button>
            <button class="btn btn-primary" data-toggle="modal" data-target="#add_coupons_outsider_user">Add User Coupons </button>
        </div>

<!--    --><?php //endif; ?>
    <div class="col-xl-3 col-lg-6 col-md-8">
        <form>
            <div class="row">
                <div class="col-sm-8 mt-3 mt-md-0">
                    <input type="text" value="<?= $search ?>" name="name" class="form-control" placeholder="Name">
                </div>
                <div class="col-sm-4 mt-3 mt-md-0">
                    <button type="submit" class="btn btn-primary btn-block">Search</button>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Coupon Code</th>
                    <th scope="col">Total Coupons</th>
                    <th scope="col">Remaining Coupons</th>
                    <th scope="col">Assign to</th>
                    <th scope="col">Discount</th>
                    <th scope="col">User type</th>
                    <th scope="col">Created by</th>
                    <th scope="col">Status</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $sr = $this->paginator->get_start_count();
                foreach ($users as $key => $value) {
                    ?>
                    <tr>
                        <th class="align-middle"><?= $value->id ?></th>
                        <td class="align-middle"><?= $value->coupon_id ?></td>
                        <td class="align-middle"><?= $value->total_coupons ?></td>
                        <td class="align-middle"><?= $value->remaining_coupons ?></td>
                        <td class="align-middle"><?= $value->user_email_id ?></td>
                        <td class="align-middle"><?= $value->discount ?></td>
                        <td class="align-middle"><?= $value->user_type ?></td>
                        <td class="align-middle"><?= $value->created_by ?></td>
                        <td class="align-middle"><?= $value->created_at ?></td>

                    </tr>

                    <?php
                }
                if (empty($users)) {
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



        <div class="modal fade" id="add_coupons_corporate" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="<?= base_url('portal/add_corporate_coupon_save') ?>" method="post">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Coupons</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12 form-group mb-3">
                                    <label>Coupon Code</label>
                                    <?php $uuid = UUID(); ?>
                                    <input type="text" class="form-control" required="" name="coupon_code_corporate" value="<?= $uuid ?>" readonly>
                                    <div class="text-danger"><?= form_error('coupon_code'); ?></div>
                                </div>

                                <div class="col-md-12 form-group mb-3">
                                    <label>Select User</label>
                                    <select class="form-control" required="" name="user_id_corporate" value="<?= set_value('user_role_id') ?>">
                                        <option value="">Select Corporate</option>
                                        <?php foreach ($corporate_users as $value) { ?>
                                            <option value="<?= $value->id ?>"><?= $value->email ?></option>
                                        <?php }
                                        ?>
                                    </select>
                                    <div class="text-danger"><?= form_error('user_role_id'); ?></div>
                                </div>


                                <input type="hidden" class="form-control" required="" name="user_type_corporate" value="Corporate">


                                <div class="col-md-12 form-group mb-3">
                                    <label>Number of Coupons</label>
                                    <input type="number" class="form-control" required="" name="number_of_coupons_corporate" value="<?= set_value('last_name') ?>">
                                    <div class="text-danger"><?= form_error('last_name'); ?></div>
                                </div>


                                <div class="col-md-12 form-group mb-3">
                                    <label>Discount in percentage</label>
                                    <input type="number" class="form-control" required="" name="discount_in_percentage_corporate" value="<?= set_value('last_name') ?>">
                                    <div class="text-danger"><?= form_error('last_name'); ?></div>
                                </div>

                                <div class="col-md-12 form-group mb-3">
                                    <label class="switch switch-primary mr-3">
                                        <span>Status</span>
                                        <input type="checkbox" name="active_corporate" checked value="1">
                                        <span class="slider"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Send Coupons</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


<!--        now Agent-->
<!--        now Agent-->
<!--        now Agent-->


        <div class="modal fade" id="add_coupons_agent" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="<?= base_url('portal/add_agent_coupon_save') ?>" method="post">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Coupons</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12 form-group mb-3">
                                    <label>Coupon Code</label>
                                    <?php
                                    $this->load->library('uuid');
                                    $uuid = UUID(); ?>
                                    <input type="text" class="form-control" required="" name="coupon_code_agent" value="<?= $uuid ?>" readonly>
                                    <div class="text-danger"><?= form_error('coupon_code'); ?></div>
                                </div>

                                <div class="col-md-12 form-group mb-3">
                                    <label>Select User</label>
                                    <select class="form-control" required="" name="user_id_agent" value="<?= set_value('user_role_id') ?>">
                                        <option value="">Select Agent</option>
                                        <?php foreach ($agent_users as $value) { ?>
                                            <option value="<?= $value->id ?>"><?= $value->email ?></option>
                                        <?php }
                                        ?>
                                    </select>
                                    <div class="text-danger"><?= form_error('user_role_id'); ?></div>
                                </div>

                                <input type="hidden" class="form-control" required="" name="user_type_agent" value="Agent">

                                <div class="col-md-12 form-group mb-3">
                                    <label>Number of Coupons</label>
                                    <input type="number" class="form-control" required="" name="number_of_coupons_agent" value="<?= set_value('last_name') ?>">
                                    <div class="text-danger"><?= form_error('last_name'); ?></div>
                                </div>

                                <div class="col-md-12 form-group mb-3">
                                    <label>Discount in percentage</label>
                                    <input type="number" class="form-control" required="" name="discount_in_percentage_agent" value="<?= set_value('last_name') ?>">
                                    <div class="text-danger"><?= form_error('last_name'); ?></div>
                                </div>

                                <div class="col-md-12 form-group mb-3">
                                    <label class="switch switch-primary mr-3">
                                        <span>Status</span>
                                        <input type="checkbox" name="active_agent" checked value="1">
                                        <span class="slider"></span>
                                    </label>
                                </div>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Send Coupons</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>



<!--        add for outsider-user-->
<!--        add for outsider-user-->
        <div class="modal fade" id="add_coupons_outsider_user" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="<?= base_url('portal/add_outsider_user_coupon_save') ?>" method="post">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Coupons for Outside User</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12 form-group mb-3">
                                    <label>Coupon Code</label>
                                    <?php $uuid = UUID(); ?>
                                    <input type="text" class="form-control" required="" name="coupon_code_user" value="<?= $uuid ?>" readonly>
                                    <div class="text-danger"><?= form_error('coupon_code'); ?></div>
                                </div>

                                <div class="col-md-12 form-group mb-3">
                                    <label>Enter User Email</label>
                                    <input type="email" class="form-control" required="" name="email_user">
                                    <div class="text-danger"><?= form_error('user_role_id'); ?></div>
                                </div>


                                <input type="hidden" class="form-control" required="" name="user_type_user" value="outsider_user">


                                <div class="col-md-12 form-group mb-3">
                                    <label>Number of Coupons</label>
                                    <input type="number" class="form-control" required="" name="number_of_coupons_user" value="<?= set_value('last_name') ?>">
                                    <div class="text-danger"><?= form_error('last_name'); ?></div>
                                </div>


                                <div class="col-md-12 form-group mb-3">
                                    <label>Discount in percentage</label>
                                    <input type="number" class="form-control" required="" name="discount_in_percentage_user" value="<?= set_value('last_name') ?>">
                                    <div class="text-danger"><?= form_error('last_name'); ?></div>
                                </div>

                                <div class="col-md-12 form-group mb-3">
                                    <label class="switch switch-primary mr-3">
                                        <span>Status</span>
                                        <input type="checkbox" name="active_user" checked value="1">
                                        <span class="slider"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Send Coupons</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>








    </div>
</div>

<script>
    $(document).ready(function () {
        $('.delete-user').click(function () {
            var user_id = $(this).data('id');
            swal({
                title: 'Are you sure?',
                text: "You will not be able to revert this.",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then(function () {
                $.post('<?= base_url() ?>portal/delete-user',
                    {user_id: user_id},
                    function (data, status) {
                        if (status === 'success') {
                            swal({
                                title: "Deleted!",
                                text: "User has been deleted.",
                                type: "success"
                            }).then(function () {
                                window.location.href = '';
                            });
                        }
                    });

            })
        });
        <?php if ($this->session->flashdata('add_user_error')): ?>
        $('#add_user').modal('show');
        <?php endif; ?>
    });
</script>