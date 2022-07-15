<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="table-responsive">
            <table class="display table table-bordered">
                <thead>
                <tr>
                    <th scope="col">Application Id</th>
                    <th scope="col">Email Id</th>
                    <th scope="col">Delivery Method Price</th>
                    <th scope="col">Sub Total</th>

                    <th scope="col">Tax</th>
                    <th scope="col">Grand Total</th>
                    <th scope="col">Payment Status</th>
                    <th scope="col">Application Type</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($result as $key => $value) {
                    ?>
                    <tr>
                        <th class="align-middle"><a href="<?php echo base_url('portal/get_application_by_id/').$value->name_based_application_id; ?>"> <?= $value->name_based_application_id ?> </a> </th>
                        <td class="align-middle"><?= $value->consent_email ?></td>
                        <td class="align-middle"><?= $value->delivery_method_price ?></td>
                        <td class="align-middle"><?= $value->sub_total ?></td>
                        <td class="align-middle"><?= $value->tax ?></td>
                        <td class="align-middle"><?= $value->grand_total ?></td>
                        <td class="align-middle"><?= $value->payment_status ?></td>
                        <td class="align-middle"> Name Based Application </td>
                    </tr>

                    <?php
                }
                if (empty($result)) {
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
