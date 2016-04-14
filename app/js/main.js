/*IIFE function*/
(function(){

    "use strict";

    angular.module("myApp", ["ngMaterial", "vAccordion", "ui.router", "ui.calendar"])
        .config(function ($mdThemingProvider, $stateProvider, accordionConfig) {/*setting angular material theme color*/
            $mdThemingProvider.theme('default')
                .primaryPalette('pink')
                .accentPalette('orange');

            accordionConfig.expandAnimationDuration = 0.5;

            $stateProvider
                .state('devices', {
                    url: '/devices',
                    templateUrl: '../app/devices.html'
                })/*.state('devices'*/
                .state('calendar', {
                    url: '/calendar',
                    templateUrl: '../app/calendar.html'
                });
            /* .state('calendar'*/

        });

})();/*IIFE function*/


