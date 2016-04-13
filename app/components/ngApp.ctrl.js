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
        /*controller for devices page*/

        .controller('ngDeviceSelectionCtrl', function ($scope, $http) {

            $http.get('app/data/devices.json').then(function (categories) {
                $scope.categories = categories.data;
            })

            $scope.selected = [];
            $scope.toggle = function (item, list) {
                var idx = list.indexOf(item);
                if (idx > -1) {
                    list.splice(idx, 1);
                }
                else {
                    list.push(item);
                }
            };

            $scope.registerDevices = function (list) {
                console.log(list);
                $http.post("", list)
                    .success(function (data, status, headers, config) {
                    })
                    .error(function (data, status, header, config) {
                    });
            }

        });
    /*angular.module("myApp")*/
})();
/*IIFE function*/