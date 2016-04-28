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

            $scope.clearForm = function () {
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