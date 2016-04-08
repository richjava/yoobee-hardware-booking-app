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
<body ng-app="ngApp" ng-controller="ngAppCtrl">
    <md-toolbar>
        <div class="md-toolbar-tools">
            <p><strong>Yoobee Hardware Booking Application</strong></p>
        </div>
    </md-toolbar>
<!--side navigation bar / menu-->
    <md-sidenav class="md-sidenav-left md-whiteframe-z2" md-component-id="left" md-is-locked-open="true">
        <md-toolbar>
            <h1 class="md-toolbar-tools"> Settings</h1>
        </md-toolbar>
        <md-content layout-padding>
            <!--SAMPLE TEXT--><div style="width: 400px;height: 200px;background-color: teal;"></div>
        </md-content>
    </md-sidenav>

    <md-content class="md-padding" layout="row" layout-wrap>
        <md-card flex layout-align="center center">
            <md-card-title>
                <p><img src="{{ image }}" alt="Yoobee Logo"></p>
            </md-card-title>
            <md-card-content>
                <h3>{{ title }}</h3>
            </md-card-content>
            <md-card-content>
                <md-content>
                    <div layout="column" layout-padding ng-cloak>
                        <form>
                            <md-input-container class="md-block">
                                <label for="username"></label>
                                <md-icon md-svg-src="app/icons/ic_person_outline_black_24px.svg" class="name"></md-icon>
                                <input type="text" id="username" placeholder="Select username">
                            </md-input-container>
                            <md-input-container>
                                <label for="password"></label>
                                <md-icon md-svg-src="app/icons/ic_vpn_key_black_24px.svg" class="name"></md-icon>
                                <input type="text" id="password" placeholder="Choose a password">
                            </md-input-container>
                            <md-input-container>
                                <label for="confirmpassword"></label>
                                <md-icon md-svg-src="app/icons/ic_vpn_key_black_24px.svg" class="name"></md-icon>
                                <input type="text" id="confirmpassword" placeholder="Confirm password">
                            </md-input-container>
                            <md-input-container class="md-block">
                                <label for="fullname"></label>
                                <md-icon md-svg-src="app/icons/ic_person_black_24px.svg" class="name"></md-icon>
                                <input type="text" id="fullname" placeholder="Full name">
                            </md-input-container>
                            <md-input-container class="md-block">
                                <label for="address"></label>
                                <md-icon md-svg-src="app/icons/ic_location_city_black_24px.svg" class="name"></md-icon>
                                <input type="text" id="address" placeholder="Address">
                            </md-input-container>
                            <md-input-container>
                                <label for="phone"></label>
                                <md-icon md-svg-src="app/icons/ic_phone_black_24px.svg" class="name"></md-icon>
                                <input type="text" id="phone" placeholder="Phone number">
                            </md-input-container>
                            <md-input-container>
                                <label for="email"></label>
                                <md-icon md-svg-src="app/icons/ic_email_black_24px.svg" class="name"></md-icon>
                                <input type="text" id="email" placeholder="Email">
                            </md-input-container>
                        </form>
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
    <!-- endbower -->
    <!-- endbuild -->
</body>
</html>
