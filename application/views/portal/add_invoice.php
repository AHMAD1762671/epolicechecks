
<div id="print-area">

    <form action=<?php echo base_url('portal/save_custom_invoice') ?> method="post">

        <td><h5> User </h5>
            <select name="user_id" class="form-control">
                <option value="1"> sub_agent@gmail.com</option>
                <option value="2"> sub_corporate@gmail.com</option>
                <option value="3"> corporate@gmail.com </option>
                <option value="4"> subcorporate2@gmail.com </option>
                <option value="5"> agent@gmail.com </option>
                <option value="6"> subcorporate@gmail.com </option>
            </select>
        </td>
        <br>
        <br>

        <div class="row">
            <div class="col-md-12">

                <div class="form-group">
                    <form action="<?= base_url('portal/add_custom_invoice') ?>" name="add_name" id="add_name">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dynamic_field">
                                <tr>
                                    <td><h5> Services </h5>
                                        <select name="name[]" class="form-control">
                                            <option value="criminal-record-check">Criminal Record Check</option>
                                            <option value="digital-fingerprinting">Digital Fingerprinting</option>
                                            <option value="record-suspension">Record Suspension/Pardon </option>
                                            <option value="us-entry">U.S. Entry Waiver </option>
                                        </select>
                                    </td>

                                    <td><h5> Quantity </h5> <input type="text" name="quantity[]" placeholder="Enter quantity" class="form-control name_list" /></td>
                                    <td><h5> Price per Service </h5> <input type="text" name="price[]" placeholder="Enter price" class="form-control name_list" /></td>
                                    <td><h5> Amount </h5> <input type="text" name="amount[]" placeholder="Enter amount" class="form-control name_list" /></td>
                                    <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>
                                </tr>
                            </table>
                        </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4" style="">

                <input type="number" name="gst" placeholder="GST / HST" id="gst" class="form-control">
                <br>
                <input type="number" name="total_amount" placeholder="Total Amount" id="total_amount" class="form-control">
                <br>
                <input type="number" name="payable_amount" placeholder="Payable Amount" id="payable_amount" class="form-control">
                <br>
                <input type="number" name="remaining_balance" placeholder="Remaining Balance" id="remaining_balance" class="form-control">
                <br>

                <div class="invoice-summary">
                    <button class="btn btn-primary" name="submit" type="submit">Save</button>
                </div>
                <div>
    </form>

                    <script>
                        $('#payable_amount').click(function(){
                            var gst = parseFloat($('#gst').val()) || 0;
                            var total_amount = parseFloat($('#total_amount').val()) || 0;
                            var payable_amount = parseFloat($('#payable_amount').val()) || 0;
                            var remaining_balance = parseFloat($('#remaining_balance').val()) || 0;

                            var tex_amount = gst/100*total_amount;
                            var payable_amount_total = tex_amount + total_amount;

                            $('#payable_amount').val(Math.ceil(payable_amount_total));
                        });
                    </script>


                </div>
            </div>
        </div>
    </form>
</div>
<!--==== / Print Area =====-->




<script>
    $(document).ready(function(){
        var i=1;
        $('#add').click(function(){
            i++;
            $('#dynamic_field').append('<tr id="row'+i+'"><td><h5> Services </h5> <select name="name[]" class="form-control"> <option>Criminal Record Check</option> <option>Digital Fingerprinting</option> <option>Record Suspension/Pardon </option> <option>U.S. Entry Waiver </option> </select></td> ' + '<td><h5> Quantity </h5> <input type="text" name="name[]" placeholder="Enter Quantity" class="form-control name_list" /></td> <td><h5> Price </h5> <input type="text" name="name[]" placeholder="Enter Price" class="form-control name_list" /></td><td> <h5> Amount </h5> <input type="text" name="name[]" placeholder="Enter Amount" class="form-control name_list" /></td> <td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
        });

        $(document).on('click', '.btn_remove', function(){
            var button_id = $(this).attr("id");
            $('#row'+button_id+'').remove();
        });
    });
</script>
