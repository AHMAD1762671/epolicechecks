<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<style>
    .abc:hover
    {
        background-color: #d8dcbf!important;
        border-radius: 10px
    }
</style>
<div class="row">
    <div class="col-sm-12 text-center">
        <img src="<?= base_url('site-assets') ?>/images/Logo_epolicecheckfinal-02.png" style="height: 200px; width: 343px;">
    </div>
</div>
<div class="row ">
    <div class="col-sm-1">

    </div>

    <div class="col-sm-10 text-dark  bg-white">

        <h5 class="text-dark">Select one or more of the following option(s):</h5>
        <hr>

    </div>
    <div class="col-sm-1  ">

    </div>
</div>
<div class="row mb-3" >
    <div class="col-sm-1">

    </div>

    <div class="col-sm-1  ">

    </div>
</div>
<form action="<?= base_url() ?>user/application/digital-fingerprinting/canada" method="post" id="form-options">
    <div class="row" style="margin-bottom: 20px;">
        <div class="col-sm-1">

        </div>
        <div class="col-sm-10 text-dark  bg-white abc" style="border: 1px solid #d1d4db;

             border-bottom: 4px solid #c1d72f;">
            <div class="row">
                <div class="col-sm-5" style="border-right: 1px solid #c1d72f;">
                    <img src="<?= base_url('site-assets') ?>/images/2.png" class="mb-2 " style="height: 139px; width: 123px; margin-top: 100px; float: left; ">
                    <h6 style="margin-top: 150px;">   Digital Fingerprints</h6> 
                </div>
                <div class="col-sm-7">
                    <p>
                        <?php foreach ($options as $value) { ?>
                            <input type="checkbox" name="digital_fingerprinting_options[]" value="<?= $value->digital_fingerprinting_option ?>">  <?= $value->digital_fingerprinting_option ?> <br> 
                        <?php } ?>
                    </p>
                </div>
            </div>
        </div>

        <div class="col-sm-7" align="right">
            <input type="hidden" name="fingerprint_options" value="done">
            <a type="button" href="<?= base_url() ?>agent/application/digital-fingerprinting" class="btn btn-success border mt-4"  style="width: 170px; ">< Back </a>
            <button type="submit" class="btn btn-success border mt-4"  style="width: 170px; "> Next ></button>
        </div> 
    </div>
</form>
<script type="text/javascript">
    $(document).ready(function () {
        $('#form-options').submit(function (e) {
            checked = $("input[type=checkbox]:checked").length;
            if (!checked) {
                e.preventDefault();
                alert("You must check at least one option.");
                return false;
            }

        });
    });

</script>