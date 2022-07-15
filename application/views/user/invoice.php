<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<style>
    .TM-card {
        background-color: #edf0f5;
    }
    .TM-card {
        padding: 15px;
        border: 1px solid #d5dce5;
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
        border-bottom: 1px solid #012169;
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


</style>




<div class="row" id="print_it">



    <div class="col-lg-12" id="" style="">
        <div class="TM-card invoice" style="padding: 15px 30px; background-color: #edf0f5; border: 1px solid #d5dce5;  border-radius: 4px;">
            <div class="company-logo">
                <div class="row">
                    <div class="col-lg-10">
                        <img src="http://localhost/epolicechecks/assets/images/logoNew2.png" style="max-width: 25%; margin-left: 45%; margin-bottom: 10px;" alt="XMart Host" class="logo-light img-responsive">
                        </div>
                    <div class="col-lg-2">
                        <span class="invoice-status label label-danger" style="float: right; font-size: 30px;">PAID</span>

                    </div>
                    </div>

            </div>
            <div class="section">
                <div class="invoice-info" style="display: -ms-flexbox; display: -webkit-flex;display: flex;-ms-flex-direction: column;flex-direction: column; padding: 15px 0;border-top: 2px dotted #ddd;border-bottom: 2px dotted #ddd;">

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="invoice-title">
                        <span class="title"> <b> Client Id: </b> 14170  <br/>
<!--                        <span class="title"> <b>Receipt: </b>14170  <br/>-->
                        <span class="title"> <b>Receipt: </b>14170  <br/>

                            <strong>Invoice Date: </strong>
                            <span class="text-muted">Friday, September 3rd, 2021</span>

                            <br/>
                            <strong>Due Date: </strong>
                            <span class="text-muted">Sunday, October 3rd, 2021</span>
                        </span>
                    </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="invoice-date">
                        <div class="pull-right">
                            <div class="text-right">
                                <strong>Invoice for: </strong>
                                <address> ZeeTech<br> Zain Ul Abadin<br>
                                    House no. 15, Street no. 02, Zaman park sanda kalan Lahore<br>
                                    Pakistan
                                </address>
                            </div>

                        </div>
                    </div>
                        </div>
                </div>
            </div>
            </div>

            <div class="section">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>

                            <th width="49 %">Services</th>
                            <th width="17%">Quantity</th>
                            <th width="17%" class="">Price</th>
                            <th width="17%">Amount</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Name Based Application</td>
                            <td>3</td>
                            <td class="">CAD 2,670 </td>
                            <td class="">CAD 2,670 </td>
                        </tr>

                        <tr>
                            <td></td>
                            <td></td>
                            <td class=""><strong>GST</strong></td>
                            <td class="">5% </td>
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
                            <td class="">CAD 2,747 </td>
                        </tr>

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="section">
                <h4 style="font-size: 18px;"><b>Transactions</b></h4>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>
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
                            <tr class="total-row">
                                <td>1</td>
                                <td>September
                                    05, 2020</td>
                                <td><strong>F12507</strong></td>
                                <td>Williams</td>
                                <td>Justyne Rose</td>
                                <td>Provincial
                                    Employment </td>
                                <td>$50.00
                                </td>
                            </tr>
                            <tr class="total-row">
                                <td>2</td>
                                <td>September
                                    05, 2020</td>
                                <td><strong>F12507</strong></td>
                                <td>Williams</td>
                                <td>Justyne Rose</td>
                                <td>Provincial
                                    Employment </td>
                                <td>$50.00
                                </td>
                            </tr>
                            <tr class="total-row">
                                <td>3</td>
                                <td>September
                                    05, 2020</td>
                                <td><strong>F12507</strong></td>
                                <td>Williams</td>
                                <td>Justyne Rose</td>
                                <td>Provincial
                                    Employment </td>
                                <td>$50.00
                                </td>
                            </tr>
                            <tr class="total-row">
                                <td>4</td>
                                <td>September
                                    05, 2020</td>
                                <td><strong>F12507</strong></td>
                                <td>Williams</td>
                                <td>Justyne Rose</td>
                                <td>Provincial
                                    Employment </td>
                                <td>$50.00
                                </td>
                            </tr>
                            <tr class="total-row">
                                <td>5</td>
                                <td>September
                                    05, 2020</td>
                                <td><strong>F12507</strong></td>
                                <td>Williams</td>
                                <td>Justyne Rose</td>
                                <td>Provincial
                                    Employment </td>
                                <td>$50.00
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


        <div class="app-footer" style="padding:0px; margin-top: 0px;">
            <div class="row">
                <div class="col-sm-12">
                    <div id="gcwu-sft-in" style="line-height: 2.6; background-image: url(<?= base_url('assets') ?>/images/download.png);background-position: center top,left top,right top;background-repeat: no-repeat;background-color: transparent;">
                        <div id="gcwu-tctr">
                            <ul style="">
                                <li class="gcwu-tc" style="color: #EEEEEE;"> </li>
                                <li class="gcwu-tr" style="color: #EEEEEE;"></li>
                            </ul>
                        </div>
                    </div>
                    <p style="padding-top: 0 !important; text-align: center; float: none !important;">
                        Global Avenues Consulting Inc.  | 200-7404 King George Blvd., Surrey, BC V3W 1N6  |   Tel: 604-501-0800     Fax: 604-501-0848   |  www.gacgroup.ca
                    </p>
                </div>
            </div>
        </div>
    </div>

</div>


<script>
//    var prtContent = document.getElementById("print_it");
//    var WinPrint = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');

//    WinPrint.document.write('<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">');

//    var myStyle = '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">';

//    WinPrint.document.write(prtContent.innerHTML);
//    WinPrint.document.close();
//    WinPrint.focus();
//    WinPrint.print();
//    WinPrint.close();
</script>