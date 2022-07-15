<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
<section style="background:#efefe9;">
    <div class="row">

        <form action="<?= base_url() ?>name-based-check" method="post">
            <div class="board">
                <div class="tab-content">
                    <div class="text-center">
                        <h5 class="card-header info-color white-text text-center py-4">
                            <strong>Name Based Check</strong>
                        </h5>
                    </div>
                    <div class="tab-pane fade in active" id="step1">
                        <div class="row" style="margin-left: 15px; margin-right: 15px;">
                            <div class="col-lg-12">
                                <div class="form-group">

                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Select your current residence:</h4>
                                        </div>

                                        <br>
<!--                                    <b> Select your current residence: </b>-->
                                        <select class="form-control" required="" id="state_id" name="state_id">
                                            <option value="">---Select your Province---</option>
                                            <?php foreach ($states as $value) { ?>
                                                <option data-tax="<?= $value->tax_rate ?>" value="<?= $value->state_id ?>"><?= $value->name ?></option>
                                            <?php }
                                            ?>
                                        </select>
                                    </div>

                                </div>
                            </div>
                        </div> <br />


                        <?php foreach ($sub_services as $key => $value) { ?>
                            <div class="container">
                                <div class="row" >


                                    <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12" style="padding-left: 40px;">
                                        <label>
                                            <input type="checkbox" class="services_prices" name="services[]" value="<?= $value->subservice_id ?>">
                                            <input type="hidden" name="services_prices[<?= $value->subservice_id ?>]" value="<?= get_subservice_price($value->subservice_id) ?>">
                                            <i> <?= $value->subservice_name ?>: </i>
                                        </label>
                                    </div>



                                    <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12 text-left">
                                        <strong><span><?= get_subservice_price($value->subservice_id) ?></span> CAD</strong>
                                    </div>
                                </div> 
                                <br>
                            </div>
                        <?php }
                        ?>

                        <div class="row" style="padding:10px; margin-left: 15px; margin-right: 15px;">
                            <div class="col-lg-12" >

                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Transaction History</h4>
                                    </div>

                                    <br>

                                    <div class="form-group">
                                        <label for="inputdefault">Name/Company/Third Party Name:</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fas fa-pencil"></i> </span>
                                            <input class="form-control" id="inputdefault" placeholder="Please Enter Name/Company/Third Party Name" required="" name="delivery_name" type="text">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputdefault">Address:</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fas fa-address-book"></i> </span>
                                            <input class="form-control" id="inputdefault" placeholder="Please Enter Your Address" required="" name="delivery_address" type="text">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <!--CITY-->
                                        <div class="col-md-5">

                                            <div class="form-group">
                                                <label for="inputdefault">City:</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fas fa-location"></i> </span>
                                                    <input class="form-control" id="inputdefault" placeholder="Please Enter Your City" required="" name="delivery_city" type="text">
                                                </div>
                                            </div>

                                        </div>
                                        <!--CITY-->
                                        <!--Province-->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="inputdefault">Province:</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fas fa-location"></i> </span>
                                                    <input class="form-control" id="inputdefault" placeholder="Please Enter Your Province" required="" name="delivery_state" type="text">
                                                </div>
                                            </div>
                                        </div>
                                        <!--Province-->
                                        <!--Country-->
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="inputdefault">Country:</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fas fa-location"></i> </span>
                                                    <input class="form-control" id="inputdefault" required="" placeholder="Please Enter Your Country"  name="delivery_country" type="text">
                                                </div>
                                            </div>
                                        </div>
                                        <!--Country-->
                                    </div>
                                    <div class="row">
                                        <!--Tel-->
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label for="inputdefault">Tel:</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fas fa-phone"></i> </span>
                                                    <input class="form-control" id="inputdefault" required="" placeholder="Please Enter Your Tel" name="delivery_phone" type="text">
                                                </div>
                                            </div>
                                        </div>
                                        <!--Tel-->
                                        <!--Email-->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="inputdefault">Email:</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fas fa-envelope"></i> </span>
                                                    <input class="form-control" id="inputdefault" placeholder="Please Enter Your Email" type="text" required="" name="delivery_email">
                                                </div>
                                            </div>
                                        </div>
                                        <!--Email-->
                                        <div class="col-md-3"></div>
                                    </div>
                                </div>
                                <br>
                            </div>
                        </div> <br />



                        <div class="row" style="padding:10px; margin-left: 15px; margin-right: 15px;">
                            <div class="col-lg-12" >

                                <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Please select <u>one</u> method of delivery</h4>
                            </div>
                                    <br>
                            <?php foreach ($delivery_methods as $value) { ?>
<!--                                <div class="container">-->
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
<!--                                </div>-->
                            <?php } ?>

<!--                            <div class="container">-->
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
<!--                            </div>-->
                            <br />
                        </div>
                            </div>
                        </div>

                    </div>
                    <br>
                        <center> <button type="submit" class="btn btn-success" style="width: 19%;">Next</button></center>
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