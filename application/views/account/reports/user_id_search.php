<h5><b>Get Special Attribute</b></h5>

<div class="row">

    <div class="col-md-3 form-group mb-3">
        <label>Client ID</label>
        <input type="text" class="form-control" required="" name="start_date">
        <div class="text-danger"><?= form_error('password'); ?></div>
    </div>



    <!--    <div/>-->

    <div class="col-md-3 form-group mb-3">
        <a href="<?php echo base_url('account').'/search_user_by_id'  ?>">
            <button style=" margin-top:25px;" type="submit" class="btn btn-primary">Search</button>
        </a>
    </div>

</div>