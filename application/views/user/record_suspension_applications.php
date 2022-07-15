<link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css'>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js'></script>
<link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>



<!--ajax files-->

<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<style>

    p a{
        width: 20% !important;
    }

    body {
        color: #000;
        overflow-x: hidden;
        height: 100%;
        background-color: #D1C4E9;
        background-repeat: no-repeat
    }

    .container {
        margin: 200px auto
    }

    fieldset {
        display: none
    }

    fieldset.show {
        display: block
    }

    select:focus,
    input:focus {
        -moz-box-shadow: none !important;
        -webkit-box-shadow: none !important;
        box-shadow: none !important;
        border: 1px solid #2196F3 !important;
        outline-width: 0 !important;
        font-weight: 400
    }

    button:focus {
        -moz-box-shadow: none !important;
        -webkit-box-shadow: none !important;
        box-shadow: none !important;
        outline-width: 0
    }

    .tabs {
        margin: 2px 5px 0px 5px;
        padding-bottom: 10px;
        cursor: pointer
    }

    .tabs:hover,
    .tabs.active {
        border-bottom: 4px solid #2196F3;
    }

    a:hover {
        text-decoration: none;
        color: #1565C0
    }

    .box {
        margin-bottom: 10px;
        border-radius: 5px;
        padding: 10px
    }

    .modal-backdrop {
        background-color: #64B5F6
    }

    .line {
        background-color: #CFD8DC;
        height: 1px;
        width: 100%
    }

    @media screen and (max-width: 768px) {
        .tabs h6 {
            font-size: 12px
        }
    }

    /*here is new css for sticky */
    /*here is new css for sticky */
    /*here is new css for sticky */


    *{
        margin:0;
        padding:0;
    }
    /*.sticky_notes ul,li{*/
    /*list-style:none;*/
    /*}*/
    .sticky_notes ul{
        display: flex;
        flex-wrap: wrap;
    }
    .sticky_notes ul li a{
        text-decoration:none;
        color:#000;
        background:#ffc;
        display:block;
        padding:1em;
        box-shadow: 5px 5px 7px rgba(33,33,33,.7);
        transform: rotate(-6deg);
        transition: transform .15s linear;
    }

    .sticky_notes ul li:nth-child(even) a{
        transform:rotate(4deg);
        position:relative;
        top:5px;
        background:#cfc;
    }
    .sticky_notes ul li:nth-child(3n) a{
        transform:rotate(-3deg);
        /*position:relative;*/
        top:-5px;
        background:#ccf;
    }
    .sticky_notes ul li:nth-child(5n) a{
        transform:rotate(5deg);
        position:relative;
        top:-10px;
    }

    .sticky_notes ul li a:hover,ul li a:focus{
        box-shadow:10px 10px 7px rgba(0,0,0,.7);
        transform: scale(1.25);
        position:relative;
        z-index:5;
    }

    .sticky_notes ul li{
        margin:1em;
    }


    /*style for message reply box*/

    #editor {
        height: 175px;
    }



    @media only screen and (max-device-width: 768px){
        p a {
            width: 42% !important;
        }
    }

    /*on popup editor setting*/
    @media only screen and (max-device-width: 900px){
        .pl-5, .px-5 {
            padding-left: 0rem !important;
        }

        #editor {
            height: 35% !important;
        }


    }
    }

    @media only screen and (min-device-width: 769px){
        .pl-5.mb-4 {
            height: 300px !important;
        }
    }


    span.badge {
        border-radius: 4px;
        background-color: red;
        font-weight: 600;
        color: white;
        font-size: 14px;
    }



    .coments_height{
        height: 260px !important;
    }



    .comment_button{
        width: 20%;
        left: 42% !important;
    }





    @media only screen and (max-device-width: 411px){
        .coments_height{
            height: 150px !important;
        }
        .comment_button{
            width: 29%;
            left: 38% !important;
        }
    }

    @media only screen and (max-device-width: 320px)
    {
        .coments_height {
            height: 90px !important;
        }
    }

