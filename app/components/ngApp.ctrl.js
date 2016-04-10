/*IIFE function*/
//(function(){

    "use strict";

    angular.module("myApp")//referencing to the ngApp in main.js
        .controller("ngAppCtrl", function($scope, $http, $mdSidenav){

            $scope.title="Enter your details to register:";
            $scope.singin="Existing user? Signin here:";

            $scope.openSidebar = function() {
                $mdSidenav('left').open();
            }
            $scope.closeSidebar = function() {
                $mdSidenav('left').close();
            }

    });/*angular.module(ngApp)*/
//})();/*IIFE function*/