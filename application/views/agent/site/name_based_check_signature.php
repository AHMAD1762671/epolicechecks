<style>
    .nav-tabs > li a {
        margin: 36px 23px !important;
        width: 100px !important;
    }

    @media (min-width: 992px)
        .col-md-offset-2 {
            margin-left: 5.5% !important;
        }

</style>


<style>
    .nav-tabs > li a {
        margin: 36px 23px !important;
        width: 100px !important;
    }

    @media (min-width: 992px){
        .col-md-offset-2 {
            margin-left: 5.5% !important;
        } }
    .tab-pane {
        padding-top: 0px !important;
    }
    .board {
        margin-top: 0px !important;
    }

    .breadcrumb {
        display: none;
    }

</style>


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


<br>



<div class="row">
    <div class="board">
        <div class="tab-content">
            <div class="tab-pane fade in active" id="step1" style="">
                <div class="row" style="margin-left: 15px; margin-right: 15px;">
                    <div class="container">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#home">Draw your Signature</a></li>
                            <li><a data-toggle="tab" href="#menu2">Upload signature image</a></li>
                        </ul>

                        <div class="tab-content">
                            <div id="home" class="tab-pane fade in active" style="">
                                <h3>Draw Signature</h3>
                                <style>
                                    #canvasDiv{
                                        position: relative;
                                        border: 2px dashed grey;
                                        height:300px;
                                        width: 740px;
                                    }
                                </style>
                                <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
                                <section style="background:#efefe9;">
                                    <div class="row">
                                        <div class="board">
                                            <div class="tab-content">
                                                <div class="tab-pane fade in active" id="step1" style="">
                                                    <div class="row" style="margin-right: 15px;">

                                                        <div class="col-md-8 col-md-offset-2" style="float: left;">

                                                            <div id="canvasDiv"></div>
                                                            <br>
                                                            <button type="button" class="btn btn-danger" id="reset-btn">Clear</button>
                                                            <button type="button" class="btn btn-success" id="btn-save">Save</button>
                                                        </div>
                                                        <form id="signatureform" action="<?php echo base_url() ?>agent/save_name_based_check_drawable_signature" enctype="multipart/form-data" style="display:none" method="post">
                                                            <input type="hidden" id="signature" name="signature">
                                                            <input type="hidden" name="signaturesubmit" value="1">

                                                            <input type="hidden" name="client_id" value="<?php echo $client_id ?>">
                                                            <input type="hidden" name="application_id" value="<?php echo $application_id ?>">
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>

                            <div id="menu2" class="tab-pane fade" style="margin-bottom: 50px;">
                                <form action="<?php echo base_url() ?>agent/save_name_based_check_picture_signature" method="post" enctype="multipart/form-data">


                                    <div class="col-lg-6 col-md-4 col-sm-6 col-xs-6">
                                            <label style="color: black;">Applicant Signature's picture:</label> &nbsp; <input style="color: black;" type="file" name="consent_signature_picture"/>
                                            <input type="hidden" name="client_id" value="<?php echo $client_id ?>">
                                            <input type="hidden" name="application_id" value="<?php echo $application_id ?>">
                                    </div>

                                    <br/>

                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" align="right">
                                            <button type="submit" class="btn btn-success" style="width: 139px; margin-left: 55px;">Submit</button>
                                    </div>
                                </form>
                            </div>



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>








<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.5.0-beta4/html2canvas.min.js"></script>
<script>
    $(document).ready(() => {
        var canvasDiv = document.getElementById('canvasDiv');
    var canvas = document.createElement('canvas');
    canvas.setAttribute('id', 'canvas');
    canvasDiv.appendChild(canvas);
    $("#canvas").attr('height', $("#canvasDiv").outerHeight());
    $("#canvas").attr('width', $("#canvasDiv").width());
    if (typeof G_vmlCanvasManager != 'undefined') {
        canvas = G_vmlCanvasManager.initElement(canvas);
    }

    context = canvas.getContext("2d");
    $('#canvas').mousedown(function(e) {
        var offset = $(this).offset()
        var mouseX = e.pageX - this.offsetLeft;
        var mouseY = e.pageY - this.offsetTop;

        paint = true;
        addClick(e.pageX - offset.left, e.pageY - offset.top);
        redraw();
    });

    $('#canvas').mousemove(function(e) {
        if (paint) {
            var offset = $(this).offset()
            //addClick(e.pageX - this.offsetLeft, e.pageY - this.offsetTop, true);
            addClick(e.pageX - offset.left, e.pageY - offset.top, true);
            console.log(e.pageX, offset.left, e.pageY, offset.top);
            redraw();
        }
    });

    $('#canvas').mouseup(function(e) {
        paint = false;
    });

    $('#canvas').mouseleave(function(e) {
        paint = false;
    });

    var clickX = new Array();
    var clickY = new Array();
    var clickDrag = new Array();
    var paint;

    function addClick(x, y, dragging) {
        clickX.push(x);
        clickY.push(y);
        clickDrag.push(dragging);
    }

    $("#reset-btn").click(function() {
        context.clearRect(0, 0, window.innerWidth, window.innerWidth);
        clickX = [];
        clickY = [];
        clickDrag = [];
    });

    $(document).on('click', '#btn-save', function() {
        var mycanvas = document.getElementById('canvas');
        var img = mycanvas.toDataURL("image/png");
        anchor = $("#signature");
        anchor.val(img);
        $("#signatureform").submit();
    });

    var drawing = false;
    var mousePos = {
        x: 0,
        y: 0
    };
    var lastPos = mousePos;

    canvas.addEventListener("touchstart", function(e) {
        mousePos = getTouchPos(canvas, e);
        var touch = e.touches[0];
        var mouseEvent = new MouseEvent("mousedown", {
            clientX: touch.clientX,
            clientY: touch.clientY
        });
        canvas.dispatchEvent(mouseEvent);
    }, false);


    canvas.addEventListener("touchend", function(e) {
        var mouseEvent = new MouseEvent("mouseup", {});
        canvas.dispatchEvent(mouseEvent);
    }, false);


    canvas.addEventListener("touchmove", function(e) {

        var touch = e.touches[0];
        var offset = $('#canvas').offset();
        var mouseEvent = new MouseEvent("mousemove", {
            clientX: touch.clientX,
            clientY: touch.clientY
        });
        canvas.dispatchEvent(mouseEvent);
    }, false);



    // Get the position of a touch relative to the canvas
    function getTouchPos(canvasDiv, touchEvent) {
        var rect = canvasDiv.getBoundingClientRect();
        return {
            x: touchEvent.touches[0].clientX - rect.left,
            y: touchEvent.touches[0].clientY - rect.top
        };
    }


    var elem = document.getElementById("canvas");

    var defaultPrevent = function(e) {
        e.preventDefault();
    }
    elem.addEventListener("touchstart", defaultPrevent);
    elem.addEventListener("touchmove", defaultPrevent);


    function redraw() {
        //
        lastPos = mousePos;
        for (var i = 0; i < clickX.length; i++) {
            context.beginPath();
            if (clickDrag[i] && i) {
                context.moveTo(clickX[i - 1], clickY[i - 1]);
            } else {
                context.moveTo(clickX[i] - 1, clickY[i]);
            }
            context.lineTo(clickX[i], clickY[i]);
            context.closePath();
            context.stroke();
        }
    }
    });

</script>