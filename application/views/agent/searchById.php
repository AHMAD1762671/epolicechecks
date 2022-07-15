<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="row dashboard-sevices">


            <!--            <div class="col-lg-1 col-md-4 col-sm-6"> </div>-->

            <div class="col-lg-2 col-md-4 col-sm-6">
                <div class="card bg-gradient-info overflow-hidden text-white" style="background-image: linear-gradient(to bottom, #4a85fb 0, #163eaf 100%); box-shadow: 0 2px 10px rgb(22 62 175 / 30%);}">
                    <div class="card-body pb-0">
                        <p style="font-size: 15px; text-align: center;" class=" mb-1 "><b> Total ID Verifications </b></p>
                        <p style="font-size: 20px; text-align: center;" class=" mb-1 "><b>23</b></p>
                    </div>
                    <br>
                </div>
            </div>

<!--            <div class="col-lg-3 col-md-4 col-sm-6">-->
<!--                <a href="--><?php //echo base_url().'agent/searchUserById'; ?><!--">-->
<!--                    <div class="card bg-gradient-info overflow-hidden text-white" style="background-image: linear-gradient(to bottom, #fc7a5a 0, #d72e04 100%); box-shadow: 0 2px 10px rgb(215 46 4 / 30%);">-->
<!--                        <div class="card-body pb-0">-->
<!--                            <p style="font-size: 20px; text-align: center;" class=" mb-1 "><b>ID Verification </b></p>-->
<!--                            <p style="font-size: 55px; text-align: center;" class=" mb-1 "><b>00</b></p>-->
<!--                        </div>-->
<!--                        <br>-->
<!--                    </div>-->
<!--                    <a/>-->
<!--            </div>-->




            <div class="col-lg-1 col-md-4 col-sm-6"> </div>

        </div>
    </div>
</div>






<?php if($this->session->flashdata('no_access')): ?>
    <?php echo $this->session->flashdata('no_access');?>
<?php endif; ?>


<form action="<?= base_url('agent/find_user') ?>" method="post">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-6"></div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <input required="" class="form-control" name="userId" type="text" placeholder="Search" aria-label="Search">
                    <br>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6"></div>
            </div>

            <div class="row">
                <div class="col-lg-5 col-md-4 col-sm-6"></div>
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <button class="btn btn-primary btn-block" type="submit">Search</button>
                </div>
                <div class="col-lg-5 col-md-4 col-sm-6"></div>
            </div>
        </div>
    </div>
</form>