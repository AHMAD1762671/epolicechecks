<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->


<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="container" style="padding-left: 0px;">

            <div class="col-xl-9 col-lg-6 col-md-4">
                <button class="btn btn-primary" data-toggle="modal" data-target="#add_user">
                    <i class="fas fa-plus"></i>
                    Add User</button>
            </div>



            <br>

            <div class="modal fade" id="add_user" data-backdrop="static" data-keyboard="false">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <br/>
                        <h3 style="text-align: center;">Sub Agent</h3>
                        <div class="form-group">


                            <form action="<?= base_url('agent/save_agent_sub_employee') ?>" method="post" enctype="multipart/form-data">
                                <div class="col-md-12 form-group mb-3">
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-6 form-group mb-3">
                                                <label>Email</label>
                                                <input type="text" class="form-control" required="" name="email">
                                                <div class="text-danger"><?= form_error('email'); ?></div>
                                            </div>
                                            <div class="col-md-6 form-group mb-3">
                                                <label>Password</label>
                                                <input type="password" class="form-control" required="" name="password">
                                                <div class="text-danger"><?= form_error('password'); ?></div>
                                            </div>



                                            <div class="col-md-6 form-group mb-3">
                                                <label>Last Name</label>
                                                <input type="text" class="form-control" required="" name="last_name">
                                                <div class="text-danger"><?= form_error('last_name'); ?></div>
                                            </div>

                                            <div class="col-md-6 form-group mb-3">
                                                <label>First Name</label>
                                                <input type="text" class="form-control" required="" name="first_name">
                                                <div class="text-danger"><?= form_error('first_name'); ?></div>
                                            </div>


                                            <div class="col-md-6 form-group mb-3">
                                                <label>Company</label>
                                                <input type="text" class="form-control" required="" name="company">
                                                <div class="text-danger"><?= form_error('Company'); ?></div>
                                            </div>


                                            <div class="col-md-6 form-group mb-3">
                                                <label>Address</label>
                                                <input type="text" class="form-control" required="" name="address">
                                                <div class="text-danger"><?= form_error('address'); ?></div>
                                            </div>





                                            <div class="col-md-4 form-group mb-3">
                                                <label>Country</label>
                                                <select class="form-control" name="country" id="country">
                                                    <option value="">Select Country</option>
                                                    <?php
                                                    foreach($countries as $st)
                                                    {
                                                        echo '<option value="'.$st->country_id.'">'.$st->name.'</option>';
                                                    }
                                                    ?>
                                                </select>
                                                <div class="text-danger"><?= form_error('country'); ?></div>
                                            </div>

                                            <div class="col-md-4 form-group mb-3">
                                                <label>Province</label>
                                                <select name="state_id" id="state" class="form-control input-lg">
                                                    <option value="">Select State</option>
                                                </select>
                                            </div>


                                            <div class="col-md-4 form-group mb-3">
                                                <label>City</label>
                                                <select name="city" id="city" class="form-control input-lg">
                                                    <option value="">Select City</option>
                                                </select>
                                            </div>


                                            <div class="col-md-6 form-group mb-3">
                                                <label>Telephone</label>
                                                <input type="text" class="form-control" required="" name="telephone">
                                                <div class="text-danger"><?= form_error('telephone'); ?></div>
                                            </div>
                                            <div class="col-md-6 form-group mb-3">
                                                <label>Cell</label>
                                                <input type="text" class="form-control" name="cell">
                                                <div class="text-danger"><?= form_error('cell'); ?></div>
                                            </div>
                                            <div class="col-md-6 form-group mb-3">
                                                <label>Fax</label>
                                                <input type="text" class="form-control" name="fax">
                                                <div class="text-danger"><?= form_error('fax'); ?></div>
                                            </div>

                                            <div class="col-md-6 form-group mb-3">
                                                <label>Position</label>
                                                <input type="text" class="form-control" name="position">
                                                <div class="text-danger"><?= form_error('position'); ?></div>
                                            </div>


                                            <div class="col-md-6 form-group mb-3">
                                                <label>Profile Picture</label>
                                                <input type="file" class="form-control" name="profile_picture">
                                                <div class="text-danger"><?= form_error('profile_picture'); ?></div>
                                            </div>


                                            <div class="col-md-5 form-group mb-3">
                                                <label>Gender </label>
                                                <br/>
                                                <label class="radio-inline">
                                                    <input type="radio" name="gender" value="Male" <?php if ( $edit_agent_data['gender'] == "Male") echo "checked";?> required=""> &nbsp;	 Male
                                                </label>
                                                &nbsp; &nbsp; &nbsp; &nbsp;
                                                <label class="radio-inline">
                                                    <input type="radio" name="gender" value="Female" <?php if ( $edit_agent_data['gender'] == "Female") echo "checked";?> required=""> &nbsp;	 Female
                                                </label>
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
    </div>



    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th class="align-middle" scope="col">Id</th>
                        <th class="align-middle" scope="col">Profile Picture</th>
                        <th class="align-middle" scope="col">Name</th>
                        <th class="align-middle" scope="col">Email</th>
                        <th class="align-middle" scope="col">Status</th>
                        <th class="align-middle" scope="col">Created at</th>
                        <th class="align-middle" scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $i = 1;
                    foreach ($sub_corporate_users as $key => $value) {
                        ?>
                        <tr>
                            <th class="align-middle"><?php  echo 'AC-22-'.$i++; ?></th>
                            <th class="align-middle">
                                <?php if (empty($value->profile_image)){ ?>
                                    <img src="<?php  echo base_url('assets').'/images/admin/Male.png'; ?>" height="60" width="60">
                                <?php }else { ?>
                                <img src="<?php  echo base_url('upload').'/users_profile_images'. $value->profile_image; ?>" height="60" width="60">
                                <?php } ?>
                            </th>
                            <th class="align-middle"><?php  echo $value->first_name." ".$value->last_name ?></th>
                            <th class="align-middle"><?php  echo $value->email ?></th>
                            <th class="align-middle"><?php  echo $value->active ?></th>
                            <th class="align-middle"><?php  echo $value->created_at ?></th>


                            <th class="align-middle">

                                <button style="margin-top: 1px;" class="btn btn-primary" data-toggle="modal" data-target="#forward_application_to_user<?= $value->name_based_application_id ?>" title="Assign Application">
                                    <span class="fas fa-edit"></span>
                                </button>

                                <a target="_blank" href="<?= base_url() ?>portal/security-screening/name-based-check/details/<?= $value->name_based_application_id ?>" class="btn btn-success" title="View Application">
                                    <span class="fa fa-trash"></span>
                                </a>


                                <button style="margin-top: 1px;" class="btn btn-danger" data-toggle="modal" data-target="#forward_application_to_user<?= $value->name_based_application_id ?>" title="Assign Application">
                                    <span class="fa fa-download"></span>
                                </button>


                                <!--    assign / forward_application_to_user -->
                                <!--    forward_application_to_user -->
                                <div class="modal fade" id="forward_application_to_user<?= $value->name_based_application_id ?>" data-backdrop="static" data-keyboard="false">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <form action="<?php echo base_url('portal/forward_application_to_user') ?>" method="post">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Assign Application </h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">


                                                        <?php
                                                        $comment_pic= get_user_roles_by_id($value->name_based_application_id);
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
                                                                <option value="">Select User Role</option>
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
                                                        </div>

                                                        <input type="hidden" class="form-control" required="" name="name_based_application_id" value="<?= $value->name_based_application_id ?>">
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




                            </th>

                        </tr>
                        <?php
                    }
                    if (empty($sub_corporate_users)) {
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
        $(document).ready(function(){
            $('#country').change(function(){
                var country_id = $('#Country').val();
                if(country_id != '')
                {
                    $.ajax({
                        url:"<?php echo base_url(); ?>agent/fetch_state",
                        method:"POST",
                        data:{country_id:country_id},
                        success:function(data)
                        {
                            $('#Province').html(data);
                            $('#City').html('<option value="">Select City</option>');
                        }
                    });
                }
                else
                {
                    $('#Province').html('<option value="">Select State</option>');
                    $('#City').html('<option value="">Select City</option>');
                }
            });

            $('#state').change(function(){
                var state_id = $('#Province').val();
                if(state_id != '')
                {
                    $.ajax({
                        url:"<?php echo base_url(); ?>agent/fetch_city",
                        method:"POST",
                        data:{state_id:state_id},
                        success:function(data)
                        {
                            $('#City').html(data);
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