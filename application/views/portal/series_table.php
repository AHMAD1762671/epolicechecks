
<br/>





<div class="row">
    <div class="col-xl-9 col-lg-6 col-md-4">
        <button class="btn btn-primary" data-toggle="modal" data-target="#add_user">Add Series</button>
    </div>
</div>
<br>

<div class="row">

    <div class="col-md-12 col-lg-12">
        <form>
            <div class="row">
                <div class="col-sm-3 mt-3 mt-md-0">
                    <input type="text" value="" name="id" class="form-control" placeholder="Id">
                </div>
                <div class="col-sm-3 mt-3 mt-md-0">
                    <input type="text" value="" name="company" class="form-control" placeholder="Name">
                </div>
                <div class="col-sm-3 mt-3 mt-md-0">
                    <input type="text" value="" name="telephone" class="form-control" placeholder="Created At">
                </div>

                <div class="col-sm-1 mt-3 mt-md-0">
                    <button type="submit" class="btn btn-primary btn-block">Search</button>
                </div>
            </div>
        </form>
    </div>
</div>

<br>
<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Detail</th>
                    <th scope="col">Created At</th>
                </tr>
                </thead>
                <tbody>

                <tr>
                    <td class="align-middle">F</td>
                    <td class="align-middle"></td>
                    <td class="align-middle"> 2021-09-16 19:12:17	</td>
                </tr>
                <tr>
                    <td class="align-middle">CF</td>
                    <td class="align-middle"></td>
                    <td class="align-middle">2021-09-16 19:12:17	</td>
                </tr>
                <tr>
                    <th class="align-middle">N</th>
                    <td class="align-middle"></td>
                    <td class="align-middle"> 2021-09-16 19:12:17	</td>
                </tr>


                </tbody>
            </table>
        </div>
        <?php echo $this->paginator->get_links(); ?>




        <div class="modal fade" id="add_user" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="<?= base_url('portal/add_series_list_save') ?>" method="post">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Series</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">

                                <div class="col-md-6 form-group mb-3">
                                    <label>Series Type</label>
                                    <input type="text" class="form-control" required="" name="email" value="<?= set_value('email') ?>">
                                    <div class="text-danger"><?= form_error('email'); ?></div>
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label>Application Type</label>
                                    <input type="text" class="form-control" required="" name="password" value="<?= set_value('password') ?>">
                                    <div class="text-danger"><?= form_error('password'); ?></div>
                                </div>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add Series</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



<!--get the dymanic dropdown country, province, city-->
<script>
    $(document).ready(function(){
        $('#country').change(function(){
            var country_id = $('#country').val();
            if(country_id != '')
            {
                $.ajax({
                    url:"<?php echo base_url(); ?>portal/fetch_state",
                    method:"POST",
                    data:{country_id:country_id},
                    success:function(data)
                    {
                        $('#province').html(data);
                        $('#city').html('<option value="">Select City</option>');
                    }
                });
            }
            else
            {
                $('#province').html('<option value="">Select State</option>');
                $('#city').html('<option value="">Select City</option>');
            }
        });
        $('#province').change(function(){
            var state_id = $('#province').val();

            if(state_id != '')
            {
                $.ajax({
                    url:"<?php echo base_url(); ?>portal/fetch_city",
                    method:"POST",
                    data:{state_id:state_id},
                    success:function(data)
                    {
                        $('#city').html(data);
                    }
                });
            }
            else
            {
                $('#City').html('<option value="">Select City</option>');
            }
        });
    });
</script>




<script>
    $(document).ready(function () {
        $('.delete-agent').click(function () {
            var agent_id = $(this).data('id');
            swal({
                title: 'Are you sure?',
                text: "You will not be able to revert this.",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then(function () {
                $.post('<?= base_url() ?>portal/delete-agent',
                    {agent_id: agent_id},
                    function (data, status) {
                        if (status === 'success') {
                            swal({
                                title: "Deleted!",
                                text: "Agent has been deleted.",
                                type: "success"
                            }).then(function () {
                                window.location.href = '';
                            });
                        }
                    });

            })
        });
        <?php if ($this->session->flashdata('add_user_error')): ?>
        $('#add_user').modal('show');
        <?php endif; ?>
    });
</script>
