/*IIFE function*/
(function () {

    "use strict";

    angular.module("myApp")

        /*controller for whole the application*/

        .controller("ngAppCtrl", function ($scope, $mdSidenav) {

            $scope.title = "Enter your details to register:";

            $scope.openSidebar = function () {
                $mdSidenav('left').open();
            }
            $scope.closeSidebar = function () {
                $mdSidenav('left').close();
            }

        })
    /*angular.module("myApp")*/
})();
/*IIFE function*/