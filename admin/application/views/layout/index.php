<!DOCTYPE html>
<html lang="en" ng-app="administrator">
    <?php $this->load->view('layout/head'); ?>
    <body class="nav-md"  ng-init="loading = 0">
        <div class="angularloding" ng-if="loading" >
            <img src="<?= BASEURL ?>assets/admin/images/gears-animated.gif" width="100px" height="100px"/>
        </div>
        <div class="container body">
            <div class="main_container">
                <?php $this->load->view('layout/side_menus'); ?>
                <?php $this->load->view('layout/header'); ?>
                <?php $this->load->view('layout/main_view', $data); ?>
            </div>
        </div>
        <?php $this->load->view('layout/footer'); ?>
        <?php // $this->load->view('layout/js'); ?>
    </body>
</html>