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

            $scope.reset = function () {
                $scope.student.username = "";
                $scope.student.password = "";
                $scope.student.password_confirm = "";
                $scope.student.fullname = "";
                $scope.student.address = "";
                $scope.student.email = "";
                $scope.student.phone = "";
            }

        })

        /*a factory service to return the booking id*/
        .factory("lastBookingsIDFactory", function ($http) {

            function getBookingID() {
                return $http.get('http://localhost/yoobee-hardware-booking-app/api/getBookingID');
            }

            return {
                getBookingID: getBookingID
            }
        })
    /*angular.module("myApp")*/
})();
/*IIFE function*/