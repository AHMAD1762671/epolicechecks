<h5><b>Get Report</b></h5>

<div class="row">
    <div class="col-md-3 form-group mb-3">
        <label>User Type</label>
        <select class="form-control" name="country" id="country">
            <option value="">Select User Type</option>
            <option value="">All</option>
            <option value="">Agent</option>
            <option value="">Corporate</option>
            <option value="">Users</option>
        </select>
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
        <a href="<?php echo base_url('account').'/search_report'  ?>">
            <button style=" margin-top:25px;" type="submit" class="btn btn-primary">Search</button>
        </a>
    </div>

</div>