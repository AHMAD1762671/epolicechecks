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
                    <th scope="col">Action</th>
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
                        <td class="align-middle">
                            <button style="margin-top: 1px;" class="btn btn-primary" data-toggle="modal" data-target="#change_status<?= $value->name_based_application_id ?>" title="Assign Application">
                                <span class="fas fa-forward"></span>
                            </button>
                        </td>

                        <div class="modal fade" id="change_status<?= $value->name_based_application_id ?>" data-backdrop="static" data-keyboard="false">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <form action="<?php echo base_url('portal/') ?>" method="post">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Assign Application </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">

                                                <div class="col-md-12 form-group mb-3">

                                                    <label>Change Status </label>

                                                    <select class="form-control add-cities" id="" required="" name="city_id">
                                                        <option>Paid</option>
                                                        <option>Un-Paid</option>
                                                    </select>
                                                    <!--                                                    <div class="text-danger">--><?//= form_error('city_id'); ?><!--</div>-->
                                                </div>

                                                <input type="hidden" class="form-control" required="" name="name_based_application_id" value="<?= $value->name_based_application_id ?>">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Assign Application</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>







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
