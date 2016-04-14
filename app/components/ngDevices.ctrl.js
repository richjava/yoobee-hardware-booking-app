(function () {

    "user strict";

    angular.module("myApp")
        .controller('ngDeviceSelectionCtrl', function ($scope, $http) {

            $http.get('../app/data/devices.json').then(function (categories) {
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

        })
})();


