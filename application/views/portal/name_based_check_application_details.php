<style>
    #editor {
        height: 175px
    }

    .le-checkbox {
        appearance: none;
        position: absolute;
        top: 50%;
        left: 5px;
        transform: translateY(-50%);
        background-color: #F44336;
        width: 30px;
        height: 30px;
        border-radius: 40px;
        margin: 0px;
        outline: none;
        transition: background-color .5s;
    }

    .le-checkbox:before {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%,-50%) rotate(
            45deg
        );
        background-color: #ffffff;
        width: 20px;
        height: 5px;
        border-radius: 40px;
        transition: all .5s;
    }

    .le-checkbox:after {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%,-50%) rotate(
            -45deg
        );
        background-color: #ffffff;
        width: 20px;
        height: 5px;
        border-radius: 40px;
        transition: all .5s;
    }

</style>
<div class="tab-content" id="profileTabContent">
    <div class="tab-pane fade active show">
        <div class="row text-center">
            <div class="col-6">
                <h4 class="text-theme"><strong>Application ID: </strong><?= $application_id?></h4>
            </div>
            <div class="col-6">
                <h4 class="text-theme"><strong>State: </strong><?= get_state_name_by_id($application->state_id) ?></h4>
            </div>
        </div>
        <hr>
        <h4 class="text-theme"><span class="fa fa-support text-16 mr-1"></span> Requested Services</h4>
        <div class="row">
            <ul>
                <?php foreach ($services as $value) { ?>
                    <li>
                        <span class="pr-5"><?= $value->subservice_name ?></span>
                        <span class="float-right"><?= $value->service_price ?> CAD</span>
                    </li>
                <?php } ?>
            </ul>
        </div>
        <hr>

        <h4 class="text-theme"><span class="fa fa-map-marker-alt text-16 mr-1"></span> Delivery Details</h4>
        <div class="row">
            <div class="mb-4 col-md-4 col-lg-3 col-sm-6">
                <h5 class="mb-1 text-theme">Name</h5>
                <span><?= $application->delivery_name ?></span>
            </div>
            <div class="mb-4 col-md-4 col-lg-3 col-sm-6">
                <h5 class="mb-1 text-theme">Address</h5>
                <span><?= $application->delivery_address ?></span>
            </div>
            <div class="mb-4 col-md-4 col-lg-3 col-sm-6">
                <h5 class="mb-1 text-theme">City</h5>
                <span><?= $application->delivery_city ?></span>
            </div>
            <div class="mb-4 col-md-4 col-lg-3 col-sm-6">
                <h5 class="mb-1 text-theme">Province</h5>
                <span><?= $application->delivery_state ?></span>
            </div>
            <div class="mb-4 col-md-4 col-lg-3 col-sm-6">
                <h5 class="mb-1 text-theme">Country</h5>
                <span><?= $application->delivery_country ?></span>
            </div>
            <div class="mb-4 col-md-4 col-lg-3 col-sm-6">
                <h5 class="mb-1 text-theme">Phone</h5>
                <span><?= $application->delivery_phone ?></span>
            </div>
            <div class="mb-4 col-md-4 col-lg-3 col-sm-6">
                <h5 class="mb-1 text-theme">Email</h5>
                <span><?= $application->delivery_email ?></span>
            </div>
            <div class="mb-4 col-md-4 col-lg-3 col-sm-6">
                <h5 class="mb-1 text-theme">Delivery Method</h5>
                <span class="pr-5"><?= get_delivery_method_name_by_id($application->delivery_method_id) ?></span> <br> <span><strong><?= $application->delivery_method_price ?> CAD</strong></span>
            </div>
        </div>
        <hr>
        <h4 class="text-theme"><span class="fa fa-money-bill text-16 mr-1"></span> Pricing</h4>
        <div class="row">
            <div class="mb-4 col-md-4 col-lg-3 col-sm-6">
                <h5 class="mb-1 text-theme">Sub Total</h5>
                <span><?= $application->sub_total ?></span>
            </div>
            <div class="mb-4 col-md-4 col-lg-3 col-sm-6">
                <h5 class="mb-1 text-theme">Tax</h5>
                <span><?= $application->tax ?></span>
            </div>
            <div class="mb-4 col-md-4 col-lg-3 col-sm-6">
                <h5 class="mb-1 text-theme">Grand Total</h5>
                <span><?= $application->grand_total ?></span>
            </div>
            <div class="mb-4 col-md-4 col-lg-3 col-sm-6">
                <h5 class="mb-1 text-theme">Payment Status</h5>
                <span><?= ($application->payment_status) ? 'Paid' : 'Unpaid' ?></span>
            </div>
            <div class="mb-4 col-md-4 col-lg-3 col-sm-6">
                <h5 class="mb-1 text-theme">Card Number</h5>
                <span><?= str_replace(range(0, 9), "*", substr($application->card_number, 0, -4)) . substr($application->card_number, -4); ?></span>
            </div>
            <div class="mb-4 col-md-4 col-lg-3 col-sm-6">
                <h5 class="mb-1 text-theme">Card Expiry</h5>
                <span><?= $application->card_expiry ?></span>
            </div>
            <div class="mb-4 col-md-4 col-lg-3 col-sm-6">
                <h5 class="mb-1 text-theme">Card Holder Name</h5>
                <span><?= $application->card_holder_name ?></span>
            </div>
            <div class="mb-4 col-md-4 col-lg-3 col-sm-6">
                <h5 class="mb-1 text-theme">CVV2/CVC2 Code</h5>
                <span><?= $application->card_cvc ?></span>
            </div>
            <div class="mb-4 col-md-4 col-lg-3 col-sm-6">
                <h5 class="mb-1 text-theme">Email</h5>
                <span><?= $application->card_holder_email ?></span>
            </div>
            <div class="mb-4 col-md-4 col-lg-3 col-sm-6">
                <h5 class="mb-1 text-theme">Phone</h5>
                <span><?= $application->card_holder_phone ?></span>
            </div>
        </div>
        <hr>
        <h4 class="text-theme"><span class="fa fa-user text-16 mr-1"></span> PERSONAL INFORMATION</h4>
        <div class="row">
            <div class="mb-4 col-md-4 col-lg-3 col-sm-6">
                <h5 class="mb-1 text-theme">Last Name</h5>
                <span><?= $application->consent_last_name ?></span>
            </div>
            <div class="mb-4 col-md-4 col-lg-3 col-sm-6">
                <h5 class="mb-1 text-theme">First Name</h5>
                <span><?= $application->consent_first_name ?></span>
            </div>
            <div class="mb-4 col-md-4 col-lg-3 col-sm-6">
                <h5 class="mb-1 text-theme">Middle Name</h5>
                <span><?= $application->consent_middle_name ?></span>
            </div>
            <div class="mb-4 col-md-4 col-lg-3 col-sm-6">
                <h5 class="mb-1 text-theme">Maiden/Alias/Nickname</h5>
                <span><?= $application->consent_nickname ?></span>
            </div>
            <div class="mb-4 col-md-4 col-lg-3 col-sm-6">
                <h5 class="mb-1 text-theme">Gender</h5>
                <span><?= $application->consent_gender ?></span>
            </div>
            <div class="mb-4 col-md-4 col-lg-3 col-sm-6">
                <h5 class="mb-1 text-theme">Place of Birth</h5>
                <span><?= $application->consent_birth_place ?></span>
            </div>
            <div class="mb-4 col-md-4 col-lg-3 col-sm-6">
                <h5 class="mb-1 text-theme">Country</h5>
                <span><?= $application->consent_country ?></span>
            </div>
            <div class="mb-4 col-md-4 col-lg-3 col-sm-6">
                <h5 class="mb-1 text-theme">Telephone</h5>
                <span><?= $application->consent_phone ?></span>
            </div>
            <div class="mb-4 col-md-4 col-lg-3 col-sm-6">
                <h5 class="mb-1 text-theme">Cell</h5>
                <span><?= $application->consent_cellphone ?></span>
            </div>
            <div class="mb-4 col-md-4 col-lg-3 col-sm-6">
                <h5 class="mb-1 text-theme">Email</h5>
                <span><?= $application->consent_email ?></span>
            </div>
        </div>
        <hr>

        <h4 class="text-theme"><span class="fa fa-user text-16 mr-1"></span> Address</h4>
        <div class="row">
            <div class="mb-4 col-md-4 col-lg-3 col-sm-6">
                <h5 class="mb-1 text-theme">Current Address</h5>
                <span><?= $application->consent_current_address ?></span>
            </div>
            <div class="mb-4 col-md-4 col-lg-3 col-sm-6">
                <h5 class="mb-1 text-theme">City</h5>
                <span><?= $application->consent_current_city ?></span>
            </div>
            <div class="mb-4 col-md-4 col-lg-3 col-sm-6">
                <h5 class="mb-1 text-theme">Province</h5>
                <span><?= $application->consent_current_state ?></span>
            </div>
            <div class="mb-4 col-md-4 col-lg-3 col-sm-6">
                <h5 class="mb-1 text-theme">Post Code</h5>
                <span><?= $application->consent_current_post_code ?></span>
            </div>
            <div class="mb-4 col-md-4 col-lg-3 col-sm-6">
                <h5 class="mb-1 text-theme">Previous Address</h5>
                <span><?= $application->consent_previous_address ?></span>
            </div>
            <div class="mb-4 col-md-4 col-lg-3 col-sm-6">
                <h5 class="mb-1 text-theme">City</h5>
                <span><?= $application->consent_previous_city ?></span>
            </div>
            <div class="mb-4 col-md-4 col-lg-3 col-sm-6">
                <h5 class="mb-1 text-theme">Province</h5>
                <span><?= $application->consent_previous_state ?></span>
            </div>
            <div class="mb-4 col-md-4 col-lg-3 col-sm-6">
                <h5 class="mb-1 text-theme">Post Code</h5>
                <span><?= $application->consent_previous_post_code ?></span>
            </div>
        </div>
        <hr>

        <h4 class="text-theme"><span class="fa fa-user text-16 mr-1"></span> REASON FOR REQUEST</h4>
        <div class="row">
            <div class="mb-4 col-md-4 col-lg-3 col-sm-6">
                <h5 class="mb-1 text-theme">Reason</h5>
                <span><?= $application->consent_reason ?> <?= $application->consent_reason_other ?></span>
            </div>
            <div class="mb-4 col-md-4 col-lg-3 col-sm-6">
                <h5 class="mb-1 text-theme">Organization Name</h5>
                <span><?= $application->consent_organization ?></span>
            </div>
            <div class="mb-4 col-md-4 col-lg-3 col-sm-6">
                <h5 class="mb-1 text-theme">Contact Person</h5>
                <span><?= $application->consent_contact_name ?></span>
            </div>
            <div class="mb-4 col-md-4 col-lg-3 col-sm-6">
                <h5 class="mb-1 text-theme">Contact Number</h5>
                <span><?= $application->consent_contact_phone ?></span>
            </div>
        </div>
        <hr>
        <h4 class="text-theme"><span class="fa fa-user text-16 mr-1"></span> DECLARATION OF CRIMINAL RECORD</h4>
        <div class="row">
            <div class="mb-4 col-md-4 col-lg-3 col-sm-6">
                <h5 class="mb-1 text-theme">Criminal Offence</h5>
                <span><?= $application->consent_criminal_offence ?></span>
            </div>

            <div class="mb-4 col-md-4 col-lg-3 col-sm-6">
                <h5 class="mb-1 text-theme">Applicant Signature</h5>
                <span><img height="100px" width="200px" style="margin-top: 10%;" src="<?php echo base_url().'uploads/applicant_signatures/'.$application->consent_signature_drawable?>" alt="Signature Drawable"></span>
            </div>
        </div>
        <?php foreach ($offences as $value) { ?>
            <div class="row">
                <div class="mb-4 col-md-4 col-lg-3 col-sm-6">
                    <h5 class="mb-1 text-theme">Offence</h5>
                    <span><?= $value->consent_offence ?></span>
                </div>
                <div class="mb-4 col-md-4 col-lg-3 col-sm-6">
                    <h5 class="mb-1 text-theme">Date of Sentence</h5>
                    <span><?= $value->consent_offence_date ?></span>
                </div>
                <div class="mb-4 col-md-4 col-lg-3 col-sm-6">
                    <h5 class="mb-1 text-theme">Court Location</h5>
                    <span><?= $value->consent_offence_court ?></span>
                </div>
            </div>
        <?php } ?>
        <hr>



        <h4 class="text-theme"><span class="fa fa-user text-16 mr-1"></span> Identification Verification</h4>
