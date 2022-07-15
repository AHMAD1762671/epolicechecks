
<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="table-responsive">
            <table class="display table table-bordered">
                <thead>
                <tr>
                    <th scope="col">User Role Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Action</th>
                    <th scope="col">Mark Paid All</th>
                    <th scope="col">Send Invoice</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($result as $key => $value) {
                    ?>
                    <tr>
                        <th class="align-middle"><a href="<?php echo base_url('portal/get_sub_agents_users_application_list/').$value->id; ?>"> <?= $value->id ?> </a> </th>
                        <td class="align-middle"><?= $value->first_name . ' ' . $value->last_name ?></td>
                        <td class="align-middle"><?= $value->email ?></td>
                        <td class="align-middle"><?= $value->created_at ?></td>


                        <td class="align-middle">
                            <a href="<?php echo base_url('portal/get_corporate_users_individual_list') ?>">
                                <button class="btn btn-success" title="Download Excel Format">
                                    <span class="fa fa-download"></span>
                                </button>
                            </a>


                            <a href="<?php echo base_url('portal/get_corporate_users_individual_list') ?>">
                                <button class="btn btn-success" title="Download PDF">
                                    <span style="background-color: yellow;" class="fa-file-pdf"></span>
                                </button>
                            </a>
                        </td>



                        <td class="align-middle">
                            <button style="margin-top: 1px;" class="btn btn-primary" data-toggle="modal" data-target="#application_mark_as_paid<?= $value->id ?>" title="Mark as Paid">
                                <span class="fa-credit-card"></span>
                            </button>
                        </td>



                        <td class="align-middle">
                            <button style="margin-top: 1px;" class="btn btn-primary" data-toggle="modal" data-target="#send_invoice<?= $value->id ?>" title="Send Invoice">
                                <span class="fa-credit-card"></span>
                            </button>
                        </td>
                    </tr>


                    <div class="modal fade" id="send_invoice<?= $value->id ?>" data-backdrop="static" data-keyboard="false">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <form action="<?php echo base_url('portal/send_invoice_to_sub_corporate') ?>" method="post">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Assign Application  </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">

                                            <div class="col-md-12 form-group mb-3">
                                                <label>Payment Remaining </label>
                                                <input name="remaining_payment" value="<?php echo $payment2;?>" class="form-control" required="" readonly>
                                            </div>

                                            <div class="col-md-12 form-group mb-3">
                                                <label>Send To </label>
                                                <input name="send_to" value="<?php echo get_user_name_by_id($value->id); ?>" class="form-control" required="" readonly>
                                            </div>

                                            <input type="hidden" class="form-control" required="" name="user_id" value="<?= $value->id ?>">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Send Invoice</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>






                    <div class="modal fade" id="application_mark_as_paid<?= $value->id ?>" data-backdrop="static" data-keyboard="false">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <form action="<?php echo base_url('portal/update_payment_status') ?>" method="post">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Assign Application  </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">

                                            <div class="col-md-12 form-group mb-3">
                                                <label>Enter Payment Method </label>
                                                <input name="payment_method" class="form-control" required="">
                                            </div>
                                            <div class="col-md-12 form-group mb-3">
                                                <label>Enter Payment details</label>

                                                <textarea name="payment_method_description" class="form-control"></textarea>
                                            </div>

                                            <input type="hidden" class="form-control" required="" name="user_id" value="<?= $value->id ?>">
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
