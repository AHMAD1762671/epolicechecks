<div class="tab-content" id="profileTabContent">
    <div class="tab-pane fade active show">
        <div class="row text-center">
            <div class="col-6">
                <h4 class="text-theme"><strong>Client ID: </strong><?= $application->us_entry_waiver_id ?></h4>
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
        <h4 class="text-theme"><span class="fa fa-money-bill text-16 mr-1"></span> Pricing</h4>
        <div class="row">
            <div class="mb-4 col-md-4 col-lg-3 col-sm-6">
                <h5 class="mb-1 text-theme">Sub Total</h5>
                <span><?= $application->sub_total ?> CAD</span>
            </div>
            <div class="mb-4 col-md-4 col-lg-3 col-sm-6">
                <h5 class="mb-1 text-theme">Tax</h5>
                <span><?= $application->tax ?> CAD</span>
            </div>
            <div class="mb-4 col-md-4 col-lg-3 col-sm-6">
                <h5 class="mb-1 text-theme">Grand Total</h5>
                <span><?= $application->grand_total ?> CAD</span>
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
        <h4 class="text-theme"><span class="fa fa-money-bill text-16 mr-1"></span> Payment Option - Record Suspension/ File Destruction / Purge | U.S Entry Waiver | Court Records Search | File Review</h4>
        <div class="row">
            <div class="mb-4 col-md-4 col-lg-3 col-sm-6">
                <h5 class="mb-1 text-theme">1st Installment</h5>
                <span><?= $application->all_installment_1_payment ?> CAD</span>
            </div>
            <div class="mb-4 col-md-4 col-lg-3 col-sm-6">
                <h5 class="mb-1 text-theme">2nd Installment</h5>
                <span><?= $application->all_installment_2_payment ?> CAD</span>
            </div>
            <div class="mb-4 col-md-4 col-lg-3 col-sm-6">
                <h5 class="mb-1 text-theme">3rd Installment</h5>
                <span><?= $application->all_installment_3_payment ?> CAD</span>
            </div>
        </div>
        <hr>
        <h4 class="text-theme"><span class="fa fa-money-bill text-16 mr-1"></span> Payment Option - Both (Record Suspension & U.S Entry Waiver)</h4>
        <div class="row">
            <div class="mb-4 col-md-4 col-lg-3 col-sm-6">
                <h5 class="mb-1 text-theme">1st Installment</h5>
                <span><?= $application->both_installment_1_payment ?> CAD</span>
            </div>
            <div class="mb-4 col-md-4 col-lg-3 col-sm-6">
                <h5 class="mb-1 text-theme">2nd Installment</h5>
                <span><?= $application->both_installment_2_payment ?> CAD</span>
            </div>
            <div class="mb-4 col-md-4 col-lg-3 col-sm-6">
                <h5 class="mb-1 text-theme">3rd Installment</h5>
                <span><?= $application->both_installment_3_payment ?> CAD</span>
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
                <h5 class="mb-1 text-theme">Date of Birth</h5>
                <span><?= $application->consent_dob ?></span>
            </div>
            <div class="mb-4 col-md-4 col-lg-3 col-sm-6">
                <h5 class="mb-1 text-theme">Place of Birth</h5>
                <span><?= $application->consent_birth_place ?></span>
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
        </div>
        <hr>

        <h4 class="text-theme"><span class="fa fa-user text-16 mr-1"></span> DECLARATION OF CRIMINAL RECORD</h4>
        <div class="row">
            <div class="mb-4 col-lg-7">
                <h6 class="mb-1 text-theme">Do you have a criminal record or ever been arrested in Canada?</h6>
                <strong><?= $application->consent_arrested_canada ?></strong>
            </div>
            <div class="mb-4 col-lg-7">
                <h6 class="mb-1 text-theme">Do you have a criminal record or ever been arrested in United States of America?</h6>
                <strong><?= $application->consent_arrested_america ?></strong>
            </div>
            <div class="mb-4 col-lg-7">
                <h6 class="mb-1 text-theme">Do you have a criminal record or ever been arrested in a Foreign Country?</h6>
                <strong><?= $application->consent_arrested_foreign ?></strong>
            </div>
            <div class="mb-4 col-lg-7">
                <h6 class="mb-1 text-theme">Have you ever been refused entry at the USA port of entry/USA border?</h6>
                <strong><?= $application->consent_refused_border ?> <?= $application->consent_refused_border_date ?></strong>
            </div>
            <div class="mb-4 col-lg-7">
                <h6 class="mb-1 text-theme">Have you ever been deported from the United States of America?</h6>
                <strong><?= $application->consent_deported_america ?> <?= $application->consent_deported_america_date ?></strong>
            </div>
            <div class="mb-4 col-lg-7">
                <h6 class="mb-1 text-theme">Have you ever received a fine for your criminal charges in Canada, USA or foreign country?</h6>
                <strong><?= $application->consent_criminal_country ?></strong>
            </div>
            <div class="mb-4 col-lg-7">
                <h6 class="mb-1 text-theme">Have you ever been convicted of a criminal offence for which a pardon has not been granted?</h6>
                <strong><?= $application->consent_criminal_offence ?></strong>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr class="text-center">
                        <th>Offence</th>
                        <th>Date of Sentence</th>
                        <th>City, Country</th>
                        <th>Type of Fine/Sentence?</th>
                        <th>Fine Paid/Sentence completed?</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($offences as $value) { ?>
                        <tr>
                            <td><?= $value->consent_offence ?></td>
                            <td><?= $value->consent_offence_date ?></td>
                            <td><?= $value->consent_offence_court ?></td>
                            <td><?= $value->consent_fine ?></td>
                            <td><?= $value->consent_paid ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <hr>

    </div>
</div>


<div class="row">
    <div class="col-lg-5" id="status">
        <h2 class="text-theme text-center mb-4"><span class="fa fa-comments text-16 mr-1"></span> Comments</h2>
        <div class="pl-5 mb-4">
            <link href="https://cdn.quilljs.com/1.1.6/quill.snow.css" rel="stylesheet">
            <script src="https://cdn.quilljs.com/1.1.6/quill.js"></script> <!-- Create the editor container -->
            <div id="editor" style="height: 470px; padding-left: 0rem!important"> </div>
            <?php $newId =  $this->uri->segment('5'); ?>
            <input type="hidden" name="application_id" id="application_id" value="<?= $newId ?>">
            <input type="hidden" name="type" id="type" value="us-entry-waiver">
            <input type="hidden" name="created_by" id="created_by" value="<?= $this->session->userdata('user_id') ?>">
            <button id="butsave" type="submit" style="width: 30%; width: 47%; left: 30% !important; position: relative;" class="btn btn-primary">Add Comment</button>
        </div>


        <ul>
            <?php foreach ($comments as $value) { ?>
                <li class="media border-top pt-3">
                    <div class="mr-3">
                        <img src="<?= get_admin_profile_image_by_id($value->created_by) ?>" height="60" width="60">
                    </div>
                    <div class="media-body">
                        <h5 class="media-heading">
                            <span class="text-theme mb-0"><?= get_admin_name_by_id($value->created_by) ?></span>
                            <br>
                            <small><span class="fal fa-clock"></span> <?= date('d-m-Y / h:m:s A', strtotime($value->created_at)) ?></small>
                        </h5>
                        <p><?= $value->comment ?></p>
                        <br>

                        <?php
//                        echo $value->application_comment_id;
//                        echo $value->type;
                        $comment_pic= get_images_against_comment_id($value->application_comment_id, $value->type);
                        foreach ($comment_pic as $pic_value) {
                            ?>

                        <div class="row">
                            <div class="col-lg-8" id="">

                                <a href="<?php echo base_url('upload/comment_files/').$pic_value->file_name; ?>" target="_blank">
                                    <img src="<?php echo base_url('upload/icons/file.png'); ?>" height="50px" width="50px">
                                    <p><?php echo $pic_value->file_name; ?></p>
                                </a>
                            </div>
                            <div class="col-lg-4" id="">

                                <form class="" action="<?= base_url() ?>portal/delete_file" method="post">

                                    <input type="hidden" name="file_id" value="<?php echo $pic_value->id; ?>">
                                    <input type="hidden" name="type" value="<?php echo $value->type; ?>">

                                    <?php $id =  $this->uri->segment('5'); ?>
                                    <input type="hidden" name="application_id" value="<?php echo $id; ?>">


                                    <button type="submit" class="close" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </form>
                            </div>
                        </div>








                        <?php } ?>
                    </div>
                </li>

            <form class="" action="<?= base_url() ?>portal/delete_comment" method="post">
                <input type="hidden" name="comment_id" value="<?php echo $value->application_comment_id; ?>">
                <input type="hidden" name="type" value="<?php echo $value->type; ?>">

                <?php $id =  $this->uri->segment('5'); ?>
                <input type="hidden" name="application_id" value="<?php echo $id; ?>">
                <button type="submit" style="width: 30%; width: 47%; left: 30% !important; position: relative;" class="btn btn-primary">Delete Comment</button>
            </form>

            <?php } ?>
        </ul>
    </div>

    <div class="col-lg-4" style="border-left: 1px solid rgba(0, 0, 0, .1);">
        <div class="button-box col-lg-12">
            <h2 class="text-theme"><span class="fa fa-file text-16 mr-1"></span> Files</h2>
            <form class="" action="<?= base_url() ?>portal/multiple_file_upload" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Attach Document</label>
                    <input type="file" class="form-control" name="files[]" multiple/>

                    <input type="hidden" name="comment_id" value="<?= $comment_id[0]['application_comment_id'] ?>">
                    <input type="hidden" name="application_id" value="<?= $newId ?>">
                    <input type="hidden" name="type" value="us-entry-waiver">
                    <input type="hidden" name="submitted_by" value="<?= $this->session->userdata('user_id'); ?>">
                </div>
                <input class="form-control" type="submit" name="fileSubmit" value="Add Document"/>
            </form>
        </div>
    </div>

<!--    update status section-->
<!--    update status section-->
<!--    update status section-->
<div class="col-lg-3" style="border-left: 1px solid rgba(0, 0, 0, .1);">
    <h2 class="text-theme"><span class="fa fa-file text-16 mr-1"></span> Update Status</h2>
    <form class="pl-5 mb-4" action="<?= base_url() ?>portal/add_application_status_save_u_s_entry_waiver_application" method="post">
        <label>Select a Status</label>
        <?php
        if(!empty($status)) {
            foreach ($status as $st) { ?>
                <select name="application_status" class="form-control">
                    <?php if ($st->status == "NEW") { ?>
                        <option value="New" selected>New</option>
                    <?php } else { ?>
                        <option value="New">New</option>
                    <?php } ?>

                    <?php if ($st->status == "Under Processing") { ?>
                        <option value="Under Processing" selected>Under Processing</option>
                    <?php } else { ?>
                        <option value="Under Processing">Under Processing</option>
                    <?php } ?>

                    <?php if ($st->status == "Pending Documents") { ?>
                        <option value="Pending Documents" selected>Pending Documents</option>
                    <?php } else { ?>
                        <option value="Pending Documents">Pending Documents</option>
                    <?php } ?>

                    <?php if ($st->status == "Completed") { ?>
                        <option value="Completed" selected>Completed</option>
                    <?php } else { ?>
                        <option value="Completed">Completed</option>
                    <?php } ?>

                    <?php if ($st->status == "Not Applied") { ?>
                        <option value="Not Applied" selected>Not Applied</option>
                    <?php } else { ?>
                        <option value="Not Applied">Not Applied</option>
                    <?php } ?>
                </select>
                <?php
            }
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
        <input type="hidden" name="type" value="us-entry-waiver">
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