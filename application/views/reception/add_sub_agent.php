<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="container">


            <div class="col-xl-9 col-lg-6 col-md-4">
                <button class="btn btn-primary" data-toggle="modal" data-target="#add_user">Add User</button>
            </div>


            <br />

            <div class="col-xl-9 col-lg-6 col-md-4">
                <button class="btn btn-primary" data-toggle="modal" data-target="#">Download Templete</button>
            </div>
            <br>



            <div class="modal fade" id="add_user" data-backdrop="static" data-keyboard="false">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <h3 style="text-align: center;">Service Order</h3>
                        <div class="form-group">


                            <form action="<?= base_url('agent/save_agent_sub_employee') ?>" method="post">
                                <div class="col-md-12 form-group mb-3">
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-12 form-group mb-3">
                                                <label>Email</label>
                                                <input type="text" class="form-control" required="" name="email" value="<?= set_value('email') ?>">
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

                                            <div class="col-md-12 form-group mb-3">
                                                <label>Position</label>
                                                <input type="text" class="form-control" name="position" value="<?= set_value('position') ?>">
                                                <div class="text-danger"><?= form_error('position'); ?></div>
                                            </div>


                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <!--                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>-->
                                        <button type="submit" class="btn btn-primary">Add Agent</button>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>






            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <div class="table-responsive">
                        <table class="display table table-bordered">
                            <thead>
                            <tr>
                                <!--                    <th class="align-middle text-center" scope="col">ID</th>-->
                                <th class="align-middle text-center" scope="col">Id name</th>
                                <th class="align-middle text-center" scope="col">name</th>
                                <th class="align-middle text-center" scope="col">Email</th>
                                <th class="align-middle text-center" scope="col">Created by</th>
                                <th class="align-middle text-center" scope="col">Created at</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            //                            foreach ($applications as $key => $value) {
                            ?>
                            <tr>

                                <th class="align-middle text-center">1</th>
                                <th class="align-middle text-center">zain</th>
                                <th class="align-middle text-center">sub_agent@gmail.com</th>
                                <th class="align-middle text-center">agent@gmail.com</th>
                                <th class="align-middle text-center"></th>

                                <!--                                    <th class="align-middle text-center">--><?php //= $value->created_at ?><!--</th>-->
                            </tr>
                            <?php
                            //                            }
                            //                            if (empty($applications)) {
                            //                                ?>
                            <!--                                <tr>-->
                            <!--                                    <td colspan="100" class="text-center">No Record Found</td>-->
                            <!--                                </tr>-->
                            <!--                            --><?php //}
                            //                            ?>
                            </tbody>



                        </table>
                    </div>
                    <?php echo $this->paginator->get_links(); ?>
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