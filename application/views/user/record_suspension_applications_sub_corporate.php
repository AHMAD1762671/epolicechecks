<form>
    <div class="row mb-3">
        <div class="col-sm-2 mt-3 mt-md-0">
            <input type="text" value="<?= $client_id ?>" name="id" class="form-control" placeholder="Client ID">
        </div>


        <div class="col-sm-2 mt-3 mt-md-0">
            <input type="text" value="<?= $name ?>" name="name" class="form-control" placeholder="Last Name">
        </div>
        <div class="col-sm-2 mt-3 mt-md-0">
            <input type="text" value="<?= $name ?>" name="name" class="form-control" placeholder="First Name">
        </div>


        <div class="col-sm-2 mt-3 mt-md-0">
            <input type="text" value="<?= $dob ?>" name="dob" autocomplete="off" class="form-control picker2"  data-date-format="yyyy-mm-dd" placeholder="Date of Birth">
        </div>
        <div class="col-sm-2 mt-3 mt-md-0">
            <input type="text" value="<?= $phone ?>" name="phone" class="form-control" placeholder="Phone No.">
        </div>
        <div class="col-sm-2 mt-3 mt-md-0">
            <button type="submit" class="btn btn-primary btn-block">Search</button>
        </div>
    </div>
</form>



<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">Client ID</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Date of Birth</th>
                    <th scope="col">Phone</th>
<!--                    <th scope="col">Total Price</th>-->
                    <th scope="col">Submitted By</th>
                    <th scope="col">Application Status</th>
<!--                    <th scope="col">Payment Status</th>-->
                    <th scope="col">Created At</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($applications as $key => $value) {
                    ?>
                    <tr>
                        <th class="align-middle">
                            <?php if($value->new_application == 1){ ?>
                                <span style="color: #1e7e34;">new</span>
                            <?php } ?>

                            <?= $value->record_suspension_id  ?>
                        </th>

                        <td class="align-middle"><?= $value->consent_last_name ?></td>
                        <td class="align-middle"><?= $value->consent_first_name ?></td>
                        <td class="align-middle"><?= $value->consent_dob ?></td>
                        <td class="align-middle"><?= $value->consent_phone ?></td>
                        <td class="align-middle"><?= get_application_submitted_by($value->agent_id, $value->corporate_id) ?> </td>


                        <?php
                        if($value->application_status == "New"){
                            ?>
                            <td style="color: #ffa514;" class="align-middle"><?= $value->application_status ?> </td>
                        <?php } ?>

                        <?php
                        if($value->application_status == "Under Processing"){
                            ?>
                            <td style="color: #800020;" class="align-middle"><?= $value->application_status ?> </td>
                        <?php } ?>

                        <?php
                        if($value->application_status == "Pending Documents"){
                            ?>
                            <td style="color: #4caf50;" class="align-middle"><?= $value->application_status ?> </td>
                        <?php }
                        ?>
                        <?php
                        if($value->application_status == "Completed"){
                            ?>
                            <td style="color: #301934;" class="align-middle"><?= $value->application_status ?> </td>
                        <?php } ?>

                        <?php
                        if($value->application_status == "Not Applied"){
                            ?>
                            <td style="color: #FF0000;" class="align-middle"><?= $value->application_status ?> </td>
                        <?php } ?>
                        <td class="align-middle"><?= $value->created_at ?></td>
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

<script>
    //    dynamic dependent userrole and users
    $(document).ready(function () {

        $('.add-states').on('change', function () {
            var state_id = $(this).val();
            $.post('<?= base_url() ?>portal/get_user_by_role',
                {state_id: state_id},
                function (data) {
                    $('.add-cities').html(data);
                });
        });
    });
</script>