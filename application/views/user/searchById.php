<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="row">
            <div class="col-lg-6 col-md-4 col-sm-6">
                <form action="<?= base_url('agent/find_user') ?>" method="post">
                    <input required="" class="form-control" name="userId" type="text" placeholder="Search" aria-label="Search">
                    <br>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <button class="btn btn-primary btn-block" type="submit">Search</button>
            </div>
            </form>
        </div>
    </div>
</div>