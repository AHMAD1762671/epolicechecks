
<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="row dashboard-sevices">


            <div class="col-lg-3 col-md-4 col-sm-6"> </div>

            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="card bg-gradient-info overflow-hidden text-white" style="background-image: linear-gradient(to bottom, #4a85fb 0, #163eaf 100%); box-shadow: 0 2px 10px rgb(22 62 175 / 30%);}">
                    <div class="card-body pb-0">
                        <p style="font-size: 15px; text-align: center;" class=" mb-1 "><b>  Corporates </b></p>
                        <p style="font-size: 20px; text-align: center;" class=" mb-1 "><b><?= $corporate;?></b></p>
                    </div>
                    <br>
                </div>
            </div>


            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="card bg-gradient-info overflow-hidden text-white" style="background-image: linear-gradient(to bottom, #fc7a5a 0, #d72e04 100%); box-shadow: 0 2px 10px rgb(215 46 4 / 30%);}">
                    <div class="card-body pb-0">
                        <p style="font-size: 15px; text-align: center;" class=" mb-1 "><b> Sub Corporates </b></p>
                        <p style="font-size: 20px; text-align: center;" class=" mb-1 "><b>5</b></p>
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



<div class="row">
    <?php if (check_route('add-corporate', 'post')): ?>
        <div class="col-xl-9 col-lg-6 col-md-4">
            <button class="btn btn-primary" data-toggle="modal" data-target="#add_user">Add Corporate</button>
        </div>
</div>
<br>

<div class="row">
    <?php endif; ?>
    <div class="col-md-12 col-lg-12">
        <form>
            <div class="row">
                <div class="col-sm-2 mt-3 mt-md-0">
                    <input type="text" value="<?= $client_id ?>" name="id" class="form-control" placeholder="Client Id">
                </div>
                <div class="col-sm-2 mt-3 mt-md-0">
                    <input type="text" value="<?= $company ?>" name="company" class="form-control" placeholder="Company">
                </div>
                <div class="col-sm-2 mt-3 mt-md-0">
                    <input type="text" value="<?= $telephone ?>" name="telephone" class="form-control" placeholder="Telephone">
                </div>
                <div class="col-sm-2 mt-3 mt-md-0">
                    <input type="text" value="<?= $address ?>" name="address" class="form-control" placeholder="Address">
                </div>
                <div class="col-sm-2 mt-3 mt-md-0">
                    <select class="form-control" name="user_role" >
                        <option value="<?= $user_role ?>" >corporate</option>
                        <option value="<?= $user_role ?>" >Sub-corporate-Employee</option>
                    </select>
                </div>
                <div class="col-sm-1 mt-3 mt-md-0">
                    <select class="form-control" name="status" >
                        <option value="<?= $status ?>" > On </option>
                        <option value="<?= $status ?>" > Off </option>
                    </select>
                </div>

                <div class="col-sm-1 mt-3 mt-md-0">
                    <button type="submit" class="btn btn-primary btn-block">Search</button>
                </div>
            </div>
        </form>
    </div>
</div>

    <br>

