


<meta name="viewport" content="width=device-width , initial-scale=1">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<link href="css/style.css" rel="stylesheet"/>
<link href="css/bootstrap.css" rel="stylesheet"/>
<link rel="stylesheet" type="text/css" href="stylepayments.css">
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

<style>
    .bs-example{
        margin: 20px;
    }
</style>
<script>
    $(document).ready(function(){
        $("#myTab li:eq(1) a").tab('show'); // show 2nd tab on page load
    });
</script>




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

    @import url(https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700);
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
        background: #fafafa url(https://subtlepatterns.com/patterns/geometry2.png);
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
        #submit-button{
            display: none;
        }

        /*style for the signature*/
        #canvasDiv{
            position: relative;
            border: 2px dashed grey;
            height:300px;
        }
        @media (min-width: 768px)
            .col-md-8 {
                flex: 0 0 41.666667% !important;
            }

            @media (min-width: 992px){
                .col-md-offset-2 {
                    margin-left: 0%;
                } }

            @media (min-width: 768px){
                .col-md-8 {
                    max-width: 29.666667%;
                } }

            .tab-pane {
                padding:20px;
            }
</style>




<style>

    <style>
    * {box-sizing: border-box}

    /* Set height of body and the document to 100% */
    body, html {
        height: 100%;
        margin: 0;
        font-family: Arial;
    }

    /* Style tab links */
    .tablink {
        background-color: #555;
        color: white;
        float: left;
        border: none;
        outline: none;
        cursor: pointer;
        padding: 14px 16px;
        font-size: 17px;
        width: 25%;
    }

    .tablink:hover {
        background-color: #777;
    }

    /* Style the tab content (and add height:100% for full page content) */
    .tabcontent {
        color: white;
        display: none;
        padding: 100px 20px;
        height: 100%;
    }

    h3{
        color: black;
    }

    p{
        color: black;
    }

    #canvasDiv {
        width: 300px;
    }

</style>
</head>

<body>
<section style="background:#efefe9;">
    <div class="container">
        <form action="http://localhost/epolicechecks/site/name_based_check_signature" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="board">
                    <div class="board-inner">
                        <ul class="nav nav-tabs" id="consentTabs">
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
                                <a href="#step3" data-toggle="tab" title="Step 3">
                                        <span class="round-tabs three">
                                            <b> 3 </b>
                                        </span>
                                </a>
                            </li>
                            <li>
                                <a href="#step4" data-toggle="tab" title="Step 4">
                                        <span class="round-tabs four">
                                            <b> 4 </b>
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

                            <div class="row" style="margin-top: -30px;">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                                    <br>
                                    <div class="text-center">
                                        <h5 class="card-header info-color white-text text-center py-4">
                                            <strong>Consent to Disclosureof Criminal Record and Personal Information Release</strong>
                                            <br>
                                            <br>
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" align="right">
                                                <b> Date of Request : </b> <b id="date" style="color: black;"></b>
                                            </div> <br />


                                        </h5>
                                    </div>

                                    <!--                                        <h3 style="color: #C00000; font-family: calibri;" align="center"> <b> <u>Consent to Disclosure-->
                                    <!--                                                    of Criminal Record and Personal Information Release  </u> </b> </h3>-->
                                </div>
                            </div>

                            <!--                                <div class="row" style="padding: 15px;" align="right">-->
                            <!--                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">-->
                            <!--                                        <b> Date of Request : </b> <b id="date" style="color: black;"></b>-->
                            <!--                                    </div> <br /> <br />-->
                            <!--                                </div>-->

                            <br>

                            <?php
