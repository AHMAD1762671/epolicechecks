<script src="<?= base_url('assets') ?>/files_for_image_crope/jquery.min.js"></script>
<script src="<?= base_url('assets') ?>/files_for_image_crope/bootstrap.min.js"></script>
<script src="<?= base_url('assets') ?>/files_for_image_crope/croppie.js"></script>

<link rel="stylesheet" href="<?= base_url('assets') ?>/files_for_image_crope/bootstrap.min.css">
<link rel="stylesheet" href="<?= base_url('assets') ?>/files_for_image_crope/croppie.css">



<style>
    @media only screen and (max-device-width: 767px) {
        dl, ol, ul {
            margin-top: -3.5px !important;
        }
    }
    @media only screen and (min-device-width: 768px) {
        dl, ol, ul {
            margin-top: -2px;
        }
    }

    .breadcrumb {
        background-color: #FAFBFB !important;
    }
    a.nav-item-hold{
        text-decoration: none;
    }

</style>





<div class="row">
    <div class="col-lg-12 col-md-12">
        <form action="<?= base_url('agent/edit_agent_profile_save') ?>" enctype="multipart/form-data" method="post">

            <div class="modal-body">
                <div class="row">
                    <div class="col-md-5 form-group mb-3">
                        <label>User Email</label>
                        <input type="text" class="form-control" required="" name="email" disabled value="<?= $edit_agent_data['email'] ?>">
                        <input type="hidden" name="id" value="<?= $value->id ?>">
                        <div class="text-danger"><?= form_error('email'); ?></div>
                    </div>

                    <div class="col-md-5 form-group mb-3">
                        <label>New Password</label>
                        <input type="password" class="form-control" name="password">
                        <div class="text-danger"><?= form_error('password'); ?></div>
                    </div>

                    <div class="col-md-5 form-group mb-3">
                        <label>Last Name</label>
                        <input type="text" class="form-control" required="" name="last_name" disabled value="<?= $edit_agent_data['last_name'] ?>">
                        <div class="text-danger"><?= form_error('last_name'); ?></div>
                    </div>
                    <div class="col-md-5 form-group mb-3">
                        <label>First Name</label>
                        <input type="text" class="form-control" required="" name="first_name" disabled value="<?= $edit_agent_data['first_name'] ?>">
                        <div class="text-danger"><?= form_error('first_name'); ?></div>
                    </div>

                    <div class="col-md-5 form-group mb-3">
                        <label>Telephone</label>
                        <input type="text" class="form-control" required="" name="telephone" value="<?= $edit_agent_data['telephone'] ?>">
                        <div class="text-danger"><?= form_error('telephone'); ?></div>
                    </div>
                    <div class="col-md-5 form-group mb-3">
                        <label>Cell</label>
                        <input type="text" class="form-control" name="cell" value="<?= $edit_agent_data['cell'] ?>">
                        <div class="text-danger"><?= form_error('cell'); ?></div>
                    </div>

                    <div class="col-md-5 form-group mb-3">
                        <label>Address</label>
                        <input type="text" class="form-control" required="" name="address" value="<?= $edit_agent_data['address'] ?>">
                        <div class="text-danger"><?= form_error('address'); ?></div>
                    </div>

                    <div class="col-md-5 form-group mb-3">
                        <label>Fax</label>
                        <input type="text" class="form-control" name="fax" value="<?= $edit_agent_data['fax'] ?>">
                        <div class="text-danger"><?= form_error('fax'); ?></div>
                    </div>

                    <div class="col-md-5 form-group mb-3">
                        <label>Company</label>
                        <input type="text" class="form-control" name="company" value="<?= $edit_agent_data['company'] ?>">
                        <div class="text-danger"><?= form_error('Company'); ?></div>
                    </div>

<!--                    <div class="col-md-5 form-group mb-3">-->
<!--                        <label>Profile Picture</label>-->
<!--                        <input type="file" class="form-control" name="profile_picture">-->
<!--                        <div class="text-danger">--><?//= form_error('Company'); ?><!--</div>-->
<!--                    </div>-->



                    <div class="col-md-4 form-group mb-3">
                        <label>Profile Image</label>
                        <div class="panel-body" align="center">
                            <input type="file" name="upload_image" class="form-control-file" id="upload_image" />
                            <br />
                            <div id="uploaded_image"></div>
                        </div>
                    </div>


                    <div class="col-md-5 form-group mb-3">
                        <label>Gender </label>  <br/>
                        <label class="radio-inline">
                            <input type="radio" name="gender" value="Male" <?php if ( $edit_agent_data['gender'] == "Male") echo "checked";?> required=""> &nbsp;	 Male
                        </label>
                        &nbsp; &nbsp; &nbsp; &nbsp;
                        <label class="radio-inline">
                            <input type="radio" name="gender" value="Female" <?php if ( $edit_agent_data['gender'] == "Female") echo "checked";?> required=""> &nbsp;	 Female
                        </label>
                    </div>



                </div>
                <input type="hidden" class="form-control" required="" name="id" value="<?= $value->id ?>">
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Update Profile</button>
            </div>
        </form>
    </div>
</div>



<div id="uploadimageModal" class="modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <!--                <h4 class="modal-title">Upload & Crop Image</h4>-->
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
            };
            reader.readAsDataURL(this.files[0]);
            $('#uploadimageModal').modal('show');
        });

        $('.crop_image').click(function(event){
            $image_crop.croppie('result', {
                type: 'canvas',
                size: 'viewport'
            }).then(function(response){
                $.ajax({
                    url:"<?php echo base_url('agent/upload_profile_img') ?>",
                    type: "POST",
                    data:{"image": response},
                    success:function(data)
                    {
                        $('#uploadimageModal').modal('hide');
                        $('#uploaded_image').html(data);
                    }
                });
            })
        });

    });
</script>