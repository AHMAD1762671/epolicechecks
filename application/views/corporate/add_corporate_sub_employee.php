<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="row dashboard-sevices">


<!--            <div class="col-lg-1 col-md-4 col-sm-6"> </div>-->




<!--            <div class="col-lg-4 col-md-4 col-sm-6">-->
<!--                <div class="card bg-gradient-info overflow-hidden text-white" style="background-image: linear-gradient(to bottom, #fc7a5a 0, #d72e04 100%); box-shadow: 0 2px 10px rgb(215 46 4 / 30%);}">-->
<!--                    <div class="card-body pb-0">-->
<!--                        <p style="font-size: 15px; text-align: center;" class=" mb-1 "><b> Total Users </b></p>-->
<!--                        <p style="font-size: 20px; text-align: center;" class=" mb-1 "><b>25</b></p>-->
<!--                    </div>-->
<!--                    <br>-->
<!--                </div>-->
<!--            </div>-->

            <div class="col-lg-2 col-md-4 col-sm-6">
                <div class="card bg-gradient-info overflow-hidden text-white" style="background-image: linear-gradient(to bottom, #4a85fb 0, #163eaf 100%); box-shadow: 0 2px 10px rgb(22 62 175 / 30%);}">
                    <div class="card-body pb-0">
                        <p style="font-size: 15px; text-align: center;" class=" mb-1 "><b> Total Users </b></p>
                        <p style="font-size: 20px; text-align: center;" class=" mb-1 "><b>9</b></p>
                    </div>
                    <br>
                </div>
            </div>


<!--            <div class="col-lg-4 col-md-4 col-sm-6">-->
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
<!---->
<!---->
<!--            <div class="col-lg-2 col-md-4 col-sm-6">-->
<!--                <div class="card bg-gradient-info overflow-hidden text-white" style="background-image: linear-gradient(to bottom, rgb(255, 179, 94) 0, #c87517 100%);box-shadow: 0 2px 10px rgb(234 33 103 / 30%);">-->
<!--                    <div class="card-body pb-0">-->
<!--                        <p style="font-size: 15px; text-align: center;" class=" mb-1 "><b>Not Applied</b></p>-->
<!--                        <p style="font-size: 20px; text-align: center;" class=" mb-1 "><b>5</b></p>-->
<!--                    </div>-->
<!--                    <br>-->
<!--                </div>-->
<!--            </div>-->


            <div class="col-lg-1 col-md-4 col-sm-6"> </div>

        </div>
    </div>
</div>

<br/>







<!--<script src="jquery.min.js"></script>-->
<!--<script src="bootstrap.min.js"></script>-->
<!--<script src="croppie.js"></script>-->
<!--<link rel="stylesheet" href="bootstrap.min.css" />-->
<!--<link rel="stylesheet" href="croppie.css" />-->


<!--<script src="--><?//= base_url('assets') ?><!--/files_for_image_crope/jquery.min.js"></script>-->
<!--<script src="--><?//= base_url('assets') ?><!--/files_for_image_crope/bootstrap.min.js"></script>-->
<script src="<?= base_url('assets') ?>/files_for_image_crope/croppie.js"></script>
<!--<link rel="stylesheet" href="--><?//= base_url('assets') ?><!--/files_for_image_crope/bootstrap.min.css">-->
<link rel="stylesheet" href="<?= base_url('assets') ?>/files_for_image_crope/croppie.css">

<script>
    $('.add-states').on('change', function () {
        var state_id = $(this).val();
        var state = this;
        if ($(this).closest('.modal').hasClass('show')) {
            $.post('<?= base_url() ?>corporate/app_get_city_by_state',
                {state_id: state_id},
                function (data) {
                    $(state).closest('.modal-body').find('.add-cities').html(data);
                });
        }
    });
</script>