</style>

<div class="row sticky_notes">
    <ul>
        <?php
        foreach ($applications as $key => $value) { ?>

            <li data-toggle="modal" style="list-style:none;" data-target="#forward_application_to_user">

                <a href="#">
                        <span class="notification">
                            <span>Unread Messages</span>
                            <span class="badge"><?php echo count($comments); ?></span>
                        </span>

                    <h3 style="font-size: 16px;">Application # <?= $value->record_suspension_id ?></h3>
                    <hr/>
                    <p><b>Record Suspension Applications</b></p>
                    <p class="card-text"><?= $value->consent_dob ?></p>



                    <!--                    now the progress bar-->
                    <p><?php echo $value->application_status; ?></p>
                    <?php if($value->application_status == "Not Applied" ){ ?>
                        <div class="progress">
                            <!--                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:40%">-->
                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:40%">
                                40% Complete
                            </div>
                        </div>
                    <?php } elseif($value->application_status == "New"){ ?>
                        <div class="progress">
                            <!--                            <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:50%">-->
                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-info" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:50%">
                                50% Complete
                            </div>
                        </div>
                    <?php } elseif($value->application_status == "Under Processing"){   ?>
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:60%">
                                <!--                            <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:60%">-->
                                60% Complete
                            </div>
                        </div>
                    <?php } elseif($value->application_status == "Pending Documents"){   ?>
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:70%">
                                70% Complete
                            </div>
                        </div>

                    <?php } elseif($value->application_status == "Completed"){  ?>
                        <div class="progress">
                            <!--                            <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%">-->
                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%">
                                100% Complete
                            </div>
                        </div>
                    <?php } ?>
                </a>
            </li>




            <div class="modal fade" id="forward_application_to_user" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false">
                <div role="document" class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header row d-flex justify-content-between mx-1 mx-sm-3 mb-0 pb-0 border-0">

                            <div class="tabs active" id="tab01">
                                <h6 class="text-muted">Details</h6>
                            </div>
                            <div class="tabs" id="tab02">
                                <!--                            <h6 class="font-weight-bold">Messages</h6>-->
                                <span>Messages</span>
                                <span class="badge"><?php echo count($comments); ?></span>
                            </div>
                            <!--                        <div class="tabs" id="tab03">-->
                            <!--                            <h6 class="text-muted">Status</h6>-->
                            <!--                        </div>-->
                        </div>

                        <div class="line"></div>

                        <div class="modal-body p-0" style="overflow-y: hidden;">
                            <fieldset  class="show" id="tab011">

                                <br/>

                                <div class="row" style="margin-left: 0px; margin-right: 0px;">
                                    <div class="col-md-12">
                                        <h3 style="text-align: center;">Record Suspention Application</h3>
                                    </div>
                                </div>

                                <div class="row" style="margin-left: 0px; margin-right: 0px;">
                                    <div class="col-md-1">
                                    </div>
                                    <div class="col-md-5">
                                        <br/>
                                        <p class="card-text"> <b>Date: </b>  <?= $value->created_at ?></p>
                                        <p class="card-text"> <b>Name: </b>  <?= $value->consent_first_name . " " . $value->consent_middle_name . "" . $value->consent_last_name ?>
                                        <p class="card-text"> <b>Date of Birth:</b> <?= $value->consent_dob ?> </p>
                                        <p class="card-text"> <b>Phone:</b> <?= $value->consent_phone ?> </p>
                                        <p class="card-text"> <b>Email:</b> <?= $value->consent_email ?> </p>
                                    </div>

                                    <div class="col-md-5">
                                        <br/>

                                        <p class="card-text"> <b>Application #</b> <?= $value->record_suspension_id ?> </p>
                                        <p class="card-text"> <b>Gender:</b> <?= $value->consent_gender ?> </p>
                                        <p class="card-text"> <b>Country:</b> <?= $value->consent_country ?> </p>
                                        <p class="card-text"> <b>Cell #</b>  <?= $value->consent_cellphone ?> </p>
                                    </div>
                                    <div class="col-md-1">
                                    </div>
                                </div>



                                <div class="row" style="margin-left: 0px; margin-right: 0px;">
                                    <div class="col-md-3">
                                    </div>
                                    <div class="col-md-6">
                                        <br/>
                                        <h2>Status: <b><?php echo $value->application_status; ?></b></h2>
                                        <br/>
                                        <!--                                <h2>--><?php //echo $value->application_status; ?><!--</h2>-->
                                        <?php if($value->application_status == "Not Applied" ){ ?>
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:40%">
                                                    40% Complete
                                                </div>
                                            </div>
                                        <?php } elseif($value->application_status == "New"){ ?>
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:50%">
                                                    50% Complete
                                                </div>
                                            </div>
                                        <?php } elseif($value->application_status == "Under Processing"){   ?>
                                            <div class="progress">




                                                <style>
                                                    .progress-bar_wrapper {
                                                        width: 100%;
                                                        height: 20px;
                                                        background: rgba(0, 0, 0, 0.05);
                                                        border: 1px solid rgba(0, 0, 0, 0.2);
                                                    }

                                                    .progress-bar {
                                                        background: #e6c110;
                                                        height: 20px;
                                                        animation: load 2s linear 1s;
                                                        animation-fill-mode: forwards;
                                                        width: 0%;
                                                    }

                                                    @-webkit-keyframes load {
                                                        from {
                                                            width: 0%;
                                                        }
                                                        to {
                                                            width: 60%;
                                                        }
                                                    }

                                                    @keyframes load {
                                                        from {
                                                            width: 0%;
                                                        }
                                                        to {
                                                            width: 60%;
                                                        }
                                                    }
                                                </style>

                                                <div class="progress-bar progress-bar-warning progress-bar_wrapper">
                                                    <div class="progress-bar">
                                                        60% complete
                                                    </div>
                                                </div>






                                            </div>
                                        <?php } elseif($value->application_status == "Pending Documents"){   ?>


                                            <div class="progress">
                                                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:70%">
                                                    70% Complete
                                                </div>
                                            </div>
                                            <br/>


                                        <?php } elseif($value->application_status == "Completed"){  ?>
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%">
                                                    100% Complete
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <div class="col-md-3">
                                    </div>

                                </div>





















                                <br/>

                            </fieldset>

                            <fieldset id="tab021">


                                <br/>


                                <div class="px-3">



                                    <div class="coments_height" style="overflow-y: scroll;  border: 1px solid #ccc; overflow-y: scroll;">

                                        <?php foreach ($comments as $valuee) { ?>
                                            <li class="media border-top pt-3">
                                                <div class="mr-3">
                                                    <!--                                                <img src="http://localhost/epolicechecks/assets/circle-cropped.png" height="40" width="80">-->
                                                    <img src="<?php echo base_url('assets/circle-croppedd.png') ?>" height="50" width="50">
                                                </div>



                                                <div class="media-body">
                                                    <h5 class="media-heading">
                                                        <span class="text-theme mb-0"><?= get_admin_name_by_id($valuee->created_by) ?></span>
                                                        <br>
                                                        <small><span class="fal fa-clock"></span> <?= date('d-m-Y / h:m:s A', strtotime($valuee->created_at)) ?></small>
                                                    </h5>

                                                    <p><?= $valuee->comment ?> </p>


                                                    <img src="<?php echo base_url('assets/pdf223.jpg') ?>" height="50" width="70">

                                                </div>
                                            </li>
                                        <?php } ?>
                                    </div>


                                    <hr>


                                    <!--                                <form action="--><?php //echo base_url('user/') ?><!--">-->
                                    <div class="pl-5 mb-4" style="padding-left: 0rem !important; height: 300px;">
                                        <link href="https://cdn.quilljs.com/1.1.6/quill.snow.css" rel="stylesheet">
                                        <script src="https://cdn.quilljs.com/1.1.6/quill.js"></script> <!-- Create the editor container -->
                                        <div id="editor" style="height: 30% !important;"> </div>
                                        <!--                                    --><?php //$newId =  $this->uri->segment('5'); ?>
                                        <!--                                    <input type="hidden" name="application_comment_id" id="application_comment_id" value="--><?//= $newId ?><!--">-->
                                        <input type="hidden" name="application_id" id="application_id" value="10069">
                                        <input type="hidden" name="type" id="type" value="name-based-check">
                                        <input type="hidden" name="created_by" id="created_by" value="cd987d9b-d4b8-490d-aa3e-1414d493">
                                        <br/>
                                        <input type="button" class="btn btn-primary comment_button" value="Send" id="butsave" style="position: relative;">
                                    </div>
                                    <!--                                </form>-->

                                    <hr/>








                                </div>

                            </fieldset>

                            <fieldset id="tab031">

                                <div class="px-3">
                                    <br/>
                                    <h2>Status: <b><?php echo $value->application_status; ?></b></h2>
                                    <br/>
                                    <!--                                <h2>--><?php //echo $value->application_status; ?><!--</h2>-->
                                    <?php if($value->application_status == "Not Applied" ){ ?>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:40%">
                                                40% Complete
                                            </div>
                                        </div>
                                    <?php } elseif($value->application_status == "New"){ ?>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:50%">
                                                50% Complete
                                            </div>
                                        </div>
                                    <?php } elseif($value->application_status == "Under Process"){   ?>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:60%">
                                                60% Complete
                                            </div>
                                        </div>
                                    <?php } elseif($value->application_status == "Pending Documents"){   ?>


                                        <div class="progress">
                                            <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:70%">
                                                70% Complete
                                            </div>
                                        </div>
                                        <br/>


                                    <?php } elseif($value->application_status == "Completed"){  ?>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%">
                                                100% Complete
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>

                            </fieldset>
                        </div>

                        <div class="line"></div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>


        <?php } ?>
    </ul>
</div>









<script>

    $(document).ready(function(){

        $(".tabs").click(function(){

            $(".tabs").removeClass("active");
            $(".tabs h6").removeClass("font-weight-bold");
            $(".tabs h6").addClass("text-muted");
            $(this).children("h6").removeClass("text-muted");
            $(this).children("h6").addClass("font-weight-bold");
            $(this).addClass("active");

            current_fs = $(".active");

            next_fs = $(this).attr('id');
            next_fs = "#" + next_fs + "1";

            $("fieldset").removeClass("show");
            $(next_fs).addClass("show");

            current_fs.animate({}, {
                step: function() {
                    current_fs.css({
                        'display': 'none',
                        'position': 'relative'
                    });
                    next_fs.css({
                        'display': 'block'
                    });
                }
            });
        });

    });

</script>





<script>
    $( document ).ready(function() {
        var quill = new Quill('#editor', {
            theme: 'snow'
        });
    });
</script>



<script type="text/javascript">
    // Ajax post
    $(document).ready(function()
    {
        $("#butsave").click(function()
        {
            var myEditor = document.querySelector('#editor')
            var comment = myEditor.children[0].innerHTML;

            var application_id = $('#application_id').val();
            var type = $('#type').val();
            var created_by = $('#created_by').val();

            if(created_by!="" && application_id!="" && type!="")
            {
                jQuery.ajax({
                    type: "POST",
                    url: "<?php echo base_url('user/save_namebase_comments'); ?>",
                    dataType: 'html',
                    data: {comment: comment, application_id: application_id,type:type,created_by:created_by},
                    success: function(res)
                    {
                        if(res==1)
                        {
                            alert('Data saved successfully');
                        }
                        else
                        {
                            alert('Data not saved under');
                        }

                    },
                    error:function()
                    {
                        alert('data not fully saved');
                    }
                });
            }
            else
            {
                alert("pls fill all fields first");
            }

        });
    });
</script>