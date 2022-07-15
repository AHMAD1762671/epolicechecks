


<h5><b>Get Special Attribute</b></h5>

<div class="row">

    <div class="col-md-3 form-group mb-3">
        <input type="radio" name="fav_language" value="HTML"> Eamil <br>
        <input type="radio" name="fav_language" value="CSS"> Phone No.<br>
        <input type="radio" name="fav_language" value="JavaScript"> Address


    </div>


    <div class="col-md-3 form-group mb-3">
        <label>Start Date</label>
        <input type="datetime" class="form-control" required="" name="start_date">
        <div class="text-danger"><?= form_error('password'); ?></div>
    </div>



    <div class="col-md-3 form-group mb-3">
        <label>End Date</label>
        <input type="datetime" class="form-control" required="" name="end_date">
        <div class="text-danger"><?= form_error('last_name'); ?></div>
    </div>

    <div class="col-md-3 form-group mb-3">
        <a href="<?php echo base_url('account').'/search_attribute'  ?>">
            <button style=" margin-top:25px;" type="submit" class="btn btn-primary">Search</button>
        </a>
    </div>

</div>