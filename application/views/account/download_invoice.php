<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">


<style>
    img {

    }
    .TM-card {
        /*background-color: #edf0f5;*/
    }
    .TM-card {
        padding: 15px;
        border: 1px solid #d5dce5;
        /*margin-bottom: 20px;*/
        border-radius: 4px;
    }
    .TM-card.invoice .invoice-info, .TM-card.quote .invoice-info, .TM-card.invoice .quote-info, .TM-card.quote .quote-info {
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex;
        -ms-flex-direction: column;
        flex-direction: column;
        padding: 15px 0;
        border-top: 2px dotted #ddd;
        border-bottom: 2px dotted #ddd;
    }
    .TM-card.invoice h4, .TM-card.quote h4 {
        /*border-bottom: 1px solid #012169;*/
        display: inline-block;
    }
    h3, h4, h5, h6 {
        margin-top: 15px;
        margin-bottom: 15px;
    }
    h4, .h4 {
        font-size: 1.25rem;
    }
    h1, h2, h3, h4, .h1, .h2, .h3, .h4 {
        color: #2a2e36;
    }



    .panel-sidebar.panel-invoice-info .panel-body, .panel-sidebar.panel-info .panel-body {
        padding: 15px;
    }
    .panel-sidebar.panel-invoice-info, .panel-sidebar.panel-info {
        background-color: #edf0f5;
        border: 1px solid #d5dce5;
        padding: 0 !important;
    }
    .panel-sidebar {
        border: 0 none;
        font-size: 14px;
        box-shadow: none;
        /* background-color: transparent; */
    }
    .panel {
        margin-bottom: 1.5rem;
    }
    .panel-sidebar.panel-invoice-info .panel-body .total, .panel-sidebar.panel-info .panel-body .total {
        /* flex-direction: column; */
        margin-bottom: 20px;
    }
    .panel-sidebar.panel-invoice-info .panel-body label, .panel-sidebar.panel-info .panel-body label {
        font-weight: 500;
    }
    label {
        display: inline-block;
        margin-bottom: .5rem;
    }

    .panel-sidebar {
        border: 0 none;
        font-size: 14px;
        box-shadow: none;
        background-color: transparent;
    }
    .panel {
        margin-bottom: 1.5rem;
        background-color: #fff;
        border: 1px solid transparent;
        border-radius: 4px;
    }

    .panel-sidebar .panel-heading {
        padding: 0 0 10px 0;
        border-bottom: 1px dotted #d5dce5;
    }
    .panel-sidebar .panel-heading, .panel-sidebar .panel-footer {
        background-color: transparent;
    }
    .panel-sidebar .panel-heading {
        padding: 0 0 10px 0;
        border-bottom: 1px dotted #d5dce5;
    }
    .panel-title {
        margin-top: 0;
        margin-bottom: 0;
        font-size: 1.125rem;
        color: inherit;
    }
    .panel-sidebar .panel-heading .panel-title {
        font-weight: 500;
    }
    .panel-sidebar .panel-heading .panel-title i {
        width: 0;
        overflow: hidden;
        margin-left: -9px;
        display: inline-block;
        line-height: 0;
    }

    .panel-heading i.far, .panel-heading i.fas, .panel-heading i.fal, .panel-heading i.fab {
        font-size: .85em;
    }
    .panel-sidebar.panel-invoice-info .panel-body .payment-form .btn, .panel-sidebar.panel-info .panel-body .payment-form .btn, .panel-sidebar.panel-invoice-info .panel-body .payment-form table, .panel-sidebar.panel-info .panel-body .payment-form table {
        width: 100%;
    }
    .btn.btn-sm, .btn.btn-group-sm > .btn {
        font-size: 12px;
        padding: 7px 18px;
    }

    .btn-success {
        color: #fff;
        background-color: #012169;
        border-color: #012169;
    }

    .page_break { page-break-before: always; }
</style>




<div class="row" style="margin-bottom: 0 !important; padding-bottom: 0 !important;">
    <div class="col-lg-12" style="margin-bottom: 0 !important; padding-bottom: 0 !important;">
        <div class="TM-card invoice" style="padding: 15px 30px; border: none; margin-bottom: 0 !important; padding-bottom: 0 !important;">
            <div class="company-logo">
                <div class="row">
                    <table class=".table-borderless">
                        <tbody>
                        <tr>
                            <td style="padding-left: 100%;">
                                <img src="http://localhost/epolicechecks/assets/images/logox.png" style="width: 30%; margin-bottom: 10px;">
                            </td>

                            <td style="padding-left: 300px;">
                                <img src="http://localhost/epolicechecks/assets/images/paid.png" style="width: 20%; margin-bottom: 10px;">
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
<!--            <hr/>-->
            <div class="section">
                <div class="">
                    <table class="table-borderless">
                        <thead>
                        <tr>
                            <th style="min-width: 50%; font-weight: normal;">
                                <p style="font-size: 9px">
                                <b>Global Avenues Consulting Inc.</b> <br/>
                                Unit #3 – 13634 104 Avenue <br/>
                                Surrey, British Columbia <br/>
                                Canada V3T 1W2 <br/>
                                    <b>Phone:</b> 604.501.0800  <b>Fax:</b>604.501.0848 <br/>
                                        <b>Toll-Free:</b> 1-877-600-0422 <br/>
                                            <b>Email:</b> info@gacgroup.ca <br/>
                                                <b>URL:</b> www.gacgroup.ca <br/>
                                </p>
                            </th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>

            <br/>

            <div class="section" style="width: 50%; float: left;">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>

                            <th width="50%" style="text-align: center; background-color: #F5F5F5;">BILL TO</th>
                            <p style="background-color: #fff;"> <br/> </p>
