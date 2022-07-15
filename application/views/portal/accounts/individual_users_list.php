
<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="table-responsive">
            <table class="display table table-bordered">
                <thead>
                <tr>
                    <th scope="col">User Role Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
<!--                    <th scope="col">User Role</th>-->
                    <th scope="col">Created At</th>
<!--                    <th scope="col">Status</th>-->
                    <th scope="col">Action</th>
<!--                    <th scope="col">Action</th>-->
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($user_list as $key => $value) {
                    ?>
                    <tr>
                        <th class="align-middle"><a href="<?php echo base_url('portal/get_users_application_list_accounts/').$value->id; ?>"> <?= $value->id ?> </a> </th>
                        <td class="align-middle"><?= $value->first_name . ' ' . $value->last_name ?></td>
                        <td class="align-middle"><?= $value->email ?></td>
<!--                        <td class="align-middle">--><?php //= $value->user_role_name ?><!--</td>-->
                        <td class="align-middle"><?= $value->created_at ?></td>
                        <td class="align-middle">
                            <?php if (check_route('edit-user', 'post') && $value->created_by): ?>
                                <button class="btn btn-success" data-toggle="modal" data-target="#user_<?= $value->id ?>" title="Edit User">
                                    <span class="fa fa-pen"></span>
                                </button>
                                <?php
                            endif;
                            if (check_route('delete-user', 'post') && $value->created_by):
                                ?>
                                <button class="btn btn-danger delete-user" data-id="<?= $value->id ?>" title="Delete User">
                                    <span class="fa fa-trash"></span>
                                </button>
                            <?php endif; ?>
                        </td>
                    </tr>

                    <div class="modal fade" id="user_<?= $value->id ?>" data-backdrop="static" data-keyboard="false">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
<!--                                <form action="--><?php //= base_url('portal/edit-user') ?><!--" method="post">-->
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-12 form-group mb-3">
                                                <label>First Name</label>
                                                <input type="text" class="form-control" required="" name="first_name" value="<?= $value->first_name ?>">
                                                <div class="text-danger"><?= form_error('first_name'); ?></div>
                                            </div>
                                            <div class="col-md-12 form-group mb-3">
                                                <label>Last Name</label>
                                                <input type="text" class="form-control" required="" name="last_name" value="<?= $value->last_name ?>">
                                                <div class="text-danger"><?= form_error('last_name'); ?></div>
                                            </div>
                                            <div class="col-md-12 form-group mb-3">
                                                <label>Email</label>
                                                <input type="text" class="form-control" readonly name="email" value="<?= $value->email ?>">
                                                <div class="text-danger"><?= form_error('email'); ?></div>
                                            </div>
                                            <!--                                            <div class="col-md-12 form-group mb-3">
                                                <label>Password</label>
                                                <input type="password" class="form-control" required="" name="password">
                                                <div class="text-danger"><?php form_error('password'); ?></div>
                                            </div>-->
                                            <div class="col-md-12 form-group mb-3">
                                                <label>User Role</label>
                                                <select class="form-control" required="" name="user_role_id" val="<?= $value->user_role_id ?>">
                                                    <option value="">Select User Role</option>
                                                    <?php foreach ($user_roles as $value2) { ?>
                                                        <option value="<?= $value2->user_role_id ?>"><?= $value2->user_role_name ?></option>
                                                    <?php }
                                                    ?>
                                                </select>
                                                <div class="text-danger"><?= form_error('user_role_id'); ?></div>
                                            </div>
                                            <div class="col-md-12 form-group mb-3">
                                                <label class="switch switch-primary mr-3">
                                                    <span>Status</span>
                                                    <input type="checkbox" name="active" <?= ($value->active) ? 'checked' : '' ?> value="1">
                                                    <span class="slider"></span>
                                                </label>
                                            </div>
                                        </div>
                                        <input type="hidden" class="form-control" required="" name="id" value="<?= $value->id ?>">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Edit User</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                if (empty($user_list)) {
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
        <div class="modal fade" id="add_user" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="<?= base_url('portal/add-user') ?>" method="post">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12 form-group mb-3">
                                    <label>First Name</label>
                                    <input type="text" class="form-control" required="" name="first_name" value="<?= set_value('first_name') ?>">
                                    <div class="text-danger"><?= form_error('first_name'); ?></div>
                                </div>
                                <div class="col-md-12 form-group mb-3">
                                    <label>Last Name</label>
                                    <input type="text" class="form-control" required="" name="last_name" value="<?= set_value('last_name') ?>">
                                    <div class="text-danger"><?= form_error('last_name'); ?></div>
                                </div>
                                <div class="col-md-12 form-group mb-3">
                                    <label>Email</label>
                                    <input type="text" class="form-control" required="" name="email" value="<?= set_value('email') ?>">
                                    <div class="text-danger"><?= form_error('email'); ?></div>
                                </div>
                                <div class="col-md-12 form-group mb-3">
                                    <label>Password</label>
                                    <input type="password" class="form-control" required="" name="password" value="<?= set_value('password') ?>">
                                    <div class="text-danger"><?= form_error('password'); ?></div>
                                </div>
                                <div class="col-md-12 form-group mb-3">
                                    <label>User Role</label>
                                    <select class="form-control" required="" name="user_role_id" val="<?= set_value('user_role_id') ?>">
                                        <option value="">Select User Role</option>
                                        <?php foreach ($user_roles as $value) { ?>
                                            <option value="<?= $value->user_role_id ?>"><?= $value->user_role_name ?></option>
                                        <?php }
                                        ?>
                                    </select>
                                    <div class="text-danger"><?= form_error('user_role_id'); ?></div>
                                </div>
                                <div class="col-md-12 form-group mb-3">
                                    <label class="switch switch-primary mr-3">
                                        <span>Status</span>
                                        <input type="checkbox" name="active" checked value="1">
                                        <span class="slider"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
<!--                        <div class="modal-footer">-->
<!--                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>-->
<!--                            <button type="submit" class="btn btn-primary">Add User</button>-->
<!--                        </div>-->
<!--                    </form>-->
                </div>
            </div>
        </div>
    </div>
</div>

<script>
//    $(document).ready(function () {
//        $('.delete-user').click(function () {
//            var user_id = $(this).data('id');
//            swal({
//                title: 'Are you sure?',
//                text: "You will not be able to revert this.",
//                type: 'warning',
//                showCancelButton: true,
//                confirmButtonColor: '#3085d6',
//                cancelButtonColor: '#d33',
//                confirmButtonText: 'Yes, delete it!'
//            }).then(function () {
//                $.post('<?//= base_url() ?>//portal/delete-user',
//                    {user_id: user_id},
//                    function (data, status) {
//                        if (status === 'success') {
//                            swal({
//                                title: "Deleted!",
//                                text: "User has been deleted.",
//                                type: "success"
//                            }).then(function () {
//                                window.location.href = '';
//                            });
//                        }
//                    });
//
//            })
//        });
//        <?php //if ($this->session->flashdata('add_user_error')): ?>
//        $('#add_user').modal('show');
//        <?php //endif; ?>
//    });
</script>