/*IIFE function*/
//(function(){

    "use strict";

    angular.module("myApp")//referencing to the ngApp in main.js
        .controller("ngAppCtrl", function($scope, $http, $mdSidenav){

            $scope.title="Enter your details to register:";

            $scope.openSidebar = function() {
                $mdSidenav('left').open();
            }
            $scope.closeSidebar = function() {
                $mdSidenav('left').close();
            }

            $http.get('app/data/devices.json').then(function(categories){
                $scope.categories = categories.data;
            })

});/*angular.module(ngApp)*/
//})();/*IIFE function*/