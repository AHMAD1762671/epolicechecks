


<!--<div class="row">-->
<!--    <div class="col-lg-12 col-md-12">-->
<!--        <div class="row dashboard-sevices">-->
<!---->
<!---->
<!--            <!--            <div class="col-lg-1 col-md-4 col-sm-6"> </div>-->
<!---->
<!--            <div class="col-lg-2 col-md-4 col-sm-6">-->
<!--                <div class="card bg-gradient-info overflow-hidden text-white" style="background-image: linear-gradient(to bottom, #4a85fb 0, #163eaf 100%); box-shadow: 0 2px 10px rgb(22 62 175 / 30%);}">-->
<!--                    <div class="card-body pb-0">-->
<!--                        <p style="font-size: 15px; text-align: center;" class=" mb-1 "><b>Total Invitations </b></p>-->
<!--                        <p style="font-size: 20px; text-align: center;" class=" mb-1 "><b>12</b></p>-->
<!--                    </div>-->
<!--                    <br>-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!---->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<!---->
<!--<br/>-->
<!--<br/>-->






<div class="row">
    <div class="col-md-6 form-group mb-3">
        <label>Name </label>
        <input type="text" class="form-control" required="" name="email" value="">
        <div class="text-danger"><?= form_error('email'); ?></div>
    </div>

    <br/>

    <div class="col-md-6 form-group mb-3">
        <label>Phone</label>
        <input type="text" class="form-control" required="" name="password" value="">
        <div class="text-danger"><?= form_error('password'); ?></div>
    </div>

    <br/>

    <div class="col-md-6 form-group mb-3">
        <label>Email</label>
        <input type="text" class="form-control" required="" name="company" value="">
        <div class="text-danger"><?= form_error('Company'); ?></div>
    </div>

    <div class="col-md-6 form-group mb-3">
        <label>Date and Time</label>
        <input type="text" class="form-control" required="" name="company" value="">
        <div class="text-danger"><?= form_error('Company'); ?></div>
    </div>


    <div class="col-md-6 form-group mb-3">
        <label>Service Type</label>
        <input type="text" class="form-control" required="" name="company" value="" >
        <div class="text-danger"><?= form_error('Company'); ?></div>
    </div>


    <div class="col-md-6 form-group mb-3">
        <label>Message</label>
        <textarea class="form-control"></textarea>
        <div class="text-danger"><?= form_error('Company'); ?></div>
    </div>

    <div class="col-md-6 form-group mb-3">
<!--        <label>Message</label>-->
<!--        <textarea class="form-control"></textarea>-->
<!--        <div class="text-danger">--><?//= form_error('Company'); ?><!--</div>-->
    </div>

    <div class="col-md-6 form-group mb-3">
        <button value="Submit" class="form-control">Submit</button>
    </div>

<!--    <div class="col-md-6 form-group mb-3">-->
<!--        <label>US Entry</label>-->
<!--        <input type="text" class="form-control" required="" name="company" value="http://localhost/epolicechecks/user/app_record_suspension/123" readonly>-->
<!--        <div class="text-danger">--><?//= form_error('Company'); ?><!--</div>-->
<!--    </div><div class="col-md-6 form-group mb-3">-->
<!--        <label>US Entry</label>-->
<!--        <input type="text" class="form-control" required="" name="company" value="http://localhost/epolicechecks/user/app_record_suspension/123" readonly>-->
<!--        <div class="text-danger">--><?//= form_error('Company'); ?><!--</div>-->
<!--    </div>-->

</div>