<!--        <input type="checkbox" class="le-checkbox">	Electronic Identity Verification-->
        <br>

        <?php if($value->verification_status == "verified"){ ?>
            <?php if($value->verified_by == "agent"){ ?>

                <div class="row">
                    <div class="mb-4 col-md-4 col-lg-3 col-sm-6">
                        <h5 class="mb-1 text-theme"><input type="checkbox" class="le-checkbox"> &nbsp;	 &nbsp;	&nbsp;	Electronic Identity Verification</h5>
                    </div>
                </div>
            <br>

            <div class="row">

                <div class="mb-4 col-md-4 col-lg-6 col-sm-6">
                    <h5 class="" style="color: red;">1. Which of the following is your middle or former name?</h5>
                </div>



                <div class="mb-4 col-md-4 col-lg-6 col-sm-6">
                    <h5 class="" style="color: green;">2. Which of the following is currently or has been in the past one of your phone numbers?</h5>
                </div>
            </div>

            <div class="row">
                <div class="mb-4 col-md-4 col-lg-6 col-sm-6">
                    <h5 class="" style="color: red;">3. Identify your business line extension in the following list?</h5>
                </div>


                <div class="mb-4 col-md-4 col-lg-6 col-sm-6">
                    <h5 class="" style="color: green;"> 4. Which of the following is your age today?</h5>
                </div>
            </div>


            <?php } elseif($value->verified_by = "aquafex"){  ?>

            <div class="row">
                <div class="mb-4 col-md-4 col-lg-3 col-sm-6">
                    <h5 style="color: red;">Not Verified</h5>
                </div>

                <div class="mb-4 col-md-4 col-lg-3 col-sm-6">
                    <h5 class="mb-1 text-theme"><input type="checkbox" class="le-checkbox"> &nbsp;	 &nbsp;	&nbsp;	Electronic Identity Verification</h5>
                </div>
            </div>


        <?php } } else{  ?>

            <div class="row">
                <div class="mb-4 col-md-4 col-lg-3 col-sm-6">
                    <h5 class="mb-1 text-theme"><input type="checkbox" class="le-checkbox"> &nbsp;	 &nbsp;	&nbsp;	Electronic Identity Verification</h5>
                </div>
            </div>

        <?php } ?>

        <hr>







    </div>
