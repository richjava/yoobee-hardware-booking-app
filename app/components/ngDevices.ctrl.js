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

                var req = {
                    method: 'POST',
                    url: 'api',
                    headers: {
                        'Content-Type': undefined
                    },
                    data: {list: 'list'}
                }

                $http(req).then(function () {
                });
            };

        });
})();


