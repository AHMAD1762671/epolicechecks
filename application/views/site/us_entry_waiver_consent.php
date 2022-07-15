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
    #heading { background-color: #9ac0cd; color: black; }
    #mid { text-align: center; }
</style>
</head>

<body>

    <section style="background:#efefe9;">
        <div class="container">
            <form action="<?= base_url() ?>us-entry-waiver/consent" method="post">
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

                                <div class="row" style="padding: 15px;" align="right">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <b> Date of Request : </b> <b id="date" style="color: black;"></b>
                                    </div> <br /> <br />
                                </div>


                                <div class="row" style="background-color: #9ac0cd; margin-right: 15px; margin-left: 15px;">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <h5 align="left"> <b> PERSONAL INFORMATION </b> </h5>
                                    </div>
                                </div>
                                <div class="row" style="margin-left: 15px; margin-right: 15px;">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <label> Last Name: </label> <br />
                                        <input required="" type="text" name="consent_last_name"class="form-control input"/>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <label> First Name: </label> <br />
                                        <input required="" type="text" name="consent_first_name"class="form-control input"/>
                                    </div>
                                </div>

                                <div class="row" style="margin-left: 15px; margin-right: 15px;">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <label> Middle Name:  </label> <br />
                                        <input type="text" name="consent_middle_name" class="form-control input"/>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <label> Maiden/Alias/Nickname: </label> <br />
                                        <input type="text" name="consent_nickname" class="form-control input"/>
                                    </div>
                                </div> <br/>

                                <div class="row" style="background-color: #9ac0cd; margin-left: 15px; margin-right: 15px;">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <h4 align="left" style="font-size: 15px;"><b>DATE OF BIRTH</b></h4>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <h4 align="left" style="font-size: 15px;"><b>PLACE OF BIRTH</b></h4>
                                    </div>
                                </div>

                                <div class="row" style="margin-left: 15px; margin-right: 15px;">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <!-- <label>(YYYY/MM/DD)</label> --> <br />
                                        <input required="" type="date" name="consent_dob" class="form-control input"/>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <!-- <label>(City, State, Country)</label> --> <br />
                                        <input required="" type="text" name="consent_birth_place" placeholder="City/Town, Province/State" class="form-control input"/>
                                    </div>
                                </div> <br />
                                <!--
                                                                <div class="row" style="padding-left: 15px; padding-right: 15px; background-color: #e0eeee; margin-right: 15px; margin-left: 15px;">
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
                                                                </div><br /> <br />-->
                                <div class="row steptabbtn" style="margin-bottom: 15px; margin-right: 5px;">
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
                                <div class="row" style="background-color: #9ac0cd; margin-top: -30px; margin-left: 15px; margin-right: 15px;">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <h4 align="left" style="font-size: 15px;"><b>CURRENT ADDRESS</b></h4>
                                    </div>
                                </div>

                                <div class="row" style="margin-left: 15px; margin-right: 15px;">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <label>Street Address:</label> <br />
                                        <input required="" type="text" name="consent_current_address" class="form-control input"/>
                                    </div>
                                </div>

                                <div class="row" style="margin-left: 15px; margin-right: 15px;">
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                        <label>City:</label> <br />
                                        <input required="" type="text" name="consent_current_city" class="form-control input"/>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                        <label>Province:</label> <br />
                                        <input required="" type="text" name="consent_current_state" class="form-control input"/>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                        <label>Postal Code:</label> <br />
                                        <input required="" type="text" name="consent_current_post_code" class="form-control input"/>
                                    </div> 
                                </div> <br/>

                                <div class="row" style="background-color: #9ac0cd; margin-left: 15px; margin-right: 15px;" >
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <h4 align="left" style="font-size: 15px;"><b>CONTACT INFORMATION</b></h4>
                                    </div>
                                </div>

                                <div class="row" style="margin-left: 15px; margin-right: 15px;">
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                        <label>Telephone:</label> <br />
                                        <input required="" type="number" name="consent_phone" class="form-control input"/>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                        <label>Cell:</label> <br />
                                        <input type="number" name="consent_cellphone" class="form-control input"/>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                        <label>Email:</label> <br />
                                        <input required="" type="email" name="consent_email" class="form-control input"/>
                                    </div>
                                </div> <br/>
                                <div class="row steptabbtn" style="margin-bottom: 15px; margin-right: 5px;">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" align="right">
                                        <a href="#step1" data-toggle="tab">
                                            <button type="button" class="btn btn-success">
                                                Back
                                            </button>
                                        </a>
                                        <a href="#step3" data-toggle="tab">
                                            <button type="button" class="btn btn-success">
                                                Next
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="step3">
                                <div class="row" style="background-color: #9ac0cd; margin-top: -30px; margin-left: 15px; margin-right: 15px;">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <h4 align="left" style="font-size: 15px;"><b>DECLARATION OF CRIMINAL RECORD</b></h4>
                                    </div>
                                </div>

                                <div class="row" style="margin-left: 15px; margin-right: 15px;">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <p style="color: black;">
                                            Do you have a criminal record or ever been arrested in Canada?
                                            <input type="radio" required="" value="Yes" name="consent_arrested_canada"/> Yes
                                            <input type="radio" required="" value="No" name="consent_arrested_canada"/> No
                                        </p>   
                                        <p style="color: black;">	
                                            Do you have a criminal record or ever been arrested in United States of America?            
                                            <input type="radio" required="" value="Yes" name="consent_arrested_america"/> Yes
                                            <input type="radio" required="" value="No" name="consent_arrested_america"/> No
                                        </p>
                                        <p style="color: black;">	
                                            Do you have a criminal record or ever been arrested in a Foreign Country?                                    
                                            <input type="radio" required="" value="Yes" name="consent_arrested_foreign"/> Yes
                                            <input type="radio" required="" value="No" name="consent_arrested_foreign"/> No
                                        </p>
                                        <p style="color: black;">	
                                            Have you ever been refused entry at the USA port of entry/USA border?                                  
                                            <input type="radio" required="" value="Yes" name="consent_refused_border"/> Yes
                                            <input type="radio" required="" value="No" name="consent_refused_border"/> No &nbsp; &nbsp;
                                        </p>
                                        <p style="color: black;">
                                            If yes, when (MM-DD-YYYY)  <input type="date" name="consent_refused_border_date" class="form-control input"/>
                                        </p>
                                        <p style="color: black;">	
                                            Have you ever been deported from the United States of America?                                  
                                            <input type="radio" required="" value="Yes" name="consent_deported_america"/> Yes
                                            <input type="radio" required="" value="No" name="consent_deported_america"/> No &nbsp; &nbsp;
                                        </p>
                                        <p style="color: black;">
                                            If yes, when (MM-DD-YYYY) <input  type="date" name="consent_deported_america_date" class="form-control input"/>
                                        </p>
                                        <p style="color: black;">	
                                            Have you ever received a fine for your criminal charges in Canada, USA or foreign country?
                                            <input type="radio" required="" value="Yes" name="consent_criminal_country"/> Yes
                                            <input type="radio" required="" value="No" name="consent_criminal_country"/> No 
                                        </p>
                                    </div>
                                </div>
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
                                <div class="row" style="margin-top: -30px; margin-left: 15px; margin-right: 15px;">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <p style="color: black;">	
                                            Have you ever been convicted of a criminal offence for which a pardon has not
                                            been granted?          
                                            <input type="radio" required="" value="Yes" name="consent_criminal_offence"/> Yes
                                            <input type="radio" required="" value="No" name="consent_criminal_offence"/> No 
                                        </p>
                                    </div>
                                </div><br>
                                <div class="row" style="margin-top: -30px; margin-left: 15px; margin-right: 15px;">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <p style="color: black;">
                                            If you answered YES, please provide the details of all criminal convictions.
                                        </p>
                                    </div>
                                </div>
                                <div class="row" style="margin-left: 15px; margin-right: 15px;">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <table  width="100%" style="margin-top: 5px;">
                                            <tr id="heading">
                                                <th id="mid">Offence</th>
                                                <th id="mid">Date of Sentence(MM/DD/YYYY)</th>
                                                <th id="mid">City, Country</th>
                                                <th id="mid">Type of Fine/Sentence?</th>
                                                <th id="mid">Fine Paid/Sentence completed?</th>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="text" class="form-control" name="consent_offence[]" />
                                                </td>
                                                <td>
                                                    <input type="date" name="consent_offence_date[]" class="form-control"/>
                                                </td>
                                                <td>
                                                    <input type="text" name="consent_offence_court[]" class="form-control"/>
                                                </td>
                                                <td>
                                                    <input type="text" name="consent_fine[]" class="form-control"/>
                                                </td>
                                                <td align="center"> 
                                                    <input type="radio" value="Yes" name="consent_paid[0]"/> Yes
                                                    <input type="radio" value="No" name="consent_paid[0]"/> No 
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="text" class="form-control" name="consent_offence[]" />
                                                </td>
                                                <td>
                                                    <input type="date" name="consent_offence_date[]" class="form-control"/>
                                                </td>
                                                <td>
                                                    <input type="text" name="consent_offence_court[]" class="form-control"/>
                                                </td>
                                                <td>
                                                    <input type="text" name="consent_fine[]" class="form-control"/>
                                                </td>
                                                <td align="center"> 
                                                    <input type="radio" value="Yes" name="consent_paid[1]"/> Yes
                                                    <input type="radio" value="No" name="consent_paid[1]"/> No 
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="text" class="form-control" name="consent_offence[]" />
                                                </td>
                                                <td>
                                                    <input type="date" name="consent_offence_date[]" class="form-control"/>
                                                </td>
                                                <td>
                                                    <input type="text" name="consent_offence_court[]" class="form-control"/>
                                                </td>
                                                <td>
                                                    <input type="text" name="consent_fine[]" class="form-control"/>
                                                </td>
                                                <td align="center"> 
                                                    <input type="radio" value="Yes" name="consent_paid[2]"/> Yes
                                                    <input type="radio" value="No" name="consent_paid[2]"/> No 
                                                </td>
                                            </tr>
                                        </table> <br/>
                                    </div>
                                </div>

                                <br />
                                <div class="row" style="margin-left: 15px; margin-right: 15px;">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <h4 align="left" style="font-size: 15px; background-color: #9ac0cd;"><b>COMMENTS</b></h4>
                                        <textarea class="form-control" required="" name="consent_comments" rows="5" id="comment"></textarea>
                                    </div>
                                </div> <br />
                                <div class="row steptabbtn" style="margin-bottom: 15px; margin-right: 10px;">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" align="right">
                                        <a href="#step4" data-toggle="tab">
                                            <button type="button" class="btn btn-success">
                                                Back
                                            </button>
                                        </a>
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
                                <h4 style="color: #ca2d1e; margin-top: -30px; margin-left: 15px; margin-right: 15px;" align="center"> <u> <b> TERMS AND CONDITIONS </b> </u> </h4> <br /> 

                                <p style="color: black; margin-left: 15px; margin-right: 15px;" align="justify">
                                    I authorized Global Avenues Consulting Inc.(GAC) to act on my behalf of obtaining Record Suspension and/or File destruction and or/ File purge and/or U.S entry waiver from Royal Canadian Mounted Police, regional & local police services and/or USA department of homeland security (DHS). GAC is hereby authorized to act on my behalf for the purpose of any above stated application(s). GAC will only assist in the file preparation, collecting required documents, postal handling and submission of any above stated application(s). 
                                </p>
                                <p style="color: black; margin-left: 15px; margin-right: 15px;" align="justify">
                                    I authorized GAC to communicate with any and all government offices necessary for the completion of my file, including the RCMP, regional & local police, Canadian and USA courts, in addition to any government related office necessary for the completion of my file, whatsoever the details may be. I understand and acknowledge that GAC is not a law firm and instruction provided by GAC is not a legal advice. Should the client require legal advise, the client should consult a lawyer.I acknowledge that I am responsible for providing all information and documents required by the Canadian & USA authorities and all documentation and information will be genuine and I understand that any inaccuracies may seriously affect the status of my application. Any false information and document submitted to Canadian & USA authorities is my sole responsibility and GAC will not be responsible or part of any false information and documentation submissions. 
                                </p>
                                <p style="color: black; margin-left: 15px; margin-right: 15px;" align="justify">
                                    I understand that any further personal criminal activity, occurring while my application is in process may result a significant postponement on my eligibility. I further understand that any delay caused by my activity may result in additional charges to be covered by me. I understand that GAC has no control, whatsoever, over my application time frame, over The Parole Board of Canada, the RCMP, the DHS, Canadian & USA courts. I affirm that GAC will not be responsible if I am ineligible to apply for record suspension and/or file destruction, file purge and/or U.S entry waiver application due to my unpaid fines, surcharges, restitution, waiting period implications with police and any nature of convictions. I understand that any time frames offered by GAC are estimates only and that no time frames can be guaranteed under any circumstance, regardless of the details and or urgency of the file. I acknowledge that GAC is not giving any guarantees on the outcome of my application for Canadian Record Suspension and/or File destruction, File purge and/or U.S. entry waiver. I understand that granting or rejection of my record suspension/file destruction/purge/ U.S entry waiver is a solely decision of The Parole Board of Canada, Royal Canadian Mounted Police, regional & local police services and USA department of homeland security (DHS). 
                                </p>
                                <p style="color: black; margin-left: 15px; margin-right: 15px;" align="justify">
                                    I understand that GAC administrative fee is for assisting me with my application preparation only. I understand GAC administration fee for my application preparation is non-refundable. All payments are quoted in Canadian dollar which are subject to applicable taxes and may change at any time. I understand that I can cancel my application within three business days of the file opening with GAC. I further understand & acknowledge that I will be entitled to a refund of my GAC administrative fee payment made only upon the written request of cancellation made within three business days except $250 dollars of file opening fee minus the credit card administrative fee charged when the file was opened. I affirm that I will not be entitled to a refund due to my unpaid fines, surcharges, restitution, waiting period implications with police and any nature of conviction(s). The administration fee does not include any Canadian & USA court fees, local police checks fee, Parole board of Canada (PBC) and USA department of homeland security (DHS) application processing fee and document(s) translation by certified translator, if applicable. Canadian & USA court fees, local police checks fee, Parole board of Canada (PBC) and USA department of homeland security (DHS) fee(s) can change at any time without notice. In cases of U.S. Entry Waiver applications only, if any convictions took place in the province of Quebec, the client is responsible for the translation of the court documents for submission to the U.S. homeland Security. GAC offers to provide authorized and certified translation through a third party at the client's expense. The PBC and DHS processing fee will be due upon completion of my file preparation. If applicable, I agree to pay the Canadian & USA court fees and local police checks fees during the process of my application(s). Non-payment of Service fees, Canadian & USA court fees, local police checks fee and disbursements, in a timely manner will result in my file being discontinued. A $50.00 fee will be charged for missed and/or declined credit card payment. GAC reserves the right to change the terms & conditions prior to any payment made. I authorize Global Avenues Consulting Inc. (GAC) to charge my credit card to cover all amounts due when opening the file and during the application process as indicated on this terms & conditions. All payments will be automatically charged on my credit card without prior notice to me. I understand that Global Avenues Consulting Inc. will discontinue its services if the payment is not received when due. 
                                </p>
                                <p style="color: black; margin-left: 15px; margin-right: 15px;" align="justify">
                                    I agree to maintain consistent communication with GAC to ensure all my contacts and address information is updated at all the time while my application is in process. I understand that GAC will discontinue the processing of my application(s) if I am unable to provide all the pending information & documents and if I am not reachable with my telephone number(s) and/or email and/or postal mail is returned undeliverable for 30 days. A $100.00 fee will apply to reactivate the closed file within 12 months. If applicable, I understand and acknowledge that if GAC has not received my record from RCMP and/or USA authorities within two years than my application will be considered inactive and $100.00 will be charged to re-activate my file. I understand after 12 months my file and all the information therein will be destroyed by GAC and a new application preparation term & conditions of GAC and administration fees will apply. If applicable, I understand that if my submitted application(s) to The Parole Board of Canada (PBC), Royal Canadian Mounted Police, regional & local police services and/or USA department of homeland security (DHS) is found to be ineligible due to any reason than I will be charged $150 by GAC for maintaining and holding my file until I am eligible to apply. By providing credit card details to GAC the client agrees that this information may be used to automatically charge any and all disbursement fees owing. 
                                </p>
                                <p style="color: black; margin-left: 15px; margin-right: 15px;" align="justify">
                                    I acknowledge this GAC service terms & conditions and do hereby state that I understand and agree to all of the terms and conditions as stipulated herein. The client understands and agrees that in no event shall GAC be liable for any damages whatsoever, including direct claim, indirect claim, incidental, consequential, special or exemplary damages, and any damages for loss of profits, savings, goodwill or other intangible claim. I agree that upon accepting GAC service terms & conditions, if at any time I decide to retain other service provider or transfer my file from GAC to other service provider in connection with above mentioned services matters, or terminate the services or cancel or withdraw my application, then the total fees shall become due owning immediately. I acknowledge that GAC reserves the right to reject processing my application at any time with any notice. If any change is not acceptable to the client, the client must discontinue the client's use of this GAC services immediately.
                                </p>

                                <div class="row" style="margin-bottom: 15px; margin-right: 5px;">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" align="right">
                                        <input type="hidden" name="application_id" value="<?= $application_id ?>">
                                        <input type="hidden" name="client_id" value="<?= $client_id ?>">
            
                                        <a href="#step4" id="backAll" data-toggle="tab">
                                            <button type="button" class="btn btn-success">
                                                Back
                                            </button>
                                        </a>
                                        <a href="#" id="tabAll">
                                            <button type="button" class="btn btn-success">
                                                Accept
                                            </button>
                                        </a>
                                        <button type="submit" class="btn btn-success" id="submit-button">Submit</button>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
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
//        var d = new Date();
//        document.getElementById("date").innerHTML = d.toDateString();
//        var d = new Date();
//        document.getElementById("date2").innerHTML = d.toDateString();
//        var d = new Date();
//        document.getElementById("date3").innerHTML = d.toDateString();
//        var d = new Date();
//        document.getElementById("date4").innerHTML = d.toDateString();
//        var d = new Date();
//        document.getElementById("date5").innerHTML = d.toDateString();
    </script>
