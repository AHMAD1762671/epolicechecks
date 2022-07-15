<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="row dashboard-sevices">


            <div class="col-lg-1 col-md-4 col-sm-6"> </div>

            <div class="col-lg-2 col-md-4 col-sm-6">
                <div class="card bg-gradient-info overflow-hidden text-white" style="background-image: linear-gradient(to bottom, #4a85fb 0, #163eaf 100%); box-shadow: 0 2px 10px rgb(22 62 175 / 30%);}">
                    <div class="card-body pb-0">
                        <p style="font-size: 15px; text-align: center;" class=" mb-1 "><b>Agents </b></p>
                        <p style="font-size: 20px; text-align: center;" class=" mb-1 "><b><?= $Totalagent ?></b></p>
                    </div>
                    <br>
                </div>
            </div>


            <div class="col-lg-2 col-md-4 col-sm-6">
                <div class="card bg-gradient-info overflow-hidden text-white" style="background-image: linear-gradient(to bottom, #fc7a5a 0, #d72e04 100%); box-shadow: 0 2px 10px rgb(215 46 4 / 30%);}">
                    <div class="card-body pb-0">
                        <p style="font-size: 15px; text-align: center;" class=" mb-1 "><b>Corporates </b></p>
                        <p style="font-size: 20px; text-align: center;" class=" mb-1 "><b><?= $Totalcorporate ?></b></p>
                    </div>
                    <br>
                </div>
            </div>


            <div class="col-lg-2 col-md-4 col-sm-6">
                <div class="card bg-gradient-info overflow-hidden text-white" style="background-image: linear-gradient(to bottom, #60c3b6 0, #269f90 100%);box-shadow: 0 2px 10px rgb(38 159 144 / 30%);">
                    <div class="card-body pb-0">
                        <p style="font-size: 15px; text-align: center;" class=" mb-1 "><b>Registered Users</b></p>
                        <p style="font-size: 20px; text-align: center;" class=" mb-1 "><b><?= $Totaluser ?></b></p>
                    </div>
                    <br>
                </div>
            </div>


            <div class="col-lg-2 col-md-4 col-sm-6">
                <div class="card bg-gradient-info overflow-hidden text-white" style="background-image: linear-gradient(to bottom, #fb6ba7 0, #ea2167 100%);box-shadow: 0 2px 10px rgb(234 33 103 / 30%);">
                    <div class="card-body pb-0">
                        <p style="font-size: 15px; text-align: center;" class=" mb-1 "><b>Reception</b></p>
                        <p style="font-size: 20px; text-align: center;" class=" mb-1 "><b><?= $Totalreception ?></b></p>
                    </div>
                    <br>
                </div>
            </div>


            <div class="col-lg-2 col-md-4 col-sm-6">
                <div class="card bg-gradient-info overflow-hidden text-white" style="background-image: linear-gradient(to bottom, rgb(255, 179, 94) 0, #c87517 100%);box-shadow: 0 2px 10px rgb(234 33 103 / 30%);">
                    <div class="card-body pb-0">
                        <p style="font-size: 15px; text-align: center;" class=" mb-1 "><b>Accounts</b></p>
                        <p style="font-size: 20px; text-align: center;" class=" mb-1 "><b><?= $Totalaccount ?></b></p>
                    </div>
                    <br>
                </div>
            </div>


            <div class="col-lg-1 col-md-4 col-sm-6"> </div>

        </div>
    </div>
</div>

<br/>






