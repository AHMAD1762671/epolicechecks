<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="container">

            <div class="col-xl-9 col-lg-6 col-md-4">
                <button class="btn btn-primary" data-toggle="modal" data-target="#add_user">Service Order</button>
            </div>


            <br />

            <div class="col-xl-9 col-lg-6 col-md-4">
                <button class="btn btn-primary" data-toggle="modal" data-target="#">Download Templete</button>
            </div>
            <br>




            <div class="modal fade" id="add_user" data-backdrop="static" data-keyboard="false">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <h3 style="text-align: center;">Service Order</h3>
                        <div class="form-group">


                            <form action="<?= base_url('corporate/multiple_file_upload') ?>" method="post" enctype="multipart/form-data" name="add_name" id="add_name">
                                <div class="table-responsive">
                                    <label>Attach Document</label>
                                    <table class="table table-bordered" id="dynamic_field">
                                        <tr>
                                            <td><input type="file" class="form-control" name="files[]" multiple/></td>
                                            <input type="hidden" name="submitted_to" value="83dbdd12-fb78-4433-832a-da8f8516">

                                        </tr>
                                    </table>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Submit Document</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>









<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="table-responsive">
            <table class="display table table-bordered">
                <thead>
                <tr>
<!--                    <th class="align-middle text-center" scope="col">ID</th>-->
                    <th class="align-middle text-center" scope="col">Document Name</th>
                    <th class="align-middle text-center" scope="col">Submitted To</th>
                    <th class="align-middle text-center" scope="col">Created at</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($applications as $key => $value) {
                    ?>
                    <tr>
                        <th class="align-middle text-center"><?= $value->file_name ?></th>
                        <th class="align-middle text-center"><?= get_admin_email_by_id($value->submitted_to) ?></th>

                        <th class="align-middle text-center"><?= $value->created_at ?></th>
                    </tr>
                    <?php
                }
                if (empty($applications)) {
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






































<form action="https://www3.moneris.com/HPPDP/index.php" method="post">
    <div class="board">
        <div class="tab-content">
            <div class="text-center">
                <h3 style="color: red;">Payment Information</h3>
            </div>
            <div class="tab-pane fade in active" id="step1">
                <div class="row" style="margin-left: 15px; margin-right: 15px;">
                    <div class="col-lg-12" style="">
                        <br />
                        <div class="form-group">
                            <b> Select your current residence: </b>
                            <select class="form-control" required="" id="state_id" name="state_id">
                                <option value="">---Select your Province---</option>
                                <?php foreach ($states as $value) { ?>
                                    <option data-tax="<?= $value->tax_rate ?>" value="<?= $value->state_id ?>"><?= $value->name ?></option>
                                <?php }
                                ?>
                            </select>
                            <br />
                        </div>
                    </div>
                </div> <br />



                <?php foreach ($sub_services as $key => $value) { ?>
                    <div class="container">
                        <div class="row" >
                            <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12" style="padding-left: 40px;">
                                <input type="checkbox" class="services_prices" name="services[]" value="<?= $value->subservice_id ?>">
                                <input type="hidden" name="services_prices[<?= $value->subservice_id ?>]" value="<?= get_subservice_price($value->subservice_id) ?>">
                                <label><?= $value->subservice_name ?>:</label>
                            </div>
                            <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12 text-left">
                                <strong><span><?= get_subservice_price($value->subservice_id) ?></span> CAD</strong>
                            </div>
                        </div>
                        <br>
                    </div>
                <?php }
                ?>

                <div class="row" style="border: solid 1px #000000; padding:10px; margin-left: 15px; margin-right: 15px;">
                    <div class="col-lg-12" ><label><b>I want my original result to be delivered at:</b></label><br><br>

                        <div class="form-group">
                            <label for="inputdefault">Name/Company/Third Party Name:</label>
                            <input class="form-control" id="inputdefault" required="" name="delivery_name" type="text" style="border: none;">
                        </div>
                        <div class="form-group">
                            <label for="inputdefault">Address:</label>
                            <input class="form-control" id="inputdefault" required="" name="delivery_address" type="text"  style="border: none;">
                        </div>
                        <div class="row">
                            <!--CITY-->
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="inputdefault">City:</label>
                                    <input class="form-control" id="inputdefault" required="" name="delivery_city" type="text"  style="border: none;">
                                </div>

                            </div>
                            <!--CITY-->
                            <!--Province-->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="inputdefault">Province:</label>
                                    <input class="form-control" id="inputdefault" required="" name="delivery_state" type="text"  style="border: none;">
                                </div>
                            </div>
                            <!--Province-->
                            <!--Country-->
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="inputdefault">Country:</label>
                                    <input class="form-control" id="inputdefault" required="" name="delivery_country" type="text"  style="border: none;">
                                </div>
                            </div>
                            <!--Country-->
                        </div>
                        <div class="row">
                            <!--Tel-->
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="inputdefault">Tel:</label>
                                    <input class="form-control" id="inputdefault" required="" name="delivery_phone" type="text"  style="border: none;">
                                </div>
                            </div>
                            <!--Tel-->
                            <!--Email-->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="inputdefault">Email:</label>
                                    <input class="form-control" id="inputdefault" type="text" required="" name="delivery_email"  style="border: none;">
                                </div>
                            </div>
                            <!--Email-->
                            <div class="col-md-3"></div>
                        </div>


                    </div>

                </div>




                <br/>

                <span style="color: #ca2d1e; margin-left: 15px; margin-right: 15px;"> <b>Please select <u>one</u> method of delivery</b> </span>
                <?php foreach ($delivery_methods as $value) { ?>

                    <div class="container">
                        <div class="row" >
                            <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12" style="padding-left: 40px;">
                                <input type="radio" data-price="<?= $value->delivery_method_price ?>" id="delivery-<?= $value->delivery_method_id ?>" required="" value="<?= $value->delivery_method_id ?>" name="delivery_method" class="delivery_method">
                                <label for="delivery-<?= $value->delivery_method_id ?>"><?= $value->delivery_method_name ?></label>
                            </div>
                            <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12 text-left">
                                <strong><span><?= $value->delivery_method_price ?></span> CAD</strong>
                            </div>

                        </div>
                        <br />
                    </div>

                <?php } ?>

                <div class="container">
                    <div class="row" style="margin-left: 15px; margin-right: 15px;">
                        <div class="col-md-6 text-center">
                            <label style="">Total:</label>
                        </div>
                        <div class="col-md-6">
                            <strong><span id="total_sub">0</span> CAD</strong>
                            <input class="inputs" type="hidden" name="sub_total" >
                        </div>
                        <div class="col-md-4"></div>
                    </div> <br />

                    <div class="row" style="margin-left: 15px; margin-right: 15px;">
                        <div class="col-md-6 text-center">
                            <label style="">Tax:</label>
                        </div>
                        <div class="col-md-6">
                            <strong><span id="total_tax">0</span> CAD</strong>
                            <input class="inputs" type="hidden" name="tax" >
                        </div>
                        <div class="col-md-4"></div>
                    </div> <br />

                    <div class="row" style="margin-left: 15px; margin-right: 15px;">
                        <div class="col-md-6 text-center">
                            <label style="">Grand Total:</label>
                        </div>
                        <div class="col-md-6">
                            <strong><span id="total_grand">0</span> CAD</strong>
                            <input class="inputs" type="hidden" name="grand_total">
                        </div>
                        <div class="col-md-4"></div>
                    </div> <br />
                </div>
                <br />
                <!--                                                <center> <button type="submit" class="btn btn-success" style="width: 139px; margin-left: 55px;">Next</button></center>-->
                <br />
            </div>

        </div>

        <div class="clearfix"></div>
        <input type="hidden" name="country" value="<?= $country ?>">
        <input type="hidden" id="delivery_method_price" name="delivery_method_price" value="0">
        <input type="hidden" id="sub_total" name="sub_total" value="0">
        <input type="hidden" id="tax" name="tax" value="0">
        <input type="hidden" id="grand_total" name="grand_total" value="0">




    </div>



</form>