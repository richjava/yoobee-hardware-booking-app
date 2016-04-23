(function () {

    "user strict";

    angular.module("myApp")
        .controller('ngConfirmationCtrl', function ($scope, $http, lastBookingsIDFactory) {

            lastBookingsIDFactory.getLastBookingID().then(function success(data) {
                $http({
                    method: 'GET',
                    url: 'http://localhost/yoobee-hardware-booking-app/api/fetchCompletedBooking',
                    id: data.data
                }).then(function (response) {

                    console.log(response);

                });
                /*then(function(data)*/

            });
            /*lastBookingsIDFactory.getLastBookingID().then(function success(currentBookingID)*/

        });
    /*.controller('ngDeviceSelectionCtrl', function ($scope, $http) */
})();
/*(function () {*/


