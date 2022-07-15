
<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="table-responsive">
            <table class="display table table-bordered">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Country Name</th>
                    <th scope="col">Phone Code</th>
                    <th scope="col">Status</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    ?>
                    <tr>
                        <th class="align-middle"><?php echo $record[0]['country_id']; ?></th>
                        <th class="align-middle"><?php echo $record[0]['name']; ?></th>
                        <th class="align-middle"><?php echo $record[0]['phonecode']; ?></th>
                        <th class="align-middle"><?php echo $record[0]['active']; ?></th>

                    </tr>

                    <div class="modal fade" id="country_<?= $value->country_id ?>" data-backdrop="static" data-keyboard="false">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">

                            </div>
                        </div>
                    </div>
                    <?php
//                }
                if (empty($record)) {
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
        <div class="modal fade" id="add_country" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="<?= base_url('portal/add-country') ?>" method="post">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Country</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12 form-group mb-3">
                                    <label>Country Name</label>
                                    <input type="text" class="form-control" required="" name="name" value="<?= set_value('name') ?>">
                                    <div class="text-danger"><?= form_error('name'); ?></div>
                                </div>
                                <div class="col-md-12 form-group mb-3">
                                    <label>Phone Code</label>
                                    <input type="text" class="form-control" required="" name="phonecode" value="<?= set_value('phonecode') ?>">
                                    <div class="text-danger"><?= form_error('phonecode'); ?></div>
                                </div>
                                <div class="col-md-12 form-group mb-3">
                                    <label class="switch switch-primary mr-3">
                                        <span>Status</span>
                                        <input type="checkbox" name="active" checked value="1">
                                        <span class="slider"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add Country</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>