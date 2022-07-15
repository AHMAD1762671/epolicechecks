<form>
    <div class="row mb-3">


        <div class="col-sm-2 mt-3 mt-md-0">
            <input type="text" value="<?= $l_name ?>" name="l_name" class="form-control" placeholder="Last Name" required>
        </div>

        <div class="col-sm-2 mt-3 mt-md-0">
            <input type="text" value="<?= $f_name ?>" name="f_name" class="form-control" placeholder="First Name" required>
        </div>



        <div class="col-sm-3 mt-3 mt-md-0">
            <input type="text" value="<?= $phone ?>" name="phone" class="form-control" placeholder="Phone No." required>
        </div>

        <div class="col-sm-3 mt-3 mt-md-0">
            <input type="text" value="<?= $dob ?>" name="dob" class="form-control" placeholder="Date of Birth" required>
        </div>

        <div class="col-sm-2 mt-3 mt-md-0">
            <button type="submit" class="btn btn-primary btn-block">Search</button>
        </div>
    </div>
</form>

<?php

if(!empty($filter_data->name_based_application_id_new)){ ?>
    <div class="row">
    <div class="col-md-8 col-lg-8">
        <div class="container">
            <div class="row">
                <div class="col-sm">
                    <b> Client ID </b> <br>
                    <span> <td><?= $filter_data->name_based_application_id_new ?></td> </span>
                </div>
                <div class="col-sm">
                    <b> Last Name </b>
                    <br>
                    <span><?= $filter_data->consent_last_name ?></span>
                </div>

                <div class="col-sm">
                    <b> First Name </b>
                    <br>
                    <span><?= $filter_data->consent_first_name ?></span>
                </div>

                <div class="col-sm">
                    <b> Date of Birth </b>
                    <br>
                    <span><?= $filter_data->consent_dob ?></span>
                </div>
            </div>
    <hr style="text-align:left;margin-left:0">
    <div class="row">
        <div class="col-sm">
            <b> Phone </b>
            <br>
            <span><?= $filter_data->consent_phone ?> </span>
        </div>

        <div class="col-sm">
            <b> Total Price </b> <br>
            <?php if(!empty($filter_data->grand_total)){
                ?>
                <span> <?= $filter_data->grand_total ?> CAD </span>
                <?php
            }
            else { ?>
                <span></span>
            <?php } ?>

        </div>
        <div class="col-sm">
            <b> Application Status </b>
            <br>


            <span> <?= $filter_data->application_status ?> </span>



        </div>
        <div class="col-sm">
            <b> Created At </b>
            <br>
            <span><?= $filter_data->created_at ?></span>
        </div>

    </div>
    </div>
    </div>


    <div class="col-md-4 col-lg-4" style="border-left: 1px solid #F5F5FF;">
        <div class="container">
            <div class="row">
                <div class="col-sm">
                    <h3 style="text-align: center;"> Download Documents </h3>
                </div>
            </div>

            <button class="btn btn-primary btn-block"><a style="color: #ffffff;"  target="_blank" id="download" href="<?php echo base_url('upload/user_certificates/'.$filter_data->consent_certificate); ?>" download="Certificate.jpg"> Download document </a> </button>

            <hr style="text-align:left;margin-left:0">

            <div class="row">
                <div class="col-sm">
                    <h3 style="text-align: center;"> Status History (1)  </h3>
                    <br>
                    <span> <?= $filter_data->created_at ?> Status Changed to: <b><?= $filter_data->application_status ?> </b>  </span>
                </div>
            </div>
        </div>
    </div>
    </div>
    <?php
}
//1st namebase data end

