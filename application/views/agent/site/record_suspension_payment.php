<title><?= $page_title ?></title>
<link href="<?= base_url('site-assets') ?>/css/style.css" rel="stylesheet"/>
<link href="<?= base_url('site-assets') ?>/css/bootstrap.css" rel="stylesheet"/>
<script src="<?= base_url('site-assets') ?>/js/bootstrap.js" type="text/javascript"></script>
<script src="<?= base_url('site-assets') ?>/js/jquery-3.4.1.min.js" type="text/javascript"></script>
<script src="<?= base_url('site-assets') ?>/js/jquery.card.js" type="text/javascript"></script>
<style type="text/css">
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        /* display: none; <- Crashes Chrome on hover */
        -webkit-appearance: none;
        margin: 0; /* <-- Apparently some margin are still there even though it's hidden */
    }

    input[type=number] {
        -moz-appearance:textfield; /* Firefox */
    }
    .dropbtn {
        background-color: lightsteelblue;
        color: slategray;
        font-size: 14px;
        min-width: 200px;
        text-align: left;
    }

    .dropdown {
        position: relative;
        display: inline-block;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        background-color: lightsteelblue;
        min-width: 200px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1;
    }

    .dropdown-content a {
        color: slategray;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }

    .dropdown-content a:hover {
        background-color: darkorange;
        color: white;
    }

    .dropdown:hover .dropdown-content {display: block;}

    .dropdown:hover .dropbtn {
        background-color: darkorange;
        color: white;
        cursor: pointer;
    }

    /*Sidebar Starts Here */
    .sidebar {
        margin: 0;
        padding: 0;
        width: 200px;
        background-color: lightsteelblue;
        position: fixed;
        height: 100%;
        overflow: auto;
    }

    .sidebar a {
        display: block;
        color: slategray;
        padding: 16px;
        text-decoration: none;
    }

    .sidebar a.active {
        background-color: darkblue;
        color: white;
    }

    .sidebar a:hover:not(.active) {
        background-color: darkorange;
        color: white;
    }

    div.content {
        margin-left: 200px;
        padding: 1px 16px;
        height: 1000px;
    }

    @media screen and (max-width: 700px) {
        .sidebar {
            width: 100%;
            height: auto;
            position: relative;
        }
        .sidebar a {float: left;}
        div.content {margin-left: 0;}
    }

    @media screen and (max-width: 400px) {
        .sidebar a {
            text-align: center;
            float: none;
        }
    }
    /*Sidebar Ends Here */

    @import url(http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700);
    .input{
        margin-bottom: 10px;
    }
    .board{
        width: 75%;
        margin: 60px auto;
        height: 500px;
        background: #fff;
        /*box-shadow: 10px 10px #ccc,-10px 20px #ddd;*/
    }
    .board .nav-tabs {
        position: relative;
        /* border-bottom: 0; */
        /* width: 80%; */
        margin: 40px auto;
        margin-bottom: 0;
        box-sizing: border-box;
    }
    .board > div.board-inner{
        background: #fafafa url(http://subtlepatterns.com/patterns/geometry2.png);
        background-size: 30%;
    }
    p.narrow{
        width: 60%;
        margin: 10px auto;
    }
    .liner{
        height: 2px;
        background: #ddd;
        position: absolute;
        width: 80%;
        margin: 0 auto;
        left: 0;
        right: 0;
        top: 50%;
        z-index: 1;
    }
    .nav-tabs > li.active > a, .nav-tabs > li.active > a:hover, .nav-tabs > li.active > a:focus {
        color: #555555;
        cursor: default;
        /* background-color: #ffffff; */
        border: 0;
        border-bottom-color: transparent;
    }
    span.round-tabs{
        width: 70px;
        height: 70px;
        line-height: 70px;
        display: inline-block;
        border-radius: 100px;
        background: white;
        z-index: 2;
        position: absolute;
        left: 0;
        text-align: center;
        font-size: 25px;
    }
    span.round-tabs.one{
        color: rgb(34, 194, 34);border: 2px solid rgb(34, 194, 34);
    }
    li.active span.round-tabs.one{
        background: #fff !important;
        border: 2px solid #ddd;
        color: rgb(34, 194, 34);
    }
    span.round-tabs.two{
        color: #febe29;border: 2px solid #febe29;
    }
    li.active span.round-tabs.two{
        background: #fff !important;
        border: 2px solid #ddd;
        color: #febe29;
    }
    span.round-tabs.three{
        color: #3e5e9a;border: 2px solid #3e5e9a;
    }
    li.active span.round-tabs.three{
        background: #fff !important;
        border: 2px solid #ddd;
        color: #3e5e9a;
    }
    span.round-tabs.four{
        color: #f1685e;border: 2px solid #f1685e;
    }
    li.active span.round-tabs.four{
        background: #fff !important;
        border: 2px solid #ddd;
        color: #f1685e;
    }
    span.round-tabs.five{
        color: #999;border: 2px solid #999;
    }
    li.active span.round-tabs.five{
        background: #fff !important;
        border: 2px solid #ddd;
        color: #999;
    }
    .nav-tabs > li.active > a span.round-tabs{
        background: #fafafa;
    }
    .nav-tabs > li {
        width: 20%;
    }
    /*li.active:before {
        content: " ";
        position: absolute;
        left: 45%;
        opacity:0;
        margin: 0 auto;
        bottom: -2px;
        border: 10px solid transparent;
        border-bottom-color: #fff;
        z-index: 1;
        transition:0.2s ease-in-out;
    }*/
    .nav-tabs > li:after {
        content: " ";
        position: absolute;
        left: 45%;
        opacity:0;
        margin: 0 auto;
        bottom: 0px;
        border: 5px solid transparent;
        border-bottom-color: #ddd;
        transition:0.1s ease-in-out;

    }
    .nav-tabs > li.active:after {
        content: " ";
        position: absolute;
        left: 45%;
        opacity:1;
        margin: 0 auto;
        bottom: 0px;
        border: 10px solid transparent;
        border-bottom-color: #ddd;

    }
    .nav-tabs > li a{
        width: 70px;
        height: 70px;
        margin: 20px auto;
        border-radius: 100%;
        padding: 0;
    }
    .nav-tabs > li a:hover{
        background: transparent;
    }
    .tab-content{
    }
    .tab-pane{
        position: relative;
        padding-top: 50px;
    }
    .tab-content .head{
        font-family: 'Roboto Condensed', sans-serif;
        font-size: 25px;
        text-transform: uppercase;
        padding-bottom: 10px;
    }
    .btn-outline-rounded{
        padding: 10px 40px;
        margin: 20px 0;
        border: 2px solid transparent;
        border-radius: 25px;
    }
    .btn.green{
        background-color:#5cb85c;
        /*border: 2px solid #5cb85c;*/
        color: #ffffff;
    }

    span.round-tabs {
        font-size:16px;
        width: 50px;
        height: 50px;
        line-height: 50px;
    }
    .tab-content .head{
        font-size:20px;
    }
    .nav-tabs > li a {
        width: 50px;
        height: 50px;
        line-height:50px;
    }
    .nav-tabs > li.active:after {
        content: " ";
        position: absolute;
        left: 35%;
    }
    .btn-outline-rounded {
        padding:12px 20px;
    }
    .order{
        height:30px;
        background-color:#04376E;
        width:133px;
        color:white;
        padding:5px;
        border:1px solid black;
        border-radius:5px;
    }
    .header{
        background-image: linear-gradient(#fff, #F7F7F7);
        border-radius:10px;
        width:100%;
        height:auto;
        padding:10px;
        font-size:15px;
        border:2px solid #E2E2E2;

    }
    body{
        background-image: linear-gradient(#DADADA 10%, #fff 90%);
    }
    .cardd{
        background-color: white;
        border-radius: 10px; padding: 20px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }
    .jp-card-container{
        margin-bottom: 20px;
        transform: none !important;
    }
</style>

<body>

    <div class="container">

        <br/>
        <form action="<?= base_url()?>agent/application/record-suspension/payment" method="post" class="form-horizontal">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <h3> Enter Payment Card Details: </h3>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <img src="<?= base_url('site-assets') ?>/images/mastercard.png" alt="visa_logo" height="40" width="70" class="img-fluid"/>
                    <img src="<?= base_url('site-assets') ?>/images/Visa_Logo.png" alt="visa_logo" height="20" width="70" class="img-fluid"/>
                    <img src="<?= base_url('site-assets') ?>/images/am_express.png" alt="american_express_logo" height="70" width="75" class="img-fluid"/>
                </div>
            </div>

            <br /> <br /> <br />


            <div class="row">
                <!--                <div  class="col-lg-2 col-md-2 col-sm-2 col-xs-12" style="margin-top: 120px;">
                
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <b> Card Number: </b>
                
                                    </div> <br />
                
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 15px;">
                                        <b> Card Validity Date: </b>
                                    </div>
                                    <br />
                
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 25px;">
                                        <b> Card Holder Name: </b>
                                    </div>
                
                                </div>-->


                <div   class=" col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="cardd card-wrapper">
                        <div class="row card-shape">
                            
                        </div>

                        <!--<div align="right" style="color: gray; margin-top: -15px;"> <i> Front side </i> </div> <br />-->
                        <!--                        <div>
                                                    <img src="<?= base_url('site-assets') ?>/images/sim.png" alt="sim" height="60" width="90" style="opacity: 0.5; margin-left: 5px;"/>
                                                </div>-->
                        <div class="">
                            <div class="form-group row">
                                <label class="control-label col-sm-4">Card Number:</label>
                                <div class="col-sm-8">
                                    <input type="text"  required="" class="form-control" name="card_number_1" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-sm-4">Valid Through:</label>
                                <div class="col-sm-8">
                                    <input type="text" required="" class="form-control" name="card_expiry">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-sm-4">Card Holder Name:</label>
                                <div class="col-sm-8">
                                    <input type="text" name="card_holder_name" id="cardholdername" required="" class="form-control input"/>
                                    <div class="" style="color: gray; margin-left: 1px;"> as specified/indicated in the card </div>
                                </div>
                            </div>
                            <!--<div class="row" style="color: gray; margin-left: 1px;"> as specified/indicated in the card </div>-->
                            <div class="form-group row">
                                <label class="control-label col-sm-4"> CVV2/CVC2 Code:</label>
                                <div class="col-sm-8">
                                    <input type="text" name="card_cvc" id="cvc" class="form-control input" required="" class="form-control input"/>
                                </div>
                            </div>
                            <!--<div class="row" style="color: gray; margin-left: 1px;"> as specified/indicated in the card </div>-->
<!--                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                <input type="number" name="card_number_1" maxlength="4" required="" class="form-control input" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"/>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                <input type="number" name="card_number_2" maxlength="4" required="" class="form-control input" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"/>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                <input type="number" name="card_number_3" maxlength="4" required="" class="form-control input" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"/>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                <input type="number" name="card_number_4" maxlength="4" required="" class="form-control input" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"/>
                            </div>-->
                        </div>
<!--                        <div class="row">
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6" align="right" style="color: gray;">
                                <p style="line-height: 1;">VALID
                                    THRU</p>
                            </div>
                            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-6">
                                <select class="form-control input" required="" name="card_expiry_month">
                                    <option value="">Mon</option>
                                    <option value="01"> 01 </option>
                                    <option value="02"> 02 </option>
                                    <option value="03"> 03 </option>
                                    <option value="04"> 04 </option>
                                    <option value="05"> 05 </option>
                                    <option value="06"> 06 </option>
                                    <option value="07"> 07 </option>
                                    <option value="08"> 08 </option>
                                    <option value="09"> 09 </option>
                                    <option value="10"> 10 </option>
                                    <option value="11"> 11 </option>
                                    <option value="12"> 12 </option>
                                </select>
                            </div>
                            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-6">
                                <select class="form-control input" required="" name="card_expiry_year">
                                    <option value="">Year</option>
                                    <?php
                                    $year = date('y');
                                    for ($i = 0; $i < 15; $i++) {
                                        ?>
                                        <option value="<?= $y = $year++ ?>"> <?= $y ?> </option>
                                    <?php } ?>
                                </select>
                            </div>

                        </div>-->

<!--                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <input type="text" name="card_holder_name" id="cardholdername" required="" class="form-control input"/>
                            </div>
                        </div>-->
                        <!--<div class="row" style="color: gray; margin-left: 1px;"> as specified/indicated in the card </div>-->
                    </div>

                    <br>

                </div>

                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                </div>



                <div   class=" col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">Order Summary</div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
                                    Recipient:
                                </div>
                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-6">
                                    EPOLICE
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
                                    Order No.:
                                </div>
                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-6">
                                    <?= $application_id ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
                                    Payment Amount:
                                </div>
                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-6">
                                    <?= $grand_total ?> CAD
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div> 
            <br />

            <div class="row">


<!--                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">



                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:80%;">
                        <b> CVV2/CVC2 code: </b>
                    </div>

                </div>-->
<!--
                <div   class=" col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="cardd">
                        <div align="right" style="color: gray; margin-top: -15px;"> <i> Reverse side </i> </div> <br />

                        <div style="border: 20px solid lightgray;"> </div>
                        <br />
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" align="right" style="margin-top: 0px; margin-top: 5px;">
                                <b style="color: lightgray;"> CVV2/CVC2 </b>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">

                                <img src="<?= base_url('site-assets') ?>/images/Capture1.PNG" width="100%" height="30px" />

                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                <input type="number" name="card_cvc" id="cvc" class="form-control input" maxlength="4" required="" class="form-control input" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"/>
                            </div>
                        </div> 

                    </div> <br /> <br />
                </div>-->




            </div>



            <div class="row">
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12" style="margin-top: 10px;" >


                    <b> Email: </b>


                    <br/>
                    <br/>
                    <br/>


                    <b> Telephone: </b>
                </div>
                <div class=" col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <input type="text" name="card_holder_email" required="" class="form-control input"/>
                    <br/>
                    <input type="text" name="card_holder_phone" required="" class="form-control input"/>


                </div>

                <input name="application_id" value="<?= $application_id ?>" type="hidden">
                <input name="client_id" value="<?= $client_id ?>" type="hidden">
            </div>

            <br />

            <div class="row">
                <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
                    <span> Details of your payment card are used only during the transaction and transferred to Visa/MasterCard via secure channel.  </span>
                </div>
            </div> <br />

            <p align="justify" style="color: black; font-size: 12px;"><i><b>Declaration and Disclaimer:</b> I, as the credit card holder, authorize Global Avenues consulting Inc., to charge my credit card number of amount indicated in the grand total. I have read, understood, and accept all provisions contained on this form, including the terms and conditions stated in the service agreement. Once processing starts, I will not be eligible for a refund of my payment, even if my application is refused.</i>
            </p>

            <div class="custom-control custom-checkbox mb-3">
                <input type="checkbox" required="" name="agree" value="1">
                <label style="color: black; font-size: 13px;"><i>I have read and understood this declaration and
                        disclaimer <b style="color: #ca2d1e;"> * </b> </i>
                </label>
            </div> <br />

            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 text-center">
                <button class="btn btn-success" type="submit"> Submit </button>
            </div>


        </form>
    </div>
    <br />

    <script>
        var card = new Card({
            // a selector or DOM element for the form where users will
            // be entering their information
            form: 'form', // *required*
            // a selector or DOM element for the container
            // where you want the card to appear
            container: '.card-shape', // *required*

            formSelectors: {
                numberInput: 'input[name="card_number_1"]', // optional — default input[name="number"]
                expiryInput: 'input[name="card_expiry"]', // optional — default input[name="expiry"]
                cvcInput: 'input#cvc', // optional — default input[name="cvc"]
                nameInput: 'input#cardholdername' // optional - defaults input[name="name"]
            },

            width: 200, // optional — default 350px
            formatting: true, // optional - default true

            // Strings for translation - optional
            messages: {
                validDate: 'valid\ndate', // optional - default 'valid\nthru'
                monthYear: 'mm/yy', // optional - default 'month/year'
            },

            // Default placeholders for rendered fields - optional
            placeholders: {
                number: '•••• •••• •••• ••••',
                name: 'Full Name',
                expiry: '••/••',
                cvc: '•••'
            },

//            masks: {
//                cardNumber: '•' // optional - mask card number
//            },

            // if true, will log helpful messages for setting up Card
            debug: false // optional - default false
        });
    </script>