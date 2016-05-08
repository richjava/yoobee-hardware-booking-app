<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!doctype html>
<html>
<head>
    <title>Yoobee Hardware Booking System</title>
    <!--build:css css/styles.min.css -->
    <!-- bower:css -->
    <?= link_tag("bower_components/angular-material/angular-material.css") ?>
    <?= link_tag("bower_components/mdi/css/materialdesignicons.css") ?>
    <?= link_tag("bower_components/v-accordion/dist/v-accordion.css") ?>
    <?= link_tag("bower_components/fullcalendar/dist/fullcalendar.css") ?>
    <?= link_tag("bower_components/bootstrap/dist/css/bootstrap.css") ?>
    <?= link_tag("bower_components/angular-datatables/dist/css/angular-datatables.css") ?>
    <?= link_tag("bower_components/datatables/media/css/dataTables.material.css") ?>
    <?= link_tag("bower_components/qtip2/jquery.qtip.css") ?>
    <?= link_tag("app/css/styles.css") ?>
    <!-- endbower -->
    <!-- endbuild -->
</head>
<body ng-app="myApp" ng-controller="ngAppCtrl" ng-cloak>
<script src="<?= base_url() ?>bower_components/jquery/dist/jquery.js"></script>
<script src="<?= base_url() ?>bower_components/datatables.net/js/jquery.dataTables.js"></script>
<script src="<?= base_url() ?>bower_components/datatables/media/js/dataTables.material.js"></script>
<script src="<?= base_url() ?>bower_components/angular/angular.js"></script>
<script src="<?= base_url() ?>bower_components/angular-datatables/dist/angular-datatables.js"></script>
<script src="<?= base_url() ?>bower_components/angular-material/angular-material.js"></script>

<md-toolbar>
    <div class="md-toolbar-tools toolbar">
        <?php if ($this->session->userdata('username')) { ?>
            <md-button ng-click="openSidebar();">
                <md-icon md-svg-src="<?= base_url() ?>app/icons/ic_menu_white_48px.svg"></md-icon>
            </md-button>
        <?php } ?>
        <p class="title"> YOOBEE HARDEWARE BOOKING APP</p>
    </div>
</md-toolbar>

<!--side navigation bar / menu-->

<md-sidenav class="md-sidenav-left md-whiteframe-z2 sidenav" md-component-id="left">
    <md-toolbar class="md-toolbar-tools toolbar">
        <h1 flex>Menu</h1>
        <md-button ng-click="closeSidebar();">
            <md-icon md-svg-src="<?= base_url() ?>app/icons/ic_close_white_48px.svg"></md-icon>
        </md-button>
    </md-toolbar>

    <md-content layout-padding>
        <h4>Welcome, <?= $this->session->userdata('username') ?></h4>
    </md-content>

    <md-content layout-padding>
        <md-list>

            <md-list-item class="md-3-line">
                <div class="md-list-item-text">
                    <md-button ng-href="<?= base_url() . 'home/#/devices' ?>" ng-click="beginBooking();">
                        <md-icon md-svg-src="<?= base_url() ?>app/icons/ic_event_black_48px.svg"></md-icon>
                        create a new booking
                    </md-button>
                </div>
            </md-list-item>

            <md-divider></md-divider>

            <md-list-item class="md-3-line">
                <div class="md-list-item-text">
                    <md-button ng-href="<?= base_url() . 'home/#/booking' ?>">
                        <md-icon md-svg-src="<?= base_url() ?>app/icons/ic_date_range_black_48px.svg"></md-icon>
                        Your Bookings
                    </md-button>
                </div>
            </md-list-item>

            <md-divider></md-divider>

            <md-list-item class="md-3-line" ng-if="'<?= $this->session->userdata('role') ?>' == 'admin' ">
                <div class="md-list-item-text">
                    <md-button ng-href="<?= base_url() . 'dashboard/bookings' ?>">
                        <md-icon md-svg-src="<?= base_url() ?>app/icons/ic_dashboard_black_48px.svg"></md-icon>
                        Administrator Dashboard
                    </md-button>
                </div>

            </md-list-item>

            <md-divider></md-divider>

            <md-list-item class="md-3-line">
                <div class="md-list-item-text">
                    <md-button ng-href="<?= base_url() . 'home/#/profile' ?>">
                        <md-icon md-svg-src="<?= base_url() ?>app/icons/ic_settings_black_48px.svg"></md-icon>
                        Profile
                    </md-button>
                </div>

            </md-list-item>

            <md-divider></md-divider>

            <md-list-item class="md-3-line">
                <div class="md-list-item-text">
                <?php if ($this->session->userdata('username')) { ?>
                    <md-button
                        class="md-secondary"><?= anchor('auth/logout', 'Logout', array('style' => 'text-decoration:none')) ?>
                    </md-button>
                <? } ?>
                </div>
            </md-list-item>
        </md-list>
    </md-content>
</md-sidenav>
<div class="container" id="popupContainer">