<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Sr. No</th>
                        <th scope="col">Email</th>
                        <th scope="col">Company</th>
                        <th scope="col">Tel</th>
                        <th scope="col">Address</th>
                        <th scope="col">User Role</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($users as $key => $value) {
                        ?>
                        <tr>
                            <th class="align-middle"><?= $i++ ?></th>
                            <td class="align-middle"><?= $value->email ?></td>
                            <td class="align-middle"><?= $value->company ?></td>
                            <td class="align-middle"><?= $value->telephone ?></td>
                            <td class="align-middle"><?= $value->address ?></td>
                            <td class="align-middle"> Corporate </td>
                            <td class="align-middle"><?= $value->active ?></td>

                            <td class="align-middle">
                                <?php if (check_route('edit-corporate', 'post')): ?>
                                    <button class="btn btn-success" data-toggle="modal" data-target="#user_<?= $value->id ?>" title="Edit User">
                                        <span class="fa fa-pen"></span>
                                    </button>
                                    <?php
                                endif;
                                if (check_route('delete-corporate', 'post')):
                                    ?>
                                    <button class="btn btn-primary delete-corporate" data-id="<?= $value->id ?>" title="Delete User">
                                        <span class="fa fa-trash"></span>
                                    </button>
                                <?php endif; ?>

                                <?php
                                if($value->status == "on"){
                                    ?>
                                    <form style="display: inline-grid;" action="<?= base_url('portal/change_corporate_status') ?>" method="post">
                                        <button class="btn btn-danger" title="Enable/Disable" style="float: left;">
                                            <span class="fa fa-power-off"></span>
                                            <input type="hidden" value="<?php echo $value->id; ?>" name="id">
                                            <input type="hidden" value="off" name="status">
                                        </button>
                                    </form>
                                    <?php
                                }
                                else{
                                    ?>
                                    <form style="display: inline-grid;" action="<?= base_url('portal/change_corporate_status') ?>" method="post">
                                        <button class="btn btn-danger" title="Change Status of User">
                                            <span class="fa fa-power-off"></span>
                                            <input type="hidden" value="<?php echo $value->id; ?>" name="id">
                                            <input type="hidden" value="on" name="status">
                                        </button>
                                    </form>
                                <?php } ?>





                            </td>
                        </tr>

                    <div class="modal fade" id="user_<?= $value->id ?>" data-backdrop="static" data-keyboard="false">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <form action="<?= base_url('portal/edit-corporate') ?>" method="post">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit Corporate</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-12 form-group mb-3">
                                                <label>User Email</label>
                                                <input type="text" class="form-control" disabled required="" name="email" value="<?= $value->email ?>">
                                                <input type="hidden" name="id" value="<?= $value->id ?>">
                                                <div class="text-danger"><?= form_error('email'); ?></div>
                                            </div>

                                            <div class="col-md-12 form-group mb-3">
                                                <label>New Password</label>
                                                <input type="password" class="form-control" name="password">
                                                <div class="text-danger"><?= form_error('password'); ?></div>
                                            </div>
                                            <div class="col-md-12 form-group mb-3">
                                                <label>Status</label>
                                                <label class="switch">
                                                    <input type="checkbox" checked name="status">
                                                    <span class="slider round"></span>
                                                </label>
                                                <div class="text-danger"><?= form_error('status'); ?></div>
                                            </div>


                                            <div class="col-md-12 form-group mb-3">
                                                <h4>Profile</h4>
                                                <label>Company</label>
                                                <input type="text" class="form-control" required="" name="company" value="<?= $value->company ?>">
                                                <div class="text-danger"><?= form_error('Company'); ?></div>
                                            </div>

                                            <div class="col-md-12 form-group mb-3">
                                                <label>Last Name</label>
                                                <input type="text" class="form-control" required="" name="last_name" value="<?= $value->last_name ?>">
                                                <div class="text-danger"><?= form_error('last_name'); ?></div>
                                            </div>
                                            <div class="col-md-12 form-group mb-3">
                                                <label>First Name</label>
                                                <input type="text" class="form-control" required="" name="first_name" value="<?= $value->first_name ?>">
                                                <div class="text-danger"><?= form_error('first_name'); ?></div>
                                            </div>

                                            <div class="col-md-12 form-group mb-3">
                                                <label>Address</label>
                                                <input type="text" class="form-control" required="" name="address" value="<?= $value->address ?>">
                                                <div class="text-danger"><?= form_error('address'); ?></div>
                                            </div>

                                            <div class="col-md-12 form-group mb-3">
                                                <label>Telephone</label>
                                                <input type="text" class="form-control" required="" name="telephone" value="<?= $value->telephone ?>">
                                                <div class="text-danger"><?= form_error('telephone'); ?></div>
                                            </div>
                                            <div class="col-md-12 form-group mb-3">
                                                <label>Cell</label>
                                                <input type="text" class="form-control" name="cell" value="<?= $value->cell ?>">
                                                <div class="text-danger"><?= form_error('cell'); ?></div>
                                            </div>
                                            <div class="col-md-12 form-group mb-3">
                                                <label>Fax</label>
                                                <input type="text" class="form-control" name="fax" value="<?= $value->fax ?>">
                                                <div class="text-danger"><?= form_error('fax'); ?></div>
                                            </div>
                                            <div class="col-md-12 form-group mb-3">
                                                <label>Comments</label>
                                                <input type="text" class="form-control" name="comments" value="<?= $value->comments ?>">
                                                <div class="text-danger"><?= form_error('comments'); ?></div>
                                            </div>

                                            <div class="col-md-12 form-group mb-3">
                                                <h4>Assigned Service</h4>
                                                <input type="checkbox" name="name_based_check" value="Name Based Check" <?php if(!empty($value->name_based_check)) { ?> checked="checked" <?php } ?>> <label for="Assigned Service">Name Based Check</label><br>
                                                <input type="checkbox" name="digital_fingerprinting" value="Digital Fingerprinting" <?php if(!empty($value->digital_fingerprinting)) { ?> checked="checked" <?php } ?>> <label for="Digital Fingerprinting">Digital Fingerprinting</label><br>
                                                <input type="checkbox" name="record_suspension" value="Record Suspension" <?php if(!empty($value->record_suspension)) { ?> checked="checked" <?php } ?>> <label for="Record Suspension">Record Suspension</label><br>
                                                <input type="checkbox" name="us_entry_waiver" value="U.S. Entry Waiver" <?php if(!empty($value->us_entry_waiver)) { ?> checked="checked" <?php } ?>> <label for="U.S. Entry Waiver">U.S. Entry Waiver</label><br>
                                                <input type="checkbox" name="canada_immigration" value="Canadian Immigration" <?php if(!empty($value->canada_immigration)) { ?> checked="checked" <?php } ?>> <label for="Canadian Immigration">Canadian Immigration</label><br>
                                            </div>
                                        </div>
                                        <input type="hidden" class="form-control" required="" name="id" value="<?= $value->id ?>">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Edit Corporate</button>
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




<!--        for add new corporate-->
        <div class="modal fade" id="add_user" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="<?= base_url('portal/add-corporate') ?>" method="post">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>

                        <div class="modal-body">
                            <div class="row">


                                <div class="col-md-12 form-group mb-3">
                                    <label>User Role</label> <br>
                                    <input type="radio" onclick="javascript:yesnoCheck();" id="agent" name="user_role" value="Agent"> <label for="Agent">Corporate</label> &nbsp;&nbsp;&nbsp;
                                    <input type="radio" onclick="javascript:yesnoCheck();" id="sub_employee" name="user_role" value="Sub-Employee"> <label for="Sub Employee">Sub Employee</label><br>
                                    <div class="text-danger"><?= form_error('user_role'); ?></div>
                                </div>

                                <script>
                                    function yesnoCheck() {
                                        if (document.getElementById('agent').checked) {
                                            document.getElementById('agent_of').style.display = 'none';
                                        }
                                        else document.getElementById('agent_of').style.display = 'block';
                                    }
                                </script>

                                <div class="col-md-12 form-group mb-3" id="agent_of" style="display:none">
                                    <label>Corporate Email</label>
                                    <select class="form-control" name="sub_corporate">
                                        <option value="">Select Corporate Employee</option>
                                        <?php foreach ($corporates as $st) { ?>
                                            <option value="<?= $st->id ?>"><?= $st->email ?></option>
                                        <?php } ?>
                                    </select>
                                    <div class="text-danger"><?= form_error('country'); ?></div>
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

<!--                                        <div class="col-md-12 form-group mb-3">-->
<!--                                            <label>Status</label>-->
<!--                                            <label class="switch">-->
<!--                                                <input type="checkbox" checked name="status">-->
<!--                                                <span class="slider round"></span>-->
<!--                                            </label>-->
<!--                                            <div class="text-danger">--><?//= form_error('status'); ?><!--</div>-->
<!--                                        </div>-->

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
                                            <label>Address</label>
                                            <input type="text" class="form-control" required="" name="address" value="<?= set_value('address') ?>">
                                            <div class="text-danger"><?= form_error('address'); ?></div>
                                        </div>

                                        <div class="col-md-6 form-group mb-3" style="padding-right: 15px; padding-left: 15px;">
                                            <div class="col-md-12 form-group mb-3">
                                                Gender <br/>
                                                Male : <input type="radio" class="" name="gender"> &nbsp; &nbsp;
                                                Female: <input type="radio" class="" name="gender">
                                            </div>
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



                                        <h4 style="padding-right: 15px; padding-left: 15px;">Application Service Price</h4>
                                        <div class="row" style="padding-right: 15px; padding-left: 15px;">
                                            <div class="col-md-6 form-group mb-3">
                                                <label for="Assigned Service">Name Based Check</label><input type="text" class="form-control" name="name_based_check">
                                            </div>
                                            <div class="col-md-6 form-group mb-3">
                                                <label for="Digital Fingerprinting">Digital Fingerprinting</label> <input type="text" class="form-control" name="digital_fingerprinting">
                                            </div>
                                            <div class="col-md-6 form-group mb-3">
                                                <label for="Record Suspension">Record Suspension</label> <input type="text" class="form-control" name="record_suspension">
                                            </div>
                                            <div class="col-md-6 form-group mb-3">
                                                <label for="U.S. Entry Waiver">U.S. Entry Waiver</label> <input type="text" class="form-control" name="us_entry_waiver">
                                            </div>
                                            <div class="col-md-6 form-group mb-3">
                                                <label for="Canadian Immigration">Canadian Immigration</label> <input type="text" class="form-control" name="canada_immigration">
                                            </div>

                                            <div class="col-md-6 form-group mb-3">
                                                <label for="Canadian Immigration">Tax</label> <input type="text" class="form-control" name="canada_immigration">
                                            </div>

                                            <div class="col-md-6 form-group mb-3">
                                                <label for="Canadian Immigration">Tax Type</label>
                                                <select class="form-control">
                                                    <option>HST</option>
                                                    <option>GST</option>
                                                </select>
<!--                                                <input type="text" class="form-control" name="canada_immigration">-->
                                            </div>
                                        </div>







                                </div>
                            </div>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add Corporate</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<!--get the dymanic dropdown country, province, city-->
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
//    $('.add-states').on('change', function () {
//        var state_id = $(this).val();
//        $.post('<?//= base_url() ?>//portal/get-city-by-state',
//                {state_id: state_id},
//                function (data) {
//                    $('.add-cities').html(data);
//                });
//    });
    $(document).ready(function () {
        $('.delete-corporate').click(function () {
            var corporate_id = $(this).data('id');
            swal({
                title: 'Are you sure?',
                text: "You will not be able to revert this.",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then(function () {
                $.post('<?= base_url() ?>portal/delete-corporate',
                        {corporate_id: corporate_id},
                        function (data, status) {
                            if (status === 'success') {
                                swal({
                                    title: "Deleted!",
                                    text: "Corporate has been deleted.",
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