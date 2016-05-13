(function () {

    "use strict";

    angular.module("myApp").controller('ngDeviceSelectionCtrl', function ($cookies, $scope, $http) {


            $http.get('http://localhost/yoobee-hardware-booking-app/api/categories').then(function (categories) {
                $scope.categories = categories.data;
                $http.get('http://localhost/yoobee-hardware-booking-app/api/devices').then(function (devices) {
                    $scope.devices = devices.data;
                })
            })

        if ($cookies.get('isNewBooking')) {
            $http.get('http://localhost/yoobee-hardware-booking-app/api/editBooking/' + $cookies.get('id')).then(function success(response) {
                var bookedDevices = [];
                response.data.forEach(function (item) {
                    bookedDevices.push(item.device_id);
                })
                $scope.selected = bookedDevices;
            });
        } else {
            $scope.selected = [];
        }

        $scope.toggle = function (device, list) {
            var idx = list.indexOf(device);
                if (idx > -1) {
                    list.splice(idx, 1);
                }
                else {
                    list.push(device);
                    console.log(list);
                }
            };

        $scope.exists = function (device, list) {
            return list.indexOf(device) > -1;
        };

            $scope.addDevices = function (list) {
                var data = [];
                if (list.length > 0) {
                    $scope.isAnyDeviceSelected = false;
                    for (var i = 0; i < list.length; i++) {
                        data.push({
                            'booking_id': $cookies.get('id'),
                            'device_id': list[i]
                        });

                    }
                    $http.post('http://localhost/yoobee-hardware-booking-app/api/addDevices', data);
                }

            }
        /*$scope.addDevices = function (list)*/
        });
    /*.controller('ngDeviceSelectionCtrl', function ($scope, $http) */
})();
/*(function () {*/


