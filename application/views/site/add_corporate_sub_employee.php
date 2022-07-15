<style>
    .btn {
        background-color: #a54f4f;
    }
    .btn:hover {
        background-color: #2b2a66;
    }
</style>

<div class="row">
    <div class="col-lg-12 col-md-12">
        <form action="<?= base_url('site/save_corporate_sub_employee') ?>" method="post">
            <div class="col-md-12 form-group mb-3">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 form-group mb-3">
                            <label>Email</label>
                            <input type="text" class="form-control" required="" name="email" value="<?= set_value('email') ?>">

                            <input type="hidden" class="form-control" required="" name="id" value="<?= $id ?>">
                            <input type="hidden" class="form-control" required="" name="name_based_check" value="<?= $name_based_check ?>">
                            <input type="hidden" class="form-control" required="" name="digital_fingerprinting" value="<?= $digital_fingerprinting ?>">
                            <input type="hidden" class="form-control" required="" name="record_suspension" value="<?= $record_suspension ?>">
                            <input type="hidden" class="form-control" required="" name="us_entry_waiver" value="<?= $us_entry_waiver ?>">

                            <div class="text-danger"><?= form_error('email'); ?></div>
                        </div>
                        <div class="col-md-12 form-group mb-3">
                            <label>Password</label>
                            <input type="password" class="form-control" required="" name="password" value="<?= set_value('password') ?>">
                            <div class="text-danger"><?= form_error('password'); ?></div>
                        </div>

                        <div class="col-md-12 form-group mb-3">
                            <label>Status</label>
                            <label class="switch">
                                <input type="checkbox" checked name="status">
                                <span class="slider round"></span>
                            </label>
                            <div class="text-danger"><?= form_error('status'); ?></div>
                        </div>

                        <div class="col-md-12 form-group mb-3">
                            <h4>Profile</h4>
                            <label>Company</label>
                            <input type="text" class="form-control" required="" name="company" value="<?= set_value('company') ?>">
                            <div class="text-danger"><?= form_error('Company'); ?></div>
                        </div>

                        <div class="col-md-12 form-group mb-3">
                            <label>Last Name</label>
                            <input type="text" class="form-control" required="" name="last_name" value="<?= set_value('last_name') ?>">
                            <div class="text-danger"><?= form_error('last_name'); ?></div>
                        </div>

                        <div class="col-md-12 form-group mb-3">
                            <label>First Name</label>
                            <input type="text" class="form-control" required="" name="first_name" value="<?= set_value('first_name') ?>">
                            <div class="text-danger"><?= form_error('first_name'); ?></div>
                        </div>

                        <div class="col-md-12 form-group mb-3">
                            <label>Address</label>
                            <input type="text" class="form-control" required="" name="address" value="<?= set_value('address') ?>">
                            <div class="text-danger"><?= form_error('address'); ?></div>
                        </div>

                        <div class="col-md-12 form-group mb-3">
                            <label>Country</label>
                            <select class="form-control" name="country_id">
                                <option value="">Select Country</option>
                                <?php foreach ($countries as $st) { ?>
                                    <option value="<?= $st->country_id ?>"><?= $st->name ?></option>
                                <?php } ?>
                            </select>
                            <div class="text-danger"><?= form_error('country'); ?></div>
                        </div>

                        <div class="col-md-12 form-group mb-3">
                            <label>Province</label>
                            <select class="form-control add-states" id="" required="" name="state_id">
                                <option value="">Select State</option>
                                <?php foreach ($states as $st) { ?>
                                    <option value="<?= $st->state_id ?>"><?= $st->name ?></option>
                                <?php } ?>
                            </select>
                            <div class="text-danger"><?= form_error('state_id'); ?></div>
                        </div>


                        <div class="col-md-12 form-group mb-3">
                            <label>City</label>
                            <select class="form-control add-cities" id="" name="city_id" >
                            </select>
                            <div class="text-danger"><?= form_error('city_id'); ?></div>
                        </div>

                        <div class="col-md-12 form-group mb-3">
                            <label>Telephone</label>
                            <input type="text" class="form-control" required="" name="telephone" value="<?= set_value('telephone') ?>">
                            <div class="text-danger"><?= form_error('telephone'); ?></div>
                        </div>
                        <div class="col-md-12 form-group mb-3">
                            <label>Cell</label>
                            <input type="text" class="form-control" name="cell" value="<?= set_value('cell') ?>">
                            <div class="text-danger"><?= form_error('cell'); ?></div>
                        </div>
                        <div class="col-md-12 form-group mb-3">
                            <label>Fax</label>
                            <input type="text" class="form-control" name="fax" value="<?= set_value('fax') ?>">
                            <input type="hidden" required class="form-control" name="corporate_id" value="<?= $this->uri->segment('3'); ?>">
                            <div class="text-danger"><?= form_error('fax'); ?></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
<!--                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>-->
                    <button type="submit" class="btn btn-primary">Add Corporate</button>
                </div>
        </form>

    </div>
</div>


<script>
    $('.add-states').on('change', function () {
        var state_id = $(this).val();
        var state = this;
        if ($(this).closest('.modal').hasClass('show')) {
            $.post('<?= base_url() ?>corporate/app_get_city_by_state',
                {state_id: state_id},
                function (data) {
                    $(state).closest('.modal-body').find('.add-cities').html(data);
                });
        }
    });
</script>