<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!doctype html>
<html>
<head>
    <title>Yoobee Hardware Booking System</title>
    <!--build:css css/styles.min.css -->
    <!-- bower:css -->
    <?=link_tag("bower_components/angular-material/angular-material.css")?>
    <?=link_tag("bower_components/mdi/css/materialdesignicons.css")?>
    <?=link_tag("bower_components/v-accordion/dist/v-accordion.css")?>
    <!-- endbower -->
    <!-- endbuild -->
</head>
<body ng-app="myApp" ng-controller="ngAppCtrl" ng-cloak>

        <md-toolbar>
            <div class="md-toolbar-tools">
                <md-button ng-click="openSidebar();">
                    <md-icon md-svg-src="<?=base_url()?>app/icons/ic_menu_white_48px.svg"></md-icon>
                </md-button>
                <p><strong>Yoobee Hardware Booking Application<ation</strong></p>
            </div>
        </md-toolbar>

        <?php if($this->session->userdata('username')) {?>
            <p>You are logged in</p>
            <?=anchor('auth/logout','Logout')?>
        <? } ?>

        <!--side navigation bar / menu-->

        <md-sidenav class="md-sidenav-left md-whiteframe-z2" md-component-id="left">
            <md-toolbar class="md-toolbar-tools">
                <h1 flex>Settings</h1>
                <md-button ng-click="closeSidebar();">
                    <md-icon md-svg-src="<?=base_url()?>app/icons/ic_close_white_48px.svg"></md-icon>
                </md-button>
            </md-toolbar>
            <md-content layout-padding>
            </md-content>
        </md-sidenav>
