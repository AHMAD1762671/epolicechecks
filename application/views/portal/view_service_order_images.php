
<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="row dashboard-sevices">


            <div class="col-lg-3 col-md-4 col-sm-6"> </div>

            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="card bg-gradient-info overflow-hidden text-white" style="background-image: linear-gradient(to bottom, #4a85fb 0, #163eaf 100%); box-shadow: 0 2px 10px rgb(22 62 175 / 30%);}">
                    <div class="card-body pb-0">
                        <p style="font-size: 15px; text-align: center;" class=" mb-1 "><b>  Total Service Orders </b></p>
                        <p style="font-size: 20px; text-align: center;" class=" mb-1 "><b><?php echo count($service_order_images); ?></b></p>
                    </div>
                    <br>
                </div>
            </div>


            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="card bg-gradient-info overflow-hidden text-white" style="background-image: linear-gradient(to bottom, #fc7a5a 0, #d72e04 100%); box-shadow: 0 2px 10px rgb(215 46 4 / 30%);}">
                    <div class="card-body pb-0">
                        <p style="font-size: 15px; text-align: center;" class=" mb-1 "><b> Forwarded Service Orders </b></p>
                        <p style="font-size: 20px; text-align: center;" class=" mb-1 "><b>5</b></p>
                    </div>
                    <br>
                </div>
            </div>


            <!--            <div class="col-lg-2 col-md-4 col-sm-6">-->
            <!--                <div class="card bg-gradient-info overflow-hidden text-white" style="background-image: linear-gradient(to bottom, #60c3b6 0, #269f90 100%);box-shadow: 0 2px 10px rgb(38 159 144 / 30%);">-->
            <!--                    <div class="card-body pb-0">-->
            <!--                        <p style="font-size: 15px; text-align: center;" class=" mb-1 "><b>Pending Documents</b></p>-->
            <!--                        <p style="font-size: 20px; text-align: center;" class=" mb-1 "><b>4</b></p>-->
            <!--                    </div>-->
            <!--                    <br>-->
            <!--                </div>-->
            <!--            </div>-->


            <!--            <div class="col-lg-2 col-md-4 col-sm-6">-->
            <!--                <div class="card bg-gradient-info overflow-hidden text-white" style="background-image: linear-gradient(to bottom, #fb6ba7 0, #ea2167 100%);box-shadow: 0 2px 10px rgb(234 33 103 / 30%);">-->
            <!--                    <div class="card-body pb-0">-->
            <!--                        <p style="font-size: 15px; text-align: center;" class=" mb-1 "><b>Completed</b></p>-->
            <!--                        <p style="font-size: 20px; text-align: center;" class=" mb-1 "><b>8</b></p>-->
            <!--                    </div>-->
            <!--                    <br>-->
            <!--                </div>-->
            <!--            </div>-->


            <!--            <div class="col-lg-2 col-md-4 col-sm-6">-->
            <!--                <div class="card bg-gradient-info overflow-hidden text-white" style="background-image: linear-gradient(to bottom, rgb(255, 179, 94) 0, #c87517 100%);box-shadow: 0 2px 10px rgb(234 33 103 / 30%);">-->
            <!--                    <div class="card-body pb-0">-->
            <!--                        <p style="font-size: 15px; text-align: center;" class=" mb-1 "><b>Not Applied</b></p>-->
            <!--                        <p style="font-size: 20px; text-align: center;" class=" mb-1 "><b>5</b></p>-->
            <!--                    </div>-->
            <!--                    <br>-->
            <!--                </div>-->
            <!--            </div>-->


            <div class="col-lg-3 col-md-4 col-sm-6"> </div>

        </div>
    </div>
</div>

<br/>



<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th class="align-middle" scope="col">Person</th>
                    <th class="align-middle " scope="col">Submitted by</th>
                    <th class="align-middle " scope="col">Service Order</th>
                    <th class="align-middle " scope="col">Created at</th>
                    <th class="align-middle" scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($service_order_images as $value) {
                    ?>
                    <tr>
                        <th class="align-middle "><img src="<?php  echo base_url('assets').'/images/admin/Male.png'; ?>" height="60" width="60"></th>
                        <th class="align-middle "> <?= get_email_by_id($value['created_by']) ?> </th>
                        <th class="align-middle">
                            <img height="50" width="50" src="<?= base_url().'/uploads/service_order_images/'.$value['file_name'] ?>">
                        </th>
                        <th class="align-middle "><?= $value['created_at'] ?></th>

                        <td class="align-middle">
                            <a target="_blank" href="<?= base_url().'upload/service_order_images/'.$value['file_name'] ?>" class="btn btn-success" title="View Service Order">
                                <span class="fa fa-eye"></span>
                            </a>

                            <button style="margin-top: 1px;" class="btn btn-primary" data-toggle="modal" data-target="#forward_application_to_reception<?= $value['id'] ?>" title="Send Service Order">
                                <span class="fas fa-forward"></span>
                            </button>



                            <a href="<?php echo base_url('upload/service_order_images/').$service_order_images[0]['file_name']; ?>" target="_blank">
                                <button style="margin-top: 1px;" class="btn btn-danger" data-toggle="modal" data-target="#forward_application_to_user" title="Download Service Order">
                                    <span class="fa fa-download"></span>
                                </button>
                            </a>
                        </td>

                        <!--                            forward application to receptionist-->
                        <!--                            forward application to receptionist-->
                        <div class="modal fade" id="forward_application_to_reception<?= $value['id'] ?>" data-backdrop="static" data-keyboard="false">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <form action="<?php echo base_url('portal/forward_service_order_images_to_reception') ?>" method="post">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Assign Application </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-12 form-group mb-3">
                                                    <label>Select User Role / <?=  get_admin_name_by_id($value['submitted_to']) ?></label>
                                                    <select class="form-control add-states" id="" required="" name="reception_id">
                                                        <option value="">Select User Role </option>

                                                        <?php
                                                        foreach ($user_roles as $st) { ?>
                                                            <option value="<?= $st->id ?>"><?= $st->email  ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <input type="hidden" class="form-control" required="" name="picture_id" value="<?= $value['id'] ?>">
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
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>