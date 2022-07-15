<!DOCTYPE html>
<html>
    <head>



        <link rel="stylesheet" href="<?= base_url('site-assets') ?>/css/bootstrap.min.css">
        <script src="<?= base_url('site-assets') ?>/js/jquery.min.js"></script>
        <script src="<?= base_url('site-assets') ?>/js/popper.min.js"></script>
        <script src="<?= base_url('site-assets') ?>/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="<?= base_url('assets') ?>/fonts/fontawesome/css/all.min.css">
        <link href="<?= base_url('site-assets') ?>/css/style.css" rel="stylesheet"/>
        <link href="<?= base_url('site-assets') ?>/css/custom_css.css" rel="stylesheet"/>




<!--        <link rel="stylesheet" href="--><?//= base_url('assets') ?><!--/css/bootstrap.min.css">-->
<!--        <script src="--><?//= base_url('assets') ?><!--/js/jquery.min.js"></script>-->
<!--        <script src="--><?//= base_url('assets') ?><!--/js/popper.min.js"></script>-->
<!--        <script src="--><?//= base_url('assets') ?><!--/js/bootstrap.min.js"></script>-->
<!--        <link rel="stylesheet" href="--><?//= base_url('assets') ?><!--/fonts/fontawesome/css/all.min.css">-->
<!--        <link href="--><?//= base_url('assets') ?><!--/css/style.css" rel="stylesheet"/>-->

        <title><?= $page_title ?></title>
        <style>
            .abc:hover
            {
                background-color: #d8dcbf!important;
                border-radius: 10px
            }
            .inner-container{
                min-height: 660px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="inner-container">
                <?php $this->load->view($main_view); ?>
            </div>
            <footer class="bg-light">
                <div class="row mb-3">
                    <div class="col-sm-4 pt-2">Powered By <img src="<?= base_url('site-assets') ?>/images/GAC.png" style="height: 40px; width: 43px;"></div>
                    <div class="col-sm-4 pt-2"><a href=""> Home</a> |<a href=""> FAQ </a>  | <a href="">Contact</a>  | <a href="">Privacy Policy</a></div>
                    <div class="col-sm-4">
                    </div>
                </div>

            </footer>
        </div>

    </body>
</html>