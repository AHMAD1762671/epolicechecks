
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

        <h5 class="text-dark">Select Finger Print Agency:</h5>
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
<form action="<?= base_url() ?>user/application/digital-fingerprinting/canada" method="post">
    <div class="row" style="margin-bottom: 20px;">
        <div class="col-sm-1">

        </div>
        <div class="col-sm-10 text-dark  bg-white abc" style="border: 1px solid #d1d4db;

             border-bottom: 4px solid #c1d72f;">
            <div class="row">
                <div class="col-sm-5" style="border-right: 1px solid #c1d72f;">

                    <h6 style="margin-top: 75px;">   Digital Fingerprints</h6> 
                    <br/>
                </div>
                <div class="col-sm-7" style="margin-top: 30px;">
                    <div class="row" style="margin-bottom:5px;">
                        <div class="col-6">
                            <label>Select Province</label>
                        </div>
                        <div class="col-6">
                            <select class="form-control" required="" id="states" name="agency_state">
                                <option selected disabled="" value="">Select Province</option>
                                <?php foreach ($states as $value) { ?>
                                    <option value="<?= $value->state_id ?>"><?= $value->name ?></option>
                                <?php }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row" style="margin-bottom:5px;">
                        <div class="col-6">
                            <label>Select City</label>
                        </div>
                        <div class="col-6">
                            <select class="form-control" id="cities" name="agency_city">
                                <option value="">Select City</option>
                            </select>
                        </div>
                    </div>
                    <div class="row" style="margin-bottom:5px;">
                        <div class="col-6">
                            <label>Select Address</label>
                        </div>
                        <div class="col-6">
                            <select class="form-control" id="agency_address" name="agency_address">
                                <option value="">Select Address</option>
                            </select>
                        </div>
                    </div>

                    </br>
                </div>
            </div>
        </div>

        <div class="col-sm-7" align="right">
            <?php
            $options = $this->input->post('digital_fingerprinting_options');
            foreach ($options as $value) {
                ?>
                <input type="hidden" name="digital_fingerprinting_options[]" value="<?= $value ?>">
            <?php } ?>
            <input type="hidden" name="fingerprint_location" value="done">
            <input type="hidden" name="fingerprint_options" value="done">
            <a type="button" href="<?= base_url() ?>agent/application/digital-fingerprinting/canada" class="btn btn-success border mt-4"  style="width: 170px; ">< Back </a>
            <button type="submit" class="btn btn-success border mt-4"  style="width: 170px; "> Next ></button>
        </div> 

    </div>
</form>
<script>
    $('#states').on('change', function () {
        var state_id = $(this).val();
        $.post('<?= base_url() ?>user/application/get-city-by-state',
                {state_id: state_id},
                function (data) {
                    $('#cities').html(data);
                });
    });
    $('#cities').on('change', function () {
        var state_id = $('#states').val();
        var city_id = $(this).val();
        $.post('<?= base_url() ?>user/get-agent-locations',
                {state_id: state_id, city_id: city_id},
                function (data) {
                    $('#agency_address').html(data);
                });
    });
</script>