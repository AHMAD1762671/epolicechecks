<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 8/5/2020
 * Time: 3:49 PM
 */
//messages b/w GAC and Agent
?>

<div class="row">
    <div class="col-md-12">
        <div class="col-lg-6" id="" style="">
            <h2 class="text-theme text-center mb-4"><span class="fa fa-comments text-16 mr-1"></span> Conversation</h2>
            <form class="pl-5 mb-4" action="<?= base_url() ?>portal/add_application_conversation_save" method="post">
                <div class="form-group">
                    <textarea name="conversation" required="" class="form-control" placeholder="Add Message"></textarea>
                </div>
                <button type="submit" style="width: 30%; width: 30%; left: 30% !important; position: relative;" class="btn btn-primary">Add Message</button>
            </form>

            <ul>
                <?php foreach ($comments as $value) { ?>
                    <li class="media border-top pt-3">
                        <div class="mr-3">
                            <img src="<?= get_admin_profile_image_by_id($value->created_by) ?>" height="60" width="60">

                        </div>
                        <div class="media-body">
                            <h5 class="media-heading">
                                <span class="text-theme mb-0"><?= get_admin_name_by_id($value->created_by) ?></span>
                                <br>
                                <small><span class="fal fa-clock"></span> <?= date('d-m-Y / h:m:s A', strtotime($value->created_at)) ?></small>
                            </h5>
                            <p><?= $value->conversation ?></p>
                        </div>
                    </li>
                <?php } ?>
            </ul>

        </div>
    </div>
</div>