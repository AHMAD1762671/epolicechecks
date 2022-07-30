<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="container">

            <div class="col-xl-9 col-lg-6 col-md-4">
                <button class="btn btn-primary" data-toggle="modal" data-target="#add_user">Service Order</button>
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


                            <form action="<?= base_url('corporate/multiple_file_upload') ?>" method="post" enctype="multipart/form-data" name="add_name" id="add_name">
                                <div class="table-responsive">
                                    <label>Attach Document</label>
                                    <table class="table table-bordered" id="dynamic_field">
                                        <tr>
                                            <td><input type="file" class="form-control" name="files[]" multiple/></td>
                                            <input type="hidden" name="submitted_to" value="83dbdd12-fb78-4433-832a-da8f8516">

                                        </tr>
                                    </table>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Submit Document</button>
                                    </div>
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
                    <th class="align-middle text-center" scope="col">Document Name</th>
                    <th class="align-middle text-center" scope="col">Submitted To</th>
                    <th class="align-middle text-center" scope="col">Created at</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($applications as $key => $value) {
                    ?>
                    <tr>
                        <th class="align-middle text-center"><?= $value->file_name ?></th>
                        <th class="align-middle text-center"><?= get_admin_email_by_id($value->submitted_to) ?></th>

                        <th class="align-middle text-center"><?= $value->created_at ?></th>
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