<div class="row mb-3 ml-1">
    <?php if (check_route('add-user', 'post')): ?>
        <div class="col-xl-9 col-lg-6 col-md-4">
            <button class="btn btn-primary" data-toggle="modal" data-target="#add_user">Add User</button>
        </div>
    <?php endif; ?>
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
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">User Role</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sr = $this->paginator->get_start_count();
                    foreach ($users as $key => $value) {
                        ?>
                        <tr>
                            <th class="align-middle"><?= $sr++ ?></th>
                            <td class="align-middle"><?= $value->first_name . ' ' . $value->last_name ?></td>
                            <td class="align-middle"><?= $value->email ?></td>
                            <td class="align-middle"><?= $value->user_role_name ?></td>
                            <td class="align-middle"><?= $value->created_at ?></td>
                            <td class="align-middle"><?= ($value->active) ? 'Active' : 'Inactive' ?></td>
                            <td class="align-middle">
<!--                                --><?php //if (check_route('edit-user', 'post') && $value->created_by): ?>
                                    <button class="btn btn-success" data-toggle="modal" data-target="#user_<?= $value->id ?>" title="Edit User">
                                        <span class="fa fa-pen"></span>
                                    </button>
<!--                                    --><?php
//                                endif;
//                                if (check_route('delete-user', 'post') && $value->created_by):
//                                    ?>
                                    <button class="btn btn-primary delete-user" data-id="<?= $value->id ?>" title="Delete User">
                                        <span class="fa fa-trash"></span>
                                    </button>
<!--                                --><?php //endif; ?>
                            </td>
                        </tr>

                    <div class="modal fade" id="user_<?= $value->id ?>" data-backdrop="static" data-keyboard="false">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <form action="<?= base_url('portal/edit-user') ?>" method="post">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-12 form-group mb-3">
                                                <label>First Name</label>
                                                <input type="text" class="form-control" required="" name="first_name" value="<?= $value->first_name ?>">
                                                <div class="text-danger"><?= form_error('first_name'); ?></div>
                                            </div>
                                            <div class="col-md-12 form-group mb-3">
                                                <label>Last Name</label>
                                                <input type="text" class="form-control" required="" name="last_name" value="<?= $value->last_name ?>">
                                                <div class="text-danger"><?= form_error('last_name'); ?></div>
                                            </div>

                                            <div class="col-md-12 form-group mb-3">
                                                <label>New Password</label>
                                                <input type="text" class="form-control" required="" name="password" value="<?= $value->password ?>">
                                                <div class="text-danger"><?= form_error('password'); ?></div>
                                            </div>

                                            <div class="col-md-12 form-group mb-3">
                                                <label>Email</label>
                                                <input type="text" class="form-control" readonly name="email" value="<?= $value->email ?>">
                                                <div class="text-danger"><?= form_error('email'); ?></div>
                                            </div>

                                            <div class="col-md-12 form-group mb-3">
                                                <label>User Role</label>
                                                <select class="form-control" required="" name="user_role_id" val="<?= $value->user_role_id ?>">
                                                    <option value="">Select User Role</option>
                                                    <?php foreach ($user_roles as $value2) { ?>
                                                        <option value="<?= $value2->user_role_id ?>"><?= $value2->user_role_name ?></option>
                                                    <?php }
                                                    ?>
                                                </select>
                                                <div class="text-danger"><?= form_error('user_role_id'); ?></div>
                                            </div>
                                            <div class="col-md-12 form-group mb-3">
                                                <label class="switch switch-primary mr-3">
                                                    <span>Status</span>
                                                    <input type="checkbox" name="active" <?= ($value->active) ? 'checked' : '' ?> value="1">
                                                    <span class="slider"></span>
                                                </label>
                                            </div>
                                        </div>
                                        <input type="hidden" class="form-control" required="" name="id" value="<?= $value->id ?>">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Edit User</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
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
        <div class="modal fade" id="add_user" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="<?php echo base_url('portal/add_user_save') ?>" method="post">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">

                                <div class="col-md-12 form-group mb-3">
                                    <label>User Role</label>
                                    <select class="form-control" required="" name="user_role_id" value="<?= set_value('user_role_id') ?>">
                                        <option value="">Select User Role</option>
                                        <?php foreach ($user_roles as $value) { ?>
                                            <option value="<?= $value->user_role_id ?>"><?= $value->user_role_name ?></option>
                                        <?php }
                                        ?>
                                    </select>
                                    <div class="text-danger"><?= form_error('user_role_id'); ?></div>
                                </div>


                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-6 form-group mb-3">
                                            <label>Email</label>
                                            <input type="text" class="form-control" required="" name="email" value="<?= set_value('email') ?>">
                                            <div class="text-danger"><?= form_error('email'); ?></div>
                                        </div>
                                        <div class="col-md-6 form-group mb-3">
                                            <label>Password</label>
                                            <input type="password" class="form-control" required="" name="password" value="<?= set_value('password') ?>">
                                            <div class="text-danger"><?= form_error('password'); ?></div>
                                        </div>

                                        <div class="col-md-12 form-group mb-3">
                                            <h4>Profile</h4>
                                            <label>Company</label>
                                            <input type="text" class="form-control" required="" name="company" value="<?= set_value('company') ?>">
                                            <div class="text-danger"><?= form_error('Company'); ?></div>
                                        </div>

                                        <div class="col-md-6 form-group mb-3">
                                            <label>Last Name</label>
                                            <input type="text" class="form-control" required="" name="last_name" value="<?= set_value('last_name') ?>">
                                            <div class="text-danger"><?= form_error('last_name'); ?></div>
                                        </div>

                                        <div class="col-md-6 form-group mb-3">
                                            <label>First Name</label>
                                            <input type="text" class="form-control" required="" name="first_name" value="<?= set_value('first_name') ?>">
                                            <div class="text-danger"><?= form_error('first_name'); ?></div>
                                        </div>


                                        <div class="col-md-6 form-group mb-3">
                                                Gender <br/> <br/>
                                                Male : <input type="radio" class="" name="gender"> &nbsp; &nbsp;
                                                Female: <input type="radio" class="" name="gender">
                                        </div>

                                        <div class="col-md-6 form-group mb-3">
                                            <label>Address</label>
                                            <input type="text" class="form-control" required="" name="address" value="<?= set_value('address') ?>">
                                            <div class="text-danger"><?= form_error('address'); ?></div>
                                        </div>

                                        <div class="col-md-4 form-group mb-3">
                                            <label>Country</label>
                                            <select class="form-control"  name="country" id="country">
                                                <option value="">Select Country</option>
                                                <?php foreach ($countries as $st) { ?>
                                                    <option value="<?= $st->country_id ?>"><?= $st->name ?></option>
                                                <?php } ?>
                                            </select>
                                            <div class="text-danger"><?= form_error('country'); ?></div>
                                        </div>

                                        <div class="col-md-4 form-group mb-3">
                                            <label>Province</label>
                                            <select class="form-control" name="state_id" id="province">
                                                <option value="">Select State</option>
                                            </select>
                                        </div>

                                        <div class="col-md-4 form-group mb-3">
                                            <label>City</label>
                                            <select class="form-control" name="city" id="city">
                                                <option value="">Select City</option>
                                            </select>
                                        </div>


                                        <div class="col-md-6 form-group mb-3">
                                            <label>Telephone</label>
                                            <input type="text" class="form-control" required="" name="telephone" value="<?= set_value('telephone') ?>">
                                            <div class="text-danger"><?= form_error('telephone'); ?></div>
                                        </div>

                                        <div class="col-md-6 form-group mb-3">
                                            <label>Cell</label>
                                            <input type="text" class="form-control" name="cell" value="<?= set_value('cell') ?>">
                                            <div class="text-danger"><?= form_error('cell'); ?></div>
                                        </div>

                                        <div class="col-md-6 form-group mb-3">
                                            <label>Fax</label>
                                            <input type="text" class="form-control" name="fax" value="<?= set_value('fax') ?>">
                                            <div class="text-danger"><?= form_error('fax'); ?></div>
                                        </div>

                                        <div class="col-md-6 form-group mb-3">
                                            <label>Position</label>
                                            <input type="text" class="form-control" name="position" value="<?= set_value('position') ?>">
                                            <div class="text-danger"><?= form_error('position'); ?></div>
                                        </div>


                                        <div class="col-md-12 form-group mb-3">
                                            <label>Comments</label>
                                            <input type="text" class="form-control" name="comments" value="<?= set_value('comments') ?>">
                                            <div class="text-danger"><?= form_error('comments'); ?></div>
                                        </div>
                                    </div>
                                </div>









                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add User</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>







<script>
    $(document).ready(function(){
        $('#country').change(function(){
            var country_id = $('#country').val();
            if(country_id != '')
            {
                $.ajax({
                    url:"<?php echo base_url(); ?>portal/fetch_state",
                    method:"POST",
                    data:{country_id:country_id},
                    success:function(data)
                    {
                        $('#province').html(data);
                        $('#city').html('<option value="">Select City</option>');
                    }
                });
            }
            else
            {
                $('#province').html('<option value="">Select State</option>');
                $('#city').html('<option value="">Select City</option>');
            }
        });
        $('#province').change(function(){
            var state_id = $('#province').val();

            if(state_id != '')
            {
                $.ajax({
                    url:"<?php echo base_url(); ?>portal/fetch_city",
                    method:"POST",
                    data:{state_id:state_id},
                    success:function(data)
                    {
                        $('#city').html(data);
                    }
                });
            }
            else
            {
                $('#City').html('<option value="">Select City</option>');
            }
        });
    });
</script>



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