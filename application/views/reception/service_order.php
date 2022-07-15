
<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="table-responsive">
            <table class="display table table-bordered">
                <thead>
                <tr>
<!--                    <th class="align-middle text-center" scope="col">ID</th>-->
                    <th class="align-middle text-center" scope="col">Document name</th>
                    <th class="align-middle text-center" scope="col">Submitted by</th>
                    <th class="align-middle text-center" scope="col">Created at</th>
                    <th class="align-middle text-center" scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
//                foreach ($applications as $key => $value) {
                    ?>
                    <tr>
                        <th class="align-middle text-center"> <a href="<?= base_url().'/uploads/service_order_images/image_2020_11_09T16_34_16_612Z.png' ?>" target="_blank"> image_2020_11_09T16_34_16_612Z.png </a></th>
                        <!--                        <th class="align-middle text-center"> get_admin_email_by_id($value->created_by) </th>-->
                        <th class="align-middle text-center">agent@gmail.com</th>

                        <th class="align-middle text-center">2020-12-09 18:32:24</th>
                        <th class="align-middle text-center">

                            <button style="margin-top: 1px;" class="btn btn-primary" data-toggle="modal" data-target="#forward_application_to_user" title="Submit Application">
                                <span class="fas fa-forward"></span>
                            </button>


                        </th>


                    </tr>


<!--                <div class="modal fade" id="forward_application_to_user" data-backdrop="static" data-keyboard="false">-->
<!--                    <div class="modal-dialog" role="document">-->
<!--                        <div class="modal-content">-->
<!--                            <h3 style="text-align: center;">Service Order</h3>-->
<!--                            <div class="form-group">-->
<!--                                <form action="--><?//= base_url('corporate/multiple_file_upload') ?><!--" method="post" enctype="multipart/form-data" name="add_name" id="add_name">-->
<!--                                    <div class="table-responsive">-->
<!--                                        <label>Attach Document</label>-->
<!--                                        <table class="table table-bordered" id="dynamic_field">-->
<!--                                            <tr>-->
<!--                                                <td><input type="file" class="form-control" name="files[]" multiple/></td>-->
<!--                                                <input type="hidden" name="submitted_to" value="83dbdd12-fb78-4433-832a-da8f8516">-->
<!---->
<!--                                            </tr>-->
<!--                                        </table>-->
<!--                                        <!--                                    <input style="background-color: #13375c; color: #ffffff;" class="form-control" type="submit" name="fileSubmit" value="Send Document"/>-->-->
<!---->
<!---->
<!--                                        <div class="modal-footer">-->
<!--                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>-->
<!--                                            <button type="submit" class="btn btn-primary">Submit Document</button>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </form>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->



                    <?php
//                }
//                if (empty($applications)) {
                    ?>
                    <tr>
<!--                        <td colspan="100" class="text-center">No Record Found</td>-->
                    </tr>
<!--                --><?php //}
                ?>
                </tbody>
            </table>
        </div>
        <?php echo $this->paginator->get_links(); ?>
    </div>
</div>