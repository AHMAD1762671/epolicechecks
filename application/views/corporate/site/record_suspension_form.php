<link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
<section style="background:#efefe9;">
    <div class="row">

        <form action="<?= base_url() ?>corporate/application/record-suspension" method="post">
            <div class="board">
                <div class="tab-content">
                    <div class="text-center">
                        <h3 style="color: red;">Name Based Check</h3>
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

                        <div class="row" style="margin-left: 15px; margin-right: 15px;">
                            <!--payments option col 1-->
                            <div class="col-md-6" style="background-color: palegreen;">
                                <p style="color: #ca2d1e;"><b>Payment Option</b> - Record Suspension/ File Destruction / Purge | U.S Entry Waiver  | Court Records Search | File Review</p>
                                <form action="/action_page.php">
                                    <div class="form-check">
                                        1st Installment &nbsp;<input type="number" required name="all_installment_1_payment" style="border: 1px solid;">
                                    </div><br>
                                    <div class="form-check">
                                        2nd Installment &nbsp;<input type="number" required name="all_installment_2_payment" style="border: 1px solid;">
                                    </div>
                                    <br>
                                    <div class="form-check">
                                        3rd Installment &nbsp;<input type="number" required name="all_installment_3_payment" style="border: 1px solid;">
                                    </div>

                                </form><br>
                            </div>
                            <!--payments option col 1 end-->
                            <!--payments option col 2 start-->
                            <div class="col-md-6" style="background-color: palegreen;">
                                <p style="color: #ca2d1e;"><b>Payment Option</b> - Both (Record Suspension & U.S Entry Waiver)</p>
                                <br>
                                <div class="form-check" style="margin-top: 10px;">
                                    1st Installment &nbsp;<input type="number" required name="both_installment_1_payment" style="border: 1px solid;">
                                </div><br>
                                <div class="form-check">
                                    2nd Installment &nbsp;<input type="number" required name="both_installment_2_payment" style="border: 1px solid;">
                                </div>
                                <br>
                                <div class="form-check">
                                    3rd Installment &nbsp;<input type="number" required name="both_installment_3_payment" style="border: 1px solid;">
                                </div>
                                <br>
                            </div>

                            <!--payments option col 2 end-->
                        </div>


                        <br />
                        <div class="row" style="margin-left: 15px; margin-right: 15px;">
                            <p style="font-size: 12px;" align="justify"><i> Please note that the above disbursement includes administration charges, file maintenance, correspondence, courier, faxes and photocopies excluding the Parole Board of Canada, US Department of Homeland Security, Canadian & USA court(s) and local police check(s) fee. The installments are based on monthly basis. </i></p><br>
                        </div>
                        <!--Row1-->
                        <div class="row" style="margin-left: 15px; margin-right: 15px;">
                            <div class="col-md-6">
                                <label >Discount Coupon Code:</label>
                            </div>
                            <div class="col-md-1"><input class="inputs" type="text" name="coupon" ></div>
                            <div class="col-md-5"></div>
                        </div><br>


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
