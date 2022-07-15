<link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
<section style="background:#efefe9;">
    <div class="row">

        <form action="<?= base_url() ?>corporate/application/digital-fingerprinting" method="post">
            <div class="board">
                <div class="tab-content">
                    <div class="text-center">
                        <h3 style="color: red;">Digital Fingerprinting</h3>
                    </div>
                    <div class="tab-pane fade in active" id="step1">
                        <div class="row" style="margin-left: 15px; margin-right: 15px;">
                            <div class="col-lg-12" style="background-color: #9ac0cd;">
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

                        <!--                    <div class="container">
                                                <div class="row" >
                                                    <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12" style="padding-left: 40px;">
                                                        <input type="checkbox">
                                                        <label>Discount Coupon Code:</label>
                                                    </div>
                                                    <div class="col-md-6 col-lg-6 col-sm-5 col-xs-12 text-left">
                                                        <input class="input" type="text" name="search" >
                                                    </div>
                        
                                                </div> 
                                                <br />
                                            </div>-->


                        <div class="row" style="background-color: #d6d6d6; padding:10px; margin-left: 15px; margin-right: 15px;">
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
                                <div class="col-6" style="margin-left: -12px;">

                                    <input type="checkbox" name="share_result" value="Yes"/>
                                    <label><b>Share my result (provide email address):</b> </label>
                                    <div class="form-group">
                                        <input class="form-control" name="share_email" id="inputdefault" type="email" placeholder="Email:" style="border: none;">
                                    </div>
                                </div>
                                <!--
                                                            <div class="row">
                                                                <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                                                                    <div class="form-group">
                                
                                                                        <label for="inputdefault">Email:</label>
                                                                        <input class="form-control" id="inputdefault"  type="text"  style="border: none; ">
                                                                    </div>
                                                                </div>
                                
                                                            </div>-->



                            </div>

                        </div> <br />





                        <i style="color: #ca2d1e; margin-left: 15px; margin-right: 15px;"> <b>Please select <u>one</u> method of delivery</b> </i> <br /> <br />
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
                        <center> <button type="submit" class="btn btn-success" style="width: 139px; margin-left: 55px;">Next</button></center> 
                        <br />
                    </div>

                </div>

                <div class="clearfix"></div>
                <input type="hidden" name="country" value="<?= $country ?>">
                <input type="hidden" id="delivery_method_price" name="delivery_method_price" value="0">
                <input type="hidden" id="sub_total" name="sub_total" value="0">
                <input type="hidden" id="tax" name="tax" value="0">
                <input type="hidden" id="grand_total" name="grand_total" value="0">
                <?php
                $options = $this->input->post('digital_fingerprinting_options');
                foreach ($options as $value) {
                    ?>
                    <input type="hidden" name="digital_fingerprinting_options[]" value="<?= $value ?>">
                <?php } ?>
                <input type="hidden" name="agency_state" value="<?= $this->input->post('agency_state') ?>">
                <input type="hidden" name="agency_city" value="<?= $this->input->post('agency_city') ?>">
                <input type="hidden" name="agency_address" value="<?= $this->input->post('agency_address') ?>">
            </div>
        </form>
    </div>
</section>

<script>
    $(document).ready(function () {
        $('.services_prices').change(function () {
            pricings();
        });
        $('#state_id').change(function () {
            pricings();
        });
        $('.delivery_method').change(function () {
            pricings();
        });
    });

    function pricings() {
        var subtotal = 0;
        var total = 0;
        var tax_rate = 0;
        tax_rate = parseInt($('#state_id').find(":selected").attr('data-tax'));
        var tax = 0;
        var delivery_fee = 0;
        delivery_fee = parseInt($("input[name=delivery_method]:checked").attr('data-price'));
        $('#delivery_method_price').val(delivery_fee);
        $('input:checkbox.services_prices:checked').each(function () {
            var service_price = $(this).closest('.row').find('strong>span').text();
            subtotal = subtotal + parseInt(service_price);
        });
        if (isNaN(delivery_fee)) {

        } else {
            subtotal = subtotal + delivery_fee;
        }
        if (isNaN(tax_rate)) {

        } else {
            tax = Math.ceil(((subtotal / 100) * tax_rate));
        }
        total = subtotal + tax;
        $('#total_sub').text(subtotal);
        $('#sub_total').val(subtotal);
        $('#total_tax').text(tax);
        $('#tax').val(tax);
        $('#total_grand').text(total);
        $('#grand_total').val(total);
    }
</script>
