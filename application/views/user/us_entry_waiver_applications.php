<link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css'>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js'></script>
<link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>

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

    .card:hover {
        cursor: pointer !important;
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
</style>


<div class="sticky_notes" class="row">
    <ul>
        <?php
        foreach ($applications as $key => $value) { ?>

            <li data-toggle="modal" style="list-style:none;" data-target="#forward_application_to_user">

                <a href="#">


                    <h3 style="font-size: 16px;">Application # <?= $value->us_entry_waiver_id ?></h3>
                    <hr/>
                    <p><b>Us Entry Waiver Applications</b></p>
                    <p class="card-text"><?= $value->consent_dob ?></p>


                    <!--                    now the progress bar-->
                    <!--                    now the progress bar-->
                    <p><?php echo $value->application_status; ?></p>
                    <?php if($value->application_status == "Not Applied" ){ ?>
                        <div class="progress">
                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:40%">
                                40% Complete
                            </div>
                        </div>
                    <?php } elseif($value->application_status == "New"){ ?>
                        <div class="progress">


                            <style>
                                .progress-bar_wrapper {
                                    width: 100%;
                                    height: 20px;
                                    background: #28a745;
                                    border: 1px solid #28a745;
                                }

                                .progress-bar {
                                    background: #28a745;
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
                                        width: 50%;
                                    }
                                }
                            </style>


                            <div class="progress-bar progress-bar-warning progress-bar_wrapper">
                                <div class="progress-bar">
                                    50% complete
                                </div>
                            </div>










                            <!--                                                <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:50%">-->
                            <!--                                                    50% Complete-->
                            <!--                                                </div>-->
                        </div>
                    <?php } elseif($value->application_status == "Under Process"){   ?>
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


                        <style>
                            .progress-bar_wrapper {
                                width: 100%;
                                height: 20px;
                                background: #000;
                                border: 1px solid #000;
                            }

                            .progress-bar {
                                background: #dc3545;
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
                                    width: 100%;
                                }
                            }
                        </style>


                        <div class="progress-bar progress-bar-warning progress-bar_wrapper">
                            <div class="progress-bar">
                                100% complete
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
                                <h6 class="text-muted"> Details</h6>
                            </div>
<!--                            <div class="tabs" id="tab02">-->
<!--                                <h6 class="font-weight-bold">Messages</h6>-->
<!--                            </div>-->
<!--                            <div class="tabs" id="tab03">-->
<!--                                <h6 class="text-muted">Status</h6>-->
<!--                            </div>-->
                        </div>
                        <div class="line"></div>
                        <div class="modal-body p-0">








                            <fieldset  class="show" id="tab011">

                                <br/>

                                <div class="row" style="margin-left: 0px; margin-right: 0px;">
                                    <div class="col-md-12">
                                        <h3 style="text-align: center;">U.S Entry Waiver Application</h3>
                                    </div>
                                </div>

                                <div class="row" style="margin-left: 0px; margin-right: 0px;">
                                    <div class="col-md-1">
                                    </div>
                                    <div class="col-md-5">
                                        <br/>
                                        <p class="card-text"> <b>Date: </b> <?= $value->created_at ?>
                                        <p class="card-text"> <b>Name: </b>  <?= $value->consent_first_name . " " . $value->consent_middle_name . "" . $value->consent_last_name ?>
                                        <p class="card-text"> <b>Date of Birth:</b><?= $value->consent_dob ?> </p>
                                        <p class="card-text"> <b>Phone:</b> <?= $value->consent_phone ?> </p>
                                        <p class="card-text"> <b>Email:</b> <?= $value->consent_email ?> </p>
                                    </div>

                                    <div class="col-md-5">
                                        <br/>

                                        <p class="card-text"> <b>Application #</b><?= $value->us_entry_waiver_id ?> </p>
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
<!--                                                                                                                <h2>--><?php //echo $value->application_status; ?><!--</h2>-->
                                        <?php if($value->application_status == "Not Applied" ){ ?>
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:40%">
                                                    40% Complete
                                                </div>
                                            </div>
                                        <?php } elseif($value->application_status == "New"){ ?>
                                            <div class="progress">





                                                <div class="progress-bar progress-bar-warning progress-bar_wrapper">
                                                    <div class="progress-bar">
                                                        50% complete
                                                    </div>
                                                </div>










<!--                                                <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:50%">-->
<!--                                                    50% Complete-->
<!--                                                </div>-->
                                            </div>

                                        <?php } elseif($value->application_status == "Under Process"){   ?>
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


                                            <style>
                                                .progress-bar_wrapper {
                                                    width: 100%;
                                                    height: 20px;
                                                    background: #dc3545;
                                                    border: 1px solid #dc3545;
                                                }

                                                .progress-bar {
                                                    background: #dc3545;
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
                                                        width: 100%;
                                                    }
                                                }
                                            </style>


                                            <div class="progress-bar progress-bar-warning progress-bar_wrapper">
                                                <div class="progress-bar">
                                                    100% complete
                                                </div>
                                            </div>

                                        <?php } ?>
                                    </div>
                                    <div class="col-md-3">
                                    </div>

                                </div>
                                <br/>

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



    $(document).ready(function()
    {
        $("#butsave").click(function()
        {
            var myEditor = document.querySelector('#editor')
            var comment = myEditor.children[0].innerHTML;

            var application_id = $('#application_id').val();
            var type = $('#type').val();
            var created_by = $('#created_by').val();
            if(comment != "")
            {
                jQuery.ajax({
                    type: "POST",
                    url: "<?php echo base_url('portal/get_comment_data_save'); ?>",
                    dataType: 'html',
                    data: {comment: comment,application_id: application_id, type: type, created_by:created_by},
                    success: function(res)
                    {
                        if(res)
//                        if(res==1)
                        {
                            location.reload()
//                            alert(res);

                        }
                        else
                        {
                            alert('Data not saved');
                        }
                    },
                    error:function()
                    {
                        alert('data not saved');
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



<script>
    $( document ).ready(function() {
        var quill = new Quill('#editor', {
            theme: 'snow'
        });
    });
</script>


</script>