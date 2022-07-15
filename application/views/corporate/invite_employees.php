<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="row dashboard-sevices">

            <div class="col-lg-3 col-md-4 col-sm-6">
                <a href="<?php echo base_url().'corporate/dashboard'; ?>">
                    <div class="card bg-gradient-info overflow-hidden text-white" style="background-image: linear-gradient(to bottom, #4a85fb 0, #163eaf 100%); box-shadow: 0 2px 10px rgb(22 62 175 / 30%);}">
                        <div class="card-body pb-0">
                            <p style="font-size: 20px; text-align: center;" class=" mb-1 "><b> Total Invitation Send</b></p>
                            <p style="font-size: 20px; text-align: center;" class=" mb-1 "><b>00</b></p>
                        </div>
                        <br>
                    </div>
                </a>
            </div>

<!--            <div class="col-lg-3 col-md-4 col-sm-6">-->
<!--                <a href="--><?php //echo base_url().'corporate/invite_employee'; ?><!--">-->
<!--                    <div class="card bg-gradient-info overflow-hidden text-white" style="background-image: linear-gradient(to bottom, #fc7a5a 0, #d72e04 100%); box-shadow: 0 2px 10px rgb(215 46 4 / 30%);">-->
<!--                        <div class="card-body pb-0">-->
<!--                            <p style="font-size: 20px; text-align: center;" class=" mb-1 "><b>Send Invitation</b></p>-->
<!--                            <p style="font-size: 55px; text-align: center;" class=" mb-1 "><b>00</b></p>-->
<!--                        </div>-->
<!--                        <br>-->
<!--                    </div>-->
<!--                </a>-->
<!--            </div>-->
<!---->
<!--            <div class="col-lg-3 col-md-4 col-sm-6">-->
<!--                <a href="--><?php //echo base_url().'corporate/service_order'; ?><!--">-->
<!--                    <div class="card bg-gradient-info overflow-hidden text-white" style="background-image: linear-gradient(to bottom, #60c3b6 0, #269f90 100%);box-shadow: 0 2px 10px rgb(38 159 144 / 30%);">-->
<!--                        <div class="card-body pb-0">-->
<!--                            <p style="font-size: 20px; text-align: center;" class=" mb-1 "><b>Service Order</b></p>-->
<!--                            <p style="font-size: 55px; text-align: center;" class=" mb-1 "><b>00</b></p>-->
<!--                        </div>-->
<!--                        <br>-->
<!--                    </div>-->
<!--                </a>-->
<!--            </div>-->
<!---->
<!--            <div class="col-lg-3 col-md-4 col-sm-6">-->
<!--                <a href="--><?php //echo base_url().'corporate/corporate_invoices'; ?><!--">-->
<!--                    <div class="card bg-gradient-info overflow-hidden text-white" style="background-image: linear-gradient(to bottom, #fb6ba7 0, #ea2167 100%);box-shadow: 0 2px 10px rgb(234 33 103 / 30%);">-->
<!--                        <div class="card-body pb-0">-->
<!--                            <p style="font-size: 20px; text-align: center;" class=" mb-1 "><b>Invoices</b></p>-->
<!--                            <p style="font-size: 55px; text-align: center;" class=" mb-1 "><b>00</b></p>-->
<!--                        </div>-->
<!--                        <br>-->
<!--                    </div>-->
<!--                </a>-->
<!--            </div>-->

        </div>
    </div>
</div>







<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="container">
            <br />
            <br />
            <div class="form-group">
                <form action="<?= base_url('corporate/send_email_to_invite_employee') ?>" name="add_name" id="add_name">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dynamic_field">
                            <tr>
                                <td><input type="email" name="name[]" placeholder="Enter E-mail address" class="form-control name_list" /></td>
                                <td><h5> Name Based Check </h5> <input type="checkbox" name="name_based_check[]" value="Name Based Check" class="form-control" /></td>
                                <td><h5> Digital Fingerprinting </h5> <input type="checkbox" name="digital_fingerprinting[]" value="Digital Fingerprinting" class="form-control" /></td>
                                <td><h5> Record Suspension </h5> <input type="checkbox" name="record_suspension[]" value="Record Suspension" class="form-control" /></td>
                                <td> <h5> U.S. Entry Waiver </h5> <input type="checkbox" name="us_entry_waiver[]" value="U.S. Entry Waiver" class="form-control" /></td>
                                <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>
                            </tr>
                        </table>
                        <input type="submit" name="submit" id="submit" class="btn btn-info" value="Send Invitation" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>





<!--<div class="row">-->
<!--    <div class="col-md-12 col-lg-12">-->
<!--        <div class="table-responsive">-->
<!--            <table class="display table table-bordered">-->
<!--                <thead>-->
<!--                <tr>-->
<!--                    <th class="align-middle text-center" scope="col">Send to</th>-->
<!--                    <th class="align-middle text-center" scope="col">Application</th>-->
<!--                    <th class="align-middle text-center" scope="col">Submitted by</th>-->
<!--                    <th class="align-middle text-center" scope="col">Created at</th>-->
<!--                </tr>-->
<!--                </thead>-->
<!--                <tbody>-->
<!--                <td></td>-->
<!--                <td></td>-->
<!--                <td></td>-->
<!--                <td></td>-->
<!--                <td></td>-->
<!--                </tbody>-->
<!--            </table>-->
<!--        </div>-->
<!--        --><?php //echo $this->paginator->get_links(); ?>
<!--    </div>-->
<!--</div>-->



<script>
    $(document).ready(function(){
        var i=1;
        $('#add').click(function(){
            i++;
            $('#dynamic_field').append('<tr id="row'+i+'"><td><input type="email" name="name[]" placeholder="Enter E-mail address" class="form-control name_list" /></td> <td><h5> Name Based Check </h5> <input type="checkbox" name="name_based_check[]" value="Name Based Check" class="form-control" /></td> <td><h5> Digital Fingerprinting </h5> <input type="checkbox" name="digital_fingerprinting[]" value="Digital Fingerprinting" class="form-control" /></td><td><h5> Record Suspension </h5> <input type="checkbox" name="record_suspension[]" value="Record Suspension" class="form-control" /></td><td> <h5> U.S. Entry Waiver </h5> <input type="checkbox" name="us_entry_waiver[]" value="U.S. Entry Waiver" class="form-control" /></td> <td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
        });

        $(document).on('click', '.btn_remove', function(){
            var button_id = $(this).attr("id");
            $('#row'+button_id+'').remove();
        });
    });
</script>