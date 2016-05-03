/*IIFE function*/
(function(){

    "use strict";

    /*to disable aria warnings in the console*/
    var oldWarn = console.warn;
    console.warn = function (arg1) {
        if (arg1.startsWith('ARIA:')) return;
        oldWarn.apply(console, arguments);
    };
    /*to disable aria warnings in the console*/


    angular.module("myApp", ["ngMaterial", "vAccordion", "ui.router"])

        .config(function ($mdThemingProvider, $stateProvider, accordionConfig) {/*setting angular material theme color*/
            $mdThemingProvider.theme('default')
                .primaryPalette('blue-grey')
                .accentPalette('light-blue');

            accordionConfig.expandAnimationDuration = 0.5;

            $stateProvider
                .state('devices', {
                    url: '/devices',
                    templateUrl: '../app/devices/devices.html',
                    controller: 'ngDeviceSelectionCtrl'
                })/*.state('devices'*/
                .state('calendar', {
                    url: '/calendar',
                    templateUrl: '../app/calendar/calendar.html',
                    controller: "ngDatePickerCtrl"
                })/*state(calenadr)*/
                .state('confirmation', {
                    url: '/confirmation',
                    templateUrl: '../app/confirmation/confirmation.html',
                    controller: "ngConfirmationCtrl"
                })/*.state('confirmation',{*/
                .state('success', {
                    url: '/success',
                    templateUrl: '../app/components/success.html'
                })/*.state('success',{*/
                .state('settings', {
                    url: '/settings',
                    templateUrl: '../app/settings/settings.html',
                    controller: "ngSettingCtrl"
                })
        })

})();/*IIFE function*/


