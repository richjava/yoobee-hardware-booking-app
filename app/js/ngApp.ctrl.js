/*IIFE function*/
(function () {

    "use strict";

    angular.module("myApp")

        /*controller for the application*/

        .controller("ngAppCtrl", function ($scope, $mdSidenav) {

            $scope.titleLogin = "Log in to Yoobee booking app";
            $scope.titleRegistration = "Register to use Yoobee booking app";

            $scope.openSidebar = function () {
                $mdSidenav('left').open();
            }
            $scope.closeSidebar = function () {
                $mdSidenav('left').close();
            }

            $scope.master = {};

            $scope.reset = function () {
                $scope.student = angular.copy($scope.master);
            };

        })
    /*angular.module("myApp")*/
})();
/*IIFE function*/