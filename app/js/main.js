/*IIFE function*/
(function(){

    "use strict";

    angular.module("myApp",["ngMaterial","vAccordion"])
        .config(function($mdThemingProvider){/*setting angular material theme color*/
            $mdThemingProvider.theme('default')
                .primaryPalette('pink')
                .accentPalette('orange');
        })
        .config(function (accordionConfig) { /*accordion opening closing animation time*/
            accordionConfig.expandAnimationDuration = 0.5;
        });

})();/*IIFE function*/


