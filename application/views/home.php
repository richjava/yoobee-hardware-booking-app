<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!doctype html>
<html>
<head>
	<title>Yoobee Hardware Booking System</title>
	<!--build:css css/styles.min.css -->
	<!-- bower:css -->
	<link rel="stylesheet" href="bower_components/angular-material/angular-material.css" />
	<link rel="stylesheet" href="bower_components/mdi/css/materialdesignicons.css" />
    <link rel="stylesheet" href="app/css/styles.css">
	<!-- endbower -->
	<!-- endbuild -->
</head>
<body ng-app="myApp" ng-controller="ngAppCtrl">
    <md-toolbar>
        <div class="md-toolbar-tools">
            <md-button ng-click="openSidebar();">
                <md-icon md-svg-src="app/icons/ic_menu_white_48px.svg"></md-icon>
            </md-button>
            <p><strong>Yoobee Hardware Booking Application</strong></p>
        </div>
    </md-toolbar>
<!--side navigation bar / menu-->
    <md-sidenav class="md-sidenav-left md-whiteframe-z2" md-component-id="left">
        <md-toolbar class="md-toolbar-tools">
            <h1 flex>Settings</h1>
            <md-button ng-click="closeSidebar();">
                <md-icon md-svg-src="app/icons/ic_close_white_48px.svg"></md-icon>
            </md-button>
        </md-toolbar>
        <md-content layout-padding>
        </md-content>
    </md-sidenav>

    <md-content class="md-padding container" layout="row" layout-wrap>
        <md-card>
            <md-card-title flex="60" flex-offset="20">
                <p><img src="app/images/logo.png" alt="Yoobee Logo"></p>
            </md-card-title>
            <md-card-content>
                <h4>{{ title | uppercase}}</h4>
                <pre>{{ student | json }}</pre>
            </md-card-content>
            <md-card-content>
                <md-content>
                    <div layout="column" layout-padding ng-cloak>
                        <?php echo form_open(base_url().'home/register');?>
                            <md-input-container class="md-block">

                                <?=form_label('Select username','username')?>
                                <md-icon md-svg-src="app/icons/ic_person_outline_black_24px.svg" class="name"></md-icon>
                                <?php
                                    $data_form=array(
                                        'type'=> 'text',
                                        'name' => 'username',
                                        'id' => 'username',
                                        'ng-model' =>"student.username"
                                    );
                                    echo form_input($data_form);
                                ?>
                            </md-input-container>

                            <md-input-container>
                                <?=form_label("Password","password")?>
                                <md-icon md-svg-src="app/icons/ic_vpn_key_black_24px.svg" class="name"></md-icon>
                                <?php
                                    $data_form=array(
                                        'type'=> 'password',
                                        'name' => 'password',
                                        'id' => 'password',
                                        'ng-model' =>"student.password"
                                    );
                                    echo form_input($data_form);
                                ?>
                            </md-input-container>

                            <md-input-container>
                                <?=form_label("Confirm Password","password_conform");?>
                                <md-icon md-svg-src="app/icons/ic_vpn_key_black_24px.svg" class="name"></md-icon>
                                <?php
                                    $data_form=array(
                                        'type'=> 'password',
                                        'name' => 'password_password',
                                        'id' => 'password_confirm'
                                    );
                                    echo form_input($data_form);
                                ?>
                            </md-input-container>

                            <md-input-container class="md-block">
                                <?=form_label("Fullname","fullname")?>
                                <md-icon md-svg-src="app/icons/ic_person_black_24px.svg" class="name"></md-icon>
                                <?php
                                    $data_form=array(
                                        'type'=> 'text',
                                        'name' => 'fullname',
                                        'id' => 'fullname',
                                        'ng-model' => 'student.fullname'
                                    );
                                    echo form_input($data_form);
                                ?>
                            </md-input-container>

                            <md-input-container class="md-block">
                                <?=form_label("Address","addres");?>
                                <md-icon md-svg-src="app/icons/ic_location_city_black_24px.svg" class="name"></md-icon>
                                <?php
                                $data_form=array(
                                    'type'=> 'text',
                                    'name' => 'address',
                                    'id' => 'address',
                                    'ng-model' => 'student.address'
                                );
                                echo form_input($data_form);
                                ?>
                            </md-input-container>

                            <md-input-container>
                                <?=form_label("Phone Number","phone")?>
                                <md-icon md-svg-src="app/icons/ic_phone_black_24px.svg" class="name"></md-icon>
                                <?php
                                    $data_form=array(
                                        'type'=> 'text',
                                        'name' => 'phone',
                                        'id' => 'phone',
                                        'ng-model' => 'student.phone'
                                    );
                                    echo form_input($data_form);
                                ?>
                            </md-input-container>

                            <md-input-container>
                                <?=form_label("Email","email")?>
                                <md-icon md-svg-src="app/icons/ic_email_black_24px.svg" class="name"></md-icon>
                                <?php
                                    $data_form=array(
                                        'type'=> 'email',
                                        'name' => 'email',
                                        'id' => 'email',
                                        'ng-model' => 'student.email'
                                    );
                                    echo form_input($data_form);
                                ?>
                            </md-input-container>

<!--                           <md-content>-->
                               <section layout="row" layout-align="center center">
                                   <md-button class="md-raised">Cancel</md-button>
                                   <?php echo form_submit(
                                       array(
                                       'id' => "submit",
                                       'value' => 'Register',
                                       'class' => 'md-button md-raised md-warn')
                                    );
                                   ?>
                               </section>
<!--                           </md-content>-->
                        <?php echo form_close();?>
                    </div>
                </md-content>
            </md-card-content>
        </md-card>
    </md-content>
    <!--build:js js/main.min.js -->
    <!-- bower:js -->
    <script src="bower_components/angular/angular.js"></script>
    <script src="bower_components/angular-animate/angular-animate.js"></script>
    <script src="bower_components/angular-aria/angular-aria.js"></script>
    <script src="bower_components/angular-messages/angular-messages.js"></script>
    <script src="bower_components/angular-material/angular-material.js"></script>
    <script src="bower_components/jquery/dist/jquery.js"></script>
    <script src="app/js/main.js"></script>
    <script src="app/components/ngApp.ctrl.js"></script>
    <script src="app/components/ngApp.factory.js"></script>
    <!-- endbower -->
    <!-- endbuild -->
</body>
</html>