//                            var_dump($filter_data); die();
                            ?>

                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">PERSONAL INFORMATION:</h4>
                                </div>


                                <!--                                <div class="row" style="margin-right: 15px; margin-left: 15px;">-->
                                <!--                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">-->
                                <!--                                        <h5 align="left"> <b> PERSONAL INFORMATION </b> </h5>-->
                                <!--                                    </div>-->
                                <!--                                </div>-->

                                <br>

                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <label> Last Name: </label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fas fa-pencil"></i> </span>
                                            <input required="" type="text" placeholder="Enter Your Last Name" value="abaidin"  name="consent_last_name"class="form-control input"/>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <label> First Name: </label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fas fa-pencil"></i> </span>
                                            <input required="" type="text" placeholder="Enter Your First Name" value="zain" name="consent_first_name"class="form-control input"/>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <label> Middle Name:  </label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fas fa-pencil"></i> </span>
                                            <input type="text" name="consent_middle_name" value="ul" placeholder="Enter Your Middle Name" class="form-control input"/>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <label> Maiden/Alias/Nickname: </label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fas fa-pencil"></i> </span>
                                            <input type="text" name="consent_nickname" value="zain" placeholder="Enter Your Maiden/Alias/Nickname" class="form-control input"/>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="padding-top: 25px;">
                                        <label> Gender:  &nbsp; &nbsp; </label>
                                        <label> <input required="" type="radio" value="Male" name="consent_gender" checked/>  Male </label> &nbsp; &nbsp;
                                        <label> <input required="" type="radio" value="Female" name="consent_gender"/> Female </label> &nbsp; &nbsp;
                                        <label> <input required="" type="radio" value="Unknown" name="consent_gender"/> Unknown </label> &nbsp; &nbsp;

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <label> Date of Birth: </label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fas fa-birthday-cake"></i> </span>
                                            <input required="" type="text" placeholder="Enter Your Date of Birth" value="10/11/2020" name="consent_dob" class="form-control input"/>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <label> Place of Birth: </label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fas fa-location"></i> </span>
                                            <input required="" type="text" name="consent_birth_place" value="Lahore" placeholder="City/Town, Province/State" class="form-control input"/>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <label> Country: </label>
                                        <select name="consent_country" required="" class="form-control input">
                                            <option selected=""> ---Select Your Country--- </option>
                                            <option> Australia </option>
                                            <option> Canada </option>
                                            <option> Italy </option>
                                            <option> Germany </option>
                                            <option selected> Pakistan </option>
                                            <option> England </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4  col-md-4  col-sm-4 col-xs-12">
                                        <label>Telephone:</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fas fa-phone"></i> </span>
                                            <input required="" type="number" value="03246337362" placeholder="Enter Your Telephone" name="consent_phone" class="form-control input"/>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <label>Cell:</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fas fa-mobile"></i> </span>
                                            <input type="number" value="03246337362" name="consent_cellphone" placeholder="Enter Your Cell" class="form-control input"/>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <label>Email:</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fas fa-envelope"></i> </span>
                                            <input required="" type="email" value="zainulabaidinz@gmail.com" placeholder="Enter Your Email" name="consent_email" class="form-control input"/>
                                        </div>
                                    </div>
                                </div><br />
                            </div>
                            <br />
                            <div class="row steptabbtn" style="margin-bottom: 15px; margin-right: 5px;">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" align="right">
                                    <a href="#step2" data-toggle="tab">
                                        <button type="button" class="btn btn-success" style="width: 20% !important;">
                                            Next
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>


                        <div class="tab-pane fade" id="step2">

                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">ADDRESS</h4>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <label>Current address:</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fas fa-envelope"></i> </span>
                                            <input required="" type="text" value="House no. 15, Street no. 02, Zaman park sanda kalan Lahore" placeholder="Enter Your Current address" name="consent_current_address" class="form-control input"/>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <label>City:</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fas fa-location"></i> </span>
                                            <input required="" type="text" value="Lahore" placeholder="Enter Your City" name="consent_current_city" class="form-control input"/>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <label>Province:</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fas fa-location"></i> </span>
                                            <input required="" type="text" value="punjab" placeholder="Enter Your Province" name="consent_current_state" class="form-control input"/>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <label>Postal Code:</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fas fa-map-pin"></i> </span>
                                            <input required="" type="text" value="54000" placeholder="Enter Your Postal Code" name="consent_current_post_code" class="form-control input"/>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <label>Previous Address, if less than 5 years: </label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fas fa-address-book"></i> </span>
                                            <input type="text" placeholder="Enter Your Previous Address" value="House no. 15, Street no. 02, Zaman park sanda kalan Lahore" name="consent_previous_address" class="form-control input"/>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <label>City:</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fas fa-map-pin"></i> </span>
                                            <input type="text" name="consent_previous_city" value="Lahore" placeholder="Enter Your City" class="form-control input"/>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <label>Province:</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fas fa-map-pin"></i> </span>
                                            <input type="text" name="consent_previous_state" value="Punjab" placeholder="Enter Your Province" class="form-control input"/>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <label>Postal Code:</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fas fa-map-pin"></i> </span>
                                            <input type="text" name="consent_previous_post_code" value="54000" placeholder="Enter Your Postal Code" class="form-control input"/>
                                        </div>
                                    </div>
                                </div> <br/>

                            </div>
                            <br>
                            <div class="row steptabbtn">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" align="right">
                                    <a href="#step1" data-toggle="tab">
                                        <button type="button" class="btn btn-success" style="width: 20% !important">
                                            Back
                                        </button>
                                    </a>
                                    <a href="#step3" data-toggle="tab">
                                        <button type="button" class="btn btn-success" style="width: 20% !important">
                                            Next
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>




                        <div class="tab-pane fade" id="step3">
                            <div class="row"  style="padding-left: 15px; padding-right: 15px; background-color: #e0eeee; margin-right: 15px; margin-left: 15px;">
                                <div class="col-lg-12 col-md-12 col-xs-12">
                                    <br /> <label><b style="font-size: 18px;">REASON FOR REQUEST : </b> </label>
                                </div>
                            </div>
                            <div class="row" style="margin-right: 15px; margin-left: 15px; background-color: #e0eeee; padding-left: 15px; color: black;">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <input required="" type="radio" value="Employment / Pre-Employment" name="consent_reason" checked /> Employment / Pre-Employment
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                    <input required="" type="radio" value="Volunteer" name="consent_reason"/> Volunteer
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <input required="" type="radio" value="Other" name="consent_reason"/> Other :
                                    <input type="text" name="consent_reason_other" class=" input" size="10"/>
                                </div>
                            </div> <br />
                            <div class="row"  style="padding-left: 15px; padding-right: 15px; background-color: #e0eeee; margin-right: 15px; margin-left: 15px;">
                                <div class="col-lg-12 col-md-12 col-xs-12">
                                    <p style="color: black;  text-align:justify;" >
                                        I hereby authorize and consent to the full disclosure of information by the Police service , Global Avenues
                                        Consulting Inc. o/a GAC Screening Solutions, its associates,  to Employer and/or Individual:
                                    </p>
                                    <div class="row" style="background-color: #e0eeee; margin-right: 15px; margin-left: 15px;">
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                            <label> Organization Name: </label>
                                            <input required="" type="text" value="Zeetech" name="consent_organization" class="form-control input"/>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                            <label> Contact Person: </label>
                                            <input required="" value="asdf" type="text" name="consent_contact_name" class="form-control input"/>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                            <label> Contact Number: </label>
                                            <input required="" value="03246337362" type="text" name="consent_contact_phone" class="form-control input"/>
                                        </div>
                                    </div>
                                    <p style="color: black;  text-align:justify;" >	and to me. I hereby
                                        release and forever discharge the Police service board, police service and all their agents, officers and
                                        representatives from any and all liability, actions and claims for damages, costs, cause of actions,
                                        loss or injury of any nature which may be sustained by me as a result of the disclosure of information
                                        by the police services to Global Avenues Consulting Inc. o/a GAC Screening Solutions, its associates
                                        and employer. Accordingly, neither the Police Service nor the Board can guarantee that the information
                                        provided is complete or up to date. The search conducted by the Police Service will involve a query
                                        of the Identification Data Bank via the CPIC & PIP Systems. I am aware and I give consent that my
                                        record may be transmitted electronically or in a hard copy within Canada. I understand and acknowledge
                                        that my records and/or information located and/or disclosed by the police service may or may not
                                        pertain to me. Positive identification can only be confirmed through the comparison of fingerprints
                                        which must be submitted by me. I certify that to the best knowledge, the information I have provided
                                        in this form is complete and accurate in every respect. <br /> <strong> Privacy Policy Statement: </strong> The information on
                                        this form is required for the purpose of conducting criminal record check. The information collected
                                        and disclosed in this form is in compliance with all federal, provincial and municipal laws.
                                    </p>
                                </div>
                            </div>  <br />
                            <div class="row steptabbtn" style="margin-bottom: 15px; margin-right: 5px;">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" align="right">
                                    <a href="#step3" data-toggle="tab">
                                        <button type="button" class="btn btn-success">
                                            Back
                                        </button>
                                    </a>
                                    <a href="#step4" data-toggle="tab">
                                        <button type="button" class="btn btn-success">
                                            Next
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="step4">
                            <div class="row" style="font-family: calibri; padding-left: 15px; padding-right: 15px; background-color: #9ac0cd; margin-right: 15px; margin-left: 15px;">
                                <div class="col-lg-12 col-md-12">
                                    <label><b style="font-size: 16px;">DECLARATION OF CRIMINAL RECORD</b></label>
                                </div>
                            </div>

                            <div class="row" style="padding-left: 15px; padding-right: 15px; background-color: #e0eeee; margin-right: 15px; margin-left: 15px;">
                                <div class="col-lg-12 col-md-12">
                                    <b >Have you ever been convicted of a criminal offence for which a pardon has not been granted?
                                    </b>
                                    &nbsp; &nbsp;
                                    <br/>
                                    <input required="" type="radio" value="Yes" name="consent_criminal_offence" checked/> Yes &nbsp; &nbsp;
                                    <input required="" type="radio" value="No" name="consent_criminal_offence"/> No &nbsp; &nbsp;
                                </div>
                            </div>
                            <div class="row" style="padding-left: 15px; padding-right: 15px; background-color: #e0eeee; margin-right: 15px;
                                     margin-left: 15px;">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <p  style="color: black;" align="justify">
                                        If you answered YES, please provide the details of all criminal	convictions. Use separate form if the
                                        offence are more. Do not declare the following: Absolute
                                        discharges or Conditional discharges, pursuant to the Criminal code, section 730, Any charges for
                                        which you have received a pardon, pursuant to the Criminal Records Act, Any offences while you were a
                                        "young person" (12 years old but less than 18 years old), pursuant to the Youth Criminal Justice Act,
                                        Any charges for which you were not convicted, for example, charges that were withdrawn, dismissed,
                                        etc, Any provincial or municipal offences, Any charges dealt with outside of Canada.
                                    </p>
                                </div>
                            </div>
                            <div class="row" style="margin-left: 15px; margin-right: 15px;">
                                <table width="100%" id="offence-details">
                                    <tr style="background-color: #9ac0cd;">
                                        <td align="center"> <b> Offence </b> </td>
                                        <td align="center"> <b> Date of Sentence (YYYY/MM/DD) </b> </td>
                                        <td align="center"> <b> Court Location (City, Province) </b> </td>
                                    </tr>
                                    <tr>
                                        <td > <input type="text" name="consent_offence[]" class="form-control"/> </td>
                                        <td > <input type="text" name="consent_offence_date[]" class="form-control"/> </td>
                                        <td > <input type="text" name="consent_offence_court[]" class="form-control"/> </td>
                                    </tr>
                                    <tr>
                                        <td > <input type="text" name="consent_offence[]" class="form-control"/> </td>
                                        <td > <input type="text" name="consent_offence_date[]" class="form-control"/> </td>
                                        <td > <input type="text" name="consent_offence_court[]" class="form-control"/> </td>
                                    </tr>
                                    <tr>
                                        <td > <input type="text" name="consent_offence[]" class="form-control"/> </td>
                                        <td > <input type="text" name="consent_offence_date[]" class="form-control"/> </td>
                                        <td > <input type="text" name="consent_offence_court[]" class="form-control"/> </td>
                                    </tr>
                                </table>
                                <button type="button" id="add-offence" class="btn btn-default" aria-label="Plus Sign">
                                    <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>
                                </button>
                            </div>

                            <br />


                            <!--                                    <div class="row" style="padding-left: 15px; padding-right: 15px; background-color: #e0eeee; margin-right: 15px; margin-left: 15px;">-->
                            <!--                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">-->
                            <!--                                            <label style="color: black;">Applicant Signature:</label> &nbsp; <input style="color: black;" type="text" name="consent_signature"/>-->
                            <!--                                        </div>-->
                            <!--                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" align="right">-->
                            <!--                                            <label style="color: black;">Date</label><b> : </b> <b id="date2" style="color: black;"></b>-->
                            <!--                                        </div>-->
                            <!--                                    </div>-->
                            <!--                                <br />-->



                            <script>
                                function openPage(pageName,elmnt,color) {
                                    var i, tabcontent, tablinks;
                                    tabcontent = document.getElementsByClassName("tabcontent");
                                    for (i = 0; i < tabcontent.length; i++) {
                                        tabcontent[i].style.display = "none";
                                    }
                                    tablinks = document.getElementsByClassName("tablink");
                                    for (i = 0; i < tablinks.length; i++) {
                                        tablinks[i].style.backgroundColor = "";
                                    }
                                    document.getElementById(pageName).style.display = "block";
                                    elmnt.style.backgroundColor = color;
                                }

                                // Get the element with id="defaultOpen" and click on it
                                document.getElementById("defaultOpen").click();
                            </script>

                            <!--                                here is the tabbed code ends-->





                            <br />
                            <div class="row" style="margin-bottom: 15px; margin-right: 5px;">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" align="right">
                                    <input type="hidden" name="application_id" value="<?= $application_id ?>">
                                    <input type="hidden" name="client_id" value="<?= $client_id ?>">

                                    <a href="#step4" id="backAll" data-toggle="tab">
                                        <button type="button" class="btn btn-success">
                                            Back
                                        </button>
                                    </a>
                                    <a href="#final" id="tabAll" data-toggle="tab">
                                        <button type="button" class="btn btn-success">
                                            Next
                                        </button>
                                    </a>


                                    <a href="http://localhost/epolicechecks/site/name_based_check_signature">
                                        <button type="button" class="btn btn-success" id="submit-button">Next</button>
                                    </a>



                                </div>
                            </div>
                        </div>
                        <div class="budget"></div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>