</div>

<div class="row">
    <div class="col-lg-5" id="status">
        <h2 class="text-theme text-center mb-4"><span class="fa fa-comments text-16 mr-1"></span> Comments</h2>

        <div class="pl-5 mb-4">
            <link href="https://cdn.quilljs.com/1.1.6/quill.snow.css" rel="stylesheet">
            <script src="https://cdn.quilljs.com/1.1.6/quill.js"></script> <!-- Create the editor container -->
            <div id="editor"> </div>
            <?php $newId =  $this->uri->segment('5'); ?>
            <input type="hidden" name="application_comment_id" id="application_comment_id" value="<?= $newId ?>">
            <input type="hidden" name="application_id" id="application_id" value="<?= $newId ?>">
            <input type="hidden" name="type" id="type" value="name-based-check">
            <input type="hidden" name="created_by" id="created_by" value="<?= $this->session->userdata('user_id') ?>">


            <form class="" action="<?= base_url() ?>portal/multiple_file_upload" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Attach Document</label>
                    <input type="file" class="form-control" name="files[]" multiple/>

                    <input type="hidden" name="comment_id" value="<?= $comment_id[0]['application_comment_id'] ?>">
                    <input type="hidden" name="application_id" value="<?= $newId ?>">
                    <input type="hidden" name="type" value="name-based-check">
                    <input type="hidden" name="submitted_by" value="<?= $this->session->userdata('user_id'); ?>">
                </div>