elseif(!empty($filter_data->digital_fingerprinting_application_id)){
?>

    <div class="row">
        <div class="col-md-8 col-lg-8">
            <div class="container">
                <div class="row">
                    <div class="col-sm">
                        <b> Client ID </b> <br>
                        <span> <td><?= $filter_data->digital_fingerprinting_application_id ?></td> </span>
                    </div>
                    <div class="col-sm">
                        <b> Last Name </b>
                        <br>
                        <span><?= $filter_data->consent_last_name ?></span>
                    </div>

                    <div class="col-sm">
                        <b> First Name </b>
                        <br>
                        <span><?= $filter_data->consent_first_name ?></span>
                    </div>

                    <div class="col-sm">
                        <b> Date of Birth </b>
                        <br>
                        <span><?= $filter_data->consent_dob ?></span>
                    </div>
                </div>
                <hr style="text-align:left;margin-left:0">
                <div class="row">
                    <div class="col-sm">
                        <b> Phone </b>
                        <br>
                        <span><?= $filter_data->consent_phone ?> </span>
                    </div>

                    <div class="col-sm">
                        <b> Total Price </b> <br>
                        <?php if(!empty($filter_data->grand_total)){
                            ?>
                            <span> <?= $filter_data->grand_total ?> CAD </span>
                            <?php
                        }
                        else { ?>
                            <span></span>
                        <?php } ?>

                    </div>
                    <div class="col-sm">
                        <b> Application Status </b>
                        <br>
                        <span> <?= $filter_data->application_status ?> </span>
                    </div>
                    <div class="col-sm">
                        <b> Created At </b>
                        <br>
                        <span><?= $filter_data->created_at ?></span>
                    </div>

                </div>
            </div>
        </div>


        <div class="col-md-4 col-lg-4" style="border-left: 1px solid #F5F5FF;">
            <div class="container">
                <div class="row">
                    <div class="col-sm">
                        <h3 style="text-align: center;"> Download Documents </h3>
                    </div>
                </div>

                <button class="btn btn-primary btn-block"><a style="color: #ffffff;"  target="_blank" id="download" href="<?php echo base_url('upload/user_certificates/'.$filter_data->consent_certificate); ?>" download="Certificate.jpg"> Download document </a> </button>

                <hr style="text-align:left;margin-left:0">

                <div class="row">
                    <div class="col-sm">
                        <h3 style="text-align: center;"> Status History (1)  </h3>
                        <br>
                        <span> <?= $filter_data->created_at ?> Status Changed to: <b><?= $filter_data->application_status ?> </b>  </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!--    2nd digital fingerprinting application end-->




<?php } elseif(!empty($filter_data->record_suspension_id)){
    ?>

    <div class="row">
        <div class="col-md-8 col-lg-8">
            <div class="container">
                <div class="row">
                    <div class="col-sm">
                        <b> Client ID </b> <br>
                        <span> <td><?= $filter_data->record_suspension_id ?></td> </span>
                    </div>
                    <div class="col-sm">
                        <b> Last Name </b>
                        <br>
                        <span><?= $filter_data->consent_last_name ?></span>
                    </div>

                    <div class="col-sm">
                        <b> First Name </b>
                        <br>
                        <span><?= $filter_data->consent_first_name ?></span>
                    </div>

                    <div class="col-sm">
                        <b> Date of Birth </b>
                        <br>
                        <span><?= $filter_data->consent_dob ?></span>
                    </div>
                </div>
                <hr style="text-align:left;margin-left:0">
                <div class="row">
                    <div class="col-sm">
                        <b> Phone </b>
                        <br>
                        <span><?= $filter_data->consent_phone ?> </span>
                    </div>

                    <div class="col-sm">
                        <b> Total Price </b> <br>
                        <?php if(!empty($filter_data->grand_total)){
                            ?>
                            <span> <?= $filter_data->grand_total ?> CAD </span>
                            <?php
                        }
                        else { ?>
                            <span></span>
                        <?php } ?>

                    </div>
                    <div class="col-sm">
                        <b> Application Status </b>
                        <br>
                        <span> <?= $filter_data->application_status ?> </span>
                    </div>
                    <div class="col-sm">
                        <b> Created At </b>
                        <br>
                        <span><?= $filter_data->created_at ?></span>
                    </div>

                </div>
            </div>
        </div>


        <div class="col-md-4 col-lg-4" style="border-left: 1px solid #F5F5FF;">
            <div class="container">
                <div class="row">
                    <div class="col-sm">
                        <h3 style="text-align: center;"> Download Documents </h3>
                    </div>
                </div>

                <button class="btn btn-primary btn-block"><a style="color: #ffffff;"  target="_blank" id="download" href="<?php echo base_url('upload/user_certificates/'.$filter_data->consent_certificate); ?>" download="Certificate.jpg"> Download document </a> </button>

                <hr style="text-align:left;margin-left:0">

                <div class="row">
                    <div class="col-sm">
                        <h3 style="text-align: center;"> Status History (1)  </h3>
                        <br>
                        <span> <?= $filter_data->created_at ?> Status Changed to: <b><?= $filter_data->application_status ?> </b>  </span>
                    </div>
                </div>
            </div>
        </div>
    </div>


<!--    3rd record suspension application end-->



    <?php
}
elseif(!empty($filter_data->us_entry_waiver_id)){
    ?>
    <div class="row">
        <div class="col-md-8 col-lg-8">
            <div class="container">
                <div class="row">
                    <div class="col-sm">
                        <b> Client ID </b> <br>
                        <span> <td><?= $filter_data->us_entry_waiver_id_new ?></td> </span>
                    </div>
                    <div class="col-sm">
                        <b> Last Name </b>
                        <br>
                        <span><?= $filter_data->consent_last_name ?></span>
                    </div>

                    <div class="col-sm">
                        <b> First Name </b>
                        <br>
                        <span><?= $filter_data->consent_first_name ?></span>
                    </div>

                    <div class="col-sm">
                        <b> Date of Birth </b>
                        <br>
                        <span><?= $filter_data->consent_dob ?></span>
                    </div>
                </div>
                <hr style="text-align:left;margin-left:0">
                <div class="row">
                    <div class="col-sm">
                        <b> Phone </b>
                        <br>
                        <span><?= $filter_data->consent_phone ?> </span>
                    </div>

                    <div class="col-sm">
                        <b> Total Price </b> <br>
                        <?php if(!empty($filter_data->grand_total)){
                            ?>
                            <span> <?= $filter_data->grand_total ?> CAD </span>
                            <?php
                        }
                        else { ?>
                            <span></span>
                        <?php } ?>

                    </div>
                    <div class="col-sm">
                        <b> Application Status </b>
                        <br>
                        <span> <?= $filter_data->application_status ?> </span>
                    </div>
                    <div class="col-sm">
                        <b> Created At </b>
                        <br>
                        <span><?= $filter_data->created_at ?></span>
                    </div>

                </div>
            </div>
        </div>


        <div class="col-md-4 col-lg-4" style="border-left: 1px solid #F5F5FF;">
            <div class="container">
                <div class="row">
                    <div class="col-sm">
                        <h3 style="text-align: center;"> Download Documents </h3>
                    </div>
                </div>

                <button class="btn btn-primary btn-block"><a style="color: #ffffff;"  target="_blank" id="download" href="<?php echo base_url('upload/user_certificates/'.$filter_data->consent_certificate); ?>" download="Certificate.jpg"> Download document </a> </button>

                <hr style="text-align:left;margin-left:0">

                <div class="row">
                    <div class="col-sm">
                        <h3 style="text-align: center;"> Status History (1)  </h3>
                        <br>
                        <span> <?= $filter_data->created_at ?> Status Changed to: <b><?= $filter_data->application_status ?> </b>  </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php } ?>
<!--4th application us base-->