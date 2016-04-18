(function () {

    "user strict";

    angular.module("myApp")
        .controller('ngDeviceSelectionCtrl', function ($scope, $http) {

            $http.get('http://localhost/yoobee-hardware-booking-app/api/categories').then(function (categories) {
                $scope.categories = categories.data;
                $http.get('http://localhost/yoobee-hardware-booking-app/api/devices').then(function (devices) {
                    $scope.devices = devices.data;
                    console.log($scope.devices.category_id);
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
                $http({
                    /*getting the last booking id fom the booking table*/
                    method: 'GET',
                    url: 'http://localhost/yoobee-hardware-booking-app/api/booking_id'
                }).then(function success(currentBookingID) {
                    for (var i = 0; i < list.length; i++) {
                        data = {'booking_id': currentBookingID.data, 'device_id': list[i]};
                        $http({
                            method: 'POST',
                            url: 'http://localhost/yoobee-hardware-booking-app/api/bookings',
                            data: data
                        }).success(function (data) {
                            /*do something here*/
                        })
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


