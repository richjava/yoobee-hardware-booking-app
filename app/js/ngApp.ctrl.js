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
    /*angular.module("myApp")*/
})();
/*IIFE function*/