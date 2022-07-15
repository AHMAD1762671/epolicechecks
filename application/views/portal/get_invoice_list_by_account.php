<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="table-responsive">
            <table class="display table table-bordered">
                <thead>
                <tr>
                    <th scope="col">Invoice No</th>
                    <th scope="col">Application Type</th>
                    <th scope="col">Total</th>
                    <th scope="col">Invoice Status</th>
                    <th scope="col">Created At </th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($account_list as $value) {
                    ?>
                    <tr>
                        <td class="align-middle">
                        <a href="<?php echo base_url('portal/get_invoice_detail/').$value->invoice_id; ?>">
                              <?= $value->invoice_id; ?>
                        </a>
                        </td>
                        <td class="align-middle"><?= $value->application_type. " " .$value->last_name; ?></td>
                        <td class="align-middle"><?= $value->grand_total; ?></td>
                        <td class="align-middle"><?= $value->invoice_status; ?></td>
                        <td class="align-middle"><?= $value->created_at; ?></td>
                        <td class="align-middle"></td>

                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>