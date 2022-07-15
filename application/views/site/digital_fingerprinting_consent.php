<link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
<style type="text/css">
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

    /* Pills Stylesheet */
    @import url(http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700);
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
    @media( max-width : 585px )
    .board {
        width: 90%;
        height:auto !important;
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
    .button{
        color: #1F497D;
        background-color: #FBD4B4;
        border-color: #FABD8B;
    }
    .input{
        margin-bottom: 10px;
    }
</style>
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>


<form action="<?= base_url() ?>digital-fingerprinting/consent" method="post">
    <section style="background:#efefe9;">

        <div class="container">

            <div class="row">
                <div class="board">
                    <div class="board-inner">
                        <ul class="nav nav-tabs" id="myTab">
                            <div class="liner"></div>
                            <li class="active">
                                <a href="#step1" data-toggle="tab" title="Step 1">
                                    <span class="round-tabs one">
                                        <b> 1 </b>
                                    </span> 
                                </a>
                            </li>
                            <li>
                                <a href="#step2" data-toggle="tab" title="Step 2">
                                    <span class="round-tabs two">
                                        <b> 2 </b>
                                    </span> 
                                </a>
                            </li>

                            <li>
                                <a href="#final" data-toggle="tab" title="Completed">
                                    <span class="round-tabs five">
                                        <i class="glyphicon glyphicon-ok"></i>
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="step1">
                            <div class="row" style="padding: 15px;" align="right">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <b> Date of Request </b><b> : </b> <b id="date" style="color: black;"></b>
                                </div> <br /> <br />
                            </div>

                            <div class="row" style="padding-left: 15px; padding-right: 15px; background-color: #e0eeee; margin-right: 15px; margin-left: 15px;">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" align="center">
                                    <b style="color: #ca2d1e; font-family: calibri; font-size: 20px; "> <u> DIGITAL FINGERPRINTING VOUCHER </u> </b>
                                </div>
                            </div> <br />

                            <div class="row" style="padding-left: 15px; padding-right: 15px; background-color: #e0eeee; margin-right: 15px; margin-left: 15px;">
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                    <button class="btn btn-primary button"> <b> STEP 1 </b> </button>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10" style="padding-top: 6px;">
                                    Contact the authorized fingerprinting agency location to book an appointment.
                                </div>
                            </div> <br />

                            <div class="row" style="padding-left: 15px; padding-right: 15px; background-color: #e0eeee; margin-right: 15px; margin-left: 15px;">
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                    <button class="btn btn-primary button"> <b> STEP 2 </b> </button>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10" style="padding-top: 6px;">
                                    Print and Sign this form.
                                </div>
                            </div> <br />

                            <div class="row" style="padding-left: 15px; padding-right: 15px; background-color: #e0eeee; margin-right: 15px; margin-left: 15px;">
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" style="padding-top: 23px;">
                                    <button class="btn btn-primary button"> <b> STEP 3 </b> </button>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10" align="justify">
                                    Bring this signed form, a letter indicating the reason for fingerprinting such as employment letter/immigration letter/etc. (if applicable), along with 2
                                    pieces of government issued identification. One primary piece of identification must include a photo, along with a Secondary identification that includes a
                                    signature.
                                </div>
                            </div> <br />

                            <div class="row" style="background-color: #9ac0cd; color: black; padding-left: 15px; padding-right: 15px;
                                 margin-right: 15px; margin-left: 15px;">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" align="center">
                                    <b > Acceptable Identifications </b>
                                </div>
                            </div>

                            <div class="row" style="padding-left: 15px; padding-right: 15px; background-color: #e0eeee; margin-right: 15px; margin-left: 15px;">
                                <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                                    <form>
                                        <b style="color: #C00000;"> &check; </b> &nbsp; Driver's License <br />
                                        <b style="color: #C00000;"> &check; </b> &nbsp; Passport <br />
                                        <b style="color: #C00000;"> &check; </b> &nbsp; Canadian Citizenship Card <br />
                                        <b style="color: #C00000;"> &check; </b> &nbsp; Permanent Resident Card <br />
                                        <b style="color: #C00000;"> &check; </b> &nbsp; Student Identity Card <br />
                                    </form>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                                    <div class="col-border-padding">
                                        <form>
                                            <b style="color: #C00000;"> &check; </b> &nbsp; Federal, Provincial or Municipal Identification Card <br />
                                            <b style="color: #C00000;"> &check; </b> &nbsp; Firearms Acquisition Certificate (FAC) <br />
                                            <b style="color: #C00000;"> &check; </b> &nbsp; Military Family Identification Card (MFID) <br />
                                            <b style="color: #C00000;"> &check; </b> &nbsp; Certificate of Indian Status <br />
                                            <b style="color: #C00000;"> &check; </b> &nbsp; Canadian Immigration Documents <br />
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="row" style="background-color: palegreen; color: black; padding-left: 15px; padding-right: 15px;
                                 margin-right: 15px; margin-left: 15px;">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" align="justify">
                                    <b style="font-size: 16px;"> Note: </b> Health cards (Issued by Canadian Province or Territory), Immigration documents and Social Insurance Number (SIN)
                                    card are not acceptable as primary piece of identification but may be submitted as a secondary piece of Identification.
                                </div>
                            </div> <br />
                            <div class="row" style="margin-bottom: 15px; margin-right: 5px;">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" align="right">
                                    <a href="#step2" data-toggle="tab">
                                        <button type="button" class="btn btn-success">
                                            Next
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div> 

                        <div class="tab-pane fade" id="step2">

                            <!--                   <div class="row" style="background-color:  #9ac0cd; color: black; padding-left: 15px; -->
                            <!--                      padding-right: 15px;-->
                            <!-- margin-right: 15px; margin-left: 15px;">-->
                            <!--	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" align="center">-->
                            <!--		<b> ACCEPTABLE IDENTIFICATIONS </b>-->
                            <!--	</div>-->
                            <!--</div> <br />-->
                            <!--<div class="row">-->
                            <!--    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">-->
                            <!--        <ul>-->
                            <!--            <li>Driver’s Licence</li>-->
                            <!--            <li>Passport</li>-->
                            <!--            <li>Canadian Citizenship Card</li>-->
                            <!--            <li>Permanent Resident Card</li>-->
                            <!--            <li>Student Identity Card</li>-->

                            <!--        </ul>-->
                            <!--    </div>-->
                            <!--    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">-->
                            <!--          <ul>-->
                            <!--            <li>Federal, Provincial or Municipal Identification Card</li>-->
                            <!--            <li>Firearms Acquisition Certificate (FAC)</li>-->
                            <!--            <li>Military Family Identification Card (MFID)</li>-->
                            <!--            <li>Certificate of Indian Status</li>-->
                            <!--            <li>Canadian Immigration Documents </li>-->

                            <!--        </ul>-->
                            <!--    </div>-->

                            <!--</div>-->
                            <!--<div class="row">-->
                            <!--    <p><b>Note:</b> Health cards (Issued by Canadian Province or Territory), Immigration documents and Social Insurance Number (SIN) card are not acceptable as primary piece of identification but may be submitted as a secondary piece of Identification</p>-->
                            <!--</div>-->

                            <div class="row" style="background-color:  #9ac0cd; color: black; padding-left: 15px; 
                                 padding-right: 15px;
                                 margin-right: 15px; margin-left: 15px;">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" align="center">
                                    <b> APPLICANT INFORMATION </b>
                                </div>
                            </div> <br />

                            <div class="row" style="padding-left: 15px; padding-right: 15px; background-color: #e0eeee; margin-right: 15px; margin-left: 15px;;
                                 margin-right: 15px; margin-left: 15px;">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <label> First Name: </label> 
                                    <input required="" type="text" name="consent_first_name"class="form-control input"/>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <label> Middle Name:  </label>
                                    <input type="text" name="consent_middle_name" class="form-control input"/>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <label> Last Name: </label> 
                                    <input required="" type="text" name="consent_last_name"class="form-control input"/>
                                </div>
                            </div>

                            <div class="row" style="padding-left: 15px; padding-right: 15px; background-color: #e0eeee; margin-right: 15px; margin-left: 15px;;
                                 margin-right: 15px; margin-left: 15px;">
                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                    <label> Maiden/Alias/Nickname: </label> 
                                    <input type="text" name="consent_nickname" class="form-control input"/>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 col-border">
                                    <div class="col-border-padding">
                                        <div>
                                            <label> Date of Birth: (DD/MM/YYYY) </label>
                                            <input required="" type="date" name="consent_dob" class="form-control input"/>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row" style="padding-left: 15px; padding-right: 15px; background-color: #e0eeee; margin-right: 15px; margin-left: 15px;;
                                 margin-right: 15px; margin-left: 15px;">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div>
                                        <label> Current Address: </label>
                                        <input required="" type="text" name="consent_current_address" class="form-control input"/>
                                    </div>
                                </div>
                            </div>

                            <div class="row" style="padding-left: 15px; padding-right: 15px; background-color: #e0eeee;
                                 margin-right: 15px; margin-left: 15px;">
                                <div class="col-lg-4  col-md-4  col-sm-4 col-xs-12">
                                    <label>Telephone:</label> 
                                    <input required="" type="number" name="consent_phone" class="form-control input"/>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <label>Cell:</label> 
                                    <input type="number" name="consent_cellphone" class="form-control input"/>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <label>Email:</label>
                                    <input required="" type="email" name="consent_email" class="form-control input"/>
                                </div>
                            </div>

                            <div class="row" style="padding-left: 15px; padding-right: 15px; background-color: #e0eeee;
                                 margin-right: 15px; margin-left: 15px;">
                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                    <div>
                                        <label> Fingerprinting Agency Address: </label>
                                        <input class="form-control input" required="" name="fingerprinting_agency_address" type="text"/>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 col-border">
                                    <div class="col-border-padding">
                                        <div>
                                            <label> Fingerprinting Agency Tel: </label>
                                            <input class="form-control" name="fingerprinting_agency_phone" required="" type="tel"/>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row" style="padding-left: 15px; padding-right: 15px; background-color: #e0eeee;
                                 margin-right: 15px; margin-left: 15px;">
                                <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                                    <div>
                                        <label> RCMP Application Type: </label>
                                        <input name="rcmp_type" required="" class="form-control input" type="text"/>
                                    </div>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7 col-border">
                                    <div class="col-border-padding">
                                        <div>
                                            <label> Send Result To: </label> <br />
                                            <input name="send_result" value="Home" required="" type="radio"/> Home &nbsp; &nbsp;
                                            <input type="radio" name="send_result" value="Third Party Name"/> Third Party Name: 
                                            <input type="text" name="send_third_party"  class="form-control" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row" style="padding-left: 15px; padding-right: 15px; background-color: #e0eeee;
                                 margin-right: 15px; margin-left: 15px;">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div>
                                        <label> Send Result to Address: </label>
                                        <input name="send_home_address" class="form-control input" type="text"/>
                                    </div>
                                </div>
                            </div> <br /> 
                            <div class="row" style="margin-bottom: 15px; margin-right: 5px;">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" align="right">
                                    <a href="#final" data-toggle="tab">
                                        <button type="button" class="btn btn-success">
                                            Next
                                        </button>
                                    </a>
                                </div>
                            </div> 
                        </div>

                        <div class="tab-pane fade" id="final">
                            <div class="text-center"> <i class="img-intro icon-checkmark-circle"></i> </div>

                            <div class="row" style="padding: 15px;  background-color: #e0eeee;
                                 margin-right: 15px; margin-left: 15px;">
                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                    <label> Applicant's Signature: </label><input name="consent_signature" required="" type="text" class="form-control"/>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                    <label> Date: </label> <input type="date" name="consent_date" required="" class="form-control"/>
                                </div>
                            </div>

                            <br/>
                            <label style="margin-left: 15px;"> FOR FINGERPRINTING AGENCY USE ONLY </label> <br />
                            <br/>
                            <div class="row" style="padding: 15px; background-color: #e0eeee;
                                 margin-right: 15px; margin-left: 15px;">
                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                    <label> Fingerprinting Agency Name: </label> <input readonly="" type="text" class="form-control"/>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                    <label> City: </label> <input type="city" readonly="" class="form-control"/>
                                </div>
                            </div> <br>

                            <div class="row" style="background-color: lightgray; color: black; padding: 15px; 
                                 margin-right: 15px; margin-left: 15px;">
                                <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                                    <label> Officer Name: </label> <input type="text" readonly class="form-control"/>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                    <label> Signature: </label> <input type="text" readonly class="form-control"/>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                    <label> Date: </label> <input type="date" readonly class="form-control"/>
                                </div>
                            </div>
                            <br/>
                            <label style="margin-left: 15px;"> FOR OFFICE USE ONLY </label> <br />
                            <br/>
                            <div class="row" style="padding: 15px; background-color: #e0eeee;
                                 margin-right: 15px; margin-left: 15px;">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                    <div>
                                        <label> Client ID: </label>
                                        <input class="form-control input" readonly type="text"/>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 col-border">
                                    <div class="col-border-padding">
                                        <div>
                                            <label> Agency ID: </label>
                                            <input class="form-control" readonly type="text"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 col-border">
                                    <div class="col-border-padding">	
                                        <div>
                                            <label> Officer: </label>
                                            <input class="form-control" readonly type="text"/>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row" style="padding: 15px; background-color: #e0eeee;
                                 margin-right: 15px; margin-left: 15px;">
                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                    <div>
                                        <label> Transaction Number: </label>
                                        <input class="form-control input" readonly type="text"/>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 col-border">
                                    <div class="col-border-padding">
                                        <div>
                                            <label> Date: </label>
                                            <input class="form-control" readonly type="text"/>
                                        </div>
                                    </div>
                                </div>
                            </div> <br />
                            <input type="hidden" name="application_id" value="<?= $application_id ?>">
                            <input type="hidden" name="client_id" value="<?= $client_id ?>">

                                <div class="clearfix"></div>
                                <div class="row" style="margin-bottom: 15px; margin-right: 5px;">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" align="right">
                                        <button type="submit" class="btn btn-success">
                                            Submit
                                        </button>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
</form>
<script type="text/javascript">
    $(
            function ()
            {
                $('a[title]').tooltip();
            });

    var d = new Date();
    document.getElementById("date").innerHTML = d.toDateString();

</script>
