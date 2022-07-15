 <form action="<?= base_url('account/save_custom_invoice') ?>" method="post">

     <div class="row">

         <div class="col-md-3 form-group mb-3">
             <label>User Email</label>
             <input type="text" class="form-control" required="" name="user_email" value="sub_agent@gmail.com" readonly>
             <div class="text-danger"><?= form_error('last_name'); ?></div>
         </div>
<!--         <div class="col-md-3 form-group mb-3">-->
<!--             <label>Agent User Email</label>-->
<!--             <input type="text" class="form-control" required="" name="agent_email" value="--><?//= set_value('last_name') ?><!--">-->
<!--             <div class="text-danger">--><?//= form_error('last_name'); ?><!--</div>-->
<!--         </div>-->
<!--         <div class="col-md-3 form-group mb-3">-->
<!--             <label>Corporate User Email</label>-->
<!--             <input type="text" class="form-control" required="" name="corporate" value="--><?//= set_value('last_name') ?><!--">-->
<!--             <div class="text-danger">--><?//= form_error('last_name'); ?><!--</div>-->
<!--         </div>-->

         <div class="col-md-3 form-group mb-3">
             <label>Company Name</label>
             <input type="text" class="form-control" required="" name="company_name" value="<?= set_value('last_name') ?>">
             <div class="text-danger"><?= form_error('last_name'); ?></div>
         </div>


<!--         <div class="col-md-3 form-group mb-3">-->
<!--             <label>User Email</label>-->
<!--             <input type="text" class="form-control" required="" name="last_name" value="--><?//= set_value('last_name') ?><!--">-->
<!--             <div class="text-danger">--><?//= form_error('last_name'); ?><!--</div>-->
<!--         </div>-->




     </div>


     <br/>

     <div class="row">

         <div class="col-md-4 form-group mb-3">
             <label>User Name</label>
             <input type="text" class="form-control" required="" name="user_name" value="<?= set_value('password') ?>">
             <div class="text-danger"><?= form_error('password'); ?></div>
         </div>

         <div class="col-md-4 form-group mb-3">
             <label>Address</label>
             <input type="text" class="form-control" required="" name="address" value="<?= set_value('address') ?>">
             <div class="text-danger"><?= form_error('address'); ?></div>
         </div>

         <div class="col-md-4 form-group mb-3">
             <label>City</label>
             <input type="text" class="form-control" required="" name="city" value="<?= set_value('address') ?>">
             <div class="text-danger"><?= form_error('address'); ?></div>
         </div>



     </div>

     <br/>


     <div class="row">
         <div class="col-md-4 form-group mb-3">
             <label>Province</label>
             <input type="text" class="form-control" required="" name="province" value="<?= set_value('address') ?>">
             <div class="text-danger"><?= form_error('address'); ?></div>
         </div>

         <div class="col-md-4 form-group mb-3">
             <label>Postal Code</label>
             <input type="text" class="form-control" required="" name="postal_code" value="<?= set_value('address') ?>">
             <div class="text-danger"><?= form_error('address'); ?></div>
         </div>

         <div class="col-md-4 form-group mb-3">
             <label>Country</label>
             <input type="text" class="form-control" required="" name="country" value="<?= set_value('address') ?>">
             <div class="text-danger"><?= form_error('address'); ?></div>
         </div>

     </div>

     <br/>


     <div class="row">

         <div class="col-md-4 form-group mb-3">
             <label>Services</label>
             <input type="text" class="form-control" required="" name="services" value="<?= set_value('first_name') ?>">
             <div class="text-danger"><?= form_error('first_name'); ?></div>
         </div>

         <div class="col-md-4 form-group mb-3">
             <label>Quantity</label>
             <input type="text" class="form-control" required="" name="quantity" value="<?= set_value('company') ?>">
             <div class="text-danger"><?= form_error('Company'); ?></div>
         </div>


         <div class="col-md-4 form-group mb-3">
             <label>Total Price</label>
             <input type="text" class="form-control" required="" name="total_price" value="<?= set_value('address') ?>">
             <div class="text-danger"><?= form_error('address'); ?></div>
         </div>

         <br/>

     </div>


     <br/>


     <div class="row">

         <div class="col-md-4 form-group mb-3">
             <label><b>Payment status</b></label> <br/>

             <div class="form-check">
                 <input class="form-check-input" type="radio" name="payment_status" value="0" id="flexCheckChecked" checked>
                 <label class="form-check-label" for="flexCheckDefault">
                     Un-Paid
                 </label>
             </div>
             <div class="form-check">
                 <input class="form-check-input" type="radio" name="payment_status"  value="1">
                 <label class="form-check-label" for="flexCheckChecked">
                     Paid
                 </label>
             </div>



         </div>

         <div class="col-md-4 form-group mb-3">
             <label>Note/ Message</label> <br/>
             <textarea class="form-control" name="note" cols="50" rows="3"></textarea>
         </div>
     </div>


     <br/>



     <div class="row">

         <div class="col-md-5 form-group mb-3">
         </div>


         <div class="col-md-5 form-group mb-3">

         </div>

         <div class="col-md-2 form-group mb-3">
             <button type="submit" class="btn btn-primary">Generate Invoice</button>
         </div>
     </div>





 </form>