<script type="text/javascript">
    $(function () {
        $('#backAll').click(function () {
            $('#tabAll').show();
            $('#submit-button').hide();
        });
        $('#add-offence').click(function () {
            $('#offence-details').append('<tr>'
                + '<td > <input type="text" name="consent_offence[]" class="form-control"/> </td>'
                + '<td > <input type="text" name="consent_offence_date[]" class="form-control"/> </td>'
                + '<td > <input type="text" name="consent_offence_court[]" class="form-control"/> </td>'
                + '</tr>');
        });
        $('a[title]').tooltip();
        $('#tabAll').on('click', function () {
            $(this).hide();
            $('#submit-button').show();
            $('.steptabbtn').hide();
            $('#tabAll').parent().addClass('active');
            $('.tab-pane').addClass('active in');
            $('[data-toggle="tab"]').parent().removeClass('active');
        });
    });
    var d = new Date();
    document.getElementById("date").innerHTML = d.toDateString();
    var d = new Date();
    document.getElementById("date2").innerHTML = d.toDateString();
    var d = new Date();
    document.getElementById("date3").innerHTML = d.toDateString();
    var d = new Date();
    document.getElementById("date4").innerHTML = d.toDateString();
    var d = new Date();
    document.getElementById("date5").innerHTML = d.toDateString();
</script>