<!--                            <br/>-->
<!--                            <br/>-->
<!--                            <br/>-->
                        </tr>
                        </thead>
                        <tbody>


                        <tr>
                            <p>lsadfkjasdlkf asdklfjakls fjasdklfj aslfjasd klfsadklf jasdklfj asdf. </p>
                            <br/>
                            <br/>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>


            <div class="section" style="width: 49%; float: right;">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Services</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th>INVOICE DATE</th>
                            <th></th>
                        </tr>
                        <tr>
                            <th>DUE DATE</th>
                            <th></th>
                        </tr>
                        <tr>
                            <th>AMOUNT DUE</th>
                            <th></th>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>










            <br/>


            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>



<!--            <br/>-->
<!--            <br/>-->
<!--            <br/>-->
<!--            <br/>-->
            <br/>

            <div class="section">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>

                            <th width="10%">Services</th>
                            <th width="10%">Quantity</th>
                            <th width="10%" class="">Price</th>
                            <th width="10%">Amount</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td><?php echo $invoice_data->services; ?></td>
                            <td><?php echo $invoice_data->quantity; ?></td>
                            <td class=""><?php echo $invoice_data->total_amount; ?> </td>
                            <td class=""><?php echo $invoice_data->total_amount; ?> </td>
                        </tr>

                        <tr>
                            <td><?php echo $invoice_data->services; ?></td>
                            <td><?php echo $invoice_data->quantity; ?></td>
                            <td class=""><?php echo $invoice_data->total_amount; ?> </td>
                            <td class=""><?php echo $invoice_data->total_amount; ?> </td>
                        </tr><tr>
                            <td><?php echo $invoice_data->services; ?></td>
                            <td><?php echo $invoice_data->quantity; ?></td>
                            <td class=""><?php echo $invoice_data->total_amount; ?> </td>
                            <td class=""><?php echo $invoice_data->total_amount; ?> </td>
                        </tr><tr>
                            <td><?php echo $invoice_data->services; ?></td>
                            <td><?php echo $invoice_data->quantity; ?></td>
                            <td class=""><?php echo $invoice_data->total_amount; ?> </td>
                            <td class=""><?php echo $invoice_data->total_amount; ?> </td>
                        </tr>

                        <tr>
                            <td></td>
                            <td></td>
                            <td class=""><strong>GST</strong></td>
                            <td class="">0% </td>
                        </tr>

                        <tr>
                            <td></td>
                            <td></td>
                            <td class=""><strong>Balance Forward</strong></td>
                            <td class="">CAD 0 </td>
                        </tr>

                        <tr class="active">
                            <td></td>
                            <td></td>
                            <td class=""><strong>Total</strong></td>
                            <td class=""><?php echo $invoice_data->total_amount; ?> </td>
                        </tr>

                        </tbody>
                    </table>
                </div>
            </div>


            <p style="font-size: 10px;"><b>GST NO:</b> 803683861RT0001 <br/>
                All payments should be made payable to Global Avenues Consulting Inc. Amounts owing after your billing due date are subject to a late payment charge, calculated at 2% per month, until paid in full. Additionally, an administrative fee of $25 per month will be
                charged on all accounts which are overdue more than 120 days
                charged on all accounts which are overdue more than 120 days
                charged on all accounts which are overdue more than 120 days
                charged on all accounts which are overdue more than 120 days
                charged on all accounts which are overdue more than 120
            </p>

            <br/>

            <b>Message:</b> <br/>
            <?php echo $invoice_data->note; ?>






            <br/><br/><br/>
            <br/><br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
<!--            <br/>-->


<!--            first page footer-->
<!--            first page footer-->
<!--            first page footer-->
<!--            first page footer-->
            <div style="margin-bottom: -250px !important; padding-bottom: -250px !important; width: 110%;  margin-left: -22px !important; padding-left: -22px !important;">
                <img src="http://localhost/epolicechecks/assets/images/footer_2.png" style="width: 102%; margin-bottom: -250px; !important; padding-bottom: -250px !important;">
            </div>



            <div class="page_break"></div>




