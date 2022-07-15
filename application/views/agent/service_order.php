<style>
    .container {
       padding-left: 0px;
    }
</style>


<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="row dashboard-sevices">


<!--            <div class="col-lg-1 col-md-4 col-sm-6"> </div>-->

            <div class="col-lg-2 col-md-4 col-sm-6">
                <div class="card bg-gradient-info overflow-hidden text-white" style="background-image: linear-gradient(to bottom, #4a85fb 0, #163eaf 100%); box-shadow: 0 2px 10px rgb(22 62 175 / 30%);}">
                    <div class="card-body pb-0">
                        <p style="font-size: 15px; text-align: center;" class=" mb-1 "><b>Total Service Orders </b></p>
                        <p style="font-size: 20px; text-align: center;" class=" mb-1 "><b>23</b></p>
                    </div>
                    <br>
                </div>
            </div>




            <div class="col-lg-1 col-md-4 col-sm-6"> </div>

        </div>
    </div>
</div>

<br/>






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

            <br/>
            <br/>


            <div class="modal fade" id="add_user" data-backdrop="static" data-keyboard="false">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <h3 style="text-align: center;">Service Order</h3>
                        <div class="form-group">


                            <form action="<?= base_url('agent/multiple_file_upload') ?>" method="post" enctype="multipart/form-data" name="add_name" id="add_name">
                                <div class="table-responsive">
                                    <label>Attach Document</label>
                                    <table class="table table-bordered" id="dynamic_field">
                                        <tr>
                                            <td><input type="file" class="form-control" name="files[]" multiple/></td>
<!--                                            <input type="hidden" name="submitted_to" value="--><?php //echo $this->session->userdata('agent_id') ?><!--">-->

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
                    <th class="align-middle" scope="col">Person</th>
                    <th class="align-middle " scope="col">Submitted by</th>
<!--                    <th class="align-middle " scope="col">Service Order</th>-->
                    <th class="align-middle " scope="col">Created at</th>
                    <th class="align-middle" scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php
//                $i =1;
                foreach ($service_orders as $key => $value) {
                    ?>
                    <tr>
                        <th class="align-middle "><img src="<?php  echo base_url('assets').'/images/admin/Male.png'; ?>" height="60" width="60"></th>
                        <th class="align-middle "> <?= get_agent_email_by_id($value->created_by) ?> </th>

                        <th class="align-middle "><?= $value->created_at ?></th>
                        <td class="align-middle">
                            <a target="_blank" href="<?= base_url().'/upload/service_order_images/'.$value->file_name ?>" class="btn btn-primary" title="View Application">
                                <span class="fa fa-eye"></span>
                            </a>
                        </td>

                    </tr>
                    <?php
                }
                if (empty($service_orders)) {
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