<!--                <input style="background-color: #13375c; color: #ffffff;" class="form-control" type="submit" name="fileSubmit" value="Add Document"/>-->
            </form>

            <br/>
            <button id="butsave" type="submit" style="width: 30%; width: 47%; left: 30% !important; position: relative;" class="btn btn-primary">Add Comment</button>
        </div>



        </ul>
    </div>




    <!--    update status section-->
    <!--    update status section-->
    <!--    update status section-->
    <div class="col-lg-3" style="border-left: 1px solid rgba(0, 0, 0, .1);">
        <h4 class="text-theme"><span class="fa fa-file text-16 mr-1"></span>      Electronic Identity Verification</h4>
<!--        <br/>-->
        <form class="" action="#" method="post">
            <label>Select a Varification Type</label>

                <select name="application_status" class="form-control" required>
                    <option value="">Select a Status</option>
                    <option value="Approved">Approved</option>
                    <option value="Not Approved">Not Approved</option>
                </select>

            <input type="hidden" name="application_id" value="<?= $newId ?>">
            <input type="hidden" name="type" value="name-based-check">
            <br>
            <button type="submit" style="width: 30%; width: 47%; left: 30% !important; position: relative;" class="btn btn-primary">Update Status</button>
        </form>
    </div>






<!--    update status section-->
<!--    update status section-->
<!--    update status section-->
    <div class="col-lg-3" style="border-left: 1px solid rgba(0, 0, 0, .1);">
        <h2 class="text-theme"><span class="fa fa-file text-16 mr-1"></span> Update Status</h2>
        <form class="pl-5 mb-4" action="<?= base_url() ?>portal/add_application_status_save" method="post">
            <label>Select a Status</label>


            <?php
            if(!empty($status)){
                foreach ($status as $st) { ?>

                    <select name="application_status" class="form-control">

                        <?php if($st->status == "NEW"){ ?>
                        <option value="New" selected>New</option>
                        <?php } else{ ?>
                        <option value="New">New</option>
                        <?php } ?>

                        <?php if($st->status == "Under Processing"){ ?>
                        <option value="Under Processing" selected>Under Processing</option>
                        <?php } else{ ?>
                        <option value="Under Processing">Under Processing</option>
                        <?php } ?>

                        <?php if($st->status == "Pending Documents"){ ?>
                        <option value="Pending Documents" selected>Pending Documents</option>
                        <?php } else{ ?>
                        <option value="Pending Documents">Pending Documents</option>
                        <?php } ?>

                        <?php if($st->status == "Completed"){ ?>
                        <option value="Completed" selected>Completed</option>
                        <?php } else { ?>
                        <option value="Completed">Completed</option>
                        <?php } ?>

                        <?php if($st->status == "Not Applied"){ ?>
                        <option value="Not Applied" selected>Not Applied</option>
                        <?php } else { ?>
                        <option value="Not Applied">Not Applied</option>
                        <?php } ?>
                    </select>

                <?php }
            }
                else{
                    ?>
                <select name="application_status" class="form-control">
                        <option value="New">New</option>
                        <option value="Under Processing">Under Processing</option>
                        <option value="Pending Documents">Pending Documents</option>
                        <option value="Completed">Completed</option>
                        <option value="Not Applied">Not Applied</option>
                </select>

                <?php
            }
            ?>
            <input type="hidden" name="application_id" value="<?= $newId ?>">
            <input type="hidden" name="type" value="name-based-check">
            <br>
            <button type="submit" style="width: 30%; width: 47%; left: 30% !important; position: relative;" class="btn btn-primary">Update Status</button>
        </form>
    </div>
</div>




<script>
    $(document).ready(function()
    {
        $("#butsave").click(function()
        {
            var myEditor = document.querySelector('#editor')
            var comment = myEditor.children[0].innerHTML;

            var application_id = $('#application_id').val();
            var type = $('#type').val();
            var created_by = $('#created_by').val();
            if(comment != "")
            {
                jQuery.ajax({
                    type: "POST",
                    url: "<?php echo base_url('portal/get_comment_data_save'); ?>",
                    dataType: 'html',
                    data: {comment: comment,application_id: application_id, type: type, created_by:created_by},
                    success: function(res)
                    {
                        if(res)
//                        if(res==1)
                        {
                            location.reload()
//                            alert(res);

                        }
                        else
                        {
                            alert('Data not saved');
                        }
                    },
                    error:function()
                    {
                        alert('data not saved');
                    }
                });
            }
            else
            {
                alert("pls fill all fields first");
            }

        });
    });
</script>



<script>
    $( document ).ready(function() {
        var quill = new Quill('#editor', {
            theme: 'snow'
        });
    });
</script>