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
    <?= link_tag("bower_components/qtip2/jquery.qtip.css") ?>
    <?= link_tag("app/css/styles.css") ?>
    <!-- endbower -->
    <!-- endbuild -->
</head>
<body ng-app="myApp" ng-controller="ngAppCtrl" ng-cloak>
<script src="<?= base_url() ?>bower_components/angular/angular.js"></script>
<script src="<?= base_url() ?>bower_components/angular-material/angular-material.js"></script>
<script src="<?= base_url() ?>bower_components/jquery/dist/jquery.js"></script>

<md-toolbar>
    <div class="md-toolbar-tools">
        <md-button ng-click="openSidebar();">
            <md-icon md-svg-src="<?= base_url() ?>app/icons/ic_menu_white_48px.svg"></md-icon>
        </md-button>
        <p><strong>Yoobee Hardware Booking Application
                <ation
            </strong></p>
    </div>
</md-toolbar>

<!--side navigation bar / menu-->

<md-sidenav class="md-sidenav-left md-whiteframe-z2" md-component-id="left">
    <md-toolbar class="md-toolbar-tools">
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
                    <md-button ng-href="<?= base_url() . 'home/#/catalouge' ?>">
                        <md-icon md-svg-src="<?= base_url() ?>app/icons/ic_view_module_black_48px.svg"></md-icon>
                        Catalouge
                    </md-button>
                </div>
            </md-list-item>

            <md-divider></md-divider>

            <md-list-item class="md-3-line">
                <div class="md-list-item-text">
                    <md-button ng-href="<?= base_url() . 'home/#/devices' ?>">
                        <md-icon md-svg-src="<?= base_url() ?>app/icons/ic_event_black_48px.svg"></md-icon>
                        create a new booking
                    </md-button>
                </div>
            </md-list-item>

            <md-divider></md-divider>

            <md-list-item class="md-3-line">
                <div class="md-list-item-text">
                    <md-button ng-href="<?= base_url() . 'home/#/bookings' ?>">
                        <md-icon md-svg-src="<?= base_url() ?>app/icons/ic_date_range_black_48px.svg"></md-icon>
                        History of Bookings
                    </md-button>
                </div>
            </md-list-item>

            <md-divider></md-divider>

            <md-list-item class="md-3-line">
                <div class="md-list-item-text">
                    <md-button ng-href="<?= base_url() . 'dashboard/bookings' ?>">
                        <md-icon md-svg-src="<?= base_url() ?>app/icons/ic_dashboard_black_48px.svg"></md-icon>
                        Dashboard
                    </md-button>
                </div>

            </md-list-item>

            <md-divider></md-divider>

            <md-list-item class="md-3-line">
                <div class="md-list-item-text">
                    <md-button ng-href="<?= base_url() . 'home/#/settings' ?>">
                        <md-icon md-svg-src="<?= base_url() ?>app/icons/ic_settings_black_48px.svg"></md-icon>
                        Your Settings
                    </md-button>
                </div>

            </md-list-item>

            <md-divider></md-divider>

            <md-list-item>
                <?php if ($this->session->userdata('username')) { ?>
                    <md-button
                        class="md-secondary"><?= anchor('auth/logout', 'Logout', array('style' => 'text-decoration:none')) ?></md-button>
                <? } ?>
            </md-list-item>
        </md-list>
    </md-content>
</md-sidenav>
<div class="container">
