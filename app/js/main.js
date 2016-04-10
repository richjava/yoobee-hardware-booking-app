/*IIFE function*/
(function(){

    "use strict";

    angular.module("myApp",["ngMaterial"])
        .config(function($mdThemingProvider){/*setting angular material theme color*/
            $mdThemingProvider.theme('default')
                .primaryPalette('pink')
                .accentPalette('orange');
        })
})();/*IIFE function*/