<!--            second page header start-->
<!--            second page header start-->
<!--            second page header start-->
<!--            second page header start-->
            <div class="company-logo">
                <div class="row">
                    <table class=".table-borderless">
                        <tbody>
                        <tr>
                            <td style="padding-left: 100%;">
                                <img src="http://localhost/epolicechecks/assets/images/logoNew2.png" style="width: 30%; margin-bottom: 10px;">
                            </td>

                            <td style="padding-left: 300px;">
                                <img src="http://localhost/epolicechecks/assets/images/paid.png" style="width: 20%; margin-bottom: 10px;">
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>







            <div class="section">
                <h4 style="font-size: 18px;"><b>Transactions</b></h4>
                <br/>
                <br/>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr style="font-size: 12px;">
                            <th>Client ID</th>
                            <th>Application Id</th>
                            <th>Date</th>
                            <th>Last Name</th>
                            <th>First Name</th>
                            <th>Services</th>
                            <th>Price</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td style="font-size: 10px;">1</td>
                            <td style="font-size: 10px;">September 05, 2020</td>
                            <td style="font-size: 10px;"><strong>F12507</strong></td>
                            <td style="font-size: 10px;">Williams</td>
                            <td style="font-size: 10px;">Justyne Rose</td>
                            <td style="font-size: 10px;">Provincial Employment </td>
                            <td style="font-size: 10px;">$50.00</td>
                        </tr>
                        <tr>
                            <td style="font-size: 10px;">1</td>
                            <td style="font-size: 10px;">September 05, 2020</td>
                            <td style="font-size: 10px;"><strong>F12507</strong></td>
                            <td style="font-size: 10px;">Williams</td>
                            <td style="font-size: 10px;">Justyne Rose</td>
                            <td style="font-size: 10px;">Provincial Employment </td>
                            <td style="font-size: 10px;">$50.00</td>
                        </tr>

                        <tr>
                            <td style="font-size: 10px;">1</td>
                            <td style="font-size: 10px;">September 05, 2020</td>
                            <td style="font-size: 10px;"><strong>F12507</strong></td>
                            <td style="font-size: 10px;">Williams</td>
                            <td style="font-size: 10px;">Justyne Rose</td>
                            <td style="font-size: 10px;">Provincial Employment </td>
                            <td style="font-size: 10px;">$50.00</td>
                        </tr>

                        <tr>
                            <td style="font-size: 10px;">1</td>
                            <td style="font-size: 10px;">September 05, 2020</td>
                            <td style="font-size: 10px;"><strong>F12507</strong></td>
                            <td style="font-size: 10px;">Williams</td>
                            <td style="font-size: 10px;">Justyne Rose</td>
                            <td style="font-size: 10px;">Provincial Employment </td>
                            <td style="font-size: 10px;">$50.00</td>
                        </tr>

                        <tr>
                            <td style="font-size: 10px;">1</td>
                            <td style="font-size: 10px;">September 05, 2020</td>
                            <td style="font-size: 10px;"><strong>F12507</strong></td>
                            <td style="font-size: 10px;">Williams</td>
                            <td style="font-size: 10px;">Justyne Rose</td>
                            <td style="font-size: 10px;">Provincial Employment </td>
                            <td style="font-size: 10px;">$50.00</td>
                        </tr>

                        <tr>
                            <td style="font-size: 10px;">1</td>
                            <td style="font-size: 10px;">September 05, 2020</td>
                            <td style="font-size: 10px;"><strong>F12507</strong></td>
                            <td style="font-size: 10px;">Williams</td>
                            <td style="font-size: 10px;">Justyne Rose</td>
                            <td style="font-size: 10px;">Provincial Employment </td>
                            <td style="font-size: 10px;">$50.00</td>
                        </tr>


                        </tbody>
                    </table>
                </div>
            </div>


            <br/>
            <br/><br/><br/>
            <br/>
            <br/><br/>
            <br/><br/>
            <br/><br/>
            <br/><br/>
            <br/><br/>
            <br/><br/>
            <br/>
            <br/>
            <br/>

        </div>




    </div>
</div>


<br/><br/><br/>
<br/><br/><br/>
<br/><br/><br/>
<br/><br/>
<!--<br/>-->
<!--<br/><br/><br/>-->


<div style="margin-bottom: -250px !important; padding-bottom: -250px !important; width: 110%;  margin-left: -22px !important; padding-left: -22px !important;">
                    <img src="http://localhost/epolicechecks/assets/images/footer_2.png" style="width: 102%; margin-bottom: -250px; !important; padding-bottom: -250px !important;">
</div>










<script>
    var prtContent = document.getElementById("print_it");
    var WinPrint = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
    WinPrint.document.write(prtContent.innerHTML);
    WinPrint.document.close();
    WinPrint.focus();
    WinPrint.print();
    WinPrint.close();
</script>














