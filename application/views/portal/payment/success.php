<h1>Successfully </h1>

<?php
echo "response_order_id: " . $response_order_id = $this->input->post('response_order_id') . "<br>";
echo "response_code:  " . $response_code = $this->input->post('response_code') . "<br>";
echo "date_stamp:  " . $date_stamp = $this->input->post('date_stamp') . "<br>";
echo "time_stamp:  " . $time_stamp = $this->input->post('time_stamp') . "<br>";
echo "bank_approval_code:  " . $bank_approval_code = $this->input->post('bank_approval_code') . "<br>";
echo "result:  " . $result = $this->input->post('result') . "<br>";
echo "trans_name:  " . $trans_name = $this->input->post('trans_name') . "<br>";
echo "cardholder:  " . $cardholder = $this->input->post('cardholder') . "<br>";
echo "charge_total:  " . $charge_total = $this->input->post('charge_total') . "<br>";

echo "card: " . $card = $this->input->post('card') . "<br>";
echo "f4l4: " . $f4l4 = $this->input->post('f4l4') . "<br>";
echo "message: " . $message = $this->input->post('message') . "<br>";

echo "iso_code: " . $iso_code = $this->input->post('iso_code') . "<br>";
echo "bank_transaction_id:  " . $bank_transaction_id = $this->input->post('bank_transaction_id') . "<br>";
echo "transactionKey: " . $transactionKey = $this->input->post('transactionKey') . "<br>";
echo "Ticket: " . $Ticket = $this->input->post('Ticket') . "<br>";
echo "txn_num: " . $txn_num = $this->input->post('txn_num') . "<br>";

echo "avs_response_code: " . $avs_response_code = $this->input->post('avs_response_code') . "<br>";
echo "cvd_response_code: " . $cvd_response_code = $this->input->post('cvd_response_code') . "<br>";
echo "cavv_result_code: " . $cavv_result_code = $this->input->post('cavv_result_code') . "<br>";
echo "is_visa_debit: " . $is_visa_debit = $this->input->post('is_visa_debit') . "<br>";
?>


<!---===== Print Area =======-->
<div id="print-area">
    <div class="row">
        <div class="col-md-12">

        </div>
    </div>

    <div class="row">
        <div class="col-md-6" style="">
            <img style="width: 125px; height: 70px;" src="<?php echo base_url('assets/images/logo.png'); ?>">
            <p>
                Global Avenues Consulting Inc. <br>
                Unit #3 – 13634 104 Avenue <br>
                Surrey, British Columbia <br>
                Canada V3T 1W2 <br>
                Phone: 604.501.0800  Fax:604.501.0848 <br>
                Toll-Free: 1-877-600-0422 <br>
                Email: info@gacgroup.ca <br>
                URL: www.gacgroup.ca <br>
            </p>
        </div>


    </div>


    <div class="row">
        <div class="col-md-5" style="border: solid 1px #000000">

            <h4> Bill To</h4>

        </div>

        <div class="col-md-2">

        </div>

        <br>
        <br>

        <div class="col-md-5" style="border: solid 1px #000000">

            <h4> CLIENT ID </h4>
            <h4> INVOICE DATE </h4>
            <h4> DUE DATE</h4>
            <h4> AMOUNT DUE</h4>

        </div>
    </div>


    <br>
    <br>


    <div class="row">
        <div class="col-md-1">
        </div>

        <div class="col-md-10" style="border: solid 1px #000000">
            <h4> Bill To</h4>
            <br>
            <br>
            <br>
            <br>
            <br>
            <h4>SUBTOTAL</h4>
            <h4></h4>
        </div>

        <div class="col-md-1">
        </div>
    </div>

    <br>
    <br>

    <div class="row">
        <div class="col-md-1">
        </div>

        <div class="col-md-10">
            <p>
                GST NO: 803683861RT0001
                <br>
                NOTES:
                All payments should be made payable to Global Avenues Consulting Inc. Amounts <br>
                owing after your billing due date are subject to a late payment charge, calculated at 2% <br>
                per month, until paid in full. Additionally, an administrative fee of $25 per month will be <br>
                charged on all accounts which are overdue more than 120 days <br>
            </p>
        </div>

        <div class="col-md-1">
        </div>
    </div>