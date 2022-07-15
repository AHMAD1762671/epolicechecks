<form>
    <div class="row mb-3">
        <div class="col-sm-2 mt-3 mt-md-0">
            <input type="text" value="<?= $client_id ?>" name="id" class="form-control" placeholder="Client ID">
        </div>


        <div class="col-sm-2 mt-3 mt-md-0">
            <input type="text" value="<?= $name ?>" name="name" class="form-control" placeholder="Last Name">
        </div>
        <div class="col-sm-2 mt-3 mt-md-0">
            <input type="text" value="<?= $name ?>" name="name" class="form-control" placeholder="First Name">
        </div>


        <div class="col-sm-2 mt-3 mt-md-0">
            <input type="text" value="<?= $dob ?>" name="dob" autocomplete="off" class="form-control picker2"  data-date-format="yyyy-mm-dd" placeholder="Date of Birth">
        </div>
        <div class="col-sm-2 mt-3 mt-md-0">
            <input type="text" value="<?= $phone ?>" name="phone" class="form-control" placeholder="Phone No.">
        </div>
        <div class="col-sm-2 mt-3 mt-md-0">
            <button type="submit" class="btn btn-primary btn-block">Search</button>
        </div>
    </div>
</form>
<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="table-responsive">
            <table class="display table table-bordered">
                <thead>
                <tr>
                    <th scope="col">Client ID</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Date of Birth</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Application Status</th>
                    <th scope="col">Submitted By</th>
                    <th scope="col">Created At</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($applications as $key => $value) {
                        ?>
                        <tr>
                            <th class="align-middle text-center"><?= $value->name_based_application_id ?></th>
                            <th class="align-middle text-center"><?= $value->consent_last_name ?></th>
                            <th class="align-middle text-center"><?= $value->consent_first_name ?></th>
                            <th class="align-middle text-center"><?= $value->consent_dob ?></th>
                            <th class="align-middle text-center"><?= $value->consent_phone ?></th>
<!--                            <th class="align-middle text-center"></th>-->
                            <td class="align-middle"><?= $value->application_status ?> CAD</td>
                            <td class="align-middle"><?= get_admin_email_by_id($value->agent_id) ?></td>
                            <td class="align-middle"><?= $value->created_at ?></td>
<!--                            <td class="align-middle">-->
<!--                                <a href="--><?//= base_url() ?><!--agent/security-screening/us-entry-waiver/details/--><?//= $value->us_entry_waiver_id ?><!--" class="btn btn-primary" title="View Application">-->
<!--                                    <span class="fa fa-eye"></span>-->
<!--                                </a>-->
<!--                            </td>-->
                        </tr>
                        <?php
                    }
                    if (empty($applications)) {
                        ?>
                        <tr>
                            <td colspan="100" class="text-center">No Record Found</td>
                        </tr>
                    <?php }
                    ?>
                </tbody>
            </table>
        </div>
        <?php echo $this->paginator->get_links(); ?>
    </div>
</div>