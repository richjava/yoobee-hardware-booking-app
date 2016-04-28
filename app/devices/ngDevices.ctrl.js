(function () {

    "user strict";

    angular.module("myApp")
        .controller('ngDeviceSelectionCtrl', function ($scope, $http, lastBookingsIDFactory) {

            $http.get('http://localhost/yoobee-hardware-booking-app/api/categories').then(function (categories) {
                $scope.categories = categories.data;
                $http.get('http://localhost/yoobee-hardware-booking-app/api/devices').then(function (devices) {
                    $scope.devices = devices.data;
                })
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

            $scope.beginBooking = function (list) {

                lastBookingsIDFactory.getLastBookingID().then(function success(currentBookingID) {
                    for (var i = 0; i < list.length; i++) {
                        data = {'booking_id': parseInt(currentBookingID.data) + 1, 'device_id': list[i]};
                        $http({
                            method: 'POST',
                            url: 'http://localhost/yoobee-hardware-booking-app/api/bookDevices',
                            data: data
                        });
                    }
                    /*for (var i=0;i<list.length;i++*/
                })
                /*}).then(function success(bookingID)*/
            }
            /*$scope.beginBooking = function (list)*/
        });
    /*.controller('ngDeviceSelectionCtrl', function ($scope, $http) */
})();
/*(function () {*/


