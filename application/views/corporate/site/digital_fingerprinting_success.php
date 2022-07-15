<link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
<section style="background:#efefe9;">
    <div class="row">
        <div class="board">
            <div class="tab-content">
                <div class="tab-pane fade in active" id="step1" style="">
                    <div class="row" style="margin-left: 15px; margin-right: 15px;">
                        <div class="col-md-12 text-center">
                            <img src="<?= base_url('site-assets') ?>/images/application-success.png" class="img-responsive" style="height: 200px;margin: auto">
                        </div>
                    </div>
                    <div class="row" style="margin-left: 15px; margin-right: 15px;">
                        <div class="col-md-12 text-center">
                            <h3>Application Submitted Successfully.</h3>
                            <h5>Your Application ID is: <strong><?= $application_id ?></strong></h5>
                            <br>
                            <a href="<?= base_url() ?>corporate" class="btn btn-primary">Back to Home</a>
                        </div>
                    </div> <br />
                </div>
            </div>
        </div>
    </div>
</section>

<script>

</script>
