(function () {

    "user strict";

    angular.module("myApp")
        //.controller('ngConfirmationCtrl', function ($scope, $http, lastBookingsIDFactory) {
        .controller('ngConfirmationCtrl', function ($scope, $http) {

            var data = 6;
            $scope.sendEmail = function () {
                $http({
                    method: 'GET',
                    url: 'http://localhost/yoobee-hardware-booking-app/api/sendEmail/' + data,
                    data: 6
                })
            }


            //lastBookingsIDFactory.getLastBookingID().then(function success(data) {
            //    $http({
            //        method: 'GET',
            //        url: 'http://localhost/yoobee-hardware-booking-app/api/fetchCompletedBooking/' + data.data,
            //        data: data.data
            //    }).then(function (response) {
            //
            //
            //    });
            //    /*then(function(data)*/
            //
            //});
            /*lastBookingsIDFactory.getLastBookingID().then(function success(currentBookingID)*/

        });
    /*.controller('ngDeviceSelectionCtrl', function ($scope, $http) */
})();
/*(function () {*/


