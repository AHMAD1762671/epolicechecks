<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="container">

            <div style="float: left;" class="col-xl-4 col-lg-6 col-md-4">
                <button class="btn btn-primary" data-toggle="modal" data-target="#add_user">Service Order</button>
            </div>

            <div style="float: left;" class="col-xl-4 col-lg-6 col-md-4">
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Download Documents
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </div>
            </div>


            <br>
            <br>
            <br>


            <div class="modal fade" id="add_user" data-backdrop="static" data-keyboard="false">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <h3 style="text-align: center;">Service Order</h3>
                        <div class="form-group">
                            <form action="<?= base_url('user/multiple_file_upload_corporate') ?>" method="post" enctype="multipart/form-data" name="add_name" id="add_name">
                                <div class="table-responsive">
                                    <label>Attach Document</label>
                                    <table class="table table-bordered" id="dynamic_field">
                                        <tr>
                                            <td><input type="file" class="form-control" name="files[]" multiple/></td>
<!--                                            <input type="hidden" name="submitted_to" value="83dbdd12-fb78-4433-832a-da8f8516">-->

                                        </tr>
                                    </table>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <input style="background-color: #13375c; color: #ffffff;" class="form-control" type="submit" name="fileSubmit" value="Submit"/>
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
            <table class="table table-hover">
                <thead>
                <tr>
                    <th class="align-middle text-center" scope="col">Serial No.</th>
                    <th class="align-middle text-center" scope="col">Service Order</th>
                    <th class="align-middle text-center" scope="col">Submitted by</th>
                    <th class="align-middle text-center" scope="col">Created at</th>
                    <th class="align-middle" scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $i =1;
                foreach ($applications as $key => $value) {
                    ?>
                    <tr>
                        <th class="align-middle text-center"><?php echo $i++; ?></th>
                        <th class="align-middle">
                            <img height="50" width="50" src="<?= base_url().'/upload/service_order_images/'.$value->file_name ?>">
                        </th>
                        <th class="align-middle text-center"> <?= get_email_by_id($value->created_by) ?> </th>
                        <th class="align-middle text-center"><?= $value->created_at ?></th>
                        <td class="align-middle">
                            <a target="_blank" href="<?= base_url().'/upload/service_order_images/'.$value->file_name ?>" class="btn btn-primary" title="View Application">
                                <span class="fa fa-eye"></span>
                            </a>
                        </td>
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