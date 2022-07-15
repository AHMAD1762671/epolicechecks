<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="table-responsive">
            <table class="display table table-bordered">
                <thead>
                <tr>
                    <th scope="col">Account No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Type</th>
                    <th scope="col">email</th>
<!--                    <th scope="col">Created At </th>-->
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($account_list as $value) {
                    ?>
                    <tr>
                        <td class="align-middle"><a href="<?php echo base_url("portal/get_invoice_list_by_account/").$value->id ?>"> <?= $value->id; ?> </a></td>
                        <td class="align-middle"><?= $value->first_name. " " .$value->last_name; ?></td>
                        <td class="align-middle"><?= get_user_role_name_by_id($value->user_role_id); ?></td>
                        <td class="align-middle"><?= $value->email; ?></td>
                        <td class="align-middle"></td>

                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>