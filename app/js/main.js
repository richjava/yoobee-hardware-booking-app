/*IIFE function*/
(function(){

    "use strict";

    /*to disable aria warnings in the console*/
    var oldWarn = console.warn;
    console.warn = function (arg1) {
        if (arg1.startsWith('ARIA:')) return;
        oldWarn.apply(console, arguments);
    };
    console.warn('ARIA warnings disabled.');
    /*to disable aria warnings in the console*/

    angular.module("myApp", ["ngMaterial", "vAccordion", "ui.router", "ui.calendar", "ui.router.modal", "ui.bootstrap"])
        .config(function ($mdThemingProvider, $stateProvider, accordionConfig) {/*setting angular material theme color*/
            $mdThemingProvider.theme('default')
                .primaryPalette('pink')
                .accentPalette('orange');

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
                })
        });

})();/*IIFE function*/


