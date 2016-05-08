/*IIFE function*/
(function () {

    "use strict";

    angular.module("myApp")

        /*controller for the application*/

        .controller("ngAppCtrl", function ($cookies, $scope, $mdSidenav, $http) {

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

            $scope.beginBooking = function () {

                $http.get('http://localhost/yoobee-hardware-booking-app/api/createNewBooking').then(function (bookingID) {
                    $cookies.put('id', bookingID.data);
                })
            }
            /*$scope.beginBooking = function (list)*/

        })
    /*angular.module("myApp")*/
})();
/*IIFE function*/