<!--<div class="row">-->
    <div class="col-lg-12 col-md-12">
        <div class="container"  style="padding-left: 0px;">


            <div class="col-xl-9 col-lg-4 col-md-4">
                <button class="btn btn-primary" data-toggle="modal" data-target="#add_user">
                    <i class="fas fa-plus"></i>
                    Add User</button>
            </div>



            <br>


            <div class="modal fade" id="add_user" data-backdrop="static" data-keyboard="false">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <h3 style="text-align: center;">Add User</h3>
                        <div class="form-group">

                            <form action="<?= base_url('corporate/save_corporate_sub_employee') ?>" method="post">
                                <div class="col-md-12 form-group mb-3">
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
                                                <label>Company</label>
                                                <input type="text" class="form-control" required="" name="company" value="<?= set_value('company') ?>">
                                                <div class="text-danger"><?= form_error('Company'); ?></div>
                                            </div>

                                            <div class="col-md-6 form-group mb-3">
                                                <label>Address</label>
                                                <input type="text" class="form-control" required="" name="address" value="<?= set_value('address') ?>">
                                                <div class="text-danger"><?= form_error('address'); ?></div>
                                            </div>

                                            <div class="col-md-4 form-group mb-3">
                                                <label>Country</label>
                                                <select class="form-control" name="country_id">
                                                    <option value="">Select Country</option>
                                                    <?php foreach ($countries as $st) { ?>
                                                        <option value="<?= $st->country_id ?>"><?= $st->name ?></option>
                                                    <?php } ?>
                                                </select>
                                                <div class="text-danger"><?= form_error('country'); ?></div>
                                            </div>

                                            <div class="col-md-4 form-group mb-3">
                                                <label>Province</label>
                                                <select class="form-control add-states" id="" required="" name="state_id">
                                                    <option value="">Select State</option>
                                                    <?php foreach ($states as $st) { ?>
                                                        <option value="<?= $st->state_id ?>"><?= $st->name ?></option>
                                                    <?php } ?>
                                                </select>
                                                <div class="text-danger"><?= form_error('state_id'); ?></div>
                                            </div>


                                            <div class="col-md-4 form-group mb-3">
                                                <label>City</label>
                                                <select class="form-control add-cities" id="" name="city_id" >
                                                </select>
                                                <div class="text-danger"><?= form_error('city_id'); ?></div>
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
                                                <input type="hidden" required class="form-control" name="corporate_id" value="<?= $this->uri->segment('3'); ?>">
                                                <div class="text-danger"><?= form_error('fax'); ?></div>
                                            </div>

                                            <div class="col-md-6 form-group mb-3">
                                                <label>Position</label>
                                                <input type="text" class="form-control" name="position" value="<?= set_value('position') ?>">
                                                <div class="text-danger"><?= form_error('position'); ?></div>
                                            </div>


<!--                                            image uploading process-->

                                            <div class="col-md-6 form-group mb-3">
<!--                                                <label>Profile Picture</label>-->
<!--                                                <input type="file" class="form-control" name="profilePicture"">-->

                                                <div class="panel panel-default">
                                                    <div class="panel-heading">Select Profile Image</div>
                                                    <div class="panel-body" align="center">
                                                        <input type="file" name="upload_image" id="upload_image" />
                                                        <br />
                                                        <div id="uploaded_image"></div>
                                                    </div>
                                                </div>


                                                <div id="uploadimageModal" class="modal" role="dialog">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                <h4 class="modal-title">Upload & Crop Image</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-md-8 text-center">
                                                                        <div id="image_demo" style="width:350px; margin-top:30px"></div>
                                                                    </div>
                                                                    <div class="col-md-4" style="padding-top:30px;">
                                                                        <br />
                                                                        <br />
                                                                        <br/>
                                                                        <button class="btn btn-success crop_image">Crop & Upload Image</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>



                                                <script>
                                                    $(document).ready(function(){

                                                        $image_crop = $('#image_demo').croppie({
                                                            enableExif: true,
                                                            viewport: {
                                                                width:200,
                                                                height:200,
                                                                type:'square' //circle
                                                            },
                                                            boundary:{
                                                                width:300,
                                                                height:300
                                                            }
                                                        });

                                                        $('#upload_image').on('change', function(){
                                                            var reader = new FileReader();
                                                            reader.onload = function (event) {
                                                                $image_crop.croppie('bind', {
                                                                    url: event.target.result
                                                                }).then(function(){
                                                                    console.log('jQuery bind complete');
                                                                });
                                                            }
                                                            reader.readAsDataURL(this.files[0]);
                                                            $('#uploadimageModal').modal('show');
                                                        });

//                                                        $('.crop_image').click(function(event){
//                                                            $image_crop.croppie('result', {
//                                                                type: 'canvas',
//                                                                size: 'viewport'
//                                                            }).then(function(response){
//                                                                $.ajax({
//                                                                    url:"upload.php",
//                                                                    type: "POST",
//                                                                    data:{"image": response},
//                                                                    success:function(data)
//                                                                    {
//                                                                        $('#uploadimageModal').modal('hide');
//                                                                        $('#uploaded_image').html(data);
//                                                                    }
//                                                                });
//                                                            })
//                                                        });

                                                    });
                                                </script>






                                            </div>


                                            <div class="col-md-6 form-group mb-3" style="padding-right: 15px; padding-left: 15px;">
                                                <div class="col-md-12 form-group mb-3">
                                                    Gender <br/>
                                                    Male : <input type="radio" class="" name="gender"> &nbsp; &nbsp;
                                                    Female: <input type="radio" class="" name="gender">
                                                </div>
                                            </div>



                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">
                                            Add User</button>
                                    </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>



<!--</div>-->









    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="table-responsive">
                <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th class="align-middle" scope="col">User ID</th>
                                    <th class="align-middle" scope="col">Profile Picture</th>
                                    <th class="align-middle" scope="col">Name</th>
                                    <th class="align-middle" scope="col">Email</th>
                                    <th class="align-middle" scope="col">Status</th>
                                    <th class="align-middle" scope="col">Created at</th>
                                    <th class="align-middle" scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $i = 1000;
                                foreach ($sub_corporate_users as $key => $value) {
                                    ?>
                                    <tr>
                                        <th class="align-middle"><?php  echo '22-CC-' . $i++; ?></th>

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