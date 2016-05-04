(function () {

    "use strict";

    angular.module("myApp")
        .controller('ngDeviceSelectionCtrl', function ($cookies, $scope, $http, bookingsIDFactory) {

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

                bookingsIDFactory.getBookingID().then(function (bookingID) {
                    $cookies.put('id', bookingID.data);

                    for (var i = 0; i < list.length; i++) {
                        var data = {'booking_id': bookingID.data, 'device_id': list[i]};
                        $http.post('http://localhost/yoobee-hardware-booking-app/api/bookDevices', data);
                    }
                    /*for (var i=0;i<list.length;i++*/

                })

            }
            /*$scope.beginBooking = function (list)*/
        });
    /*.controller('ngDeviceSelectionCtrl', function ($scope, $http) */
})();
/*(function () {*/


