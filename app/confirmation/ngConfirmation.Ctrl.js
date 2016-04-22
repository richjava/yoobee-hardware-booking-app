(function () {

    "user strict";

    angular.module("myApp")
        .controller('ngConfirmationCtrl', function ($scope, $http, lastBookingsIDFactory) {

            lastBookingsIDFactory.getLastBookingID().then(function success(currentBookingID) {

                $http({
                    method: 'GET',
                    url: 'http://localhost/yoobee-hardware-booking-app/api/fetchCompletedBooking',
                    id: currentBookingID
                }).then(function (data) {

                    console.log(data);

                })
                /*then(function(data)*/

            });
            /*lastBookingsIDFactory.getLastBookingID().then(function success(currentBookingID)*/

        });
    /*.controller('ngDeviceSelectionCtrl', function ($scope, $http) */
})();
/*(function () {*/


